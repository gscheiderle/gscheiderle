<?php if (! isset( $_COOKIE['re_nr'] ) ) { setcookie("re_nr",$_POST['neuerenr']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
<title>Frontpage GSCHEIDERLE.DE</title>
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

<?php 
    

    
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php"); 


    
$form_1="<form action='zahlung_mitarbeiter.php?email=$_GET[email]&ueberweisung=$_GET[ueberweisung]' method='POST'>";    
    
if ( ( $_POST['ueberweisung_erstellen'] == TRUE ) || ( $_POST['paypal_formular'] == TRUE ) ) {
 $form_1='';    
$form_2="<form action='https://www.paypal.com/cgi-bin/websrc' method='POST'>";
	
	/* $form_2="<form action='http://192.168.2.106/gscheiderle/kasse/test_sendung.php' target='_blanc' method='POST'>";  */
}
    
  echo $form_1;
  echo $form_2;
    
?>

<div class="wrapper">
	
	
<?php include("../seitenelemente/header.php"); ?>

    
<div class="nav">
    
<?php include("../seitenelemente/navigation.php"); ?>
	</div>
    
    



<div class="article">
	
<h1>
Wir &uuml;berweisen an <?php echo $_GET[email]; ?> :

    </h1>


<?php  
   
$select_abrechnung=mysqli_query($link," select * from abrechnungen where ueberweisung_nr = '$_GET[ueberweisung]' ");  
while ( $result_abrechnung = mysqli_fetch_array( $select_abrechnung, MYSQLI_BOTH ) ) {
	$netto_db = $result_abrechnung['netto'];
	$mwst_db = $result_abrechnung['mwst'];
	$brutto_db = $result_abrechnung['brutto'];
}
   
    
$email_select=mysqli_query($link," select kd_nr, name, vorname, strasse, plz, ort, email from adressen where email = '$_GET[email]' " );
while( $result_email=mysqli_fetch_array($email_select, MYSQLI_BOTH ) ) {
$kd_nr_db=$result_email['kd_nr'];
$name_db=$result_email['name'];
$vorname_db=$result_email['vorname'];
$strasse_db=$result_email['strasse'];
$plz_db=$result_email['plz'];
$ort_db=$result_email['ort'];
$email_db=$result_email['email'];
}   

?>
    
    
<input type="hidden" name="name_db" value="<?php echo $_POST['name_db']; ?>">    
    
    
 <table border="0" width="100%">
            <tr>
                <td style=' background-color: #EEE6B6'>Name:</td>
                <td style=' background-color: #EEE6B6'>Vorname:</td>
                <td style=' background-color: #EEE6B6'>Strasse:</td>
                <td style=' background-color: #EEE6B6'>PLZ:</td>
                <td style=' background-color: #EEE6B6'>Ort:</td>
                <td style=' background-color: #EEE6B6; text-align: right;'>NETTO:</td>
                <td style=' background-color: #EEE6B6; text-align: right;'>MWST:</td>
				<td style=' background-color: #EEE6B6; text-align: right;'>BRUTTO:</td>
            </tr>
     


  <?php          
            echo "
            <tr>
                <td style=' background-color: #EEE6B6'>$name_db</td>
                <td style=' background-color: #EEE6B6'>$vorname_db</td>
                <td style=' background-color: #EEE6B6'>$strasse_db</td>
                <td style=' background-color: #EEE6B6'>$_plz_db</td>
                <td style=' background-color: #EEE6B6'>$ort_db</td>
                <td style=' background-color: #EEE6B6; text-align: right;'>$netto_db</td>
                <td style=' background-color: #EEE6B6; text-align: right;'>$mwst_db</td>
				<td style=' background-color: #EEE6B6; text-align: right;'>$brutto_db</td>
            </tr>
			";
            ?>
    
        </table>
	
<?php
    
    
    
$paypal_zusatz_2="Nach dem Bezahl-Vorgang bei Paypal warten Sie<br>
bis Sie wieder auf gscheiderle.de zur&uuml;ckgeleitet werden!<br>";


if ( ( $_POST['ueberweisung_erstellen'] == FALSE ) && ( $_POST['paypal_formular'] == FALSE ) ) {
    
    
echo "<h3><font style=' background-color: yellow; font-size: 24px; '>$paypal_zusatz</font></h3>";
echo "
<button type='submit' value='ueberweisung_erstellen' name='ueberweisung_erstellen' 
style=' text-align: center; border: 0px; border-color:; width:380px; height:50px; background-color: #00648d; border-width:0;font-family: Open Sans; font-size: 24px; font-weight: 700; color:#FFFFFF;border-radius: 6px 6px 6px 6px; box-shadow: 10px 10px 10px #dadada;'>&Uuml;berweisung vorbereiten</button>&nbsp;&nbsp;&nbsp;";
}
    
if ( ( $_POST['ueberweisung_erstellen'] == "ueberweisung_erstellen" )  || ( $_POST['paypal_formular'] == "paypal_formular" ) ) {


    
    
echo "<br><br>
<button type='submit' value='paypal_formular' name='paypal_formular' style=' text-align: center; border: 0px; border-color:; width:380px; height:50px; background-color: #00648d; border-width:0; font-family: Open Sans; font-size: 24px; font-weight: 700; color:#FFFFFF;border-radius: 6px 6px 6px 6px; box-shadow: 10px 10px 10px #dadada;'>PAYPAL-Formular senden</button>&nbsp;&nbsp;&nbsp;";

} 
    
    
    
echo "<div class='article'>";

echo "<h3><br><font style=' font-size: 24px; background-color: #FFF; color: darkgreen;'>$paypal_zusatz_2</font></h3>";
echo "</div>";
 


 



$summe_brutto=number_format($brutto_db, 2, ".", ".");    

$summe_netto=number_format($netto_db, 2, ".", ".");

$mehrwertsteuer=number_format($mwst_db, 2, ".", ".");
    
    
    
    
$anzahl=1;

$kd_nr_ua=$kd_nr_db.$_GET['ueberweisung'];

$buchungstext="Provisions_Zahlung";
    


echo "

   <input type='hidden' name='cmd' value='_cart' />
   <input type='hidden' name='currency_code' value='EUR' />
   <input type='hidden' name='item_name_1' value='$buchungstext' />
   <input type='hidden' name='quantity_1' value='$anzahl' />
   <input type='hidden' name='amount_1' value='$summe_netto' />
   <input type='hidden' name='adress_override' value='1' />
   <input type='hidden' name='custom' value='$kd_nr_ua' />
   <input type='hidden' name='upload' value='1' />
   <input type='hidden' name='business' value='u.sack@variusmedien.de' /> 
   <input type='hidden' name='invoice' value='$_GET[ueberweisung]' />
   <input type='hidden' name='cancel_return' value='http://192.168.2.106/gscheiderle/kasse/cancel_zahlung.php?seiten_id=1001&kd_nr=$_GET[email]' />
   <input type='hidden' name='return' value='http://192.168.2.106/gscheiderle/kasse/danke_zahlung.php?kd_nr=$_GET[email]' />
    <input type='hidden' name='rm' value='2' />
    <input type='hidden' name='tax_cart' value='$mehrwertsteuer' />
    <input type='hidden' name='item_number_1' value='1' />
	<input type='hidden' name='first_name' value='TIPPS VON' />
   <input type='hidden' name='last_name' value='GSCHEIDERLE.DE' />
   <input type='hidden' name='email' value='usnh2000@yahoo.de' />
   <input type='hidden' name='country' value='D' />
   <input type='hidden' name='address1' value='Am Mittelberg 2' />
   <input type='hidden' name='zip' value='69439' />
   <input type='hidden' name='city' value='Zwingenberg (Baden)' />
   <input type='hidden' name='lc' value='DE' />
";

?>


  

  

  
    </div> <!-- ende artikel-->

    
    
	<?php include("../seitenelemente/footer.html"); ?>
	
	
	
		   </div> 	<!-- ende div wrapper -->
		</form>
	</body>
</html>
