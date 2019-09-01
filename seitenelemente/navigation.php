
<?php


echo "    
   
     
    <h1>
    
    <a href='http://localhost/gscheiderle/index.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;home&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='http://localhost/gscheiderle/alle_rubriken.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;rubriken&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='http://localhost/gscheiderle/cart.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;cart&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='http://localhost/gscheiderle/einloggen.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;einloggen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";


    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='http://localhost/gscheiderle/kasse/zahlung_abschliessen.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;bezahlen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    
    <a href='http://localhost/gscheiderle/logout.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;ausloggen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";   
        
        
        
    }
    
    echo 
    "<a href='http://localhost/gscheiderle/angebot_mitarbeit.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;eigene tipps&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";  

	


 
?>    
 </h1>  