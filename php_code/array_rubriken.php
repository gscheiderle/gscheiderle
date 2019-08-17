<?php

// sucht die Rubriken für die Frontpage
// und erzeugt eine Zufallszahl 
// um die Rubrik zu verstecken


if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}
$vorne=substr("$zufall_id",0,13);
$hinten=substr("$zufall_id",13,19);
$rubrikv=$hinten;
$rubrikh=$vorne;

	
$rubrik_for_frontpage_1=array();
$rubrik_for_frontpage_2=array();
$rubrik_for_frontpage_3=array();

$select_rubriken=mysqli_query($link,"select ru_id, rubrik from rubriken");
while ( $result_select_rubriken = mysqli_fetch_array( $select_rubriken, MYSQLI_BOTH ) ) {
	
	$stringlaenge=strlen($result_select_rubriken[ru_id]);
	
	
$rubrik_for_frontpage_1[]=($stringlaenge.$rubrikv.$result_select_rubriken[ru_id].$rubrikh);
$rubrik_for_frontpage_2[]=($result_select_rubriken[rubrik]);
	
	
}

$rubrik_for_frontpage_3=array_combine($rubrik_for_frontpage_1,$rubrik_for_frontpage_2);

?>
