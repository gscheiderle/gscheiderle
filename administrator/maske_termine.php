<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>$uwesack</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
      <script src="../ckeditor/ckeditor.js"></script>
	    <script src="../ckeditor/samples/sample.js"></script>
	    <link href="../ckeditor/samples/sample.css" rel="stylesheet">
      <link href="../intern/css/schriften.css rel="stylesheet">
  </head>
  <body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
 
 <form action="" method="POST">
  
<?php  
include("../intern/css/span.php");
include("../intern/css/boxen.css"); 
include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");

if ($_POST['speichern'] == TRUE) {


if ( ( $_POST['monat_fo'] == 0 ) || ( $_POST['wo_f'] == NULL ) ) {
echo "
<tr>
<td valign=\"top\" width=\"35%\" align=\"left\" colspan=\"2\">
<h2><font color='red'><b>Pr&auml;senz und/oder Monat wurde nicht ausgew&auml;hlt !<br>
Es wurde der aktuelle Monat eingetragen<br>
&Uuml;ber Termin-Korrektur ab&auml;ndern !</h2></b></font><br>
</td>
</tr>";
}
}


?>
  
  
<div align="left">
  
<table width="1050px" cellpadding="0" cellspacing="0" bgcolor="" border="0" >
  


 <tr>
 <td bgcolor=<?php echo $feldfarbe; ?> colspan="3" height="500px" align="center"  valign="TOP">

 <table width="1050px" height="500px" cellpadding="0" cellspacing="0" bgcolor=<?php echo $feldfarbe; ?> border="0">
 <tr><td align="left"  width="1050px" height="50px" valign="top" bgcolor="">


  <table width="1200px" height="500px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF" border="0"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 0px 0px 0px 0px;
       padding: 5px;
       box-shadow: 12px 12px 12px #FFFFFF;">
 <tr><td valign="top" colspan="2" height="10%"><h2>
<b>EINGABEMASKE "TERMINE ANLEGEN"</b>
  </h2>
  </td></tr>
  
  
<?php 
if ( ( $_POST['konten_auswahl'] == "" ) && ( $_POST['speichern'] == TRUE ) ) { 
echo "
<tr>
<td valign='top' align='left' colspan='2' bgcolor='yellow'><h2><font style='color:red'>
SIE M&Uuml;SSEN EIN PAYPAL-KONTO ausw&auml;hlen !<br>
</td>
</tr>
";
}  
?>
  
  
  <tr>
<td valign="top" width="35%" align="right"><t1>

Termin:
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>

<?php 

if ( $_POST['wo_f'] == "physisch" )
{ $selected_1 = "selected"; $selected_2=""; $selected_3=""; $selected_4=""; $selected_5=""; $selected_6=""; $selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "radio" )
{ $selected_2 = "selected";  $selected_1=""; $selected_3=""; $selected_4=""; $selected_5=""; $selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "btg" )
{ $selected_3 = "selected";   $selected_1=""; $selected_2=""; $selected_4=""; $selected_5="";$selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "web" )
{ $selected_4 = "selected";   $selected_1=""; $selected_2=""; $selected_3=""; $selected_5="";$selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "buchhandlung" ) 
{ $selected_5 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "lundk" ) 
{ $selected_6 = "selected";  $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "aktionsbild" )
{ $selected_7 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "frieden" ) 
{ $selected_8 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_7="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "da_ai" )
{ $selected_9 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_7="";$selected_8=""; $selected_10 = "";}

 
if ( $_POST['wo_f'] == "pay" )
{ $selected_10 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_7="";$selected_8=""; $selected_9 = "";}

echo "
Pr&auml;senz: <select name=\"wo_f\">
<option value=\"null\">physisch, Radio, Web</option>
<option value=\"physisch\" $selected_1>In Person</option>
<option value=\"btg\" $selected_3>Blessing to go</option>
<option value=\"web\" $selected_4>Im Internet</option>
<option value=\"buchhandlung\" $selected_5>Buchhandlung</option>
<option value=\"lundk\" $selected_6>Live & Kostenfrei</option>
<option value=\"aktionsbild\" $selected_7>Aktionsbild</option>
<option value=\"lph\" $selected_8>Frieden</option>
<option value=\"da_ai\" $selected_9>Kalligrafie</option>
<option value=\"online\" $selected_10>Online</option>
</select>
";
?>
<!-- <select name="wo_fo">
<option value="physisch" selected>physisch, Radio, Web</option>
<option value="physisch">In Person</option>
<option value="radio">Radio Lotusbl&uuml;te</option>
<option value="lundk">Live & Kostenfrei</option>
<option value="frieden">Frieden</option>
<option value="btg">Blessing to go</option>
<option value="web">Im Internet</option>
<option value="buchhandlung">Buchhandlung</option>
<option value="aktionsbild">Aktionsbild</option>
</select> //-->
&nbsp;&nbsp;im&nbsp;&nbsp;

<?php 

if ( $_POST['monat_fo'] == "0") {$select_01="selected";}
if ( $_POST['monat_fo'] == "1") {$select_11="selected";}
if ( $_POST['monat_fo'] == "2") {$select_21="selected";}
if ( $_POST['monat_fo'] == "3") {$select_31="selected";}
if ( $_POST['monat_fo'] == "4") {$select_41="selected";}
if ( $_POST['monat_fo'] == "5") {$select_51="selected";}
if ( $_POST['monat_fo'] == "6") {$select_61="selected";}
if ( $_POST['monat_fo'] == "7") {$select_71="selected";}
if ( $_POST['monat_fo'] == "8") {$select_81="selected";}
if ( $_POST['monat_fo'] == "9") {$select_91="selected";}
if ( $_POST['monat_fo'] == "10") {$select_101="selected";}
if ( $_POST['monat_fo'] == "11") {$select_111="selected";}
if ( $_POST['monat_fo'] == "12") {$select_121="selected";}


$jahr=date("Y")+1;
echo "
<select name=\"monat_fo\">
<option value=\"0\" $select_01>Monat:</option>
<option value=\"1\" $select_11>Januar</option>
<option value=\"13\" $select_13>Januar $jahr</option>
<option value=\"2\" $select_21>Februar</option>
<option value=\"14\" $select_21>Februar $jahr</option>
<option value=\"3\" $select_31>M&auml;rz</option>
<option value=\"4\" $select_41>April</option>
<option value=\"5\" $select_51>Mai</option>
<option value=\"6\" $select_61>Juni</option>
<option value=\"7\" $select_71>Juli</option>
<option value=\"8\" $select_81>August</option>
<option value=\"9\" $select_91>September</option>
<option value=\"10\" $select_101>Oktober</option>
<option value=\"11\" $select_111>November</option>
<option value=\"12\" $select_121>Dezember</option>
</select>";




 ?>
</td>
</tr>


<tr>
<td align="right">
Ort:</td>
<td><input type="text" name="ort_f" size="30" tabindex="1" value="<?php echo $_POST['ort_f']; ?>"/></t1>
</td>
</tr>
  
  
<?php include("datums_anzeige_von.php"); ?>


<tr>
<td valign="top" width="35%" align="right"><t1>
Hinweis !
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<font style=" background: yellow; ">&nbsp;&nbsp;Bei einem 1-t&auml;gigen Termin MUSS !!! in "Termin von" und "Termin bis" das gleiche Datum stehen!&nbsp;&nbsp;</t1></font>
</td>
</tr>


<?php include("datums_anzeige_bis.php"); ?>


<tr>

<td valign="top" width="35%" align="right"><t1>

Termin auf website ausblenden

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<input type="text" name="termin_ausblenden" size="2" tabindex="1" value="<?php echo $_POST['termin_ausblenden']; ?>"/> ausblenden = 1</t1>

</td>

</tr>


<tr>
<td valign="top" width="35%" align="right"><t1>
Thema
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<textarea cols="70" rows="5" name="thema_f"  tabindex="1"><?php echo $_POST['thema_f']; ?></textarea></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Text f&uuml;r Bezahlvorgang
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<textarea cols="120" rows="3" name="bezahl_vorgang_f" tabindex="1"><?php echo $_POST['bezahl_vorgang_f']; ?></textarea>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Webinar-Zugangs-Code
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<textarea cols="120" rows="3" name="webinar_code_f" tabindex="1"><?php echo $_POST['webinar_code_f']; ?></textarea>
</td>
</tr>


<tr>
<td colspan=2" valign="top" width="35%" align="left" bgcolor="red"><t1><font style= "color:#FFFFFF"><b></b>
Auswahl PAYPAL-Konten:
&nbsp;&nbsp;&nbsp;&nbsp;
TAO-LIFE-Konto:&nbsp;&nbsp;<input type="radio" name="konten_auswahl" value="taolifetransformation@gmail.com" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$uwesack-COACHING-Konto:&nbsp;&nbsp;<input type="radio" name="konten_auswahl" value="$uwesack.petra.coaching@gmail.com" />
</td>
</tr>



<tr>
<td valign="middle" align="left" colspan="2"><t1>
<?php include("datum_fruehbuch.php"); ?><br><br>


<table>
<tr>
<td colspan="2">
Format f&uuml;r alle Preis-Angaben in Euro: <b>100.00</b><br><br></td>
</tr>
<tr>
<td>
Fr&uuml;hbucher-Preis:</td> <td><input type="text" name="fruehbuch_preis" size="15" tabindex="1" value="<?php echo $_POST['fruehbuch_preis']; ?>"/> Euro
&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Fr&uuml;hbucher bleibt konstant.<br></td>
</tr>
<tr>
<td>
Normalpreis: </td> <td><input type="text" name="regular_preis" size="15" tabindex="1" value="<?php echo $_POST['regular_preis']; ?>"/> Euro
&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Normalpreis bleibt konstant.</t1><br></td>
</tr>
<tr>
<td>
1-Tages-Preis: </td> <td><input type="text" name="halber_preis" size="15" tabindex="1" value="<?php echo $_POST['halber_preis']; ?>"/> Euro
&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Preis 3:&nbsp;<input type="text" name="link_halberpreis" size="55" tabindex="1" value="<?php echo $_POST['link_halberpreis']; ?>"/></t1><br></td>
</tr>
<tr>
<td>
Halb-Tages-Preis (abends oder vormittags): </td> <td><input type="text" name="halb_tages_preis" size="15" tabindex="1" value="<?php echo $_POST['halb_tages_preis']; ?>"/> Euro
&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Preis 4:&nbsp;<input type="text" name="link_halbtagespreis" size="55" tabindex="1" value="<?php echo  $_POST['link_halbtagespreis']; ?>"</t1><br></td>
</tr>

<tr>
<td colspan="2">
<br>
<font style="background: yellow; "> Preise auf der Website ausblenden: </font> <input type="checkbox" name="preis_ausblenden" tabindex="1" value="1" style=" height: 25px; width: 25px;"/>
Code f&uuml;r den Zugang:&nbsp;<input type="text" name="zugangs_code" size="30" tabindex="1" value="<?php echo  $_POST['zugangs_code']; ?>"</t1><br></td>
</tr>

</table>

</td>
</tr>

<tr>
<td valign="top" width="35%" align="left" colspan="2"><t1>
Aktionsbild&nbsp;
<input type="text" name="aktions_bild" size="35" tabindex="1" value="<?php echo $_POST['aktions_bild']; ?>"/> (nur den Namen)
</td>
</tr>

<tr>
<td valign="top" width="35%" align="left" colspan="2"><t1>
Details: <br>
<t1>

<textarea cols="70" rows="30" id="details_f" name="details_f" value="<?php echo $_POST['details_f']; ?>"></textarea></t1>
            <script>
                // Replace the <textarea id="details_f"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'details_f' );
            </script>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="left" colspan="2"><t1>
<input type="submit" name="speichern" size="35" tabindex="1" value="Termin speichern"/> und den Zugang per eMail versenden:  <input type="checkbox" name="zugang_termin_id" tabindex="1" value="1" style=" height: 25px; width: 25px;"/>
</td>
</tr>

<?php if ( ( $_POST['konten_auswahl'] == "" ) && ( $_POST['speichern'] == TRUE ) ) { 
/* echo "
<tr>
<td valign='top' align='left' colspan='2'><t1><font style='color:red'>
SIE M&Uuml;SSEN EIN PAYPAL-KONTO ausw&auml;hlen !<br>
</td>
</tr>
"; */
exit;
}



$aktionsbild="intern/pictures/system/".$_POST['aktions_bild'];
$termine="termine";

$monat=date("m");
$jahr_wechsel=substr("$termin_bis",5,2);
$jahr=date("Y");
if ( $jahr_wechsel < $monat ) { $jahr = $jahr + 1; }


if ($_POST['speichern'] == TRUE) {

$veranstaltungs_monat=$_POST['monat_fo'];

if ( $_POST['monat_fo'] == 0 ) { $veranstaltungs_monat = date("m"); }


 if ( ( $_POST['monat_fo'] == 0 ) || ( $_POST['wo_f'] == NULL ) ) {
echo "
<tr>
<td valign=\"top\" width=\"35%\" align=\"left\" colspan=\"2\">
<h2><font color='red'><b>Der Ort und/oder Monat wurde(n) nicht ausgew&auml;hlt !</h2></b></font><br>
</td>
</tr>";
exit;
} 


$details_f=mysqli_real_escape_string($link, $_POST['details_f']);
/* $bezahlvorgang_f=mysqli_real_escape_string($link, $_POST['$_POST[bezahl_vorgang_f']); */

$themen=htmlentities($_POST['thema_f']);
$ort=htmlentities($_POST['ort_f']);
$text_fuer_bezahlvorgang=htmlentities($_POST['bezahl_vorgang_f']);
// $details_f=htmlentities($details_f);

mysqli_query($link,"insert into $termine
(
termin_von,
termin_bis,
termin_ausblenden,
ort,
thema,
fruehbuch_datum,
fruehbuch_preis,
regular_preis,
eintages_preis,
link_eintagespreis,
halbtages_preis,
link_halbtagespreis,
text_fuer_buchung,
webinar_code,
details,
wo,
monat,
jahr,
aktionsbild,
preis_ausblenden,
zugangs_code,
paypal_konto
)
values
(
'$termin_von',
'$termin_bis',
'$_POST[termin_ausblenden]',
'$ort',
'$themen',
'$fruehbuch_datum',
'$_POST[fruehbuch_preis]',
'$_POST[regular_preis]',
'$_POST[halber_preis]',
'$_POST[link_halberpreis]',
'$_POST[halb_tages_preis]',
'$_POST[link_halbtagespreis]',
'$text_fuer_bezahlvorgang',
'$_POST[webinar_code_f]',
'$details_f',
'$_POST[wo_f]',
'$veranstaltungs_monat',
'$jahr',
'$aktionsbild',
'$_POST[preis_ausblenden]',
'$_POST[zugangs_code]',
'$_POST[konten_auswahl]'
)
");

echo "<font style=\" font-size: 14px; color: red; background-color: yellow;\"><b>LINK F&Uuml;R AKTUELLEN TERMIN:<br>";
echo $zugangs_link="https://www.petra-$uwesack.de/termin_details.php?termin_id=".$insert_id=mysql_insert_id();
echo "</b></font>";
}


 ?>

  
    
  </table>
  <br><br>
  <!-- ////////////////////////////////////////// //-->
 
 </td></tr>
 
 </div> 
 
 </td>
 </tr>
 

 
 </table>
 
  <tr>
 <td bgcolor="#FFFFFF" colspan="3" height="5px" align="center"  valign="TOP">
 </td>
</tr>


<?php 

if ( ( $_POST['speichern'] == TRUE ) && ( $_POST['zugang_termin_id'] == TRUE ) ) {

/* $empfaenger = 'Petra.$uwesack@drsha.com'; */

$empfaenger= '$uwesack.petra.coachin@gmail.com'.',';
$empfaenger.= 'petra.bysy.shen@gmail.com'.','; 



$betreff="Zugang f&uuml;r versteckte Veranstaltung";
$inhalt.= "
<div align=\"center\">
 
  <table border=\"0\" width=\"800\" height=\"\" bgcolor=\"#FFFFFF\">
    
     <tr>
      <td width=\"80%\" align=\"left\" colspan=\"2\">
      <font face=\"arial\" size=\"4\">
     $_POST[thema_f]<br>
     Preis: $_POST[halber_preis]$_POST[halb_tages_preis]<br><br>
     Der Zugangs-Link f&uuml;r dieses Angebot:<br>
     $zugangs_link<br><br>
     Der Zugangs-Code f&uuml;r dieses Angebot:<br>
     $_POST[zugangs_code]<br><br>
     

      
</td>
</tr> 

<tr>
<td>


  </table>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header.='Content-Transfer-Encoding: 8bit' . "\r\n";
$header.='From: info@petra-$uwesack.de' . "\r\n";
$header.='Reply-To: info@petra-$uwesack.de' . "\r\n";

mail($empfaenger, $betreff, $inhalt, $header);  
 
 }
  ?>
 
 
 
</form>
  </body>
</html>