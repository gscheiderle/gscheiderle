<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title> Zeitgesteuerter eMail-Versand</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <META HTTP-EQUIV="REFRESH"  CONTENT="60;URL=http://www.petra-$uwesack.de/administrator/email_auto_versand.php">
    
    <style type="text/css">
h1 { font-size:20px; font-face:arial sans;}
</style>
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
  <table border="0">
<?php 
echo "<form action=\"email_auto_versand.php\" method=\"POST\">";

include("intern/mysql_connect_gscheiderle.php");
include("intern/css/schriften.css");

$aktuelle_zeit=time();

/* 
$select_kd=mysqli_query($link,"select distinct kd_nr from rechnungsnummer ");
while ( $select_result = mysqli_fetch_array ( $select_kd, MYSQLI_BOTH ) ) {

$select_summe=mysqli_query($link," select sum(brutto_betrag) as re_summe from rechnungen where kd_nr = '$select_result[kd_nr]' ");
while ( $result_summe = mysqli_fetch_array($select_summe, MYSQLI_BOTH ) ) {
$re_summe=$result_summe['re_summe'];
}

$count=mysqli_query($link," select count(kd_nr) as kdnr, kd_nr from rechnungsnummer where kd_nr = '$select_result[kd_nr]'" );
while ( $result=mysqli_fetch_array($count, MYSQLI_BOTH ) ) {
echo "<tr><td>".$result['kd_nr']."</td><td>".$result['kdnr']."</td><td>".$re_summe."</td></tr>";
}
} */



$select_kd=mysqli_query($link,"select kd_nr from adressen where new = 'Ja' ");
while ( $select_result = mysqli_fetch_array ( $select_kd, MYSQLI_BOTH ) ) {

$select_summe=mysqli_query($link," select sum(brutto_betrag) as re_summe from rechnungen where kd_nr = '$select_result[kd_nr]' ");
while ( $result_summe = mysqli_fetch_array($select_summe, MYSQLI_BOTH ) ) {
$re_summe=$result_summe['re_summe'];
}

$count=mysqli_query($link," select count(kd_nr) as kdnr, kd_nr from rechnungsnummer where kd_nr = '$select_result[kd_nr]'" );
while ( $result=mysqli_fetch_array($count, MYSQLI_BOTH ) ) {
echo "<tr><td>".$result['kd_nr']."</td><td>".$result['kdnr']."</td><td>".$re_summe."</td></tr>";
}
}
?>
  
</table>


 </form>

  </body>
</html>
