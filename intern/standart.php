<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Frontpage Petra Herz</title>

<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="css/main.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)"   href="css/basics_600.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="css/basics.css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>
</head>

<body>
<?php include("intern/mysql_connect_herz.php"); ?>
<div id="wrapper">

  <?php include("intern/kopf.php"); ?>
  
  <p>&nbsp;</p>
  

  <div id="basic_texte">
  <?php $select_texte=mysqli_query($link,"select text from seitentext where seiten_id = '$_GET[seitenid]' "); 
  while ( $result_texte = mysqli_fetch_array($select_texte, MYSQLI_BOTH ) ) {
	  echo $result_texte['text'];
  }
  
  
  echo "</div>
  <p>&nbsp;</p>";
  
  include("intern/footer.php");
  
  ?>
  
  </div>
  
  