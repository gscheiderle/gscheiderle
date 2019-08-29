<?php


/*einloggen*/

 $emailcheck = FALSE; 
 $passwortcheck = FALSE; 
 $check=FALSE;



if ( $_POST['email_check'] == "emailcheck" )  {
	
	 
    
    $select_email=mysqli_query($link,"select email, zugang from passwords where email = '$_POST[email_form]' ");
    while ($emaildb = mysqli_fetch_array($select_email, MYSQLI_BOTH )) {
        
    $email_db=$emaildb['email'];
	$zugangdb=$emaildb['zugang'];
}
	
    
    if ( ( $_POST['email_form'] != $email_db ) || ( $_POST['email_form'] == "" ) ) { 
        
       
        echo $fehler_1="<div align='center'><h3><br>Etwas stimmt nicht !</h3></div>";
        $color="orange";
        $emailcheck = FALSE; 
        $passwortcheck = FALSE; 
        $check=FALSE;
        
    }
    
    if ( ( $_POST['email_form'] == $email_db ) && ( $_POST['email_form'] != "" ) ) { 
		
        
                $emailcheck = TRUE; 
                $check=FALSE;
        
        $color="lightgreen"; 
    }
}
    

?>

<input type="hidden" name="emailcheck" value="<?php echo neuladen($emailcheck, $_POST['emailcheck']); ?>">

     
<?php 


   if ( ( $_POST['password_check'] == 'passwordcheck' ) && ( $_POST['emailcheck'] == TRUE ) ) {
	   
     
	   
    $select_pw=mysqli_query($link,"select password from passwords where email = '$_POST[email_for]' ");
    while ($pwdb = mysqli_fetch_array($select_pw, MYSQLI_BOTH )) {

    $password_db=$pwdb['password'];
}   
	  $pass_word=md5($_POST['pass_word']);
	   
	   
     
    if ( $pass_word != $password_db ) { 
        
        $passwortcheck = FALSE; 
        
        $check=FALSE;
        $color_pw="orange";
        $fehler_2="<div align='center'><h3><br>Etwas stimmt hier nicht !</h3></div>";
      }
       
      if ( $pass_word === $password_db ) { 
          
          
        $select_adresse=mysqli_query($link," select kd_nr, name, vorname, eigentuemer from adressen where email = '$email_db' or email = '$_POST[email_for]' ");
        while ( $adressen_result = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
              $kd_nr_db=$adressen_result['kd_nr'];
              $name_db=$adressen_result['name'];
              $vorname_db=$adressen_result['vorname'];
              $eigentuemer_db=$adressen_result['eigentuemer'];
        
                }
          
            $color_pw="lightgreen";
            $passwortcheck = TRUE; 
            $check=TRUE;
             
		  
           }
       }

echo "<input type='hidden' name='zugang' value='".neuladen($zugangdb,$_POST['zugang'])."'>";
?>

     