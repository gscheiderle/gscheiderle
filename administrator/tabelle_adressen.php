<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Daten bearbeiten</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body link="#000000" vlink="#000000" alink="#000000" bgcolor="#FFFFFF">
  
   
  
  
<form action="<?php  echo "tabelle_adressen.php?kd_nr=$kundennummer"; ?>" method="POST">
<?php  
include("../intern/css/span.php");
include("../intern/css/boxen.css"); 
include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/funktionen.php");
include("../intern/mysql_connect_gscheiderle.php");



$datum=date("d.m.Y, h:i:s");


$tabellen_name=str_replace("?","7",str_replace("&","6",str_replace(":","5",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",session_id())))))));   

$temp_tab_name=$tabellen_name."_1"; 
$temp_tab_name=substr($temp_tab_name,-12);



?>
 
<div align="center">


               
                  
  <div align="center">
 <table width="900px" height="0px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
 <tr><td valign="top" height="10%" align="center">
<font size="5"> <b>
ADRESSEN SELECTIEREN
  </b></font>
  </td>
  </tr>

 <tr><td valign="top" height="10%"  align="center">
 
<table><tr><td>
<?php include("adressen_select.php"); ?>
</td>


<td>
<input type="submit" value="Adressen selectieren" name="adressen_selectieren" tabindex="15"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>
</tr>



</table>

<?php 

if (($_POST['adressen_selectieren'] == TRUE)  &&  ($_POST['adressen_suchen'] != "korrektur")) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\">
<tr>
<td>Kd-Nr</td>
<td>Kontakt-Art</td>
<td>1. Markierung</td>
<td>2. Markierung</td>
<td>Nachname</td>
<td>Vorname</td>
<td>Geschlecht</td>
<td>Geburts-Monat</td>
<td>Stra&szlig;e</td>
<td>PLZ</td>
<td>Ort</td>
<td>Land</td>
<td>Telefon</td>
<td>Mobil</td>
<td>E-Mail</td>
<td>Ausbildung</td>
<td>Newsletter</td>
<td>best�tigt</td>

</tr>
";

include("adressen_select_2.php");

$such_adressen=mysqli_query($link,"$kriterium");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {
$zaehler++;

$bgcolor="";
if($i % 2 != 0) {$bgcolor="bgcolor=\"#c0c0c0\"";}


echo "<tr>
<td  $bgcolor> <a href=\"adressen_korrektur.php?kd_nr=$adressen_result[kd_nr]\">$adressen_result[kd_nr]</a></td>
<td $bgcolor>$adressen_result[kontakt_art]</td>
<td $bgcolor>$adressen_result[markierung_1]</td>
<td $bgcolor>$adressen_result[markierung_2]</td>
<td $bgcolor>$adressen_result[name]</td>
<td $bgcolor>$adressen_result[vorname]</td>
<td $bgcolor>$adressen_result[geschlecht]</td>
<td $bgcolor>$adressen_result[geburtsmonat]</td>
<td $bgcolor>$adressen_result[strasse]</td>
<td $bgcolor>$adressen_result[plz]</td>
<td $bgcolor>$adressen_result[ort]</td>
<td $bgcolor>$adressen_result[Land]</td>
<td $bgcolor>$adressen_result[telefon]</td>
<td $bgcolor>$adressen_result[mobil_telefon]</td>
<td $bgcolor>$adressen_result[email]</td>
<td $bgcolor>$adressen_result[ausbildung]</td>
<td $bgcolor>$adressen_result[newsletter]</td>
<td $bgcolor>$adressen_result[new]</td>
";

$i++;
}
if ($zaehler == 0){
echo "Es wurde <b>kein</b> Datensatz gefunden.";}
if ($zaehler > 1){
echo "Es wurden <b>".$zaehler."</b> Datens&auml;tze gefunden.";}
if ($zaehler == 1){
echo "Es wurde <b>".$zaehler."</b> Datensatz gefunden.";}
}

 ?>
 
 
 </table>              
 </table>
 
 </td>
 </tr>
 </table>                 
  </form>                
  </div>
  </body>
  </html>