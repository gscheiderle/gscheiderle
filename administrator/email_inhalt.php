<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title> Inhalt zeitgesteuerter eMails</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
    
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
<tr><td colspan="4"><h2>eMail ID: <?php echo $_GET['futur_id']; ?> hat folgenden Inhalt:</h2></td></tr>

<tr><td colspan="7" valign="top"><hr><br></td></tr>
<?php

$select_thema=mysqli_query($link,"select * from email_texte where zufall_id = '$_GET[zufall_id]'");
while($result_thema=mysqli_fetch_array($select_thema, MYSQLI_BOTH )){
echo "<tr>
<td align=\"left\">Thema</td><td>
$result_thema[thema]</td></tr>
<tr><td align=\"left\">Stichwort:</td><td>
$result_thema[stichwort]</td></tr>
<tr><td align=\"left\">Absender:</td><td>
$result_thema[email_absender]</td></tr>
<tr><td align=\"left\">Betreff:</td><td>
$result_thema[betreff]</td></tr>
<tr><td align=\"left\">Kopfbild:</td><td>
$result_thema[kopfbild]</td></tr>
<tr><td align=\"left\">Anrede</td><td>
$result_thema[anrede]</td></tr>
<tr><td><br><br></td></tr>
<tr><td align=\"left\" valign=\"top\">Inhalt:</td><td>
$result_thema[text]</td>

</td>
</tr>
<tr><td colspan=\"2\"><br><br><a href=\"emailautoversand.php\">Zur&uuml;ck</a>

";
}

?>


   </t1>
  </td>
  
  </tr>
  
    
  </table>


 </form>

  </body>
</html>
