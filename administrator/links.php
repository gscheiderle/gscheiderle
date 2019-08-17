<?php include("parameter.php"); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Links</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
    
    
<script type="text/javascript">
<!--
window.onload=montre;
function montre(id) {
var d = document.getElementById(id);
	for (var i = 1; i<=10; i++) {
		if (document.getElementById('smenu'+i)) {document.getElementById('smenu'+i).style.display='none';}
	}
if (d) {d.style.display='block';}
}
//-->
</script>

<style><!--	
				a			{text-decoration:none;}
//--></style>



    
  </head>
  <body <?php echo $bg_color; ?>link="#FFFFFF" vlink="#FFFFFF" alink="#000000" topmargin="30px" leftmargin="0px">

<?php

echo "
<table border=\"0\" height=\"200\" width=\"200\" valign=\"top\" bgcolor=\"#ff6600\" cellspacing=\"5\" cellpadding=\"0\">


<tr>
<td valign=\"top\" height=\"100%\"><fonts color=\"#FFFFFF\">";

echo links("
<div id=\"menu\">

		<dt onclick=\"montre('smenu1');\"><a href=\"../wechselseiten/begruessung.php\"  target=\"main\">HOME</a></dt>
      
<hr>			
		<dt onclick=\"montre('smenu2');\"><a href=\"../wechselseiten/leistungen.php\"  target=\"main\">LEISTUNGANGEBOTE</a></dt>

<hr>	
		<dt onclick=\"montre('smenu3');\"><a href=\"../wechselseiten/kosmetik.php\"  target=\"main\">KOSMETISCHE<br>BEHANDLUNGEN</a></dt>

      
<hr>		
		<dt onclick=\"montre('smenu4');\"><a href=\"../wechselseiten/depilation.php\"  target=\"main\">DEPILATION /
    <br>HAARENTFERNUNG</a></dt>
			<dd id=\"smenu4\">
      <ul><li><a href=\"../wechselseiten/sugaring.php\"  target=\"main\">$sublink_size Sugaring</font></a></li></ul>
      </dd>
<hr>		
		<dt onclick=\"montre('smenu5');\"><a href=\"../wechselseiten/massagen.php\"  target=\"main\">MASSAGEN</a></dt>

<hr>		
		<dt onclick=\"montre('smenu6');\"><a href=\"../wechselseiten/fuesse.php\"  target=\"main\">FUSSPFLEGE</a></dt>
			<dd id=\"smenu6\">
				<ul>
        <li><a href=\"../wechselseiten/spangentechnik.php\"  target=\"main\">$sublink_size Spangentechnik</font></a></li>
        </ul>
			</dd>
<hr>		
		<dt onclick=\"montre('smenu7');\"><a href=\"../wechselseiten/pmu.php\"  target=\"main\">PERMANENT<br>
    MAKE UP</a></dt>
			<dd id=\"smenu7\">
				<ul>
        <li>
        <a href=\"../wechselseiten/augenbrauen.php\"  target=\"main\">$sublink_size Augenbrauen</font></a></li>
					<li><a href=\"../wechselseiten/augenmakeup.php\"  target=\"main\">$sublink_size Lidstrich</font></a></li>
          <li><a href=\"../wechselseiten/lippen.php\"  target=\"main\">$sublink_size Lippen</font></a></li>
          <li><a href=\"../wechselseiten/fragen_pmu.php\"  target=\"main\">$sublink_size Fragen zum PMU</font></a></li>
				</ul>
			</dd>
<hr>		
		<dt onclick=\"montre('smenu8');\"><a href=\"../wechselseiten/med_pigmentierung.php\"  target=\"main\">MEDIZINISCHE<br>PIGMENTIERUNG</a></dt>

      

<hr>		
		<dt onclick=\"montre('smenu9');\"><a href=\"../wechselseiten/produkte.php\"  target=\"main\">PRODUKTPALETTE</a></dt>

<hr>		
		<dt onclick=\"montre('smenu10');\"><a href=\"../wechselseiten/preisliste.php\"  target=\"main\">AUSZUG AUS DER
    <br>PREISLISTE</a></dt>

	</dl>
  <hr>		
		<dt onclick=\"montre('smenu11');\"><a href=\"../wechselseiten/angebot.php\"  target=\"main\">AKTUELLE
    <br>ANGEBOTE</a></dt>

	</dl>
	</div>
");

$browser= $_SERVER['HTTP_USER_AGENT'];

if(preg_match("MSIE",$browser))
{
if(!(preg_match("MSIE 10",$browser))) {
echo "Sie benutzen einen Microsoft Internetexplorer Version kleiner 10.<br>
Da kann es zu Darstellungs-Problemen kommen.<br>
MSIE 10.0 erhalten Sie <a href=\"http://windows.microsoft.com/de-DE/internet-explorer/downloads/ie-10/worldwide-languages\" target=\"_blanc\">hier</a> oder verwenden einen einen anderen Browser,
z.B. Firefox, Chrome, Opera, Safari u.a.";
}
}

?>




<?php 
include("counter.php");
?>

</td>
</tr>

</table>

 
  </body>
</html>