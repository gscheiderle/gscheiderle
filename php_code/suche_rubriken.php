<!--/*rubriken selectieren*/-->

<?php
	  
	  
	  
	  $suche_rubriken=mysqli_query($link," select ru_id, rubrik from rubriken ");
	  while ( $resultrubriken = mysqli_fetch_array( $suche_rubriken, MYSQLI_BOTH )) {
		  
		  $result_rubriken.="<option value='$resultrubriken[ru_id]'>".$resultrubriken['rubrik']."</option>";
	  }
	  
?>  