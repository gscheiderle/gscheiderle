<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Danke</title>
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
          
          
          
echo "<form action='danke_seite.php' method='POST'>";


// http://localhost/gscheiderle/kasse/danke_zahlung.php?kd_nr=usnh2000@yahoo.de&amt=0.50&cc=EUR&cm=1151611269&st=Completed&tx=9BE05538VT650330T


$kd_nr_1=substr("$_GET[cm]",0,5);
      
$ueberweisung_nr=substr("$_GET[cm]",5,5);  
      
$betrag=$_GET['amt'];    

$netto=($betrag/(100+$mw_st) * 100 );
      
$mwst=($betrag/(100+$mw_st) * $mw_st );
      


$transaktionsnr=$_GET['tx'];

mysqli_query($link," update abrechnungen set transaktionsnr = '$transaktionsnr', ueberwiesen = '1' where ueberweisung_nr = '$ueberweisung_nr' ");    
         

$select_adresse=mysqli_query($link," select kd_nr, name, vorname, anrede, email from adressen where kd_nr = '$kd_nr_1' ");
while ( $result_adresse = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
$kd_nr_db=$result_adresse['kd_nr'];
$name_db=$result_adresse['name'];
$vorname_db=$result_adresse['vorname'];
$anrede_db=$result_adresse['anrede'];
$email_db=$result_adresse['email'];
}


?>

<input type="hidden" name="ueberweisung_nr" value="<?php neuladen($_POST['ueberweisung_nr'], $ueberweisung_nr); ?>"> 





<div id="wrapper">
<div id="article_tip_auswahl ">

<table width="1100px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF" border="0" >


 <tr>
 <td bgcolor="#FFFFFF" colspan="2" height="10px" align="center"  valign="TOP">
 

 <?php 
 

 
 echo " 
<h3><br><br>


Wir haben &uuml;berwiesen <br><br>

<b>PROVISION <br>
$_GET[amt] &euro;<br>
mit derPaypal-Transaktions-Nr.:  $transaktionsnr<br>
an<br><br>
Kd.-Nr.: $kd_nr_db<br>
$name_db, 
$vorname_db<br>
$email_db<br><br><br>
";
        

$ueberweisung_formular="rechnung.php";
$email_empfang_absender="'info@gscheiderle.de'";

if ( $konto == "u.sack@variusmedien.de" ) { 
$rechnungs_formular="provisions_zahlung.php";
$email_empfang_absender="'info@gscheiderle.de'";
}



echo "<a href='http://localhost/gscheiderle/tcpdf/examples/provisions_zahlung.php?ueberweisung=$ueberweisung_nr&kd_nr=$kd_nr_1&transaktionsnr=$transaktionsnr'>PROVISIONSS-ZAHLUNG DRUCKEN UND PDF SPEICHERN</a><br>
<br>";



?>


</td>
</tr>

 </table>

 

</div>
</div> 
     
<?php include("../seitenelemente/footer.html"); ?>     
    


</form>
</body>
</html>