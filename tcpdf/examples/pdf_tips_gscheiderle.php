<?php
include("../../intern/mysql_connect_gscheiderle.php");
include("../../intern/parameter.php");


  
    
   
$select_tips=mysqli_query($link," select titel, text from tip_texte where tip_nr = '$_GET[tip_nr]' ");
while ( $result_tips = mysqli_fetch_array( $select_tips, MYSQLI_BOTH ) ) {
    
$titel=$result_tips['titel'];

    $text=$result_tips['text'];
 
}
 





//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
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
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include_herz.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Uwe Sack');
$pdf->SetTitle('TCPDF Herz-Rechnungsformular');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, Rechnungsformular, Petra Herz, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

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
// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('courier', 'R', 24);

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="0" cellpadding="2" cellspacing="2" nobr="true">

 
 <tr>
  <td>
  
Tip: $titel

  </td>
 
 </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

/* $pdf->Write(0, 'Name, Vorname
Strasse

67439 Ort


', '', 0, 'L', true, 0, false, false, 0); */

// set font
$pdf->SetFont('courier', 'R', 18);

/*$pdf->Write(0, 'R E C H N U N G  

', '', 0, 'C', false, 0, false, false, 0);
*/


$pdf->SetFont('courier', '', 14);


// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="0" cellpadding="2" cellspacing="2" nobr="true">

 

<tr>
   <td>
   
   
   
   $text
   
   

</td>
</tr>
 
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------



//Close and output PDF document
$pdf->Output('Gscheiderle-Tipp-Nr:_'.$_GET[tip_nr]);

//============================================================+
// END OF FILE
//============================================================+
