<?php if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<?php if (! isset( $_COOKIE['kd_nr'] ) ) { setcookie("kd_nr",$_POST['kd_nr_for']); } ?>
<?php if (! isset( $_COOKIE['vorname'] ) ) { setcookie("vorname",$_POST['vorname_for']); } ?>
<?php if (! isset( $_COOKIE['name'] ) ) { setcookie("name",$_POST['name_for']); } ?>
<?php if (! isset( $_COOKIE['email'] ) ) { setcookie("email",$_POST['email_for']); } ?>
<?php if (! isset( $_COOKIE['eigentuemer'] ) ) { setcookie("eigentuemer",$_POST['eigentuemer']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gscheiderle.de Bezahlseite</title>
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../ckeditor/css/style_768.css"> <!-- Handy -->
		
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

include("../intern/mysql_connect_gscheiderle.php"); 
include("../intern/parameter.php");
include("../intern/funktionen.php");
include("../php_code/einloggen_script.php");



$angabe = TRUE ;

	
echo $form= "<form action='index.php' method='POST'>"; 
    

?>
	
    

<div class="wrapper">
	

	
<?php 
	
	include("../seitenelemente/header.html");
	
echo "<div class='nav'>";	
	
	include("../seitenelemente/navigation.php");
	
echo "</div>";	
	
	
	
	
echo "<div class='article_tip_auswahl'>";
	

echo "<h1>Bitte hier registrieren:</h1>";
	
	
			if ( ( $_POST['adresse_speichern'] == "adresse_speichern" )  && ( $_POST['agb_gelesen'] == TRUE ) )  { $einloggen = TRUE; }
    
            if ( $email_vorhanden == TRUE ) { $einloggen = FALSE; 
                                            
                   echo "<h1><a href='http://localhost/gscheiderle/einloggen.php'><font style='color: #FFF; background-color: #E7801A;'>&nbsp;&nbsp;Passwort oder eMail ist falsch oder vorhanden&nbsp;&nbsp;</font></h1></a>";
                                            }
    
            if ( $einloggen == TRUE )
                
			   {
                   echo "<h1><a href='http://localhost/gscheiderle/einloggen.php'><font style='color: #FFF; background-color: #E7801A;'>&nbsp;&nbsp;Jetzt hier einloggen !&nbsp;&nbsp;</font></h1></a>";
               }
	
	
				if ( ( $_POST['adresse_speichern'] == "adresse_speichern" )  && ( $_POST['agb_gelesen'] == FALSE ) )
			         {
					echo "<br><font style=' color:red; font-size: 24px; font-weight:600;'>Sie müssen bestätigen unsere AGBs gelesen zu haben !</font><br>";
					}
	
$passwordval=TRUE;

$angabe= TRUE;

echo " 
<h3>
";

$selected = "selected";
    if ( $_POST['anrede'] == "w" ) {$selected_w = "selected"; $selected_m = ""; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $_POST['anrede'] == "m" ) {$selected_w = ""; $selected_m = "selected"; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $anrede_db_em == "w" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = ""; $selected_w_db = "selected"; $selected = "";}
    if ( $anrede_db_em == "m" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = "selected"; $selected_w_db = ""; $selected = "";}
	
	
	

include("warnungen_anmeldung.php");
	
	
	
	
echo "
	  <select name='anrede' tabindex='1'>
    <option $selected value=''>Anrede</option>
    <option $selected_w $selected_w_db value='w'>Frau</option>
    <option $selected_m $selected_m_db value='m'>Mann</option>
    </select>  
    <br><br>

";
    
  
    
    
echo "
<input type='text' name='nachname' size='36' value='$_POST[nachname]' tabindex='2' > <input type='text' name='vorname' size='36' value='$_POST[vorname]' tabindex='3' > Vorname *<br>
Name *<br><br>
";
$_POST['nachname']=str_replace(" ","",trim(strip_tags($_POST['nachname']))); 
$_POST['vorname']=str_replace(" ","",trim(strip_tags($_POST['vorname']))); 



echo "
<input type='text' name='plz' size='12' value='$_POST[plz]' tabindex='4' > <input type='text' name='ort' size='36' value='$_POST[ort]' tabindex='5' > Ort<br>
PLZ  <br><br>
";
	
echo "
<input type='text' name='strasse' size='36' value='$_POST[strasse]' tabindex='6' ><br>
Stra&szlig;e <br><br>
";	

echo "
<input type='text' name='telefon' size='18' value='$_POST[telefon]' tabindex='7' > <input type='text' name='mobil_telefon' size='18' value='$_POST[mobil_telefon]' tabindex='8' > 
Mobil-Telefon <br>
Telefon <br><br>
";

include("../php_code/email_neukunde_vorhanden.php");  

echo "
<input type='text' name='e_mail' size='36' value='$_POST[e_mail]'  tabindex='9' ><br>
E-Mail *<br><br>";
echo $warnung_email;
    
    
    
 $passwortlaenge=8;
	
	echo "
 <input type='password' name='password' size='36' value='$_POST[password]' tabindex='10' ><br>

PASSWORT (min. 8 Zeichen bestehend aus wenigstens: 1 Kleinbuchstabe, 1 Großbuchstabe, 1 Ziffer, 1 Sonderzeichen) <br><br>";

include("../php_code/passwort_validierung.php");
echo $hinweise.$hinweise_1.$hinweise_2.$hinweise_3.$hinweise_4.$hinweise_5;


if ( $_POST['agb_gelesen'] == 'agb_gelesen' )	{ $checked = "checked"; }
echo "
<a href='../intern/agb.php?seitenid=224' target='_blanc'><h3>Die AGB's finden Sie hier</h3></a>
<h3><input type='checkbox' $checked name='agb_gelesen' value='agb_gelesen' style='height: 25px; width:25px; background-color: red;'>&nbsp;&nbsp;Ich habe die AGBs gelesen</h3>";
	
include("passwortabfrage.php");
	
	
echo "
<button type='submit' name='adresse_speichern' value='adresse_speichern' style='height:35px;width:300px;font-size:24px; font-weight: 600;color:#FFF; background-color:darkgreen;'>
Adresse speichern</button> 
";
	
	
	
	
	include("email_vorhanden.php");
	
	echo "$hinweis_1";
	include("agb_bestaetigen.php");
	


	
/*if ( $_POST['adresse_speichern'] == "adresse_speichern" )  {
	

$select_email=mysqli_query($link," select * from adressen where email = '$email_f' " );
while( $result_email=mysqli_fetch_array($select_email, MYSQLI_BOTH ) ) {
    
$kd_nr=$result_email['kd_nr'];	
$name_db=$result_email['name'];
$vorname_db=$result_email['vorname'];
$kd_nr_db=$result_email['kd_nr'];
$email_db=$result_email['email'];
$email_code_db=$result_email['email_code'];
$eigentuemer_db=$result_email['eigentuemer'];    
}

} */


if  ( ( $_POST['adresse_speichern'] == "adresse_speichern" ) && ( $angabe == TRUE )  && ( $_POST['agb_gelesen'] == "agb_gelesen" ) && ( $passwordval == TRUE ) ) {


echo "<input type='hidden' name='alles_ok' value='ok'>";

	
$select_email_2=mysqli_query($link," select email from adressen where email = '$email_f' " );
while( $result_email_2=mysqli_fetch_array($select_email_2, MYSQLI_BOTH ) ) {
$email_db_2=$result_email_2['email'];
}
if ( $email_db_2 == "" ) {

$sperren=mysqli_query($link,"LOCK TABLES kundennummer write, kundennummer as kundennummer read");
$select_kd_nr = mysqli_query($link,"select max(kd_nr) + 1 as kdnr from kundennummer");
while ($result_kdnr=mysqli_fetch_array($select_kd_nr, MYSQLI_BOTH )){
$neuekdnr=$result_kdnr['kdnr'];
mysqli_query($link,"insert into kundennummer (kd_nr) values ('$neuekdnr') ");
mysqli_query($link,"UNLOCK TABLES");
}
    

$name=htmlentities($_POST['nachname']);
$vorname=htmlentities($_POST['vorname']);

	$status="Kunde";
	
$m123=substr("$_POST[password]",1,6	);
$m123.=substr("$_POST[e_mail]",2,6);
$eigentuemer_neu=md5($m123);

	
	$mdfive_password=md5("$_POST[password]");
	mysqli_query($link," insert into passwords (eigentuemer, password, sessionid, email, zugang) values ('$eigentuemer_neu', '$mdfive_password', '$_COOKIE[pseudo_kd_nr]', '$email_f', '$status') ");
	mysqli_query($link," insert into klartext (eigentuemer, password, email ) values ('$eigentuemer_neu', '$_POST[password]', '$email_f' ) ");

	

$query="insert into adressen (
kd_nr, 
status,
eigentuemer,
name, 
vorname, 
anrede,
strasse,
plz,
ort,
telefon,
mobil_telefon,
email, 
email_reserve,
email_code,
ip
) 
values 
(
'$neuekdnr', 
'$status',
'$eigentuemer_neu',
'$name', 
'$vorname',
'$_POST[anrede]',
'$_POST[strasse]', 
'$_POST[plz]',
'$_POST[ort]',
'$_POST[telefon]',
'$_POST[mobil_telefon]',
'$email_f', 
'$email_f',
'$email_mdfive',
'$_SERVER[REMOTE_ADDR]'
) ";

mysqli_query($link,"$query");

echo mysqli_errno($link,"$query");
}
}


	
?>
	

</h3>

 	 </div> <!-- article //--> 

 </div> <!-- wrapper //--> 



<?php 

include("../seitenelemente/footer.html");

?>

		</form>
	</body>
</html>
