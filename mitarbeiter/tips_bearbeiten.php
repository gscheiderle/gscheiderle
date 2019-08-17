<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>gscheide Tips bearbeiten</title>
	  
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
        <script src="../ckeditor/ckeditor.js"></script>
	  
	    <script src="../ckeditor/samples/sample.js"></script>

    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
	  
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
	  
	  	<link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    
  </head>
  <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
	  
  
 <?php 
include("../intern/mysql_connect_gscheiderle.php");	  
include("../intern/parameter.php");
include("../intern/funktionen.php"); 
?>
  
    
<?php 
	  echo "<form  action='tips_bearbeiten.php?tip_id=$_POST[tipid]' method='POST' > "; 
?>
	  
	  
<table width="800px" height="100%" border="0" bgcolor="#FFFFFF">
<tr>
<td align="left" valign="top">

<table cellpadding="5px" cellspacing="0px"><br>
	
	
<?php 


if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}

echo "<h2><font style=' color: #000; background: yellow;'>Vor dem Wechsel zu einem anderen Job, 
diese Seite <a href='tips_bearbeiten.php'>neu laden</a></font><br></h2>";


echo "
<div class='button'>
<button type='submit' name='tip_zeigen' value='tip_zeigen'>Vorhandene Tips zeigen</butto>
</div>";
	
	
if ( ( $_POST['tip_zeigen'] == "tip_zeigen" )  && ( $_POST[tipid] > 0 ) ) { 	
	
	echo "<tr><td colspan='4'><h2>Sie m&uuml;ssen zuerste die Seite neu laden !</h2></td></tr>";
	exit();
}
	
	

if ( $_POST['tip_zeigen'] == "tip_zeigen" ) { 
	
echo "
<tr>
<td colspan='4'><br>
<div class='button'>
<button type='submit' name='tip_laden' value='tip_laden'>ausgew&auml;hlten TIP laden</button>
</div><br>
</td>
</tr>

<tr>
<td>
Auswahl</td><td>T I P</td><td>Rubrik</td><td>TIP-ID
</td>
</tr>
";


$style="style=' border: 1px solid #000000;
border-left-color: #FFFFFF; border-right-color: #FFFFFF; border-top-color: #000000; border-bottom-color: #FFFFFF;'";





$seitenliste=mysqli_query($link,"select * from die_tips where eigentuemer = '$_COOKIE[eigentuemer]' order by tip_id desc");
while($liste=mysqli_fetch_array($seitenliste, MYSQLI_BOTH )){

$seiten_liste.="<tr><td $style><input type='radio' name='tip_id' value='$liste[tip_id]'></td><td $style>".$liste['tip']."</td><td $style>".$liste['rubrik']."</td><td align='right'
$style>".$liste['tip_id']."</td></tr>";}


echo "$seiten_liste
</table>
<div class='button'>
<button type='submit' name='tip_laden' value='tip_laden'>ausgew&auml;hlten TIP laden</button>
</div>
<br>
"; 

} 


?>
	
<input type="hidden" name="tipid" value="<?php echo $_POST[tip_id]; echo $_POST[tipid]; ?> ">
	
<?php	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////



if ($_POST['tip_laden'] == "tip_laden") {


$text=mysqli_query($link,"select text from tip_texte where tip_id = '$_POST[tip_id]'");
while ($seitentext = mysqli_fetch_array( $text, MYSQLI_BOTH ) ) {
$fliesstext=$seitentext['text'];
	}
}
 

	
$trips=mysqli_query($link," select tip, rubrik, eigentuemer from die_tips where tip_id = '$_POST[tip_id]' or tip_id = '$_POST[tipid]' ");
while ( $tipname = mysqli_fetch_array( $trips, MYSQLI_BOTH ) ) {
$tip_name=$tipname['tip'];
$tip_rubrik=$tipname['rubrik'];
$eigentuemer=$tipname['eigentuemer'];    

}

echo "<h2>Bearbeitet wird:&nbsp;<b>\" ".$tip_name." - Rubrik: ".$tip_rubrik." \"</h2>";
	
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
?>

<textarea cols="90" rows="35" id="text" name="text"><?php echo neuladen($fliesstext,$_POST['text']); ?></textarea>

<?php 



$name_text_area="text";
echo "
        <script>
                // Replace the <textarea id='text'> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'text' );
            </script>";
 
 include("script_neutral.php"); 


$fliesstext=""; 
echo "<div class='button'>";
?>
	
<br><br><h1>Tip-Text speichern:&nbsp;</h1>


<?php 


echo "<button type='submit' name='text_speichern' value='text_speichern'>Text speichern</button></div>";


if ($_POST['text_speichern'] == "text_speichern") { // start 1. if

$text = mysqli_real_escape_string($link, $_POST['text']);    
// $text=mysqli_real_escape_string($link, $_POST['text']);

mysqli_query($link,"update tip_texte set
text='$text'
where tip_id = '$_POST[tipid]' ");


} // ende 1. if



?>


</td>
</tr>
</table
</form>

  </body>
</html>