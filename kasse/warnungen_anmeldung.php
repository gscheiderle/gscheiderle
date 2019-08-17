<?php
if (($_POST['anrede'] == "") && ($_POST['adresse_speichern'] == TRUE) ) {echo "<font style=' color:red; font-size: 24px; font-weight:600;'>Ihre Anrede fehlt !</font><br>"; 
$angabe=FALSE;}
if (($_POST['nachname'] == "") && ($_POST['adresse_speichern'] == TRUE) )  {echo "<font style=' color:red; font-size: 24px; font-weight:600;'>Ihr Name fehlt !</font><br>"; 
$angabe=FALSE;}
if (($_POST['vorname'] == "") && ($_POST['adresse_speichern'] == TRUE) ) {echo "<font style=' color:red; font-size: 24px; font-weight:600;'>Ihr Vorname fehlt !</font><br>"; 
$angabe=FALSE;}

/*$_POST['plz']=str_replace(" ","",trim(strip_tags($_POST['plz']))); 
if (($_POST['plz'] == "") && ($_POST['adresse_speichern'] == TRUE) ) {echo "<font color=\"red\">Die PLZ fehlt !</font><br>"; 
$angabe=FALSE;}*/

$post_email=strip_tags($_POST['e_mail']);
$email_f=strtolower(str_replace(" ","",trim("$post_email"))); 
$email_mdfive=md5($email_f);
if (($email_f == "") && ($_POST['adresse_speichern'] == TRUE) ) {echo "<font style=' color:red; font-size: 24px; font-weight:600;'>Die eMail-Adresse fehlt !</font><br>";
$angabe=FALSE;
}


if  ((!preg_match($email_match,$email_f)) && ($_POST['adresse_speichern'] == TRUE))  {
echo "
<br><font style=' color:red; font-size: 24px; font-weight:600;'>DIESE E-MAIL-ADRESSE IST UNGUELTIG !</font><br><br>"; 
$angabe=FALSE;
}



?>