
<?php


echo "    
   
     
    <h1>
    &nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='https://www.gscheiderle.de/index.php'>home</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='https://www.gscheiderle.de/alle_rubriken.php'>rubriken</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='https://www.gscheiderle.de/cart.php'>cart</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='https://www.gscheiderle.de/einloggen.php'>einloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";
    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='https://www.gscheiderle.de/kasse/zahlung_abschliessen.php'>bezahlen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    
    <a href='https://www.gscheiderle.de/logout.php'>ausloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";    
        
        
    }
    
    
	


 
?>    
 </h1>  