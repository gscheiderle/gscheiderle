<?php 
include("../intern/css/hauptmenue.css");
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="de">
<head>
<meta http-equiv="content-type" content="text/html;
charset=ISO-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>Vertikale Ausklapp-Navigation</title>
<meta http-equiv="Content-Style-Type" content="text/css">


</head>

<body <?php echo $bg_color; ?>>
<form>
<table width="200px">
<tr><td width="200px" <?php echo $bg_color; ?> valign="top">
<br>
<font size="4" face="arial" color="#000000"><b>

So schaut's aus:<br><br>

<div id="menu"><!-- öffnet die Navigationsleiste-->

<?php include("../intern/hauptmenu.php"); ?>

</div><!-- schließt die Menüleiste #menu -->
<br><br><input type="submit" value="Seite auffrischen">
</td><td width="220px">


</body>

</html>