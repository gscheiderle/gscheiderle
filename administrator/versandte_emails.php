<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>eMail selectieren</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body link="#000000" vlink="#000000" alink="#000000" bgcolor="#c1c1c1">
  
   
  
  
<form action="<?php echo "versandte_emails.php"; ?>" method="POST">
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
 <table width="700px" height="0px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
 <tr><td valign="top" height="10%" align="center">
<font size="5"> <b>
eMails wurden versandt am/an:<br><br>
<input type="submit" value="Seite aktualisieren" name="aktualisieren" tabindex="15"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
  </b></font>
  </td>
  </tr>

 <tr><td valign="top" height="10%"  align="center">
 
<table><tr>


<?php 



$suche_versand=mysqli_query($link,"select distinct datum, stichwort, zufall_id from versandte_emails order by datum desc");
while($finde_versand=mysqli_fetch_array($suche_versand, MYSQLI_BOTH )) {
$versand_termine.="<option value=\"$finde_versand[zufall_id]\">$finde_versand[stichwort] versandt am $finde_versand[datum]</option>";
}
 ?>


<td>
 <select name="liste" tabindex="14"
 style=" width: 300px; height: 30px; font-color: #000000; font-size: 18px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
 <option selected>w&auml;hle Versand-Termin:</option>
 <?php echo $versand_termine; ?>
 </select>
</td>

<td>
<input type="submit" value="listen" name="listen" tabindex="15"
 style=" width: 150px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>

<td>
<input type="submit" value="f&uuml;r erneuten Versand" name="versenden" tabindex="15"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>

</tr>


<tr><td colspan="4" align="center">

</td></tr>

</table>

<?php 

if ($_POST['versenden'] == TRUE) {

mysqli_query($link,"drop table if exists $temp_tab_name");

mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
kd_nr int(6),
geschlecht (varchar(64),
vorname varchar(64),
email varchar(64),
nachfassen varchar(255)
)
");
echo mysql_error();

$zaehler=0;

$such_adressen=mysqli_query($link,"select kd_nr, stichwort from versandte_emails where zufall_id = '$_POST[liste]'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) { // while 1


$select_empfaenger=mysqli_query($link,"select kd_nr, vorname, geschlecht, email from adressen where kd_nr = '$adressen_result[kd_nr]'");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){ // while 2

$nachgefasst=$adressen_result['stichwort']."-".$datum;

mysqli_query($link,"insert into $temp_tab_name
(
kd_nr,
geschlecht,
vorname,
email,
nachfassen
)
values
(
'$result_empfaenger[kd_nr]',
'$result_empfaenger[geschlecht]',
'$result_empfaenger[vorname]',
'$result_empfaenger[email]',
'$nachgefasst'
)
");
echo mysql_error();
} // ende while 2
echo mysql_error();
} // ende while 1
echo mysql_error();
} // ende if



if ($_POST['listen'] == TRUE) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\">

<tr><td><b>KD-NR</td><td><b>Name</td><td><b>Vorname</td><td><b>eMail</td></tr>
<tr><td colspan=\"4\"><hr /></td></tr>
";


$zaehler=0;

$such_adressen=mysqli_query($link,"select kd_nr from versandte_emails where zufall_id = '$_POST[liste]'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {

$select_empfaenger=mysqli_query($link,"select kd_nr, name, vorname, geschlecht, email from adressen where kd_nr = '$adressen_result[kd_nr]'");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){
echo "<tr><td>$result_empfaenger[kd_nr]</td><td>$result_empfaenger[name]</td><td>$result_empfaenger[vorname]</td><td>$result_empfaenger[email]</td><td>$result_empfaenger[geschlecht]</td></tr>";
}

$zaehler++;
}
if ($zaehler == 0){
echo "Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler > 1){
echo "Es wurden <b>".$zaehler."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler == 1){
echo "Es wurde <b>".$zaehler."</b> Datensatz gefunden.<hr>";}
}
 ?>
 
</table>
 
 </td>
 </tr>
 </table>                 
  </form>                
  </div>
  </body>
  </html>