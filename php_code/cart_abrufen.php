<?php 
    
$color="red";
$loeschen="TIPP L&Ouml;SCHEN";



if ( $_POST['tip_loeschen'] == TRUE ) {
    
    mysqli_query($link," delete from cart where cart_id = '$_POST[tip_loeschen]' ");
    
}


$button_loeschen="<button type='submit' name='tip_loeschen' value='$cart_id' style='color: #FFF; background-color: red;'>TIPP L&Ouml;SCHEN</button>";


$argument=" pseudo_kd_nr = '$_COOKIE[pseudo_kd_nr]' and berechnet < '1' ";

if ( $_COOKIE['kd_nr'] != "" )   {  $argument=" kd_nr = '$_COOKIE[kd_nr]' and berechnet < '1' "; }


$alle_artikel=array();



$select_cart=mysqli_query($link," select cart_id, tip_nr, tip, rubrik_nr, rubrik, anzahl, preis from cart where  $argument ");
     while ( $result_cart = mysqli_fetch_array( $select_cart, MYSQLI_BOTH ) ) {
         
     $cart_id=$result_cart['cart_id'];
         
     $alle_artikel[]=("<tr><td>".$result_cart['tip_nr']."</td>
     <td>".$result_cart['tip']."</td>
     <td style='text-align: center;'>".$rubrik_nr=$result_cart['rubrik_nr']."</td>
     <td>&nbsp;|&nbsp;</td>
     <td style='text-align: left;'>".$rubrik=$result_cart['rubrik']."</td>
     <td style='text-align: center;'>".$rubrik=$result_cart['anzahl']."</td>
     <td style='text-align: right;'>".$preis=$result_cart['preis']."&nbsp;&nbsp;</td>
     <td style='text-align: right;'><button type='submit' name='tip_loeschen' value='$cart_id' style='color: #FFF; background-color: $color;'>$loeschen</button></td>
     </tr>");
         
         
     $summe=$summe+$result_cart['preis'];
         
     }

    

     $mwst=$summe/(100+$mw_st) * $mw_st;

     $mwst=number_format($mwst, 2, ',', '.');
     $summe=number_format($summe, 2, ',', '.');

   $i=1;
   $mehr_artikel=array();
   
   $select_cart_2=mysqli_query($link," select tip_nr, tip, anzahl, preis from cart where  kd_nr = '$_COOKIE[kd_nr]' and berechnet < '1' ");
    while ( $result_cart_2 = mysqli_fetch_array( $select_cart_2, MYSQLI_BOTH ) ) {
         
     $preis_netto=($result_cart_2['preis']/(100+$mw_st))*100;
 
     $mehr_artikel[]=("<input type='hidden' name='item_number_$i' value='$result_cart_2[tip_nr]'>
					<input type='hidden' name='item_name_$i' value='$result_cart_2[tip]'>
                     <input type='hidden' name='quantity_$i' value='$result_cart_2[anzahl]'>
                     <input type='hidden' name='amount_$i' value='$preis_netto'>"); 
   
        $i++;
    }


     
     


?>