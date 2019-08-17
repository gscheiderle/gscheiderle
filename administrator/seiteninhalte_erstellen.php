<?php 
include("../intern/parameter.php");
include("../intern/funktionen.php"); 
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/css/schriften.css");



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Standartseite bearbeiten</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
    
<style type="text/css">
#frame_1 { position:absolute; top:300px; left:0px;
      z-index:0;}
       </style>
       
<style type="text/css">
#p1 { padding-top: 3px; padding-left: 40px; background-color:yellow; font-size:170%; }

</style>
    
  </head>
  <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
<form method="POST" action="seiteninhalte_erstellen.php">
<table width="800px" height="100%" border="0" bgcolor="#FFFFFF">
<tr><td align="left" valign="top">
<?php echo "<p id=\"p1\">
<t2><b><br>1. Schritt: Bevor Sie eine neue Seite anlegen, diese Seite immer <a href=\"seiteninhalte_erstellen.php\">hier neu laden</a> !!!</b></t2><br></p>"; ?>
<h1>Neue Seite anlegen:</h1>

<?php echo "<p id=\"p1\">
<t2><b><br>2. Schritt: Seitenname und Rubrik w&auml;hlen und gleich speichern. <br>Alles andere kommt danach, u.U. mit \"Seiteninhalte korrigieren\" !</b></t2><br></p>"; ?>
<h2>Seitenname:&nbsp;&nbsp;<input type="text" size="36" name="seitenname" value="<?php echo $_POST['seitenname']; ?>">
<br><br>
Rubrik:&nbsp;&nbsp;<select name="rubrik">
<option value="" selected>Rubrik w&auml;hlen</option>
<option value="seelenelixier">Seelen-Elixier</option>
<option value="miracles">Soul-Healing-Miracles-Buch</option>
<option value="allgemein">Allgemein</option>
</select>
<?php 



echo "
<t2>&nbsp;&nbsp;&nbsp;
<input type=\"submit\" name=\"name_speichern\" value=\"Seitenname + Rubrik speichern\" style=\" margin-top: 3px; width:250px; height:40px; background-color:#A2C257;border-width:0;font-size: 16px;color:#000000;border-radius: 10px 10px 10px 10px;\">";

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
seitenname,
rubrik
)
values
(
'$_POST[seitenname]',
'$_POST[rubrik]'
)
");
$seiten_id=mysql_insert_id();
echo "<br>Seite wurde mit der ID $seiten_id gespeichert !<br>
Weiter geht's mit <a href=\"standartseite_korrigieren.html\">Seiten-Inhalte erstellen/ver&auml;ndern</a>";

// seiten_text anlegen
mysqli_query($link,"insert into seiten_text (seiten_id) value ('$seiten_id')";

$_POST['name_speichern'] = FALSE;
} // ende 1. if


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


echo "
<input type=\"hidden\" name=\"seiten_id\" value=\"";echo neuladen($_POST['seiten_id'],$seiten_id);echo "\">";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



<h2>&Uuml;berschrift:<br>
<textarea cols="70" rows="2" name="ueberschrift"><?php echo $_POST['ueberschrift']; ?></textarea>
<br>

<h2>Unter-&Uuml;berschrift:<br>
<textarea cols="70" rows="2" name="ueberschrift_2"><?php echo $_POST['ueberschrift_2']; ?></textarea>
<br>



<h2>Text eingeben:<br>
<t2>Alle Befehle in diese Zeichen < > setzen !<br>
"br" ist Zeilenende, "br" "br" Zeilenende mit Zeilenabstand.<br>
"i" ist <i>kursiv</i> und "b" ist <b>fett</b> und entsprechend < / > beenden<br>
Aufz&auml;hlung beginnen mit "ul" jede Zeile beginnen mit "li" und beenden mit "/li"<br>
Aufz&auml;hlung endet mit "/ul"<br><br></t2>
<textarea cols="100" rows="15" name="text"><?php echo $_POST['text']; ?></textarea>
<t2><br><br>&Uuml;berschriften und Seitentext speichern:&nbsp;
<input type="submit" name="text_speichern" value="Seitentext speichern"><br>

<?php 
if ($_POST['text_speichern'] == TRUE) { // start 1. if
    
$text = mysqli_real_escape_string($link, $_POST['text']);   
// $text=mysqli_real_escape_string($link, $_POST['text']);

// feststellen, ob text schon gespeichert wurde
$select_id=mysqli_query($link,"select seiten_id from seitentext where seiten_id = '$_POST[seiten_id]' limit 1");
while($result_id=mysqli_fetch_array($select_id, MYSQLI_BOTH )){
$result_1=$result_id['seiten_id'];}

if ($result_1 == "") {

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
} // ende if result_1
} // ende 1. if


?>


<h2>Bilder definieren:&nbsp;&nbsp;
<t2><br><br>Hier werden die Bilder f&uuml;r diese Seite (max. 5) mittels ihrer ID definiert, die sie vorher in der Bildbearbeitung hochgeladen haben. In der Vorschau wird die ID (rot) angezeigt. Diese ID tragen Sie hier in der gew&uuml;nschten Reihenfolge ein. <br>
Sie platzieren die Bilder im Text mit den Variablen "$bild_1", "$bild_2" usw.<br>
Standartm&auml;ig werden die Bilder rechts im Text platziert. Links bzw &uuml;ber dem Text ist zu markieren (Checkbox)!<br><br>
<table><tr>
<td>Bild-ID</td><td>Bild links im Text&nbsp;&nbsp;&nbsp;</td><td>Bild ohne Text-Umflie&szlig;en</td>
<tr>
<td>
<t2>Bild_1=ID:&nbsp;<input type="text" size="4" value="<?php echo $_POST['picture_1']; ?>">&nbsp;
</td><td><input type="radio"  name="picture_1" value="li"></td><td><input type="radio"  name="picture_1"  value="ob"></td>
</tr>
<tr>
<td>
<t2>Bild_2=ID:&nbsp;<input type="text" size="4" value="<?php echo $_POST['picture_2']; ?>">&nbsp;
</td><td><input type="radio"  name="picture_2"  value="li"></td><td><input type="radio"  name="picture_2"  value="ob"></td>
</tr>
<tr>
<td>
<t2>Bild_3=ID:&nbsp;<input type="text" size="4" value="<?php echo $_POST['picture_3']; ?>">&nbsp;
</td><td><input type="radio"  name="picture_3"  value="li"></td><td><input type="radio"  name="picture_3"  value="ob"></td>
</tr>
<tr>
<td>
<t2>Bild_4=ID:&nbsp;<input type="text" size="4" value="<?php echo $_POST['picture_4']; ?>">&nbsp;
</td><td><input type="radio"  name="picture_4"  value="li"></td><td><input type="radio"  name="picture_4"  value="ob"></td>
</tr>
<tr>
<td>
<t2>Bild_5=ID:&nbsp;<input type="text" size="4" value="<?php echo $_POST['picture_5']; ?>">&nbsp;
</td><td><input type="radio"  name="picture_5"  value="li"></td><td><input type="radio"  name="picture_5"  value="ob"></td>
</tr>
</table>

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
$picture_platz="picture_".$ii;

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
'$_POST[$picture_platz]'
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