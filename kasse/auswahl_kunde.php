<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kunde / Neu-Kunde</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>
<script>
var __adobewebfontsappname__="dreamweaver"
</script>

<script> 
	<src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>

</head>
	
<body>


<?php 
    
$up="../";

include("../intern/mysql_connect_gscheiderle.php"); 
include("../intern/parameter.php");
include("../intern/funktionen.php");
?>	
	
<?php 
echo "<div class='container'>";		
include("../seitenelemente/header.html"); 
echo "</div>";
	?>
	    
<br>
<br>

    
<?php 
include("../seitenelemente/navigation.php"); 
?>

    
    
<div align="center">
<table border="0" style="width: 60%; height: 400px;">
       
        
<tr>
    <td width="80%" align="left">
        <h2>Ich bin schon Kunde</h2>  
    </td>
    
    <td align="leright" valign="middle">
            
        <a href="http://192.168.2.106/gscheiderle/einloggen.php" style="text-decoration:none">
        <img src="http://192.168.2.106/gscheiderle/images_system/knopf_gross.png" style="width:80px; height: 80px"></a></h1>
    </td>
</tr>
    
    
<tr>
    <td  colspan="2" align="center">
        
    </td>
</tr>
    
    
<tr>
    <td width="80%" align="left" valign="middle">
        <h2>Ich bin NEU-Kunde
    </td>
        
    <td align="left" valign="middle">
         <a href="http://192.168.2.106/gscheiderle/kasse/index.php" style="text-decoration:none">
         <img src="http://192.168.2.106/gscheiderle/images_system/knopf_gross.png" style="width:80px; height: 80px"></a></h1>
    </td>
</tr>
    
    
 </table>
	



<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("../seitenelemente/footer.html"); ?>
	
</div>

		</form>
	</body>
</html>

<body>
</body>
</html>