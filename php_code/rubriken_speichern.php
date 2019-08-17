<!--/* Neue Rubriken in Datenbank
       Tabelle "Rubriken" speichern

       Nach Doppelten suchen */-->

	
	<?php
	
	if ( ( $_POST['rubrik_speichern'] == "rubrik_speichern" ) && ( $_POST['rubrik_anlegen'] != "" ) ) { // start if_speichern
		
 			$sucherubriken=mysqli_query($link," select ru_id from rubriken where rubrik = '$_POST[rubrik_anlegen]' ");
	  					   while ( $res_rubriken = mysqli_fetch_array( $sucherubriken, MYSQLI_BOTH ) ) 
						 
				   { // start while
							   
						 $resrubriken=$res_rubriken['ru_id'];
						   
				   }  // ende while
		
		
							   
				         if ( $resrubriken < 1 ) 
							 
				  { // start if_nicht_vorhanden
		
							 mysqli_query($link, "insert into rubriken (rubrik) values ( '$_POST[rubrik_anlegen]' ) " ); 
		
	   						$hinweis_1="Nach dem Speichern einer neuen Rubrik, <br>
				     		steht diese erst nach einem erneuten Laden dieser Seite<br>
				      		unten in der Auswahl zur Verf&uuml;gung !<br> "; 
				 } // ende if_vorhanden
	 		       
	
			           if ( $resrubriken > 1 ) 
					   
			    { // start if_vorhanden
		
				          $hinweis_2="<b>Diese Rubrik ist so oder &auml;nlich schon vorhanden.</b><br> "; 
	
		        } // ende if_vorhanden
		
		
	              
				} // ende if_speichern


	?>