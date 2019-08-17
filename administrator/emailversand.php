<?php session_start(); 

include("../intern/parameter.php");  
include("../intern/css/span.php");
include("../intern/css/schriften.css");
include("../intern/mysql_connect_gscheiderle.php");

$verweildauer=time()-86400;

$tabellen_loeschen=mysqli_query($link,"select * from table_name where zeitstempel < '$verweildauer'");
while ($name=mysqli_fetch_array($tabellen_loeschen, MYSQLI_BOTH )){
mysqli_query($link,"drop table if exists $name[tablename]");
mysqli_query($link,"drop table if exists $name[tablename_2]");
mysqli_query($link,"drop table if exists $name[tablename_3]");
mysqli_query($link,"drop table if exists $name[tablename_4]");
}
mysqli_query($link,"delete from table_name where zeitstempel < '$verweildauer'"); 

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>eMail-Versand</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    	<script src="../ckeditor/ckeditor.js"></script>
	<script src="../ckeditor/samples/sample.js"></script>
	<link href="../ckeditor/samples/sample.css" rel="stylesheet">
    
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<?php echo "<form action=\"\" method=\"POST\">"; ?>
<?php
 

$tabellen_name=str_replace("?","7",str_replace("&","6",str_replace(":","5",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",session_id())))))));   

$temp_tab_name=$tabellen_name."_2"; 
$temp_tab_name=substr($temp_tab_name,-24);

$datum=date("d.m.Y, h:i:s");

function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($db_ausdruck != ""){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 

?>
  



  <table width="900px" height="900px" cellpadding="10" cellspacing="0" border="0"
  style="bgcolor: #c0c0c0;        
       z-index: +5;
       border: 1px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 12px 12px 12px #4A4A4A;">
       
<tr><td>

<table width="900px" height="0px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
 <tr><td valign="top" height="10%" align="center">
<font size="5"> <b>
  </td>
  </tr>

 <tr><td valign="top" height="10%"  align="center">
 
<table><tr>


<?php 



$suche_versand=mysqli_query($link,"select datum, stichwort, zufall_id from email_texte order by mail_id desc");
while($finde_versand=mysqli_fetch_array($suche_versand, MYSQLI_BOTH )) {
$versand_termine.="<option value=\"$finde_versand[zufall_id]\">$finde_versand[stichwort] versandt am $finde_versand[datum]</option>";
}


$select_email_text=mysqli_query($link,"select * from email_texte where zufall_id = '$_POST[liste]'");
while ($result_email_text=mysqli_fetch_array($select_email_text, MYSQLI_BOTH )) {
$kopfbild_db=$result_email_text['kopfbild'];
$thema_db=$result_email_text['thema'];
$anrede_db=$result_email_text['anrede'];
$text_db=$result_email_text['text'];
$betreff_db=$result_email_text['betreff'];
$stichwort_db=$result_email_text['stichwort'];
$email_absender_db=$result_email_text['email_absender'];
}
 ?>


<td>
 <select name="liste" tabindex="14"
 style=" width: 300px; height: 30px; font-color: #000000; font-size: 18px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
 <option selected>&auml;ltere eMails:</option>
 <?php echo $versand_termine; ?>
 </select>
</td>

<td>
<input type="submit" value="ohne Liste" name="listen" tabindex="15"
 style=" width: 150px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>

<td>
<input type="submit" value="mit Liste" name="liste_zeigen" tabindex="15"
 style=" width: 150px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>



</tr>


<tr><td colspan="4" align="center">

</td></tr>

</table>

<?php 

if ( ($_POST['listen'] == TRUE) || ($_POST['liste_zeigen'] == TRUE) ){

mysqli_query($link,"drop table if exists $temp_tab_name");

mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
kd_nr int(6),
geschlecht varchar(64),
name varchar(64),
vorname varchar(64),
plz varchar(64),
email varchar(64),
nachfassen varchar(255)
)
");
echo mysql_error();

$aelter_24_std=time();
$save_table_name=mysqli_query($link,"insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");   

$zaehler=0;

$such_adressen=mysqli_query($link,"select kd_nr from versandte_emails where zufall_id = '$_POST[liste]'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) { // while 1


$select_empfaenger=mysqli_query($link,"select kd_nr, name, vorname, geschlecht, plz, email from adressen where kd_nr = '$adressen_result[kd_nr]'");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){ // while 2

$nachgefasst=$adressen_result['stichwort']."-".$datum;



mysqli_query($link,"insert into $temp_tab_name
(
kd_nr,
geschlecht,
name,
vorname,
plz,
email,
nachfassen
)
values
(
'$result_empfaenger[kd_nr]',
'$result_empfaenger[geschlecht]',
'$result_empfaenger[name]',
'$result_empfaenger[vorname]',
'$result_empfaenger[plz]',
'$result_empfaenger[email]',
'$nachgefasst'
)
");
echo mysql_error();
} // ende while 2
echo mysql_error();
} // ende while 1
echo mysql_error();
} // ende if



if ($_POST['liste_zeigen'] == TRUE) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\">

<tr><td><b>PLZ&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>KD-NR&nbsp;&nbsp;</td><td><b>Name</td><td><b>Vorname&nbsp;&nbsp;</td><td><b>eMail</td></tr>
<tr><td colspan=\"5\"><hr /></td></tr>
";


$zaehler=0;

$such_adressen=mysqli_query($link,"select kd_nr from versandte_emails where zufall_id = '$_POST[liste]'");
while($adressen_result=mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {

$select_empfaenger=mysqli_query($link,"select kd_nr, name, vorname, plz, geschlecht, email from adressen where kd_nr = '$adressen_result[kd_nr]'");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){
echo "<tr><td>$result_empfaenger[plz]&nbsp;&nbsp;</td><td>$result_empfaenger[kd_nr]</td><td>$result_empfaenger[name]&nbsp;&nbsp;</td><td>$result_empfaenger[vorname]&nbsp;&nbsp;</td><td>$result_empfaenger[email]</td></tr>";
}

$zaehler++;
}
if ($zaehler == 0){
echo "Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler > 1){
echo "Es wurden <b>".$zaehler."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler == 1){
echo "Es wurde <b>".$zaehler."</b> Datensatz gefunden.<hr>";}
}
 ?>
 
</table>

</td></tr>       
    
<tr><td valign="top" height="10%">
<table><tr><td>
Thema:<br>
<textarea rows="1" name="thema" cols="35" 
tabindex="10"><?php echo htmlspecialchars(neuladen($thema_db,$_POST['thema'])); ?></textarea>
</td>

<td>
Stichwort:<br>
<textarea rows="1" name="stichwort" cols="35" 
tabindex="10"><?php echo htmlspecialchars(neuladen($stichwort_db,$_POST['stichwort'])); ?></textarea>
</td>

<td>
eMail-Absender:<br>



<?php 


$news_selected = "";
$buch_selected = "";
$t21_selected = "";


if( ($email_absender_db == "newsletter@petra-$uwesack.de") || ($_POST['email_absender'] == "newsletter@petra-$uwesack.de") ){$news_selected="selected";} 
if( ($email_absender_db == "buchclub@petra-$uwesack.de") || ($_POST['email_absender'] == "buchclub@petra-$uwesack.de") )  {$buch_selected="selected";} 
if( ($email_absender_db == "21-tage@petra-$uwesack.de") || ($_POST['email_absender'] == "21-tage@petra-$uwesack.de") ) {$t21_selected="selected";}

echo "
<select name=\"email_absender\" tabindex=\"10\">
<option value=\"newsletter@petra-$uwesack.de\" $news_selected>newsletter@petra-$uwesack.de</option>";
$news_selected="";
echo "
<option value=\"buchclub@petra-$uwesack.de\" $buch_selected>buchclub@petra-$uwesack.de</option>";
$buch_selected="";
echo "
<option value=\"21-tage@petra-$uwesack.de\" $t21_selected>21-tage@petra-$uwesack.de</option>
</select>";
$t21_selected="";


 ?>



</td>
</tr>

<tr>
<td>
eMail-Betreff:<br>
<textarea rows="1" name="email_betreff" cols="35" 
tabindex="10"><?php echo htmlspecialchars(neuladen($betreff_db,$_POST['email_betreff'])); ?></textarea>
</td>

<td>
&nbsp;
</td>

<td>
Pfad zum Kopf-Bild (nur Datei-Name):<br>
<textarea rows="1" name="kopfbild" cols="35" 
tabindex="10"><?php echo htmlspecialchars(neuladen($kopfbild_db,$_POST['kopfbild'])); ?></textarea>
</td>

</tr>
</table>

</td></tr>

<?php 

if( ($anrede_db == "privat") || ($_POST['briefanrede'] == "privat") ) {$checked_privat="checked"; $checked_offiziell=""; $checked_keine=""; $_POST['briefanrede'] = "";} 
if( ($anrede_db == "offiziell") || ($_POST['briefanrede'] == "offiziell") ) {$checked_offiziell="checked"; $checked_keine=""; $checked_privat=""; $_POST['briefanrede'] = "";}
if( ($anrede_db == "keine_anrede") || ($_POST['briefanrede'] == "keine_anrede") ) {$checked_keine="checked"; $checked_privat=""; $checked_offiziell=""; $_POST['briefanrede'] = "";}

echo " 
<tr><td valign=\"top\" height=\"10%\">
M&ouml;gliche automatisierte Anreden:<br>
<input type=\"radio\" name=\"briefanrede\" value=\"privat\" $checked_privat>&nbsp;Pers&ouml;nlich:&nbsp;Liebe(r) Vorname\"<br>";
echo "
<input type=\"radio\" name=\"briefanrede\" value=\"offiziell\" $checked_offiziell>&nbsp;Gesch&auml;ftlich:&nbsp;Sehr geehrte(r) Frau(Herr) Nachname\"<br>";
echo "
<input type=\"radio\" name=\"briefanrede\" value=\"keine_anrede\" $checked_keine>&nbsp;Keine Anrede ! ";
?>

<br><br>
Brieftext:<br>
<textarea rows="35" id="beitrag" name="beitrag" cols="70" 
tabindex="10"><?php echo htmlspecialchars(neuladen($text_db,$_POST['beitrag']));  ?></textarea>


<script>

				CKEDITOR.replace( 'beitrag', {
					/*
					 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
					 */
					extraPlugins: 'htmlwriter',

					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'body {color:#000; background-color#:FFF;}',

					/*
					 * Simple HTML5 doctype
					 */
					docType: '<!DOCTYPE HTML>',

					/*
					 * Allowed content rules which beside limiting allowed HTML
					 * will also take care of transforming styles to attributes
					 * (currently only for img - see transformation rules defined below).
					 *
					 * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
					 */
					allowedContent:
						'h1 h2 h3 p pre[align]; ' +
						'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
						'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',

					/*
					 * Core styles.
					 */
					coreStyles_bold: { element: 'b' },
					coreStyles_italic: { element: 'i' },
					coreStyles_underline: { element: 'u' },
					coreStyles_strike: { element: 'strike' },

					/*
					 * Font face.
					 */

					// Define the way font elements will be applied to the document.
					// The "font" element will be used.
					font_style: {
						element: 'font',
						attributes: { 'face': '#(family)' }
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
					fontSize_style: {
						element: 'font',
						attributes: { 'size': '#(size)' }
					},

					/*
					 * Font colors.
					 */

					colorButton_foreStyle: {
						element: 'font',
						attributes: { 'color': '#(color)' }
					},

					colorButton_backStyle: {
						element: 'font',
						styles: { 'background-color': '#(color)' }
					},

					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },
						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },
						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					],

					on: {
						pluginsLoaded: configureTransformations,
						loaded: configureHtmlWriter
					}
				});

				/*
				 * Add missing content transformations.
				 */
				function configureTransformations( evt ) {
					var editor = evt.editor;

					editor.dataProcessor.htmlFilter.addRules( {
						attributes: {
							style: function( value, element ) {
								// Return #RGB for background and border colors
								return CKEDITOR.tools.convertRgbToHex( value );
							}
						}
					} );

					// Default automatic content transformations do not yet take care of
					// align attributes on blocks, so we need to add our own transformation rules.
					function alignToAttribute( element ) {
						if ( element.styles[ 'text-align' ] ) {
							element.attributes.align = element.styles[ 'text-align' ];
							delete element.styles[ 'text-align' ];
						}
					}
					editor.filter.addTransformations( [
						[ { element: 'p',	right: alignToAttribute } ],
						[ { element: 'h1',	right: alignToAttribute } ],
						[ { element: 'h2',	right: alignToAttribute } ],
						[ { element: 'h3',	right: alignToAttribute } ],
						[ { element: 'pre',	right: alignToAttribute } ]
					] );
				}

				/*
				 * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
				 */
				function configureHtmlWriter( evt ) {
					var editor = evt.editor,
						dataProcessor = editor.dataProcessor;

					// Out self closing tags the HTML4 way, like <br>.
					dataProcessor.writer.selfClosingEnd = '>';

					// Make output formatting behave similar to FCKeditor.
					var dtd = CKEDITOR.dtd;
					for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
						dataProcessor.writer.setRules( e, {
							indent: true,
							breakBeforeOpen: true,
							breakAfterOpen: false,
							breakBeforeClose: !dtd[ e ][ '#' ],
							breakAfterClose: true
						});
					}
				}

			</script>





<br>
</td></tr>

               
                <tr>
                                  <td width="482" height="20px" valign="middle" align="center">
                                  
                  
                 <input type="submit" value="Liste zeigen" name="selectierte_adressen_zeigen" tabindex="11"
                  style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
                
                &nbsp;&nbsp;&nbsp;
                
                  
                 <input type="submit" value="eMail senden" name="email_senden" tabindex="11"
                  style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;"><br><br>
                  
                  <?php 
                                   
$monat_1 = date("m"); 
$tag_1 = date("d");
$jahr = date("Y"); 
 ?>                 
                  Versenden am: <select name="jahr"> 
                  <option value="<?php echo date(Y); ?>"><?php echo date(Y); ?></option>
                  <option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option></select>&nbsp;
                                <select name="monat"> 
                                <option value="<?php echo date(m); ?>"><?php echo date(m); ?></option>
                                <option value="01">Januar</option> <option value="02">Februar</option> <option value="03">M&auml;rz</option>
                                <option value="04">April</option> <option value="05">Mai</option> <option value="06">Juni</option>
                                <option value="07">Juli</option> <option value="08">August</option> <option value="09">September</option>
                                <option value="10">Oktober</option> <option value="11">November</option> <option value="12">Dezember</option>
                                </select>&nbsp;
                                <select name="tag">
                                <option value="<?php echo date(d); ?>"><?php echo date(d); ?></option>
                                <option value="01">01</option> <option value="02">02</option> <option value="03">03</option>
                                <option value="04">04</option> <option value="05">05</option> <option value="06">06</option>
                                <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>
                                <option value="10">10</option> <option value="11">11</option> <option value="12">12</option>
                                <option value="13">13</option> <option value="14">14</option> <option value="15">15</option>
                                <option value="16">16</option> <option value="17">71</option> <option value="18">18</option>
                                <option value="19">19</option> <option value="20">20</option> <option value="21">21</option>
                                <option value="22">22</option> <option value="23">23</option> <option value="24">24</option>
                                <option value="25">25</option> <option value="26">26</option> <option value="27">27</option>
                                <option value="28">28</option> <option value="29">29</option> <option value="30">30</option>
                                <option value="31">31</option> 
                                </select>&nbsp;
                                Uhrzeit:&nbsp;<select name="stunde">
                                <option value="<?php echo date(h); ?>"><?php echo date(H); ?></option>
                                <option value="06">06</option>
                                <option value="07">07</option> <option value="08">08</option> <option value="09">09</option>
                                <option value="10">10</option> <option value="11">11</option> <option value="12">12</option>
                                <option value="13">13</option> <option value="14">14</option> <option value="15">15</option>
                                <option value="16">16</option> <option value="17">71</option> <option value="18">18</option>
                                <option value="19">19</option> <option value="20">20</option> <option value="21">21</option>
                                <option value="22">22</option> <option value="23">23</option> <option value="24">24</option>
                                </select>&nbsp;";
                                
                                
                <?php                 
                                $versandtermin.=$_POST['jahr'];
                                $versandtermin.="-";
                                $versandtermin.=$_POST['monat'];
                                $versandtermin.="-";
                                $versandtermin.=$_POST['tag'];
                                $versandtermin.=":";
                                $versandtermin.=$_POST['stunde'];
                                
                                
                                $versand_termin=time(date($versandtermin));
                 ?>
                                
                                
                                
                                
                                                                       <input type="submit" value="Nur speichern" name="nur_speichern" tabindex="11"
                  style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
                
                  </td>
                  

                </tr>

  <tr><td valign="top" height="10%"  align="center">
 
<table><tr><td>
 <select name="adressen_suchen" tabindex="12"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 16px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
 <option selected value="">Adressen w&auml;hlen</option>
  <option value="email_alle">alle E-Mail listen</option>
 <option value="plz">nach PLZ</option>
 <option value="div_plz">mehrere PLZ's</option>
 <option value="plz_bereich">PLZ-Bereich</option>
 <option value="kontakt">nach Kontakt</option>
   <option value="kontakt_ausschliessen">Kontakt ausschliessen</option>
   </select>

</td>

<td>

<td>
<input type="text" size="36" name="kriterium" tabindex="13" value="<?php echo $_POST['kriterium']; ?>"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>

<?php 
$suche_kontakt_art=mysqli_query($link,"select distinct kontakt_art from adressen order by kontakt_art desc");
while($finde_kontakt=mysqli_fetch_array($suche_kontakt_art, MYSQLI_BOTH )) {
$kontakt_arten.="<option value=\"$finde_kontakt[kontakt_art]\">$finde_kontakt[kontakt_art]</option>";
}

 ?>


<td>
 <select name="kriterium_2" tabindex="14"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
 <option selected>w&auml;hle Kontakt</option>
 <?php echo $kontakt_arten; ?>
 </select>
</td>


<td>
<input type="submit" value="eMails selectieren" name="adressen_selectieren" tabindex="15" 
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>
</tr>


<tr><td colspan="5" align="center">

Eingabe-Format f&uuml;r "mehrere PLZ's" x_stellig je nach Auswahl: 694;867;987;<br>

<input type="radio" name="mehrstellig" value="4" checked> 3stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="5"> 4stellige PLZ's &nbsp;&nbsp;&nbsp;
<input type="radio" name="mehrstellig" value="6"> 5stellige PLZ<br>

WICHTIG !!! Trennzeichen ist ";" (Semikolon), auch hinter der letzten Nummer, ohne Wortzwischenraum !<br>

Eingabe-Format f&uuml;r PLZ-Bereich: 80 bis 90, 75-80 oder 81 - 85<br>
</td></tr>              



<?php




if($_POST['adressen_selectieren'] == TRUE) {
 mysqli_query($link,"drop table if exists $temp_tab_name");

$tabelle_creieren=mysqli_query($link,"create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(3) NOT NULL auto_increment primary key,
kd_nr int(6),
geschlecht varchar(64),
name varchar(64),
vorname varchar(64),
plz varchar(64),
email varchar(64),
nachfassen varchar(64)
)
");
$aelter_24_std=time();
$save_table_name=mysqli_query($link,"insert into table_name (tablename,tablename_2,zeitstempel)values('$temp_tab_name','$temp_tab_name_2','$aelter_24_std')");   

if ($_POST['adressen_suchen'] == "plz_bereich") {
$von=substr("$_POST[kriterium]",0,2)*1000;
$bis=substr("$_POST[kriterium]",-2,2)*1000;
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where email != '' and plz >= '$von' and plz <= '$bis' and adressenfehler = 'true' and newsletter != 'NO'";}


if ($_POST['adressen_suchen'] == "email_alle") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where  email != '' and adressenfehler = 'true' and newsletter != 'NO' order by kontakt_art desc";}


if ($_POST['adressen_suchen'] == "kontakt") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where kontakt_art like '$_POST[kriterium_2]' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['adressen_suchen'] == "kontakt_ausschliessen") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where kontakt_art != '$_POST[kriterium_2]' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['adressen_suchen'] == "plz") {
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where plz like '$_POST[kriterium]%' and  email != '' and adressenfehler = 'true' and newsletter != 'NO'";}

if ($_POST['adressen_suchen'] == "div_plz") {
$plz_anzahl=substr_count($_POST['kriterium'], ";");
$i=1;
$start=0;
$and=" and  email != '' and adressenfehler = 'true' and newsletter != 'NO' ";
$or=" or plz like ";
for ($i;$i <= $plz_anzahl;$i++) {

if ($i < $plz_anzahl) {
$or=" or plz like ";
$and=" and  email != '' and adressenfehler = 'true' and newsletter != 'NO' ";
}
else {$or="";
      $and="";
            }
$anzahl_ziffern=$_POST['mehrstellig']-1;
$plznummern=substr("$_POST[kriterium]",$start, $anzahl_ziffern);
$plz_nummern.="'$plznummern%' $and $or ";

$start=$start + $_POST['mehrstellig'];
}
$kriterium = "select kd_nr, name, vorname, geschlecht, plz, email from adressen where plz like $plz_nummern and  email != '' and adressenfehler = 'true' and newsletter != 'NO' order by plz";}


$zaehler=0;

$such_adressen=mysqli_query($link,"$kriterium");
while($adressen_result=@mysqli_fetch_array($such_adressen, MYSQLI_BOTH )) {

mysqli_query($link,"insert into $temp_tab_name
(
kd_nr,
geschlecht,
name,
vorname,
plz,
email
)
values
(
'$adressen_result[kd_nr]',
'$adressen_result[geschlecht]',
'$adressen_result[name]',
'$adressen_result[vorname]',
'$adressen_result[plz]',
'$adressen_result[email]'
)
");

$zaehler++;
} // ende while

if ($zaehler == 0){
echo "<hr>Es wurde <b>kein</b> Datensatz gefunden.<hr>";}
if ($zaehler > 1){
echo "<hr>Es wurden <b>".$zaehler."</b> Datens&auml;tze gefunden.<hr>";}
if ($zaehler == 1){
echo "<hr>Es wurde <b>".$zaehler."</b> Datensatz gefunden.<hr>";}
} // ende selectieren
echo mysql_error();

////////////////////////////////////////////////////////////////////////////

if ($_POST['selectierte_adressen_zeigen'] == TRUE) {

$i=1;

echo "
<table border=\"0\" cepadding=\"5\" width=\"100%\">

<tr><td><b>PLZ</td><td><b>KD-NR</td><td><b>Name</td><td><b>Vorname</td><td><b>eMail</td></tr>
<tr><td colspan=\"5\"><hr /></td></tr>
";


$select_empfaenger=mysqli_query($link,"select * from $temp_tab_name");
while($result_empfaenger=mysqli_fetch_array($select_empfaenger, MYSQLI_BOTH )){
echo 
"<tr>
<td>$result_empfaenger[plz]</td>
<td>$result_empfaenger[kd_nr]</td>
<td>$result_empfaenger[name]</td>
<td>$result_empfaenger[vorname]</td>
<td>$result_empfaenger[email]</td>
</tr>";
}
echo "</table>";
}


////////////////////////////////////////



$zaehler_1=0;
$zaehler_2=0;


if ( ($_POST['email_senden'] == TRUE) || ($_POST['nur_speichern'] == TRUE) ){

$email_absender_f=$_POST['email_absender'];

//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}

if ($_POST['nur_speichern'] == TRUE) {
mysqli_query($link,"insert into emails_future 
(
zufall_id,
sende_termin
)
values
(
'$zufall_id',
'$versand_termin'
)");
}

// adresse f&uuml;r den eMail-Versand
$kopf_bild="http://www.petra-$uwesack.de/administrator/pictures/$_POST[kopfbild]";


mysqli_query($link,"insert into email_texte
(
zufall_id,
kopfbild,
thema,
anrede,
text,
betreff,
stichwort,
email_absender,
datum
)
values
(
'$zufall_id',
'$_POST[kopfbild]',
'$_POST[thema]',
'$_POST[briefanrede]',
'$_POST[beitrag]',
'$_POST[email_betreff]',
'$_POST[stichwort]',
'$_POST[email_absender]',
'$datum'
)
");
echo mysql_error();


$select_email=mysqli_query($link,"select kd_nr, geschlecht, name, vorname, email from $temp_tab_name where email = 'lphwfamily@gmail.com'");
while($result_email=mysqli_fetch_array($select_email, MYSQLI_BOTH )){
$empfaenger_db=$result_email['email'];


if ($_POST['briefanrede'] == "privat"){
$anrede="Meine liebe ".$result_email['vorname'];
if($result_email['geschlecht'] != "w") {$anrede="Mein lieber ".$result_email['vorname'];}
}

if ($_POST['briefanrede'] == "offiziell"){
$anrede="Sehr geehrte Frau ".$result_email['name'];
if($result_email['geschlecht'] != "w") {$anrede="Sehr geehrter Herr ".$result_email['name'];}
}

if ($_POST['briefanrede'] == "keine_anrede"){
$anrede="";
}




if ($_POST['email_senden'] == TRUE) {
$empfaenger = $empfaenger_db;
$betreff = '$_POST[email_betreff]';
$inhalt="

<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//DE\">
<html>
  <head>
    <title>eMail-Versand</title>
    <meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\">
    	
	
  </head>
  <body link=\"#000000\" vlink=\"#000000\" alink=\"#000000\">



  <table border=\"0\" width=\"700\" height=\"300\" bgcolor=\"\">
  
  
       <tr><td> <img src=\" $kopf_bild \"> </td></tr>
       
        
              
       <tr><td><font face=\"arial\" size=\"4\">
       <br>
       $_POST[thema]<br><br></b>
       
      
      <font face=\"arial\" size=\"4\"><b>
      <p>$anrede</font><br><br></b>
      
      <font face=\"arial\" size=\"2\">
      $_POST[beitrag]<br>


      </td>
    </tr>
    
    <td width=\"80%\" align=\"left\">
    

  </table>
  </center>
</div>
</body>
</html>
";

$header .= "MIME-Version: 1.0" . "\r\n";
$header.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$header.="From: $email_absender_f" . "\r\n";
$header.="Reply-To: $email_absender_f" . "\r\n";

$mail_versand=mail($empfaenger, $betreff, $inhalt, $header); 

$empfaenger="";
$betreff="";
$inhalt="";
$header="";

} // ende if senden

if ( ($mail_versand == TRUE) || ($_POST['nur_speichern'] == TRUE) ){ 

mysqli_query($link,"insert into versandte_emails
(
kd_nr,
zufall_id
)
values
(
'$result_email[kd_nr]',
'$zufall_id'
)
");



if($mail_versand == TRUE){
$zaehler_2++;}

$zaehler_1++;
} // ende while
}

if ($zaehler_2 == 0){
echo "<hr>Es wurde <b>keine</b> eMail versandt.<hr>";}
if ($zaehler_2 > 1){
echo "<hr>Es wurden <b>".$zaehler_2." von ".$zaehler_1."</b>  eMails versandt.<hr>";}
if ($zaehler_2 == 1){
echo "<hr>Es wurde <b>".$zaehler_2." von ".$zaehler_1."</b> eMail versandt.<hr>";}


$loeschen_tabellen=mysqli_query($link,"drop table if exists $temp_tab_name");
} // ende if senden

?>

   </t1>
  </td>
  
  </tr>
  
    
  </table>


 </form>

  </body>
</html>
