<?php if (! isset( $_COOKIE['re_nr'] ) ) { setcookie("re_nr",$_POST['neuerenr']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=https://www.gscheiderle.de/standartseite.php">-->
<title>IPN-ANALYSE</title>
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



function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck; $db_ausdruck="";}
  }
    
  
    

   

    
?>

<div class="wrapper">
	
	
<?php include("../seitenelemente/header.php"); ?>

    
<div class="nav">
<?php include("../seitenelemente/navigation.php"); ?>
</div>
    

<div class="article">   
     
<h6>     
<?php
     


$query="select data from paypal_transfer_infos where transaktionsnr = ' $_GET[transaktionsnr]' ";     
     
$data=mysqli_query($link, "select data from paypal_transfer_infos where transaktionsnr = '$_GET[transaktionsnr]' ");
     while ($paypal_post = mysqli_fetch_array( $data, MYSQLI_BOTH ) ) {
         
         
         
         $getvariablen=urldecode($paypal_post['data']);
    
  }
 

    
echo "<form method='POST' action='ipn_analyse.php?transaktionsnr=$_GET[transaktionsnr]&$getvariablen'>";   
    
    
    
 $style="style='height:5em; width:40em; background-color: lightgreen;'"; 
		 $font_style="<font style='font-size: 2em; color: blue;'>";

		echo "<button type='submit' name='var_check' value='varcheck' $style >$font_style Variablen drucken</font></button><br>"; 
    
    
    
$veri="select kd_nr, transaktionsnr, brutto_betrag from rechnungen_summe where re_nr = '$_GET[invoice]'";
        
$verifizieren=mysqli_query($link, $veri);    
  while ( $result_verif = mysqli_fetch_array($verifizieren, MYSQLI_BOTH) ) {
      
      $kd_nr_db=$result_verif['kd_nr'];
      $transaktionsnr_db=$result_verif['transaktionsnr'];
      $brutto_db=$result_verif['brutto_betrag'];
  } 
    
    

$verif_2="select email from adressen where kd_nr = '$kd_nr_db' ";

$email_verif=mysqli_query($link, $verif_2);  
    while ($result_email_verif = mysqli_fetch_array($email_verif, MYSQLI_BOTH) ) {
        
        $email_db=$result_email_verif['email'];
    }
echo "<br><br>";
    
if ( $kd_nr_db == $_GET['custom'] )  { echo "Die Kunden-Nummer ist OK !<br>"; } 
    else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Kundennummer</b></font><br>";}
    
if ( $transaktionsnr_db == $_GET['txn_id'] )  { echo "Die Transaktions-Nr. ist OK !<br>"; }
     else {echo "<font style='color: red; background-color: yellow;'><b> E R O R O R  Transaktions-Nr.</b></font><br>";}
    
if ( $brutto_db == $_GET['mc_gross'] )  { echo "Der Brutto-Betrag ist OK !<br>"; } 
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Brutto-Betrag</b></font><br>";}
    
if ( $email_db == $_GET['payer_email'] )  { echo "Die Kunden-E-Mail ist OK !<br>"; } 
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Kunden-E-Mail</b></font><br>";}
    
if ( $_GET['receiver_email'] == 'u.sack@variusmedien.de' )  { echo "Die Empf&auml;nger-E-Mail ist OK !<br>"; } 
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Empf&auml;nger-E-Mail</b></font><br>";}
    
if ( $_GET['payment_status'] == 'Completed' )  { echo "Die Bezahlung ist komplett abgewickelt !<br>"; }
     else {echo "<font style='color: red; background-color: yellow;'><b> E R R O R  Bezahl-Status</b></font><br>";}
    
    
    echo "<br>";
    echo "<br>";
    
    if ( $_POST['var_check'] == "varcheck" ) { 
        
        
echo  "E-Mail Kunde: ".$_GET['payer_email']."<br>";
echo  "Gesch&auml;ft-Kd.: ".$_GET['payer_business_name']."<br>";
echo  "Kd.-Id (Paypal): ".$_GET['payer_id']."<br>";
echo  "Vorname: ".$_GET['first_name']."<br>";
echo  "Nachname: ".$_GET['last_name']."<br>";
echo  "Str.: ".$_GET['address_street']."<br>";
echo  "PLZ: ".$_GET['address_zip']."<br>";
echo  "Ort: ".$_GET['address_city']."<br>";
        
        echo "<br>";  
        
echo  "Kunden-Status: ".$_GET['payer_status']."<br>";        
echo  "Adressen-Status: ".$_GET['address_status']."<br>";       
echo  "Schutzberechtigung: ".$_GET['protection_eligibility']."<br>";


        echo "<br>";         
        

echo  "Re.-Nr.: ".$_GET['invoice']."<br>";
echo  "Re.-Dat.: ".$_GET['payment_date']."<br>";
echo  "Brutto &euro;: ".$_GET['mc_gross']."<br>";
echo  "MWSt. &euro;: ".$_GET['tax']."<br>";
echo  "Paypal-Geb&uuml;hr &euro;: ".$_GET['mc_fee']."<br>";
echo  "Bezahl_Status: ".$_GET['payment_status']."<br>";
echo  "Transaktions-Nr.: ".$_GET['txn_id']."<br>";

        echo "<br>";          
        
echo  "Anzahl Artikel: ".$_GET['num_cart_items']."<br>";   
      $anzahl_artikel=$_GET['num_cart_items'];    
        
         echo "<br>";      
        
echo  "Artikel-Nr. 1: ".$_GET['item_number1']."<br>"; 
echo  "Artikel-Name 1: ".$_GET['item_name1']."<br>";    
echo  "Anzahl 1: ".$_GET['quantity1']."<br>";   
 echo  "Einzelpreis 1 &euro;: ".$_GET['mc_gross_1']."<br>";    
        
        
        echo "<br>";
        
        
for ( $i=2; $i <= $anzahl_artikel; $i++ ) {
    
    $$item_number="item_number".$i;
    $item_number=$_GET[item_number.$i];
    
    $$item_name="item_name".$i;
    $item_name=$_GET[item_name.$i];
    
    
    $$quantity="quantity".$i;
    $quantity=$_GET[quantity.$i];
    
    
    $$mc_gross="mc_gross_".$i;
    $mc_gross=$_GET[mc_gross_.$i];
    
    
    
   if (isset($_GET[item_number.$i])) {
        echo "Artikel-Nr. $i: ".$item_number."<br>";
   
   }
    
   if (isset($_GET[item_name.$i])) {
        echo "Artikel-Name $i: ".$item_name."<br>";
   }
    
  if (isset($_GET[quantity.$i])) {    
        echo "Anzahl $i: ".$quantity."<br>";
  }
    
   if (isset($_GET[mc_gross_.$i])) { 
        echo "Einzelpreis $i &euro;: ".$mc_gross."<br>";  
        echo "<br>"; 
   }
}
         



echo  "charset=".$_GET['charset']."<br>";
echo  "address_country_code=".$_GET['address_country_code']."<br>";
echo  "address_name=".$_GET['address_name']."<br>";
echo  "notify_version=".$_GET['notify_version']."<br>";
echo  "custom=".$_GET['custom']."<br>";
echo  "address_country=".$_GET['address_country']."<br>";
echo  "verify_sign=".$_GET['verify_sign']."<br>";
echo  "payment_type=".$_GET['payment_type']."<br>";
echo  "address_state=".$_GET['address_state']."<br>";
echo  "receiver_email=".$_GET['receiver_email']."<br>";
echo  "payment_fee=".$_GET['payment_fee']."<br>";
echo  "shipping_discount=".$_GET['shipping_discount']."<br>";
echo  "insurance_amount=".$_GET['insurance_amount']."<br>";
echo  "receiver_id=".$_GET['receiver_id']."<br>";
echo  "txn_type=".$_GET['txn_type']."<br>";
echo  "discount=".$_GET['discount']."<br>";
echo  "mc_currency=".$_GET['mc_currency']."<br>";
echo  "residence_country=".$_GET['residence_country']."<br>";
echo  "shipping_method=".$_GET['shipping_method']."<br>";
echo  "transaction_subject=".$_GET['transaction_subject']."<br>";
echo  "payment_gross=".$_GET['payment_gross']."<br>";
echo  "ipn_track_id=".$_GET['ipn_track_id']."<br>";
        
        
        
// Step 2: POST IPN data back to PayPal to validate
$ch = curl_init('http://127.0.0.1/gscheiderle/kasse/test_sendung.php');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $getvariablen);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
     
        
}
    
?>
	
	
</div> <!-- ende artikel-->

    
<?php include("../seitenelemente/footer.html"); ?>
	

</div> 	<!-- ende div wrapper -->
    
    
<?php    
    
	

?>
    
		</form>
	</body>
</html>
