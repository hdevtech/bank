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
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, APP_NAME, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		$html = "<br><div>Landlord Payments</div>";
		$this->writeHTML($html, true, false, true, false, '');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages()." - Printed by :".hdev_data::active_user("fid")." - ' ".hdev_data::active_user("username")." '", 0, false, 'C', 0, '', 0, false, 'T', 'M');

	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(APP_NAME);
$pdf->SetTitle('land_lord payments');
$pdf->SetSubject('payment report');
$pdf->SetKeywords('payment,report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
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
  if (!empty($to) && !empty($from)) {
    $disp .= "Viewing Icome Report from : ";
    $disp .= date_format(date_create($from),"d/m/Y"); 
    $disp .= " - to : "; 
    $disp .= date_format(date_create($to),"d/m/Y");
  }
    $head='
		<table style="width: 100%;border-collapse: collapse;" border="1px">
		    <thead>
		      <tr>
		      	<th colspan="6" align="center">
		      		'.$disp.'
		      	</th>
		      </tr>
		      <tr>
            <th>Reg no.</th>
            <th>Landlord Id</th>
            <th>Landlord Name</th> 
            <th>Total Amount</th>
            <th>Payment Status</th>
            <th>Payment Date</th>
		      </tr>
		    </thead>
		    <tbody>
    ';
    $body = "";
    foreach (hdev_data::payouts("",[1,'']) AS $payout) { 
    	$body .= '
                    <tr>
                      <td>'.$payout["lp_id"].'</td>
                      <td>'.$payout["l_id"].'</td>
                      <td>'.hdev_data::land_lord($payout["l_id"],['data'])['l_name'].'</td>
                      <td>'.$payout["lp_amount"].' frw</td>
                      <td>'.'Successful'.'</td>
                      <td>'.hdev_data::date($payout["lp_date"],"date_time").'</td>
                    </tr>
    	';
    } 
    $foot = '
    				<tr>
    					<td colspan="6" align="center">
    						<h3>Total Amount Paid to the Landlord : '.hdev_data::payouts("",["sum"]).' Rwf</h3>
    					</td>
    				</tr>
			    </tbody>
			</table>
	    ';
// set some text to print
$html = $head.$body.$foot;

// print a block of text using Write()
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Landlord Payments.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
