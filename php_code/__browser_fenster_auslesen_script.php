<?php
session_start();
include("../intern/mysql_connect_gscheiderle.php");


ini_set('error_reporting', E_ALL);
/*
* Die �bertragenden Werte �ndern sich anhand:
* - der aktuellen Fenstergr��e
* - des verwendeten Browsers
*/
$browser = $_POST['browser'];
$browser_width = $_POST['width'];
$browser_height = $_POST['height'];
$sessionid=session_id();
$sql = "INSERT INTO display (browser_width,browser_height,browser,session) VALUES ('$browser_width','$browser_height','$browser','$sessionid')";

mysqli_query($link,"$sql");

/*
* Test: R�ckgabe an aufrufendes Script
*/
$arr = array();
$arr["Ihr Browser"] = $browser;
$arr["Aktuelle Fensterbreite"] = $browser_width;
$arr["Aktuelle Fensterhoehe"] = $browser_height;
$arr["Abfrage lautet"] = $sql;
print_r(json_encode($arr));
?>