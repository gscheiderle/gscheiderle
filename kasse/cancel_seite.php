<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Schade - etwas klappte nicht</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="../css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="../css/style_1200.css"> <!-- grosser Bildschirm -->

<script>
var __adobewebfontsappname__="dreamweaver"
</script>

<!--<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">-->
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
          
      
function neuladen($formular_ausdruck, $db_ausdruck)
{
 if(($formular_ausdruck != "") && ($db_ausdruck == "")){echo $formular_ausdruck;}
 if(($formular_ausdruck != "") && ($db_ausdruck != "")){echo $db_ausdruck;}
 if(($formular_ausdruck == "") && ($db_ausdruck != "")) {echo $db_ausdruck;}
}
  
$zeit=time();
$re_datum=date("Y-m-d");

include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");


          
          
          
echo "<form action='cancel_seite.php' method='POST'>";


$select_adresse=mysqli_query($link," select kd_nr, name, vorname, anrede, email from adressen where kd_nr = '$_GET[kd_nr]' ");
while ( $result_adresse = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
$kd_nr_db=$result_adresse['kd_nr'];	
$name_db=$result_adresse['name'];
$vorname_db=$result_adresse['vorname'];
$anrede_db=$result_adresse['anrede'];
$email_db=$result_adresse['email'];


if ( $anrede_db == "w" ) {$anrede = "Sehr geehrte <br>Frau "; }
if ( $anrede_db == "m" ) {$anrede = "Sehr geehrter <br>Herr "; }


}

 


?>

<h3>
	



<table width="1100px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF" border="0" >


 <tr>
 <td bgcolor="#FFFFFF" colspan="2" height="10px" align="left"  valign="TOP">
 
 <?php 
 echo " 
<h4>
$anrede $vorname_db $name_db,<br><br>

Sie haben den Bezahlvorgang bei PAYPAL abgebrochen - <br>
oder er wurde unterbrochen.
<br>
Versuchen Sie es bitte noch einmal !<br><br>

Danke<br>
Die Leut' von Gscheiderle.de <br><br>
<br>
Sie erhalten diese Nachricht auch per E-Mail !";
?>
<br>
<br>
<br>
	</div>
    
    <div class="footer">
	<h1>
<?php include("../seitenelemente/footer.html"); ?>
        </div>
</h1>
</td>
</tr>




</td>
</tr>

 </table>
 

 </div>
 

<?php 





/* $empfaenger = 'usnh2000@yahoo.de'; */

$empfaenger = 'usnh2000@yahoo.de';
 $betreff="Abbruch Veranstaltung buchen";
$inhalt.= "
<div align=\"center\">
 
  <table border=\"0\" width=\"800\" height=\"\" bgcolor=\"#FFFFFF\">
    
     <tr>
      <td width=\"80%\" align=\"left\" colspan=\"2\">
      <font face=\"arial\" size=\"4\">

$anrede_g $vorname_db $name_db,<br>
eMail: $email_db<br><br>

Zahlungsvorgang wurde von obigem Kunden - oder aus anderen Gr&uuml;nden - abgebrochen<br>

  
      
</td>
</tr>

  

  </table>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header.='Content-Transfer-Encoding: 8bit' . "\r\n";
$header.='From: info@gscheiderle.de' . "\r\n";
$header.='Reply-To: info@gscheiderle.de' . "\r\n";

mail($empfaenger, $betreff, $inhalt, $header);


$empfaenger_1="$email_db";
$betreff_1 ="Abbruch Veranstaltung buchen";
$inhalt_1= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"800\" height=\"300\" bgcolor=\"#FFFFFF\">
    
      <tr>
      <td width=\"80%\" align=\"left\" colspan=\"2\">
      <font face=\"arial\" size=\"4\">

$anrede $vorname_db $name_db,<br><br>

Sie haben den Zahlungsvorgang bei PAYPAL abgebrochen - oder er wurde unterbrochen.
<br>
Versuchen sie es noch einmal !<br><br>

Danke<br>
Die Leut' von Gscheiderle.de<br><br>   
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



 
?>


</form>
</body>
</html>