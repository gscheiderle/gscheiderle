<?php 
    session_start(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Gruppenarbeit</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    	<script src="../ckeditor/ckeditor.js"></script>
	    <script src="../ckeditor/samples/sample.js"></script>
	    <link href="../ckeditor/samples/sample.css" rel="stylesheet">
      <link href="../intern/css/schriften.css rel="stylesheet">
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<?php echo "<form action=\"\" method=\"POST\">";

include("../intern/css/schriften.css"); 
include("../intern/parameter.php");  
include("../intern/css/span.php");
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

 

$tabellen_name=str_replace("?","7",str_replace("&","6",str_replace(":","5",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",session_id())))))));   

$temp_tab_name=$tabellen_name."_2"; 
$temp_tab_name=substr($temp_tab_name,-24);

$temp_tab_name;

$datum=date("d.m.Y, h:i:s");

function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($db_ausdruck != ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 
$aktuelle_zeit=time(date("d.m.Y:h:i"));
?>
  
<table width="900px" height="900px" cellpadding="10" cellspacing="0" border="0"
  style="bgcolor: #c0c0c0;        
       z-index: +5;
       border: 1px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 12px 12px 12px #4A4A4A;">
       
<tr><td valign="top">

<table width="900px" height="0px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
       
       
  <tr><td valign="top" height="10%"  align="center">
  <h1>Gruppen kreieren</h1>      
  </td></tr>     
       
 <tr><td valign="top" height="10%"  align="center">
 <input type="text" name="gruppen_name" size="55" value="<?php echo $_POST['gruppen_name']; ?>">&nbsp;&nbsp;
 <input type="submit" name="gruppen_name_speichern" size="55" value="Gruppen Name speichern" />
 </td></tr>
     
<?php 
 $speichern = TRUE;
 if ($_POST['gruppen_name_speichern'] == TRUE) {
 
 $crtl_gruppen_name=mysqli_query($link,"select gruppe_name from gruppe_definition where gruppe_name like '$_POST[gruppen_name]'");
 while($result_crtl_gruppen=mysqli_fetch_array( $crtl_gruppen_name, MYSQLI_BOTH )) {
 if ( $result_crtl_gruppen['gruppe_name'] == $_POST['gruppen_name']) {echo "<tr><td align=\"center\"><h2>Treffer ! Die Gruppe gibt es schon !<br>
 Musst Dir was Neues einfallen lassen. :-))</h2></td></tr>"; $speichern = FALSE;}
 }
 }
 

 if ( ( $speichern == TRUE) && ($_POST['gruppen_name_speichern'] == TRUE) ){
 mysqli_query($link,"insert into gruppe_definition
 (
 gruppe_name
 )
 value
 (
 '$_POST[gruppen_name]'
 )
 ");
 
 if (mysql_error() == 0) {echo "<tr><td align=\"center\"><h2>Gruppe wurde gespeichert !</h2></td></tr>";}
 
 mysqli_query($link,"delete from gruppe_definition where gruppe_name = ''");
 }
 
 
  
?>      
       

 <tr><td valign="top" height="10%"  align="center">
 

                  
                                    

<tr><td valign="top" height="10%"  align="center">
 
<table border="0" width="900px"><tr><td>
 <?php include("adressen_select.php"); ?>
</td>


<td>
<input type="submit" value="Empf&auml;nger selectieren" name="adressen_selectieren" tabindex="13" 
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>
</tr>


<tr><td colspan="5" align="center">

Eingabe-Format f&uuml;r "<strong>mehrere PLZ</strong>'s" x_stellig je nach Auswahl: 694;867;987;<br>

<input type="radio" name="mehrstellig" value="4" checked> 3stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="5"> 4stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="6"> 5stellige PLZ<br>

<b>WICHTIG !!! Trennzeichen ist ";" (Semikolon), auch hinter der letzten Nummer, ohne Wortzwischenraum !<br></b><br>

Eingabe-Format f&uuml;r <b>PLZ-Bereich:</b> 80 bis 90, 75-80 oder 81 - 85<br>
</td></tr>              


<?php

if ($_POST['adressen_selectieren'] == TRUE) {


mysqli_query($link,"drop table if exists $temp_tab_name");

$tabelle_creieren=mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
plz varchar(64),
kd_nr int(6),
name varchar(64),
vorname varchar(64),
geschlecht varchar(64),
email varchar(64)
)
");


$aelter_24_std=time();
$save_table_name=mysqli_query($link,"insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");  

 
if ( ( $_POST['adressen_suchen'] == "plz_bereich") && ( $_POST['kriterium'] != "" ) ) {
$von=substr("$_POST[kriterium]",0,2)*1000;
$bis=substr("$_POST[kriterium]",-2,2)*1000;
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where email != '' and plz >= '$von' and plz <= '$bis' and adressenfehler = 'true' and newsletter != 'NO'";}


if ($_POST['adressen_suchen'] == "alle") {
$kriterium = "select * from adressen where kd_id > '0'";}

if ($_POST['adressen_suchen'] == "email_alle") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where  email != '' and adressenfehler = 'true' and newsletter != 'NO' order by kontakt_art desc";}

if ( ( $_POST['adressen_suchen'] == "email") && ( $_POST['kriterium'] != "" ) ) {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where  email like  '$_POST[kriterium]%' and newsletter != 'NO'";}


if ($_POST['adressen_suchen'] == "kontakt") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where kontakt_art like '$_POST[kriterium_2]' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['adressen_suchen'] == "markierung_1") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where markierung_1 like '$_POST[kriterium_2]' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['adressen_suchen'] == "markierung_2") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where markierung_2 like '$_POST[kriterium_2]' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['adressen_suchen'] == "kontakt_ausschliessen") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where kontakt_art != '$_POST[kriterium_2]' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ( ( $_POST['adressen_suchen'] == "plz") && ( $_POST['kriterium'] != "" ) )  {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where plz like '$_POST[kriterium]%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ( ( $_POST['adressen_suchen'] == "name") && ( $_POST['kriterium'] != "" ) )  {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where name like '$_POST[kriterium]%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['test_versand'] == TRUE) {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where email like '$_POST[email_probe_adresse]' and email != ''";}


if ($_POST['adressen_suchen'] == "div_plz") {
$plz_anzahl=substr_count($_POST['kriterium'], ";");
$i=1;
$start=0;
$and=" and  email != '' and adressenfehler = 'true' and newsletter != 'NO' ";
$or=" or plz like ";
for ($i;$i <= $plz_anzahl;$i++) {

if ($i < $plz_anzahl) {
$or=" or plz like ";
$and=" and  email != '' and adressenfehler = 'true' and newsletter != 'NO' ";
}
else {$or="";
      $and="";
            }
$anzahl_ziffern=$_POST['mehrstellig']-1;
$plznummern=substr("$_POST[kriterium]",$start, $anzahl_ziffern);
$plz_nummern.="'$plznummern%' $and $or ";

$start=$start + $_POST['mehrstellig'];
}
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where plz like $plz_nummern and  email != '' and adressenfehler = 'true' and newsletter != 'NO' order by plz";}

$zaehler=0;

$such_adressen=mysqli_query($link,"$kriterium");
while($adressen_result=@mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {

mysqli_query($link,"insert into $temp_tab_name
(
plz,
kd_nr,
name,
vorname,
geschlecht,
email
)
values
(
'$adressen_result[plz]',
'$adressen_result[kd_nr]',
'$adressen_result[name]',
'$adressen_result[vorname]',
'$adressen_result[geschlecht]',
'$adressen_result[email]'
)
");

$zaehler++;
} // ende while

if ($zaehler == 0){
echo "<hr>Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler > 1){
echo "<hr>Es wurden <b>".$zaehler."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler == 1){
echo "<hr>Es wurde <b>".$zaehler."</b> Datensatz gefunden.<hr>";}
} // ende selectieren
echo mysql_error();

////////////////////////////////////////////////////////////////////////////

if ($_POST['selectierte_adressen_zeigen'] == TRUE) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\" width=\"100%\">

<tr><td><b>PLZ</td><td><b>KD-NR</td><td><b>Name</td><td><b>Vorname</td><td><b>m/w</td><td><b>eMail</td></tr>
<tr><td colspan=\"5\"><hr /></td></tr>
";

$select_empfaenger=mysqli_query($link,"select * from $temp_tab_name");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){
echo 
"<tr>
<td>$result_empfaenger[plz]</td>
<td>$result_empfaenger[kd_nr]</td>
<td>$result_empfaenger[name]</td>
<td>$result_empfaenger[vorname]</td>
<td>$result_empfaenger[geschlecht]</td>
<td>$result_empfaenger[email]</td>
</tr>";
}

}


////////////////////////////////////////


?>

      </t1>
          </td>
        </tr>
        

                <tr>
                 <td colspan="5" height="20px" valign="middle" align="center">
                  <br>
                  <input type="submit" value="Empf&auml;nger-Liste zeigen" name="selectierte_adressen_zeigen" tabindex="14"
                  style=" width: 250px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;"><br><br>
                  <hr>
                  
                
            </td></tr>
            
            
            <tr>
                 <td colspan="5" height="20px" valign="middle" align="center">
                 <table border="0" width="800px" height="300px">
                 <tr><td colspan="3">
                 <?php $gruppen_suche=mysqli_query($link,"select * from gruppe_definition");
                       while($gruppen_result=mysqli_fetch_array($gruppen_suche, MYSQLI_BOTH )) {
                       if ( $gruppen_result['gr_def_id'] == $_POST['gruppen_auswahl'] )  { $selected = "selected"; }
                       $gruppen.="<option $selected value=\"$gruppen_result[gr_def_id]\"> $gruppen_result[gruppe_name]</option>";
                       $selected="";
                       }
                 ?>
                 <t1>Gruppe ausw&auml;hlen und mit der Empf&auml;nger-Liste speichern:<br><br>
                 <font style=" background-color: yellow;">&nbsp;&nbsp;Wird zus&auml;tzlich die Check-Box ausgew&auml;hlt, werden neue Gruppenmitglieder zu bereits geplanten eMails&nbsp;&nbsp;<br>
                 &nbsp;&nbsp;der Gruppe hinzugefuegt, nicht aber zu den bereits versandten eMails dieser Gruppe! &nbsp;&nbsp;</font><br><br></td></tr>
                 <tr><td valign="middle">
                 <select name="gruppen_auswahl">
                 <?php echo $gruppen; ?>
                 </select>&nbsp;&nbsp;<br>
                 </td>
                 <td  valign="middle"><t1>
                                   <input type="checkbox" name="empfaenger_hinzufuegen" 
                  style=" width: 20px; height: 20px; color: #000000; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;">&nbsp;Check-Box
                  </td>
                 
                 <td>
                 <input type="submit" value="Gruppe speichern" name="liste_speichern" tabindex="15"
                  style=" width: 200px; height: 30px; color: #000000; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;">
                  </td></tr>
                  

                  
                  
               
                  
                 
                 <?php 
                 
                 if ( $_POST['liste_speichern'] == TRUE ) {
                 $vorauswahl=mysqli_query($link,"select * from $temp_tab_name");
                 while($vorauswahl_result=@mysqli_fetch_array($vorauswahl, MYSQLI_BOTH )) {
                 mysqli_query($link,"insert into gruppen 
                 (
                 plz,
                 kd_nr,
                 name,
                 vorname,
                 geschlecht,
                 email,
                 gruppe
                 )
                 value
                 (
                 '$vorauswahl_result[plz]',
                 '$vorauswahl_result[kd_nr]',
                 '$vorauswahl_result[name]',
                 '$vorauswahl_result[vorname]',
                 '$vorauswahl_result[geschlecht]',
                 '$vorauswahl_result[email]',
                 '$_POST[gruppen_auswahl]'
                 )
                 ");
                 } // ende while
                 
                 // neue Mitglieder zu bereits geplanten eMails hinzuf&uuml;gen
                 if ( $_POST['empfaenger_hinzufuegen'] == TRUE ) {
                 $zufall_id_select=mysqli_query($link," select zufall_id from emails_future where gruppen_id = '$_POST[gruppen_auswahl]' and versandt < '1' " ); 
                 while ( $zufall_id_result = mysqli_fetch_array($zufall_id_select, MYSQLI_BOTH ) ) {
                 
                 $kd_nr_select=mysqli_query($link,"select kd_nr from $temp_tab_name" );
                 while($kd_nr_result = mysqli_fetch_array($kd_nr_select, MYSQLI_BOTH ) ) {
                 mysqli_query($link,"insert into geplante_emails
                 (
                 kd_nr,
                 zufall_id,
                 versandt
                 )
                 values
                 (
                 '$kd_nr_result[kd_nr]',
                 '$zufall_id_result[zufall_id]',
                 '2'
                 )
                 ");
                 }
                 }
                 }
                 
                 
                 mysqli_query($link,"drop table $temp_tab_name");
                 
                 } // ende if liste_speichern
                 ?>
                 
                </td></tr>
                 
                 <tr><td colspan="3">
                 <hr>
                 </td></tr>
                 
                 <tr><td>
                 
                 
                 <?php 
                 
                 $selected="";
                 
                 $gruppen_suche_2=mysqli_query($link, "select * from gruppe_definition" );
                       while($gruppen_result_2=mysqli_fetch_array($gruppen_suche_2, MYSQLI_BOTH )) {
                       if ( $gruppen_result_2['gr_def_id'] == $_POST['gruppe_zeigen'] )  { $selected = "selected"; }
                       $gruppen_2.="<option $selected value=\"$gruppen_result_2[gr_def_id]\">$gruppen_result_2[gruppe_name]</option>";
                       $selected="";
                       }
                 ?>
                 

                 <t1>
                 Gruppe zeigen:<br>
                 <select name="gruppe_zeigen">
                 <?php echo $gruppen_2; ?>
                 </select>&nbsp;&nbsp;<br>
                 </td>
                 <td>&nbsp;</td>
                 <td><t1><br>
                 <input type="submit" value="Gruppe zeigen" name="gruppezeigen" tabindex="16"
                 style=" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: #cc00cc;  border: 0px; border-radius: 5px 5px 5px 5px;"><br>
                 </td></tr>
                 
      <?php 
      if ( $_POST['gruppezeigen'] == TRUE )  {
      $select_gruppe=mysqli_query($link, "select * from gruppen where gruppe = '$_POST[gruppe_zeigen]' " );  
      while ( $result_gruppe = mysqli_fetch_array( $select_gruppe, MYSQLI_BOTH ) )  {
      $teilnehmer.="<tr><td><t1>$result_gruppe[gruppen_id]</t1></td><td><t1>&nbsp;&nbsp;$result_gruppe[name]</t1></td><td><t1>&nbsp;&nbsp;$result_gruppe[vorname]</t1></td><td><t1>&nbsp;&nbsp;$result_gruppe[email]</t1></td></tr>";
      }
      echo "
      <tr><td colspan=\"3\">
      <table><tr>
      <td><t1>ID<t1></td><td><t1>&nbsp;&nbsp;Name</t1></td><td><t1>&nbsp;&nbsp;Vorname</t1></td><td><t1>&nbsp;&nbsp;eMail</t1></td></tr>
      <tr><td colspan=\"4\"><hr></td></tr>
      $teilnehmer
      </table>
      </td>
      </tr>
      
      <tr><td align=\"right\">
      <t1>Teilnehmer&nbsp;aus&nbsp;der&nbsp;Gruppe&nbsp;l&ouml;schen&nbsp;mit&nbsp;der&nbsp;ID:&nbsp;</t1>
      <input type=\"text\" name=\"id_loeschen\" style=\" width: 80px; height: 30px; color: #000000; font-size: 18px; text-align: center; background-color: #FFFF00;  border: 1px; border-color: #000000; border-radius: 5px 5px 5px 5px;\">
      &nbsp;&nbsp;
      </td><td align=\"\">
      <input type=\"submit\" value=\"Teilnehmer l&ouml;schen\" name=\"teilnehmerloeschen\" tabindex=\"17\"
                 style=\" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                 &nbsp;&nbsp;&nbsp;
      
      ";
      }
      
      if ( $_POST['teilnehmerloeschen'] == TRUE )  { mysqli_query($link, "delete from gruppen where gruppen_id = '$_POST[id_loeschen]' " ); }
      
       ?>
                 
                 
                 <tr><td colspan="3">
                 <hr>
                 </td></tr>
                 
                 <tr><td><t1> 
                  <?php 
                 $selected="";
                 
                 $gruppen_suche_1=mysqli_query($link, "select * from gruppe_definition" );
                       while($gruppen_result_1=mysqli_fetch_array($gruppen_suche_1, MYSQLI_BOTH )) {
                       if ( $gruppen_result_1['gr_def_id'] == $_POST['gruppe_loeschen'] )  { $selected = "selected"; }
                       $gruppen_1.="<option $selected value=\"$gruppen_result_1[gr_def_id]\">$gruppen_result_1[gruppe_name]</option>";
                       $selected="";
                       }
                 ?>
                 
                 Gruppe l&ouml;schen:<br>
                 <select name="gruppe_loeschen">
                 <?php echo $gruppen_1; ?>
                 </select>&nbsp;&nbsp;
                 
                 </td>
                 
                 <td>&nbsp;</td>
                 
                 <td><t1>
                  <input type="submit" value="Gruppe l&ouml;schen ?" name="gruppenloeschen" tabindex="18"
                  style=" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;"><br>
                  </td></tr>
                  
                 <?php 
                      if ( $_POST['gruppenloeschen'] == TRUE )  { echo "
                      
                   </td><td colspan=\"3\" align=\"center\"><t1><br>
                  <input type=\"submit\" value=\"Gruppe l&ouml;schen !\" name=\"gruppe_loeschen\" tabindex=\"19\"
                  style=\" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\"><br>
                  </td></tr>
                  
                  <tr><td colspan=\"3\" align=\"center\">
                 <font style=\"color:red; font-size: 24px; weight: 700; text-align: center;\"> <br>Es wird alles gel&ouml;scht: die Gruppe samt aller Teilnehmer !<br>
                 (nicht aus der Adress-Datei)</font>
                 <hr>
                 </td></tr>
                  
                  ";
                  }
                 
                 
                  ?>
                 

                 
                 
                  
                  
                  </table>
                 
                 <?php 
                 if ( $_POST['gruppe_loeschen'] == TRUE ) {
                 mysqli_query($link, "delete from gruppe_definition where gr_def_id = '$_POST[gruppe_loeschen]' "); 
                 mysqli_query($link, "delete from gruppen where gruppe = '$_POST[gruppe_loeschen]' "); 
                 }
                 
                 
                  ?>


            </td></tr>
            
   
      </table>
    </form>
  </body>
</html>
