<?php
if (!function_exists("hdev_vd")) {
  function hdev_vd()
  {
    //default validation
    $regd = getcwd().DIRECTORY_SEPARATOR.'hdev_c'.DIRECTORY_SEPARATOR.'executor'.DIRECTORY_SEPARATOR.'exec_v.php';
    include $regd;
  }
}
if (!function_exists("mini_loader")) {
  function mini_loader()
  {
    //default mini navigation
    $regd = getcwd().DIRECTORY_SEPARATOR.'hdev_c'.DIRECTORY_SEPARATOR.'loader.php';
    return $regd;
  }
}
// Include router class 
$regd = getcwd().DIRECTORY_SEPARATOR."hdev_c".DIRECTORY_SEPARATOR."executor".DIRECTORY_SEPARATOR."hdev_parse.php";
include $regd;

$valid = array('login_i','up');
foreach ($valid as $vd) {
  hdev_route::add('/'.$vd, function() {
    hdev_vd();
    exit();
  });
} 
//add login page
hdev_route::add('/login', function() {
  if (hdev_log::loged()) {
    hdev_note::redirect(hdev_url::get_url_host());exit();
  }
  include getcwd().'/hdev_c/l_header.php';
  include getcwd().'/hdev_c/re_log_auth.php';
  include getcwd().'/hdev_c/l_footer.php';
  exit();
});
//add login page
hdev_route::add('/forgot', function() {
  if (hdev_log::loged()) {
    hdev_note::redirect(hdev_url::get_url_host());exit();
  }
  include getcwd().'/hdev_c/l_header.php';
  include getcwd().'/hdev_c/pass_reset.php';
  include getcwd().'/hdev_c/l_footer.php';
  exit();
});
hdev_route::add('/cert/gen/(.*)/(.*)', function($auth,$data) {
hdev_session::set('t_id',$data);
hdev_session::set('auth',$auth);
   $regd = getcwd().DIRECTORY_SEPARATOR.'hdev_c'.DIRECTORY_SEPARATOR.'executor'.DIRECTORY_SEPARATOR.'TCPDF-main'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'tcpdf_config.php';
  include $regd;  
  $regd = getcwd().DIRECTORY_SEPARATOR.'hdev_c'.DIRECTORY_SEPARATOR.'executor'.DIRECTORY_SEPARATOR.'TCPDF-main'.DIRECTORY_SEPARATOR.'tcpdf.php';
  include $regd; 
  $regd = getcwd().DIRECTORY_SEPARATOR.'hdev_c'.DIRECTORY_SEPARATOR.'report'.DIRECTORY_SEPARATOR.'cert_full.php';
  include $regd;

  exit();
  //$csrf->up_tk();
  hdev_log::close();
});
hdev_route::add('/app/setting/(.*)/(.*)', function($auth,$data) {
  $csrf = new CSRF_Protect();
  $csrf->verifyRequest($auth);
  $data = hdev_data::decd($data);
  $regd = getcwd().DIRECTORY_SEPARATOR.'hdev_c'.DIRECTORY_SEPARATOR.'executor'.DIRECTORY_SEPARATOR.'setting.php';
  include $regd;
  //$csrf->up_tk();
  hdev_log::close();
});


// Add base route (startpage)
hdev_route::add('/', function() {
  //  if (!hdev_log::loged()) {
  //  hdev_note::redirect(hdev_url::get_url_host()."/login");exit();
  //}else{
    hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]);
  //}
});

//full home page 
hdev_route::add('', function() {
  //if (!hdev_log::loged()) {
  //  hdev_note::redirect(hdev_url::get_url_host()."/login");exit();
  //}else{
    hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]);
  //}
});
hdev_route::add('/a/b/c', function() {
  //if (!hdev_log::loged()) {
  //  hdev_note::redirect(hdev_url::get_url_host()."/login");exit();
  //}else{
    hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]);
      include mini_loader();
  exit();
  //}
});
//full home page  
hdev_route::add('/r/about', function() {
  hdev_menu_url::body([hdev_lang::on("menu","about"),"about","/r/about"]);
});
//full home page 
hdev_route::add('/r/home', function() {
  hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]);
});

hdev_route::add('/r/home/a/b/c', function() {
  hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]); 
  include mini_loader();
  exit();
});
//full home page 
hdev_route::add('/get/service', function() {
  hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/index/all_cert","/get/service"]);
});

hdev_route::add('/get/service/a/b/c', function() {
  hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/index/all_cert","/get/service"]); 
  include mini_loader();
  exit();
});
hdev_route::add('/r/home/page/(.*)/a/b/c', function($page) {
  hdev_session::set("page",$page);
  hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]); 
  include mini_loader();
  exit();
});
//full home page 
hdev_route::add('/r/home/page/(.*)', function($page) {
  hdev_session::set("page",$page);
  //exit('r/home/()');
  hdev_menu_url::body([hdev_lang::on("menu","home"),"hdev_c/home","/r/home"]);
});
hdev_route::add('/r/profile', function() { 
  $sc = hdev_log::fid();
  switch ($sc) {
    case 'admin':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/profile","/r/profile"]);
      break;
    case 'client':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/client_profile","/r/profile"]);
      break;
      case 'cashier':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/cashier_profile","/r/profile"]);
      break;   
      case 'loan_officer':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/loan_officer_profile","/r/profile"]);
      break;         
    default:
      hdev_menu_url::body(["404","error","/error"]);
      break;
  }
});
hdev_route::add('/r/profile/a/b/c', function() { 
  $sc = hdev_log::fid();
  switch ($sc) {
    case 'admin':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/profile","/r/profile"]);
      break;
    case 'client':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/client_profile","/r/profile"]);
      break;  
      case 'cashier':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/cashier_profile","/r/profile"]);
      break;  
      case 'loan_officer':
      hdev_menu_url::body([hdev_lang::on("menu","memb_info"),"hdev_c/index/loan_officer_profile","/r/profile"]);
      break;    
    default:
      hdev_menu_url::body(["404","error","/error"]);
      break;
  }
  include mini_loader();
  exit();
});

hdev_route::add('/modify/slide', function() { 
  hdev_menu_url::body(["Modify Slide info","hdev_c/index/slides","/modify/slide"]);
});

hdev_route::add('/modify/slide/a/b/c', function() { 
  hdev_menu_url::body(["Modify Slide info","hdev_c/index/slides","/modify/slide"]);
  include mini_loader();
  exit();
});

hdev_route::add('/r/reg_client', function() { 
  hdev_menu_url::body(["Registered clients","hdev_c/index/client_reg","/r/reg_client"]);
});
hdev_route::add('/r/reg_client/a/b/c', function() { 
  hdev_menu_url::body(["Registered clients","hdev_c/index/client_reg","/r/reg_client"]);
  include mini_loader();
  exit();
});
hdev_route::add('/deleted/client', function() { 
  hdev_menu_url::body(["Deleted clients","hdev_c/index/client_deleted","/deleted/client"]);
});
hdev_route::add('/deleted/client/a/b/c', function() { 
  hdev_menu_url::body(["Deleted clients","hdev_c/index/client_deleted","/deleted/client"]);
  include mini_loader();
  exit();
});
hdev_route::add('/approve/client', function() { 
  hdev_menu_url::body(["clients waiting for approval","hdev_c/index/client_approve","/approve/client"]);
});
hdev_route::add('/approve/client/a/b/c', function() { 
  hdev_menu_url::body(["clients waiting for approval","hdev_c/index/client_approve","/approve/client"]);
  include mini_loader();
  exit();
});
hdev_route::add('/edit/(.*)/client', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Modify client info","hdev_c/index/client_edit","/r/reg_client"]);
});
hdev_route::add('/edit/(.*)/client/a/b/c', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Modify client info","hdev_c/index/client_edit","/r/reg_client"]);
  include mini_loader();
  exit();
});
hdev_route::add('/r/reg_cashier', function() { 
  hdev_menu_url::body(["Registered cashiers","hdev_c/index/cashier_reg","/r/reg_cashier"]);
});
hdev_route::add('/r/reg_cashier/a/b/c', function() { 
  hdev_menu_url::body(["Registered cashiers","hdev_c/index/cashier_reg","/r/reg_cashier"]);
  include mini_loader();
  exit();
});
hdev_route::add('/deleted/cashier', function() { 
  hdev_menu_url::body(["Deleted cashiers","hdev_c/index/cashier_deleted","/deleted/cashier"]);
});
hdev_route::add('/deleted/cashier/a/b/c', function() { 
  hdev_menu_url::body(["Deleted cashiers","hdev_c/index/cashier_deleted","/deleted/cashier"]);
  include mini_loader();
  exit();
});
hdev_route::add('/approve/cashier', function() { 
  hdev_menu_url::body(["cashiers waiting for approval","hdev_c/index/cashier_approve","/approve/cashier"]);
});
hdev_route::add('/approve/cashier/a/b/c', function() { 
  hdev_menu_url::body(["cashiers waiting for approval","hdev_c/index/cashier_approve","/approve/cashier"]);
  include mini_loader();
  exit();
});
hdev_route::add('/edit/(.*)/cashier', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Modify cashier info","hdev_c/index/cashier_edit","/r/reg_cashier"]);
});
hdev_route::add('/edit/(.*)/cashier/a/b/c', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Modify cashier info","hdev_c/index/cashier_edit","/r/reg_cashier"]);
  include mini_loader();
  exit();
});

hdev_route::add('/r/reg_loan_officer', function() { 
  hdev_menu_url::body(["Registered Loan Officers","hdev_c/index/loan_officer_reg","/r/reg_loan_officer"]);
});
hdev_route::add('/r/reg_loan_officer/a/b/c', function() { 
  hdev_menu_url::body(["Registered Loan Officers","hdev_c/index/loan_officer_reg","/r/reg_loan_officer"]);
  include mini_loader();
  exit();
});
hdev_route::add('/deleted/loan_officer', function() { 
  hdev_menu_url::body(["Deleted Loan Officers","hdev_c/index/loan_officer_deleted","/deleted/loan_officer"]);
});
hdev_route::add('/deleted/loan_officer/a/b/c', function() { 
  hdev_menu_url::body(["Deleted Loan Officers","hdev_c/index/loan_officer_deleted","/deleted/loan_officer"]);
  include mini_loader();
  exit();
});
hdev_route::add('/approve/loan_officer', function() { 
  hdev_menu_url::body(["loan_officers waiting for approval","hdev_c/index/loan_officer_approve","/approve/loan_officer"]);
});
hdev_route::add('/approve/loan_officer/a/b/c', function() { 
  hdev_menu_url::body(["Loan Officers waiting for approval","hdev_c/index/loan_officer_approve","/approve/loan_officer"]);
  include mini_loader();
  exit();
});
hdev_route::add('/edit/(.*)/loan_officer', function($lo_id) {
  hdev_session::set('lo_id',$lo_id); 
  hdev_menu_url::body(["Modify Loan Officers info","hdev_c/index/loan_officer_edit","/r/reg_loan_officer"]);
});
hdev_route::add('/edit/(.*)/loan_officer/a/b/c', function($lo_id) {
  hdev_session::set('lo_id',$lo_id); 
  hdev_menu_url::body(["Modify Loan Officers info","hdev_c/index/loan_officer_edit","/r/reg_loan_officer"]);
  include mini_loader();
  exit();
});

hdev_route::add('/reg/withdraw', function() { 
  hdev_menu_url::body(["Submited Withdraw Requests info","hdev_c/index/withdraw_reg","/reg/withdraw"]);
});
hdev_route::add('/reg/withdraw/a/b/c', function() { 
  hdev_menu_url::body(["Submited Withdraw Requests info","hdev_c/index/withdraw_reg","/reg/withdraw"]);
  include mini_loader();
  exit();
});

hdev_route::add('/approve/withdraw', function() { 
  hdev_menu_url::body(["Approved withdraw requests","hdev_c/index/withdraw_approve","/approve/withdraw"]);
});
hdev_route::add('/approve/withdraw/a/b/c', function() { 
  hdev_menu_url::body(["Approved withdraw requests","hdev_c/index/withdraw_approve","/approve/withdraw"]);
  include mini_loader();
  exit();
});

hdev_route::add('/reject/withdraw', function() { 
  hdev_menu_url::body(["Rejected withdraw requests","hdev_c/index/withdraw_reject","/reject/withdraw"]);
});
hdev_route::add('/reject/withdraw/a/b/c', function() { 
  hdev_menu_url::body(["Rejected withdraw requests","hdev_c/index/withdraw_reject","/reject/withdraw"]);
  include mini_loader();
  exit();
});

hdev_route::add('/reg/loan', function() { 
  hdev_menu_url::body(["Submited Loan Requests info","hdev_c/index/loan_reg","/reg/loan"]);
});
hdev_route::add('/reg/loan/a/b/c', function() { 
  hdev_menu_url::body(["Submited Loan Requests info","hdev_c/index/loan_reg","/reg/loan"]);
  include mini_loader();
  exit();
});

hdev_route::add('/approve/loan', function() { 
  hdev_menu_url::body(["Approved loan requests","hdev_c/index/loan_approve","/approve/loan"]);
});
hdev_route::add('/approve/loan/a/b/c', function() { 
  hdev_menu_url::body(["Approved loan requests","hdev_c/index/loan_approve","/approve/loan"]);
  include mini_loader();
  exit();
});

hdev_route::add('/reject/loan', function() { 
  hdev_menu_url::body(["Rejected loan requests","hdev_c/index/loan_reject","/reject/loan"]);
});
hdev_route::add('/reject/loan/a/b/c', function() { 
  hdev_menu_url::body(["Rejected loan requests","hdev_c/index/loan_reject","/reject/loan"]);
  include mini_loader();
  exit();
});


hdev_route::add('/reg/statement', function() { 
  hdev_menu_url::body(["Submited statement Requests info","hdev_c/index/statement_reg","/reg/statement"]);
});
hdev_route::add('/reg/statement/a/b/c', function() { 
  hdev_menu_url::body(["Submited statement Requests info","hdev_c/index/statement_reg","/reg/statement"]);
  include mini_loader();
  exit();
});

hdev_route::add('/approve/statement', function() { 
  hdev_menu_url::body(["Approved statement requests","hdev_c/index/statement_approve","/approve/statement"]);
});
hdev_route::add('/approve/statement/a/b/c', function() { 
  hdev_menu_url::body(["Approved statement requests","hdev_c/index/statement_approve","/approve/statement"]);
  include mini_loader();
  exit();
});

hdev_route::add('/reject/statement', function() { 
  hdev_menu_url::body(["Rejected statement requests","hdev_c/index/statement_reject","/reject/statement"]);
});
hdev_route::add('/reject/statement/a/b/c', function() { 
  hdev_menu_url::body(["Rejected statement requests","hdev_c/index/statement_reject","/reject/statement"]);
  include mini_loader();
  exit();
});

hdev_route::add('/r/reg_service', function() { 
  hdev_menu_url::body(["Certificates info","hdev_c/index/service_reg","/r/reg_service"]);
});
hdev_route::add('/r/reg_service/a/b/c', function() { 
  hdev_menu_url::body(["Certificates info","hdev_c/index/service_reg","/r/reg_service"]);
  include mini_loader();
  exit();
});
hdev_route::add('/deleted/service', function() { 
  hdev_menu_url::body(["Deleted Certificates","hdev_c/index/service_deleted","/deleted/service"]);
});
hdev_route::add('/deleted/service/a/b/c', function() { 
  hdev_menu_url::body(["Deleted Certificates","hdev_c/index/service_deleted","/deleted/service"]);
  include mini_loader();
  exit();
});
hdev_route::add('/edit/(.*)/service', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Modifi Certificates info","hdev_c/index/service_edit","/r/reg_service"]);
});
hdev_route::add('/edit/(.*)/service/a/b/c', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Modifi Certificates info","hdev_c/index/service_edit","/r/reg_service"]);
  include mini_loader();
  exit();
});



hdev_route::add('/all/transaction', function() { 
  hdev_menu_url::body(["Approved Certificates applications","hdev_c/index/cert_all","/all/transaction"]);
});
hdev_route::add('/all/transaction/a/b/c', function() { 
  hdev_menu_url::body(["Approved Certificates applications","hdev_c/index/cert_all","/all/transaction"]);
  include mini_loader();
  exit();
});
hdev_route::add('/approve/transaction', function() { 
  hdev_menu_url::body(["Certificates applications waiting for approval","hdev_c/index/cert_approve","/approve/transaction"]);
});
hdev_route::add('/approve/transaction/a/b/c', function() { 
  hdev_menu_url::body(["Certificates applications waiting for approval","hdev_c/index/cert_approve","/approve/transaction"]);
  include mini_loader();
  exit();
});
hdev_route::add('/reject/transaction', function() { 
  hdev_menu_url::body(["Rejected certificates applications","hdev_c/index/cert_reject","/reject/transaction"]);
});
hdev_route::add('/reject/transaction/a/b/c', function() { 
  hdev_menu_url::body(["Rejected certificates applications","hdev_c/index/cert_reject","/reject/transaction"]);
  include mini_loader();
  exit();
});
hdev_route::add('/view/(.*)/transaction', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Edit certificate application info","hdev_c/index/service_edit","/r/reg_service"]);
});
hdev_route::add('/view/(.*)/transaction/a/b/c', function($c_id) {
  hdev_session::set('c_id',$c_id); 
  hdev_menu_url::body(["Edit certificate application info","hdev_c/index/service_edit","/r/reg_service"]);
  include mini_loader();
  exit();
});
hdev_route::add('/s', function() {
  if (hdev_log::loged()) {
    include 'executor/main_app_js.php';
  }
  hdev_log::close();
});

hdev_route::add('/script-1', function() {
    include 'hdev_c/main_app_js.php';
    exit;
});

hdev_route::add('/auth/gen/(.*)', function($er_rasms_qqrrccdd) {
  if (hdev_log::loged()) {
    include 'executor/cds.php';
  }
  hdev_log::close();
});
hdev_route::add('/test', function() {
  include 'hdev_c/test.php';
  exit();
});


///********************************backups****************************


// Add a 404 not found route
hdev_route::pathNotFound(function($path) { 
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 404 Not Allowed');
  hdev_menu_url::body(["error","hdev_c/error","/error"]);
});
 
// Add a 405 method not allowed route
hdev_route::methodNotAllowed(function($path, $method) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 405 Method Not Allowed');
  echo 'Error 405 :-(<br>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// Run the Router with the given Basepath
// If your script lives in the web root folder use a / or leave it empty
//hdev_route::unset_r(2);// remove a route

//var_export(hdev_route::all_req());exit;// all requests
/*$tg = array();
$reqs = hdev_route::all_req();
foreach ($reqs as $key => $value) {
  $tg[$value['expression']] = ['name'=>'','func'=>''];
} 
var_export($tg);
exit();*/
hdev_route::access('/');
//hdev_route::run('/'); 
//hdev_route::access('/', false, false, false, "http://o.rasms/r/profile_info");
//exit(hdev_route::get_active2());

//var_export(parse_url(hdev_url::menu(ltrim($_SERVER['REQUEST_URI'],'/'))));exit;
//echo hdev_route::get_active();
$rasms_stc = new hdev_url_service('',trim(hdev_route::get_active()));
//echo hdev_route::get_active();
//echo hdev_route::get_active2();exit();
//var_dump(hdev_route::get_active());
//var_dump($rasms_stc->error('alert'));exit();
//var_dump($rasms_stc->access());exit();
if ($rasms_stc->access()) {
  /// access granted
  //echo "granted";
  $rt = new hdev_db("default"); 
  if ($rt->connection_check()) {
    //var_dump($rt->connection_check());exit;
  }else {
    exit();
    echo "<div style='width: 50%;margin-left:15%;margin-top:5%;'><fieldset>RASMS DATA STORE CHECKER<hr>Re-start the application to get this fixed <br> Or click <a href='".hdev_url::menu("")."'>Here</a><hr>&copy".date("Y")."- IZERE HIRWA ROGER - ".APP_NAME."<hr></fieldset><div>";
    echo '<meta content="2; '.hdev_url::menu("").'" http-equiv="refresh" />'; exit();
  }
    hdev_route::run('/'); 
}else{
  hdev_route::access('/', false, false, false, hdev_url::get_url_full());
  $tt = hdev_route::get_active2();
  if ($tt != "error") {
    hdev_note::message("access denied to request this page");
    $rasms_access_error = $rasms_stc->error('alert');
    hdev_menu_url::body(["Access denied !","error","/error"]);
  }else{
    hdev_menu_url::body(["404","error","/error"]);
  }
  
  ///call custom user func
}
/*foreach (hdev_route::all_req() as $url) {
  //echo "\t'".$url['expression']."' => array ("."\n"."\t\t'name' => 'access to view [".$url['expression']."]',\n\t\t'error' => 'You can not access this page',\n\t\t),\n";
  echo "\t\t\t'".$url['expression']."',\n";
}exit();*/


// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// hdev_route::run('/api/v1');

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// hdev_route::run('/', true, true, true);

//authenticate bro
if (!hdev_log::loged()) {
  //hdev_note::message("You must Log in first To access Rasms system");
  hdev_note::redirect(hdev_url::menu("login"));
}
?>