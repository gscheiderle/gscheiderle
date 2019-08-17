<?php 
include("../intern/parameter.php"); 
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/css/schriften.css");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title><?php echo $seitenname ?></title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
        
    
    
  </head>
  <body <?php echo $bg_color; ?> leftmargin="20px" topmargin="40px">
  
  
  
<form method="POST" action="standart_seite.php">
<table width="800px" height="100%" border="0" bgcolor="<?php echo $table_farbe_1; ?>">
<tr><td align="left" valign="top">

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
$peicherort=$bild_ort['speicherort'];


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


</td>
</tr>
</table
</form>

  </body>
</html>