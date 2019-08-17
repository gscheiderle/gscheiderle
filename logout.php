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
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php  $form="<form method='POST' action='logout.php'>"; 
        
       
echo $form;

        
     

include("intern/mysql_connect_gscheiderle.php");


?>		
		
	
<div class="wrapper">
	

	<?php include("seitenelemente/header.html"); ?>
    
    <div class="nav">
    
<?php include("seitenelemente/navigation.php"); ?>
    
    </div>
    

    <div class="article">
        
        
        <div align="center">
    <table>
        
        <tr>
            <td align="center">
            <h1>Hier ausloggen:</h1>
        </td>
    </tr>
    
        
        
    <tr>
        <td align="center">
            
            <button type='submit' name='log_out' value='log_out' style=' font-size: 24px; height: 40px; width: 500px;'>LOG OUT</button>
            
            <?php 
            
            if ( $_POST['log_out']  == "log_out" ) {
                echo "<h1>Sie sind ausgeloggt!</h1>";
            } 
            
            ?>
            
        </td>
    </tr>
    

  </table>

        </div>
    </div> <!-- ende artikel-->
    
    

    
    

    </form>
    
	<?php include("seitenelemente/footer.html"); ?>
	
	
		  </div> 	<!-- ende div wrapper -->
	</body>
</html>
	