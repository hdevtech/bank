<?php 
  
  /**
   * display messge
   */
  class hdev_note
  {
    public static function message($value,$disp='0',$ref="no")
    {
      if ($disp == "0" || $disp=="1") {
        $val = "";
        $val .= "<script>alert('";
        $val .= $value;
        $val .= "')</script>";
        echo $val;
      }
      
      if ($disp == "1") {
       self::redirect(hdev_url::get_url_full());
      }
      if ($ref =="1") {
        $val = "";
        $val .= "<script>alert('";
        $val .= $value;
        $val .= "--- please contact the programmer : ";
        $val .= APP_PROGRAMMER['email'];
        $val .= "');</script>";
        echo $val;
        //log::out();
      } 
    }
    public static function success($value='',$vv='.mod_close')
    {
      echo "<b class='text-success'>".$value."</b>";
      echo "<script>
              setTimeout(function(){
                $('".$vv."').click();
                //attach();
              }, 1500);
              setTimeout(function(){
                attach();
              }, 2000);
            </script>";
      

    }
    public static function success_redirect($value='',$url="",$vv='.mod_close')
    {
      $url = (!empty($url)) ? $url : "" ;
      echo "<b class='text-success'>".$value."</b>";
      self::redirect($url);
      echo "<script>
              setTimeout(function(){
                $('".$vv."').click();
              }, 1500);
              setTimeout(function(){
                //attach('".$url."');
              }, 2000);
            </script>";
      

    }    
    public static function redirect($var)
    {
      $vk = "<script>window.location.href='".$var."';</script>";
      echo $vk;
      exit();
    }
    public static function live_sms($tel='',$msg='')
    {
      if (!hdev_data::phone_valid($tel) && !empty($msg)) {
        
        
        $sms = hdev_sms::send(constant("sms_api_sender"),$tel,$msg);
        return true;
        // code...
      }
    }

  } 
 ?>