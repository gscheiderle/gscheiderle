<?php  
// SCHRITT 1: POST-Daten lesen // Das Lesen von POST-Daten direkt aus $ _POST verursacht Serialisierungsprobleme mit Array-Daten im POST.
// Lies stattdessen rohe POST-Daten aus dem Eingabestrom.

$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
    $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if (function_exists('get_magic_quotes_gpc')) {
  $get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
  if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
    $value = urlencode(stripslashes($value));
  } else {
    $value = urlencode($value);
  }
  $req.= "&$key=$value";
}


// Step 2: POST IPN data back to PayPal to validate
$ch = curl_init('https://ipnpb.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "https://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');

if ( !($res = curl_exec($ch)) ) {
  // error_log("Got " . curl_error($ch) . " when processing IPN data");
  curl_close($ch);
  exit;
}
curl_close($ch);


// inspect IPN validation result and act accordingly
if (strcmp($res, "VERIFIED") == 0) {
  // The IPN is verified, process it
 
} 
else if (strcmp($res, "INVALID") == 0) {
  // IPN invalid, log for manual investigation
   
}



// inspect IPN validation result and act accordingly
if (strcmp($res, "VERIFIED") == 0) {


  // The IPN is verified, process it:
  // check whether the payment_status is Completed
  // check that txn_id has not been previously processed
  // check that receiver_email is your Primary PayPal email
  // check that payment_amount/payment_currency are correct
  // process the notification
  // assign posted variables to local variables
  
    

  
$link=mysqli_connect("mysql5.gscheiderle.de","db562163_1","339Us%&/6815","db562163_1");
mysqli_query($link, "insert into paypal_transfer_infos 
( 
  email_kunde,
  geschaeft_kd,
  kd_id_paypal,
  kd_nr,
  vorname,
  name,
  str,
  plz,
  ort,
  kunden_status,  
  adressen_status,
  schutzberechtigung,
  re_nr,
  re_dat,
  brutto,
  mwst,
  paypal_gebuehr,
  bezahl_status,
  transaktionsnr,
  anzahl_artikel,
  data,
  res
) 
values 
(
'$_POST[payer_email]',
'$_POST[payer_business_name]',
'$_POST[payer_id]',
'$_POST[custom]',
'$_POST[first_name]',
'$_POST[last_name]',
'$_POST[address_street]',
'$_POST[address_zip]',
'$_POST[address_city]',
'$_POST[payer_status]',        
'$_POST[address_status]',       
'$_POST[protection_eligibility]',
'$_POST[invoice]',
'$_POST[payment_date]',
'$_POST[mc_gross]',
'$_POST[tax]',
'$_POST[mc_fee]',
'$_POST[payment_status]',
'$_POST[txn_id]',
'$_POST[num_cart_items]',
'$raw_post_data', 
'$res'
)
" );
    
    
mysqli_query($link," update rechnungen_summe set transaktionsnr = '$_POST[txn_id]', bezahlt = '1' where re_nr = '$_POST[invoice]' ");    
     
mysqli_query($link," update freigabe set bezahlt = '1' where kd_nr = '$_POST[custom]' and re_nr = '$_POST[invoice]' ");      
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
include( "../php_code/freigabe_links.php" ); 
include("../php_code/freigabe_links.php");   

$empfaenger='usnh2000@yahoo.de, sack.uwe@gmail.com';
$betreff="Ihre Bestellung auf Gscheiderle.de";
$inhalt= "
<div align=\"center\">
  <center>
  <table style=\"border: 0px; width: 800px; heigh: 300px; background-color: #FFFFFF;\">
    
      <tr>
      <td width=\"80%\" align=\"left\" colspan=\"2\">
      <font face=\"arial\" size=\"4\">
      
Sehr geehrte(r)<br>
      

$_POST[first_name] $_POST[first_name],<br><br>

Sie haben den Betrag von $_POST[mc_gross] Euro bei Paypal unter der Transaktions-Nr. $_POST[txn_id]<br>
&uuml;berwiesen:<br><br>

Ihr Zugang zu den Tipps:<br><br>";
	 
	 foreach ( $freigabelink as $links ) {
	
	 $inhalt.=$links."<br>";
}


$inhalt.="<br><br>";
     
$inhalt.="<a href='http://localhost/gscheiderle/tcpdf/examples/pdf_rechnung_gscheiderle.php?re_nr=$_POST[invoice]&kd_nr=$_POST[custom]&transaktionsnr=$_POST[txn_id]' target='_blanc'>RECHNUNG DRUCKEN UND/ODER PDF SPEICHERN</a><br>
<br>";
     

$inhalt.="Herzlichen Dank.<br>
<br>
Die Leut' von gscheiderle.de  <br><br><br>
    
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

$_POST[first_name] $_POST[first_name],<br><br>

hat den Betrag von $_POST[mc_gross] Euro bei Paypal unter der Transaktions-Nr. $_POST[txn_id]<br>
&uuml;berwiesen:<br><br>

Zugang zu den Tipps:<br><br>";
	 
	 foreach ( $freigabelink as $links ) {
	
	$inhalt_1.=$links."<br>";
}

$inhalt_1.="<br><br>";
     
$inhalt_1.="<a href='http://localhost/gscheiderle/kasse/ipn_analyse.php?transaktionsnr=$_POST[txn_id]'>IPN $_POST[txn_id]</a><br>

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
    
    
    
    
} 

else if (strcmp ($res, "INVALID") == 0) {


}    
?>



