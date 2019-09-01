<?php
function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){return $db_ausdruck;}
	if($formular_ausdruck != ""){return $formular_ausdruck;}
  
  } 
  
function farbwechsel_gruen ($action) {
    
    $color="orange";
    
    if ($action == TRUE ) {$color="lightgreen";}
}

?>