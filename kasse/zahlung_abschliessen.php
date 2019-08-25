<?php if (! isset( $_COOKIE['re_nr'] ) ) { setcookie("re_nr",$_POST['neuerenr']); } ?>
<?php if (! isset( $_COOKIE['cart_id'] ) ) { setcookie("cart_id",$cart_id_re); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
<title>GSCHEIDERLE.DE Zahlung abschliessen</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
  <script var __adobewebfontsappname__="dreamweaver"> </script>
  <script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"> </script>
	
</head>

<body>

<?php 
    

    

include("../intern/mysql_connect_gscheiderle.php"); 
include("../intern/parameter.php");


function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck; $db_ausdruck="";}
  }
    $form_1="<form action='zahlung_abschliessen.php' method='POST'>";    
    
if ( ( $_POST['rechnung_erstellen'] == TRUE ) || ( $_POST['paypal_formular'] == TRUE ) ) {
    
       $form_1=''; 
    
      $form_2="<form action='https://www.paypal.com/cgi-bin/websrc' method='POST'>";
}
    
  echo $form_1;
  echo $form_2;
     
?>

	
<?php include("../seitenelemente/header.php"); ?>
    
<br>
<br>

    
<?php 
include("../seitenelemente/navigation.php"); 
?>    

<br>
<br>

<?php echo "<div class='container'> 
	
<div class='row'>
		
    <div class='col-$md-3 '>
     </div>
    
       <div class='col-$md-6 bg-white text-info' style='text-align: center;'>"; ?>

<?php  
    
if ( $_COOKIE['kd_nr'] != "" ) {
mysqli_query($link,"update cart set kd_nr = '$_COOKIE[kd_nr]' where pseudo_kd_nr = '$_COOKIE[pseudo_kd_nr]' "); 
echo "<h1> Sie haben geordert: <br> <br></h1>";  
}
else { echo "<h1><font style='color: red;'>Sie sind nicht eingeloggt !<br></font><br> <br></h1>"; 
	 }   
    
           
	  echo "</div>
		   
       <div class='col-$md-3'>
      </div>
	</div>
</div>";		


	
$email_select=mysqli_query($link," select kd_nr, name, vorname, strasse, plz, ort, email from adressen where kd_nr = '$_COOKIE[kd_nr]' " );
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
    
<?php 
	
echo
"<div class='container'> 
	
<div class='row'>
		
    <div class='col-$md-2 '>
     </div>
    
       <div class='col-$md-8 bg-white text-dark' style='text-align: center;'>"; ?>
		   
		   <div class="table-responsive">
  
			   <table class="table" border="0" width="100%">
         

            <tr>
                
                <td style=' background-color: #EEE6B6'>Tipp:</td>
                <td style=' background-color: #EEE6B6'>Rubrik.:</td>
                <td style=' background-color: #EEE6B6; text-align: right;'>Preis:</td>
                <td style=' background-color: #EEE6B6; text-align: right;'> </td>
            </tr>
            <tr><td colspan="4">&nbsp;</td></tr>
     
<?php include("../php_code/cart_abrufen.php"); ?>    
     
<?php       foreach ( $alle_artikel as $value ) {
    
            print_r($value);
}
?>     
     
     
 <?php     
	 	echo "
            <tr><td colspan='4'>&nbsp;</td></tr>
            <tr>
                <td colspan='2' style='text-align: right; background-color: #EEE6B6'>$mw_st % enhaltene Mwst.:</td>
                <td style='text-align: right; background-color: #EEE6B6'>$mwst&nbsp;&nbsp;</td>
                <td style='text-align: center; background-color: #EEE6B6'>&euro;</td>
            </tr>
            
            <tr>
                <td colspan='2' style='text-align: right;'><b>Summe</td>
                <td style='text-align: right;'><b>$summe&nbsp;&nbsp;</td>
                <td style='text-align: center; background-color: #FFF'><b>&euro;</td>
             </tr>
  
             ";
            
    
 echo "</table>";
        
echo "		   
	  </div>
		   
       <div class='col-$md-2'>
      </div>
	</div>
</div>	";
		   
?>		   
 
 <?php 
				   
echo "<div class='container'> 
	
<div class='row'>
		
    <div class='col-$md-2'>
     </div>
    
       <div class='col-$md-8 bg-white text-dark' style='text-align: center;'>"; ?>

	
<?php
    
    
$paypal_zusatz="Sie k&ouml;nnen mit PAYPAL SICHER zahlen, auch wenn Sie dort &uuml;ber kein Konto verf&uuml;gen.<br>

Zum Beispiel per Lastschrift von Ihrem Bank-Konto oder mit Kreditkarte.&nbsp;";
    
$paypal_zusatz_2="Nach dem Bezahl-Vorgang bei Paypal warten Sie<br>
bis Sie wieder auf gscheiderle.de zur&uuml;ckgeleitet werden!<br>";


if ( ( $_POST['rechnung_erstellen'] == FALSE ) && ( $_POST['paypal_formular'] == FALSE ) ) {

echo "
<font style=' background-color: yellow; font-size: 24px; '>$paypal_zusatz</font></h3>";
    
echo "
<br><br>
<font style=' color: #00648d; background-color: #FFFFFF; font-size: 24px; '>Jetzt kostenpflichtig bestellen:</font><br>
<br>



<button type='submit' value='rechnung_erstellen' name='rechnung_erstellen' 
style=' text-align: center; border: 0px; border-color:; width:300px; height:50px; background-color: #00648d; border-width:0;font-family: Open Sans; font-size: 24px; font-weight: 700; color:#FFFFFF;border-radius: 6px 6px 6px 6px; box-shadow: 10px 10px 10px #dadada;'>Rechnung erstellen</button>&nbsp;&nbsp;&nbsp;";
}
    
        
    
    
if ( ( $_POST['rechnung_erstellen'] == "rechnung_erstellen" )  || ( $_POST['paypal_formular'] == "paypal_formular" ) ) {

include("../php_code/rechnung_erstellen.php"); 
    
echo "
<button type='submit' value='paypal_formular' name='paypal_formular' style=' text-align: center; border: 0px; border-color:; width:300px; height:50px; background-color: #00648d; border-width:0; font-family: Open Sans; font-size: 24px; font-weight: 700; color:#FFFFFF;border-radius: 6px 6px 6px 6px; box-shadow: 10px 10px 10px #dadada;'>PAYPAL-Formular senden</button>&nbsp;&nbsp;&nbsp;";

} 
    
    

echo "<br><font style=' font-size: 24px; background-color: #FFF; color: darkgreen;'>$paypal_zusatz_2</font></h3>";
echo "</div>";
 
echo "</td>
  </tr>
    </table>";
		   
echo "		   
	  </div>
		   
       <div class='col-$md-3'>
      </div>
	</div>
</div>	";		   
 


$summe_brutto=number_format($summe_brutto, 2, ".", ".");    

$summe_netto=number_format($summe_netto, 2, ".", ".");

$mehrwert_steuer=number_format($mehrwertsteuer, 2, ".", ".");
    

            
            
foreach ( $mehr_artikel as $artikel ) {
    
    print_r ( $artikel);
}


echo "


   
   <input type='hidden' name='currency_code' value='EUR' />
   <input type='hidden' name='adress_override' value='1' />
   <input type='hidden' name='custom' value='$_COOKIE[kd_nr]' />
   <input type='hidden' name='upload' value='1' />
   <input type='hidden' name='business' value='usnh2000@yahoo.de' />
   <input type='hidden' name='invoice' value='$neuerenr' />
   <input type='hidden' name='cmd' value='_cart' />
   
   <input type='hidden' name='cancel_return' value='http://192.168.2.106/gscheiderle/kasse/cancel_seite.php?kd_nr=$kd_nr_db&re_nr=$neuerenr' />
   <input type='hidden' name='return' value='http://192.168.2.106/gscheiderle/kasse/danke_seite.php?kd_nr=$kd_nr_db&re_nr=$neuerenr' />
   
   <input type='hidden' name='rm' value='2' />
   <input type='hidden' name='tax_cart' value='$mehrwert_steuer' />
   <input type='hidden' name='first_name' value='$vorname_db' />
   <input type='hidden' name='last_name' value='$name_db' />
   <input type='hidden' name='email' value='u.sack@variusmedien.de' />
   <input type='hidden' name='country' value='D' />
   <input type='hidden' name='address1' value='$strasse_db' />
   <input type='hidden' name='zip' value='$plz_db' />
   <input type='hidden' name='city' value='$ort_db' />
   <input type='hidden' name='lc' value='DE' />
";

?>


  


    
    
<br><br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("../seitenelemente/footer.html"); ?>
	
</div>
	
	
	
		   
		</form>
	</body>
</html>


