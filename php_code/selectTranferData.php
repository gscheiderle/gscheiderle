<?php

/////////////////////////////////////////////////////
//
// Abfrage der von PAYPAL 
// via IPN gelieferten
// Daten
//
// Author: Uwe Sack
//
////////////////////////////////////////////////////

?>

<?php


$select_data=mysqli_query($link, " select 
item_name,
item_number,
payment_status,
payment_amount,
payment_currency,
transaktionsnr,
receiver_email,
payer_email,
data,
res 
from paypal_transfer_infos
where txn_id = '$transaktionsnr' ");
while ( $result_data = mysqli_fetch_array ( $select_data, MYSQLI_BOTH ) ) {
    
  $item_name = $result_data['item_name'];
  $item_number = $result_data['item_number'];
  $payment_status = $result_data['payment_status'];
  $payment_amount = $result_data['mc_gross'];
  $payment_currency = $result_data['mc_currency'];
  $txn_id = $result_data['txn_id'];
  $receiver_email = $result_data['receiver_email'];
  $payer_email = $result_data['payer_email'];
  $data = $result_data['data'];
  $res = $result_data['res'];
    
}


echo " $item_name, 
$item_number, 
$payment_status, 
$payment_amount, 
$payment_currency, 
$txn_id, 
$receiver_email, 
$payer_email, 
$data, 
$res ";

?>