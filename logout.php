<?php if ($_POST['log_out'] == "log_out" ) { ?>
<?php setcookie("pseudo_kd_nr"," ",1); ?>
<?php setcookie("kd_nr"," ",1); ?>
<?php setcookie("vorname"," ",1); ?>
<?php setcookie("name"," ",1); ?>
<?php setcookie("email"," ",1); } ?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <!--<META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
       
<title>Ausloggen</title>
	
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
		
<?php  $form="<form method='POST' action='logout.php'>"; 
        
       
echo $form;

        
     

include("intern/mysql_connect_gscheiderle.php");


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
			
	<div class="col-md-6 style="text-align: center;">
			

	   
    <table style="width: 100%">
        <tr>
            <td align="center">
            <h1>Hier ausloggen:</h1>
        </td>
    </tr>
    
	<tr>
        <td align="center">
            
            <button type='submit' name='log_out' value='log_out' style=' font-size: 24px; height: 40px; width: 100%;'>LOG OUT</button>
            
            <?php 
            
            if ( $_POST['log_out']  == "log_out" ) {
                echo "<h1>Sie sind ausgeloggt!</h1>";
            } 
            
            ?>
      </td>
    </tr>
   </table>
		
		
		</div>
		
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
	