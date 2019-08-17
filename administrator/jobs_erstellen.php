<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Tips + Rubriken speichern</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
	  
	  <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    
<style type="text/css">
#frame_1 { position:absolute; top:300px; left:0px;
      z-index:0;}
       </style>
       
<style type="text/css">
#p1 { padding-top: 3px; padding-left: 40px; background-color:yellow; font-size:170%; }

</style>
    
  </head>
  <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">
	  
<?php echo "<form method='POST' action='jobs_erstellen.php'>"; ?>
	  
	  

	
<?php 


if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}


	  
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");
include("../intern/funktionen.php");
include("../php_code/suche_rubriken.php");
include("../php_code/rubriken_speichern.php"); 
include("../php_code/tip_speichern.php"); 


?>
	
<table width="800px" height="100%" border="0" bgcolor="#FFFFFF">
<tr><td align="left" valign="top">
	
<?php 
	echo 
		"<p id='p1'>
		<t2>1. Bevor ein neuer Job angelegt wird Seite neu laden <a href='jobs_erstellen.php'>hier</a><br>
		2. Evtl. neue Rubrik anlegen.<br>
		3. Tip und Rubrik w&auml;hlen und speichern.</t2><br></p>"; 
?>
	<br>

	
<div class="button">
<h2>NEUE RUBRIK:<br>
<input type="text"  name="rubrik_anlegen" value="<?php echo $_POST['rubrik_anlegen']; ?>"></h2></div>
	
	
<div class="button">
<h2>NEUE RUBRIK ANLEGEN:<br>
	<button type="submit"  name="rubrik_speichern" value="rubrik_speichern">SPEICHERN</button></div>
	

	
<?php echo $hinweis_1; ?>
<?php echo $hinweis_2; ?>
	
	<br></h2>

	


<div class="button">	
<h2>RUBRIK:<br>
<select name="rubrik">
	<option value="no_value" selected></option>
<?php echo $result_rubriken; ?>	
</select></h2></div>
    
 <table>
    <tr>
     <td>   
<div class="button">
<h2>TIP:<br>
<input type="text"  name="tipname" value="<?php echo $_POST['tipname']; ?>"></h2></div>
        </td>
      <td>   
<div class="button">
<h2>PREIS:<br>
<input type="text"  name="tip_preis" value="<?php echo $_POST['tip_preis']; ?>"> &euro;</h2></div>       
                 
</td></tr></table>	
    
    

<div class="button_gross">	
	
<?php 
echo "
<button type='submit' name='name_speichern' value='name_speichern'>TIP + RUBRIK speichern</button>";
	
echo "<br><br>";

echo $hinweis_3;
echo $hinweis_4;	
echo $hinweis_5;
	
?>


</td>
</tr>
</table
</form>

  </body>
</html>