<?php
$postkriterium=html_entity_decode($_POST['kriterium']);
//$postkriterium=htmlentities($_POST['kriterium']);



$postkriterium_2=htmlentities($_POST['kriterium_2']);

if ( ( $_POST['adressen_suchen'] == "plz_bereich") && ( $postkriterium != "" ) ) {
$von=substr("$_POST[kriterium]",0,2)*1000;
$bis=substr("$_POST[kriterium]",-2,2)*1000;
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung from adressen where email != '' and plz >= '$von' and plz <= '$bis' and adressenfehler = 'true' and newsletter != 'NO'";}

if ( $_POST['gruppe_senden'] == TRUE ) {
$kriterium = "select plz, kd_nr, name, vorname, geschlecht, email from gruppen where gruppe = '$_POST[gruppen_auswahl]' "; }

 
if ($_POST['adressen_suchen'] == "alle") {
$kriterium = "select * from adressen where  email != '' order by kd_nr desc ";}


if ($_POST['adressen_suchen'] == "email_alle") {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz, telefon, mobil_telefon, email, ausbildung, zeitstempel, ip  from adressen where  email != '' and adressenfehler = 'true' and newsletter != 'NO' order by name ";}

if ( ( $_POST['adressen_suchen'] == "email") && ( $postkriterium != "" ) ) {
 
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung from adressen where  email like  '$_POST[kriterium]%' ";}




if ( ( $_POST['adressen_suchen'] == "geburts_monat") && ( $postkriterium != "" ) ) {
$kriterium = "select * from adressen where  geburtsmonat =  '$postkriterium%'";}


/* if ( $_POST['adressen_suchen'] == "email_kleiner_1500") {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung from adressen where kd_nr <= '2000' and email != '' and newsletter != 'NO' and adressenfehler = 'true' and new = 'Ja' ";}

if ( $_POST['adressen_suchen'] == "email_groesser_1500") {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung from adressen where kd_nr > '2000' and kd_nr <= '2600' and email != '' and newsletter != 'NO' and adressenfehler = 'true' and new = 'Ja' ";}

if ( $_POST['adressen_suchen'] == "email_groesser_2600") {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email from adressen where kd_nr > '2600' and kd_nr <= '3600' and email != '' and newsletter != 'NO' and adressenfehler = 'true' and new = 'Ja' ";}

if ( $_POST['adressen_suchen'] == "email_groesser_3600") {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email from adressen where kd_nr > '3600' and email != '' and newsletter != 'NO' and adressenfehler = 'true' and new = 'Ja' ";} */

if ($_POST['adressen_suchen'] == "markierung_2") {
$kriterium = "select kd_nr, kontakt_art, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where markierung_2 like '$postkriterium_2%' and newsletter != 'NO'";}


if ($_POST['adressen_suchen'] == "kontakt_neu_ver") {
$kriterium="select kd_nr, kontakt_art, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where kontakt_art like '$postkriterium_2%' and adressenfehler = 'true' and newsletter != 'NO'  
and (zeitstempel+432000) >= UNIX_TIMESTAMP()";}


if ($_POST['adressen_suchen'] == "markierung_1") {
$kriterium = "select kd_nr, markierung_1, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where markierung_1 like '$postkriterium_2%' and adressenfehler = 'true' and newsletter != 'NO' ";}

if ($_POST['adressen_suchen'] == "markierung_2") {
$kriterium = "select kd_nr, markierung_2, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where markierung_2 like '$postkriterium_2%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO' ";}

/* if ($_POST['adressen_suchen'] == "bonus") {
$kriterium = "select kd_nr, bonus, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung from adressen where bonus like '$postkriterium%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO' ";} */


if ( ( $_POST['adressen_suchen'] == "plz") && ( $postkriterium != "" ) )  {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where plz like '$postkriterium%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'  and new = 'Ja' ";}

if ( ( $_POST['adressen_suchen'] == "kdnr") && ( $postkriterium != "" ) )  {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where kd_nr like '$postkriterium%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'  and new = 'Ja' ";}

if ( ( $_POST['adressen_suchen'] == "name") && ( $postkriterium != "" ) ) {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where name like '$postkriterium%' ";}

if ( ( $_POST['adressen_suchen'] == "firma") && ( $postkriterium != "" ) )  {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where firma like '$postkriterium%' ";}

if ($_POST['test_versand'] == TRUE) {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz,  telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where email like '$_POST[email_probe_adresse]' and email != ''";}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 if ($_POST['adressen_suchen'] == "div_plz") {
$plz_anzahl=substr_count($postkriterium, ";");
$i=1;
$start=0;
$and=" and  email != '' and adressenfehler = 'true' and newsletter != 'NO' and new != 'Ja' ";
$or=" or plz like ";
for ($i;$i <= $plz_anzahl;$i++) {

if ($i < $plz_anzahl) {
$or=" or plz like ";
$and=" and  email != '' and adressenfehler = 'true' and newsletter != 'NO' and new != 'Ja' ";
}
else {$or="";
      $and="";
            }
$anzahl_ziffern=$_POST['mehrstellig']-1;
$plznummern=substr("$_POST[kriterium]",$start, $anzahl_ziffern);
$plz_nummern.="'$plznummern%' $and $or ";

$start=$start + $_POST['mehrstellig'];
}


$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz, telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where plz like $plz_nummern and  email != '' and adressenfehler = 'true' and newsletter != 'NO'  and new != 'Ja' order by plz";}

$zaehler=0; 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 if ($_POST['adressen_suchen'] == "div_plz_dhh_neu") {
$plz_anzahl=substr_count($postkriterium, ";");
$i=1;
$start=0;
$and=" and ausbildung like 'DHH-%' ";
$or=" or plz like ";
for ($i;$i <= $plz_anzahl;$i++) {

if ($i < $plz_anzahl) {
$or=" or plz like ";
$and=" and ausbildung like 'DHH-%' ";
}
else {$or="";
      $and="";
            }
$anzahl_ziffern=$_POST['mehrstellig']-1;
$plznummern=substr("$_POST[kriterium]",$start, $anzahl_ziffern);
$plz_nummern.="'$plznummern%' $and $or ";

$start=$start + $_POST['mehrstellig'];
}


$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz, telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where plz like $plz_nummern and ausbildung like 'DHH-%' order by plz";



$zaehler=0; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($_POST['adressen_suchen'] == "div_plz_dhh") {
$plz_anzahl=substr_count($postkriterium, ";");
$i=1;
$start=0;
$and=" and ausbildung = 'DHH' ";
$or=" or plz like ";
for ($i;$i <= $plz_anzahl;$i++) {

if ($i < $plz_anzahl) {
$or=" or plz like ";
$and=" and ausbildung = 'DHH' ";
}
else {$or="";
      $and="";
            }
$anzahl_ziffern=$_POST['mehrstellig']-1;
$plznummern=substr("$_POST[kriterium]",$start, $anzahl_ziffern);
$plz_nummern.="'$plznummern%' $and $or ";

$start=$start + $_POST['mehrstellig'];
}


$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz, telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where plz like $plz_nummern and ausbildung = 'DHH' order by plz";
$zaehler=0; 
}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ( $_POST['adressen_suchen'] == "div_plz_dhh_neu_alle") {
$kriterium = "select kd_nr, firma, name, vorname, geschlecht, plz, telefon, mobil_telefon, email, ausbildung, newsletter, new from adressen where ausbildung like 'DHH-%' and email != '' and newsletter != 'NO' and adressenfehler = 'true'";}


?>