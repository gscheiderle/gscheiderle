<?php 
    session_start(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Empf&auml;nger zeitgesteuerter eMails</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
    
    <style type="text/css">
h1 { font-size:20px; font-face:arial sans;}
</style>
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<?php 
echo "<form action=\"email_empfaenger.php?zufall_id=$_GET[zufall_id]&futur_id=$_GET[futur_id]\" method=\"POST\">";

include("../intern/mysql_connect_gscheiderle.php");
include("../intern/css/schriften.css");

$aktuelle_zeit=time();


?>
  




<table width="1200px" height="0px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
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

<tr><td><h2><table width="600px" border="0">
<tr><td colspan="4"><h2>eMail, ID: <?php echo $_GET['futur_id']; ?>, hat folgende Empf&auml;nger:</h2></td></tr>

<tr><td colspan="7" valign="top"><hr><br></td></tr>
<tr><td>
<?php
$i=1;

$select_kdnr=mysqli_query($link,"select e_id, kd_nr from geplante_emails where zufall_id = '$_GET[zufall_id]'");
while($result_kdnr=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH )){
$mail_select=mysqli_query($link," select email from adressen where kd_nr = '$result_kdnr[kd_nr]' " );
while( $mail_result=mysqli_fetch_array($mail_select, MYSQLI_BOTH )) {
$email_id.="<option value=\"$result_kdnr[e_id]\">$result_kdnr[e_id]</option>";
echo "
$i&nbsp;&nbsp;&nbsp;$result_kdnr[e_id]&nbsp;&nbsp;-&nbsp;&nbsp;$mail_result[email]<br>";
$i++;
}
}
echo "</td>
</tr>

<tr><td><br>
<select name=\"geplante_email_loeschen\"
style=\" width: 240px; height: 30px; font-color: #000000; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;\">
<option selected> eMail-Adressen-ID w&auml;hlen</option>
$email_id
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"submit\" name=\"geplanteemailloeschen\" value=\"geplante eMail loeschen\"
style=\" width: 240px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
</td></tr>

<tr><td><br><br><a href=\"emailautoversand.php\">Zur&uuml;ck</a>

";

if ( $_POST['geplanteemailloeschen'] == TRUE ) {
mysqli_query($link,"delete from geplante_emails where e_id = '$_POST[geplante_email_loeschen]' " ) ; }

?>


   </t1>
  </td>
  
  </tr>
  
    
  </table>


 </form>

  </body>
</html>
