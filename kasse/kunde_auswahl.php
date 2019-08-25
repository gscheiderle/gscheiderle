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

<!--<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>-->
</head>

<body>

<?php 
    
include("../intern/mysql_connect_gscheiderle.php"); 
include("../intern/parameter.php");
include("../intern/funktionen.php");
	

    $up="../";




$form= "<form action='index.php?seiten_id=1033&termin_id=$_GET[termin_id]&pdwzrq=$_GET[pdwzrq]' method='POST'>";
if ( ( $_POST['agb'] == TRUE ) && ( $_POST['agb_gelesen'] == TRUE ) ) { 
$form="<form action='zahlung_abschliessen.php?termin_id=$_GET[termin_id]&pdwzrq=$_GET[pdwzrq]' method='POST'>";
 } 
	
echo $form;

?>
	

<div class="wrapper">
	

	
<?php 
	
	include("../seitenelemente/header.php");
	
echo "<div class='nav'>";	
	
	include("../seitenelemente/navigation.php");
	
echo "</div>";	
	
	
	
	
echo "<div class='article_tip_auswahl'>";
	

echo "<h1>Bitte hier registrieren:</h1>";




echo " 
<h3>
";

$selected = "selected";
    if ( $_POST['geschlecht'] == "w" ) {$selected_w = "selected"; $selected_m = ""; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $_POST['geschlecht'] == "m" ) {$selected_w = ""; $selected_m = "selected"; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $geschlecht_db_em == "w" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = ""; $selected_w_db = "selected"; $selected = "";}
    if ( $geschlecht_db_em == "m" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = "selected"; $selected_w_db = ""; $selected = "";}

include("warnungen_anmeldung.php");
	
    echo "
	  <select name='geschlecht' tabindex='8'>
    <option $selected value=''>Anrede</option>
    <option $selected_w $selected_w_db value='w'>Frau</option>
    <option $selected_m $selected_m_db value='m'>Mann</option>
    </select>  
    <br><br>

";
    
  
    
    
echo "
<input type='text' name='nachname' size='36' value='$_POST[nachname]'><br>
Name *<br><br>
";
$_POST['nachname']=str_replace(" ","",trim(strip_tags($_POST['nachname']))); 



echo "
<input type='text' name='vorname' size='36' value='$_POST[vorname]'><br>
Vorname *<br><br>
";
$_POST['vorname']=str_replace(" ","",trim(strip_tags($_POST['vorname']))); 


echo "
<input type='text' name='plz' size='12' value='$_POST[plz]'> <input type='text' name='ort' size='36' value='$_POST[ort]'> Ort<br>
PLZ  <br><br>
";
	
echo "
<input type='text' name='strasse' size='36' value='$_POST[strasse]'><br>
Stra&szlig;e <br><br>
";	

echo "
<input type='text' name='telefon' size='36' value='$_POST[telefon]'><br>
Telefon <br><br>
";
	
echo "
<input type='text' name='mobil_telefon' size='36' value='$_POST[mobil_telefon]'><br>
Mobil-Telefon <br><br>
";	

echo "
<input type='text' name='e_mail' size='36' value='$_POST[e_mail]'><br>
E-Mail *<br>

";
 
 

	
echo "
<a href='../intern/agb.php?seitenid=224' target='_blanc'><h1>Die AGB's finden Sie hier</h1></a>
<h1><input type='checkbox' name='agb' style='height: 25px; width:25px;'>&nbsp;&nbsp;Ich habe die AGBs gelesen</h1>";
	

echo "
<button type='submit' name='adresse_speichern' value='adresse_speichern' style='height:35px;width:300px;font-size:24px; font-weight: 600;color:#FFF; background-color:darkgreen;'>
Adresse speichern</button>
";
	

  
	
if ( $_POST['adresse_speichern'] == "adresse_speichern" )  {
	


$select_email=mysqli_query($link," select * from adressen where email = '$email_f' " );
while( $result_email=mysqli_fetch_array($select_email, MYSQLI_BOTH ) ) {
	
$name_db=$result_email['name'];
$vorname_db=$result_email['vorname'];
$kd_nr=$result_email['kd_nr'];
$kd_nr_db=$result_email['kd_nr'];
$email_db=$result_email['email'];
$email_code_db=$result_email['email_code'];
}


} 


if  ( ( $_POST['adresse_speichern'] == "adresse_speichern" ) && ( $angabe == FALSE ) ) {

echo $_POST['e_mail'];
	
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
mysqli_query($link,"insert into kundennummer_kopie (kd_nr) values ('$neuekdnr') ");
}
mysqli_query($link,"UNLOCK TABLES");

$name=htmlentities($_POST['nachname']);
$vorname=htmlentities($_POST['vorname']);



mysqli_query($link," insert into adressen (
kd_nr,  
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
'$name', 
'$vorname',
'$_POST[geschlecht]',
'$_POST[strasse]', 
'$_POST[plz]',
'$_POST[ort]',
'$_POST[telefon]',
'$_POST[mobil_telefon]',
'$email_f', 
'$email_f',
'$email_mdfive',
'$_SERVER[REMOTE_ADDR]'
) 
");

	echo mysql_error();

mysqli_query($link," insert into adressen_kopie (
kd_nr,  
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
'$name', 
'$vorname',
'$_POST[geschlecht]',
'$_POST[strasse]', 
'$_POST[plz]',
'$_POST[ort]',
'$_POST[telefon]',
'$_POST[mobil_telefon]',
'$email_f', 
'$email_f',
'$email_mdfive',
'$_SERVER[REMOTE_ADDR]'
) 
) 
");
}
	echo mysql_error();
}
	
?>
	
<input type="text" name="kd_nr" value="<?php echo neuladen($kd_nr, $_POST[kd_nr]); ?>">

</h3>

 	 </div> <!-- article //--> 

 </div> <!-- wrapper //--> 



<?php 

include("../seitenelemente/footer.html");

?>

		</form>
	</body>
</html>
