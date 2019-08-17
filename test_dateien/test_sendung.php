<?php
	
  $e12345="JoJoJo";
     
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
     
     
    foreach ($raw_post_array as $key => $value) {
        $links.=$value."&";
    }
     
$link=mysqli_connect("mysql5.gscheiderle.de","db562163_1","339Us%&/6815","db562163_1");


    
 $curl = curl_init(); 
 curl_setopt($curl, CURLOPT_URL,"http://www.gscheiderle.de/test_dateien/posttest.php"); 
 curl_setopt($curl, CURLOPT_POST, 1); 
 curl_setopt($curl, CURLOPT_POSTFIELDS, $links); 
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
 curl_exec ($curl); 
 curl_close ($curl); 
    
 

?>
    
