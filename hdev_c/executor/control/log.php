<?php 
  
  /**
   * login or temporary data
   */
  class hdev_log
  {
    public static function wait($time="")
    {
      $tt = 10;
      if (is_numeric($time) && $time > 0) {
        $tt = $time;
      }
      sleep($tt);
    }
    public static function out()
    {
      session_unset();
      session_destroy(); 
      if (isset($_GET['nxt']) && !empty($_GET["nxt"])) {
        hdev_note::redirect(hdev_url::activate($_GET["nxt"]));
      }else{
        //hdev_note::message("loged out");
        hdev_note::redirect(hdev_url::menu(""));
      }

    }
    public static function uid()
    {
      if (isset($_SESSION['msg_id_id']) && !empty($_SESSION['msg_id_id'])) {
        return $_SESSION['msg_id_id'];
      }else{
        return '';
      }
    }
    public static function fid()
    {
      if (isset($_SESSION['ffunct']) && !empty($_SESSION['ffunct'])) {
        return $_SESSION['ffunct'];
      }else{
        return 'guest';
      }
    }
    public static function admin()
    {
      $user = self::fid();
      if ($user == "admin") {
        return true;
      }else{
        return false;
      }
    }        
    public static function loged()
    {
      if (!empty($_SESSION['msg_id_id'])) {
        return true;
      }else{
        return false;
      }
    }
    public static function close()
    {
      if (self::loged()) {
        exit();
      }
    }
    public static function qr_folder()
    {
      $regpath = __DIR__;
      $regg = $regpath;
      return realpath($regg)."\qr_3";
    }
    public static function qr_url_term($value='')
    {
      $vv = urlencode(hdev_data::encd($value));
      return hdev_url::menu("auth/gen".'/'.$vv);
    }   
  }

  /**
   * upload plugin
   */
  class hdev_form
  {
    
    function __construct()
    {
      // code...
    }
    public static function upload($file='',$dir='')
    {
          $dir = ($dir != '') ? $dir : getcwd().DIRECTORY_SEPARATOR."dist".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."docs".DIRECTORY_SEPARATOR;
          $up_files_array = $_FILES[$file];
          $countfiles = (is_array($up_files_array)) ? count($up_files_array) : 1 ;;
          $files_array = array();
          //var_dump($up_files_array['tmp_name']);
          //exit();
            if (file_exists($up_files_array["tmp_name"])) {
              $file_type = $up_files_array["type"]; //returns the mimetype
              $allowed = array("image/jpeg", "image/gif", "image/png");
              if(!in_array($file_type, $allowed)) {
                exit("only images .jpeg, .gif, and .png Are allowed in this file upload");
              }else{
                $ckup="";
                // Check file size
                if ($up_files_array["size"] > 50000000) {
                    $ckup = 1;
                }

                $fileData = pathinfo(basename($up_files_array["name"]));
                $fileName = "trans"."_upload_".uniqid() ."_t_".time() .'.' . $fileData['extension'];
                $regpath = __DIR__;
                $target_path = $dir.$fileName;
                while(file_exists($target_path))
                {
                    $fileName = "trans"."_upload_".uniqid() ."_t_".time() .'.' . $fileData['extension'];
                  $regpath = __DIR__;
                  $target_path = $dir.$fileName;
                }
                if ($ckup == "") {
                  if (move_uploaded_file($up_files_array["tmp_name"], $target_path))
                  {
                    array_push($files_array, $fileName);
                  }
                }
              }
            }
          $reft = "";
          $exp = ".,*HDEV_prod*.,";
          foreach ($files_array as $key) {
            $reft .= $exp.$key;
          }
          if (strlen($reft) > strlen($exp)) {
            $reft = substr($reft, strlen($exp));
          }
          $upphoto = explode($exp, $reft);
          $var = count($upphoto);
          $ret = array();
          if (isset($upphoto) && !empty($upphoto) && $var >= 0 && isset($upphoto[0]) && !empty($upphoto[0]) && strlen($upphoto[0]) > 25) {
              $ret['message'] = "ok";
              $ret['name'] = $reft;
              
          }else{
            $ret['message'] = "something went wrong try again later";
            $ret['name'] = "";
          }
          return $ret;
    }
  }
 ?>