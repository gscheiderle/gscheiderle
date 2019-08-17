<?php


$email_match='/[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,6}$/';



function gesperrte_email($email,$post_senden)
{ 
   if ( $post_senden == TRUE ) {
   $such_email=mysqli_query($link," select bad_email from bad_email where bad_email = '$email' ");
     while( $result_bad_email = mysqli_fetch_array( $such_email, MYSQLI_BOTH ) ) {
        if ( $result_bad_email['bad_email'] != "" ) {
        echo "<h3>Sie sind auf dieser Website unerw&uuml;nscht !</h3>";
        exit;
       }
     }
   }
 }


$mw_st=19;



?>