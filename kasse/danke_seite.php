<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">

<html>
    
  <head>
      
    <title>D A N K E</title>
      
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
      
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="../css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="../css/style_1200.css"> <!-- grosser Bildschirm -->

<script>
var __adobewebfontsappname__="dreamweaver"
</script>

<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>  

</head>
    
    <body>
      
      <div class="wrapper">
          
          
          <?php include("../seitenelemente/header.html"); ?>
          
          <div class="nav">
          <?php include("../seitenelemente/navigation.php"); ?>
          </div>
          
      
     <div class="article"> 
     
     
<?php
         
echo "<form action='danke_seite.php' method='POST'>";
         

include( "../intern/mysql_connect_gscheiderle.php" );
include( "../intern/parameter.php" );
include( "../php_code/freigabe_links.php" ); 
 
         
if ( $_GET['st'] == "Completed" ) {
    

$select_adresse=mysqli_query($link," select kd_nr, name, vorname, anrede, email from adressen where kd_nr = '$_GET[cm]' ");
while ( $result_adresse = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
$kd_nr_db=$result_adresse['kd_nr'];
$name_db=$result_adresse['name'];
$vorname_db=$result_adresse['vorname'];
$anrede_db=$result_adresse['anrede'];
$email_db=$result_adresse['email'];
}

} // ende if GET-Status 
          
  
   
     
$no_error=TRUE;
     
//$trans_query="select transaktionsnr from paypal_transfer_infos where transaktionsnr = '$_GET[tx]' ";   
     
$trans_result=mysqli_query($link, "select kd_nr, re_nr, brutto, transaktionsnr, ready from paypal_transfer_infos where re_nr = '$_GET[re_nr]' ");
     while ($result_trans = mysqli_fetch_array( $trans_result, MYSQLI_BOTH ) ) {
 
$kd_nr_ipn = $result_trans['kd_nr'];
$transaktionsnr_ipn = $result_trans['transaktionsnr'];
$ready_ipn=$result_trans['ready'];         
         
if ( $result_trans['ready'] == 1 ) {
         echo "<font style='font-size: 2em; color: red; background-color: yellow;'><b> E R R O R<br>
<br>
Verehrter Kunde,<br><br>

diese Bestellung ist abgewickelt.<br>
Sollten Sie Ihren Download noch nicht ausgef&uuml;hrt haben,<br>
so k&ouml;nnen Sie das mit dem Link in Ihrer E-Mail nachholen.<br>
<br>
Die Leut' von Gscheiderle.de.</b></font><br>"; $no_error=FALSE; 
exit;}         
         
         
if ( $result_trans['transaktionsnr'] != $_GET['tx'] ) {
         echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Transaktions-Nr.</b></font><br>"; $no_error=FALSE;  }

    
if ( $result_trans['kd_nr'] == $_GET['cm'] )  { /*echo "Die Kunden-Nummer ist OK !<br>";*/ } 
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Kundennummer</b></font><br>"; $no_error=FALSE; }
         
if ( $result_trans['re_nr'] == $_GET['re_nr'] )  { /*echo "Die Kunden-Nummer ist OK !<br>";*/ } 
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Rechnungs_Nummer</b></font><br>"; $no_error=FALSE; }         
    
    
if ( $result_trans['brutto'] == $_GET['amt'] )  { /*echo "Der Brutto-Betrag ist OK !<br>";*/ } 
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Brutto-Betrag</b></font><br>"; $no_error=FALSE; }

  }
                   
    
 
// http://localhost/gscheiderle/kasse/danke_seite.php?kd_nr=11516&re_nr=10167&amt=1.00&cc=EUR&cm=11516&st=Completed&tx=9LT709038U0725310

      
$betrag=$_GET['amt'];    

$netto=($betrag/(100+$mw_st) * 100 );
      
$mwst=($betrag/(100+$mw_st) * $mw_st );
      

if ( $anrede_db == "w" ) { $anrede = "Sehr geehrte Frau";  $anrede_g = "Frau"; }
if ( $anrede_db == "m" ) { $anrede = "Sehr geehrter Herr"; $anrede_g = "Herr"; }

?>


<div id="wrapper">
    
<div id="article_tip_auswahl ">

<table width="1100px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF" border="0" >


 <tr>
 <td bgcolor="#FFFFFF" colspan="2" height="10px" align="center"  valign="TOP">
 

 <?php 
 
 
echo " 
<h3>
$anrede $name_db,<br><br>

Wir d&uuml;rfen uns herzlich bedanken f&uuml;r Ihr Interesse an unseren Tipps.<br>
Empfehlen Sie uns weiter.<br><br>";

if ( $no_error == FALSE ) { 
echo "Leider ist ein Fehler im Bezahlvorgang aufgetreten.<br>
Sie haben schon bezahlt und kommen nicht an die bezahlte Ware?<br>
Senden Sie eine E-Mail an info@gscheiderle.de<br>
Wir bringen das umgehend in Ordnung.<br>
<br>";
exit;
}

echo "
<b>Sie zahlten $_GET[amt] &euro;<br>
Paypal-Transaktions-Nr.:  $_GET[tx] <br><br>

Hier sind Ihre Zugangs-Codes:<br>
Als PDF aufrufen und auf Ihrem PC speichern.<br>
<br>";

include("../php_code/freigabe_links.php");
     
     
     	 foreach ( $freigabelink as $links ) {
	
	echo $font.$links."<br>";
}

     
     
echo "<br><br>

<font style='background-color: orange; color: black;'>( Bitte daran denken, <br>
dass die Codes ab jetzt 48 Stunden gelten! )</font><br><br>

Die Leut' von GSCHEIDERLE.DE<br><br><br>";


echo "<a href='http://localhost/gscheiderle/tcpdf/examples/pdf_rechnung_gscheiderle.php?re_nr=$_GET[re_nr]&kd_nr=$_GET[cm]&transaktionsnr=$_GET[tx]' target='_blanc'>QUITTIERTE RECHNUNG DRUCKEN<br>
UND PDF SPEICHERN</a><br>
<br>";


echo "
<hr>

Alle Informationen <br>
werden Ihnen auch per E-Mail zugesandt<br><br>

        </div>
    </td>
</tr>
";
     
?>
           </td>
        </tr>
    </table>

</div>
</div> 
     
     
    
<?php include("../seitenelemente/footer.html"); ?>     
     
     

<?php 
         
if ( ( $no_error == TRUE ) && ( $ready_ipn < 1 ) ) {
         

$empfaenger='usnh2000@yahoo.de, sack.uwe@gmail.com';
$betreff="Ihre Bestellung auf Gscheiderle.de";
$inhalt= "
<div align=\"center\">
  <center>
  <table style=\"border: 0px; width: 800px; heigh: 300px; background-color: #FFFFFF;\">
    
      <tr>
      <td width=\"80%\" align=\"left\" colspan=\"2\">
      <font face=\"arial\" size=\"4\">

$anrede $vorname_db $name_db,<br><br>

Sie haben den Betrag von $betrag Euro bei Paypal unter der Transaktions-Nr. $_GET[tx]<br>
&uuml;berwiesen:<br><br>

Ihr Zugang zu den Tipps:<br><br>";
	 
	 foreach ( $freigabelink as $links ) {
	
	 $inhalt.=$links."<br>";
}


$inhalt.="<br><br>";
     
$inhalt.="<a href='http://localhost/gscheiderle/tcpdf/examples/pdf_rechnung_gscheiderle.php?re_nr=$_GET[re_nr]&kd_nr=$_GET[cm]&transaktionsnr=$_GET[tx]' target='_blanc'>RECHNUNG DRUCKEN UND/ODER PDF SPEICHERN</a><br>
<br>";
     

$inhalt.="Herzlichen Dank.<br>
<br>
Die Leut' von Gscheiderle.de  <br><br><br>
    
</td>
</tr>
      

  </table>
  </center>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header.='Content-Transfer-Encoding: 8bit' . "\r\n";
$header.='From: info@gscheiderle.de' . "\r\n";
$header.='Reply-To: info@gscheiderle.de' . "\r\n";

mail($empfaenger, $betreff, $inhalt, $header);
     
     
     
     
$empfaenger_1='usnh2000@yahoo.de, sack.uwe@gmail.com';
$betreff_1="Bestellung auf Gscheiderle.de";
$inhalt_1= "
<div align=\"center\">
  <center>
  <table style=\"border: 0px; width: 800px; heigh: 300px; background-color: #FFFFFF;\">
    
      <tr>
      <td width=\"80%\" align=\"left\" colspan=\"2\">
      <font face=\"arial\" size=\"4\">

$vorname_db $name_db,<br><br>

hat den Betrag von $betrag Euro bei Paypal unter der Transaktions-Nr. $_GET[tx]<br>
&uuml;berwiesen:<br><br>

Zugang zu den Tipps:<br><br>";
	 
	 foreach ( $freigabelink as $links ) {
	
	$inhalt_1.=$links."<br>";
}

$inhalt_1.="<br><br>";
     
// $inhalt_1.="<a href='http://localhost/gscheiderle/kasse/ipn_analyse.php?transaktionsnr=$transaktionsnr'>$transaktionsnr</a><br>
$inhalt_1.="<a href='http://localhost/gscheiderle/kasse/ipn_analyse.php?transaktionsnr=$_GET[tx]'>IPN $_GET[tx]</a><br>

<br>


    
</td>
</tr>
      

  </table>
  </center>
</div>
";


$header_1.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header_1.='Content-Transfer-Encoding: 8bit' . "\r\n";
$header_1.='From: info@gscheiderle.de' . "\r\n";
$header_1.='Reply-To: info@gscheiderle.de' . "\r\n";

mail($empfaenger_1, $betreff_1, $inhalt_1, $header_1);   
    
    
mysqli_query($link, "update paypal_transfer_infos set ready = '1' where transaktionsnr = '$transaktionsnr_ipn' ");    
    
    
} // ende no_error
     
?>


        </form>
    </body>
</html>

