<?php
include("../intern/mysql_connect_gscheiderle.php");

////////////////////////////////////////////////
//
// Mitarbeiter für die Abrechnung selectieren
// Wir erstellen ein Array
//
// Author: ush2000@yahoo.de
//
///////////////////////////////////////////////

$mitarbeiter_alle = array();
$schluessel = array();
$wert = array();

$mitarbeiter_selectieren=mysqli_query($link," select eigentuemer, email from passwords where zugang = 'admin' or zugang = 'mitarbeiter' ");
while ( $result_mitarbeiter = mysqli_fetch_array( $mitarbeiter_selectieren, MYSQLI_BOTH ) ) {
	
	  $schluessel[]=($result_mitarbeiter[email]);
	  $wert[]=($result_mitarbeiter[eigentuemer]);
}

$mitarbeiter_alle=array_combine($schluessel,$wert);

?>