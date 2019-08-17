<?php

// selectiere Rubrik-Nummer

$laenge_nummer_rubrik=substr("$_GET[rubrik]",0,1);

$nummer_rubrik=substr("$_GET[rubrik]",20,$laenge_nummer_rubrik);


echo "<input type='hidden' name='nummer_rubrik' value=' ".neuladen($nummer_rubrik, $_POST['nummer_brik'])." '>";


?>