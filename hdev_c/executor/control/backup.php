<?php 
	  /**
   * hdev backups
   */
  class hdev_backup
  {
    public static function backup($path='',$compression=false,$desc='RASMS Automatic backup according to a certain condition!',$ref='auto')
    {
      $path = (!empty($path)) ? $path : hdev_backup::get_backup_folder('','auto_folder');
      $dst_dir = $path;
      $init = new hdev_db('default');
      $DBH = $init->connect();
      $school_pass = (isset(hdev_data::get_school(hdev_log::school_id(),['data'])['year_1'])) ? hdev_data::get_school(hdev_log::school_id(),['data'])['year_1'] : "" ;
      $school = (isset(hdev_data::get_school(hdev_log::school_id(),['data'])['sc_name'])) ? hdev_data::get_school(hdev_log::school_id(),['data'])['sc_name']."--".hdev_data::get_school(hdev_log::school_id(),['data'])['year'] : "" ;
      $return = "";
      $return .= "<rasms_head>\r\n\r\n";
      $return .= "-- Rasms V.5 Backup by IZERE HIRWA ROGER( (c) HDEV Softwares), for Rasms V.5 or new\r\n";
      $return .= "-- on ".date("l").", ".date("d/m/Y h:i:s")."\r\n\r\n";
      $return .= "<rasms_sign>";
      $sign = "<rasms_access>";
      $sign .= hdev_data::encd($school_pass);
      $sign .= "</rasms_access>";
      $sign .= "<rasms_user>";
      $sign .= hdev_data::encd(hdev_data::get_user('user'));
      $sign .= "</rasms_user>";
      $sign .= "<rasms_ref>";
      $sign .= hdev_data::encd($school);
      $sign .= "</rasms_ref>";
      $sign .= "<rasms_desc>";
      $sign .= hdev_data::encd($desc);
      $sign .= "</rasms_desc>";
      $sign .= "<rasms_limit>";
      $sign .= date("d/m/Y h:i:s");
      $sign .= "</rasms_limit>";
      $return .= hdev_data::encd($sign);
      $return .= "</rasms_sign>";
      $return .= "\r\n\r\n</rasms_head>\r\n";
      $return .= "\r\n\r\n<rasms_data>\r\n";
      //exit($return);
      $DBH->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
      $fileName = 'Rasms_internal_Backup--'.time()."__".uniqid()."";
      //create/open files
      if ($compression)
      {
          $fileName .= '.rasms.gz';
          $zp = gzopen($dst_dir.'/'.$fileName, "a9");
      }else{
          $fileName .= '.rasms';
          $handle = fopen($dst_dir.'/'.$fileName,'a+');
      }
      $return1 = $return; 
      $return = "-- Rasms V.5 Backup by IZERE HIRWA ROGER( (c) HDEV Softwares), for Win64 (AMD64)\r\n--\r\n-- Host: localhost    Database: Rasms_Internal\r\n-- ------------------------------------------------------\r\n-- Server version   5-RASMS App\r\n\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;\r\n/*!40103 SET TIME_ZONE='+00:00' */;\r\n/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;\r\n/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;\r\n/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;\r\n/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;\r\n";
      //array of all database field types which just take numbers
      $numtypes=array('tinyint','smallint','mediumint','int','bigint','float','double','decimal','real');
      //get all of the tables
      if(empty($tables))
      {
          $pstm1 = $DBH->query('SHOW TABLES');
          while ($row = $pstm1->fetch(PDO::FETCH_NUM))
          {
              $tables[] = $row[0];
          }
      }else{
          $tables = is_array($tables) ? $tables : explode(',',$tables);
      }
      //cycle through the table(s)
      foreach($tables as $table)
      {
          $result = $DBH->query("SELECT * FROM $table");
          $num_fields = $result->columnCount();
          $num_rows = $result->rowCount();
          //uncomment below if you want 'DROP TABLE IF EXISTS' displayed
          $return.="\n--\r\n-- Table structure for table `".$table."`\r\n--\r\n\r\n"; 
          $return.= "DROP TABLE IF EXISTS `".$table."`;\r\n";
          //$return.= "TRUNCATE `".$table."`;\r\n";
          $return.="/*!40101 SET @saved_cs_client     = @@character_set_client */;\r\n";
          $return.="/*!40101 SET character_set_client = utf8 */;\r\n";
          //table structure
          $pstm2 = $DBH->query("SHOW CREATE TABLE $table");
          $row2 = $pstm2->fetch(PDO::FETCH_NUM);

          //$ifnotexists = str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $row2[1]);
          $ifnotexists = str_replace('CREATE TABLE', 'CREATE TABLE', $row2[1]);
          $return.= "".$ifnotexists.";\r\n";
          $return.= "/*!40101 SET character_set_client = @saved_cs_client */;\r\n";
          $return.= "\r\n";
          $return.= "--\r\n";
          $return.= "-- Dumping data for table `".$table."`\r\n";
          $return.= "--\r\n";
          $return.= "LOCK TABLES `".$table."` WRITE;\r\n";
          $return.= "/*!40000 ALTER TABLE `".$table."` DISABLE KEYS */;\r\n";

          //insert values
          if ($num_rows)
          {
              $return .= 'INSERT INTO `'."$table"."` (";
              $pstm3 = $DBH->query("SHOW COLUMNS FROM $table");
              $count = 0;
              $type = array();

              while ($rows = $pstm3->fetch(PDO::FETCH_NUM))
              {
                  if (stripos($rows[1], '('))
                  {
                      $type[$table][] = stristr($rows[1], '(', true);
                  }else{
                      $type[$table][] = $rows[1];
                  }
                  $return.= "`".$rows[0]."`";
                  $count++;
                  if ($count < ($pstm3->rowCount()))
                  {
                      $return.= ", ";
                  }
              }
              $return .= ")".' VALUES';
          }

          $count =0;
          while($row = $result->fetch(PDO::FETCH_NUM))
          {
              $return .= "(";
              for($j=0; $j<$num_fields; $j++)
              {
                  if (isset($row[$j]))
                  {
                      //if number, take away "". else leave as string
                      if ((in_array($type[$table][$j], $numtypes)) && $row[$j]!=='')
                      {
                          $return.= $row[$j];
                      }else{
                          $return.= $DBH->quote($row[$j]);
                      }
                  }else{
                      $return.= 'NULL';
                  }
                  if ($j<($num_fields-1))
                  {
                      $return.= ',';
                  }
              }
              $count++;
              if ($count < ($result->rowCount()))
              {
                  $return.= "),";
              }else{
                  $return.= ");";
              }
          }
          if ($count > 0) {
              $return.="\r\n";
          }
          $return .= "/*!40000 ALTER TABLE `".$table."` ENABLE KEYS */;\r\n";
          $return .= "UNLOCK TABLES;\r\n";
      }
      $return .= "/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;\r\n";
      $return .= "\r\n";
      $return .= "/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;\r\n";
      $return .= "/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;\r\n";
      $return .= "/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;\r\n";
      $return .= "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n";
      $return .= "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n";
      $return .= "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\r\n";
      $return .= "/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;";
      $return2 = hdev_data::encd($return);
      $return = $return1.$return2."";
      $return .= "\r\n</rasms_data>\r\n\r\n";
      $return .= "<rasms_footer>";
      $ret = strlen(trim(hdev_data::tag_value($return,'rasms_data')));
      $return .= hdev_data::encd($ret);
      $return .= "</rasms_footer>\r\n";
      $return .= "-- Rasms Backup completed on ".date("Y-m-d  h:i:s")." Hdev softwares, Mr Roger Done it\r\n";
      //echo $return;
      //exit();
      if ($compression)
      {
          gzwrite($zp, $return);
      }else{
          fwrite($handle,$return);
      }
      /*$error1= $pstm2->errorInfo();$error2= $pstm3->errorInfo();$error3= $result->errorInfo();echo $error1[2];echo $error2[2];echo $error3[2];*/

      $fileSize = 0;
      if ($compression)
      {
          gzclose($zp);
          $fileSize = filesize($dst_dir.'/'.$fileName);
      }else{
          fclose($handle);
          $fileSize = filesize($dst_dir.'/'.$fileName);
      }
      $ret = false;
      if (file_exists($dst_dir.'/'.$fileName)) {
        $ret = $dst_dir.'/'.$fileName;
      }
     // hdev_url::download($ret);
      return $ret;
    }
    public static function backup_info($contents='',$ret='')
    {
      $retur = false;

      if ($ret == 'sql') {
        $retur = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_data')));
      }elseif ($ret == 'access_code') {
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_sign')));
        $rev = hdev_data::decd(trim(hdev_data::tag_value($prev,'rasms_access')));
        $retur = $rev;
      }elseif ($ret == 'desc') {
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_sign')));
        $rev = hdev_data::decd(trim(hdev_data::tag_value($prev,'rasms_desc')));
        $retur = $rev;
      }elseif ($ret == 'user') {
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_sign')));
        $rev = hdev_data::decd(trim(hdev_data::tag_value($prev,'rasms_user')));
        $retur = $rev;
      }elseif ($ret == 'time') {
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_sign')));
        $rev = trim(hdev_data::tag_value($prev,'rasms_limit'));
        //$rev = hdev_data::date($rev,'date_time');
        $retur = $rev;
      }elseif ($ret == 'school') {
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_sign')));
        $rev = hdev_data::decd(trim(hdev_data::tag_value($prev,'rasms_ref')));
        $retur = $rev;
      }elseif ($ret == 'sql_length') {
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_footer')));
        $retur = $prev;
      }elseif ($ret == 'validated') {
        $retoo = strlen(trim(hdev_data::tag_value($contents,'rasms_data')));
        $reto = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_footer')));
        $retur = ($retoo == $reto) ? true : false;
      }elseif ($ret == 'access') {
        $school_pass = constant("school_code");
        $prev = hdev_data::decd(trim(hdev_data::tag_value($contents,'rasms_sign')));
        $rev = hdev_data::decd(trim(hdev_data::tag_value($prev,'rasms_access')));
        $retur = ($school_pass == $rev) ? true : false;
      }
      return $retur;
    }
    public static function bcp($path='',$ret='')
    {
      $retur = false;
      $file = $path;
      $filename = $file;
      if (file_exists($filename)) {
        $handle = fopen($filename,"r+");
        $contents = fread($handle,filesize($filename));
        $retur = hdev_backup::backup_info($contents,$ret);
        fclose($handle);
      }
      return $retur;
    }
    public static function get_backup_folder($file='',$ref='')
    {
      $retur = false;
      if ($ref == "manual") {
        $regpath = __DIR__;
        $target_path = realpath($regpath.'/../rasms_external')."\\";
        $target_path = str_ireplace('\\', '/', $target_path);
        $retur = $target_path.$file;
      }elseif ($ref == "auto") {
        $regpath = __DIR__;
        $target_path = realpath($regpath.'/../rasms_internal')."\\";
        $target_path = str_ireplace('\\', '/', $target_path);
        $retur = $target_path.$file;
      }elseif ($ref == "manual_folder") {
        $regpath = __DIR__;
        $target_path = realpath($regpath.'/../rasms_external');
        $target_path = str_ireplace('\\', '/', $target_path);
        $retur = $target_path;
      }elseif ($ref == "auto_folder") {
        $regpath = __DIR__;
        $target_path = realpath($regpath.'/../rasms_internal');
        $target_path = str_ireplace('\\', '/', $target_path);
        $retur = $target_path;
      }elseif ($ref == "files") {
        $regpath = __DIR__;
        $target_path = realpath($regpath.'/../rasms_internal')."\\";
        $target_path = str_ireplace('\\', '/', $target_path);
        $returr = $target_path.$file;
        $hash = explode('/', $returr);
        $hasho = (is_array($hash) && count($hash) > 0) ? count($hash) : 0;
        if ($hasho > 0) {
          $hashoo = $hasho-1;
          if (isset($hash[$hashoo])) {
            $retur = $hash[$hashoo];
          }
        }
      }
      return $retur;
    }
    public static function backup_temp($ref='',$val='')
    {
      $retur = false;
      if ($ref == "") {
        if (isset($_SESSION['backup']) && !empty($_SESSION['backup']) && $_SESSION['backup'] !='') {
          $retur = $_SESSION['backup'];
        }
      }elseif ($ref == 'set') {
        $_SESSION['backup'] = $val;
        $retur = true;
      }elseif ($ref == 'destroy') {
        $_SESSION['backup']='';
        $retur = true;
      }elseif ($ref = 'destroyall') {
        if (!is_null(hdev_data::directory(hdev_backup::get_backup_folder("","manual"))) && is_array(hdev_data::directory(hdev_backup::get_backup_folder("","manual")))) {

          foreach (hdev_data::directory(hdev_backup::get_backup_folder("","manual")) as $bcp) {
            if (file_exists($bcp)) {
              unlink($bcp);
            }
          }
        }
        $retur = true;
      }
      return $retur;
    }
    public static function import($path='',$ref='')
    {
      $file = $path;
      $filename = $file;
      $handle = fopen($filename,"r+");
      $contents = fread($handle,filesize($filename));
      //echo $contents;
      $retur = false;
      if (hdev_log::loged()) {
        if ($ref == 'preview') {
          $query = hdev_backup::backup_info($contents,'sql');
          $rt = New hdev_db('preview');
          if ($rt->insert($query) == "ok") {
            $retur = true;
          }else{
            $retur = false;
          }
        }elseif ($ref == 'default') {
          $query = hdev_backup::backup_info($contents,'sql');
          $rt = New hdev_db('default');
          if ($rt->insert($query) == "ok") {
            $retur = true;
          }else{
            $retur = false;
          }
        }
      } 
      return $retur;
    }
  }
 ?>