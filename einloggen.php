<?php if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<?php if (! isset( $_COOKIE['kd_nr'] ) ) { setcookie("kd_nr",$_POST['kd_nr_for']); } ?>
<?php if (! isset( $_COOKIE['vorname'] ) ) { setcookie("vorname",$_POST['vorname_for']); } ?>
<?php if (! isset( $_COOKIE['name'] ) ) { setcookie("name",$_POST['name_for']); } ?>
<?php if (! isset( $_COOKIE['email'] ) ) { setcookie("email",$_POST['email_for']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  <!-- // <META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
       
<title>Ggscheiderle einloggen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
		
</head>
	<body>
		
<?php  
        
$form="<form method='POST' action='http://192.168.2.106/gscheiderle/einloggen.php?kd_nr=$_POST[kd_nr_for]&name=$_POST[name_for]&vorname=$_POST[vorname_for]&email=$_POST[email_for]'>";
        
	
echo $form;

        
     
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");

?>		

	

<?php include("seitenelemente/header.html"); ?>
    
<br>
<br>

    
<?php 
include("seitenelemente/navigation.php"); 
?>    

<br>
<br>

<div class="container"> 
        
  <div class="row">
		
    <div class="col-md-3 ">
     </div>
    
       <div class="col-md-6 bg-white text-info" style="text-align: center;">
            <h1>E-Mail- u. Passwort-Check</h1>
	  </div>
		   
       <div class="col-md-3 ">
      </div>
	</div>
</div>
		
	  
        
<?php     
        
    $beschriftung_button_2="E-Mail-Check";
    $color_2="#F09B9C";    
        
    if ( $_POST['email_check'] == TRUE ) { 
        
        $beschriftung_button_2="Bitte Klick wiederholen";
        $color_2="lightgreen"; 
    }
        ?>
 <div class="container">    
	 
  <div class="row">
		
    <div class="col-md-1 ">
     </div>
    
       <div class="col-md-5 bg-white text-dark" style="text-align: center;">

            <input type='text' name='email_form' value='<?php echo $_POST['email_form']; ?>' style=' height: 40px; width: 100%; background-color: <?php echo $color_2 ?>'><br><br>
            <button type='submit' name='email_check' value='email_check' style=' font-size: 24px; height: 40px; width: 100%; background-color: <?php echo $color_2 ?>'><?php echo $beschriftung_button_2; ?> </button>
	 </div>
		
		
    
 <?php 
        
 $beschriftung_button="Passwort-Check";
    $color_1="#F09B9C";    
        
    if ( $_POST['password_check'] == TRUE ) { 
         $beschriftung_button="jetzt einloggen"; 
         $color_1="lightgreen"; 
    }
        
       
    
    if ( ( $_POST['emailcheck'] == TRUE )  || (  $emailcheck == TRUE ) )  {   
		
	echo "<div class='col-md-5 bg-white text-dark' style='text-align: center;'>";	
    
    echo "<input type='password' name='pass_word' value='' style=' font-size: 24px; height: 40px; width: 100%; background-color: $color_1;'><br><br>
          <button type='submit' name='password_check' value='password_check' style=' font-size: 24px; height: 40px; width: 100%; background-color: $color_1; '>$beschriftung_button</button>";
	echo "</div>";	
        }
	 
    echo "<div class='col-md-1'>
     	 </div>
	 	 </div>
	 	 </div>";
	 
        include("php_code/einloggen_script.php");
		
		echo "<input type='hidden' name='emailcheck' value='"; echo neuladen($emailcheck, $_POST[emailcheck]); echo "'>";
		
        include("php_code/einloggen_script_1.php");
		
        
        ?>
        
        
        <?php
        
        echo "<input type='hidden' name='kd_nr_for' value='"; echo neuladen($kd_nr_db, $_POST[kd_nr_for]); echo "'>";
        echo "<input type='hidden' name='name_for' value='"; echo neuladen($name_db, $_POST[name_for]); echo "'>";
        echo "<input type='hidden' name='vorname_for' value='"; echo neuladen($vorname_db, $_POST[vorname_for]); echo "'>";
        echo "<input type='hidden' name='email_for' value='"; echo neuladen($email_db, $_POST[email_for]); echo "'>";
        echo "<input type='hidden' name='passwortcheck' value='"; echo neuladen($passwortcheck, $_POST[passwortcheck]); echo "'>";
		echo "<input type='hidden' name='check' value='"; echo neuladen($check, $_POST[check] ); echo "'>"; 
     
        ?>
        
        
        
        <tr>
            <td align="center" height='70px' valign='bottom'>
     
    <?php 
                
    
    if   ( ( $_POST['emailcheck'] == TRUE ) && ( $_POST['passwortcheck'] == TRUE ) ) 
        
        {
		
echo "		
<br>
<br>

<div class='container'> 
        
  <div class='row'>
		
    <div class='col-md-3'>
     </div>
    
       <div class='col-md-6 bg-white text-info' style='text-align: center;''>
            <h1><a href='http://192.168.2.106/gscheiderle/kasse/zahlung_abschliessen.php'><h2>Zur Kasse</a></h1>
	  </div>
		   
       <div class='col-md-3'>
      </div>
	</div>
</div> ";
    
}  
        
    ?>

    
    	<br><br>
      
<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>
	
	 </form>
	</body>
</html>
	