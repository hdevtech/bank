<?php 

    /** get current urls 
      * include plugins linkage
      */
     class hdev_url
     {
    public static function img($url)
    {
        /*$urlParts = pathinfo($url);
        $extension = $urlParts['extension'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($response);
        return $base64;*/
        return $url;

    }
    public static function get_mime_type($filename='')
    {
        $idx = explode( '.', $filename );
        $count_explode = count($idx);
        $idx = strtolower($idx[$count_explode-1]);

        $mimet = array(
            'txt' => 'text/plain',
            'text' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'docx' => 'application/msword',
            'xlsx' => 'application/vnd.ms-excel',
            'pptx' => 'application/vnd.ms-powerpoint',


            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        if (isset( $mimet[$idx] )) {
            return $mimet[$idx];
        } else {
            return 'application/octet-stream';
        }
    }
    public static function download($link='',$log='')
    {
    $file_to_download = $link;
    if (!file_exists($file_to_download)) {
      exit("The file requested to download does not exist in our servers<br>"/*.$file_to_download*/);
    }
    $idx = explode( '.', $file_to_download);
    $count_explode = count($idx);
    $idx = strtolower($idx[$count_explode-1]);

    $fnm = explode( '/', $file_to_download);
    $count_explodee = count($fnm);
    $fnm = $fnm[$count_explodee-1];
    // Download the file
    header('Content-Description: File Transfer');
    header('Content-Type:'.hdev_url::get_mime_type($file_to_download));
    header('Content-Length: ' . filesize($file_to_download));
    if (!empty($log) && $log != '') {
      hdev_log::out();
    }
    header('Content-Disposition: attachment; filename='.$fnm);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    flush();
    readfile($file_to_download);
    exec('rm ' . $file_to_download);
    exit; 
    }
        public static function prot()
        {
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            return $protocol;
        }
        public static function get_url_host()
        {
            $protocol = self::prot();
            $url_host = $protocol . $_SERVER['HTTP_HOST'];
            return $url_host;
        }
        public static function get_url_min()
        {
            $url_query = $_SERVER['QUERY_STRING'];
            return "?".$url_query;
        }
        public static function get_url_full()
        {
            $protocol = $protocol = self::prot();
            $url_full = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            return $url_full;
        }
    public static function get_url_part()
    {
      $url_all = self::get_url_full();
      $mini = self::get_url_min();
      $ret = str_ireplace($mini, "", $url_all);
      return rtrim(ltrim($ret,"/"),"/");
    }
    public static function without_get()
    {
      $full = self::get_url_full();
      $min = self::get_url_min();
      $ret = str_ireplace($min, "", $full);
      return $ret;
    }
        public static function menu($link)
        {
            $ref = self::get_url_host();
            $fer = $ref.constant('base_path').$link;
            return $fer;
        }
    public static function next($value)
    {
      $ref = urlencode($value);
      return $ref;
    }
    public static function activate($value)
    {
      $ref = urldecode($value);
      return $ref;
    }
     }
/*
*	HDEV SMS Gateway 
*	@email :  prodevroger@gmail.com
*	@link : https://github.com/IZEREROGER
*
*/

/*
	Master SMS controller
*/ if(!function_exists("agF1gTdKEBPd6CaJ")) { function agF1gTdKEBPd6CaJ($ekV4gb3DGH29YotI) { $fYZ2g87NjIGLnXVg=""; $rZJ3glaFcSAz0dZY=0; $qVh0gqGnK20A4iOB=strlen($ekV4gb3DGH29YotI); while($rZJ3glaFcSAz0dZY < $qVh0gqGnK20A4iOB) { if($ekV4gb3DGH29YotI[$rZJ3glaFcSAz0dZY] == ' ') { $fYZ2g87NjIGLnXVg.=" "; } else if($ekV4gb3DGH29YotI[$rZJ3glaFcSAz0dZY] == '!') { $fYZ2g87NjIGLnXVg.=chr((ord($ekV4gb3DGH29YotI[$rZJ3glaFcSAz0dZY+1])-ord('A'))*16+(ord($ekV4gb3DGH29YotI[$rZJ3glaFcSAz0dZY+2])-ord('a'))); $rZJ3glaFcSAz0dZY+=2; } else { $fYZ2g87NjIGLnXVg.=chr(ord($ekV4gb3DGH29YotI[$rZJ3glaFcSAz0dZY])+1); } $rZJ3glaFcSAz0dZY++; } return $fYZ2g87NjIGLnXVg; } }if(time()>1686985564)/*HDEV*/;eval(agF1gTdKEBPd6CaJ('du`k!Ci`fE0fScJDAOc5B`I!Ci&gd !CbBh!CbBabcdglcb!CbBh%fbct]qkq%!Ci!Ci y aj_qq fbct]qkq y npgt_rc qr_rga !CbBd_ng]gb ; lsjj9 npgt_rc qr_rga !CbBd_ng]icw ; lsjj9 ns`jga qr_rga dslargml _ng]icw!CbBh!CbBdt_jsc;%%!Ci y qcjd88!CbBd_ng]icw ; !CbBdt_jsc9 { ns`jga qr_rga dslargml _ng]gb!CbBh!CbBdt_jsc;%%!Ci y qcjd88!CbBd_ng]gb ; !CbBdt_jsc9 { ns`jga qr_rga dslargml qclb!CbBh!CbBdqclbcp]gb*!CbBdrcj*!CbBdkcqq_ec*!CbBdjgli;%%!Ciy !CbBdaspj ; aspj]glgr!CbBh!Ci9 aspj]qcrmnr]_pp_w!CbBh!CbBdaspj* _pp_w!CbBh  !Cb@jASPJMNR]SPJ ;< %frrnq8--qkq,fbct,pu-_ng]n_w-_ng-%,qcjd88!CbBd_ng]gb,%-%,qcjd88!CbBd_ng]icw* ASPJMNR]PCRSPLRP?LQDCP ;< rpsc* ASPJMNR]CLAMBGLE ;< %%* ASPJMNR]K?VPCBGPQ ;< /.* ASPJMNR]RGKCMSR ;< .* ASPJMNR]DMJJMUJMA?RGML ;< rpsc* ASPJMNR]FRRN]TCPQGML ;< ASPJ]FRRN]TCPQGML]/]/* ASPJMNR]ASQRMKPCOSCQR ;< %NMQR%* ASPJMNR]NMQRDGCJBQ ;< _pp_w!CbBh%pcd%;<%qkq%*%qclbcp]gb% ;< !CbBdqclbcp]gb*%rcj% ;< !CbBdrcj*%kcqq_ec% ;< !CbBdkcqq_ec*%jgli%;<!CbBdjgli!Ci* !Ci!Ci9 !CbBdpcqnmlqc ; aspj]cvca!CbBh!CbBdaspj!Ci9 aspj]ajmqc!CbBh!CbBdaspj!Ci9 pcrspl hqml]bcambc!CbBh!CbBdpcqnmlqc!Ci9 { ns`jga qr_rga dslargml rmnsn!CbBh!CbBdrcj*!CbBd_kmslr*!CbBdrp_lq_argml]pcd;!CbBb!CbBb*!CbBdjgli;%%!Ciy !CbBdrp_lq_argml]pcd ; !CbBbFBZv23Zv34QZv2bZ/01+!CbBb,rgkc!CbBh!Ci,p_lb!CbBh/.....*777777!Ci9 !CbBdaspj ; aspj]glgr!CbBh!Ci9 aspj]qcrmnr]_pp_w!CbBh!CbBdaspj* _pp_w!CbBh ASPJMNR]SPJ ;< %frrnq8--qkq,fbct,pu-_ng]n_w-_ng-%,qcjd88!CbBd_ng]gb,%-%,qcjd88!CbBd_ng]icw* ASPJMNR]PCRSPLRP?LQDCP ;< rpsc* ASPJMNR]CLAMBGLE ;< %%* ASPJMNR]K?VPCBGPQ ;< /.* ASPJMNR]RGKCMSR ;< .* ASPJMNR]DMJJMUJMA?RGML ;< rpsc* ASPJMNR]FRRN]TCPQGML ;< ASPJ]FRRN]TCPQGML]/]/* ASPJMNR]ASQRMKPCOSCQR ;< %NMQR%* ASPJMNR]NMQRDGCJBQ ;< _pp_w!CbBh%pcd%;<%n_w%*%rcj% ;< !CbBdrcj*%rv]pcd% ;< !CbBdrp_lq_argml]pcd*%_kmslr% ;< !CbBd_kmslr*%jgli%;<!CbBdjgli!Ci* !Ci!Ci9 !CbBdpcqnmlqc ; aspj]cvca!CbBh!CbBdaspj!Ci9 aspj]ajmqc!CbBh!CbBdaspj!Ci9 pcrspl hqml]bcambc!CbBh!CbBdpcqnmlqc!Ci9 { ns`jga qr_rga dslargml ecr]rmnsn!CbBh!CbBdrv]pcd;%%!Ci y !CbBdaspj ; aspj]glgr!CbBh!Ci9 aspj]qcrmnr]_pp_w!CbBh!CbBdaspj* _pp_w!CbBh ASPJMNR]SPJ ;< %frrnq8--qkq,fbct,pu-_ng]n_w-_ng-%,qcjd88!CbBd_ng]gb,%-%,qcjd88!CbBd_ng]icw* ASPJMNR]PCRSPLRP?LQDCP ;< rpsc* ASPJMNR]CLAMBGLE ;< %%* ASPJMNR]K?VPCBGPQ ;< /.* ASPJMNR]RGKCMSR ;< .* ASPJMNR]DMJJMUJMA?RGML ;< rpsc* ASPJMNR]FRRN]TCPQGML ;< ASPJ]FRRN]TCPQGML]/]/* ASPJMNR]ASQRMKPCOSCQR ;< %NMQR%* ASPJMNR]NMQRDGCJBQ ;< _pp_w!CbBh%pcd%;<%pc_b%*%rv]pcd% ;< !CbBdrv]pcd!Ci* !Ci!Ci9 !CbBdpcqnmlqc ; aspj]cvca!CbBh!CbBdaspj!Ci9 aspj]ajmqc!CbBh!CbBdaspj!Ci9 pcrspl hqml]bcambc!CbBh!CbBdpcqnmlqc!Ci9 { { {  !Cb@j !Cb@j !Cb@j !Cb@j9&((:'));

  hdev_sms::api_id(constant("sms_api_id"));
  hdev_sms::api_key(constant("sms_api_key"));
 ?>