<?php 

echo "<form action='formdata.php' id='form' method='POST'>";

echo "<table border='1' cellpadding='15px'>";
echo "<tr><td>mc_gross: </td><td>".$_GET['mc_gross']."</td></tr>";
echo "<tr><td>invoice: </td><td>".$_GET['invoice']."</td></tr>";
echo "<tr><td>protection_eligibility: </td><td>".$_GET['protection_eligibility']."</td></tr>";
echo "<tr><td>address_status: </td><td>".$_GET['address_status']."</td></tr>";
echo "<tr><td>item_number1: </td><td>".$_GET['item_number1']."</td></tr>";
echo "<tr><td>payer_id: </td><td>".$_GET['payer_id']."</td></tr>";
echo "<tr><td>tax: </td><td>".$_GET['tax']."</td></tr>";
echo "<tr><td>address_street: </td><td>".$_GET['address_street']."</td></tr>";
echo "<tr><td>payment_date: </td><td>".$_GET['payment_date']."</td></tr>";
echo "<tr><td>payment_status: </td><td>".$_GET['payment_status']."</td></tr>";
echo "<tr><td>charset: </td><td>".$_GET['charset']."</td></tr>";
echo "<tr><td>address_zip: </td><td>".$_GET['address_zip']."</td></tr>";
echo "<tr><td>first_name: </td><td>".$_GET['first_name']."</td></tr>";
echo "<tr><td>mc_fee: </td><td>".$_GET['mc_fee']."</td></tr>";
echo "<tr><td>address_country_code: </td><td>".$_GET['address_country_code']."</td></tr>";
echo "<tr><td>address_name: </td><td>".$_GET['address_name']."</td></tr>";
echo "<tr><td>notify_version: </td><td>".$_GET['notify_version']."</td></tr>";
echo "<tr><td>custom: </td><td>".$_GET['custom']."</td></tr>";
echo "<tr><td>payer_status: </td><td>".$_GET['payer_status']."</td></tr>";
echo "<tr><td>business: </td><td>".$_GET['business']."</td></tr>";
echo "<tr><td>address_country: </td><td>".$_GET['address_country']."</td></tr>";
echo "<tr><td>num_cart_items: </td><td>".$_GET['num_cart_items']."</td></tr>";
echo "<tr><td>address_city: </td><td>".$_GET['address_city']."</td></tr>";
echo "<tr><td>verify_sign: </td><td>".$_GET['verify_sign']."</td></tr>";
echo "<tr><td>payer_email: </td><td>".$_GET['payer_email']."</td></tr>";
echo "<tr><td>txn_id: </td><td>".$_GET['txn_id']."</td></tr>";
echo "<tr><td>payment_type: </td><td>".$_GET['payment_type']."</td></tr>";
echo "<tr><td>payer_business_name: </td><td>".$_GET['payer_business_name']."</td></tr>";
echo "<tr><td>last_name: </td><td>".$_GET['last_name']."</td></tr>";
echo "<tr><td>address_state: </td><td>".$_GET['address_state']."</td></tr>";
echo "<tr><td>item_name1: </td><td>".$_GET['item_name1']."</td></tr>";
echo "<tr><td>receiver_email: </td><td>".$_GET['receiver_email']."</td></tr>";
echo "<tr><td>payment_fee: </td><td>".$_GET['payment_fee']."</td></tr>";
echo "<tr><td>shipping_discount: </td><td>".$_GET['shipping_discount']."</td></tr>";
echo "<tr><td>quantity1: </td><td>".$_GET['quantity1']."</td></tr>";
echo "<tr><td>insurance_amount: </td><td>".$_GET['insurance_amount']."</td></tr>";
echo "<tr><td>receiver_id: </td><td>".$_GET['receiver_id']."</td></tr>";
echo "<tr><td>txn_type: </td><td>".$_GET['txn_type']."</td></tr>";
echo "<tr><td>discount: </td><td>".$_GET['discount']."</td></tr>";
echo "<tr><td>mc_gross_1: </td><td>".$_GET['mc_gross_1']."</td></tr>";
echo "<tr><td>mc_currency: </td><td>".$_GET['mc_currency']."</td></tr>";
echo "<tr><td>residence_country: </td><td>".$_GET['residence_country']."</td></tr>";
echo "<tr><td>shipping_method: </td><td>".$_GET['shipping_method']."</td></tr>";
echo "<tr><td>transaction_subject: </td><td>".$_GET['transaction_subject']."</td></tr>";
echo "<tr><td>payment_gross: </td><td>".$_GET['payment_gross']."</td></tr>";
echo "<tr><td>ipn_track_id: </td><td>".$_GET['ipn_track_id']."</td></tr>";
echo "</table>";


?>