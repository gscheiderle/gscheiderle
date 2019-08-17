<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Petra Herz</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
        <style type="text/css">
  body {
    background: #FFFFFF;
  }
  </head>
  <body link="#000000" vlink="#000000" alink="000000">
  
<?php  
include("intern/parameter.php");
/* include("intern/css/span.php"); */
include("intern/css/boxen.css"); 
include("intern/css/schriften.css"); 
/* include("intern/css/schriften.php"); */

include("intern/mysql_connect_herz.php");
?>
  

  
  <div align="center">
  
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->

  
<?php include("intern/kopf.php"); ?>
 
 <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //--> 
 
  
<table width="1220px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
 <tr>
 <td bgcolor="#FFFFFF" colspan="3" height="5px" align="center"  valign="TOP">
 </td>
</tr>
<?php 
// nur f&uuml;r die Filmvorschau
$heidth="height=\"500px\"";
if($_GET['seitenid'] == 27){$height="height=\"820px\"";}

$width="width=\"900px\"";
if($_GET['seitenid'] == 11){$width="width=\"500px\"";}

 ?>
 <tr>
 <td bgcolor=<?php echo $feldfarbe; ?> colspan="3" height="500px" align="center"  valign="TOP">

 <table width="1220px" height="500px" cellpadding="0" cellspacing="0"  border="0"  bgcolor="#FFFFFF" >
 <tr><td align="center"  width="1050px" height="50px" valign="top" bgcolor="">
<!-- mittleres, grosses Feld mit Inhalt fuellen //-->
<br><br>
  <table  <?php echo $width; echo $height; ?> cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +1;
       border: 0px  solid #4A4A4A;
       border-radius: 0px 0px 0px 0px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
 <tr><td valign="top" colspan="2" height="10%">

<?php 
// beim ersten seitenaufruf 
if($_GET['seitenid'] == "") {$_GET['seitenid']=78;}

$text=mysqli_query($link,"select * from seitentext where seiten_id = '$_GET[seitenid]'");
while ($seitentext = mysqli_fetch_array($text, MYSQLI_BOTH )){
$headline=$seitentext['ueberschrift'];
$headline_2=$seitentext['ueberschrift_2'];
$fliesstext=$seitentext['text'];}

$xx=1;
$bilder=mysqli_query($link,"select * from seitenbilder where seiten_id = '$_GET[seitenid]'");
while ($seitenbild = mysqli_fetch_array($bilder, MYSQLI_BOTH )){
$bild_plac=$seitenbild['links'];

$float="right";
if ($bild_plac == "li") {$float = "left";}
if ($bild_plac == "ob") {$float = "test";}


$bild_db=mysqli_query($link,"select bild_breite, bild_hoehe, rahmen_breite, rahmen_hoehe, speicherort from bildspeicher
where logo_id = '$seitenbild[bild_id]'");
while($bild_ort=mysqli_fetch_array($bild_db, MYSQLI_BOTH )){
$bildbreite=$bild_ort['bild_breite'];
$bildhoehe=$bild_ort['bild_hoehe'];
$rahmenbreite=$bild_ort['rahmen_breite'];
$rahmenhoehe=$bild_ort['rahmen_hoehe'];
$peicherort="administrator/$bild_ort[speicherort]";


$bild="<h1 style= \"margin-top:0px; margin-left:0px; width:$rahmenbreite; height:$rahmenhoehe; float:$float; text-align:$float\">
<img border=\"0\" src=\"$peicherort\" width=\"$bildbreite\" height=\"$bildhoehe\">
</h1>";



}
if ($xx == 1) {$bild_1 = $bild;}
if ($xx == 2) {$bild_2 = $bild;}
if ($xx == 3) {$bild_3 = $bild;}
if ($xx == 4) {$bild_4 = $bild;}
if ($xx == 5) {$bild_5 = $bild;}
$xx++;
}



$search  = array('$bild_1', '$bild_2', '$bild_3', '$bild_4', '$bild_5');
$replace = array($bild_1, $bild_2, $bild_3, $bild_4, $bild_5);
$subject = '$fliesstext';



echo  "<h1>$headline</h1>"; 
echo  "<h2>$headline_2</h2><br>"; 

$text=str_replace($search, $replace, $fliesstext);
echo  "<t1>$text</t1>";

 ?>
  </t1>
  </td>
  
  </tr>
  
    
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

<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  //--> 

<?php include("intern/fuss.php"); ?>

 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->
 

  </body>
</html>