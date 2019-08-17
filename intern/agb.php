<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>AGB Tao Source Healing Services for South of Germany</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
        <style type="text/css">
  body {
    background: #FFFFFF;
  }
  </style>
  </head>
  <body link="#000000" vlink="#000000" alink="000000">
  
<?php  
include("parameter.php"); 
include("css/schriften.css"); 
include("mysql_connect_herz.php");

$text=mysqli_query($link,"select * from seitentext where seiten_id = '$_GET[seitenid]'");
while ($seitentext = mysqli_fetch_array($text, MYSQLI_BOTH )){
$headline=$seitentext['ueberschrift'];
$headline_2=$seitentext['ueberschrift_2'];
$fliesstext=$seitentext['text'];
}

echo  "$headline<br>"; 
echo  "$headline_2<br>"; 

echo  "$fliesstext";

 ?>



  </body>
</html>