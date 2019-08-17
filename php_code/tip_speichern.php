<?php


$rubrik_name=mysqli_query($link," select rubrik from rubriken where ru_id = '$_POST[rubrik]' ");
while ( $result_rubrik_name = mysqli_fetch_array( $rubrik_name, MYSQLI_BOTH )) {
	$rubrik_name=$result_rubrik_name['rubrik'];
}



if ( ( $_POST['name_speichern'] == "name_speichern" ) && ( $_POST[rubrik] != "no_value" ) && ( $_POST['tipname'] != "" ) ) {
    
   $result_1=mysqli_query($link,"select tipname from die_tips where tip = '$_POST[tipname]'");
   while (@$result_name=mysqli_fetch_array($result_1, MYSQLI_BOTH )){
   $name=$result_name['tip'];
    
   if ($name != "") {$hinweis_3="<br><font size='4'>Dieser Name ist schon vorhanden !</font>";}
   } // ende if

	
$tipname=htmlentities($_POST[tipname]);
    
$zufall=rand(1000,1000000);    
	
$query="insert into die_tips
(
tip,
rubrik,
ru_id,
code,
preis,
eigentuemer
)
values
(
'$tipname',
'$rubrik_name',
'$_POST[rubrik]',
'$zufall',
'$_POST[tip_preis]',
'$_COOKIE[eigentuemer]'
)
";
    
$name=mysqli_query($link, $query);
                    
$tip_id=mysqli_insert_id($link);
$hinweis_4="<br>Dieser TIP wurde mit der ID $tip_id gespeichert !<br>
Weiter geht's mit <a href='standartseite_korrigieren.html' target='_blanc'>Inhalte erstellen/ver&auml;ndern</a>";

// tip_text anlegen
mysqli_query($link,"insert into tip_texte 
(
tip_id, 
tip_nr,
titel
) 
values 
(
'$tip_id',
'$zufall',
'$_POST[tipname]'
)
");

$_POST['name_speichern'] = FALSE;
    
} // ende 1. if

else { if ( $_POST['name_speichern'] == TRUE ) { $hinweis_5=" TIP und/oder RUBRIK sind ohne Angabe! "; } }

?>