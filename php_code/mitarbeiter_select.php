<?php

////////////////////////////////////////////////
//
// Mitarbeiter für die Abrechnung selectieren
// Wir erstellen ein Array
//
// Author: ush2000@yahoo.de
//
///////////////////////////////////////////////



if ( $_POST['abrechnung_start'] == 'abrechnung_start' )  {




$stoppen=mysqli_query($link,"select re_id, eigentuemer from rechnungen where provision_bezahlt = '0' limit 1");
	while ($result_stop = mysqli_fetch_array ($stoppen, MYSQLI_BOTH ) ) {
	$anhalten=$result_stop['re_id'];
	$eigentuemer_select=$result_stop['eigentuemer'];
	}
	
	
	
if ( $anhalten == "" ) { echo "<h1>Es gibt nichts abzurechnen !<br>
								   <a href='http://192.168.2.106/gscheiderle/administrator/auswahl.php'>hier geht's weiter</a></h1>";
					    exit();
					   
					   }	


$mitarbeiter_selectieren=mysqli_query($link," select email from passwords where zugang = 'admin' and eigentuemer = '$eigentuemer_select' or 
zugang = 'mitarbeiter' and eigentuemer = '$eigentuemer_select' ");
while ( $result_mitarbeiter = mysqli_fetch_array( $mitarbeiter_selectieren, MYSQLI_BOTH ) ) {
	
	  $email_adresse=$result_mitarbeiter['email'];


	
	    $select_adresse=mysqli_query($link," select kd_nr, name, vorname, plz, ort from adressen where email = '$email_adresse' ");  
			            while ( $result_adresse = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
				        $adressen=$result_adresse['name'].", ".$result_adresse['vorname'].", ".$result_adresse['plz']." ".$result_adresse['ort'];
							
						$kd_nr_db=$result_adresse['kd_nr'];	
						}
	      
        $summe_bilden=mysqli_query($link,"select re_id, tip_nr, positionspreis from rechnungen where eigentuemer = '$eigentuemer_select' and provision_bezahlt = '0' ");
			            while ( $result = mysqli_fetch_array( $summe_bilden, MYSQLI_BOTH ) ) {
							
						$bruttobetrag=$bruttobetrag+$result['positionspreis'];
            
        $alle_tip_id.=$result['tip_nr']."&";
							
						mysqli_query($link,"update rechnungen set provision_bezahlt = '1' where re_id = '$result[re_id]' ");
						
						}
												
 
	   $brutto_betrag=$bruttobetrag * 0.5;
	
	   $mwst=$brutto_betrag/(100+$mw_st) * $mw_st;
	   $netto= $brutto_betrag/(100+$mw_st) * 100;
	
	   $brutto_betrag=number_format($brutto_betrag, 2, ".", ".");
	   $mwst=number_format($mwst, 2, ".", ".");
	   $netto=number_format($netto, 2, ".", ".");
		   
	
	

	
$sperren=mysqli_query($link," LOCK TABLES ueberweisung_nr write, ueberweisung_nr as ueberweisung_nr read ");
$select_ueb_nr = mysqli_query($link," select max(ueb_nr) + 1 as uebnr from ueberweisung_nr ");
while ($result_uebnr = mysqli_fetch_array( $select_ueb_nr, MYSQLI_BOTH ) ) {
$neueuebnr=$result_uebnr['uebnr'];
mysqli_query($link, "insert into ueberweisung_nr ( ueb_nr, kd_nr ) values ( '$neueuebnr', '$kd_nr_db' ) ");
mysqli_query($link, "UNLOCK TABLES");
}
	
	
// Zeile, wie sie ausgegegeben wird
	$zeile.="<tr><td>$adressen</td><td align='right'>$netto</td><td align='right'>$mwst</td><td align='right'>$brutto_betrag</td><td align='right'>
	<a href='http://192.168.2.106/gscheiderle/kasse/zahlung_mitarbeiter.php?email=$email_adresse&ueberweisung=$neueuebnr' target='_blank'>$email_adresse</a></td></tr>";
	
	
	
	mysqli_query($link,"insert into abrechnungen 
	(
	ueberweisung_nr,
	email,
	adresse,
    alle_tips,
	netto,
	mwst,
	brutto,
	datum
	)
	values
	(
	'$neueuebnr',
	'$email_adresse',
	'$adressen',
    '$alle_tip_id',
	'$netto',
	'$mwst',
	'$brutto_betrag',
	'$datum'
	)
	");
	
	

	
    $neueuebnr="";
    $kd_nr_db="";
	$bruttobetrag="";
	$adressen="";
}	


}  // ende abrechnung_start

?>