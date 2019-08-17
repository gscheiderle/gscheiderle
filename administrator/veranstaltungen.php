<!doctype html>
<html lang="de">
<head>
<meta charset=utf-8">
<title>Frontpage $uwesack</title>



<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="../css/termin.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)"   href="../css/termin_600.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="../css/main.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)"   href="../css/main_600.css">
</head>

<body>

<div id="wrapper">

<?php include("../intern/kopf.php"); ?>

<h3>
<?php
include("../intern/mysql_connect_gscheiderle.php");
?>

<form action="" method="POST">


<table border="0" width="100%">
<tr>
<td colspan="4">
<br><br>
Jahr w&auml;hlen:&nbsp;&nbsp;
<select name="jahr">
<option value="2014">2014</option>
<option selected value="2015">2015</option>
<option value="2016">2016</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
Sortieren nach:&nbsp;
<select name="sortierung">
<option value="monat">Datum</option>
<option value="ort">Ort</option>
<option value="thema">Thema</option>
</select>


&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="senden" value="Abfrage starten">
</td>
</tr>

<tr>
<td colspan="5"><br>
<hr /><br></td>
</tr>
</h3>
<tr>
<td width="10%">Nr.:&nbsp;&nbsp;</td>
<td width="10%">Termin von&nbsp;&nbsp;</td>
<td width="10%">Termin bis&nbsp;&nbsp;</td>
<td width="50%">Thema:&nbsp;&nbsp;</td>
<td width="30%">Ort:&nbsp;&nbsp;</td>
</tr>

<?php 
if ( $_POST['senden'] == TRUE ) {

$zaehler=1;

$select_termine=mysqli_query($link,"select * from termine where jahr = '$_POST[jahr]' order by $_POST[sortierung], termin_von"); 
while ( $result_termine = mysqli_fetch_array( $select_termine, MYSQLI_BOTH ) ) {
echo "
<tr>
<td>$zaehler</td>

<td>
$result_termine[termin_von]</td>

<td>
$result_termine[termin_bis]</td>

<td>
$result_termine[thema]</td>

<td>
$result_termine[ort]</td>
</tr>

<tr>
<td colspan='5'>
<hr /></td>
</tr>
";
$zaehler++;
}
}
 ?>
 
 </table>
 </form>