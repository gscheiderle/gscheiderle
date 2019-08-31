<?php
setcookie("kd_nr",substr("$_GET[breackiex]",19,5));
setcookie("session_email",$_GET['session_email']);
setcookie("eigentuemer",$_GET['homer']);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Seiten-Auswahl</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	

  </head>
	
	
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action=\"auswahl.php\" method=\"POST\">"; 



include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");


?>  
  

<!-- /////////////////////////////////////////////////////////////////////////////////// //-->

<?php include("seitenelemente/header.php"); ?>
    
<br>
<br>

    
<?php 
include("seitenelemente/navigation.php"); 
   
echo "<div class='container'>";
echo  "<div class='row'>
		
    <div class='col-$md-3'>
     </div>
    
      <div class='col-$md-6 bg-white text-white' style='text-align: center;'>";	
	 ?> 
	
<table width="600px">
<tr>
<?php
echo $_POST['homer'];

echo "

        <td width=\"50%\" height=\"30px\" align=\"left\" valign=\"top\" bgcolor=\"#ffffff\"><br>
        <h2>
         <a href=\"tips_bearbeiten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Rubriken/Tips erstellen</a>
        <br><br>
         
        <a href=\"tips_gestalten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Inhalte f&uuml;r Tips erstellen</a>
        <br><br>
        
        
        <a href=\"bilder_bearbeiten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Bilder hochladen</a>
        <br><br>
        
        </td>
     </tr>
	 </table>
     ";


 

  
echo "</div>

    <div class='col-$md-3'>
     </div>
</div>
</div>";
?>	  
		  
<div class="jumbotron text-center bg-success text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>


				
</form>
</body>
</html>

