<?php

//session_start() ;
// hdev_session::payment_sess_destroy();
// Prevent direct access to this class



define("BASEPATH", 1);

$r2 = getcwd().DIRECTORY_SEPARATOR."hdev_c".DIRECTORY_SEPARATOR."executor".DIRECTORY_SEPARATOR."control".DIRECTORY_SEPARATOR."hdev_softwares".DIRECTORY_SEPARATOR."library".DIRECTORY_SEPARATOR;
//exit($r2);
include($r2.'rave.php');
include($r2.'raveEventHandlerInterface.php');


use Flutterwave\Rave;
use Flutterwave\EventHandlerInterface;



$URL = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$o_d = hdev_session::get("tx_dta");
$postData=array( 
        'amount'=>$o_d['p_price'],
        "payment_options"=>"paypal,mobile_money_rwanda",
        "description"=>constant('APP_NAME'),
        "logo"=>"",
        "title"=>APP_NAME." Payment",
        "country"=>"RW",
        "currency"=>"RWF",
        "email"=>$o_d['t_email'],
        "firstname"=>$o_d['t_name'],
        "lastname"=>"",
        "phonenumber"=>"+25".$o_d['t_tel'],
        "pay_button_text"=>"Ishyura inzu",
        "ref"=>$o_d['tx_ref'],
        "successurl"=>hdev_url::menu(""),//"http://localhost/xcd/Flutterwave-PHP-v3-master/?status=success",
        "failureurl"=>hdev_url::menu("")//"http://localhost/xcd/Flutterwave-PHP-v3-master/?status=failed"
    );
$getData = $_GET;
$publicKey = $_SERVER['PUBLIC_KEY'];
$secretKey = $_SERVER['SECRET_KEY'];
if(isset($_POST) && isset($postData['successurl']) && isset($postData['failureurl'])){
    $success_url = $postData['successurl'];
    $failure_url = $postData['failureurl'];
}

$env = $_SERVER['ENV'];

if(isset($postData['amount'])){
    $_SESSION['publicKey'] = $publicKey;
    $_SESSION['secretKey'] = $secretKey;
    $_SESSION['env'] = $env;
    $_SESSION['successurl'] = $success_url;
    $_SESSION['failureurl'] = $failure_url;
    $_SESSION['currency'] = $postData['currency'];
    $_SESSION['amount'] = $postData['amount'];
}

$prefix = APP_PREFIX; // Change this to the name of your business or app
$overrideRef = false;

// Uncomment here to enforce the useage of your own ref else a ref will be generated for you automatically
if(isset($postData['ref'])){
    $prefix = $postData['ref'];
    $overrideRef = true;
}

$payment = new Rave($_SESSION['secretKey'], $prefix, $overrideRef);

function getURL($url,$data = array()){
    $urlArr = explode('?',$url);
    $params = array_merge($_GET, $data);
    $new_query_string = http_build_query($params).'&'.$urlArr[1];
    $newUrl = $urlArr[0].'?'.$new_query_string;
    return $newUrl;
};


// This is where you set how you want to handle the transaction at different stages
class myEventHandler implements EventHandlerInterface{
    /**
     * This is called when the Rave class is initialized
     * */
    function onInit($initializationData){
        // Save the transaction to your DB.
    }
    
    /**
     * This is called only when a transaction is successful
     * */
    function onSuccessful($transactionData){
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Comfirm that the transaction is successful
        // Confirm that the chargecode is 00 or 0
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
        if($transactionData->status === 'successful'){
          //print_r($transactionData);exit;
          hdev_data::payment_update($transactionData->tx_ref,$transactionData->id,$transactionData->status);
          if($transactionData->currency == $_SESSION['currency'] && $transactionData->amount == $_SESSION['amount']){
              
              if($_SESSION['publicKey']){
                    header('Location: '.getURL($_SESSION['successurl'], array('event' => 'successful')));
                    
                    hdev_session::payment_sess_destroy();
                }
          }else{
              if($_SESSION['publicKey']){
                    header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'suspicious')));
                    
                    hdev_session::payment_sess_destroy();
                }
          }
      }else{
          $this->onFailure($transactionData);
      }
    }
    
    /**
     * This is called only when a transaction failed
     * */
    function onFailure($transactionData){
        // Get the transaction from your DB using the transaction reference (txref)
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // You can also redirect to your failure page from here
        if($_SESSION['publicKey']){
            header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'failed')));
            
            hdev_session::payment_sess_destroy();
        }
    }
    
    /**
     * This is called when a transaction is requeryed from the payment gateway
     * */
    function onRequery($transactionReference){
        // Do something, anything!
    }
    
    /**
     * This is called a transaction requery returns with an error
     * */
    function onRequeryError($requeryResponse){
        echo 'the transaction was not found';
    }
    
    /**
     * This is called when a transaction is canceled by the user
     * */
    function onCancel($transactionReference){
        // Do something, anything!
        // Note: Somethings a payment can be successful, before a user clicks the cancel button so proceed with caution
        if($_SESSION['publicKey']){
            header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'canceled')));
            
            hdev_session::payment_sess_destroy();
        }
    }
    
    /**
     * This is called when a transaction doesn't return with a success or a failure response. This can be a timedout transaction on the Rave server or an abandoned transaction by the customer.
     * */
    function onTimeout($transactionReference, $data){
        // Get the transaction from your DB using the transaction reference (txref)
        // Queue it for requery. Preferably using a queue system. The requery should be about 15 minutes after.
        // Ask the customer to contact your support and you should escalate this issue to the flutterwave support team. Send this as an email and as a notification on the page. just incase the page timesout or disconnects
        if($_SESSION['publicKey']){
            header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'timedout')));
            
            hdev_session::payment_sess_destroy();
        }
    }
}

if(!isset($getData['status'])){
    // Make payment
    $payment
    ->eventHandler(new myEventHandler)
    ->setAmount($postData['amount'])
    ->setPaymentOptions($postData['payment_options']) // value can be card, account or both
    ->setDescription($postData['description'])
    ->setLogo($postData['logo'])
    ->setTitle($postData['title'])
    ->setCountry($postData['country'])
    ->setCurrency($postData['currency'])
    ->setEmail($postData['email'])
    ->setFirstname($postData['firstname'])
    ->setLastname($postData['lastname'])
    ->setPhoneNumber($postData['phonenumber'])
    ->setPayButtonText($postData['pay_button_text'])
    ->setRedirectUrl($URL)
    ->setMetaData(array('metaname' => 'pay_ment_id', 'metavalue' => '1233333')) // can be called multiple times. Uncomment this to add meta datas
    // ->setMetaData(array('metaname' => 'SomeOtherDataName', 'metavalue' => 'SomeOtherValue')) // can be called multiple times. Uncomment this to add meta datas
    ->initialize();
}else{
    if(isset($getData['cancelled'])){
        // Handle canceled payments
        $payment
        ->eventHandler(new myEventHandler)
        ->paymentCanceled($getData['cancelled']);
    }elseif(isset($getData['tx_ref'])){
        // Handle completed payments
        $payment->logger->notice('Payment completed. Now requerying payment.');
        $payment
        ->eventHandler(new myEventHandler)
        ->requeryTransaction($getData['transaction_id']);
    }else{
        $payment->logger->warn('Stop!!! Please pass the txref parameter!');
        echo 'Stop!!! Please pass the txref parameter!';
    }
}

?>
