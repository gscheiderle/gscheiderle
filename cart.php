<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
<title>Ggscheiderles Cart</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>
		
</head>
	<body>
		
<?php echo "<form method='POST' action='cart.php'>"; ?>
	  
	  

	
<?php 
        
include("intern/mysql_connect_gscheiderle.php");
include("php_code/cart_abrufen.php");
include("intern/funktionen.php");
include("intern/parameter.php"); 
      
?>		
		

<?php 
echo "<div class='container'>";		
include("seitenelemente/header.php"); 
echo "</div>";
?>
    
<br>
<br>

    
<?php 
include("seitenelemente/navigation.php"); 
?>
    
<br>
<br>
   

<?php 
		
echo "<div class='container'> 
	
<div class='row'>
		
    <div class='col-$md-2'>
     </div>
    
       <div class='col-$md-8 bg-white text-dark' style='text-align: center;'>"; ?>
		   
		   <div class="table-responsive">
  
			   <table class="table" border="0" width="100%">
				   
				   
		                <tr><td colspan="3"><p><h2>Sie haben ausgewählt:</h2></p></td></tr>		   
         

            <tr>
                
                <td style=' background-color: #EEE6B6'>Tipp:</td>
                <td style=' background-color: #EEE6B6'>Rubrik.:</td>
				<td style=' background-color: #EEE6B6; text-align: right;'>Preis:</td>
            </tr>

     
<?php include("php_code/cart_abrufen.php"); ?>    
     
<?php       foreach ( $alle_artikel as $value ) {
    
            print_r("<h2>".$value."</h2>");
}
?>     
     
     
 <?php     
	 	echo "
                <td colspan='2' style='text-align: right; background-color: #EEE6B6'>$mw_st % enhaltene Mwst.: &euro;</td>
                <td style='text-align: right; background-color: #EEE6B6'>$mwst&nbsp;&nbsp;</td>
                
            </tr>
            
            <tr>
                <td colspan='2' style='text-align: right;'><b>Summe &euro;</td>
                <td style='text-align: right;'><b>$summe&nbsp;&nbsp;</td>
             </tr>
			 
			              <tr>
                <th colspan='8' style=' color: #FFF; text-decoration: none; background-color: #FFF; text-align: center;'>
            
                <a href='alle_rubriken.php'>
                <font style='font-family: arial; background-color: lightgreen; font-size: 1.5em; color: #000;'><br>

                &nbsp;Weiter Wissen anh&auml;ufen&nbsp;</a></font>
                &nbsp;
             
             
                <a href='kasse/auswahl_kunde.php'>
                <font style='font-family: arial; background-color: lightgreen; font-size: 1.5em; color: #000;'>
                &nbsp;Zur&nbsp;Kasse&nbsp;</a></font>
              </th>
             </tr>
  
             ";
            
    
 echo "</table>";
        
echo "</div>
		<div class='col-$md-2'>
					</div>
					 </div>
		</div>
	</div>";
                
            ?>
     

    	<br><br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>

		</form>
	</body>
</html>
	