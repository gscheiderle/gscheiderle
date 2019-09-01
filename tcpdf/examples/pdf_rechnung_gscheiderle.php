<?php
include("../../intern/mysql_connect_gscheiderle.php");
include("../../intern/parameter.php");

/* $re_nr=trim($_GET[re_nr]);
$kd_nr=trim($_GET[kd_nr]); */

$select_kd_nr=mysqli_query($link," select kd_nr from adressen where kd_nr = '$_GET[kd_nr]' " );
while ( $result_kd_nr = mysqli_fetch_array ( $select_kd_nr, MYSQLI_BOTH ) ) {
$resultkdnr=$result_kd_nr['kd_nr'];
}

$select_kd_nr=mysqli_query($link," select kd_nr from adressen where kd_nr = '$_GET[kd_nr]' limit 1 ");
while ( $result_kd_nr = mysqli_fetch_array ( $select_kd_nr, MYSQLI_BOTH ) ) {
$resultkdnr=$result_kd_nr['kd_nr'];
}

if ( $resultkdnr != "" ) { 
$kriterium ="from adressen where kd_nr = '$_GET[kd_nr]' ";
}


$selectname=mysqli_query($link,"select kd_nr, name, vorname, strasse, plz, ort $kriterium ");
while( $result=mysqli_fetch_array( $selectname, MYSQLI_BOTH ) ) {
$name=$result['name'];
$vorname=$result['vorname'];
$strasse=$result['strasse'];
$plz=$result['plz'];
$ort=$result['ort'];
}

                                         
$select_re_su=mysqli_query($link," select * from rechnungen_summe where re_nr = '$_GET[re_nr]' ");
while ( $result_re_su = mysqli_fetch_array( $select_re_su, MYSQLI_BOTH ) ) {
$re_datum=$result_re_su['re_datum'];
$netto=$result_re_su['netto_betrag'];
$mwst=$result_re_su['mwst'];
$brutto=$result_re_su['brutto_betrag'];
$bezahlt_db=$result_re_su['bezahlt'];
}     
                                                                               
 $alle_artikel=array();                                         
 $select_cart=mysqli_query($link," select tip_nr, tip, anzahl, einzelpreis, positionspreis from rechnungen where re_nr = '$_GET[re_nr]' ");
     while ( $result_cart = mysqli_fetch_array( $select_cart, MYSQLI_BOTH ) ) {
     $alle_artikel[]=("<tr>
     <td>".$result_cart['tip']."</td>
     <td align='center'>".$rubrik=$result_cart['anzahl']."</td>
     <td align='right'>".$preis=$result_cart['einzelpreis']."</td>
     <td align='right'>".$positionspreis=$result_cart['positionspreis']."</td>
     </tr>");                                        
 }
                                         
                                           foreach( $alle_artikel as $artikel) {
                
                $positionen.=$artikel;
    
                }


$artikel=html_entity_decode($artikel);


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
$pdf->SetFont('courier', 'R', 11);

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="0" cellpadding="2" cellspacing="2" nobr="true">

 
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
  
  COMMERZBANK<br>
  IBAN: DE00000000000000000000
  
<br><br>

  Steuernummer: 00 00 00000000000
<br><br>
  
  E-Mail:<br>
  info@gscheiderle.de<br>
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

', '', 0, 'C', false, 0, false, false, 0);



$pdf->SetFont('courier', '', 10);


// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="0" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="4" align="left">Rechnung-Nr.: $_GET[re_nr]<br>
Kunden-Nr.: $_GET[kd_nr]<br>
Rechnungs-Datum: $re_datum<br>
  </th>
 </tr>
 
  <tr>
  <th colspan="4" align="left"><hr></th>
 </tr>

<tr>
   <td width="40%">TIPP</td>
   <td width="25%">ANZAHL</td>
   <td width="15%">EINZELPREIS</td>
   <td width="20%">POSITIONSPREIS</td>
 </tr>
 
  <tr>
   <td colspan="4"><br></td>
   
 </tr>
  
$positionen

  <tr>
   <td colspan="4"><hr></td>
   
 </tr>
   

 
  <tr>
  <td colspan="2"></td><td align="right">netto &euro;</td>
  <td align="right">$netto</td>
 </tr>
 
 <tr>
  <td colspan="2"></td>
  <td align="right">MWSt. $mw_st %</td>
  <td align="right">$mwst</td>
 </tr>
 
 <tr>
  <td colspan="2"></td>
  <td align="right" bgcolor="#dadada">Endbetrag &euro;</td>
  <td align="right" bgcolor="#dadada">$brutto</td>
 </tr>
 
 

 
 <tr>
<th colspan="5" align="left" bgcolor="#FFFFFF"><br><br>
<br>
<br>

</th>
</tr>
 
 
<tr>


<th colspan="5" align="left" bgcolor="yellow"><br>
<br>
  RECHNUNG IST BEZAHLT<br>
  SICHER mit PAYPAL, Transaktions-Nr.: $_GET[transaktionsnr]
<br>
</th>
</tr>
 
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------



//Close and output PDF document
$pdf->Output('Gscheiderle-Rechnung-Nr:_'.$_GET[re_nr].'_fuer_'.$name.'_'.$vorname.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
