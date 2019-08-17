<?php 
    session_start(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title> Zeitgesteuerter eMail-Versand</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <META HTTP-EQUIV="REFRESH"  CONTENT="600;URL=http://www.petra-$uwesack.de/administrator/email_auto_versand.php">
    
    <style type="text/css">
h1 { font-size:20px; font-face:arial sans;}
</style>
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<?php 
echo "<form action=\"emailautoversand.php\" method=\"POST\">";

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


<tr><td><h2><table width="100%" border="0">
<tr><td colspan="4"><h2>Folgende eMails stehen zum Versand an:</h2></td></tr>
<tr>
<td><h2>eMail-ID</h2></td>
<td><h2>am</h2></td>
<td><h2>Thema</h2></td>
<td><h2>eMail-Betreff</h2></td>
<td><h2>eMail-Absender</h2></td>
<td><h2>eMail-Inhalt</h2></td>
<td><h2>Empf&auml;nger</h2></td>
</tr>
<tr><td colspan="7" valign="top"><hr></td></tr>
<?php

$z1=1;

$pruefe_anzahl=mysqli_query($link,"select futur_id, zufall_id, sende_termin_klar from emails_future where versandt < '1' order by sende_termin desc");
while($result_pruefe_anzahl=mysqli_fetch_array($pruefe_anzahl, MYSQLI_BOTH )) {
$id_loeschen.="<option value=\"$result_pruefe_anzahl[zufall_id]\">$result_pruefe_anzahl[futur_id]</option>";

$select_thema=mysqli_query($link,"select thema, betreff, email_absender, zufall_id from email_texte where zufall_id = '$result_pruefe_anzahl[zufall_id]'");
while($result_thema=mysqli_fetch_array($select_thema, MYSQLI_BOTH )){

if ($z1 % 2 == 0 ) {$bgcolor="bgcolor=\"#e9e9e9\"";}
else {$bgcolor="bgcolor=\"#FFFFFF\"";}

echo "<tr>
<td $bgcolor><t2>$result_pruefe_anzahl[futur_id]</h2></td>
<td $bgcolor><t2>$result_pruefe_anzahl[sende_termin_klar]</h2></td>
<td $bgcolor><t2>$result_thema[thema]</h2></td>
<td $bgcolor><t2>$result_thema[betreff]</h2></td>
<td $bgcolor><t2>$result_thema[email_absender]</h2></td>
<td $bgcolor><t2><a href=\"email_inhalt.php?zufall_id=$result_thema[zufall_id]&futur_id=$result_pruefe_anzahl[futur_id] \" target=\"_self\">Inhalt Mail</a></h2></td>
<td $bgcolor><t2><a href=\"email_empfaenger.php?zufall_id=$result_thema[zufall_id]&futur_id=$result_pruefe_anzahl[futur_id]\" target=\"_self\">Empf&auml;nger</a></h2></td>
</tr>";
$z1++;
}
}

?>

<tr><td colspan="2">
<select name="emails_loeschen"
style=" width: 240px; height: 30px; color: #000000; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;">
<option selected>ID zum L&ouml;schen w&auml;hlen</option>
<?php echo $id_loeschen; ?>
</select> &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="loeschen" value="eMail loeschen" 
                  style=" width: 200px; height: 30px; color: #FFFFFF; font-size: 18px; font-weight: 700; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;"><br>

<?php 
if($_POST['loeschen'] == TRUE) {
mysqli_query($link,"delete from emails_future where zufall_id = '$_POST[emails_loeschen]'");
mysqli_query($link,"delete from email_texte where zufall_id = '$_POST[emails_loeschen]'");
mysqli_query($link,"delete from geplante_emails where zufall_id = '$_POST[emails_loeschen]'");
}
 ?>
</td> 
 <td colspan="5">
<h21><br>
Diese Seite dient <b>nur</b> zur &Uuml;berpr&uuml;fung der zum Versand anstehenden eMails.<br>
Die Seite leitet nach 10 Minuten auf die eigentliche Versand-Seite um.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oder&nbsp;<a href="email_auto_versand.php">JETZT HIER SOFORT</a>
</h21>
   </t1>
  </td>
 </tr>
  
<td colspan="7" align="center">
<h21><br><br>
      <a href="email_versand.php"><input type="button" value="Zur&uuml;ck E-Mail gestalten"  tabindex="11"
                  style=" width: 270px; height: 50px; font-color: #000000; font-size: 24px; background-color: yellow;  border: 0px; border-radius: 5px 5px 5px 5px;"></a>
</h21>
   </t1>
  </td>
</tr>
  
    
  </table>


 </form>

  </body>
</html>
