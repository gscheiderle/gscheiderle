<?php

/* in cart speichern */
/*** selektiert den Tips aus den von der Frontpage aus angewählten Rubrik */


if ( $_POST['in_cart'] == TRUE ) {

$select_tips=mysqli_query($link, "select tip, rubrik, ru_id, code, preis, eigentuemer from die_tips where code = '$_POST[in_cart]' " );
while ( $result_tips = mysqli_fetch_array( $select_tips, MYSQLI_BOTH ) ) {
	
    
   $code=$result_tips['code'];
   $tip=$result_tips['tip'];
   $rubrik=$result_tips['rubrik'];
   $ru_id=$result_tips['ru_id'];
   $preis=$result_tips['preis'];
   $eigentuemer=$result_tips['eigentuemer'];
    
 }



$anzahl=1;
    

mysqli_query($link," insert into cart 
(
pseudo_kd_nr,
kd_nr,
tip_nr,
tip,
rubrik_nr,
rubrik,
anzahl,
preis,
eigentuemer
)

values

(

'$_COOKIE[pseudo_kd_nr]',
'$_COOKIE[kd_nr]',
'$code',
'$tip',
'$ru_id',
'$rubrik',
'$anzahl',
'$preis',
'$eigentuemer'
)

");
    

}

?>
