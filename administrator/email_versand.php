<?php 
    session_start(); 
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>eMail-Versand</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    	<script src="../ckeditor/ckeditor.js"></script>
	    <script src="../ckeditor/samples/sample.js"></script>
	    <link href="../ckeditor/samples/sample.css" rel="stylesheet">
      <link href="../intern/css/schriften.css rel="stylesheet">
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<?php echo "<form action=\"email_versand.php?anzahlbestaetigung=$_POST[anzahlbestaetigung]\" method=\"POST\">";


include("../intern/parameter.php");  
// include("../intern/css/span.php");
include("../intern/mysql_connect_gscheiderle.php");


$verweildauer=time()-86400;

$tabellen_loeschen=mysqli_query($link,"select * from table_name where zeitstempel < '$verweildauer'");
while ($name=mysqli_fetch_array($tabellen_loeschen, MYSQLI_BOTH )){
mysqli_query($link,"drop table if exists $name[tablename]");
mysqli_query($link,"drop table if exists $name[tablename_2]");
mysqli_query($link,"drop table if exists $name[tablename_3]");
mysqli_query($link,"drop table if exists $name[tablename_4]");
}
mysqli_query($link,"delete from table_name where zeitstempel < '$verweildauer'"); 

 
$inhalt=array("§", "$", "%", "/", "(", ")", "=", "?", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$ersetzen=array("a", "v", "z", "q", "w", "v", "D", "Q", "M", "l", "y", "t", "T", "x", "X", "k", "K", "T");
$tabellen_name=str_replace($inhalt,$ersetzen,session_id()); 

$temp_tab_name=$tabellen_name."_a"; 
$temp_tab_name=substr($temp_tab_name,-12);


$datum=date("d.m.Y, h:i:s");

 
function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if(($db_ausdruck != "") && ($formular_ausdruck == "")){echo $db_ausdruck;}
  if(($db_ausdruck == "") && ($formular_ausdruck != "")){echo $formular_ausdruck;}
  if(($db_ausdruck != "") && ($formular_ausdruck != "")) {echo $formular_ausdruck_ausdruck;}
  
  }  
  
  
  function neuladen_ckeditor($db_ausdruck,$text_speicher,$formular_ausdruck)
  {
  if ( ( $db_ausdruck != "") && ( $text_speicher != "" ) ){echo $db_ausdruck;}
  if ( ( $db_ausdruck != "") && ( $text_speicher == "" ) ){echo $db_ausdruck;}
  if ( ( $text_speicher != "") && ( $db_ausdruck == "") ) {echo $text_speicher;}
 else {echo $fomular_ausdruck;}
  }
  
$zeit=time();  
  
$aktuelle_zeit=time(date("d.m.Y:h:i"));
?>
  
<table width="1000px" height="900px" cellpadding="10" cellspacing="0" border="0"
  style="bgcolor: #c0c0c0;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 0px 0px 0px 0px;
       padding: 5px;
       box-shadow: 12px 12px 12px #FFFFFF;">
       
<tr><td>

<table width="1020px" height="0px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 0px 0px 0px 0px;
       padding: 5px;
       box-shadow: 0px 0px 0px #FFFFFF;">

 <tr><td valign="top" height="10%"  align="center">
 
<table width="1100px">

<?php 



if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
} 

 

$suche_versand=mysqli_query($link,"select datum, stichwort, zufall_id from email_texte order by mail_id desc");
while($finde_versand=mysqli_fetch_array($suche_versand, MYSQLI_BOTH )) {
$versand_termine.="<option value=\"$finde_versand[zufall_id]\">$finde_versand[stichwort] versandt am $finde_versand[datum]</option>";
}
?>

 <tr>
<td>


 <select name="liste" tabindex="14"
 style=" width: 240px; height: 30px; font-color: #000000; font-size: 18px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
 <option selected>&auml;ltere eMails:</option>
 <?php echo $versand_termine; ?>
 </select>
</td>

<?php 
$select_email_text=mysqli_query($link,"select * from email_texte where zufall_id = '$_POST[liste]'");
while ($result_email_text=mysqli_fetch_array($select_email_text, MYSQLI_BOTH )) {
$kopfbild_db=$result_email_text['kopfbild'];
$thema_db=$result_email_text['thema'];
$anrede_db=$result_email_text['anrede'];
$text_db=$result_email_text['text'];
$betreff_db=$result_email_text['betreff'];
$stichwort_db=$result_email_text['stichwort'];
$email_absender_db=$result_email_text['email_absender'];
} ?>

<td>
<input type="submit" value="ohne Teilnehmer" name="listen" tabindex="15"
 style=" width: 220px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>

<td>
<input type="submit" value="Aufruf mit Teilnehmer" name="liste_zeigen" tabindex="15" 
 style=" width: 220px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
 
 <td>
<input type="submit" value="geplante eMails mit Teilnehmer" name="geplante_liste_zeigen" tabindex="15" 
 style=" width: 240px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>
</td>
</tr>

<tr><td colspan="4" align="center">

</td></tr>
</table>

<?php 

$option="kd_nr = '$_COOKIE[kd_nr]'";

echo $_POST['aeltere_email_version'];

if ( $_POST['aeltere_email_version'] == TRUE ) { $option="email_text_id = '$_POST[arbeits_stand]' "; }

$vorlaeufiger_text=mysqli_query($link,"select * from aktueller_email_text where $option order by email_text_id desc limit 1");
while ( $result_vor_text=mysqli_fetch_array($vorlaeufiger_text, MYSQLI_BOTH ) ) {
$email_text_id=$result_vor_text['email_text_id'];
$vorlaeufiger_email_text=$result_vor_text['email_text'];
$thema_db_2=$result_vor_text['thema'];
$stichwort_db_2=$result_vor_text['stichwort'];
$betreff_db_2=$result_vor_text['email_betreff'];
$kopfbild_db_2=$result_vor_text['header'];
$anrede_db=$result_vor_text['anrede'];
}

$liste_vorlaeufiger_text=mysqli_query($link,"select email_text_id, email_betreff from aktueller_email_text where kd_nr = '$_COOKIE[kd_nr]' order by email_text_id desc ");
while ( $result_akt_text=mysqli_fetch_array($liste_vorlaeufiger_text, MYSQLI_BOTH ) ) {
$selected="";
if ( $result_akt_text['email_text_id'] == $_POST['arbeits_stand'] ) { $selected="selected"; }
$vorlaeufiger_text_liste.="<option value=\"$result_akt_text[email_text_id]\" $selected>".$result_akt_text['email_text_id']."&nbsp;-&nbsp;".$result_akt_text['email_betreff']."</option>";
}


if ( ( $_POST['liste_zeigen'] == TRUE ) || ( $_POST['geplante_liste_zeigen'] == TRUE ) ){

mysqli_query($link,"drop table if exists $temp_tab_name");

mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
kd_nr int(6),
geschlecht varchar(64),
firma varchar(128),
name varchar(64),
vorname varchar(64),
plz varchar(64),
email varchar(64),
nachfassen varchar(255)
)
");

$aelter_24_std=time();
$save_table_name=mysqli_query($link,"insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");   

$zaehler=0;


$teilnehmer="versandte_emails";
if ( $_POST['geplante_liste_zeigen'] == TRUE ) { $teilnehmer="geplante_emails"; }


$such_adressen=mysqli_query($link,"select kd_nr from $teilnehmer where zufall_id = '$_POST[liste]'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) { // while 1

$adressen_result_kd_nr=$adressen_result['kd_nr'];

$select_empfaenger=mysqli_query($link,"select kd_nr, firma, name, vorname, geschlecht, plz, email from adressen where kd_nr = '$adressen_result_kd_nr' ");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){ // while 2

$nachgefasst=$adressen_result['stichwort']."-".$datum;

mysqli_query($link,"insert into $temp_tab_name
(
kd_nr,
geschlecht,
firma,
name,
vorname,
plz,
email
)
values
(
'$result_empfaenger[kd_nr]',
'$result_empfaenger[geschlecht]',
'$result_empfaenger[firma]',
'$result_empfaenger[name]',
'$result_empfaenger[vorname]',
'$result_empfaenger[plz]',
'$result_empfaenger[email]'
)
");
} // ende while 2
} // ende while 1
} // ende if



if ( ( $_POST['liste_zeigen'] == TRUE ) || ( $_POST['geplante_liste_zeigen'] == TRUE ) ) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\">";


$zaehler=1;

$such_adressen=mysqli_query($link,"select kd_nr from $teilnehmer where zufall_id = '$_POST[liste]'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {

$select_empfaenger=mysqli_query($link,"select kd_nr, firma, name, vorname, plz, geschlecht, email from adressen where kd_nr = '$adressen_result[kd_nr]'");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){
/* echo "
<tr>
<td>$result_empfaenger[plz]&nbsp;&nbsp;</td>
<td>$result_empfaenger[kd_nr]</td>
<td>$result_empfaenger[firma]</td>
<td>$result_empfaenger[name]&nbsp;&nbsp;</td>
<td>$result_empfaenger[vorname]&nbsp;&nbsp;</td>
<td>$result_empfaenger[email]</td>
</tr>";*/
 

$zaehler++;
}
}
}
if ($zaehler == 1){
echo "Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler > 2){$zaehler_1=$zaehler-1;
echo "Es wurden <b>".$zaehler_1."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler == 2){$zaehler_2=$zaehler-1;
echo "Es wurde <b>".$zaehler_2."</b> Datensatz gefunden.<hr>";}
 ?>
 
</table>

</td></tr>       
    
<tr><td valign="top" height="10%">
<table><tr><td>
Thema:<br>
<textarea rows="1" name="thema" cols="35" 
tabindex="10"><?php echo htmlspecialchars(neuladen_ckeditor($thema_db, $thema_db_2, $_POST['thema'])); ?></textarea>
</td>

<td>
Stichwort:<br>
<textarea rows="1" name="stichwort" cols="35" 
tabindex="10"><?php echo htmlspecialchars(neuladen_ckeditor($stichwort_db,$stichwort_db_2, $_POST['stichwort'])); ?></textarea>
</td>

<td>
eMail-Absender: <br>
<?php 

echo "<select name=\"email_absender\" tabindex=\"10\">";
echo "
<option value=\"info@gscheiderle.de\" selected>info@gscheiderle.de</option>
</select>";

 ?>

</td>
</tr>

<tr>
<td>
eMail-Betreff:<br>
<input type="text" size="30" rows="1" name="email_betreff" tabindex="10" value="
<?php echo htmlspecialchars(neuladen_ckeditor($betreff_db, $betreff_db_2, $_POST['email_betreff'])); ?>">
</td>

<td>
Pfad zum Kopf-Bild (nur Datei-Name):<br>
<input type="text" size="30" rows="1" name="kopfbild" tabindex="11" value="
<?php echo htmlspecialchars(neuladen_ckeditor($kopfbild_db, $kopfbild_db_2, $_POST['kopfbild'])); ?>">
</td>

<?php 

function neuladen_2($db_ausdruck,$formular_ausdruck)
  {
  if ($formular_ausdruck != "")  {echo $formular_ausdruck;}
  else {echo $db_ausdruck;}
  }


$email_des_testers=$_COOKIE['session_email']; ?>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style=" color:#FFFFFF; background-color:blue;">&nbsp;eMail-Empf&auml;nger f&uuml;r Test-Versand:&nbsp;</font><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30" rows="1" name="email_probe_adresse" tabindex="11" value="
<?php 
echo htmlspecialchars(neuladen_2($email_des_testers,$_POST['email_probe_adresse'])); ?>">
</td>
</tr>
</table>

</td></tr>
<?php 


if( ($anrede_db == "privat") || ($_POST['briefanrede'] == "privat") ) { $checked_privat="checked"; $checked_offiziell=""; $checked_keine=""; $checked_ganz_privat="";} 
if( ($anrede_db == "ganz_privat") || ($_POST['briefanrede'] == "ganz_privat") ) { $checked_ganz_privat="checked"; $checked_offiziell=""; $checked_keine=""; $checked_privat=""; } 
if( ($anrede_db == "offiziell") || ($_POST['briefanrede'] == "offiziell") ) { $checked_offiziell="checked"; $checked_keine=""; $checked_privat=""; $checked_ganz_privat="";}
if( ($anrede_db == "keine_anrede") || ($_POST['briefanrede'] == "keine_anrede") ) { $checked_keine="checked"; $checked_privat=""; $checked_offiziell=""; $checked_ganz_privat=""; }

echo " 
<tr><td valign=\"top\" height=\"10%\">
<table><tr><td valign=\"top\">
M&ouml;gliche automatisierte Anreden:&nbsp;&nbsp;</td>
<td valign=\"top\">
<input type=\"radio\" name=\"briefanrede\" value=\"privat\" $checked_privat>&nbsp;Freundschaftlich:&nbsp;Liebe(r) Vorname\"<br>
<input type=\"radio\" name=\"briefanrede\" value=\"ganz_privat\" $checked_ganz_privat>&nbsp;Sehr pers&ouml;nlich:&nbsp;Mein(e) liebe(r) Vorname\"<br>";
echo "
<input type=\"radio\" name=\"briefanrede\" value=\"offiziell\" $checked_offiziell>&nbsp;Gesch&auml;ftlich&nbsp;(evtl. mit Firma):&nbsp;Sehr geehrte(r) Frau(Herr) Nachname\"<br>";
echo "
<input type=\"radio\" name=\"briefanrede\" value=\"keine_anrede\" $checked_keine>&nbsp;Keine Anrede ! 
</td></tr></table>
";

?>
<table border="0" width="1200px" cellpadding=10px">
<tr>
<td valign="top" align="left" width="50%">
<font style=" color:#D3D800;background-color:#B81A5D; font-size:18px;"><b>&nbsp;
Jeder Bearbeitungs-Stand wird gespeichert - entweder durch <br>
&nbsp;"aktuellen E-Mail-Text speichern" oder auch<br>
durch einen "Test-Versand".</font>
<br><font style=" background-color:yellow; size:24px;"><b>&nbsp;Seite &ouml;ffnet mit der zuletzt gespeicherten Version&nbsp;</font></b>
</td> 

<td valign="top" bgcolor="#D3D800" align="center" width="50%">
<font style=" color:#D3D800;background-color:#B81A5D; font-size:22px;"><b>&nbsp;&nbsp;&Auml;ltere Versionen des aktuellen E-Mail-Textes:&nbsp;&nbsp;<br>
<select  name="arbeits_stand">
<option value="<?php $selected; ?>">aktuelle gespeicherte E-Mail-Versionen</option>
<?php echo $vorlaeufiger_text_liste; ?>
</select>
<br>
<button type="submit" name="aeltere_email_version" value="wechsel">Gew&auml;hlte Version laden</button>
<?php if ( $_POST['aeltere_email_version'] == "wechsel" ) {
echo "<button type=\"submit\" name=\"bestaetigung\" value=\"bestaetigen\">BEST&Auml;TIGEN !</button>";

/* echo "<iframe width=\"0\" height=\"0\" src=\"audio/bestaetigen.mp3\" frameborder=\"0\"></iframe>"; */
}
?>
</td>
</tr>
</table>


<?php if ( ( $_POST['aeltere_email_version'] == "wechsel" ) || ( $_POST['bestaetigung'] == "bestaetigen" ) ) {


$vorlaeufigertext=mysqli_query($link,"select * from aktueller_email_text where email_text_id = '$_POST[arbeits_stand]' ");
while ( $result_vortext=mysqli_fetch_array($vorlaeufigertext, MYSQLI_BOTH ) ) {
$vorlaeufigeremail_text=$result_vortext['email_text'];
}
$vorlaeufiger_email_text=$vorlaeufigeremail_text;
}


?>


<textarea rows="35" id="beitrag" name="beitrag" cols="70" 
tabindex="10"><?php echo htmlspecialchars(neuladen_ckeditor($text_db,$vorlaeufiger_email_text,$_POST['beitrag']));  ?></textarea>

            <script>
                // Replace the <textarea id="beitrag"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'beitrag' );
            </script>
<br>

<input type="submit" name="email_text_speichern" value="aktuellen E-Mail-Text speichern" style=" width: 280px; height: 30px; font-color: #000000; font-size: 18px; background-color: yellow;  border-width: 2px; border-color: red; border-radius: 5px 5px 5px 5px;">
&nbsp;<font style=" background-color:red; size:24px; color: #FFFFFF;">
<b>&nbsp;danach immer:&nbsp;</font></b>&nbsp;
<input type="submit" name="" value="e-Mail-Text aktualisieren" style=" width: 280px; height: 30px; font-color: #000000; font-size: 18px; background-color: yellow;  border-width: 2px; border-color: red;  border-radius: 5px 5px 5px 5px;"><br><br>
<?php 

$post_beitrag = mysqli_real_escape_string($link, $_POST['beitrag']);

if ( ( $_POST['email_text_speichern'] == TRUE ) || ( $_POST['test_versand'] == TRUE ) ) {

/* echo "<iframe width=\"0\" height=\"0\" src=\"audio/neueste_datei_ist.mp3\" frameborder=\"0\"></iframe>"; */

$select_text_id=mysqli_query($link," select max(email_text_id) as emailtextid from aktueller_email_text where kd_nr = '$_COOKIE[kd_nr]' ");
while ( $result_text_id = mysqli_fetch_array($select_text_id, MYSQLI_BOTH ) ) {
$email_text_id_db=$result_text_id['emailtextid'];
}

$betreff_1=htmlentities($_POST['email_betreff']);
$thema_1=htmlentities($_POST['thema']);
$stichwort_1=htmlentities($_POST['stichwort']);


mysqli_query($link,"insert into aktueller_email_text
(
email_text,
kd_nr,
thema,
stichwort,
email_betreff,
header,
anrede
)
values
(
'$post_beitrag',
'$_COOKIE[kd_nr]',
'$thema_1',
'$stichwort_1',
'$betreff_1',
'$_POST[kopfbild]',
'$_POST[briefanrede]'
)
");


}
?>
</td></tr>

               
                <tr>
                 <td width="482" height="20px" valign="middle" align="center">
                                  
                                  
                  <input type="submit" value="Test-Versand" name="test_versand" tabindex="11"
                  style=" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: blue;  border: 0px; border-radius: 5px 5px 5px 5px;">
                  
                
                          &nbsp;&nbsp;&nbsp;                 
                                  
                  
                 <input type="submit" value="Liste zeigen" name="selectierte_adressen_zeigen" tabindex="11"
                  style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
                
                          &nbsp;&nbsp;&nbsp;
                
                  
                 <input type="submit" value="eMail senden ?" name="emailsenden" tabindex="11"
                  style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;">
                  <br><br>
                  
                  <?php if ( $_POST['emailsenden'] == TRUE ) { 
                            $counter=mysqli_query($link,"select count(kd_nr) as counter from $temp_tab_name");
                            while ( $result_counter = @mysqli_fetch_array($counter, MYSQLI_BOTH )) {
                            $zaehler = $result_counter['counter'];
                            }
                            if ($zaehler == 0) {$zaehler = "keine";}
                            
                            
                            echo "<strong>Es stehen $zaehler eMail zum Versand:&nbsp;&nbsp;</strong>
                            <input type=\"submit\" value=\"eMail senden !\" name=\"email_senden\" tabindex=\"11\"
                            style=\" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                            ";
                            }
                           ?>
                  
                  
                  
                 <?php 
                 $gruppen_select="";
                 
                       $gruppen_suche=mysqli_query($link,"select * from gruppe_definition order by gr_def_id desc");
                       while( $gruppen_result=mysqli_fetch_array($gruppen_suche, MYSQLI_BOTH ) ) {
                       
                       if ( $_POST['gruppen_auswahl'] == $gruppen_result['gr_def_id'] ) { $gruppen_select = "selected"; }
                       
                       $gruppen.="<option value=\"$gruppen_result[gr_def_id]\" $gruppen_select >" . html_entity_decode($gruppen_result['gruppe_name']) . "</option>";
                       $gruppen_select="";
                       }
                 ?>
                 <hr>
                 Gruppe ausw&auml;hlen:&nbsp;&nbsp;<select name="gruppen_auswahl">
                 <option value="" >Gruppe ausw&auml;hlen</option>
                 <?php echo $gruppen; ?>
                 </select>
                 
                 &nbsp;&nbsp;und zum&nbsp;&nbsp;
                 
                 <input type="submit" value="Versand vorsehen" name="gruppe_senden" tabindex="11"
                  style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">

                  
                  <hr>
                  
                  <br>
                  <div align="center">
                  <table width="" cellspacing="1px" cellpadding="6px">
                  <tr>
                  
                  <?php 
                  
                 
                                   
$monat_1 = date("m"); 
$tag_1 = date("d");

$jahr = date("Y"); 
$jahr_plus_1=date("Y")+1;
$jahr_plus_2=date("Y")+2;


for($m=1; $m <= 12; $m++) {
$m_selected="m_selected_".$m;
if(date(m) == $m) {$$m_selected="selected";}
}

for($d=1; $d <= 31; $d++) {
$d_selected="d_selected_".$d;
if(date(d) == $d) {$$d_selected="selected";}
}

for($h=6; $h <= 24; $h++) {
$h_selected="h_selected_".$h;
if(date(H) == $h) {$$h_selected="selected";}
}

 ?>                 
            <td colspan="2" align="left"  bgcolor="#b1b1b1">Versenden am: </td>
            <td  bgcolor="#b1b1b1">Tag:</td><td  bgcolor="#b1b1b1">Stunde:</td><td  bgcolor="#b1b1b1">Minute:</td><td  bgcolor="#b1b1b1"></td></tr>
            <td  bgcolor="#b1b1b1">
            
                                <?php 
                                if ( $_POST['jahr'] == date("Y") ) { $y_selected= "selected"; }
                                if ( $_POST['jahr'] == date("Y")+1 ) { $y_selected_plus_1= "selected"; }
                                if ( $_POST['jahr'] == date("Y")+2 ) { $y_selected_plus_2= "selected"; }
                                
                                 ?>
            
            
                                <select name="jahr">
                                  <option value="<?php echo $jahr; ?>"<?php echo $y_selected; ?>><?php echo $jahr; ?></option>
                                  <option value="<?php echo $jahr_plus_1; ?>"<?php echo $y_selected_plus_1; ?>><?php echo $jahr_plus_1; ?></option> 
                                  <option value="<?php echo $jahr_plus_2; ?>"<?php echo $y_selected_plus_2; ?>><?php echo $jahr_plus_2; ?></option> 
                                  
                                </select>
                  
                  </td><td  bgcolor="#b1b1b1">
                 
                              <select name="monat"> 
                                <option value="01" <?php echo $m_selected_1; ?>>Januar</option> 
                                <option value="02" <?php echo $m_selected_2; ?>>Februar</option> 
                                <option value="03" <?php echo $m_selected_3; ?>>M&auml;rz</option>
                                <option value="04" <?php echo $m_selected_4; ?>>April</option> 
                                <option value="05" <?php echo $m_selected_5; ?>>Mai</option> 
                                <option value="06" <?php echo $m_selected_6; ?>>Juni</option>
                                <option value="07" <?php echo $m_selected_7; ?>>Juli</option> 
                                <option value="08" <?php echo $m_selected_8; ?>>August</option> 
                                <option value="09" <?php echo $m_selected_9; ?>>September</option>
                                <option value="10" <?php echo $m_selected_10; ?>>Oktober</option> 
                                <option value="11" <?php echo $m_selected_11; ?>>November</option> 
                                <option value="12" <?php echo $m_selected_12; ?>>Dezember</option>
                              </select>
                                
                                </td><td  bgcolor="#b1b1b1">
                                
                              <select name="tag">
                                <option value="01"<?php echo $d_selected_1; ?>>01</option> 
                                <option value="02"<?php echo $d_selected_2; ?>>02</option> 
                                <option value="03"<?php echo $d_selected_3; ?>>03</option>
                                <option value="04"<?php echo $d_selected_4; ?>>04</option> 
                                <option value="05"<?php echo $d_selected_5; ?>>05</option> 
                                <option value="06"<?php echo $d_selected_6; ?>>06</option>
                                <option value="07"<?php echo $d_selected_7; ?>>07</option> 
                                <option value="08"<?php echo $d_selected_8; ?>>08</option> 
                                <option value="09"<?php echo $d_selected_9; ?>>09</option>
                                <option value="10"<?php echo $d_selected_10; ?>>10</option> 
                                <option value="11"<?php echo $d_selected_11; ?>>11</option> 
                                <option value="12"<?php echo $d_selected_12; ?>>12</option>
                                <option value="13"<?php echo $d_selected_13; ?>>13</option> 
                                <option value="14"<?php echo $d_selected_14; ?>>14</option> 
                                <option value="15"<?php echo $d_selected_15; ?>>15</option>
                                <option value="16"<?php echo $d_selected_16; ?>>16</option> 
                                <option value="17"<?php echo $d_selected_17; ?>>17</option> 
                                <option value="18"<?php echo $d_selected_18; ?>>18</option>
                                <option value="19"<?php echo $d_selected_19; ?>>19</option> 
                                <option value="20"<?php echo $d_selected_20; ?>>20</option> 
                                <option value="21"<?php echo $d_selected_21; ?>>21</option>
                                <option value="22"<?php echo $d_selected_22; ?>>22</option> 
                                <option value="23"<?php echo $d_selected_23; ?>>23</option> 
                                <option value="24"<?php echo $d_selected_24; ?>>24</option>
                                <option value="25"<?php echo $d_selected_25; ?>>25</option> 
                                <option value="26"<?php echo $d_selected_26; ?>>26</option> 
                                <option value="27"<?php echo $d_selected_27; ?>>27</option>
                                <option value="28"<?php echo $d_selected_28; ?>>28</option> 
                                <option value="29"<?php echo $d_selected_29; ?>>29</option> 
                                <option value="30"<?php echo $d_selected_30; ?>>30</option>
                                <option value="31"<?php echo $d_selected_31; ?>>31</option> 
                              </select>
                              
                              </td><td  bgcolor="#b1b1b1">
                                
                              <select name="stunde">
                                <option value="06"<?php echo $h_selected_6; ?>>06</option>
                                <option value="07"<?php echo $h_selected_7; ?>>07</option> 
                                <option value="08"<?php echo $h_selected_8; ?>>08</option> 
                                <option value="09"<?php echo $h_selected_9; ?>>09</option>
                                <option value="10"<?php echo $h_selected_10; ?>>10</option> 
                                <option value="11"<?php echo $h_selected_11; ?>>11</option> 
                                <option value="12"<?php echo $h_selected_12; ?>>12</option>
                                <option value="13"<?php echo $h_selected_13; ?>>13</option> 
                                <option value="14"<?php echo $h_selected_14; ?>>14</option> 
                                <option value="15"<?php echo $h_selected_15; ?>>15</option>
                                <option value="16"<?php echo $h_selected_16; ?>>16</option> 
                                <option value="17"<?php echo $h_selected_17; ?>>17</option> 
                                <option value="18"<?php echo $h_selected_18; ?>>18</option>
                                <option value="19"<?php echo $h_selected_19; ?>>19</option> 
                                <option value="20"<?php echo $h_selected_20; ?>>20</option> 
                                <option value="21"<?php echo $h_selected_21; ?>>21</option>
                                <option value="22"<?php echo $h_selected_22; ?>>22</option> 
                                <option value="23"<?php echo $h_selected_23; ?>>23</option> 
                                <option value="24"<?php echo $h_selected_24; ?>>24</option>
                                </select>
                                
                              </td><td  bgcolor="#b1b1b1">
                                
                              <select name="minute">
                                <option value="00" sellected>00</option>
                                <option value="05">05</option>
                                <option value="10">10</option> 
                                <option value="15">15</option> 
                                <option value="20">20</option>
                                <option value="25">25</option> 
                                <option value="30">30</option> 
                                <option value="35">35</option>
                                <option value="40">40</option> 
                                <option value="45">45</option> 
                                <option value="50">50</option>
                                <option value="55">55</option> 
                                </select>
                                
                              </td>
                                
                                
                <?php             
                                $versandtermin=$_POST[jahr];
                                $versandtermin.="-";
                                $versandtermin.=$_POST[monat];
                                $versandtermin.="-";
                                $versandtermin.=$_POST[tag];
                                $versandtermin.=", ";
                                $versandtermin.=$_POST[stunde];
                                $versandtermin.=":";
                                $versandtermin.=$_POST[minute];
                                
                               
                               $versand_termin=mktime($_POST['stunde'],$_POST['minute'],0,$_POST['monat'],$_POST['tag'],$_POST['jahr']);
                            
                 ?>
                  
                  <td bgcolor="#b1b1b1">              
                  <input type="submit" value="geplante Mails speichern" name="nur_speichern" tabindex="11"
                  style=" width: 210px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;">
                  
                  &nbsp;&nbsp;
                 
                  
                  <a href="emailautoversand.php"><input type="button" value="Auto-eMail starten"  tabindex="11"
                  style=" width: 170px; height: 30px; font-color: #000000; font-size: 18px; background-color: yellow;  border: 0px; border-radius: 5px 5px 5px 5px;"></a>
                  
                  </td></tr>
                  </table>
                  </div>
                  </td>
                </tr>

<tr><td valign="top" height="10%"  align="center">
 
<table><tr><td>
<?php include("adressen_select.php"); ?>
</td>


<td>
<input type="submit" value="Adressen selectieren" name="adressen_selectieren" tabindex="15" 
 style=" width: 220px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>
</tr>


<tr><td colspan="5" align="center">

Eingabe-Format f&uuml;r "mehrere PLZ's" x_stellig je nach Auswahl: 694;867;987;<br>

<input type="radio" name="mehrstellig" value="4" checked> 3stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="5"> 4stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="6"> 5stellige PLZ<br>

WICHTIG !!! Trennzeichen ist ";" (Semikolon), auch hinter der letzten Nummer, ohne Wortzwischenraum !<br>

Eingabe-Format f&uuml;r PLZ-Bereich: 80 bis 90, 75-80 oder 81 - 85<br>
</td></tr>              


<?php
$zaehler_33=1;
if ( ( $_POST['adressen_selectieren'] == TRUE )  || ( $_POST['nur_speichern'] == TRUE ) || ( $_POST['test_versand'] == TRUE )  || ( $_POST['gruppe_senden'] == TRUE ) ) {



// mysqli_query($link,"truncate $temp_tab_name");

if ( ( $_POST['adressen_selectieren'] == TRUE )  || ( $_POST['test_versand'] == TRUE )  || ( $_POST['gruppe_senden'] == TRUE ) ) {

include("adressen_select_2.php");


mysqli_query($link,"drop table if exists $temp_tab_name");
}

$tabelle_creieren=mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
kd_nr int(6),
geschlecht varchar(64),
firma varchar(64),
name varchar(128),
vorname varchar(64),
plz varchar(64),
email varchar(64),
nachfassen varchar(64)
)
");


$aelter_24_std=time();
$save_table_name=mysqli_query($link,"insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");  



$such_adressen_b=mysqli_query($link,"$kriterium");
while( $adressen_result_b=@mysqli_fetch_array( $such_adressen_b, MYSQLI_BOTH ) ) {

mysqli_query($link,"insert into $temp_tab_name
(
kd_nr,
geschlecht,
firma,
name,
vorname,
plz,
email
)
values
(
'$adressen_result_b[kd_nr]',
'$adressen_result_b[geschlecht]',
'$adressen_result_b[firma]',
'$adressen_result_b[name]',
'$adressen_result_b[vorname]',
'$adressen_result_b[plz]',
'$adressen_result_b[email]'
)
");






$zaehler_33++;
} // ende while

if ($zaehler_33 == 1){
echo "Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler_33 > 2){$zaehler_34=$zaehler_33-1;
echo "Es wurden <b>".$zaehler_34."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler_33 == 2){$zaehler_35=$zaehler_33-1;
echo "Es wurde <b>".$zaehler_35."</b> Datensatz gefunden.<hr>";}
} // ende selectieren

////////////////////////////////////////////////////////////////////////////

if ($_POST['selectierte_adressen_zeigen'] == TRUE) {

$i=1;

echo "
<table border=\"0\" cellpadding=\"5\" width=\"100%\">

<tr><td><b>PLZ</td><td><b>KD-NR</td><td><b>Firma</td><td><b>Name</td><td><b>Vorname</td><td><b>eMail</td></tr>
<tr><td colspan=\"6\"><hr /></td></tr>
";

$select_empfaenger_b=mysqli_query($link,"select * from $temp_tab_name");
while($result_empfaenger_b=mysqli_fetch_array($select_empfaenger_b, MYSQLI_BOTH )){
echo 
"<tr>
<td>$result_empfaenger_b[plz]</td>
<td>$result_empfaenger_b[kd_nr]</td>
<td>$result_empfaenger_b[firma]</td>
<td>$result_empfaenger_b[name]</td>
<td>$result_empfaenger_b[vorname]</td>
<td>$result_empfaenger_b[email]</td>
</tr>";
}
echo "</table>";
}



////////////////////////////////////////


$zaehler_11=1;
$zaehler_22=1;


if ( ( $_POST['email_senden'] == TRUE ) || ( $_POST['nur_speichern'] == TRUE )  || ( $_POST['test_versand'] == TRUE ) )  {



$email_absender_f=$_POST['email_absender'];

//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}

if ($_POST['nur_speichern'] == TRUE) {
mysqli_query($link,"insert into emails_future 
(
zufall_id,
sende_termin,
aktuelle_zeit,
sende_termin_klar,
gruppen_id
)
values
(
'$zufall_id',
'$versand_termin',
'$aktuelle_zeit',
'$versandtermin',
'$_POST[gruppen_auswahl]'
)");
// $versand_termin = integer
// $versandtermin = string
}

// adresse f&uuml;r den eMail-Versand


$kopf_bild="
$header

$_POST[beitrag]

<table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px\">
    <tbody>

<tr>
<td style=\"background-color:#008D36; width:3%\">&nbsp;</td>
<td width=\"17%\" bgcolor=\"#FFFFFF\">&nbsp;</td>
<td colspan=\"2\">


<a href=\"http://localhost/un_sub_scribe.php?email=$empfaenger_db&kd_nr=$kd_nr_db\">Newsletter abbestellen</a><br>
Wenn der Link bei Ihnen nicht funktioniert, kopieren Sie bitte folgende Zeile<br>
in das Adressfenster Ihres Browsers:<br>
http://www.gscheiderle.de/un_sub_scribe.php?email=$empfaenger_db&kd_nr=$kd_nr_db
</td>
<td width=\"17%\" bgcolor=\"#FFFFFF\">&nbsp;</td>
<td style=\"background-color:#008D36; width:3%\">&nbsp;</td>
</tr>
</table>
";


$betreff=htmlentities($_POST['email_betreff']);
$thema=htmlentities($_POST['thema']);
$stichwort=htmlentities($_POST['stichwort']);

if ( ( $_POST['email_senden'] == TRUE ) || ( $_POST['nur_speichern'] == TRUE ) )  {
mysqli_query($link,"insert into email_texte
(
zufall_id,
kopfbild,
thema,
footer,
anrede,
text,
betreff,
stichwort,
email_absender,
datum
)
values
(
'$zufall_id',
'$header',
'$thema',
'$footer',
'$_POST[briefanrede]',
'$_POST[beitrag]',
'$betreff',
'$stichwort',
'$_POST[email_absender]',
'$datum'
)
");
echo mysql_error();
}


$select_email=mysqli_query($link,"select kd_nr, geschlecht, firma, name, vorname, email from $temp_tab_name order by vorname");
while($result_email=@mysqli_fetch_array($select_email, MYSQLI_BOTH )){
$firma_db_2=$empfaenger_db=$result_email['firma'];
$name_db_2=$empfaenger_db=$result_email['name'];
$vorname_db_2=$empfaenger_db=$result_email['vorname'];
$geschlecht_db_2=$empfaenger_db=$result_email['geschlecht'];
$empfaenger_db_2=$result_email['email'];
$kd_nr_db_2=$result_email['kd_nr'];

$firma="";
if ( $firma_db_2 != "" ) {$firma = $firma_db_2."<br>";}

$zaehler_11++;

if ($_POST['briefanrede'] == "privat"){
$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Liebe ".$vorname_db_2.", </font>";
if($geschlecht_db_2 != "w") {$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Lieber ".$vorname_db_2.", </font>";}
}

if ($_POST['briefanrede'] == "ganz_privat"){
$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Meine liebe ".$vorname_db_2."</font>";
if($geschlecht_db_2 != "w") {$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Mein lieber ".$vorname_db_2.", </font>";}
}

if ($_POST['briefanrede'] == "offiziell"){
$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Sehr geehrte Frau ".$firma.$name_db_2."</font>";
if($geschlecht_db_2 != "w") {$anrede_ff="<font color=\"#000000\" size=\"4\"><br>Sehr geehrter Herr ".$firma.$name_db_2.", </font>";}
}

if ($_POST['briefanrede'] == "keine_anrede"){
$anrede_ff="";
}



if ( ( $_POST['email_senden'] == TRUE ) || ( $_POST['test_versand'] == TRUE ) ) {


$betreff = $_POST['email_betreff'];


$inhalt_mail="
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//DE\">
<html>
  <head>
    <title>eMail-Versand</title>
    <meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\">
    	
	
  </head>
  <body link=\"#000000\" vlink=\"#000000\" alink=\"#000000\" bgcolor=\"#e5e5e5\">
  
<table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px;  height:142px\">
    <tbody>
    

 </table>
        
        
 <table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px;  height:20px\">
    <tbody>
    
    
            <tr>
            <td style=\"width:3%; background-color:#008D36\">&nbsp;</td>
            <td colspan=\"3\" style=\" background-color:#FFFFFF\">&nbsp;</td>
            <td style=\"width:3%; background-color:#008D36\">&nbsp;</td>
        </tr>
    
        <tr>
            <td style=\"width:3%; background-color:#008D36\">&nbsp;</td>
            <td style=\"width:17%;background-color:#FFFFFF\">&nbsp;</td>
            <td style=\"width:60%; text-align:left;\">      
            <span style=\"color:#008D36\"><strong><em><span style=\"font-family:georgia,serif\">
      <span style=\"font-size:24px\">
      $anrede_ff
      </span></span></em></strong></span></td>
            <td style=\"width:17%;background-color:#FFFFFF\">&nbsp;</td>
            <td style=\"width:3%; background-color:#008D36\">&nbsp;</td>
        </tr>
    </tbody>
 </table>
       
    $_POST[beitrag]
    
<table bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:1100px\">
    <tbody>
    
<tr>
<td>

<a href=\"http://www.petra-$uwesack.de/un_sub_scribe.php?email=$empfaenger_db&kd_nr=$kd_nr_db\">Newsletter abbestellen</a><br>
Wenn der Link bei Ihnen nicht funktioniert, kopieren Sie bitte folgende Zeile<br>
in das Adressfenster Ihres Browsers:<br>
http://www.gscheiderle.de/un_sub_scribe.php?email=$empfaenger_db&kd_nr=$kd_nr_db
</td>

</tr>
</table>
    
</body>
</html>
";

$header= "MIME-Version: 1.0" . "\n";
$header.= "Content-type: text/html; charset=iso-8859-1" . "\n";
$header.="From: $_POST[email_absender]" . "\n";
$header.="Reply-To: $_POST[email_absender]" . "\n";

$mail_versand=mail($empfaenger_db_2, $betreff, $inhalt_mail, $header); 

$empfaenger_db_2="";
$betreff="";
$inhalt="";
$header="";
$anrede_ff="";
$geschlecht_db_2="";
$vorname_db_2="";
$name_db_2="";
$kd_nr_db_2="";
}

if ( ( $_POST['email_senden'] == TRUE ) && ( $mail_versand == 1 ) ) { 

$zaehler_22++;

mysqli_query($link,"insert into versandte_emails
(
kd_nr,
zufall_id,
versandt
)
values
(
'$result_email[kd_nr]',
'$zufall_id',
'$versandt'
)
");
}

if ( $_POST['nur_speichern'] == TRUE )  { 


$zwei=0;
if ($_POST['nur_speichern'] == TRUE) { $zwei=2; }
mysqli_query($link,"insert into geplante_emails
(
kd_nr,
zufall_id,
versandt
)
values
(
'$result_email[kd_nr]',
'$zufall_id',
'$zwei'
)
");

// $vorname_db_2="";


} 
}// ende while

if ( $zaehler_22 == 1 )  {
echo "<hr>Es wurde <b>keine</b> eMail versandt.<hr>";}
if ($zaehler_22 > 2){$zaehler_23=$zaehler_22-1; $zaehler_12=$zaehler_11-1;
echo "<hr>Es wurden <b>".$zaehler_23." von ".$zaehler_12."</b>  eMails versandt.<hr>";}
if ($zaehler_22 == 2){$zaehler_24=$zaehler_22-1; $zaehler_13=$zaehler_11-1;
echo "<hr>Es wurde <b>".$zaehler_24." von ".$zaehler_13."</b> eMail versandt.<hr>";}


// mysqli_query($link,"drop table if exists $temp_tab_name");
} // ende if senden

// if ($_POST['test_versand'] == TRUE) {mysqli_query($link,"delete from versandte_emails where zufall_id = '$zufall_id'");}

  
?>

      </t1>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
