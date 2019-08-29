<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
   <!--<META HTTP-EQUIV="REFRESH"  CONTENT="10;URL=http://192.168.2.106/gscheiderle/standartseite.php">-->
       
<title>Ggscheiderles Cart</title>
		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="css/style_1200.css"> <!-- grosser Bildschirm -->

		
		
</head>
	<body>
		
<?php  $form="<form method='POST' action='http://192.168.2.106/gscheiderle/einloggen.php?kd_nr=$_POST[kd_nr_for]&name=$_POST[name_for]&vorname=$_POST[vorname_for]&email=$_POST[email_for]'>"; 
        
       
     if ( ( $_POST['password_check'] == "password_check" ) && ( $passwortcheck == TRUE ) ) {
     $form="<form method='POST' action='http://192.168.2.106/gscheiderle/kasse/zahlung_abschliessen.php?kd_nr=$_POST[kd_nr_for]&name=$_POST[name_for]&vorname=$_POST[vorname_for]&email=$_POST[email_for]'>"; 
 }         
	  
	
echo $form;

        
     
include("intern/parameter.php");
include("intern/funktionen.php"); 
include("intern/mysql_connect_gscheiderle.php");
include("php_code/einloggen_script.php");

?>		
		
	
<div class="wrapper">
	

	<?php include("seitenelemente/header.php"); ?>
    
    <div class="nav">
    
<?php include("seitenelemente/navigation.php"); ?>
    
    </div>
    

    <div class="article">
 <h4> 
<B>IMPRESSUM</B>
<br><br><br>

WEBSITE UND SHOP F&Uuml;R IMATERIELLE G&Uuml;TER<br>
GSCHEIDERLE.DE<br><br>

Name und Anschrift des Verantwortlichen:<br><br>
Der Verantwortliche im Sinne der EU-Datenschutz-Grundverordnung sowie sonstiger datenschutzrechtlicher Bestimmungen ist:<br>

Inhaber: Uwe Sack <br>
Am Mittelberg 2<br>
69439 Zwingenberg<br>
Telefon +49 (0)6263 428998
E-Mail: usnh2000@yahoo.de
Website: http://192.168.2.106/gscheiderle/
    
    
 <br><br><br>
<B>DATENSCHUTZERKL&Auml;RUNG</B>
<br><br><br>
Name und Anschrift des Verantwortlichen:<br><br>
Der Verantwortliche im Sinne der EU-Datenschutz-Grundverordnung sowie sonstiger datenschutzrechtlicher Bestimmungen ist:<br>
WEBSITE UND SHOP F&Uuml;R IMATERIELLE G&Uuml;TER<br>
GSCHEIDERLE.DE<br>
Inhaber: Uwe Sack <br>
Am Mittelberg 2<br>
69439 Zwingenberg<br>
Telefon +49 (0)6263 428998
E-Mail: usnh2000@yahoo.de
Website: http://192.168.2.106/gscheiderle/

<b>Wir respektieren Ihre Daten!</b><br><br>
Wir freuen uns &uuml;ber Ihr Interesse an unserem Internetauftritt. Das Vertrauen aller Besucher und Kunden, die Sicherheit Ihrer Daten und der Schutz Ihrer Privatsph&auml;re sind f&uuml;r uns von zentraler Bedeutung. Ihre personenbezogenen Daten werden von uns daher gem&auml;&szlig; den g&uuml;ltigen gesetzlichen Datenschutzvorschriften und dieser Datenschutzerkl&auml;rung behandelt. Personenbezogene Daten sind Informationen, die dazu genutzt werden k&ouml;nnen, um Ihre Identit&auml;t zu erfahren, wie beispielsweise Ihr richtiger Name, Ihre Adresse oder Ihre Telefonnummer. <br>
Wenn Sie unsere Seite ansehen und benutzen, ohne sich zu registrieren oder uns anderweitig ausdr&uuml;cklich Informationen zu &uuml;bermitteln, verarbeiten wir die Daten, die uns mit jeder Anfrage Ihres Browsers &uuml;bermittelt werden (siehe unten "Protokoll-Daten) nicht.<br>
Sofern Sie uns ausdr&uuml;cklich personenbezogene Daten &uuml;bermitteln (z.B. &uuml;ber unser Kontaktformular), erfolgt dies ausschlie&szlig;lich zweckgebunden an die Anfrage bzw. den jeweiligen Auftrag. Wir weisen Sie darauf hin, dass die Daten&uuml;bertragung im Internet nie vollst&auml;ndig gegen einen Zugriff durch Dritte gesch&uuml;tzt werden kann.<br>
Nachfolgend m&ouml;chten wir Ihnen n&auml;her erl&auml;utern, welche Daten wir wann und zu welchem Zweck verarbeiten. Es wird erkl&auml;rt, wie unsere angebotenen Dienste arbeiten und wie hierbei der Schutz Ihrer personenbezogenen Daten gew&auml;hrleistet wird.<br><br>

<b>Rechtsgrundlage f&uuml;r die Verarbeitung personenbezogener Daten<br></b>
Sofern wir f&uuml;r Verarbeitungsprozesse personenbezogener Daten eine Einwilligung der betroffenen Person einholen, dient Art. 6 Abs. 1 lit. a DSGVO als Rechtsgrundlage.
F&uuml;r die Verarbeitung von personenbezogenen Daten, die zur Erf&uuml;llung eines Vertrages, dessen Vertragspartei die betroffene Person ist, erforderlich ist, dient Art. 6 Abs. 1 lit. b DSGVO als Rechtsgrundlage. Dies gilt auch f&uuml;r Verarbeitungsvorg&auml;nge, die zur Durchf&uuml;hrung vorvertraglicher Ma&szlig;nahmen erforderlich sind.<br>
Sofern eine Verarbeitung personenbezogener Daten zur Erf&uuml;llung einer rechtlichen Verpflichtung erforderlich ist, der unser Unternehmen unterliegt, dient Art. 6 Abs. 1 lit. c DSGVO als Rechtsgrundlage.<br>
F&uuml;r den Fall, dass lebenswichtige Interessen der betroffenen Person oder einer anderen nat&uuml;rlichen Person eine Verarbeitung personenbezogener Daten erforderlich machen, dient Art. 6 Abs. 1 lit. d DSGVO als Rechtsgrundlage.<br>
Ist die Verarbeitung zur Wahrung eines berechtigten Interesses unseres Unternehmens oder eines Dritten erforderlich und &uuml;berwiegen die Interessen, Grundrechte und Grundfreiheiten des Betroffenen das erstgenannte Interesse nicht, so dient Art. 6 Abs. 1 lit. f DSGVO als Rechtsgrundlage f&uuml;r die Datenverarbeitung.<br><br>



<b>Datenl&ouml;schung und Speicherdauer<br></b>
Die personenbezogenen Daten der betroffenen Person werden gel&ouml;scht, sobald der Zweck der Speicherung entf&auml;llt. Eine Speicherung kann dar&uuml;ber hinaus erfolgen, wenn dies durch europ&auml;ische oder nationale Gesetze oder sonstigen Vorschriften, denen der Verantwortliche unterliegt, vorgesehen wurde. Eine Sperrung oder L&ouml;schung der Daten erfolgt auch dann, wenn eine durch die genannten Vorschriften vorgeschriebene Speicherfrist abl&auml;uft, es sei denn, dass eine Erforderlichkeit zur weiteren Speicherung der Daten f&uuml;r einen Vertragsabschluss oder eine Vertragserf&uuml;llung besteht.<br><br>

<b>Ihre Rechte <br></b>
Sie haben ein Recht auf unentgeltliche Auskunft &uuml;ber die bei uns zu Ihrer Person gespeicherten Daten sowie ggf. ein Recht auf Berichtigung, Einschr&auml;nkung der Verarbeitung oder L&ouml;schung dieser Daten. Ebenfalls haben Sie das Recht auf Daten&uuml;bertragbarkeit. Schlie&szlig;lich haben Sie auch das Recht, sich &uuml;ber die Verarbeitung Ihrer pers&ouml;nlichen Daten durch uns bei der Datenschutz-Aufsichtsbeh&ouml;rde zu beschweren. <br>
Wir weisen Sie zudem darauf hin, dass Sie der k&uuml;nftigen Verarbeitung Ihrer personenbezogenen Daten entsprechend den gesetzlichen Vorgaben gem. Art. 21 DSGVO zu jeder Zeit widersprechen k&ouml;nnen. Der Widerspruch kann insbesondere gegen die Verarbeitung f&uuml;r Zwecke der Direktwerbung erfolgen.<br><br>

<b>Erteilung von Ausk&uuml;nften<br></b>
Bei Fragen zur Erhebung, Verarbeitung oder Nutzung Ihrer personenbezogenen Daten, f&uuml;r Ausk&uuml;nfte, f&uuml;r die Berichtigung, Sperrung oder L&ouml;schung von Daten sowie zum Widerruf ggf. erteilter Einwilligungen oder zum Widerspruch gegen eine bestimmte Datenverwendung wenden Sie sich bitte unter Verwendung der folgenden E-Mail-Adresse an uns:<br><br>

<b>taolifetransformation@gmail.com<br><br>

Protokoll-Daten<br></b>
Die automatische Erhebung und Speicherung von Protokoll-Daten durch den Anbieter der Internetdienste (Provider) erfolgt, weil die Verarbeitung dieser Daten technisch erforderlich ist, um Ihnen unsere Internetseite anzuzeigen sowie die Stabilit&auml;t und Sicherheit zu gew&auml;hrleisten. Die Protokoll-Daten umfassen folgende Informationen:<br>
"	Datum und Uhrzeit der jeweiligen Anfrage<br>
"	Internetadresse (URL), die angefragt wurde<br>
"	URL, die der Besucher unmittelbar zuvor besucht hat<br>
"	Verwendeter Browser und Sprache<br>
"	Verwendetes Betriebssystem und dessen Oberfl&auml;che<br>
"	IP-Adresse und Hostname des Besuchers<br>
"	Zugriffsstatus / http-Statuscode<br>
"	Jeweils &uuml;bertragenen Datenmenge<br>
<br>
Die &Uuml;bermittlung dieser Daten an uns erfolgt automatisch und k&ouml;nnen Ihrer Person mit verh&auml;ltnism&auml;&szlig;igen Aufwand nicht zugeordnet werden. Rechtsgrundlage der Verarbeitung dieser Daten ist unser berechtigtes Interesse gem&auml;&szlig; Art. 6 Absatz 1 Satz 1 lit. f DSGVO, denn diese Datenverarbeitungen sind zum Betrieb und zur Anzeige der Webseite notwendig. Die Daten werden gel&ouml;scht, sobald sie f&uuml;r die Erreichung des Zweckes ihrer Erhebung nicht mehr erforderlich sind. Im Falle der Erfassung der Daten zur Bereitstellung der Website ist dies der Fall, wenn die jeweilige Sitzung beendet ist. Die Erfassung der Daten zur Bereitstellung der Website und die Speicherung der Daten in Logfiles ist f&uuml;r den Betrieb der Internetseite zwingend erforderlich. Es besteht folglich seitens des Nutzers keine Widerspruchsm&ouml;glichkeit.<br><br>

<b>Cookies<br></b>
Um den Besuch unserer Website attraktiv zu gestalten und die Nutzung bestimmter Funktionen zu erm&ouml;glichen, verwenden wir sogenannte Cookies. Hierbei handelt es sich um kleine Textdateien, die auf Ihrem Endger&auml;t gespeichert werden und die bestimmte Informationen zum Austausch mit unserem System speichern. Rechtsgrundlage der Verarbeitung dieser Daten ist Art. 6 Absatz 1 Satz 1 lit. f DSGVO. Einige der von uns verwendeten Cookies werden nach Ende der Browser-Sitzung, also nach Schlie&szlig;en des Browsers, wieder gel&ouml;scht (transient Cookies). Zu diesen z&auml;hlen insbesondere Sitzungs- oder Session-Cookies. Diese speichern einen eindeutigen Bezeichner (Session-ID). Durch diese Session-ID k&ouml;nnen verschiedene Anfragen Ihres Browsers einer gemeinsamen Sitzung zugeordnet werden. Hierdurch kann Ihr Endger&auml;t wiedererkannt werden, wenn w&auml;hrend einer Sitzung auf unsere Internetseite zur&uuml;ckkehren. Session-Cookies werden auch schon dann gel&ouml;scht, wenn Sie sich ausloggen.
Andere Cookies verbleiben f&uuml;r eine vorgegebene Dauer auf Ihrem Endger&auml;t und erm&ouml;glichen uns, Ihren Browser bzw. Ihr Endger&auml;t beim n&auml;chsten Besuch wiederzuerkennen (persistente Cookies). <br><br>

 
Bitte beachten Sie, dass bestimmte Cookies bereits gesetzt werden, sobald Sie unsere Website betreten. Sie k&ouml;nnen Ihren Browser so einstellen, dass Sie &uuml;ber das Setzen von Cookies informiert werden und einzeln &uuml;ber deren Annahme entscheiden oder die Annahme von Cookies f&uuml;r bestimmte F&auml;lle, insbesondere Cookies von Drittanbietern (Third Party Cookies) oder generell ausschlie&szlig;en k&ouml;nnen. Bei der Nichtannahme von Cookies kann die Funktionalit&auml;t unserer Website f&uuml;r Sie eingeschr&auml;nkt sein.<br><br>


<b>Konfiguration der Cookie-Einstellungen im Browser</b> 
Sie haben die M&ouml;glichkeit, das Abspeichern von Cookies auf Ihrem Rechner durch entsprechende Browsereinstellungen zu verhindern. Jeder Browser unterscheidet sich in der Art, wie er die Cookie-Einstellungen verwaltet. Diese ist in dem Hilfemen&uuml; jedes Browsers beschrieben, welches Ihnen erl&auml;utert, wie Sie Ihre Cookie-Einstellungen &auml;ndern k&ouml;nnen. Diese finden Sie f&uuml;r die jeweiligen Browser unter den folgenden Links:<br><br>

Internet Explorer&trade;: http://windows.microsoft.com/de-DE/windows-vista/Block-or-allow-cookies <br>
Chrome&trade;: http://support.google.com/chrome/bin/answer.py?hl=de&hlrm=en&answer=95647<br>
Firefox&trade; https://support.mozilla.org/de/kb/cookies-erlauben-und-ablehnen<br>
Opera&trade;: http://help.opera.com/Windows/10.20/de/cookies.html<br><br>


<b>Verschl&uuml;sselung durch SSL<br></b>
Aus Sicherheitsgr&uuml;nden benutzt unsere Website eine SSL-Verschl&uuml;sselung (Secure Sockets Layer). Damit werden &uuml;bertragene Daten gesch&uuml;tzt und k&ouml;nnen nicht von Dritten gelesen werden. Sie k&ouml;nnen eine erfolgreiche Verschl&uuml;sselung daran erkennen, dass sich die Protokollbezeichnung im der Statusleiste des Browsers von "http://" in "https://" &auml;ndert und dass dort ein geschlossenes Schloss-Symbol sichtbar ist.<br><br>

<b>Kontaktformular<br></b>

&Uuml;ber das von uns bereitgestellte Kontaktformular k&ouml;nnen sie elektronisch Kontakt mit uns aufnehmen.<br>
In unserem Kontaktformular ist gekennzeichnet, welche Daten verpflichtend sind und welche freiwillig eingegeben werden k&ouml;nnen. Alle eingegebenen Daten werden bei uns gespeichert und ausschlie&szlig;lich zum Zweck der Beantwortung Ihrer Anfragen genutzt. Dar&uuml;ber hinaus werden Ihre IP-Adresse sowie Datum und Zeitpunkt der Registrierung gespeichert. Ihre personenbezogenen Daten werden gel&ouml;scht, sobald die Speicherung f&uuml;r diesen Zweck nicht mehr erforderlich ist oder wir schr&auml;nken die Verarbeitung ein, falls gesetzliche Aufbewahrungspflichten bestehen. <br>
Rechtsgrundlage f&uuml;r die Verarbeitung der Daten ist die Durchf&uuml;hrung einer vorvertraglichen Ma&szlig;nahme durch Ihre Anfrage gem. Art. 6 Abs. 1 lit. b DSGVO.<br><br>

<b>Versand unseres E-Mail-Newsletters<br></b>

Wenn Sie unseren E-Mail-Newsletter abonnieren und regelm&auml;&szlig;ig lesen m&ouml;chten, dann ist Ihre Registrierung mit einer g&uuml;ltigen E-Mail-Adresse und damit eine Einwilligung Ihrerseits in die Verarbeitung Ihrer personenbezogenen Daten durch uns erforderlich.<br>
Vor Versand des Newsletters m&uuml;ssen Sie uns im Rahmen des sogenannten Double-Opt-In-Verfahrens ausdr&uuml;cklich best&auml;tigen, dass wir f&uuml;r Sie den E-Mail-Newsletter-Dienst aktivieren sollen. Dies tun wir, um zu vermeiden, dass fremde E-Mail-Adressen f&uuml;r Anmeldungen genutzt werden. Dazu erhalten Sie von uns eine Best&auml;tigungs- und Autorisierungs-E-Mail, mit der wir Sie bitten, den in dieser E-Mail enthaltenen Link anzuklicken und uns damit zu best&auml;tigen, dass Sie unseren Newsletter erhalten m&ouml;chten.<br>
Erfolgt keine Best&auml;tigung Ihrerseits, werden Ihre personenbezogenen Daten innerhalb von 48 Stunden gel&ouml;scht. <br><br>

Im Zusammenhang mit der Anmeldung werden neben der E-Mail-Adresse auch der Anmeldezeitpunkt, der Best&auml;tigungszeitpunkt, die IP-Adresse sowie der Einwilligungstext gespeichert und wir benutzen die E-Mail-Adresse ausschlie&szlig;lich f&uuml;r die Zustellung des Newsletters sofern Sie einer anderen Benutzung nicht ausdr&uuml;cklich zugestimmt haben. <br>


Der Versand des Newsletters erfolgt auf Grundlage einer Einwilligung der Empf&auml;nger gem. Art. 6 Abs. 1 lit. a, Art. 7 DSGVO i.V.m &sect; 7 Abs. 2 Nr. 3 UWG. <br><br>
 

Sie k&ouml;nnen den Empfang durch Widerruf ihrer Einwilligungen k&uuml;ndigen. Eine Abmeldung von dem Newsletter ist so jederzeit m&ouml;glich. Bitte verwenden Sie daf&uuml;r den vorgesehenen Link im Newsletter.<br><br>




<b>Digistore</b>

Wir bieten Ihnen &uuml;ber unsere Webseite auch digitale Produkte wie Tickets, Online-Kurse, Gutscheine, digitale Produkte und Download-Produkt zum Kauf an. Daf&uuml;r nutzen wir den Dienst der Digistore24 GmbH, St.-Godehard-Stra&szlig;e 32, 31139 Hildesheim, Deutschland ("Digistore"). Sobald Sie auf einen unserer Produktbuttons klicken, verlassen Sie unsere Webseite und werden zu Digistore weitergeleitet. Digistore wird der Vertragspartner der K&auml;ufer von Leistungen bzw. Produkten und ist f&uuml;r die Verarbeitung der Daten der K&auml;ufer verantwortlich. F&uuml;r den Erwerb und die begleitende Verarbeitung von Daten gelten die Bestimmungen von Digistore 1. AGB: https://www.digistore24.com/info/terms?language=de, und 2. Datenschutzerkl&auml;rung: https://www.digistore24.com/info/privacy?language=de
Die Rechtsgrundlage zur Verarbeitung der personenbezogenen Daten bei der Weiterleitung von unserer Webseite zu Digistore ergibt sich vorliegend aus Art. 6 Abs. 1 S. 1 lit. b).
<br><br>

<b>Google Web Fonts<br></b>

Die Nutzung von Google Web Fonts auf Webseiten ist nicht ohne rechtliche Risiken m&ouml;glich, da bei Nutzung dieses Dienstes ggf. Daten der Webseitenbesucher ohne deren Wissen und ohne deren Einverst&auml;ndnis an den Anbieter des Dienstes &uuml;bertragen werden. Einige Datenschutzbeh&ouml;rden und Gerichte bewerten einen Hinweis in der Datenschutzerkl&auml;rung als nicht ausreichend und empfehlen hier, eine ausdr&uuml;ckliche Einwilligung der Webseitenbesucher einzuholen.<br><br>

Diese Webseite sogenannte Web Fonts, die von Google bereitgestellt werden. Dies erfolgt, um Schriftarten einheitlich darstellen zu k&ouml;nnen. Beim Aufruf einer Seite l&auml;dt Ihr Browser die ben&ouml;tigten Web Fonts in ihren Browserspeicher. Zu diesem Zweck muss Ihr Browser eine Verbindung zu den Servern von Google in den USA herstellen. Dadurch erh&auml;lt Google die Information, dass unsere Website &uuml;ber Ihre IP-Adresse aufgerufen wurde. Die Nutzung von Google Web Fonts erfolgt im Interesse einer einheitlichen und ansprechenden Darstellung unserer Webseite. Dies stellt ein berechtigtes Interesse im Sinne von Art. 6 Abs. 1 lit. f DSGVO dar. Falls Ihr Browser Google Web Fonts nicht unterst&uuml;tzt, wird eine Standardschrift von Ihrem Computer genutzt.
Weitere Informationen zu Google Web Fonts finden Sie unter https://developers.google.com/fonts/faq und in der Datenschutzerkl&auml;rung von Google: https://www.google.com/policies/privacy/.<br><br>


<b>System- und Informationssicherheit<br></b>
Wir sichern unsere Website und unsere sonstigen Systeme durch technische und organisatorische Ma&szlig;nahmen gegen Verlust, Zerst&ouml;rung, Zugriff, Ver&auml;nderung oder Verbreitung der gespeicherten Daten durch unbefugte Personen. Trotz Kontrollen ist ein vollst&auml;ndiger Schutz gegen alle Gefahren jedoch nicht m&ouml;glich. Schon alleine durch die Anbindung an das Internet und die sich daraus ergebenden technischen M&ouml;glichkeiten kann keine Gew&auml;hr daf&uuml;r &uuml;bernommen werden, dass Inhalte und der Informationsfluss nicht von Dritten eingesehen und aufgezeichnet werden.<br><br>

<b>Widerspruch gegen unerlaubte Werbung per E-Mail<br></b>
Im Rahmen der Impressumspflicht gem&auml;&szlig; &sect; 5 TMG haben wir auf unserer Website allgemeine Kontaktdaten sowie eine E-Mail-Adresse ver&ouml;ffentlicht. Wir widersprechen hiermit der Nutzung dieser Kontaktdaten f&uuml;r die unaufgeforderte &Uuml;bersendung von Informationsmaterialien, Werbung oder Spam-Mails, die wir nicht explizit angefordert haben. <br><br>

Stand der Datenschutzerkl&auml;rung: 24.2.2019<br>
<br>
<br>






<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  //--> 

<?php include("seitenelemente/footer.html"); ?>

 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->
   </form>
        </div>
</div> <!-- wrapper //-->
    </body>
</html>