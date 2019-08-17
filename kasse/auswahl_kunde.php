<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kunde / Neu-Kunde</title>
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../ckeditor/css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="../css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="../css/style_1200.css"> <!-- grosser Bildschirm -->
<script>
var __adobewebfontsappname__="dreamweaver"
</script>

<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>

<style type="text/css">
</style>
</head>
	
<body>

<div class="wrapper">	
	
	
<?php 
    
$up="../";

include("../intern/mysql_connect_gscheiderle.php"); 
include("../intern/parameter.php");
include("../intern/funktionen.php");
	
	
	include("../seitenelemente/header.html");
	
echo "<div class='nav'>";	
	
	include("../seitenelemente/navigation.php");
	
echo "</div>";		
	

	
echo "<div class='article'>";
	
?>
    
    
<div align="center">
<table border="0" style="width: 40em; height: 400px;">
       
        
<tr>
    <td width="80%" align="center">
        <h2>Ich bin schon Kunde</h2>  
    </td>
    
    <td align="left" valign="middle">
            
        <a href="https://www.gscheiderle.de/einloggen.php" style="text-decoration:none">
        <img src="https://www.gscheiderle.de/images_system/knopf_gross.png" style="width:80px; height: 80px"></a></h1>
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
         <a href="https://www.gscheiderle.de/kasse/index.php" style="text-decoration:none">
         <img src="https://www.gscheiderle.de/images_system/knopf_gross.png" style="width:80px; height: 80px"></a></h1>
    </td>
</tr>
    
    
 </table>
	
 </div> <!-- article //--> 

 </div> <!-- wrapper //--> 


<?php 

include("../seitenelemente/footer.html");

?>

		</form>
	</body>
</html>

<body>
</body>
</html>