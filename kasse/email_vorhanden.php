<?php

/*eMail vorhanden*/

// Für die Passwortkontrolle

$verify_email=mysqli_query($link,"select email from passwords where email = '$_POST[e_mail]' ");
while ( $verify = mysqli_fetch_array( $verify_email, MYSQLI_BOTH ) ) {
$e_mail_db=$verify['email'];
}

if ( $e_mail_db != "" ) { $email_vorhanden = TRUE; }


?>
