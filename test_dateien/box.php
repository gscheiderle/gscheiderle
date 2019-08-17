<?php 
$zeit=time();
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");

$form= "<form action='index.php?seiten_id=1033&preis=$preis&termin_id=$_GET[termin_id]' method='POST'>";
if ( $_POST['spenden'] == TRUE ) {
$form="<form action='https://www.paypal.com/cgi-bin/websrc' method='POST'>";
}
echo $form;



$angabe=TRUE;

$value="zur Registrierung";
if ( $_GET['seiten_id'] == 1033 ) {  $value="zahlen bei Paypal"; 
$paypal_zusatz="&nbsp;Sie k&ouml;nnen sicher &uuml;ber PAYPAL zahlen, auch wenn Sie dort kein Konto haben.&nbsp;";
$paypal_zusatz_2="&nbsp;Warten Sie, bis Sie wieder auf meine Website zur&uuml;ckgeleitet werden!&nbsp;";
}

if ( ( $_POST['formular_anzeigen'] == FALSE ) && ( $_POST['bonus_anfordern'] == FALSE ) ){

 echo "

<input type=\"submit\" value=\"$value\" name=\"formular_anzeigen\" 
style=\" text-align: center; border: 0px; border-color:; width:300px; height:50px; background-color: #00648d; border-width:0;font-family: Open Sans; font-size: 24px; font-weight: 700; color:#FFFFFF;border-radius: 6px 6px 6px 6px;\">&nbsp;&nbsp;&nbsp;
";
echo "<h3><font style=' background-color: yellow;'>$paypal_zusatz</font></h3>";
echo "<h3><font style=' background-color: red; color: #FFFFFF;'>$paypal_zusatz_2</font></h3>";
}
 
 if ( ( $_POST['formular_anzeigen'] == TRUE ) || ( $_POST['bonus_anfordern'] == TRUE ) ) {

 
echo " 
<h3>
";

$selected = "selected";
    if ( $_POST['geschlecht'] == "w" ) {$selected_w = "selected"; $selected_m = ""; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $_POST['geschlecht'] == "m" ) {$selected_w = ""; $selected_m = "selected"; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $geschlecht_db_em == "w" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = ""; $selected_w_db = "selected"; $selected = "";}
    if ( $geschlecht_db_em == "m" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = "selected"; $selected_w_db = ""; $selected = "";}
	
    echo "
	<select name=\"geschlecht\" tabindex=\"8\">
    <option $selected value=\"\">Anrede</option>
    <option $selected_w $selected_w_db value=\"w\">Frau</option>
    <option $selected_m $selected_m_db value=\"m\">Mann</option>
    </select>  *<br>
";
    
    
if (($_POST['geschlecht'] == "") && ($_POST['bonus_anfordern'] == TRUE)   && ($_POST['nur_einloggen'] == FALSE) ){echo "<font color=\"red\"><br>Die Anrede fehlt !"; 
$angabe=FALSE;}
    
    
echo "
<input type=\"text\" name=\"nachname\" size=\"36\" value=\"$_POST[nachname]\">&nbsp;&nbsp;Name *<br>";
$_POST['nachname']=str_replace(" ","",trim(strip_tags($_POST['nachname']))); 
if (($_POST['nachname'] == "") && ($_POST['bonus_anfordern'] == TRUE)   && ($_POST['nur_einloggen'] == FALSE) ){echo "<font color=\"red\"><br>Ihr Name\" fehlt !<br>"; 
$angabe=FALSE;}


echo "
<input type=\"text\" name=\"vorname\" size=\"36\" value=\"$_POST[vorname]\">&nbsp;&nbsp;Vorname *<br>";
$_POST['vorname']=str_replace(" ","",trim(strip_tags($_POST['vorname']))); 
if (($_POST['vorname'] == "") && ($_POST['bonus_anfordern'] == TRUE)  && ($_POST['nur_einloggen'] == FALSE )){echo "<font color=\"red\"><br>Ihr Vorname\" fehlt !<br>"; 
$angabe=FALSE;}

echo "
<input type=\"text\" name=\"e_mail\" size=\"36\" value=\"$_POST[e_mail]\">&nbsp;&nbsp;E-Mail *<br>";
$post_email=strip_tags($_POST['e_mail']);
$email_f=strtolower(str_replace(" ","",trim("$post_email"))); 
$email_mdfive=md5($email_f);
if (($email_f == "") && ($_POST['bonus_anfordern'] == TRUE) && ($_POST['nur_einloggen'] == FALSE)){echo "<font color=\"red\"><br>Die \"eMail-Adresse\" fehlt !<br>";
$angabe=FALSE;}


$email_match='/[A-Z0-9.%_-]+@{1}[A-Z0-9._%-]+[.A-Z]+/i';
if ( ((!preg_match($email_match,$email_f)) && ($_POST['bonus_anfordern'] == TRUE) && ($_POST['nur_einloggen'] == FALSE)) || 
((!preg_match($email_match,$email_f)) && ($_POST['bonus_anfordern'] == TRUE) && ($_POST['nur_einloggen'] == TRUE)) ){
echo "
<br><font color=\"red\">Diese eMail-Adresse ist ung&uuml;ltig !</font>"; 
$angabe=FALSE;
} 
 
echo "

<br>

<input type=\"checkbox\" name=\"nur_einloggen\" style=\" height:25px; width:25px; \"> mit bereits registrierter eMail-Adresse einloggen
<br><br>
<input type=\"submit\" name=\"bonus_anfordern\" value=\"Adresse speichern\" style=\"width:200px; height:28px; background-color:orange; border-width:0;font-size: 20px;color:#000000;border-radius: 6px 6px 6px 6px;\">

";

} // ende if formular_zeigen


$date_select=mysqli_query($link,"select termin_bis from termine where termin_id = '$_GET[termin_id]' ");
while( $date_result = mysqli_fetch_array( $date_select, MYSQLI_BOTH ) ) {
$veranstaltungs_datum=$date_result['termin_bis'];
}


$kontaktart="Veranstaltung, ".$veranstaltungs_datum;
  
$email_check = FALSE;
if ( ( $_POST['nur_einloggen'] == TRUE ) &&  ( $_POST['bonus_anfordern'] == TRUE )  ) {
$select_email=mysqli_query($link," select kd_nr, name, vorname, email from adressen where email = '$email_f' " );
while( $result_email=@mysqli_fetch_array($select_email, MYSQLI_BOTH ) ) {


$name_db=$result_email['name'];
$vorname_db=$result_email['vorname'];
$kd_nr=$result_email['kd_nr'];
$kd_nr_db=$result_email['kd_nr'];
$email_db=$result_email['email'];
$email_code_db=$result_email['email_code'];
}
if ( $email_db != "" ) { $email_check = TRUE;
}

if ( $email_db == "" ) { $angabe = FALSE;
echo "
<br>
<font color=\"red\">Die angegebene e-Mail-Adresse<br>
ist bei uns nicht registriert.
<br><br></font>";
exit;
}

} 


if  ( ( $_POST['bonus_anfordern'] == TRUE ) && ( $angabe == TRUE ) ) {

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
}
mysqli_query($link,"UNLOCK TABLES");

mysqli_query($link," insert into adressen (kd_nr, kontakt_art, name, vorname, email, email_code) values ('$neuekdnr', '$kontaktart', '$_POST[nachname]', '$_POST[vorname]', '$email_f', '$email_mdfive') ");

$select_email_3=mysqli_query($link," select kd_nr, name, vorname, email from adressen where email = '$email_f' " );
while( $result_email_3=@mysqli_fetch_array($select_email_3, MYSQLI_BOTH ) ) {


$name_db=$result_email_3['name'];
$vorname_db=$result_email_3['vorname'];
$kd_nr=$result_email_3['kd_nr'];
$kd_nr_db=$result_email_3['kd_nr'];
$email_db=$result_email_3['email'];
$email_code_db=$result_email_3['email_code'];
}

}
}



if  ( ( $_POST['bonus_anfordern'] == TRUE ) && ( $email_db_2 != "" ) && ( $_POST['nur_einloggen'] == FALSE ) ) {
echo "<br>Diese eMail-Adresse ist bereits registriert !<br>
Loggen Sie sich &uuml;ber registrierter eMail ein !<br>";
exit;
}


if  ( ( ( $_POST['bonus_anfordern']== TRUE ) && ( $angabe == TRUE )  )  || ( ( $_POST['bonus_anfordern']== TRUE ) && ( $_POST['nur_einloggen'] == TRUE ) && ( $email_check == TRUE )  && ( $angabe == TRUE ) )  )  
{ 
gesperrte_email($email_2,( $_POST['bonus_anfordern']);
gesperrte_email($email_2,( $_POST['nur_einloggen']);


if ( $_POST['nur_einloggen'] == TRUE ) {
$email_select=mysqli_query($link," select kd_nr, name, vorname, email from adressen where email = '$email_f' " );
while( $result_email=@mysqli_fetch_array($email_select, MYSQLI_BOTH ) ) {
$name_db=$result_email['name'];
$vorname_db=$result_email['vorname'];
$kd_nr=$result_email['kd_nr'];
$kd_nr_db=$result_email['kd_nr'];
$email_db=$result_email['email'];
$email_code_db=$result_email['email_code'];
if ( $result_email['email'] != "" ) {$email_check = TRUE; 
mysqli_query($link," update adressen set kontakt_art = '$kontaktart' where kd_nr = '$kd_nr' ");
}

}
}
mysqli_query($link," update adressen set kontakt_art = '$kontaktart' where kd_nr = '$kd_nr' ");
mysqli_query($link," insert into teilgenommen_haben (event, kd_nr, zeit) values ('$kontaktart', '$kd_nr', '$zeit') ");

echo "


&nbsp;&nbsp;
<input type=\"submit\" name=\"spenden\" value=\"weiter ...\" style=\"width:180px; height:28px; background-color:red; border-width:0;font-size: 20px;color:#FFFFFF;border-radius: 6px 6px 6px 6px;\"> 
";
}

 
if ( ($angabe == FALSE) && ($_POST['bonus_anfordern'] == TRUE)  && ($_POST['nur_einloggen'] == FALSE) ){ echo "<font color=\"red\">Wir konnten Ihre Daten nicht verarbeiten !";} 

echo "<input type='hidden' name='itemname' value='$buchungstext'>";
echo "<input type='text' name='be_trag' value='$_COOKIE[preis]'>";
echo "<input type='hidden' name='kd_nr' value='$kd_nr'>";
echo "<input type='hidden' name='kd_nr_db' value='$kd_nr_db'>";
echo "<input type='hidden' name='name_db' value='$name_db'>";
echo "<input type='hidden' name='vorname_db' value='$vorname_db'>";
echo "<input type='hidden' name='email_f' value='$email_f'>";
echo "<input type='hidden' name='email_code' value='$email_code_db'>";

$kd_nr_ua=$_POST['kd_nr'].$_POST['email_code'].$_GET['termin_id'];
$re_nr=time() / 17;
echo "

   <input type=\"hidden\" name=\"cmd\" value=\"_xclick\" />
   <input type=\"hidden\" name=\"business\" value=\"taolifetransformation@gmail.com\" />
   <input type=\"hidden\" name=\"item_name\" value=\"$_POST[itemname]\" />
   <input type=\"hidden\" name=\"item_number\" value=\"$_GET[termin_id]\" />
   <input type=\"hidden\" name=\"currency_code\" value=\"EUR\" />
   <input type=\"hidden\" name=\"amount\" value=\"$_POST[be_trag]\" />
   <input type=\"hidden\" name=\"cancel_return\" value=\"https://www.petra-$uwesack.de/veranstaltungen_buchen/cancel_seite.php?seiten_id=1001&?kd_nr=$_POST[kd_nr]\" />
   <input type=\"hidden\" name=\"return\" value=\"https://www.petra-$uwesack.de/veranstaltungen_buchen/danke_seite.php?kd_nr=$_POST[kd_nr]&seiten_id=1001\" />
   <input type=\"hidden\" name=\"custom\" value=\"$kd_nr_ua\" />
   <input type=\"hidden\" name=\"invoice\" value=\"$re_nr\" />
   <input type=\"hidden\" name=\"rm\" value=\"2\" />
   
  
   <input type=\"hidden\" name=\"first_name\" value=\"$_POST[vorname_db]\" />
   <input type=\"hidden\" name=\"last_name\" value=\"$_POST[name_db]\" />
   <input type=\"hidden\" name=\"email\" value=\"$_POST[email_f]\" />
   <input type=\"hidden\" name=\"lc\" value=\"DE\" />
";

?>


