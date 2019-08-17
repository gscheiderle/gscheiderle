<?php

//////////////////////////////////////////////
//
// Passwort validieren
//
/////////////////////////////////////////////




$passwort_match='/[ @  \] \[ \" \' \} \{ \( \) ! ° $ ? * ß ä ü ö Ö Ä Ü > < = ^ ² ³ ]/';
if (preg_match($passwort_match,$_POST['password'])) { $hinweise="Sie verwenden unerlaubte Sonderzeichen!<br>
																 Erlaub sind:  _ - § % & * ~  # + :  <br>"; 
													             $passwordval=FALSE; 
																 $unerlaubt= TRUE; }
	
	
$passwort_match_1='/[a-z]/';
if(!(preg_match($passwort_match_1,$_POST['password']))) {$hinweise_1="PASSWORT: Es fehlt mindestens 1 Kleinbuchstabe!<br>"; 
														$passwordval=FALSE;}

$passwort_match_2='/[A-Z]/';
if(!(preg_match($passwort_match_2,$_POST['password']))) {$hinweise_2="PASSWORT: Es fehlt mindestens 1 Grossbuchstabe!<br>"; 
														$passwordval=FALSE;}

$passwort_match_3='/[0-9]/';
if(!(preg_match($passwort_match_3,$_POST['password']))) {$hinweise_3="PASSWORT: Es fehlt mindestens 1 Ziffer!<br>"; 
														$passwordval=FALSE;}

$passwort_match_4='/[ _ - § % & * ~  # + ^ ² ³ : ]/';
if(!(preg_match($passwort_match_4,$_POST['password']))) {$hinweise_4="PASSWORT: Es fehlt mindestens 1 Sonderzeichen!<br>"; 
														 if ( $unerlaubt == TRUE ) { $hinweise_4 = ""; }
														$passwordval=FALSE;}

if (strlen($_POST['password']) < $passwortlaenge ) { $hinweise_5="PASSWORT: Das Passwort ist zu zu kurz. Mindesl&auml;nge: $passwortlaenge !"; 
												   $passwordval=FALSE;}

?>