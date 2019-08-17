<?php


/*einloggen*/

 $emailcheck = FALSE; 
 $passwortcheck = FALSE; 
 $check=FALSE;



if ( $_POST['email_check'] == "email_check" )  {
    
    $select_email=mysqli_query($link,"select email from passwords where email = '$_POST[email_form]' ");
    while ($emaildb = mysqli_fetch_array($select_email, MYSQLI_BOTH )) {
        
    $email_db=$emaildb['email'];
}
    
    if ( ( $_POST['email_form'] != $email_db ) || ( $_POST['email_form'] == "" ) ) { 
        
       
        $fehler_1="<tr><td>Etwas stimmt nicht !</td></tr>";
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
     
     