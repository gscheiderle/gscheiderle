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
    
<?php include("seitenelemente/navigation.php"); ?>
    

 <table>
            
                
           <?php 
                
                $zae_hler=1;
            
				foreach ( $rubrik_for_frontpage_3 as $key => $value ) {
                    
                     include("php_code/rubriken_zaehlen.php");
                    
                    $zeilen_ende='';
                    
                    if ( $zae_hler % 2 == 0 ) { $zeilen_ende="</tr><tr>"; }
					
					print_r("<td hight='3em'><a href='tip_auswahl.php?forcex=$zufall_id&rubrik=$key'><font style='font-family: arial; font-color: #000; font-size: 2.5em; text-decoration: none;'>$value</a> ($anzahl_db)</font></td>".$zeilen_ende."");
                    
                    $zae_hler++;
                    
				}
				
				?>
             
                
                
         
            </tr> 
    
        </table>
    
    </div> <!-- ende artikel-->

    
    
	<?php include("seitenelemente/footer.html"); ?>
	
	
	
		   </div> 	<!-- ende div wrapper -->
		</form>
	</body>
</html>
	