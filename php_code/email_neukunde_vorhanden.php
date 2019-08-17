<?php


// Für die Neukunden-Anlage

$verifyemail=mysqli_query($link,"select email from adressen where email = '$_POST[e_mail]' ");
while ( $veri_fy = mysqli_fetch_array( $verifyemail, MYSQLI_BOTH ) ) {
$emaildb=$veri_fy['email'];
}

if ( $emaildb != "" ) { $warnung_email="<font style='font-size: 18px; font_weight: 700; background-color:#FFF; color: red;'>&nbsp;E-Mail-Adresse ist ung&uuml;ltig oder bereits vorhanden.&nbsp;</font><br>
<br>
"; 
                         $angabe = FALSE; }


?>
