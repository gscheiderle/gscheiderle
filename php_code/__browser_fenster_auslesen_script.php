<?php
session_start();
$link=mysqli_connect("localhost","root","","gscheiderle") or die
  ("Keine Verbindung moeglich");

// ini_set('error_reporting', E_ALL);
/*
* Die �bertragenden Werte �ndern sich anhand:
* - der aktuellen Fenstergr��e
* - des verwendeten Browsers
*/
$browser = $_POST['browser'];
$browser_width = $_POST['width'];
$browser_height = $_POST['height'];

echo $sessionid=session_id();

if ( $browser_width < 768 ) { $md = "sm"; }
if ( $browser_width >= 768 && $browser_width < 992 ) { $md = "md"; }
if ( $browser_width >= 992 && $browser_width < 1200 ) { $md = "lg"; }
if ( $browser_width >= 1200 ) { $md = "xl"; }

$sql = "INSERT INTO display (browser_width,browser_height,browser, md, session) VALUES ('$browser_width','$browser_height','$browser', '$md', '$sessionid' )";

mysqli_query($link,"$sql");

/*
* Test: R�ckgabe an aufrufendes Script
*/
$arr = array();
$arr["Ihr Browser"] = $browser;
$arr["Aktuelle Fensterbreite"] = $browser_width;
$arr["Aktuelle Fensterhoehe"] = $browser_height;
$arr["Abfrage lautet"] = $sql;
// print_r(json_encode($arr));


?>