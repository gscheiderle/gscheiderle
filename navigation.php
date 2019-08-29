
<?php


echo "    
   
     
    <h1>
    &nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://192.168.2.106/gscheiderle/index.php'>home</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://192.168.2.106/gscheiderle/alle_rubriken.php'>rubriken</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://192.168.2.106/gscheiderle/cart.php'>cart</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    <a href='http://192.168.2.106/gscheiderle/einloggen.php'>einloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";
    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='http://192.168.2.106/gscheiderle/kasse/zahlung_abschliessen.php'>bezahlen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;
    
    <a href='http://192.168.2.106/gscheiderle/logout.php'>ausloggen</a>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;";    
        
        
    }
    
    
	


 
?>    
 </h1>  