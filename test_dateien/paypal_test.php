<?php if (! isset( $_COOKIE['re_nr'] ) ) { setcookie("re_nr",$_POST['neuerenr']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=https://www.gscheiderle.de/standartseite.php">-->
<title>Frontpage GSCHEIDERLE.DE</title>
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

<?php 
    

    
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php"); 



function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck; $db_ausdruck="";}
  }
    
/* $form_1="<form action='zahlung_abschliessen.php' method='POST'>";    */ 
    
if ( ( $_POST['rechnung_erstellen'] == TRUE ) || ( $_POST['paypal_formular'] == TRUE ) ) {
 $form_1='';    
/* $form_2="<form action='https://www.paypal.com/cgi-bin/websrc' method='POST'>"; */
	}
	

    
  /* echo $form_1;
  echo $form_2; */
  
  
  
echo $form_2="<form action='http://127.0.0.1/gscheiderle/kasse/formdata.php?mc_gross=1.00&invoice=726043%26726043%26726043%26&protection_eligibility=Eligible&address_status=confirmed&item_number1=1&payer_id=23R3Q5XU55QG4&tax=0.16&address_street=Am+Mittelberg+2&payment_date=10%3A47%3A13+Feb+24%2C+2019+PST&payment_status=Completed&charset=windows-1252&address_zip=69439&first_name=Uwe&mc_fee=0.37&address_country_code=DE&address_name=Uwes-Affilate&notify_version=3.9&custom=1151610139&payer_status=verified&business=u.sack%40variusmedien.de&address_country=Germany&num_cart_items=1&address_city=Zwingenberg&verify_sign=ACLGgfcbhZx3WV9J8G9zs6F7HDkYA7vCZBZZ--WvxWcyOAZDb1Wbtzu5&payer_email=usnh2000%40yahoo.de&txn_id=4NR70282RW004782A&payment_type=instant&payer_business_name=Uwes-Affilate&last_name=Sack&address_state=&item_name1=div.+Tipps&receiver_email=u.sack%40variusmedien.de&payment_fee=&shipping_discount=0.00&quantity1=1&insurance_amount=0.00&receiver_id=VD2896TTPQEPQ&txn_type=cart&discount=0.00&mc_gross_1=0.84&mc_currency=EUR&residence_country=DE&shipping_method=Default&transaction_subject=&payment_gross=&ipn_track_id=ebefee492386c' target='_blanc' method='POST'>"; 




  
   echo "<input type='submit' name='rechnung_erstellen' value='S U B M I T'>"; 
?>

</form>

