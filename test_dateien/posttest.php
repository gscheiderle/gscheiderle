 <?php 
 
 $link=mysqli_connect("mysql5.gscheiderle.de","db562163_1","339Us%&/6815","db562163_1");

$datum=date("Y-m-d|h:i:s");


$data="transaktionsnr=$datum&";
 foreach ( $_POST as $key => $value ) {
 
 $data.=$key."=".$value."&";
	 
 }


echo $data;
mysqli_query($link, "insert into paypal_transfer_infos (transaktionsnr, data) values ( '$datum', '$data')" );

 
 echo "<br>
<br>
<a href='http://192.168.2.106/gscheiderle/gscheiderle/test_dateien/ipn_analyse.php?$data'>IPN-ANALYSE</a>";
 echo "<br>
<br>
";

$query="select * from paypal_transfer_infos where transaktionsnr = '$datum' ";

$result=mysqli_query($link, $query);
while ($erg=mysqli_fetch_array($result, MYSQLI_BOTH ) ) {
    
    echo $erg['data']."<br>";
}

 ?> 