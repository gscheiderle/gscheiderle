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
        

include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/cart_abrufen.php"); 
      
?>		
		

<?php 
echo "<div class='container'>";		
include("seitenelemente/header.html"); 
echo "</div>";
?>
    
<br>
<br>

    
<?php 
include("seitenelemente/navigation.php"); 
?>
    
<br>
<br>
   

<div align="center">
	
        <h1>Ihr Wissens-Korb:</h1>

        <table border="0"  width="90%">
            <tr>
                <th style="background-color: #F1AD69">T.-Nr.:</th>
                <th style="background-color: #F1AD69">Tipp:</th>
                <th style="background-color: #F1AD69"align="right">R.-Nr.:</th>
                <th style="background-color: #F1AD69">&nbsp;|&nbsp;</th>
                <th style="background-color: #F1AD69">Rubrik:</th>
				<th style="background-color: #F1AD69">Anzahl:</th>
 				<th style="background-color: #F1AD69">Preis:</th>
                <th style="background-color: #F1AD69"align="right"></th>
            </tr>
            
            <tr>
                <th colspan="8"><hr></th></tr>
                <th colspan="8">&nbsp;</th>
            </tr>
            
 <?php      foreach( $alle_artikel as $artikel) {
                
                print_r($artikel);
    
                }

            
       echo "<tr><th colspan='8'>&nbsp;</th></tr>
            <tr>
                <th colspan='4' align='right' style=' background-color: #BBB6B6'>MWSt. $mw_st %</th>
                <th  colspan='2' align='right' style=' background-color: #BBB6B6'>&euro; MWSt, entalten:</th>
                <th align='right' style=' background-color: #BBB6B6'>$mwst</th>
                <th align='right' style=' background-color: #BBB6B6'><p></th>
            </tr>
            
            <tr>
                <th colspan='6' align='right'><b>Summe</th>
                <th align='right'><b>$summe</th>
                <th align='right'><b><p></th>
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
            ?>
     
        </table>
    </div>
    
    	<br><br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>

		</form>
	</body>
</html>
	