<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Standartseite</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
    
  </head>
    
  <body leftmargin="20px" topmargin="30px">
  
  
  
<?php echo "<form method='POST' action='standartseite.php'> "; ?>
	  
	  
<?php 
include("../intern/parameter.php"); 
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/css/schriften.css");

$tipliste=mysqli_query($link,"select tip_id, tip, rubrik from die_tips where eigentuemer = '$_COOKIE[eigentuemer]' order by tip_id desc ");
while($liste=mysqli_fetch_array($tipliste, MYSQLI_BOTH ) ) {
$selected_1="selected";    
$selected="";  
    
    if ( $liste['tip_id'] == $_POST['tipid'] ) { $selected="selected"; 
                                                 $selected_1=""; }
    
$tip_liste.="<option value='$liste[tip_id]' $selected >".$liste['tip']." - ".$liste['rubrik']."</option>";
}



if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}
?>
	  
	  	  
<table width="800px" height="auto" style="background-color: lightgreen; ">
    <tr><td align="left" valign="top">
        <select name="tipid">
        <?php echo "<option $selected_1>Tip w&auml;hlen</option>"; ?>
        <?php echo $tip_liste; ?>
        </select>&nbsp;&nbsp;&nbsp;<input type="submit" value="Seite laden">
<?php 
    
$inhalt=mysqli_query($link, "select titel, text from tip_texte where tip_id = '$_POST[tipid]' ");
    while($result_inhalt=mysqli_fetch_array($inhalt,MYSQLI_BOTH)){
        
        echo "$result_inhalt[titel]<br><br>";
        
        echo "$result_inhalt[text]";
        
    }
    
  
echo "<br><br>
<a href=\"standartseite.php?seitenid=$_POST[seitenid]\">nach oben</a>";

?>

</td>
</tr>
</table
</form>

  </body>
</html>