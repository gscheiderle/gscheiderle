<?php setcookie("pseudo_kd_nr","");
if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <!--<META HTTP-EQUIV="REFRESH"  CONTENT="3;URL=http://192.168.2.106/gscheiderle">-->
<title>Tipps von gscheiderle.de</title>
	
        <!--<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css">  Handy -->
		<!--<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style.css">  stehendes Rechteck -->
		<!--<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css">  grosser Bildschirm -->
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>
	
<script src="jquery-1.10.1.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
 /* Funktionsdefinition */
 function getWindowMeasurements(){
  $.ajax({
  /* An dieses Script werden die Daten gesendet */
  url: "php_code/__browser_fenster_auslesen_script.php",
  method: "POST",
  /* Die Notation "variable: wert" entspricht dem Versenden mit einem Formular
  * Hei?t: Im Zielscript kann man gesendete Daten wie aus einem Formular via $_POST['name_des_tags'] entgegen nehmen
  */
  data: {browser: window.navigator.userAgent, width: window.innerWidth, height: window.innerHeight},
  /*
  * Bei fehlerfreier Ausf?hrung des Zielscripts nimmt eine Funktion R?ckgaben vom Zielscript entgegen.
  * Das k?nnen sein:
  * - Eine Meldung ?ber Erfolg/Mi?erfolg einer Aktion
  * - Daten zur Weiterverarbeitung mit JS
  * - Eine Ausgabe einer Datenbankabfrage
  * Zur Weiterverarbeitung wird eine Funktion aufgerufen
  */
  success: function(data){msgFromScript(data);}
 });
}

/*
* R?ckmeldung vom PHP-Script (oder verarbeiten)
*/
function msgFromScript(data){
 /*
 * R?ckgaben werden i.d.R. mit json_encode kodiert
 */
 var msg = $.parseJSON(data);
 var ausgabe = "";
 for(var el in msg){
  ausgabe += el + ": " + msg[el] + "<br>";
 }
 $("#ausgabe").html(ausgabe);
}

/*
* Funktionsaufruf beim Seitenaufruf
*/
getWindowMeasurements();
});
// -->
</script>

</head>
	
	
<body>
		
<?php echo "<form method='POST' action='index.php'>"; ?>
	  

		
	

	
	
	<?php 
        


include("intern/mysql_connect_gscheiderle.php");
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("php_code/array_rubriken.php"); 
include("php_code/zufallszahl.php"); 

?>
	
	<?php include("seitenelemente/header.php"); 
	
?>
	


<br>
	
	
<div class="jumbotron text-center bg-secondary " >
	
		<h1 class="display-3"><font style="font-weight: 700; color: #fff;">Wertvolles<br>
			gibt es nicht umsonst</font>
		</h1>
</div>

<div class="container">
	
<div class="row">
		
   <?php echo "<div class='col-$md-7'>"; ?>
	
<h2 class="text-left text-primary"><font style="font-weight: 600;">Sie k&ouml;nnen sich f&uuml;r viel Geld coachen lassen. Oder: 
seien Sie neugierig und versuchen unsere Tipps!
</h2></font>
<h4>
	Wir bieten Ihnen hier eine Tip-Sammlung, die es in sich hat.<br>
	<ul>
	<li>Geld-Tipps</li>
	<li>Tipps f&uuml;r Ihre Sicherheit.</li>
<li>Tipps f&uuml;r Ihre Gesundheit.</li>
<li>Tipps f&uuml;r Ihr seelisches Wohlbefinden.</li>
	<li>Tipps f&uuml;r Ihre Wohnung (Feng Shui)</li>
	<li>und vieles mehr.</li>
</ul>
	
	Probieren Sie es aus.<br>
	Der Preis ist "very very low"!<br>
<br>
	Was? Sie sprechen nicht englisch?<br>
    Da sind wir doch schon im Gesch&auml;ft:<br><br>
	Wenn Sie keine grunds&auml;tzlichen Vorbehalte gegen die Firma hegen, benutzen Sie den GOOGL-&Uuml;bersetzer: 
<b><a href="https://translate.google.com/?hl=de" target="_blanc">HIER</a></b><br><br>

    Also der Preis ist "sehr sehr niedrig"!<br>
    So zwischen 1.- &euro; und 5.- &euro;, meistens.<br>
	Aber es gibt auch *-Premium-Tipps. <br>
    Die fallen dann aus dem diesem Preisrahmen.<br><br>

	
    <h4 class="bg-warning text-dark">Und dann haben Sie ja noch Ihr R&uuml;ckgaberecht.<br>
     Selbstverst&auml;ndlich neu und in der Orig.-Verpackung.<br>
	 Evtl. Portokosten tragen Sie selbst.</h3><br><br>

</h4>

	</div>	
	
	
<?php echo"<div class='col-$md-1'>
		<p></p>
	</div>	

	
<div class='col-$md-4'>	"; ?>
	
	<h2 class="text-left bg-warning text-dark"><font style="font-weight: 600;">Zu den Tipps:<br></h2>
	<h4><br>Vorab:<br>
    Wenn Sie zufrieden waren, empfehlen Sie uns an Ihre Freunde.<br><br>
    Wenn nicht, dann an die, die Sie evtl. nicht so gut leiden k&ouml;nnen.<br><br></h4>
			<h4 class="text-left text-primary">
			<ul>
				
				<?php
                
                
				foreach ( $rubrik_for_frontpage_3 as $key => $value ) {
					include("php_code/rubriken_zaehlen.php");
					print_r("<li><a href='tip_auswahl.php?forcex=$zufall_id&rubrik=$key' style='text-decoration: none;'>$value ($anzahl_db)</a></li>");
				}
				
				?>
			
				
				
				</ul>
			</h4>
	</div>
	</div>
	</div>
	

<div class="jumbotron text-center bg-secondary text-white" >
	
<?php include("seitenelemente/footer.html"); ?>
	
</div>
	



<body>
</body>
</html>