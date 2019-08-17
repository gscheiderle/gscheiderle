<?php
function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 
  
function farbwechsel_gruen ($action) {
    
    $color="orange";
    
    if ($action == TRUE ) {$color="lightgreen";}
}

?>