<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!-- <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
<title>Ggscheiderles Cart</title>
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php echo "<form method='POST' action='cart.php'>"; ?>
	  
	  

	
<?php 
        

include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/cart_abrufen.php"); 
        
        
        
?>		
		
	
<div class="wrapper">
	

	<?php include("seitenelemente/header.html"); ?>
    
    <div class="nav">
    
<?php include("seitenelemente/navigation.php"); ?>
    
    </div>
    

    <div class="article">
	
        <h1>Ihr Wissens-Korb:</h1>

        <table border="0"  width="100%">
            <tr>
                <td style="background-color: #F1AD69">T.-Nr.:</td>
                <td style="background-color: #F1AD69">Tipp:</td>
                <td style="background-color: #F1AD69"align="right">R.-Nr.:</td>
                <td style="background-color: #F1AD69">&nbsp;|&nbsp;</td>
                <td style="background-color: #F1AD69">Rubrik.:</td>
                <td style="background-color: #F1AD69"align="center">Anzahl:</td>
                <td style="background-color: #F1AD69">Preis:</td>
                <td style="background-color: #F1AD69"align="right"></td>
            </tr>
            
            <tr>
                <td colspan="8"><hr></td></tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            
 <?php      foreach( $alle_artikel as $artikel) {
                
                print_r($artikel);
    
                }

            
       echo "<tr><td colspan='8'>&nbsp;</td></tr>
            <tr>
                <td colspan='4' align='right' style=' background-color: #BBB6B6'>MWSt. $mw_st %</td>
                <td  colspan='2' align='right' style=' background-color: #BBB6B6'>&euro; MWSt, entalten:</td>
                <td align='right' style=' background-color: #BBB6B6'>$mwst</td>
                <td align='right' style=' background-color: #BBB6B6'><p></td>
            </tr>
            
            <tr>
                <td colspan='6' align='right'><b>Summe</td>
                <td align='right'><b>$summe</td>
                <td align='right'><b><p></td>
             </tr>
             
             <tr>
                <td colspan='8' style=' color: #FFF; text-decoration: none; background-color: #FFF; text-align: center;'>
            
                <a href='alle_rubriken.php'>
                <font style='font-family: arial; background-color: lightgreen; font-size: 1.5em; color: #000;'><br>

                &nbsp;Weiter Wissen anh&auml;ufen&nbsp;</a></font>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
                <a href='kasse/auswahl_kunde.php'>
                <font style='font-family: arial; background-color: lightgreen; font-size: 1.5em; color: #000;'>
                &nbsp;Zur Kasse&nbsp;</a></font>
              </td>
             </tr>
             ";
            ?>
     
        </table>
    
    </div> <!-- ende artikel-->

    
    
	<?php include("seitenelemente/footer.html"); ?>
	
	
	
		   </div> 	<!-- ende div wrapper -->
		</form>
	</body>
</html>
	