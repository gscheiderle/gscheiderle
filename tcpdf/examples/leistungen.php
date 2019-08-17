<?php session_start();  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Leistungen einpflegen</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action=\"leistungen.php?steuerung=1\" method=\"POST\">"; 

$zeit=time(H,i,s);


include("../intern/parameter.php");
include("in_clude/parameter_event_adressen.php");
include("../intern/mysql_connect_herz.php");
include("../css/schriften.php");

function neuladen($formular_ausdruck,$db_ausdruck)
{
 if(($formular_ausdruck != "") && ($db_ausdruck == "")){echo $formular_ausdruck;}
 if(($formular_ausdruck == "") && ($db_ausdruck != "")) {echo $db_ausdruck;}
} 


function datum_format($datum_orig)
{
$datum=substr($datum_orig,8,2).".";
$datum.=substr($datum_orig,5,2).".";
$datum.=substr($datum_orig,0,4);
return $datum;
}

      $mysql_version=trim(mysql_get_server_info());
      if (substr($mysql_version,0,1)>'4')
      {
          //Disable "STRICT" mode for MySQL 5!
          mysqli_query($link,"SET SESSION sql_mode=''");
      }
$zaehler=0;
 $select_teilnehmer=mysqli_query($link," select zw_id, event_code, name, vorname, email from zwischentabelle where uebertragen = '0' order by zw_id desc ");
 while ( $result_teilnehmer = mysqli_fetch_array ( $select_teilnehmer, MYSQLI_BOTH ) ) {
 $selected_zaehler=$selected."_".$zaehler;

 
 $select_datum=mysqli_query($link," select termin_von, termin_bis from termine where termin_id = '$result_teilnehmer[event_code]' ");
 while( $result_termin = mysqli_fetch_array( $select_datum, MYSQLI_BOTH ) ) {
 $datum_von=$result_termin['termin_von'];
 $datum_bis=$result_termin['termin_bis'];
 
 
 
 // datum auf deutsches format bringen
$datumvon.=substr($result_termin[termin_von],8,2).".";
$datumvon.=substr($result_termin[termin_von],5,2).".";
//$datum_von.=substr($result_termine[termin_von],0,4);

// datum auf deutsches format bringen
$datumbis.=substr($result_termin[termin_bis],8,2).".";
$datumbis.=substr($result_termin[termin_bis],5,2).".";
$datumbis.=substr($result_termin[termin_bis],0,4);

} 
$datum=$datumvon." - ".$datumbis;
if($datum_von == $datum_bis) {$datum=$datumbis;} 
 
 if ( $_POST['select_teilnehmer_id'] == $result_teilnehmer[zw_id] ) { $selected_zaehler="selected"; }
 $teilnehmer.= "
 <option value='$result_teilnehmer[zw_id]' $selected_zaehler>&nbsp;&nbsp;&nbsp;
    $datum&nbsp;&nbsp;&nbsp;
    $result_teilnehmer[name],&nbsp;
    $result_teilnehmer[vorname]&nbsp;&nbsp;
    $result_teilnehmer[email]
    </option>
    ";
$datumvon="";
$datumbis="";
$datum_von="";
$datum_bis="";
$datum="";
$zaehler++;
}        
?>  
  

<!-- /////////////////////////////////////////////////////////////////////////////////// //-->


<div align="center"><center>
<table border="0" width="1200px" bgcolor="" cellspacing="0px">

<?php include("nav_leiste.html"); ?>

</table>
<div align="center">

<h1>Leistungen einpflegen (alle Preise inkl. MWSt.)</h1>
  
<?php 

if ( $_COOKIE['password'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
} 
  
  
  ?>     
 <table border="0" width="1200px" height="100px" cellspacing="0" bgcolor="">      

    
<?php    
///CHECKED ANGEBOT ///////////////////////////////////////////////////////////////////////////////////////
    
 include("in_clude/checked_angebot.php");  

///////////////////////////////////////////////////////////////////////////////////////////////////////////    


?>     
  
  
 
 <tr>
 <td colspan="3" align="left"  bgcolor="#bfeeba"> 
 <b> Zahlenformat: 120.00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Preise  incl. <?php echo $mw_st; ?> % MWSt.)<br><br></b> 
 Anzahl:&nbsp;&nbsp;
 <input type="text" name="anzahl" value="<?php echo $_POST['anzahl']; ?>" style=" text-align: center; border: 0px; border-color:; width:50px; height:35px; background-color: #dadada; border-width: 1; font-family: Open Sans; font-size: 24px; font-weight: 700; color: #000000; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; ">&nbsp;&nbsp;

 Einzel-Preis&nbsp;&nbsp; 
<input type="text" name="einzelpreis" value="<?php echo $_POST['einzelpreis']; ?>" style=" text-align: center; border: 0px; border-color:; width:80px; height:35px; background-color: #dadada; border-width: 1; font-family: Open Sans; font-size: 24px; font-weight: 700; color: #000000; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; ">&nbsp;&nbsp;

 Gesamt (wird errechnet)&nbsp;&nbsp; 
<font style=" text-align: center; border: 0px; border-color:; width:80px; height:35px; background-color: #dadada; border-width: 1; font-family: Open Sans; font-size: 24px; font-weight: 700; color: #000000; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; "><?php echo "&nbsp;&nbsp;".$gesamt=$_POST['einzelpreis'] * $_POST['anzahl']."&nbsp;&nbsp;"; ?></font>&nbsp;&nbsp;

Bezahlt:&nbsp;&nbsp; 
<input type="text" name="bezahlt" value="<?php echo $_POST['bezahlt']; ?>" style=" text-align: center; border: 0px; border-color:; width:80px; height:35px; background-color: #dadada; border-width: 1; font-family: Open Sans; font-size: 24px; font-weight: 700; color: green; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; ">&nbsp;&nbsp;


<?php 
if ( $gesamt > $_POST['bezahlt'] ) {
$rueckstand=$gesamt-$_POST['bezahlt']; 
$plus_minus=$rueckstand;
$rueckstand_guthaben="<font style='font-family: Open Sans; font-size: 24px; font-weight: 700; color: red;'>R&uuml;ckstand:&nbsp; ".$plus_minus." Euro</font>";
$guthaben="";
}

if ( $gesamt < $_POST['bezahlt'] ) {
$guthaben=$_POST['bezahlt'] - $gesamt; 
$plus_minus=$guthaben;
$rueckstand_guthaben="<font style='font-family: Open Sans; font-size: 24px; font-weight: 700; color: green;'>Guthaben:&nbsp; ".$plus_minus." Euro</font>";
$rueckstand="";
}

$plus_minus=number_format($plus_minus,"2",",","");

echo $rueckstand_guthaben;
?>
</td> 
</tr> 
    
<?php    
///CHECKED ZAHLUNG ///////////////////////////////////////////////////////////////////////////////////////
    
 include("in_clude/checked_zahlung.php");  

///////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 ?> 
 
 </table>
 
 <table border="0" width="1200px" bgcolor="" cellspacing="0px">
    <tr>
<td align="center" valign="top" bgcolor="">
<br><br>
      <input type="submit" name="leistung_pruefen" value="Eingaben pr&uuml;fen" style=" text-align: center; border: 0px; border-color:; width:400px; height:35px; background-color: orange; border-width: 1; font-family: Open Sans; font-size: 24px; font-weight: 700; color: #FFFFFF; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; "><br><br>
      </td>
    </tr>
    
<?php 

$ctrl=TRUE;

$re_datum=date("Y-m-d");
$netto=($gesamt/(100+$mw_st) * 100 );
$mwst=($gesamt/(100+$mw_st) * $mw_st );
    
$leistung=$_POST['standart_leistung'];
    
if ( ( $_POST['leistung_speichern'] == TRUE ) && ( $_POST['standart_leistung'] == "Diverse Leistungen" ) ) { $leistung = $_POST['diverseleistungen']; }
if ( ( $_POST['leistung_speichern'] == TRUE ) && ( $_POST['standart_leistung'] == "Verwaltung" ) ) { 
$_POST['betrag'] = $_POST['betrag']-($_POST['betrag']*2);
$leistung = $_POST['diverseleistungen'];
}


$teilnehmerid = $_POST['select_teilnehmer_id'];
 
if ( ( $_POST['leistung_pruefen'] == TRUE ) || ( $_POST['leistung_updaten'] == TRUE ) || ( $_POST['leistung_speichern'] == TRUE ) ) { 




$select_adresse=mysqli_query($link," select kd_nr, event_code, name, vorname, geschlecht, email from zwischentabelle where zw_id = '$teilnehmerid' and uebertragen = '0' ");
while ( $result_adresse = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
$event_id_db=$result_adresse['event_code'];
$kd_nr_db=$result_adresse['kd_nr'];
$name_db=$result_adresse['name'];
$vorname_db=$result_adresse['vorname'];
$anrede_db=$result_adresse['geschlecht'];
$email_db=$result_adresse['email'];
}

if ($_POST['finde_kd_nr'] > 1000 ) {

$select_adresse=mysqli_query($link," select kd_nr, name, vorname, geschlecht, email from adressen where kd_nr = '$_POST[finde_kd_nr]' ");
while ( $result_adresse = mysqli_fetch_array( $select_adresse, MYSQLI_BOTH ) ) {
$event_id_db=10000;
$kd_nr_db=$result_adresse['kd_nr'];
$name_db=$result_adresse['name'];
$vorname_db=$result_adresse['vorname'];
$anrede_db=$result_adresse['geschlecht'];
$email_db=$result_adresse['email'];
}
}



$_SESSION['kd_nr'] = $kd_nr_db;

$zaehler=1;
$re_select=mysqli_query($link," select re_id, re_nr, artikel, brutto_betrag, rueckstand, guthaben from rechnungen where event_id = '$event_id_db' and kd_nr = '$kd_nr_db' ");
while ( $re_result = mysqli_fetch_array ( $re_select, MYSQLI_BOTH ) ) {

$re_id_db=$re_result['re_id'];
$re_nr_db=$re_result['re_nr'];

if ( $re_result['rueckstand'] > 1 ) {
$rueck_stand="<font color='red'>R&uuml;ckstand Euro ".$re_result['rueckstand']."</font>";
$gut_haben="";
}

if ( $re_result['guthaben'] > 1 ) {
$gut_haben="<font color='green'>Guthaben Euro ".$re_result['guthaben']."</font>";
$rueck_stand="";
}

$schon_vorhanden == FALSE;
if ( ( $re_result['brutto_betrag'] != "" ) && ( $re_result['artikel'] != "" ) ) {
$schon_vorhanden = TRUE;
} // ende if preis
$bezahlte_leistungen.=$zaehler.". ".substr("$re_result[artikel]",0,50)." ... Euro ".$re_result['brutto_betrag']." ".$rueck_stand.$gut_haben."<br>";
$zaehler++;
$rueck_stand="";
$gut_haben="";
} // ende while


// FEHLERMELDUNGEN ////////////////////////////////////////////////////////////////////////////////////////////

include("in_clude/warnungen.php");

///////////////////////////////////////////////////////////////////////////////////////////////////////////////



if ( $ctrl == FALSE ) { 
echo $warnung;
exit;
}


echo "
<tr>
  <td align='' valign='top' bgcolor=''>";

if ( $schon_vorhanden == TRUE ) {
echo "
   <br>
   <h3><font style=' background-color: yellow; '>&nbsp;&nbsp;Vom Kunden wurden f&uuml;r diesen Event bereits gebucht und bezahlt:&nbsp;&nbsp;&nbsp;</font><br></h3>
   <hr><font style='text-align: left; background-color:; font-size: 24px; '>
   $bezahlte_leistungen
   </font><hr><br>
   Mit obiger Eingabe wie folgt verfahren:<br>";
   }
echo "<br>  
   <input type='submit' name='leistung_speichern' value='Eingaben speichern' style=' text-align: center; border: 0px; border-color:; width:300px; height:35px; background-color: green; border-width: 1; font-family: Open Sans;font-size: 24px; font-weight: 700; color: #FFFFFF; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; '>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   <input type='submit' name='leistung_updaten' value='Eingaben verwerfen' style=' text-align: center; border: 0px; border-color:; width:300px; height:35px; background-color: red; border-width: 1; font-family: Open Sans;font-size: 24px; font-weight: 700; color: #FFFFFF; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; '>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$echnung_drucken
<br><br>
  </td>
 ";


} // ende leistung pruefen

echo "<input type='hidden' name='eventid' value='$event_id_db'>";
echo "<input type='hidden' name='kundennummer' value='$kd_nr_db'>";
echo "<input type='hidden' name='teilnehmerid' value='$teilnehmerid'>";

if ( ( $_POST['leistung_updaten'] == TRUE ) || ( $_POST['leistung_speichern'] == TRUE ) ) {


// mysqli_query($link," update rechnungen set teilnehmer_id = '$_POST[teilnehmerid]' where kd_nr = '$_POST[kundennummer]' and event_id = '$_POST[eventid]' ");


/* echo $_POST[teilnehmerid]."<br>";
echo $_POST[kundennummer]."<br>";
echo $_POST[eventid]."<br>"; */
}



if ( $_POST['leistung_speichern'] == TRUE ) { 


$sperren=mysqli_query($link,"LOCK TABLES rechnungsnummer write, rechnungsnummer as rechnungsnummer read");
$select_re_nr = mysqli_query($link,"select max(re_nr) + 1 as renr from rechnungsnummer");
while ($result_renr=mysqli_fetch_array( $select_re_nr, MYSQLI_BOTH ) ) {
$neue_re_nr=$result_renr['renr'];
mysqli_query($link,"insert into rechnungsnummer (event_id, re_nr, kd_nr) values ('$event_id_db', '$neue_re_nr', '$kd_nr_db') ");
}
mysqli_query($link,"UNLOCK TABLES");


$leistungen=htmlentities($leistung);

mysqli_query($link," insert into rechnungen (
re_datum, 
re_nr, 
kd_nr,
event_id,
teilnehmer_id,  
artikel,
anzahl,
einzelpreis, 
netto_betrag, 
mwst, 
brutto_betrag, 
bezahlt,
rueckstand,
guthaben,
zahlweise,
ip, 
zeit
) 
values
( 
'$re_datum', 
'$neue_re_nr', 
'$kd_nr_db',
'$event_id_db', 
'$teilnehmerid', 
'$leistungen',
'$_POST[anzahl]', 
'$_POST[einzelpreis]',
'$netto', 
'$mwst', 
'$gesamt',
'$_POST[bezahlt]',
'$rueckstand',
'$guthaben',
'$_POST[zahlung]', 
'$_SERVER[REMOTE_ADDR]', 
'$zeit' 
) 
");

} // ende if
    
?>

<td align="center" valign="bottom">

<h3>
     
<?php 
if ( $neue_re_nr != "" ) {
echo $rechnung_drucken= "<a href=\"auswahl_rechnung.php?re_nr=$neue_re_nr&kd_nr=$kd_nr_db&teilnehmer_id=$teilnehmerid&zahlung=$_POST[zahlung]\" target=\"blanc\"><h2>
<input type='button' value='RECHNUNG DRUCKEN' style=' text-align: center; border: 0px;  width:350px; height:35px; background-color: red; border-width: 1; font-family: Open Sans;font-size: 24px; font-weight: 700; color: #FFFFFF; border-radius: 6px 6px 6px 6px; box-shadow: 0px 0px 0px #dadada; '>
</a>
<br>";
}

$re_datum=""; 
$neue_re_nr=""; 
$kd_nr_db="";
$event_id_db=""; 
$teilnehmerid=""; 
$leistung=""; 
$netto=""; 
$mwst=""; 
$gesamt="";
$_POST['bezahlt']="";
$rueckstand="";
$guthaben="";
$_POST['zahlung']=""; 
$_SERVER['REMOTE_ADDR']=""; 
$zeit=""; 
 
?>
</td>
</tr>

</table> 
  
   </form>
  </body>
</html>
