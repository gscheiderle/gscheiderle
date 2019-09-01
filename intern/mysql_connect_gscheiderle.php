<?php
/*$link=mysqli_connect("mysql5.gscheiderle.de","db562163_1","339Us%&/6815","db562163_1") or die
  ("Keine Verbindung moeglich");*/


$link=mysqli_connect("localhost","root","","gscheiderle") or die
  ("Keine Verbindung moeglich");


  
  $zeit=date("Y-m-d H:i:s");

  $datum=date("Y-m-d");


$selectmd=mysqli_query($link, "select md from display where session = '$_COOKIE[sessionid]' order by display_id desc limit 1 ");
while ( $result_md = mysqli_fetch_array( $selectmd, MYSQLI_BOTH ) ) {
	
if ( $result_md['md'] == "" ) { $md = "sm"; }

else {
$md=$result_md['md'];
}
	
}


  
?>
