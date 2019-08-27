<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=https://www.gscheiderle.de/standartseite.php">-->
<title>Abrechnung Mitarbeiter</title>
	
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="../css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="../css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php echo " <form id='allgemein' method='POST' action='abrechnung_mitarbeiter.php'> "; ?>
	  
	  

	
<?php 
		
include("../intern/mysql_connect_gscheiderle.php");		
include("../intern/parameter.php");
include("../intern/funktionen.php"); 
include("../php_code/mitarbeiter_select.php");
?>		
		
	
<div class="wrapper">
	
	<div class="article">
		
		<?php $style="style='height:5em; width:40em; background-color: lightgreen;'"; 
		 $font_style="<font style='font-size: 2em; color: blue;'>";

		echo "<button type='submit' value='abrechnung_start' name='abrechnung_start' $style >$font_style ABRECHNUNG STARTEN</font></button><br>"; ?>
<br>

<h1>Abrechnung:</h1><br>
<br>

		<table border="1" width="800px">
		
		<?php echo $zeile; ?>
		
		</table>
		
	
		
	</div>
		</div>
		
		</form>
	</body>
</html>