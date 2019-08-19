<?php 
if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">

<title>Ggscheiderles Rubriken</title>
		<!--<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css">--> <!-- Handy -->
		<!--<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style_tip_cart.css">--> <!-- stehendes Rechteck -->
		<!--<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css">--> <!-- grosser Bildschirm -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>
		
		
</head>
	
<body>
		
<?php echo "<form method='POST' action='alle_rubriken.php'>"; ?>
	  

<?php 
               
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/array_rubriken.php"); 

?>		
	
<div class="container">	
	
<?php 
	
include("seitenelemente/header.html"); 
	
?>
	
</div>		
    
<br>	
    
<div class="container">	
	
<?php include("seitenelemente/navigation.php"); ?>
	
</div>	
    
	<br>
	
<div class="container">		
	
  <div class="row">
		
       <div class="col-md-12 bg-white text-white" style="text-align: left;">

            
                 
           <?php 
		        echo "<div align='center'>";
                echo "<table border='1' style='width:95%; align:center'>";
                $zae_hler=1;
            
				foreach ( $rubrik_for_frontpage_3 as $key => $value ) {
                    
                    include("php_code/rubriken_zaehlen.php");
                    
                    $zeilen_ende='';
                    
					if ( $zae_hler % 3 != 0 ) { $zeilen_ende="<td width='5%'> </td>"; }
                    if ( $zae_hler % 3 == 0 ) { $zeilen_ende="</tr><tr>"; }
					
					print_r("<td hight='3em' width='30%'><a href='tip_auswahl.php?forcex=$zufall_id&rubrik=$key'><font style='font-family: arial; font-color: #000; font-size: 2em; text-decoration: none;'>$value</a> ($anzahl_db)</font></td>".$zeilen_ende."");
                    
                    $zae_hler++;
                    
				}
	            echo "</tr>";
	  			echo "</table>";
				
			?>
             
		
	   </div>

  </div>               
	</div>   
	
	<br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>
	
	
	
		   </div> 	<!-- ende div wrapper -->
		</form>
	</body>
</html>
	