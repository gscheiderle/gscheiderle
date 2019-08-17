<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Termin_korrektur</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
        
    
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sofadi+One|Noto+Sans:i|Noto+Sans">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bonbon">
	  
	  		<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="../css/style.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="../css/style_1200.css"> <!-- grosser Bildschirm -->
	  
   
    
  </head>
  <body leftmargin="0" topmargin="0" color="#000">
	  
<div class="wrapper">
	  	  
<font style=" color: #000;">
	  
<?php echo "<form method='POST' action='maske_termine_korrektur.php'>"; ?>
	  
	  

	
<?php 


if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}


	  
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");
include("../intern/funktionen.php");



$jetztzeit=date("Y-m-d");



$termin_auswahl=mysqli_query($link, "select termin_id, termin_von, thema from termine where termin_bis >= '$jetztzeit' order by termin_von " );

while ( $result_auswahl=mysqli_fetch_array($termin_auswahl, MYSQLI_BOTH ) ) {



$datum_von.=substr($result_auswahl[termin_von],8,2).".";

$datum_von.=substr($result_auswahl[termin_von],5,2).".";

$datum_von.=substr($result_auswahl[termin_von],0,4);



if ( $result_auswahl["termin_id"] == $_POST['korrektur_termine'] ) { $selected="selected"; }  else { $selected=""; } 

$termine_db.="<option value=\"$result_auswahl[termin_id]\" $selected>$datum_von&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;".substr("$result_auswahl[thema]",0,70)." ...</option>";

$datum_von="";

}

?>

  

 <div align="center">

 

 <table width="100%" height="0px">

 <tr><td align="center"><?php include("links_oben.php"); ?>

 </td>

 </tr>

 </table>

 



 <table width="1350px" height="500px" cellpadding="0" cellspacing="0" bgcolor=<?php echo $feldfarbe; ?> border="0">

 <tr>

 

 <td rowspan="5" valign="top">

 <?php 

 $termin_versteckt=mysqli_query($link, "select termin_id, termin_von, text_fuer_buchung from termine where preis_ausblenden = '1' and termin_id >= '800' 

 or preis_ausblenden = '2' and termin_id >= '800' or termin_ausblenden = '1' order by termin_id desc limit 50 " );

while ( $result_versteckt=mysqli_fetch_array($termin_versteckt, MYSQLI_BOTH ) ) {



if ( $result_versteckt["termin_id"] == $_POST['versteckt_termine'] ) { $selected_1="selected"; }  else { $selected_1=""; } 

$termine_versteckt.="<option value=\"$result_versteckt[termin_id]\" $selected_1>$result_versteckt[termin_id]&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;".substr("$result_versteckt[text_fuer_buchung]",0,50)." ...</option>";

$datum_von="";

}



 $termin_alt=mysqli_query($link, "select termin_id, termin_von, thema from termine where termin_ausblenden = '0' order by termin_id desc limit 100 " );

while ( $result_alt=mysqli_fetch_array($termin_alt, MYSQLI_BOTH ) ) {



if ( $result_alt["termin_id"] == $_POST['alte_termine'] ) { $selected_2="selected"; }  else { $selected_2=""; } 

$termine_alt.="<option value=\"$result_alt[termin_id]\" $selected_2>$result_alt[termin_id]&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;".substr("$result_alt[thema]",0,50)." ...</option>";

$datum_von="";

}


 ?>

 <br>

<select name="versteckt_termine">

<option value="">Versteckte Termin_ID's</option>

<?php echo  $termine_versteckt; ?>

 </select>
 <br><br>
 
 <select name="alte_termine">

<option value="">Alte Termin_ID's</option>

<?php echo  $termine_alt; ?>

 </select>

 </td>

 

 <td align="left"  width="1350px" height="50px" valign="top" bgcolor="">

  <table width="1300px" height="500px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"

  style="bgcolor: #FFFFFF;        

       z-index: +5;

<!--        border: 0px  solid #4A4A4A;

       border-radius: 20px 20px 20px 20px;

       padding: 5px;

       box-shadow: 0px 0px 0px #4A4A4A; //-->">

 <tr><td valign="top" colspan="2" height="10%">

<h2>Termin-Korrekturmaske:</h2>

</td></tr>

<?php 
if ( ( $_POST['konten_auswahl'] == "" ) && ( $_POST['speichern'] == TRUE ) ) { 
echo "
<tr>
<td valign='top' align='left' colspan='2' bgcolor='yellow'><h2><font style='color:red'>
SIE M&Uuml;SSEN EIN PAYPAL-KONTO ausw&auml;hlen !<br>
</td>
</tr>
";
}  
?>

  

<tr>
<td valign="top" width="35%" align="right"><h11a>

Termine zur Korrektur:

</h11a>

</td>

<td valign="top"  width="65%" align="left"><t1>





<select name="korrektur_termine"

style=" width: 500px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">

<option value="" selected>Termin w&auml;hlen</option>

<?php echo $termine_db; ?>

</select>&nbsp;&nbsp;

oder bekannte Termin-ID&nbsp;

<input type="text" size="15" name="bekannte_termin_id" value="<?php echo $_POST['bekannte_termin_id'];  ?>"/>

</td>

</tr>





<tr>

<td valign="top" width="35%" align="right"><t1>

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<input type="submit" name="termin_laden" tabindex="10" value="Termin laden"

style=" width: 240px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;"></t1>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="submit" name="termin_loeschen" tabindex="10" value="Termin loeschen"

style=" width: 240px; height: 30px; color: #000000; font-size: 18px; background-color: orange;  border: 0px; border-radius: 5px 5px 5px 5px;">

</td>

</tr>



<?php



if ( $_POST['termin_loeschen'] == TRUE ) { echo "



<tr>

<td valign=\"top\" width=\"35%\" align=\"right\"><t1>

</t1>

</td>

<td valign=\"top\"  width=\"65%\" align=\"left\"><t1>

<font style=\" background: yellow; \">&nbsp;&nbsp;Wollen Sie den ausgew&auml;hlten Termin wirklich l&ouml;schen ?&nbsp;&nbsp;</font>

<br><br>

<input type=\"submit\" name=\"final_loeschen\" tabindex=\"10\" value=\"Termin endg&uuml;ltig loeschen\"

style=\" width: 240px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">

</td>

</tr>";

}



if ($_POST['final_loeschen'] == TRUE) {

mysqli_query($link, "delete from termine where termin_id = '$_POST[korrektur_termine]' or termin_id = '$_POST[bekannte_termin_id]'

");

}



?>





<?php 



if ( $_POST['termin_laden'] == TRUE ) {

$select_termin=mysqli_query($link, "select * from termine where termin_id = '$_POST[korrektur_termine]' or termin_id = '$_POST[bekannte_termin_id]' " );

while ( $result_termin= mysqli_fetch_array($select_termin, MYSQLI_BOTH ) ) {

$termin_id_db=$result_termin['termin_id'];

$termin_von_db=$result_termin['termin_von'];

$termin_bis_db=$result_termin['termin_bis'];

$termin_ausblenden_db=$result_termin['termin_ausblenden'];

$ort_db=$result_termin['ort'];

$thema_db=$result_termin['thema'];

$fruehbuch_datum_db=$result_termin['fruehbuch_datum'];

$fruehbuch_preis_db=$result_termin['fruehbuch_preis'];

$regular_preis_db=$result_termin['regular_preis'];

$eintages_preis_db=$result_termin['eintages_preis'];

$link_eintagespreis=$result_termin['link_eintagespreis'];

$halbtages_preis_db=$result_termin['halbtages_preis'];

$link_halbtagespreis=$result_termin['link_halbtagespreis'];

$webinar_code_db=$result_termin['webinar_code'];

$bezahl_vorgang_db=$result_termin['text_fuer_buchung'];

$details_db=$result_termin['details'];

$monat_db=$result_termin['monat'];

$praesenz_db=$result_termin['wo'];

$aktionsbild_db=$result_termin['aktionsbild'];

$preis_ausblenden_db=$result_termin['preis_ausblenden'];

$zugangs_code_db=$result_termin['zugangs_code'];

$paypal_konto_db=$result_termin['paypal_konto'];

}

}

?>  



<tr>
<td valign="top" width="35%" align="right"  style=" background-color: red;"><t1>
  <font style=" background: yellow; ">&nbsp;Link für den aktuellen Termin:&nbsp;</font>
  </td>
  <td valign="top"  width="65%" align="left" style=" background-color: red;"><t1><font style=" color: #FFFFFF"><b>https://www.petra-herz.de/termin_details.php?termin_id=<?php echo $termin_id_db; ?>
  </b></td>
  </tr>
  

<tr>

<td valign="top" width="35%" align="right"><t1>


Termin von (Format: YYYY-MM-DD)

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<input type="text" name="termin_von_f" size="30" tabindex="1" value="<?php echo neuladen($termin_von_db,$_POST['termin_von_f'],$_POST['termin_laden']); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;



im Monat <input type="text" name="monat_f" size="3" tabindex="1" value="<?php echo neuladen($monat_db,$_POST['monat_f'],$_POST['termin_laden']); ?>"/> (1 bis 12)

&nbsp;&nbsp;&nbsp;&nbsp;

<?php 

if ( $_POST['wo_f'] == "physisch" )
{ $selected_1 = "selected"; $selected_2=""; $selected_3=""; $selected_4=""; $selected_5=""; $selected_6=""; $selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "radio" )
{ $selected_2 = "selected";  $selected_1=""; $selected_3=""; $selected_4=""; $selected_5=""; $selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "btg" )
{ $selected_3 = "selected";   $selected_1=""; $selected_2=""; $selected_4=""; $selected_5="";$selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "web" )
{ $selected_4 = "selected";   $selected_1=""; $selected_2=""; $selected_3=""; $selected_5="";$selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "buchhandlung" ) 
{ $selected_5 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_6="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "lundk" ) 
{ $selected_6 = "selected";  $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_7="";$selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "aktionsbild" )
{ $selected_7 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_8="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "frieden" ) 
{ $selected_8 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_7="";$selected_9 = "";$selected_10 = "";}


if ( $_POST['wo_f'] == "da_ai" )
{ $selected_9 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_7="";$selected_8=""; $selected_10 = "";}

 
if ( $_POST['wo_f'] == "pay" )
{ $selected_10 = "selected"; $selected_1=""; $selected_2=""; $selected_3=""; $selected_4="";$selected_5="";$selected_6=""; $selected_7="";$selected_8=""; $selected_9 = "";}

echo "
Pr&auml;senz: <select name=\"wo_f\">
<option value=\"null\">physisch, Radio, Web</option>
<option value=\"physisch\" $selected_1>In Person</option>
<option value=\"btg\" $selected_3>Blessing to go</option>
<option value=\"web\" $selected_4>Im Internet</option>
<option value=\"buchhandlung\" $selected_5>Buchhandlung</option>
<option value=\"lundk\" $selected_6>Live & Kostenfrei</option>
<option value=\"aktionsbild\" $selected_7>Aktionsbild</option>
<option value=\"frieden\" $selected_8>Frieden</option>
<option value=\"da_ai\" $selected_9>Kalligrafie</option>
<option value=\"online\" $selected_10>Online</option>
</select>
";

?>



</t1>

</td>

</tr>



<tr>

<td align="right">

<t1>Ort:</td>

<td><input type="text" name="ort_f" size="30" tabindex="1" value="<?php echo neuladen($ort_db,$_POST['ort_f'],$_POST['termin_laden']);; ?>"/></t1>

</td>

</tr>





<tr>

<td valign="top" width="35%" align="right"><t1>

Hinweis !

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<font style=" background: yellow; ">&nbsp;&nbsp;Bei einem 1-t&auml;gigen Termin MUSS !!! in "Termin von" und "Termin bis" das gleiche Datum stehen!&nbsp;&nbsp;</t1></font>

</td>

</tr>





<tr>

<td valign="top" width="35%" align="right"><t1>

Termin bis (Format: YYYY-MM-DD)

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<input type="text" name="termin_bis_f" size="30" tabindex="1" value="<?php echo neuladen($termin_bis_db,$_POST['termin_bis_f'],$_POST['termin_laden']); ?>"/></t1>

</td>

</tr>



<tr>

<td valign="top" width="35%" align="right"><t1>

Termin auf website ausblenden

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<input type="text" name="termin_ausblenden" size="2" tabindex="1" value="<?php echo neuladen($_POST['termin_ausblenden'], $termin_ausblenden_db); ?>"/> ausblenden = 1</t1>

</td>

</tr>




<tr>

<td valign="top" width="35%" align="right"><t1>

Thema

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<textarea cols="120" rows="3" name="thema_f" tabindex="1"><?php echo neuladen($thema_db,$_POST['thema_f'],$_POST['termin_laden']); ?></textarea>

</td>

</tr>



<tr>

<td valign="top" width="35%" align="right"><t1>

Text f&uuml;r Bezahlvorgang<br>

bzw. Name des Produkts

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<textarea cols="120" rows="3" name="bezahl_vorgang_f" tabindex="1"><?php echo neuladen($bezahl_vorgang_db,$_POST['bezahl_vorgang_f'],$_POST['termin_laden']); ?></textarea>

</td>

</tr>



<tr>

<td valign="top" width="35%" align="right"><t1>

Webinar-Zugangs-Code

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<textarea cols="120" rows="3" name="webinar_code_f" tabindex="1"><?php echo neuladen($webinar_code_db,$_POST['webinar_code_f'],$_POST['termin_laden']); ?></textarea>

</td>

</tr>



<tr>

<td align="right">

<t1>Aktionsbild:</td>

<td><t1><input type="text" name="aktions_bild" size="120" tabindex="1" value="<?php echo neuladen($aktionsbild_db,$_POST['aktions_bild'],$_POST['termin_laden']);; ?>"/></t1>

</td>

</tr>



<tr>
<td colspan=2" valign="top" width="35%" align="left" bgcolor="red"><t1><font style= "color:#FFFFFF"><b></b>
z.Zt. gespeichertes PAYPAL-KONTO:&nbsp;&nbsp;&nbsp; <?php echo $paypal_konto_db; ?>
<br><br>
Achtung! In jedem Fall ist eine ERNEUTE Auswahl f&uuml;r das PAYPAL-Konto zu treffen:
&nbsp;&nbsp;&nbsp;&nbsp;
TAO-LIFE-Konto:&nbsp;&nbsp;<input type="radio" name="konten_auswahl" value="taolifetransformation@gmail.com" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
HERZ-COACHING-Konto:&nbsp;&nbsp;<input checked type="radio" name="konten_auswahl" value="herz.petra.coaching@gmail.com" />
</td>
</tr>





<tr>

<td valign="top" width="35%" align="left" colspan="2"><t1>

Vorzugspreis bei Buchung und Bezahlung bis zum (Format: YYYY-MM-DD) <input type="text" name="fruehbuch_datum" size="15" tabindex="1" value="<?php echo neuladen($fruehbuch_datum_db,$_POST['fruehbuch_datum'],$_POST['termin_laden']); ?>"/><br><br>





<table>

<tr>

<td colspan="2">

Format f&uuml;r alle Preis-Angaben in Euro: <b>100.00</b><br><br></td>

</tr>

<tr>

<td>

Fr&uuml;hbucher-Preis:</td> <td><input type="text" name="fruehbuch_preis" size="15" tabindex="1" value="<?php echo neuladen($fruehbuch_preis_db, $_POST['fruehbuch_preis'], $_POST['termin_laden']); ?>"/> Euro

&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Fr&uuml;hbucher bleibt konstant.

<br></td>

</tr>

<tr>

<td>

Normalpreis: </td> <td><input type="text" name="regular_preis" size="15" tabindex="1" value="<?php echo neuladen( $regular_preis_db, $_POST['regular_preis'], $_POST['termin_laden']); ?>"/> Euro

&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Normalpreis bleibt konstant.</t1><br></td>

</tr>

<tr>

<td>

1-Tages-Preis: </td> <td><input type="text" name="halber_preis" size="15" tabindex="1" value="<?php echo neuladen($eintages_preis_db, $_POST['halber_preis'], $_POST['termin_laden']); ?>"/> Euro</t1>

&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Preis 3:&nbsp;<input type="text" name="link_halberpreis" size="55" tabindex="1" value="<?php echo neuladen($link_eintagespreis, $_POST['link_halberpreis'], $_POST['termin_laden']); ?>"/><br></td>

</tr>

<tr>

<td>

Halb-Tages-Preis (abends oder vormittags): </td> <td><input type="text" name="halb_tages_preis" size="15" tabindex="1" value="<?php echo neuladen($halbtages_preis_db, $_POST['halb_tages_preis'], $_POST['termin_laden']); ?>"/> Euro</t1>

&nbsp;&nbsp;&nbsp;Link-Text f&uuml;r Preis 4:&nbsp;<input type="text" name="link_halbtagespreis" size="55" tabindex="1" value="<?php echo neuladen($link_halbtagespreis, $_POST['link_halbtagespreis'], $_POST['termin_laden']); ?>"<br></td>

</tr>





<tr>

<td colspan="2">

<br>

<font style="background: yellow; "> Preise auf der Website ausblenden: </font> <br>

Preise ausblenden = 1, Preise einblenden = 0&nbsp;&nbsp;&nbsp;<input type="text" name="preis_ausblenden" tabindex="1" value="<?php echo neuladen($preis_ausblenden_db, $_POST['preis_ausblenden'], $_POST['termin_laden']); ?>"style=" height: 40px; width: 40px; background: yellow; font-size: 24pt; text-align: center;"/>

Code f&uuml;r den Zugang:&nbsp;<input type="text" name="zugangs_code" size="30" tabindex="1" value="<?php echo neuladen($zugangs_code_db, $_POST['zugangs_code'], $_POST['termin_laden']); ?>"</t1><br></td>

</tr>





</table>



</td>

</tr>









<tr>

<td valign="top" width="35%" align="left" colspan="2"><t1>

Details&nbsp;&nbsp;&nbsp;Interner Code f&uuml;r diesen Termin:&nbsp; <?php echo $_POST['korrektur_termine']; ?><br><t1>



<textarea cols="120" rows="30" id="details_f" name="details_f"><?php echo neuladen($details_db,$_POST['details_f'],$_POST['termin_laden']); ?></textarea></t1>

            <script>

                // Replace the <textarea id="details_f"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'details_f' );

            </script>

</td>

</tr>







<tr>

<td valign="top" width="35%" align="right"><t1>

</t1>

</td>

<td valign="top"  width="65%" align="left"><t1>

<input type="submit" name="speichern" tabindex="10" value="Termin &auml;ndern"

style=" width: 240px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">

</t1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</td>

</tr>


<?php if ( ( $_POST['konten_auswahl'] == "" ) && ( $_POST['speichern'] == TRUE ) ) { 
echo "
<tr>
<td valign='top' align='left' colspan='2'><t1><font style='color:red'>
SIE M&Uuml;SSEN EIN PAYPAL-KONTO ausw&auml;hlen !<br>
</td>
</tr>
";
exit;
}

 

$themen=htmlentities($_POST['thema_f']);

$ort=htmlentities($_POST['ort_f']);

$text_fuer_bezahlvorgang=htmlentities($_POST['bezahl_vorgang_f']);

// $details_f=htmlentities($details_f);

$text_fuer_buchung=htmlentities("$_POST[bezahl_vorgang_f]");





if ($_POST['speichern'] == TRUE) {



$details_f=mysqli_escape_string($_POST['details_f']);

/* $bezahlvorgang_f=mysqli_real_escape_string($link, $_POST['$_POST[bezahl_vorgang_f']); */



mysqli_query($link, "update termine set



termin_von = '$_POST[termin_von_f]',

termin_bis = '$_POST[termin_bis_f]',

termin_ausblenden = '$_POST[termin_ausblenden]',

ort = '$ort',

thema = '$themen',

fruehbuch_datum = '$_POST[fruehbuch_datum]',

fruehbuch_preis = '$_POST[fruehbuch_preis]',

regular_preis = '$_POST[regular_preis]',

eintages_preis = '$_POST[halber_preis]',

link_eintagespreis = '$_POST[link_halberpreis]',

halbtages_preis = '$_POST[halb_tages_preis]',

link_halbtagespreis = '$_POST[link_halbtagespreis]',

webinar_code = '$_POST[webinar_code_f]',

text_fuer_buchung = '$text_fuer_buchung',

details = '$details_f',

wo = '$_POST[wo_f]',

monat = '$_POST[monat_f]',

aktionsbild= '$_POST[aktions_bild]',

preis_ausblenden= '$_POST[preis_ausblenden]',

zugangs_code= '$_POST[zugangs_code]',

paypal_konto = '$_POST[konten_auswahl]'

where termin_id = '$_POST[korrektur_termine]' or termin_id = '$_POST[bekannte_termin_id]'

");



// $insert_id=mysql_insert_id();


}









 ?>



  

    

  </table>

  <br><br>

  <!-- ////////////////////////////////////////// //-->

 

 </td></tr>

 

 </div> 

 

 </td>

 </tr>

 



 

 </table>



</form>

  </body>

</html>