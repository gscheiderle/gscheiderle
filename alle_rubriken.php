<?php 
if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  <!-- // <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=https://www.gscheiderle.de/standartseite.php">-->
       
<title>Ggscheiderle einloggen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
		
</head>
	<body>
		
<?php  
        
$form="<form method='POST' action='https://www.gscheiderle.de/alle_rubriken.php?kd_nr=$_POST[kd_nr_for]&name=$_POST[name_for]&vorname=$_POST[vorname_for]&email=$_POST[email_for]'>";
        
	
echo $form;

        
include("intern/mysql_connect_gscheiderle.php");     
include("intern/parameter.php");
include("intern/funktionen.php"); 


?>		

	

<?php include("seitenelemente/header.php"); ?>
    
<br>
<br>

    
<?php 
include("seitenelemente/navigation.php"); 
?>    

<br>
<br>
	

<?php

include("php_code/array_rubriken.php");
?>		
	
          <?php 
		        
   			echo "<div class='container'>";	
	
					$zae_hler=-1;
	
	
					echo "<div class='row'>";
	
			foreach ( $rubrik_for_frontpage_3 as $key => $value ) {
					
					$zae_hler++;
					
					include("php_code/rubriken_zaehlen.php");
					
				
					$zeile="<div class='col-$md-4 bg-white text-white' style='text-align: left;'>"; 
				
											  
					if ( $zae_hler % 3 == 0 ) 	  { $zeile="</div><div class='row'>";
						                            $zeile.="<div class='col-$md-4 bg-white text-white' style='text-align: left;'>"; 
												  }
				
											 
					print_r("$zeile<a href='tip_auswahl.php?seiten_id=104&forcex=$zufall_id&rubrik=$key'><h3>$value ($anzahl_db)</a></h3></div>");
                    
                    $zeile="";

				}
	        
			echo "</div>";	
			?>




  		</div>               
	</div>   
	
	<br><br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>
	

		   </div> 	<!-- ende div wrapper -->
		</form>
	</body>
</html>
	