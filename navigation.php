
<?php


echo "    
   
     
    <h1>
    &nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/gscheiderle/index.php'>home</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/gscheiderle/alle_rubriken.php'>rubriken</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/gscheiderle/cart.php'>cart</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://localhost/gscheiderle/einloggen.php'>einloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";
    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='http://localhost/gscheiderle/kasse/zahlung_abschliessen.php'>bezahlen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    
    <a href='http://localhost/gscheiderle/logout.php'>ausloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";    
        
        
    }
    
    
	


 
?>    
 </h1>  