<?php 

include("../intern/mysql_connect_gscheiderle.php");
?>
<html>
<head>
<title>Dateien hochladen</title>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">

<style type="text/css">
#p1 { padding-left: 40px; background-color:#228B22; font-size:170%; }

</style>

</head>
<body background="../logos/hintergrund.gif" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
    
 <form  enctype="multipart/form-data" action="bilderladen.php"method="post">
     
<div align="center">
	<table border="0" width="802" id="table1" cellspacing="0" cellpadding="0" height="456" background="../logos/home_table_unten.jpg">
		<tr>
			<td valign="top">
 
<div align="center"><center>

  <table border="0" width="600" hight="" bgcolor="" cellpadding="0" cellspacing="0">
    <tr>
      <td bgcolor="" align="left" height="50" valign="middle"><br>
      <font face="Arial" size="5" color="#000000"><b>
      Bilder f&uumlr Ihre Tipps hochladen<br><br></td>
    </tr>
<?php  echo 
 "<tr>
    <td align='left'>
    <font style='font-family: arial; font-size: 2em; color: #000;'>Datei zum Upload ausw&auml;hlen:
    <input type='hidden' name='MAX_FILE_SIZE' value='8000000'>";
        
      
    echo "<input type='file' name='bilddatei'>";
?>        
     <br><br>
     </td>
  </tr>
<?php
$datum=date("Y-m-d H:i:s");
$int_datum=strtotime("$datum");
$_POST['bilddatei']=trim(strip_tags($_POST['bilddatei']));

if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}

$extlimit = "yes"; //Do you want to limit the extensions of files uploaded
$limitedext = array(".gif",".jpg",".png",".jpeg",".wbmp",
".GIF",".JPG",".PNG",".JPEG",".WBMP"); //Extensions you want files uploaded limited to.
$sizelimit = "yes"; //Do you want a size limit, yes or no?
$sizebytes = "8000000"; //size limit in bytes
$max_bild_groesse=$sizebytes/1000000;
if($_POST['senden'] == TRUE){


if (($sizelimit == "yes") && ($_FILES['bilddatei']['size'] > $sizebytes)) {
echo "<tr><td bgcolor=\"red\"><font size=\"4\" color=\"#FFFFFF\"><b>Die Datei ist zu gross, sie darf maximal <a href=\"bilderladen.php\">$max_bild_groesse MB</a> sein.</font></b></td></tr>";
exit;
}// ende if_sizelimit
$dir_endung = stristr($_FILES['bilddatei']['name'],'.'); // Suffix ermitteln
$direndungen = stristr($_FILES['bilddatei']['name'],'.'); // Suffix ermitteln, wird nicht mehr ver&auml;ndert f&uuml;r DB


//bildnamen für Vorschau zerlegen
$vorschau_name = strtok($_FILES['bilddatei']['name'],".");
//vorschaunamen erzeugen
$vorschau_endung=$dir_endung;
//Vorschau in jpg, gif und png wird automatisch angelegt
$datei_vorschau=$vorschau_name."_v".$vorschau_endung;
$datei_name=$_FILES['bilddatei']['name'];


if(!is_dir("../pictures"))
{mkdir("../pictures");}

if(!is_dir("../pictures/vorschau"))
{mkdir("../pictures/vorschau");}

$datei_speicher_ort="../pictures/$datei_name";
$vorschau_ort="../pictures/vorschau/$datei_vorschau";
$doppelkontrolle=0;
 
}//if($senden)
?>

  

  <tr>
  <td bgcolor="" align="left"><font face="Arial" size="4" color="#000000">
Bildbreite in px (Querformat Standart 400)&nbsp;&nbsp;&nbsp;<input type="text" name="web_breite"><br>
Bildh&ouml;he in px (Hochformat Standart 600)&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="web_hoehe">
    <br><br>
      
      
      		<?php $style="style='height:5em; width:40em; background-color: lightgreen;'"; 
		 $font_style="<font style='font-size: 2em; color: blue;'>";

		echo "<button type='submit' value='bild_speichern' name='senden' $style >$font_style BILD SPEICHERN</font></button><br>"; ?>
<br><br>
  </td>
</tr>
  

<?php  
$doppelkontrolle=0;             
if (($_POST['senden'] == TRUE) && ($extlimit == "yes") && (!in_array($dir_endung,$limitedext))) 
{$fileexists="<tr><td bgcolor=\"#C0C0C0\" colspan=\"4\"><font color=\"red\"><b>Die Bilddatei hat nicht die richtige Endung.<br></td></tr>";exit;}

//falls im images Ordner der Name der Bilddatei schon existiert, dann soll eine Fehlermeldung kommen.
elseif ((@file_exists("../pictures/$datei_name")) && ($_POST['senden'] == TRUE)) 
{echo "<tr><td bgcolor=\"yellow\" colspan=\"4\"><b><font style='color:red; font-size: 20px;'><b>Die Datei existiert bereit. Bitte &auml;ndern Sie den Dateinamen und versuchen es nochmal.<br>
Sie sehen diese Meldung - aber nicht das Bild?<br>
Da Sie nur Ihre eigenen Bilder sehen, hat jemand anderes exakt den gleichen Namen f&uuml;r ein Bild verwendet.</b></font><br></td></tr>";
$doppelkontrolle=1;
exit;}
 
//ansonsten wird die Datei im Ordner images kopiert
if ($doppelkontrolle == 0){ 

$uploaddir = "../pictures/";
$uploadfile = $uploaddir.$datei_name;

print "<pre>";
if (move_uploaded_file($_FILES['bilddatei']['tmp_name'], $uploadfile)) {
    print "<tr><td colspan=\"5\" align=\"center\"><b>
          <font face=\"Courier New\" color=\"#FFFFFF\" size=\"%\"><b><br>
              <p id=\"p1\">DAS BILD WAR 'OK' UND WURDE<BR>
              OHNE PROBLEME HOCHGELADEN !</p>
              </td></tr>";}
          
print "</pre>";
} // doppelkontroll
if ($_POST[senden] == TRUE){

////////////////////////////////////////////////////////////////////////////////////////////////
if(($dir_endung == ".jpg")||($dir_endung == ".JPG")){$dir_endung=".jpeg";}
$bild_endung=trim("$dir_endung",".");
$image_create_funktion="ImageCreateFrom".$bild_endung;

$image="Image".$bild_endung;

// Bild auf die gleiche Breite bringen
// neue Bild-Breite
$bg = $image_create_funktion("$uploadfile");
$img_width = imagesx($bg);
$img_height = imagesy($bg);

$width=400;
$height=600;

if($img_width > $img_height)
{
$height = ($width/$img_width) * $img_height; // Passende Höhe berechnen
}

if($img_height > $img_width)
{
$width = ($height/$img_height) * $img_width; // Passende Breite berechnen
}

if(($_POST['web_breite'] > 0) && ($_POST['web_breite'] != 400))
{
$width=$_POST['web_breite'];
$height=$img_height / ($img_width / $_POST['web_breite']);
}

if(($_POST['web_hoehe'] > 0) && ($_POST['web_hoehe'] != 600))
{
$height=$_POST['web_hoehe'];
$width=$img_width / ($img_height / $_POST['web_hoehe']);
}


$im = ImageCreateTrueColor($width,$height);  // Verkleinertes Bild erstellen

ImageAlphaBlending($im,false);
ImageCopyResampled($im, $bg, 0, 0, 0, 0, $width, $height, $img_width, $img_height);  // verkleinern

ImageDestroy($bg); // und das alte Bild aus dem Speicher entfernen
$image($im,"$uploadfile"); // neues Bild speichern.

///////////////////////////////////////////////////////////////////////////////////////////////////
$direndung=$dir_endung;
$vorschau_ort="../pictures/vorschau/$datei_vorschau";
// Vorschau von jpeg erzeugen und speichern


//////////////////////////////////////////////////////////////////////////////////////////////////
$width_p=$width;
$height_p=$height;
$width_rahmen.=$width+20;
$width_rahmen.="px";
$height_rahmen.=$height-30;
$height_rahmen.="px";

include("thumbnails.php");
} // ende if Post-senden             
           

$datei_speicher_ort="../pictures/$datei_name";

if ($_POST['senden'] == TRUE){ // if_1

if($_POST['titel_bild'] == '1'){
$loeschen_titel=mysqli_query($link,"update bildspeicher set
titelbild = '0' where titelbild = '1'");}
 
  $datei_doppel=mysqli_query($link,"select speicherort from bildspeicher where speicherort = '$datei_speicher_ort'");
  while($result_doppel=mysqli_fetch_array($datei_doppel, MYSQLI_BOTH )){
  if($result_doppel['speicherort'] != ""){
  echo "Die Datei ist schon vorhanden !";
  exit;}} 
    
    
    
  $sperren=mysqli_query($link,"LOCK TABLES bild_nummer write, bild_nummer as bild_nummer read");    
 
  $neuebildnr=mysqli_query($link,"select max(bild_nr)+1 as max_bild_nr from bild_nummer");
  while ( $neue_bildnr=mysqli_fetch_array($neuebildnr, MYSQLI_BOTH ) ) {
  $neue_bild_nr=$neue_bildnr['max_bild_nr']; 
      
  mysqli_query($link,"insert into bild_nummer (bild_nr) values ('$neue_bild_nr') ");
  mysqli_query($link,"UNLOCK TABLES");   
      
  }
  
$bild_groesse=$_FILES['bilddatei']['size'];
  
  $bild_speichern=mysqli_query($link,"insert into bildspeicher
  (
  bild_nr,
  datei_name,
  datei_suffix,
  datei_groesse,
  bild_breite,
  bild_hoehe,
  rahmen_breite,
  rahmen_hoehe,
  speicherort,
  vorschauort,
  bildbeschreibung,
  zeitstempel,
  titelbild,
  eigentuemer
  )
  values
  (
  '$neue_bild_nr',
  '$datei_name',
  '$direndungen',
  '$bild_groesse',
  '$width_p',
  '$height_p',
  '$width_rahmen',
  '$height_rahmen',
  '$datei_speicher_ort',
  '$vorschau_ort',
  '$_POST[bildbeschreibung]',
  '$int_datum',
  '$_POST[titel_bild]',
  '$_COOKIE[eigentuemer]'
  )
  ");

chmod("../pictures/$datei_name", 0740);
 
 $in_ordner="";
 $dir_endung="";
 $bilddatei="";
 $datei_speicher_ort="";
   
} // ende if_1
?>
    
    </td></tr>
  </table>
  </center>
</div>
</form>
</body>

</html>
