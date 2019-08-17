
<?php


echo "    
   
     
    <h1>
    &nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/index.php'>home</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/alle_rubriken.php'>rubriken</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/cart.php'>cart</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/einloggen.php'>einloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";
    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='http://localhost/kasse/zahlung_abschliessen.php'>bezahlen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    
    <a href='http://localhost/logout.php'>ausloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";    
        
        
    }
    
    
	


 
?>    
 </h1>  