<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>$uwesack Termin-Details</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="css/main.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)" href="css/main_600.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)" href="css/termin_details.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)" href="css/termin_details_600.css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>

  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
  
<?php  
include("intern/mysql_connect_gscheiderle.php");
?>
 

 
  
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->

<?php echo "<form action='termin_details.php?termin_id=$_GET[termin_id]&zurueck=zurueck' method='POST'>";  ?>
  
<?php include("intern/kopf.php"); ?>
 
 <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //--> 

 <div id="wrapper"  
<div id="inhalt">
<?php  

$jetztzeit=date("Y-m-d");
$abfrage="where termin_id = '$_GET[termin_id]'";
if($_GET['total'] == "YES"){$abfrage="where termin_von >= '$jetztzeit'";}

$select_termine=mysqli_query($link,"select * from termine $abfrage order by termin_von"); 
while($result_termine = mysqli_fetch_array($select_termine, MYSQLI_BOTH )){

$fruehpreis=$result_termine['fruehbuch_preis'];
$regularpreis=$result_termine['regular_preis'];
$eintagespreis=$result_termine['eintages_preis'];
$link_eintagespreis=$result_termine['link_eintagespreis'];
$halbtagespreis=$result_termine['halbtages_preis'];
$link_halbtagespreis=$result_termine['link_halbtagespreis'];

// datum auf deutsches format bringen
$datum_von.=substr($result_termine[termin_von],8,2).".";
$datum_von.=substr($result_termine[termin_von],5,2).".";
//$datum_von.=substr($result_termine[termin_von],0,4);

// datum auf deutsches format bringen
$datum_bis.=substr($result_termine[termin_bis],8,2).".";
$datum_bis.=substr($result_termine[termin_bis],5,2).".";
$datum_bis.=substr($result_termine[termin_bis],0,4);

// fruehbuch_datum auf deutsches format bringen
$fruehbuch_datum.=substr($result_termine[fruehbuch_datum],8,2).".";
$fruehbuch_datum.=substr($result_termine[fruehbuch_datum],5,2).".";
$fruehbuch_datum.=substr($result_termine[fruehbuch_datum],0,4);

$fruehbuch_datum_int=strtotime("$fruehbuch_datum");

if($result_termine['termin_von'] == $result_termine['termin_bis']) {$datum=$datum_bis."<br>";}
if($result_termine['termin_von'] < $result_termine['termin_bis']) {$datum=$datum_von."&nbsp;&nbsp;-&nbsp;&nbsp;".$datum_bis."<br>";}
if($result_termine['wo'] == "radio"){$datum=$datum_bis."&nbsp;&nbsp;$farbe_wo<b>Radio Lotusbl&uuml;te</b> <img src=\"images_system/lotus_g.png\"></font>";}
if($result_termine['wo'] == "btg"){$datum=$datum_bis."&nbsp;&nbsp;$farbe_wo<b>Blessing to go</b> <img src=\"images_system/kaffee.png\"></font>";}
if($result_termine['wo'] == "da_ai"){$datum=$datum_bis."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"images_system/da_ai.png\"></font>";}
if($result_termine['wo'] == "buchhandlung"){$datum=$datum_bis."&nbsp;&nbsp;$farbe_wo<b>Buchhandlung</b>&nbsp;<img src=\"images_system/buch.png\"></font>";}
if($result_termine['wo'] == "lundk"){$datum=$datum_bis."&nbsp;&nbsp;$farbe_wo<b>Live & Kostenlos</b>&nbsp;<img src=\"images_system/luk.png\"></font>";}
if($result_termine['wo'] == "pay"){$datum=$datum_bis."&nbsp;&nbsp;$farbe_wo<b>Live</b>&nbsp;<img src=\"images_system/kugel.png\"></font>";}
if($result_termine['wo'] == "lph"){$datum=$datum_bis."&nbsp;&nbsp;$farbe_wo<b>Love, Peace & Harmony</b>&nbsp;<img src=\"images_system/lph_klein.png\"></font>";}
if($result_termine['wo'] == "aktionsbild"){$datum=$datum_bis."&nbsp;&nbsp;<img src=\"$result_termine[aktionsbild]\"></font>";}



echo "
<h11a>
<p>&nbsp;</p>
$datum</h11a>
<br>

<h11a><font color=\"#990066\"><b>$result_termine[thema]</b></h11a>";




echo "<font color=\"#000000\">
$result_termine[details]<br><br>";

$preisausblenden=$result_termine['preis_ausblenden'];



if ( $preisausblenden == 1 ) {

echo "Den Zugangscode f&uuml;r den Bezahl-Vorgang erhalten Sie nach R&uuml;cksprache mit Master $uwesack.<br>
Wenn schon vorhanden, in das Textfeld eintragen und best&auml;tigen.<br>
Unten erscheint dann der gewohnte Link.<br><br>
<input type='text' name='preis_freischalten' size='25' value='$_POST[preis_freischalten]'>&nbsp;&nbsp;<input type='submit' name='freischalten' value='Code best&auml;tigen'>
<br><br>
";
}  // ende if preis_ausblenden 1

if ( $_POST['preis_freischalten'] == $result_termine['zugangs_code'] ) { $preisausblenden=0; }

if ( $preisausblenden == 0 ) {


if ( ( $fruehbuch_datum_int+86400 >= time() ) && ( $fruehpreis > 1 ) ) {
echo
"Anmeldung f&uuml;r Fr&uuml;hbucher <a href=http://www.petra-$uwesack.de/veranstaltungen_buchen/index.php?termin_id=$_GET[termin_id]&pdwzrq=3246134>hier</a>
<br>
";}

if ( $regularpreis > 1 ) {
echo
"Anmeldung regul&auml;rer Beitrag: <a href=http://www.petra-$uwesack.de/veranstaltungen_buchen/index.php?termin_id=$_GET[termin_id]&pdwzrq=9324969>hier</a>
<br>
";}

if ( $eintagespreis > 1 ) {
echo
$link_eintagespreis." <a href=http://www.petra-$uwesack.de/veranstaltungen_buchen/index.php?termin_id=$_GET[termin_id]&pdwzrq=65235471>hier</a>
<br>
";}

if ( $halbtagespreis > 1 ) {
echo
$link_halbtagespreis." <a href=http://www.petra-$uwesack.de/veranstaltungen_buchen/index.php?termin_id=$_GET[termin_id]&pdwzrq=98735471>hier</a>
<br>
";}

} // ende if preis_ausblenden 0



echo "
<br>
<t1><a href=\"termin_uebersicht.php?seiten_index=$seitenindex&total=YES\" style=\"text-decoration: none;\"><font style=\" margin-top: 3px; width:100px; height:24px; background-color:#990066;border-width:0;font-size: 18px;color:#FFFFFF;border-radius: 3px 3px 3px 3px;\">&nbsp;&nbsp;Zur&uuml;ck&nbsp;&nbsp;</a><br><br><br></t5></t1>";
$datum="";
$datum_von="";
$datum_bis="";
}



?>







</div> 
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  //--> 

<?php include("intern/footer.php"); ?>

 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->

</div>

  </body>
</html>