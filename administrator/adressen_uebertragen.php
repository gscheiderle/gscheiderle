<?php 
session_start();
$zeit=time(H,i,s);
// include("intern/funktionen.php");

 



 // Ab PHP 5.3.0
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Adressen &uuml;betragen</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action=\"adressen_uebertragen.php\" method=\"POST\">"; 

include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");

function datum_format($datum_orig)
{
$datum=substr($datum_orig,8,2).".";
$datum.=substr($datum_orig,5,2).".";
$datum.=substr($datum_orig,0,4);
return $datum;
}


$datum=date("Y.m.d");
$datum_f=date("d.m.Y");


// Sonderzeichen aus der sessionid entfernen   
$inhalt=array("§", "$", "%", "/", "(", ")", "=", "?", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$ersetzen=array("a", "v", "z", "q", "w", "v", "D", "Q", "M", "l", "y", "t", "T", "x", "X", "k", "K", "T");
$tabellen_name=str_replace($inhalt,$ersetzen,session_id()); 


$temp_tab_name=$tabellen_name."_a"; 
$temp_tab_name=substr($temp_tab_name,-14);

$temp_tab_name_2=$tabellen_name."_b"; 
$temp_tab_name_2=substr($temp_tab_name_2,-14);

$temp_tab_name_22=$tabellen_name."_c"; 
$temp_tab_name_22=substr($temp_tab_name_22,-14);



$angabe=TRUE; // f&uuml;r die Fehlerauswertung
$mindestinhalt=TRUE; // f&uuml;r die Fehlerauswertung
$tag=date("d")-6;
$jetztzeit=date("Y-m-$tag");


$termin_auswahl=mysqli_query($link,  "select distinct kontakt_art from zwischentabelle " );
while ( $result_auswahl=mysqli_fetch_array($termin_auswahl, MYSQLI_BOTH ) ) {


if ( $result_auswahl["kontakt_art"] == $_POST['event_name'] ) { $selected="selected"; }  else { $selected=""; } 
$termine_db.="<option value=\"$result_auswahl[kontakt_art]\" $selected>$result_auswahl[kontakt_art]</option>";
$datum_von="";
$selected="";
}




?>  
  
 

<div align="center">
<table border="0" width="100%" bgcolor="" cellspacing="10px">

    <tr>
      <td bgcolor="#dadada" width="" height="19" align="center" valign="middle">
        <br>
        <font face="Courier" size="6" color="#000000"><b>Adressen auf Datenbank &uuml;bertragen</b></font><br><br>
       </td>
    </tr>
 </table>
  
  <div align="center">
<table border="0" width="100%" height="" cellspacing="4px" cellpadding="5px" bgcolor="">
    <tr>
      <td bgcolor="" width="200px" height="25px" align="left" valign="middle"><b>
      <font face="Courier" color="#000000">Event w&auml;hlen:</font>&nbsp;

      <select name="event_name" tabindex="5">
   <?php echo $termine_db; ?>
      </select>
      
      </td>
    </tr>
</table>

<table width="100%" height="" cellspacing="4px" cellpadding="0px">

<?php 

$bgcolor = "bgcolor=\"#00cc00\"";

echo "
<tr>
<td $bgcolor>ANZAHL</td>
<td $bgcolor>KD_NR</td>
  <td $bgcolor>KONTAKT</td>
  <td $bgcolor>NAME</td>
  <td $bgcolor>VORNAME</td>
  <td $bgcolor>AUSBILDUNG</td>
  <td $bgcolor>W / M</td>
  <td $bgcolor>STRASSE</td>
  <td $bgcolor>PLZ</td>
  <td $bgcolor>ORT</td>
  <td $bgcolor>LAND</td>
  <td $bgcolor align=\"left\">TELEFON</td>
  <td $bgcolor align=\"left\">MOBIL</td>
  <td $bgcolor>E-MAIL</td>
  <td $bgcolor>NEWSLETTER</td>
</tr>
" ;



if ( ( $_POST['teilnehmer_listen'] == TRUE ) || ($_POST['uebertragen'] == TRUE ) ) {

$zaehler=1;
$select_teilnehmer=mysqli_query($link,"select * from zwischentabelle where kontakt_art like '$_POST[event_name]%' and uebertragen = '' order by kd_nr");
while( $result_teilnehmer = mysqli_fetch_array( $select_teilnehmer, MYSQLI_BOTH ) ) {
$bgcolor = "bgcolor=\"#FFFFFFF\""; 
$uebertragen=$result_teilnehmer['uebertragen'];
echo "
<tr>
<td bgcolor='#dadada' align='right'>$zaehler&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td $bgcolor><input type='text' size='3' name='kd_nr' value='$result_teilnehmer[kd_nr]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='kontakt_art' value='$result_teilnehmer[kontakt_art]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='name' value='$result_teilnehmer[name]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='vorname' value='$result_teilnehmer[vorname]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='ausbildung' value='$result_teilnehmer[ausbildung]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='geschlecht' size='2' value='$result_teilnehmer[geschlecht]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='strasse' value='$result_teilnehmer[strasse]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='plz' size='5' value='$result_teilnehmer[plz]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='ort' value='$result_teilnehmer[ort]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='land' size='2' value='$result_teilnehmer[land]' style='border:0;'></td>
  <td $bgcolor align=\"left\"><input type='text' name='telefon' value='$result_teilnehmer[telefon]' style='border:0;'></td>
  <td $bgcolor align=\"left\"><input type='text' name='mobil_telefon' value='$result_teilnehmer[mobil_telefon]' style='border:0;'></td>
  <td $bgcolor><input type='text' name='email' value='$result_teilnehmer[email]' style='border:0;'></td>
  <td $bgcolor><input type='text' size='2' name='newsletter' value='$result_teilnehmer[newsletter]' style='border:0;'></td>
</tr>
" ;

$zaehler++;
}
if ( $zaehler <= 1 ) {
echo "
<tr>
<td colspan='14' bgcolor='red' align='center'><font color='#FFFFFF' size='4'><b>Diese Gruppe wurde bereits &uuml;bertragen !</b></font></td>
</tr>";
}
}
echo
"
<tr>
  <td colspan=\"14\" align=\"center\"><br><br>
  <input type=\"submit\" name=\"teilnehmer_listen\" value=\"Teilnehmer listen\" style=\" width: 350px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: green;  border: 0px; border-radius: 5px 5px 5px 5px;\">
&nbsp;&nbsp;&nbsp;&nbsp;
  <input type=\"submit\" name=\"uebertragen\" value=\"In Datenbank &uuml;bertragen\" style=\" width: 350px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
  </td>
</tr>

</table>";

if ( $_POST['uebertragen'] == TRUE ) {

$zaehler_1=0;
$zaehler_2=0;
$zaehler_3=0;
$zaehler_4=0;

mysqli_query($link,"drop TABLE IF EXISTS $temp_tab_name");

mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(6) not NULL auto_increment primary key,
kd_nr int(6)
)
");

$emailselect_2=mysqli_query($link,"SELECT kd_nr from zwischentabelle where kontakt_art like '$_POST[event_name]' and uebertragen = '' ");
while ( $emailresult_2 = mysqli_fetch_array ( $emailselect_2, MYSQLI_BOTH ) ) {
mysqli_query($link,"insert into $temp_tab_name (kd_nr) values ('$emailresult_2[kd_nr]') ");
}

mysqli_query($link,"update zwischentabelle set uebertragen = '1' where kontakt_art like '$_POST[event_name]' ");

mysqli_query($link,"LOCK TABLES adressen write, adressen as adressen read");


$emailselect_1=mysqli_query($link,"SELECT $temp_tab_name.kd_nr
FROM $temp_tab_name 
LEFT JOIN adressen
ON ($temp_tab_name.kd_nr
= adressen.kd_nr)
WHERE
adressen.kd_nr IS not NULL ");

while($result_email_1=mysqli_fetch_array($emailselect_1, MYSQLI_BOTH )){

$zeitstempel=time();
$resultkdnr_1=$result_email_1['kd_nr'];

$zaehler_3++;
$teilnehmer_select_1=mysqli_query($link,"select kd_nr, kontakt_art, ausbildung from zwischentabelle where kd_nr = '$resultkdnr_1' and kontakt_art like '$_POST[event_name]'");
while ( $teilnehmer_result_1 = mysqli_fetch_array ( $teilnehmer_select_1, MYSQLI_BOTH ) ) {

$dhh="DHH ".date("Y");
if ( $teilnehmer_result_1['ausbildung'] == $dhh ) { $update_ausbildung=", ausbildung = '$teilnehmer_result_1[ausbildung]', zeitstempel = '$zeitstempel' "; }

mysqli_query($link,"update adressen set kontakt_art = '$teilnehmer_result_1[kontakt_art]' $update_ausbildung where kd_nr = '$resultkdnr_1' ");
$update_ausbildung="";
}
}


//////////////////////////////////////////////////////////////////////////////////////



$emailselect=mysqli_query($link,"SELECT $temp_tab_name.kd_nr
FROM $temp_tab_name 
LEFT JOIN adressen
ON ($temp_tab_name.kd_nr
= adressen.kd_nr)
WHERE
adressen.kd_nr IS NULL ");

while($result_email=mysqli_fetch_array($emailselect, MYSQLI_BOTH )){
echo $resultkdnr=$result_email['kd_nr'];
$resultemail=$result_email['email'];

$zaehler_2++;



$teilnehmer_select=mysqli_query($link,"select * from zwischentabelle where kd_nr = '$resultkdnr' and kontakt_art like '$_POST[event_name]' ");
while ( $teilnehmer_result = mysqli_fetch_array ( $teilnehmer_select, MYSQLI_BOTH ) ) {

if ($teilnehmer_result['email'] == "h1234@h1234.de" ) {
$teilnehmer_result['email'] = "";
}

$email_code=md5($teilnehmer_result['email']);
$time=time();
mysqli_query($link,"insert into adressen
(
kd_nr,
kontakt_art,
name,
vorname,
geschlecht,
strasse,
plz,
ort,
land,
telefon,
mobil_telefon,
email,
email_reserve,
email_code,
ausbildung,
newsletter,
zeitstempel
)
values
(
'$teilnehmer_result[kd_nr]',
'$teilnehmer_result[kontakt_art]',
'$teilnehmer_result[name]',
'$teilnehmer_result[vorname]',
'$teilnehmer_result[geschlecht]',
'$teilnehmer_result[strasse]',
'$teilnehmer_result[plz]',
'$teilnehmer_result[ort]',
'$teilnehmer_result[land]',
'$teilnehmer_result[telefon]',
'$teilnehmer_result[mobil_telefon]',
'$teilnehmer_result[email]',
'$teilnehmer_result[email]',
'$email_code',
'$teilnehmer_result[ausbildung]',
'$teilnehmer_result[newsletter]',
'$time'
)
"); 
$zaehler_4++;
}
}
mysqli_query($link,"UNLOCK TABLES");






}
?>

<div align="center">
<table border="0" width="100%" bgcolor="" cellspacing="10px">

    <tr>
      <td bgcolor="#dadada" width="" height="19" align="center" valign="middle">
<?php echo "&Uuml;bertragungen: bekannte Adressen= ".$zaehler_3." - neue Adressen: ".$zaehler_2." - insgesamt: ".$gesamt=$zaehler_2+$zaehler_3; 

mysqli_query($link,"drop TABLE IF EXISTS $temp_tab_name");

?>
       </td>
    </tr>
 </table>


  



  