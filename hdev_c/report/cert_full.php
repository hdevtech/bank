<?php
if ((hdev_session::get('auth') != 'preview') || (hdev_log::fid() != "admin")) {
  $transaction = hdev_session::get('t_id');
  $transaction_data = hdev_data::application($transaction,['data']);
  if (!isset($transaction_data['t_id'])) {
  	exit('Certificate application with Reg_no: '.$transaction.' was not found!');
  }elseif ($transaction_data['t_status']==3) {
    exit('<b style="color: red;">Certificate application with Reg_no: '.$transaction_data['t_id'].' was Rejected!</b>');
  }elseif ($transaction_data['t_status']!=1) {
  	exit('Certificate application with Reg_no: '.$transaction_data['t_id'].' was not found!');
  }

  if (hdev_session::get('auth') != 'qrcode-verify') {
    if (!hdev_log::loged()) {
      exit('You must Log in first');
    }
    if (hdev_log::fid() == "citizen") {
      if ($transaction_data['c_id'] != hdev_log::uid()) {
        exit('Not allowed to view this certificate');
      }
    }
  }

  $service = hdev_data::service_data($transaction_data['s_id'],['data']);
  if (!isset($service['s_id'])) {
  	exit('This service with Reg_no:'.$transaction_data['s_id'].' has aproblem plase visit the leaders for more info!');
  }elseif ($service['s_status']!=1) {
  	exit('This service with Reg_no:'.$service['s_id'].' has aproblem plase visit the leaders for more info!');
  }

  $citizen = hdev_data::citizen($transaction_data['c_id'],['data']);
  if (!isset($citizen['c_id'])) {
  	exit('citizen account with Reg_no:'.$transaction_data['c_id'].' has a problem plase visit the leaders for more info!');
  }elseif ($citizen['c_status']!=1) {
  	exit('citizen account with Reg_no:'.$citizen['c_id'].' has a problem plase visit the leaders for more info!');
  }

  $admin = hdev_data::get_admin($transaction_data['a_id'],['data']);
  if (!isset($admin['a_id'])) {
  	exit('there is a problem with leader account with Reg_no:'.$transaction_data['a_id'].' visit the leaders for more info!');
  }

  $location = hdev_data::locations("all",$citizen['loc_id']);
}else{
  //// for preview
  $service_id = hdev_session::get('t_id');

  $transaction_data = array('t_id' => 'Certificate_application_no','s_id' => $service_id,'c_id' => 'citizen_reg_no','t_status' => '1','a_id' => 'Admin_reg_no','t_reg_date' => 'cert_application_date');

  $citizen = array('c_id' => 'citizen_reg_no','c_name' => 'citizen_name','c_nid' => 'citizen_national_id','c_dob' => 'citizen_dob','c_tell' => 'citizen_tell','c_email' => 'citizen_email','loc_id' => '1','c_reg_date' => '2022-06-25 23:15:54','c_status' => '1');
  $admin = array("a_name"=>"Admin_name","a_id"=>"Admin_reg_no");
  $location = array('loc_id' => 'sys_location_id','ship_price' => '0.00','loc_province' => 'sys_location_province','loc_district' => 'sys_location_district','loc_sector' => 'sys_location_sector','loc_cell' => 'sys_location_cell','loc_village' => 'sys_location_village','loc_status' => '1');

  $service = hdev_data::service_data($service_id,['data']);
  if (!isset($service['s_id'])) {
    exit('This service with Reg_no:'.$service_id.' has aproblem plase visit the leaders for more info!');
  }elseif ($service['s_status']!=1) {
    exit('This service with Reg_no:'.$service['s_id'].' has aproblem plase visit the leaders for more info!');
  }
}



//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		
		// Set font
		//$this->SetFont('helvetica', 'B', 20);
		// Title
		//// og hide $this->Cell(0, 10, APP_NAME, 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages()." - Printed on :"."' ".date("d-m-Y, h:i:s")." '", 0, false, 'C', 0, '', 0, false, 'T', 'M');
		// QRCODE,L : QR-CODE Low error correction
		// set style for barcode
		//$pdf->Text(20, 25, 'QRCODE L');
		// ---------------------------------------------------------

	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('https://izereroger.github.io');
$pdf->SetAuthor(APP_NAME);
$pdf->SetTitle($citizen['c_name'].'-'.$service['s_name']);
$pdf->SetSubject($service['s_name']);
$pdf->SetKeywords($service['s_name'].','.$citizen['c_name']);

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();
$from = (isset($_SESSION['from'])) ? $_SESSION['from'] : "" ;
$to = (isset($_SESSION['to'])) ? $_SESSION['to'] : "" ;
$styleQR = array('border' => 0, 'vpadding' => '0', 'hpadding' => '0', 'fgcolor' => array(0, 0, 0), 'bgcolor' => false, 'module_width' => 1, 'module_height' => 1);
if (hdev_session::get('auth') == "preview") {
  $params = $pdf->serializeTCPDFtagParameters(array(hdev_url::menu('cert/gen/preview/'.$transaction_data['s_id']), 'QRCODE,H', 20, 210, 50, 50, $styleQR, 'N'));
}else{
  $params = $pdf->serializeTCPDFtagParameters(array(hdev_url::menu('cert/gen/qrcode-verify/'.$transaction_data['t_id']), 'QRCODE,H', 20, 210, 50, 50, $styleQR, 'N'));
}

    $head='
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Border around content</title>
  <style type="text/css">

    #wrapper {
      
    }
  </style>
</head>
<body>
  <div id="wrapper" style="position: absolute;overflow: auto;left: 0;right: 0;top: 0;bottom: 0;padding: 10px;border: 2px solid black;">
    <div align="right">On, '.date('d/m/Y').'</div>
    <table style="padding: 5px;">
        <tr>
          <td>Republic of Rwanda</td>
        </tr>
        <tr>
          <td>Province : '.$location['loc_province'].'</td>
        </tr>
        <tr>
          <td>District : '.$location['loc_district'].'</td>
        </tr>
        <tr>
          <td>Sector : '.$location['loc_sector'].'</td>
        </tr>
        <tr>
          <td>Cell : '.$location['loc_cell'].'</td>
        </tr>
        <tr>
          <td>Village : '.$location['loc_village'].'</td>
        </tr>
    </table>
    <br>
    <div align="center">
      <u><b style="font-size:20;"><u>'.$service['s_name'].' (N<sup><u>o</u></sup>: '.$transaction_data['t_id'].')</b></u>
    </div>
    <div align="center" style="font-size:12;">
    	<p>
      	<b>'.$citizen['c_name'].'</b> With national id :<b>'.$citizen['c_nid'].'</b> was given certificate <b>'.$service['s_name'].'</b><br>
      	<br>
      	'.$service['s_desc'].'
      </p>
    </div>
      <p>
      Was issued by <b>'.$admin['a_name'].'</b> With Reg_no:<b>'.$admin['a_id'].'</b><br> The leader of : <b>'.$location['loc_village'].' Village </b><br>
      </p>
      '.
      '<tcpdf method="write2DBarcode" params="' . $params . '" />'
      .'
      <i>Scan for the verification / Reg_no: '.$transaction_data['t_id'].'</i>
  </div>
</body>
</html>
	    ';

// set some text to print
$html = $head;

// print a block of text using Write()
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
if (hdev_session::get('auth') == 'qrcode-verify' || hdev_session::get('auth')=='preview') {
  $pdf->Output($service['s_name'].'_-_'.$transaction_data['t_id'].'.pdf', 'I');
}else{
  $pdf->Output($service['s_name'].'_-_'.$transaction_data['t_id'].'.pdf', 'D');
}


//============================================================+
// END OF FILE
//============================================================+
