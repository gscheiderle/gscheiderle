<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Besucherzahlen</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body bgcolor="#B272A6">
<?php   
include("intern/mysql_connect_herz.php");
include("intern/css/schriften.css"); 
include("intern/funktionen.php"); 

$zaehler=mysqli_query($link,"select  distinct count(ip) as count_ip from herz_remote");
while ($ip_zaehlen = mysqli_fetch_array($zaehler, MYSQLI_BOTH )){
$ip_zaehler=$ip_zaehlen['count_ip'];}
?>

<div align="center">
<br><br><br><br>
<table width="700px" bgcolor="#FFF68F">
<tr><td align="center" colspan="2">Seit 11. Februar 2014 Uhr</td></tr>
<tr><td align="center"><h2>Besucher auf Petra Herz:</h2></td></tr>
<tr><td align="center"><h1><?php echo $ip_zaehler; ?></h1></td></tr>
</table>
    
  </body>
</html>