<?php
include("../../intern/mysql_connect_herz.php");
include("../../intern/parameter.php");

$selectname=mysqli_query($link,"select kd_nr, firma, name, vorname, strasse, plz, ort from adressen where kd_nr = '$_GET[kd_nr]' ");
while( $result=mysqli_fetch_array( $selectname, MYSQLI_BOTH ) ) {
$firma=$result['firma'];
$name=$result['name'];
$vorname=$result['vorname'];
$strasse=$result['strasse'];
$plz=$result['plz'];
$ort=html_entity_decode($result['ort']);
}

if ( $_GET['herz_code'] == "herz" ) {
mysqli_query($link," update rechnungen set gedruckt = '0' where re_nr = '$_GET[re_nr]' ");
}

$select_rechnung=mysqli_query($link," select re_datum, artikel, netto_betrag, mwst, brutto_betrag from rechnungen where re_nr = '$_GET[re_nr]' and gedruckt = '0'");
while ( $result_rechnung = mysqli_fetch_array( $select_rechnung, MYSQLI_BOTH ) ) {
$re_datum=$result_rechnung['re_datum'];
$artikel=$result_rechnung['artikel'];
$netto=$result_rechnung['netto_betrag'];
$mwst=$result_rechnung['mwst'];
$brutto=$result_rechnung['brutto_betrag'];
}

mysqli_query($link," update rechnungen set gedruckt = '1' where re_nr = '$_GET[re_nr]' ");

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
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Uwe Sack');
$pdf->SetTitle('TCPDF Rechnungsformular');
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
$pdf->SetFont('courier', 'R', 12);

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="0" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="2" align="center">&nbsp;</th>
 </tr>
 
  <tr>
  <th colspan="2" align="center">&nbsp;</th>
 </tr>
 
 <tr>
  <td width="55%">
$firma<br>
$name, $vorname <br>
$strasse <br><br>

$plz $ort
<br><br><br>
</td>

<td  width="45%">
  Bankverbindung:<br>
  
  Postbank<br>
  IBAN DE39440100460292425467<br>
  BIC PBNKDEFF
<br><br>
Steuernummer: 43 246 01347
  <br><br>
  
  E-Mail: Petra.Herz@drsha.com<br>
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

$pdf->Write(0, 'R E C H N U N G  

', '', 0, 'C', true, 0, false, false, 0);



$pdf->SetFont('courier', '', 10);


// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="0" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="left">Rechnung-Nr.: P$_GET[re_nr]<br>
Kunden-Nr.: $_GET[kd_nr]<br>
Rechnungs-Datum: $re_datum<br>
  </th>
 </tr>
  <tr>
  <th colspan="3" align="left"><hr></th>
 </tr>
 <tr>
  <td>$artikel</td>
  <td>1 Stueck &euro;</td>
  <td align="right">$netto</td>
 </tr>
 <tr>
  <td></td>
  <td align="right">MWSt. $mw_st %</td>
  <td align="right">$mwst</td>
 </tr>
 <tr>
  <td></td>
  <td align="right" bgcolor="#dadada">Endbetrag &euro;</td>
  <td align="right" bgcolor="#dadada">$brutto</td>
 </tr>
 
 <tr>
<th colspan="4" align="left" bgcolor="#FFFFFF"><br>
</th>
</tr>
 
 
<tr>
  <th align="left"><br>
  <br><br><br>
    Diese Rechnung wurde <br>
  wie folgt bezahlt:<br><br>
  <font style=" color: #FFFFFF; background-color: red; font-size: 18px; font-weight: 700; ">
  <b>&nbsp;$zahlweise_db &nbsp;</b>
  </font>
</tr>
 
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------



//Close and output PDF document
$pdf->Output('Rechnung-Nr:_P'.$_GET[re_nr].'_fuer_'.$name.'_'.$vorname.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
