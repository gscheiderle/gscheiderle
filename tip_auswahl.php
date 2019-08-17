<?php 
if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
<title>G'scheite &Uuml;bersicht</title>
	
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php echo " <form method='POST' action='tip_auswahl.php?rubrik=$_GET[rubrik]'> "; ?>
	  
	  

	
<?php 
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/finde_rubrik_nummer.php"); 
include("php_code/finde_tips.php"); 
include("php_code/in_cart_speichern.php"); 
?>		
		
	
<div class="wrapper">
	

<?php 
    include("seitenelemente/header.html"); 
    echo "<div class='nav'>";
    include("seitenelemente/navigation.php");
?>    
 </div>
        
	
<div class="article_tip_auswahl">


<table cellspacing="15px">    
  <tbody> 
		
<?php
	  
	  
 echo "<tr>";   
 echo $tabelle;    
 echo "</tr>"; 	
	   	  

 echo "</tbody>";
 echo "</table>";
        
?>    


</div><!-- ende div article_tip_auswahl-->	
	
	
	<?php include("seitenelemente/footer.html"); ?>
	
	
	
		   </div> 	<!-- ende div wrapper -->
		</form>
	</body>
</html>
	