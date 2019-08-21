<?php 
if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
<title>ä g'scheite &Uuml;bersicht</title>
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
  <script var __adobewebfontsappname__="dreamweaver"> </script>
  <script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"> </script>

</head>
	<body>
		
<?php echo " <form method='POST' action='tip_auswahl.php?rubrik=$_GET[rubrik]'> "; ?>
	  

		
<!--		<div class="container mt-3">
  <h2>Order</h2>
  <p>Change the visual order of a specific flex item(s) with the .order classes. Valid classes are from 0 to 12:</p>
  <div class="d-flex mb-3">
    <div class="p-2 order-3 bg-info">Flex item 1<br>Flex item 1<br>Flex item 1<br>Flex item 1<br>Flex item 1<br>Flex item 1<br>Flex item 1<br></div>
    <div class="p-2 order-2 bg-warning">Flex item 2</div>
    <div class="p-2 order-1 bg-primary">Flex item 3</div>
  </div>
</div>-->
		

	
<?php 
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/finde_rubrik_nummer.php"); 
include("php_code/finde_tips.php"); 
include("php_code/in_cart_speichern.php"); 
?>		
		
	
<?php include("seitenelemente/header.html"); ?>
    
<br>
<br>

    
<?php 
include("seitenelemente/navigation.php"); 
?>    

<br>
<br>

<div class="container">
		
<div class="row">
	
	<div class="col-md-3">
	</div>
	
		
<?php
	
 echo "<table style='padding:10;'>";	  
 echo "<tr>";
 echo $tabelle;    
 echo "</tr>";
 echo "</table>";
?>    
	<div class="col-md-3">
	</div>
	
</div>
</div>


<br><br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>
	
	
	
		   
		</form>
	</body>
</html>
