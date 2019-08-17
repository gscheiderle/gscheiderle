<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>eMail selectieren</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body link="#000000" vlink="#000000" alink="#000000" bgcolor="#c1c1c1">
  
   
  
  
<form action="" method="POST">
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
$temp_tab_name=substr($temp_tab_name,-24);


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
eMail-Adressen selectieren !
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


<tr><td colspan="5" align="center">
Eingabe-Format f&uuml;r "<strong>mehrere PLZ</strong>'s" x_stellig je nach Auswahl: 694;867;987;<br>

<input type="radio" name="mehrstellig" value="4" checked> 3stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="5"> 4stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="6"> 5stellige PLZ<br>

<b>WICHTIG !!! Trennzeichen ist ";" (Semikolon), auch hinter der letzten Nummer, ohne Wortzwischenraum !<br></b><br>

Eingabe-Format f&uuml;r <b>PLZ-Bereich:</b> 80 bis 90, 75-80 oder 81 - 85<br><br>
Trennzeichen w&auml;hlen:&nbsp;
 <select name="trennzeichen" tabindex="13"
 style=" width: 200px; height: 20px; font-color: #000000; font-size: 12px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
  <option selected value=";">Semikolon</option>
 <option value=",">Komma</option>
  <option value=" ">Wortzwischenraum</option>
  <option value=":">Doppelpunkt</option>
   </select>
   &nbsp;Standart: Semikolon

</td></tr>

</table>

<?php 

if ($_POST['adressen_selectieren'] == TRUE) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\">
<tr>
<td>E-Mail</td>
</tr>
";

include("adressen_select_2.php");

$such_adressen=mysqli_query($link,"$kriterium");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {
$zaehler++;


$bgcolor="";

$adressenresult.=$adressen_result['email'];
$adressenresult.=$_POST['trennzeichen'];
$adressenresult.="<br>";

$i++;
}
if ($zaehler == 0){
echo "<hr>Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler > 1){
echo "<hr>Es wurden <b>".$zaehler."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler == 1){
echo "<hr>Es wurde <b>".$zaehler."</b> Datensatz gefunden.<hr>";}
}


echo "<tr>

<td>$adressenresult<br></td>

</tr>";
 ?>
 
 
                 
 </table>
 
 </td>
 </tr>
 </table>                 
  </form>                
  </div>
  </body>
  </html>