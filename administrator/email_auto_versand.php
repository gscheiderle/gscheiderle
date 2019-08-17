<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title> Zeitgesteuerter eMail-Versand</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <META HTTP-EQUIV="REFRESH"  CONTENT="60;URL=http://www.petra-$uwesack.de/administrator/email_auto_versand.php">
    
    <style type="text/css">
h1 { font-size:20px; font-face:arial sans;}
</style>
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<?php 
echo "<form action=\"email_auto_versand.php\" method=\"POST\">";

include("../intern/mysql_connect_gscheiderle.php");
include("../intern/css/schriften.css");

$aktuelle_zeit=time();


?>
  




<table width="100%" height="0px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
 <tr><td valign="top" height="10%" align="center">
<font size="5"> <b>
  </td>
  </tr>

<tr><td><h2><table width="100%" border="0">
<tr><td colspan="4"><h2><b>Folgende eMails stehen zum Versand an:</b></h2><br></td></tr>
<tr>
<td><h2>am</h2></td>
<td><h2>Thema</h2></td>
<td><h2>eMail-Betreff</h2></td>
<td><h2>eMail-Absender</h2></td>
</tr>

<tr><td colspan="4"><hr></td><tr>
<?php
$z1=1;

$pruefe_anzahl=mysqli_query($link,"select zufall_id, sende_termin_klar from emails_future where versandt < '1' order by sende_termin ");
while($result_pruefe_anzahl=mysqli_fetch_array($pruefe_anzahl, MYSQLI_BOTH )) {

$select_thema=mysqli_query($link,"select * from email_texte where zufall_id = '$result_pruefe_anzahl[zufall_id]'");
while($result_thema=mysqli_fetch_array($select_thema, MYSQLI_BOTH )){

if ($z1 % 2 == 0 ) {$bgcolor="bgcolor=\"#e9e9e9\"";}
else {$bgcolor="bgcolor=\"#FFFFFF\"";}

echo "<tr>
<td $bgcolor><h2>$result_pruefe_anzahl[sende_termin_klar]</h2></td>
<td $bgcolor><h2>$result_thema[thema]</h2></td>
<td $bgcolor><h2>$result_thema[betreff]</h2></td>
<td $bgcolor><h2>$result_thema[email_absender]</h2></td>
</tr>";
$z1++;
}
}


$zaehler_1=0;
$zaehler_2=0;
$zaehler_3=1;

$pruefe_anzahl_1=mysqli_query($link,"select zufall_id from emails_future where sende_termin <= '$aktuelle_zeit' and versandt < '1'");
while($result_pruefe_anzahl_1=mysqli_fetch_array($pruefe_anzahl_1, MYSQLI_BOTH )) {
$zufall_id_from_emails_future=$result_pruefe_anzahl_1['zufall_id'];


if ($zufall_id_from_emails_future != "") {
$select_thema_1=mysqli_query($link,"select * from email_texte where zufall_id = '$zufall_id_from_emails_future'");
while($result_thema_1=mysqli_fetch_array($select_thema_1, MYSQLI_BOTH )){

$kopfbild_db=$result_thema_1['kopfbild'];
$thema_db=html_entity_decode($result_thema_1['thema']);
$anrede_db=$result_thema_1['anrede'];
$betreff_db=html_entity_decode($result_thema_1['betreff']);
$text_db=$result_thema_1['text'];
$footer_db=$result_thema_1['footer'];
$stichwort_db=$result_thema_1['stichwort'];
$email_absender_db=$result_thema_1['email_absender'];



$such_adressen=mysqli_query($link,"select kd_nr from geplante_emails where zufall_id = '$zufall_id_from_emails_future' and versandt = '2'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) { // while 1

if($adressen_result['kd_nr'] != "") {

$select_empfaenger=mysqli_query($link,"select kd_nr, geschlecht, name, vorname, email from adressen where kd_nr = '$adressen_result[kd_nr]'");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){ // while 2
$kd_nr_db = $result_empfaenger['kd_nr'];
$empfaenger_db = $result_empfaenger['email'];
$geschlecht_db = $result_empfaenger['geschlecht'];
$name_db = $result_empfaenger['name'];
$vorname_db = $result_empfaenger['vorname'];


if ($anrede_db == "privat"){
$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Liebe ".$vorname_db."</font>";
if($geschlecht_db != "w") {$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Lieber ".$vorname_db."</font>";}
}

if ($anrede_db == "ganz_privat"){
$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Meine liebe ".$vorname_db."</font>";
if($geschlecht_db != "w") {$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Mein lieber ".$vorname_db."</font>";}
}

if ($anrede_db == "offiziell"){
$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Sehr geehrte Frau ".$name_db."</font>";
if($geschlecht_db != "w") {$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Sehr geehrter Herr ".$name_db."</font>";}
}

if ($anrede_db == "keine_anrede"){
$anrede_ff="";
}

/* echo "<input type='text' name='anrede_ff' value='$anrede_ff'>"; */
$zaehler_1++;

$betreff=$betreff_db;
$empfaenger="$empfaenger_db";
$inhalt="

<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//DE\">
<html>
  <head>
    <title>eMail-Versand</title>
    <meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\">
    	
	
  </head>
  <body link=\"#000000\" vlink=\"#000000\" alink=\"#000000\" bgcolor=\"#e5e5e5\">
  
<div align=\"center\">  
<table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px;  height:142px\">
    <tbody>
        <tr>
            <td width=\"20%\" style=\"text-align:center; background-color: #008D36;\">
            <img src=\"http://www.petra-$uwesack.de/images_system/petra_$uwesack.jpg\">
            </td>
            <td width=\"80%\" style=\"text-align:center; background-color: #008D36;\">
            <h1><span style=\"color:#FFFFFF\">$uwesack&nbsp;&nbsp;-&nbsp;&nbsp; Erkenne Deine Potenziale, f&uuml;hle in Dein $uwesack<br>
            und genie&szlig;e Deine Erfolge.</span></h1>
            </td>
        </tr>
 </table>
        
        
 <table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px;  height:20px\">
    <tbody>
        <tr>
            <td style=\"width:3%; background-color:#008D36\">&nbsp;</td>
            <td style=\"width:17%;background-color:#FFFFFF\">&nbsp;</td>
            <td style=\"width:60%; text-align:left;\">
            <span style=\"color:#008D36\"><strong><em><span style=\"font-family:georgia,serif\">
      <span style=\"font-size:24px\">
      $anrede_ff
      </span></span></em></strong></span>
            </td>
            <td style=\"width:17%;background-color:#FFFFFF\">&nbsp;</td>
            <td style=\"width:3%; background-color:#008D36\">&nbsp;</td>
        </tr>
    </tbody>
 </table>
   
$text_db

<table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px\">
    <tbody>
    <tr>
<td style=\"background-color:#008D36; width:3%\">&nbsp;</td>
<td style=\"background-color:#FFFFFF; width:17%\">&nbsp;</td>
<td style=\"background-color:#FFFFFF; width:60%\">
Die Anmeldung zu einer pers&ouml;nlichen Beratung von Frau $uwesack wurde neu organisiert und erm&ouml;glicht Ihnen eine freie Terminauswahl.<br>
<a href=\"https://$uwesack.youcanbook.me\"><b>Pers&ouml;nliche Beratung</b></a><br><br>

&Uuml;bungen und Lehren ersetzen keine Behandlung beim Arzt oder Therapeuten und sind auch keine Empfehlungen f&uuml;r Ab&auml;nderungen von bestehenden Behandlungsplänen oder Medikationen..<br>
</td>

<td style=\"background-color:#FFFFFF; width:17%\">&nbsp;</td>
<td style=\"background-color:#008D36; width:3%\">&nbsp;</td>
</tr>

<tr>
<td style=\"background-color:#008D36; width:3%\">&nbsp;</td>
<td width=\"17%\" bgcolor=\"#FFFFFF\">&nbsp;</td>
<td style=\"background-color:#FFFFFF; width:60%\">

<p><strong>Ich empfehle Dir auch meine Webseite:</strong>&nbsp;<a href=\"http://www.petra-$uwesack.de/\">www.petra-$uwesack.de</a>&nbsp;,&nbsp;<strong>hier stehen alle meine Termine</strong></p>


<a href=\"http://www.petra-$uwesack.de/un_sub_scribe.php?email=$empfaenger_db&kd_nr=$kd_nr_db\">Newsletter abbestellen</a><br>
Wenn der Link bei Ihnen nicht funktioniert, kopieren Sie bitte folgende Zeile<br>
in das Adressfenster Ihres Browsers:<br>
http://www.petra-$uwesack.de/un_sub_scribe.php?email=$empfaenger_db&kd_nr=$kd_nr_db
</td>
<td width=\"17%\" bgcolor=\"#FFFFFF\">&nbsp;</td>
<td style=\"background-color:#008D36; width:3%\">&nbsp;</td>
</tr>
</table>
";

$header.= "MIME-Version: 1.0" . "\n";
$header.= "Content-type: text/html; charset=iso-8859-1" . "\n";
$header.="From: $email_absender_db" . "\n";
$header.="Reply-To: $email_absender_db" . "\n";

$mail_versand=mail($empfaenger, $betreff, $inhalt, $header); 


// Zeilenumbruch
$br="";
if ( $zaehler_3 % 30 == 0 ) { $br = "<br>"; }

echo "<font style=\" background-color: yellow \">&nbsp;".$zaehler_3."&nbsp;".$br."</font>";
echo " ";

$empfaenger="";
$betreff="";
$inhalt="";
$header="";
$vorname_db="";
$name_db="";
$geschlecht_db="";

}

mysqli_query($link,"update geplante_emails set versandt = '1' where kd_nr = '$kd_nr_db' and zufall_id = '$zufall_id_from_emails_future' " );
if($mail_versand == TRUE) {
$zaehler_2++;
$zaehler_3++;
}
}
}


echo "<tr><td colspan=\"4\">";
if ($zaehler_2 == 0){
echo "<hr>Es wurde <b>keine</b> eMail versandt.<hr>";}
if ($zaehler_2 > 1){
echo "<hr>Es wurden <b>".$zaehler_2." von ".$zaehler_1."</b>  eMails versandt.<hr>";}
if ($zaehler_2 == 1){
echo "<hr>Es wurde <b>".$zaehler_2." von ".$zaehler_1."</b> eMail versandt.<hr>";}

mysqli_query($link,"update emails_future set versandt = '1' where zufall_id = '$zufall_id_from_emails_future'");
} // if kd_nr empty

} // ende if zufall_id empty

} // ende pr&uuml;fe Anzahl_1


echo "</table>";
echo "</td></tr>";  

?>

   </t1>
  </td>
  
  </tr>
<tr><td align="center"><a href="emailautoversand.php" target="_self"><font size="4" color="red"><b>Autom. eMail-Versand stoppen/korrigieren</b></font></a></td></tr>    
  </table>


 </form>

  </body>
</html>
