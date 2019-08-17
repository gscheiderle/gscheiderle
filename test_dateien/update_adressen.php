<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>update kd_nr</title>
<style type="text/css">

</style>
</head>
<body>	
	
<!--<form action="" method="POST">
	
	<button type="submit" name="start" value="start"> START</button>-->
	
<?php	
	
/*	include("intern/mysql_connect_gscheiderle.php");
	
	if ( $_POST['start'] == 'start') {
	
	$neue_kd_nr=10046;
	
	$select=mysql_query(" select kd_id from adressen");
	while($result=mysql_fetch_array($select)) {
		
		mysql_query("update adressen set kd_nr = '$neue_kd_nr' where kd_id = '$result[kd_id]' ");
		mysql_query("insert into kundennummer (kd_nr) values ('$neue_kd_nr') ");
		mysql_query("insert into kundennummer_kopie (kd_nr) values ('$neue_kd_nr') ");
		
		$neue_kd_nr++;
	}
		echo mysql_error();
	}*/
	
	?>
<!--</form>	-->
    
    formular ansehen …Quelltext …
<form action="senden.html" id="person">
    <label class="h2" form="person">Namenseingabe</label>
    <label for="vorname">Vorname</label> 
    <input type="text" name="vorname" id="vorname" maxlength="30">
 
    <label for="zuname">Zuname</label>  
    <input type="text" name="zuname" id="zuname" maxlength="40">

    <button type="reset">Eingaben zurücksetzen</button>
    <button type="submit">Eingaben absenden</button>

    </form>
</body>
</html>