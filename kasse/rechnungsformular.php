<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Gscheiderle-Rechnungsformular</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body leftmargin=40px" topmargin="40px">

<?php



include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");


                                        

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
     $alle_artikel[]=("<tr><td>".$result_cart['tip']."</td>
     <td align='center'>".$rubrik=$result_cart['anzahl']."</td>
     <td align='right'>".$preis=$result_cart['einzelpreis']."</td>
     <td align='right'>".$positionspreis=$result_cart['positionspreis']."</td>
     </tr>");                                        
 }
                                         
                                           foreach( $alle_artikel as $artikel) {
                
                $positionen.=$artikel;
    
                }
                                         
                                         

$artikel=html_entity_decode($artikel);

echo "
<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\" width='800px'>
 <tr>
  <th colspan=\"2\" align=\"center\">
  <img src='http://localhost/images_system/gscheiderle_logo.png' alt='logo' height='70px' width='800px' >
  </th>
 </tr>
 
  <tr>
  <th colspan=\"2\" align=\"center\">
  <p>&nbsp;</p>
  
  </th>
 </tr>
 
 <tr>
  <td width='60%'><h3>
$name, $vorname <br>
$strasse <br><br>

$plz $ort
<br><br><br>

  
  </td>
  <td width='40%'>
  Bankverbindung:<br>
  
  COMMERZBANK<br>
  
<br><br>
Steuernummer: 
  <br><br>
  
  E-Mail: usnh2000@yahoo.de<br>
  </td>
 </tr>

</table>

";

echo "
<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\" width='800px'>

  <tr>
  <th colspan=\"4\" align=\"CENTER\"><h3><br><br><h1>R E C H N U N G<br><br></th>
 </tr>

 <tr>
  <th colspan=\"3\" align=\"left\">Rechnung-Nr.: $_GET[re_nr]<br>
Kunden-Nr.: $_GET[kd_nr]<br>
Rechnungs-Datum: $re_datum<br>
  </th>
 </tr>
 
  <tr>
  <th colspan=\"4\" align=\"left\"><hr></th>
 </tr>
 
 <tr>
   <td>ARTIKEL</td>
   <td>ANZAHL</td>
   <td align=\"right\">Einzelpreis</td>
   <td align=\"right\">Positionspreis</td>
 </tr>
 
  <tr>
   <td colspan='4'><hr></td>
   
 </tr>
 
 $positionen

  <tr>
   <td colspan='4'><hr></td>
   
 </tr> "; 
  
  
$rechnung.=" 
 
  <tr>
  <td colspan='2'></td><td align=\"right\">netto &euro;</td>
  <td align=\"right\">$netto</td>
 </tr>
 
 <tr>
  <td colspan='2'></td>
  <td align=\"right\">MWSt. $mw_st %</td>
  <td align=\"right\">$mwst</td>
 </tr>
 
 <tr>
  <td colspan='2'></td>
  <td align=\"right\" bgcolor=\"#dadada\"><h3>Endbetrag &euro;</td>
  <td align=\"right\" bgcolor=\"#dadada\"><h3>$brutto</td>
 </tr>";
 
 if ( $bezahlt_db == 1 ) { $bezahlt="Betrag dankend erhalten!"; }

$rechnung.=" 
   <tr>
  <th colspan=\"3\" align=\"left\"><br>
  <br>
  <br>
  <br>
  <br>
  <br>
     
  $bezahlt<br><br>
 
  </font>
  </th>
 </tr>
 
</table>
";


echo $rechnung;
?>
</body>
</html>