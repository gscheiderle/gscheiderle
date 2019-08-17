
<?php


echo "    
   
     
    <h1>
    
    <a href='https://www.gscheiderle.de/index.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;home&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='https://www.gscheiderle.de/alle_rubriken.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;rubriken&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='https://www.gscheiderle.de/cart.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;cart&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    <a href='https://www.gscheiderle.de/einloggen.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;einloggen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";


    
    if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
     
    echo "<a href='https://www.gscheiderle.de/kasse/zahlung_abschliessen.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;bezahlen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>
    
    
    
    <a href='https://www.gscheiderle.de/logout.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;ausloggen&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";   
        
        
        
    }
    
    echo 
    "<a href='https://www.gscheiderle.de/angebot_mitarbeit.php'>&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;eigene tipps&nbsp;&nbsp;<font color='red'> | </font>&nbsp;&nbsp;</a>";  

	


 
?>    
 </h1>  