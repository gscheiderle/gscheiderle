
<?php


echo "    
   
     
    <h1>
    
    <a href='http://localhost/index.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;home&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='http://localhost/alle_rubriken.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;rubriken&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='http://localhost/cart.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;cart&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='http://localhost/einloggen.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;einloggen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";


    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='http://localhost/kasse/zahlung_abschliessen.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;bezahlen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    
    <a href='http://localhost/logout.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;ausloggen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";   
        
        
        
    }
    
    echo 
    "<a href='http://localhost/angebot_mitarbeit.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;eigene tipps&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";  

	


 
?>    
 </h1>  