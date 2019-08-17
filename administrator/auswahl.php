<?php
setcookie("kd_nr",substr("$_GET[breackiex]",19,5));
setcookie("session_email",$_GET['session_email']);
setcookie("eigentuemer",$_GET['homer']);


/*  if (isset($_COOKIE['reverenz'])) {
    foreach ($_COOKIE['reverenz'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        $kunden_nummer= $value;
    } 
} */

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>$uwesack Termin-Details</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="../css/main.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)" href="../css/main_600.css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
	  
	  <!--<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>-->

  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action=\"auswahl.php\" method=\"POST\">"; 



include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");

echo $_POST['homer'];
?>  
  

<!-- /////////////////////////////////////////////////////////////////////////////////// //-->

<div id="wrapper">
<div id="main_article">

<br><br><br>
<div align="center">
<table width="600px">
<tr>
<?php


echo "

        <td width=\"50%\" height=\"30px\" align=\"left\" valign=\"top\" bgcolor=\"#ffffff\"><br>
        <h2>
         <a href=\"tips_bearbeiten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Rubriken/Tips erstellen</a>
        <br><br>
         
        <a href=\"tips_gestalten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Inhalte f&uuml;r Tips erstellen</a>
        <br><br>
        
        
        <a href=\"bilder_bearbeiten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Bilder hochladen</a>
        <br><br>
        
        <a href=\"termine_anlegen.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Termine anlegen</a>
        <br><br>
        
        <a href=\"maske_termine_korrektur.php\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Termin-Korrektur</a>
        <br><br>
        
        <a href=\"farben_bearbeiten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Farben bearbeiten</a>
        <br><br>
        <t>
       
         <td width=\"50%\" height=\"30px\" align=\"left\" valign=\"top\" bgcolor=\"#ffffff\"><br>
        <h2>
         <a href=\"neue_adressen_anlegen.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Adressen anlegen</a>
        <br><br>
        
        
        <a href=\"adressen_bearbeiten.php\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>Adressen bearbeiten</a>
        <br><br>
        
        <a href=\"emails_korrigieren.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>eMails korrigieren</a>
        <br><br>

        
        <a href=\"emailadressen_selectieren.php\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>eMail selectieren</a>
        <br><br>
        
         <a href=\"emails_versenden.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>eMails gestalten</a>
        <br><br>
        
       <a href=\"email_gruppen_bearbeiten.html\" target=\"_blanc\" style=\" text-decoration: none;\"><h21>eMail-Gruppen</a><br><br>
        
        </h21>
        </td>
     </tr>
     
          <tr><td colspan='2' bgcolor='yellow'> <br>&nbsp;
      <a href=\"emailautoversand.php\" target=\"_blanc\"\"><font style=\" size: 48pt; color: #000000\">Auto-E-Mail-Versand</a><br><br>
     </td></tr>
	 
	         <tr><td colspan='2' bgcolor='yellow'> <br>&nbsp;
      <a href=\"http://localhost/kasse/rechnung_abfrage.php\" target=\"_blanc\"\"><font style=\" size: 48pt; color: #000000\">Rechnung selectieren</a><br><br>
     </td></tr>
	 
	 	         <tr><td colspan='2' bgcolor='yellow'> <br>&nbsp;
      <a href=\"http://localhost/kasse/abrechnung_mitarbeiter.php\" target=\"_blanc\"\"><font style=\" size: 48pt; color: #000000\">Abrechnung Mitarbeiter</a><br><br>
     </td></tr>
     

";


  ?>

  
  </div>


