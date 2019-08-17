<?php if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<?php if (! isset( $_COOKIE['kd_nr'] ) ) { setcookie("kd_nr",$_POST['kd_nr_for']); } ?>
<?php if (! isset( $_COOKIE['vorname'] ) ) { setcookie("vorname",$_POST['vorname_for']); } ?>
<?php if (! isset( $_COOKIE['name'] ) ) { setcookie("name",$_POST['name_for']); } ?>
<?php if (! isset( $_COOKIE['email'] ) ) { setcookie("email",$_POST['email_for']); } ?>
<?php session_start(); ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  <!-- // <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
       
<title>Ggscheiderles Cart</title>
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php  
        
/* $form="<form method='POST' action='http://localhost/einloggen.php?kd_nr=$_POST[kd_nr_for]&name=$_POST[name_for]&vorname=$_POST[vorname_for]&email=$_POST[email_for]'>"; */
        
            $form="<form method='POST' action='http://localhost/einloggen.php?kd_nr=$_POST[kd_nr_for]&name=$_POST[name_for]&vorname=$_POST[vorname_for]&email=$_POST[email_for]'>";
        
	
echo $form;

        
     
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/einloggen_script.php");


?>		
		
	
<div class="wrapper">
	

	<?php include("seitenelemente/header.html"); ?>
    
    <div class="nav">
    
<?php include("seitenelemente/navigation.php"); ?>
    
    </div>
    

    <div class="article">
        
        
        <div align="center">
    <table>
        
        <tr>
            <td align="center">
            <h1>E-Mail-Eingabe:</h1>
        </td>
    </tr>
 
        
 <?php     
    $color_2="#F09B9C";    
        
    if ( $_POST['email_check'] == TRUE ) { 
         $color_2="lightgreen"; 
         }
        ?>
        
        
    <tr>
        <td align="center">
            <input type='text' name='email_form' value='<?php echo $_POST['email_form']; ?>' style=' height: 40px; width: 500px; background-color: <?php echo $color_2 ?>'><br><br>
            <?php $_SESSION['email']=$_POST['email_form']; ?>
            <button type='submit' name='email_check' value='email_check' style=' font-size: 24px; height: 40px; width: 500px; background-color: <?php echo $color_2 ?>'>eMail-Check</button>
        </td>
    </tr>
    
 <?php 
        
        
        
        
        
        
    $beschriftung_button="Passwort-Check";
    $color_1="#F09B9C";    
        
    if ( $_POST['password_check'] == TRUE ) { 
         $beschriftung_button="jetzt einloggen"; 
         $color_1="lightgreen"; 
    }
        
       
    
    if ( ( $_POST['emailcheck'] == TRUE )  || (  $emailcheck == TRUE ) )  {   
    
        
              
    
    echo "
    <tr>
        <td align='center'>
            <h1>Passwort-Eingabe:</h1>
        </td>
    </tr>
    
    <tr>
        <td align='center'>
            <input type='password' name='pass_word' value='' style=' font-size: 24px; height: 40px; width: 500px; background-color: $color_1;'><br><br>
            <button type='submit' name='password_check' value='password_check' style=' font-size: 24px; height: 40px; width: 500px; background-color: $color_1; '>$beschriftung_button</button>
        </td>
    </tr>";
    
}
    
        include("php_code/einloggen_script_1.php");
        
        ?>
        
        
        
        
        <input type="text" name="kd_nr_for" value="<?php echo neuladen($kd_nr_db, $_POST[kd_nr_for]); ?> ">
        <input type="text" name="name_for" value="<?php echo neuladen($name_db, $_POST[name_for]); ?> ">
        <input type="text" name="vorname_for" value="<?php echo neuladen($vorname_db, $_POST[vorname_for]); ?> ">
        <input type="text" name="email_for" value="<?php echo neuladen($email_db, $_POST[email_for]); ?> ">
        <input type="text" name="passwortcheck" value="<?php echo neuladen($passwortcheck, $_POST[passwortcheck]); ?> ">
        <input type="text" name="emailcheck" value="<?php echo neuladen($emailcheck, $_POST[emailcheck]); ?> ">
        <input type="text" name="check" value="<?php echo neuladen($check, $_POST[check]); ?> ">
        
        
        
        
        
        <tr>
            <td align="center" height='70px' valign='bottom'>
     
    <?php 
                
    
    if   ( ( $_POST['emailcheck'] == TRUE ) && ( $_POST['passwortcheck'] == TRUE ) ) 
        
        {
    
         
        // echo "<a href='http://localhost/kasse/zahlung_abschliessen.php'><h1>Zur Kasse</a>";
        echo "<a href='http://localhost/kasse/zahlung_abschliessen.php'><h1>Zur Kasse</a>";
        
        }  
        
    ?>
        </td>
     </tr>
  </table>

        </div>
    </div> <!-- ende artikel-->
    
    

    
    

    </form>
    
	<?php include("seitenelemente/footer.html"); ?>
	
	
		  </div> 	<!-- ende div wrapper -->
	</body>
</html>
	