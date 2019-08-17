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
    
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="../css/main.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)" href="../css/main_600.css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>

  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action=\"auswahl.php\" method=\"POST\">"; 



include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");


?>  
  

<!-- /////////////////////////////////////////////////////////////////////////////////// //-->

<div id="wrapper">
<div id="main_article">

<br><br><br>
<div align="center">
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
     


";


  ?>

  
  </div>


