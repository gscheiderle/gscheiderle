<?php 

 
/* include("../intern/css/span.php");
include("../intern/css/boxen.css"); 
include("../intern/css/schriften.css");  */
include("../intern/parameter.php");
include("../intern/funktionen.php");
include("../intern/mysql_connect_gscheiderle.php");


echo "<form action=\"\" method=\"POST\">";   


$verweildauer=time()-3600;

$tabellen_loeschen=mysqli_query($link,"select * from table_name where zeitstempel < '$verweildauer'");
while ($name=mysqli_fetch_array($tabellen_loeschen, MYSQLI_BOTH )){
mysqli_query($link,"drop table if exists $name[tablename]");
mysqli_query($link,"drop table if exists $name[tablename_2]");
mysqli_query($link,"drop table if exists $name[tablename_3]");
mysqli_query($link,"drop table if exists $name[tablename_4]");
}
mysqli_query($link,"delete from table_name where zeitstempel < '$verweildauer'"); 


$tabellen_name=str_replace("?","7",str_replace("&","6",str_replace(":","5",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",$_COOKIE['PHPSESSID'])))))));   

$temp_tab_name=$tabellen_name."_2"; 
$temp_tab_name=substr($temp_tab_name,-12);

$datum=date("d.m.Y, h:i:s");

$aktuelle_zeit=time(date("d.m.Y:h:i"));

?>
<div align="center">
<table width=800px">
<tr><td>

 <input type="text" value="<?php echo $_GET[kd_nr]; ?>" name="kriterium" tabindex="15"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">

<input type="submit" value="Adressen selectieren" name="adressen_selectieren" tabindex="15"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
 
 

<?php 


 $kriterium_1 = "kd_nr = '$_GET[kd_nr]'";
/*

if ( ( $_POST['zurueck'] == TRUE) || ( $_POST['adresse_updaten'] ) ){
$kleinere_kd_nr=mysqli_query($link,"select kd_nr from $temp_tab_name ");
while( $kleinere_kd_nr_result=mysqli_fetch_array($kleinere_kd_nr, MYSQLI_BOTH ) ) {
$kriterium_1="kd_nr < '$kleinere_kd_nr_result[kd_nr]' order by kd_nr desc limit 1";
}
}

if ($_POST['vor'] == TRUE) {
$groessere_kd_nr=mysqli_query($link," select kd_nr from $temp_tab_name  ");
while( $groessere_kd_nr_result=mysqli_fetch_array($groessere_kd_nr, MYSQLI_BOTH ) ) {
$kriterium_1="kd_nr > '$groessere_kd_nr_result[kd_nr]' limit 1";
}
} */


$such_adressen=mysqli_query($link,"select * from adressen where $kriterium_1 " );
while($adressen_result=@mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {
$kunden_id=$adressen_result['kd_id'];
$email=$adressen_result['email'];
$kundennummer=$adressen_result['kd_nr'];
$firma_db=html_entity_decode($adressen_result['firma']);
$name_db=html_entity_decode($adressen_result['name']);
$vorname_db=html_entity_decode($adressen_result['vorname']);
$strasse_db=html_entity_decode($adressen_result['strasse']);
$ort_db=html_entity_decode($adressen_result['ort']);

echo "<input type=\"hidden\" name=\"kunden_nummer\" value=\"$kundennummer\">";

$selected_1="";
$selected_2="";
$selected_3="";

if ($adressen_result['adressenfehler'] == "true") {$selected_1 = "selected"; $bgcolor="background-color:#00cc00";}
if ($adressen_result['adressenfehler'] == "email_false") {$selected_2 = "selected"; $bgcolor="background-color:red";}
if ($adressen_result['adressenfehler'] == "telefon_false") {$selected_3 = "selected"; $bgcolor="background-color:red";}

$style="style=\" color: #000000; font-size: 16px; font-weight: 700;\"";


// Geburtstag abrufen
$select_geburtstag = mysqli_query($link,"select geburtstag, geburtsmonat from geburtstage where email = '$email' ");
while ( $result_geburtstag = mysqli_fetch_array( $select_geburtstag , MYSQLI_BOTH ) ) {
$geburtstag=$result_geburtstag['geburtstag'];
$geburtsmonat=$result_geburtstag['geburtsmonat'];
}


echo "
<table width=\"800px\" border=\"0\" cellspacing=\"0px\">             
<tr><td align=\"left\"> <t2><br>

                    <font style=\" background-color: yellow;\">&nbsp;&nbsp;Die erste Adresse ist zu selectieren, auch wenn sie schon angezeigt wird !!!&nbsp;&nbsp;<br>
                    &nbsp;&nbsp;Das Bl&auml;ttern funktioniert dann sofort seitengenau !!!&nbsp;&nbsp;</font>
                    <br><br>
<table>
                    <tr><td align=\"right\">Kunden-ID $kunden_id&nbsp;&nbsp;<input $style type=\"text\" name=\"kd_nr_1\" size=\"10\" value=\"$adressen_result[kd_nr]\" tabindex=\"16\"></td><td>&nbsp;&nbsp;</td><td>Kunden_Nummer<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"hidden\" name=\"kd_nr_2\"value=\"$adressen_result[kd_nr]\">
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"kontakt_1\" size=\"40\" value=\"$adressen_result[kontakt_art]\" tabindex=\"17\"></td><td>&nbsp;&nbsp;</td><td>Kontakt hergestellt<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"markierung_1_1\" size=\"40\" value=\"$adressen_result[markierung_1]\" tabindex=\"17\"></td><td>&nbsp;&nbsp;</td><td>Markierung 1<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"markierung_2_1\" size=\"40\" value=\"$adressen_result[markierung_2]\" tabindex=\"17\"></td><td>&nbsp;&nbsp;</td><td>Markierung 2<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"bonus_1\" size=\"40\" value=\"$adressen_result[bonus]\" tabindex=\"17\"></td><td>&nbsp;&nbsp;</td><td>Bonus<br></td></tr>

                    <tr><td align=\"right\"><input $style type=\"text\" name=\"firma_1\" size=\"40\" value=\"$firma_db\" tabindex=\"18\"></td><td>&nbsp;&nbsp;</td><td>Firma<br></td></tr>

                    <tr><td align=\"right\"><input $style type=\"text\" name=\"name_1\" size=\"40\" value=\"$name_db\" tabindex=\"18\"></td><td>&nbsp;&nbsp;</td><td>Name<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"vorname_1\" size=\"40\" value=\"$vorname_db\" tabindex=\"19\"></td><td>&nbsp;&nbsp;</td><td>Vorname<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"geschlecht_1\" size=\"10\" value=\"$adressen_result[geschlecht]\" tabindex=\"19\"></td><td>&nbsp;&nbsp;</td><td>Anrede<br></td></tr>
                    <tr><td align=\"right\">Tag:&nbsp;
                    <input $style type=\"text\" name=\"geburts_tag\" size=\"3\" value=\"$geburtstag\" tabindex=\"19\">
                    &nbsp;&nbsp;Monat:&nbsp;
                    <input $style type=\"text\" name=\"geburts_monat\" size=\"3\" value=\"$geburtsmonat\" tabindex=\"19\"></td><td>&nbsp;&nbsp;</td><td>Geburtstag<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"strasse_1\" size=\"40\" value=\"$strasse_db\" tabindex=\"20\"></td><td>&nbsp;&nbsp;</td><td>Stra&szlig;e<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"plz_1\" size=\"10\" value=\"$adressen_result[plz]\" tabindex=\"21\"></td><td>&nbsp;&nbsp;</td><td>Postleitzahl<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"ort_1\" size=\"40\" value=\"$ort_db\" tabindex=\"22\"></td><td>&nbsp;&nbsp;</td><td>Ort<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"land_1\" size=\"40\" value=\"$adressen_result[Land]\" tabindex=\"23\"></td><td>&nbsp;&nbsp;</td><td>Land<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"telefon_1\" size=\"40\" value=\"$adressen_result[telefon]\" tabindex=\"24\"></td><td>&nbsp;&nbsp;</td><td>Telefon<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"mobil_telefon_1\" size=\"40\" value=\"$adressen_result[mobil_telefon]\" tabindex=\"25\"></td><td>&nbsp;&nbsp;</td><td>Mobil<br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"email_1\" size=\"40\" value=\"$adressen_result[email]\" tabindex=\"26\"></td><td>&nbsp;&nbsp;</td><td>eMail</h2><br></td></tr>";
                    $email_for=strtolower(str_replace(" ","",trim($_POST['email_1']))); 
                     $email_for=strip_tags($email_for);
                     
                     
                     echo "
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"ausbildung_1\" size=\"40\" value=\"$adressen_result[ausbildung]\" tabindex=\"26\"></td><td>&nbsp;&nbsp;</td><td>Ausbildung</h2><br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"erhaltene_dienste_1\" size=\"40\" value=\"$adressen_result[erhaltene_dienste]\" tabindex=\"26\"></td><td>&nbsp;&nbsp;</td><td>erhaltene Dienste</h2><br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"newsletter_1\" size=\"40\" value=\"$adressen_result[newsletter]\" tabindex=\"26\"></td><td>&nbsp;&nbsp;</td><td>Newsletter</h2><br></td></tr>
                    <tr><td align=\"right\"><input $style type=\"text\" name=\"bemerkung_1\" size=\"40\" value=\"$adressen_result[bemerkung]\" tabindex=\"26\"></td><td>&nbsp;&nbsp;</td><td>Bemerkung</h2><br></td></tr>


</table>
                    Adressenfehler&nbsp;&nbsp;<select name=\"adressenfehler_1\" tabindex=\"26\"  style=\"$bgcolor;\">
                    <option $selected_1 value=\"true\"> Adresse korrekt</option>
                    <option $selected_2 value=\"email_false\"> eMail-Adresse falsch</option>
                    <option $selected_3 value=\"telefon_false\"> Telefon falsch</option>
                    </select>
                    </h2><br>
                    <br></t2>
                    
                    <input type=\"submit\" value=\"Datensatz updaten\" name=\"adresse_updaten\" tabindex=\"27\"
                    style=\" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;\">
  
                    <br><br>
                    <input type=\"submit\" value=\"Datensatz l&ouml;schen\" name=\"adresse_loeschen\" tabindex=\"27\"
                    style=\" width: 200px; height: 30px; font-color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                    
                    <select name=\"adresse_final_loeschen\" tabindex=\"28\"
                    style=\" width: 100px; height: 25px; font-color: #FFFFFF; font-size: 18px;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                    <option selected value=\"0\" style=\" font-color: #000000; font-size: 16px; background-color: #00cc00;\">Nein</option>
                    <option value=\"1\" style=\" font-color: #000000; font-size: 16px; background-color: red;\">Ja</option>
                    </select>
                    <br><br>
                    
                    <button type=\"submit\" value=\"1\" name=\"email_sperren\" tabindex=\"27\"
                    style=\" width: 300px; height: 30px; font-color: #FFFFFF; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                    E-mail sperren / Datensatz l&ouml;schen </button>
                    
                    </td></tr>
                    ";
}

if ( $_POST['email_sperren'] == TRUE ) {
mysqli_query($link,"insert into bad_email
(
bad_email
)
values
(
'$email_for'
)
");

mysqli_query($link," delete from adressen where email = '$email_for' ");

}



if ( $_POST['adresse_updaten'] == TRUE ) {



// $email_match='/[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
if ((!preg_match($email_match,$email_for))) {
echo "<tr><td colspan='2'><font color='red'>DIESE EMAIL-ADRESSE IST UNG&Uuml;LTIG !</td></tr>";
exit;
}

$kontaktart=htmlentities($_POST['kontakt_1']);
$markierung_1=htmlentities($_POST['markierung_1_1']);
$markierung_2=htmlentities($_POST['markierung_2_1']);

$firma_1=mysqli_real_escape_string($link, $_POST['firma_1']);
$name_1=mysqli_real_escape_string($link, $_POST['name_1']);
$vorname_1=mysqli_real_escape_string($link, $_POST['vorname_1']);

$email_code=md5($email_for);

$firma_1=htmlentities($firma_1);
$name_1=htmlentities($name_1);
$vorname_1=htmlentities($vorname_1);
$strasse=htmlentities($_POST['strasse_1']);
$ort=htmlentities($_POST['ort_1']);

$update=mysqli_query($link,"update adressen set
kontakt_art = '$kontaktart',
markierung_1 = '$markierung_1',
markierung_2 = '$markierung_2',
bonus = '$_POST[bonus_1]',
firma = '$firma_1',
name = '$name_1',
vorname = '$vorname_1',
geschlecht = '$_POST[geschlecht_1]',
strasse = '$strasse',
plz = '$_POST[plz_1]',
ort = '$ort',
Land = '$_POST[land_1]',
telefon = '$_POST[telefon_1]',
mobil_telefon = '$_POST[mobil_telefon_1]',
email = '$email_for',
email_reserve = '$email_for',
email_code = '$email_code',
ausbildung = '$_POST[ausbildung_1]',
erhaltene_dienste = '$_POST[erhaltene_dienste_1]',
newsletter = '$_POST[newsletter_1]',
bemerkung = '$_POST[bemerkung_1]',
adressenfehler = '$_POST[adressenfehler_1]',
datum =  '$datum',
new = '$_POST[newsletter_1]'
where kd_id = '$kunden_id' ");
echo $fehler_1=mysql_error();
echo $kunden_id;
$neuer_datensatz = "";

$geb_select=mysqli_query($link,"select count(email) as zaehler from geburtstage where email = '$_POST[email_1]' ");
while( $geb_result=mysqli_fetch_array($geb_select, MYSQLI_BOTH ) ) {
if ( $geb_result['zaehler'] < 1 ) { echo 
$geb_result['email']; $neuer_datensatz = TRUE; }
}

if ( $neuer_datensatz == TRUE ) {  mysqli_query($link,"insert into geburtstage 
(
geburtstag,
geburtsmonat,
email
)
values
(
'$_POST[geburts_tag]',
'$_POST[geburts_monat]',
'$_POST[email_1]'
)
");
echo mysql_error();
} // ende if

else { 
mysqli_query($link,"update geburtstage set
geburtstag = '$_POST[geburts_tag]',
geburtsmonat = '$_POST[geburts_monat]',
email = '$_POST[email_1]',
gratuliert = ''
where email = '$_POST[email_1]' ");
} // ende else
echo mysql_error();

$fehler_1=mysql_error();

if ($fehler_1 == 0) {echo "<tr><td align=\"center\">
<font color=\"#00cc00\" size=\"14px\">Datensatz $kunden_id wurde ge&auml;ndert&nbsp;!
</td></tr>";}

if ($fehler_1 == 1) {echo "<tr><td align=\"center\">
<font color=\"red\" size=\"14px\">Fehler bei der Bearbeitung Datensatz $kunden_id&nbsp;!
</td></tr>";}


}


if (($_POST['adresse_loeschen'] == TRUE) &&  ($_POST['adresse_final_loeschen'] == 1)){

 mysqli_query($link,"delete from adressen where kd_id = '$kunden_id' ");
$fehler=mysql_error();

mysqli_query($link,"delete from geburtstage where email = '$_POST[email_1]'");
$fehler=mysql_error();

mysqli_query($link,"delete from gruppen where kd_nr = '$_POST[kd_nr_1]'");
$fehler=mysql_error();

if ($fehler == 0) {echo "<tr><td align=\"center\">
<font color=\"#00cc00\" size=\"14px\">Datensatz  $kunden_id wurde gel&ouml;scht&nbsp;!
</td></tr>";
}

if ($fehler == 1) {echo "<tr><td align=\"center\">
<font color=\"red\" size=\"14px\">Fehler bei der Bearbeitung Datensatz  $kunden_id&nbsp;!
</td></tr>";}
} 



if ( $_POST['adressen_selectieren'] == TRUE ) {

mysqli_query($link,"drop TABLE IF EXISTS $temp_tab_name");

mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
kd_nr int(6)
)
");

$aelter_24_std=time();
$save_table_name=mysqli_query($link,"insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");   

mysqli_query($link,"insert into $temp_tab_name
(
kd_nr
)
values
(
'$_GET[kd_nr]'
)
");
}

if ( ( $_POST['zurueck'] == TRUE ) || ( ($_POST['vor'] == TRUE) == TRUE ) ) {
mysqli_query($link, "update $temp_tab_name set kd_nr = '$kundennummer' " );
}
 

?> 
 
 </form>