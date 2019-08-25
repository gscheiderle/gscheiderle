<?php setcookie("pseudo_kd_nr","");
if (! isset( $_COOKIE['pseudo_kd_nr'] ) ) { setcookie("pseudo_kd_nr",$_GET['forcex']); } ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <!--<META HTTP-EQUIV="REFRESH"  CONTENT="3;URL=http://192.168.2.106/gscheiderle">-->
<title>Tipps von gscheiderle.de</title>
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php echo "<form method='POST' action='index.php'>"; ?>
	  
	  

	
<?php 
        
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/array_rubriken.php"); 
include("php_code/zufallszahl.php"); 


	?>
<div class="wrapper">
	
	
	<?php include("seitenelemente/header.php"); ?>
	
	
	
	<div class="ansage">
		
		<h1>Wertvolles<br>
			gibt es nicht umsonst  ;-)
		</h1>
	
	</div>
	
	
<div class="article_titel">
	
	
<h1>Anstatt sich f&uuml;r viel Geld <br>
	coachen lassen:</h1>
<h11>seien Sie neugierig und versuchen unsere Tipps!
</h11>
<h2>
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
    Die fallen dann aus dem diesem Preisrahmen.<br>

	
    <h3>&nbsp;Und dann haben Sie ja noch Ihr R&uuml;ckgaberecht.<br>
    &nbsp;Selbstverst&auml;ndlich neu und in der Orig.-Verpackung.<br>
	&nbsp;Evtl. Portokosten tragen Sie selbst.</h3>

</h2>
	</div>
	
	
<div class="aside">
	<h1>Zu den Tipps:<br></h1>
	<h3>Vorab:<br>
    Wenn Sie zufrieden waren, empfehlen Sie uns an Ihre Freunde.<br>
    Wenn nicht, dann an die, die Sie evtl. nicht so gut leiden k&ouml;nnen.</h3>
			<h2>
			<ul>
				
				<?php
                
                
				foreach ( $rubrik_for_frontpage_3 as $key => $value ) {
					include("php_code/rubriken_zaehlen.php");
					print_r("<li><a href='tip_auswahl.php?forcex=$zufall_id&rubrik=$key'>$value ($anzahl_db)</a></li>");
				}
				
				?>
			
				
				
				</ul>
			</h2>
	</div>
	
<?php include("seitenelemente/footer.html"); ?>

		
	</div> <!--ende wrapper-->
<body>
</body>
</html>