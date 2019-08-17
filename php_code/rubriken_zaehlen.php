<?php

$count_anzahl=mysqli_query($link," select count(rubrik) as anzahl from die_tips where rubrik = '$value' ");
while ( $counter = mysqli_fetch_array( $count_anzahl, MYSQLI_BOTH ) ) { 
$anzahl_db = $counter['anzahl']; 
}

?>
