<?php
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
		$this->Cell(0, 10, 'Urupapuro '.$this->getAliasNumPage().'/'.$this->getAliasNbPages()." - Cyasohowe kuwa :"."' ".date("d-m-Y, h:i:s")." '", 0, false, 'C', 0, '', 0, false, 'T', 'M');
		// QRCODE,L : QR-CODE Low error correction
		// set style for barcode
		//$pdf->Text(20, 25, 'QRCODE L');
		// ---------------------------------------------------------

	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(APP_NAME);
$pdf->SetTitle('Income');
$pdf->SetSubject('Income report');
$pdf->SetKeywords('income,report');

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
$pdf->SetFont('times', 'B', 12);

// add a page
$pdf->AddPage();
$from = (isset($_SESSION['from'])) ? $_SESSION['from'] : "" ;
$to = (isset($_SESSION['to'])) ? $_SESSION['to'] : "" ;
$disp = '';
$styleQR = array('border' => 0, 'vpadding' => '0', 'hpadding' => '0', 'fgcolor' => array(0, 0, 0), 'bgcolor' => false, 'module_width' => 1, 'module_height' => 1);
$params = $pdf->serializeTCPDFtagParameters(array("hello", 'QRCODE,H', 20, 210, 50, 50, $styleQR, 'N'));

  if (!empty($to) && !empty($from)) {
    $disp .= "Viewing Icome Report from : ";
    $disp .= date_format(date_create($from),"d/m/Y"); 
    $disp .= " - to : "; 
    $disp .= date_format(date_create($to),"d/m/Y");
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
    <div align="right">Kuwa, 27/05/2022</div>
    <table style="padding: 5px;">
        <tr>
          <td>Repubulika y\'U Rwanda</td>
        </tr>
        <tr>
          <td>Intara : East</td>
        </tr>
        <tr>
          <td>Akarere : Ngoma</td>
        </tr>
        <tr>
          <td>Umurenge : Rukira</td>
        </tr>
        <tr>
          <td>Akagari : Buliba</td>
        </tr>
        <tr>
          <td>Umudugudu : Rurama</td>
        </tr>
    </table>
    <br>
    <div align="center">
      <u><b style="font-size:20;"><u>Icyangombwa Cy\'imiturire</b></u>
    </div>
    <div align="center" style="font-size:12;">
    	<p>
      	IZERE HIRWA ROGER Ahawe <b>Icyangombwa Cy\'imiturire</b><br>
      	<br>
      	Icyangombwa gihabwa umuntu wese ushaka kubaka cyangwa kuvugurura inzu ye.
      </p>
    </div>
      <p>
      Cyatanzwe na Izere Hirwa Roger<br> Umunyamabanga nshingwabikorwa w\'umudugudu wa akaaa<br>
      </p>
      '.
      '<tcpdf method="write2DBarcode" params="' . $params . '" />'
      .'
      <i>Scan this code for verification</i>
  </div>
</body>
</html>
	    ';

// set some text to print
$html = $head;

// print a block of text using Write()
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('System Income.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
