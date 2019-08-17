<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Standartseite bearbeiten</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	  
	  	<link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
    
<style type="text/css">
#frame_1 { position:absolute; top:300px; left:0px;
      z-index:0;}
      
 </style>
    
  </head>
  <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
	  
<?php 
	  
echo "<form method='POST' action='standartseite_bearbeiten.php'>";
	

include("../intern/parameter.php");
include("../intern/funktionen.php"); 
include("../intern/mysql_connect_gscheiderle.php");
?>	
	
<table width="800px" height="100%" border="0" bgcolor="#FFFFFF">
<tr><td align="left" valign="top">

<h1>Neue Seite anlegen:</h1>
<h2>Seitenname:&nbsp;&nbsp;<input type="text" size="36" name="seitenname" value="<?php echo $_POST['seitenname']; ?>">

<?php 
$seitenid=75;
echo "
<t1><br><br><a href=\"standart_seite.php?seitenid=$seitenid\" target=\"rechts\">testseite aufrufen</a></t1>";

echo "
<t2><br><br>Seitenname speichern:&nbsp;
<input type=\"submit\" name=\"name_speichern\" value=\"Seitenname speichern\">";

if ($_POST['name_speichern'] == TRUE){
   $result_1=mysqli_query($link,"select seitenname from seitenliste where seitenname = '$_POST[seitenname]'");
   while (@$result_name=mysqli_fetch_array($result_1, MYSQLI_BOTH )){
   $name=$result_name['seitenname'];}
   if ($name != "") {echo "<br><font size=\"4\">Dieser Name ist schon vorhanden !</font>";}
   } // ende if

if (($_POST['name_speichern'] == TRUE) && ($_POST['seiten_id'] == "") && ($name == ""))


{ // start 1. if
$name=mysqli_query($link,"insert into seitenliste
(
seitenname
)
values
(
'$_POST[seitenname]'
)
");
$seiten_id=mysql_insert_id();
echo "<br>Seite wurde mit der ID $seiten_id gespeichert !";
$_POST['name_speichern'] = FALSE;
} // ende 1. if


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


echo "
<input type=\"hidden\" name=\"seiten_id\" value=\"";echo neuladen($_POST['seiten_id'],$seiten_id);echo "\">";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<h2>&Uuml;berschrift:<br><br>
<textarea cols="80" rows="2" name="ueberschrift"><?php echo $_POST['ueberschrift']; ?></textarea>
<br>

<h2>Unter-&Uuml;berschrift:<br><br>
<textarea cols="80" rows="2" name="ueberschrift_2"><?php echo $_POST['ueberschrift_2']; ?></textarea>
<br><br>



<h2>Text eingeben:<br>
<t2><br>Alle Befehle in diese Zeichen < > setzen !<br>
"br" ist Zeilenende, "br" "br" Zeilenende mit Zeilenabstand.<br>
"i" ist <i>kursiv</i> und "b" ist <b>fett</b> und entsprechend < / > beenden<br>
Aufz&auml;hlung beginnen mit "ul" jede Zeile beginnen mit "li" und beenden mit "/li"<br>
Aufz&auml;hlung endet mit "/ul"<br><br></t2>
<textarea cols="80" rows="15" name="text"><?php echo $_POST['text']; ?></textarea>
<br><br>
<t2><br><br>&Uuml;berschriften und Seitentext speichern:&nbsp;
<input type="submit" name="text_speichern" value="Seitentext speichern">

<?php 
if ($_POST['text_speichern'] == TRUE) { // start 1. if

// feststellen, ob text schon gespeichert wurde
$select_id=mysqli_query($link,"select seiten_id from seitentext where seiten_id = '$_POST[seiten_id]' limit 1");
while($result_id=mysqli_fetch_array($select_id, MYSQLI_BOTH )){
$result_1=$result_id['seiten_id'];}

if ($result_1 == "") {

$text=mysqli_real_escape_string($link, $_POST['text']);

$name=mysqli_query($link,"insert into seitentext
(
seiten_id,
text,
ueberschrift,
ueberschrift_2
)
values
(
'$_POST[seiten_id]',
'$text',
'$_POST[ueberschrift]',
'$_POST[ueberschrift_2]'
)
");
$_POST['text_speichern'] = FALSE;
} // ende if result_1

else {mysqli_query($link,"update seitentext set
seiten_id='$_POST[seiten_id]',
text='$text',
ueberschrift='$_POST[ueberschrift]',
ueberschrift_2='$_POST[ueberschrift_2]'
where seiten_id = '$_POST[seiten_id]'");}

} // ende 1. if


?>


<h2>Bilder definieren:&nbsp;&nbsp;
<t2><br><br>Hier werden die Bilder f&uuml;r diese seite (max. 5) mittels ihrer ID definiert, die sie vorher in der Bildbearbeitung hochgeladen haben. In der Vorschau wird dann die ID (rot) angezeigt. Diese ID tragen Sie hier in der gew&uuml;nschten Reihenfolge ein. <br>
Sie platzieren die Bilder unten im Text mit den Variablen "$bild_1", "$bild_2" usw.<br>
Standartm&auml;ig werden die Bilder rechts platziert. Links ist zu markieren (Checkbox)!<br><br>
<table><tr><td>
<t2>Bild_1=ID:&nbsp;<input type="text" size="4" name="picture_1" value="<?php echo $_POST['picture_1']; ?>">&nbsp;
<input type="checkbox"  name="picture_li_1"></td><td>
<t2>Bild_2=ID:&nbsp;<input type="text" size="4" name="picture_2" value="<?php echo $_POST['picture_2']; ?>">&nbsp;
<input type="checkbox"  name="picture_li_2"></td><td>
<t2>Bild_3=ID:&nbsp;<input type="text" size="4" name="picture_3" value="<?php echo $_POST['picture_3']; ?>">&nbsp;
<input type="checkbox"  name="picture_li_3"></td></tr><tr><td>
<t2>Bild_4=ID:&nbsp;<input type="text" size="4" name="picture_4" value="<?php echo $_POST['picture_4']; ?>">&nbsp;
<input type="checkbox"  name="picture_li_4"></td><td>
<t2>Bild_5=ID:&nbsp;<input type="text" size="4" name="picture_5" value="<?php echo $_POST['picture_5']; ?>">&nbsp;
<input type="checkbox"  name="picture_li_5"></td><td></td>&nbsp;<td></tr></table>

<?php echo "
<t2><br><br>Bilder_ID's speichern:&nbsp;
<input type=\"submit\" name=\"bilder_speichern\" value=\"Bild-ID's speichern\">";

if ($_POST['bilder_speichern'] == TRUE){ // start 2. if


// feststellen, ob schon Bilder gespeichert wurde
$select_id_2=mysqli_query($link,"select seiten_id from seitenbilder where seiten_id = '$_POST[seiten_id]' limit 1");
while($result_id_2=mysqli_fetch_array($select_id_2, MYSQLI_BOTH )){
$result_2=$result_id_2['seiten_id'];}

if ($result_2 != "") {mysqli_query($link,"delete from seitenbilder where seiten_id = '$_POST[seiten_id]'");}

$ii=1;
for($i=5;$ii <= $i;$ii++){ 
$picture="picture_".$ii;
$picture_li="picture_li_".$ii;

if ($_POST[$picture] != "")
$name=mysqli_query($link,"insert into seitenbilder
(
seiten_id,
bild_id,
links
)
values
(
'$_POST[seiten_id]',
'$_POST[$picture]',
'$_POST[$picture_li]'
)
");
} // ende if Picture leer

} // ende for
$_POST['bilder_speichern'] = FALSE;

?>

</td>
</tr>
</table
</form>

  </body>
</html>