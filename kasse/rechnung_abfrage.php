<?php 
session_start();
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");
include("../intern/funktionen.php");

function datum_format($datum_orig)
{
$datum=substr($datum_orig,8,2).".";
$datum.=substr($datum_orig,5,2).".";
$datum.=substr($datum_orig,0,4);
return $datum;
}

?>
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">

<link rel="stylesheet" type="text/css" media="screen and (min-width: 1010px)"  href="../css/main.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 480px) and (max-width: 1009px)"   href="../css/main_600.css">

<title>Rechnung selectieren</title>


<script>
var __adobewebfontsappname__="dreamweaver"
</script>


<!--<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>-->

</head>

<body <?php echo $pagecolor; ?> link="#000000" vlink="#000000" alink="#000000" topmargin="30">

<div id="wrapper">
<div id="article">

<table border="0" width="1200px" bgcolor="" cellspacing="">

<?php /*include("../administrator/links_oben.php");*/ ?>

</table>
  
  <table border="0" width="1200" bgcolor="#FFFFFF" cellspacing="1" height="600">
   <tr>
      <td width="1200" height="19" align="right" valign="middle" colspan="2" bgcolor="#FFFFFF">
        <p align="center"><b><br><h2>Rechnungen selectieren nach ...</b></font></td>
    </tr>
    <tr>
      <td width="100%" valign="top"><br>
        
       
        


<?php
echo "<form method='POST' action='rechnung_abfrage.php'>";

$datum.= date("Y-m-d");


$proseite = 8;
$tabelle = "$rechnung";

if (empty($_GET["start"])) {
   $start = 0;
} else {
   $start = $_GET['start']; 
}

/*if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href=\"../administrator/index.php\">Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}*/


?>
<table border="0" align="center" width="1200" bgcolor="#dadada" cellspacing="4">
  
  
  <p><tr>
  
     <td width="11%" align="center" valign="middle" bgcolor="#dadada">
    <input checked type="radio" value="alle" name="auswahl" tabindex="1" style=" width: 20px; height: 20px; ">
    </td>
  
    <td width="11%" align="center" valign="middle" bgcolor="#dadada">
    <input type="radio" value="datum" name="auswahl" tabindex="1" style=" width: 20px; height: 20px; ">
    </td>
    
    <td width="11%" align="center" valign="middle" bgcolor="#dadada">
    <input type="radio" value="re_nr" name="auswahl" tabindex="2" style=" width: 20px; height: 20px; ">
    </td>
    
    
    <td width="11%" align="center" valign="middle" bgcolor="#dadada">
    <input type="radio" value="kd_nr" name="auswahl" tabindex="3" style=" width: 20px; height: 20px; ">
    </td>
      
         <td width="11%" align="center" valign="middle" bgcolor="#dadada">
    <input type="radio" value="name" name="auswahl" tabindex="3" style=" width: 20px; height: 20px; ">
    </td>
      
      
             <td width="11%" align="center" valign="middle" bgcolor="#dadada">
    <input type="radio" value="offene" name="auswahl" tabindex="3" style=" width: 20px; height: 20px; ">
    </td>  
    
    <td colspan="4" align="center" valign="middle" bgcolor="#dadada">
        <input type="text" name="selectieren" size="15" value="<?php echo $_POST['selectieren'];?>">
        <button type="submit" name="aufruf" value="aufruf"><h1>RE.-ANFRAGE</button>
    
    
<?php     

      $d = new DateTime( date("Y-m-d") );
      $d->modify( '- 10 days' );
      $vergangenheit= $d->format( 'Y-m-d' );


      $d = new DateTime( date("Y-m-d") );
      $d->modify( '+ 30 days' );
      $zukunft= $d->format( 'Y-m-d' );

 
      ?>
      
        

  </tr></p>
  
  <tr>
    <td width="11%" align="center" valign="middle" bgcolor="#dadada"><h4>alle</td>
    <td width="11%" align="center" valign="middle" bgcolor="#dadada"><h4>Datum</td>
    <td width="11%" align="center" valign="middle" bgcolor="#dadada"><h4>Re.-Nr.</td>
    <td width="11%" align="center" valign="middle" bgcolor="#dadada"><h4>KD-Nr.</td>
    <td width="11%" align="center" valign="middle" bgcolor="#dadada"><h4>Name</td>
    <td width="11%" align="center" valign="middle" bgcolor="#dadada"><h4>offene Rechnungen</td>
    <td colspan="3" align="right" valign="middle" bgcolor="#dadada"><h4>bezahlt</td>
        </td>

    </td>
  </tr>
</table>


<table border="0" width="1200" align="center" cellspacing="0" cellpadding="4" rules="rows">


<input type="hidden" name="selec_tieren" value="<?php echo $_POST['selectieren']; ?>">
<?php

// erste_re_nr und letzte_re_nr werden in den parametern definiert

if ($_POST[auswahl] == "alle"){
$kriterium = "re_nr > '1'";
$kriterium_1 = "re_nr > ";
$kriterium_2 = 1;
}

if ($_POST[auswahl] == "termin_id"){
$kriterium = "event_id = '$_POST[select_termin_id]'";
$kriterium_1 = "event_id = ";
$kriterium_2 = $_POST[select_termin_id];
}

if ($_POST[auswahl] == "datum"){
$kriterium = "re_datum = '$_POST[selectieren]'";
$kriterium_1 = "re_datum = ";
$kriterium_2 = $_POST[selectieren];
}

if ($_POST[auswahl] == "re_nr"){
$kriterium = "re_nr = '$_POST[selectieren]'";
$kriterium_1 = "re_nr = ";
$kriterium_2 = $_POST[selectieren];}

if ($_POST[auswahl] == "name"){
$kriterium = "name like '$_POST[selectieren]'";
$kriterium_1 = "name like ";
$kriterium_2 = $_POST[selectieren];}

if ($_POST[auswahl] == "kd_nr"){
$kriterium = "kd_nr = '$_POST[selectieren]'";
$kriterium_1 = "kd_nr = ";
$kriterium_2 = $_POST[selectieren]."%";}
    
if ($_POST[auswahl] == "offene"){
$kriterium = "bezahlt = '0' ";
$kriterium_1 = "bezahlt = ";
$kriterium_2 = '';}    

//abfrage nach Namen wird die Kunden_Nr. ermittelt und weiter verwendet
//gibt es mehr Moeglichkeiten, werde alle mit Namen und KD-Nr. augegeben
if ($_POST['auswahl'] == "name"){
$counter=0;
$kd_nr_ermitteln=mysqli_query($link,"select kd_nr, name, vorname, email from adressen where name like '%$_POST[selectieren]%' ");
while($kd_selec=@mysqli_fetch_array($kd_nr_ermitteln, MYSQLI_BOTH )){

$kunden="
      <tr>
      <td colspan=\"\"><font color=\"#000000\"><b>$kd_selec[kd_nr]</td>
      <td colspan=\"2\"><font color=\"#000000\"><b>$kd_selec[name], $kd_selec[vorname]
      <td colspan=\"\"><font color=\"#000000\"><b>$kd_selec[email]</td>
      </td>
      </tr>
      ";
$counter++;
if ($counter >= 1) {
echo $kunden;
} //ende if
} //ende while
} //ende if_auswahl

 

if ($_GET['kriterium_2'] != "") {
$kriterium = "";
$kriterium = $_GET[kriterium_1]."'".$_GET[kriterium_2]."'";
}


$select_rechnung = mysqli_query($link,"select
re_nr,
re_datum,
kd_nr,
transaktionsnr,
netto_betrag,
mwst,
brutto_betrag,
bezahlt
from rechnungen_summe where $kriterium order by re_id limit $start, $proseite");
while ($selec = @mysqli_fetch_array($select_rechnung, MYSQLI_BOTH )) {

$select_pos_id = mysqli_query($link,"select pos_id, auf_nr from $position
where re_nr = '$_GET[re_nr]'");
while ($sel = @mysqli_fetch_array($select_pos_id, MYSQLI_BOTH )) {
$pos_id = "$sel[pos_id]";
}

$re_kdnr= "$selec[kd_nr]";
$re_re_nr= "$selec[re_nr]";

$rechnung_auswahl.="<tr><td bgcolor=\"#FFFFFF\" ><h4>$selec[kd_nr]</font></td>";

$rechnung_auswahl.="<td bgcolor=\"#c0c0c0\"><h4>
<a href=\"auswahl_rechnung.php?re_nr=$selec[re_nr]&kd_nr=$selec[kd_nr]&teilnehmer_id=$selec[teilnehmer_id]\" target=\"rechts\">$selec[re_nr]</a></font></td>";

$rechnung_auswahl.="<td bgcolor=\"#FFFFFF\" ><h4>$selec[re_datum]</font></td>";



$select_kd_nr=mysqli_query($link," select name, vorname from adressen where kd_nr = '$selec[kd_nr]' " );
while ( $result_kd_nr = mysqli_fetch_array ( $select_kd_nr, MYSQLI_BOTH ) ) {
$nach_name=html_entity_decode($result_kd_nr['name']);
$vorname=html_entity_decode($result_kd_nr['vorname']);
$name=$nach_name.", ".$vorname;
}

if (!(isset($result_kd_nr['name']))) {  

$select_name=mysqli_query($link," select name, vorname from zwischentabelle where zw_id = '$selec[teilnehmer_id]' " );
while( $result_name = mysqli_fetch_array ( $select_name, MYSQLI_BOTH ) ) {
$nach_name=html_entity_decode($result_name['name']);
$vorname=html_entity_decode($result_name['vorname']);
$name=$nach_name.", ".$vorname;
}
}


$rechnung_auswahl.="<td bgcolor=\"#FFFFFF\" ><h4>$name</font></td>";
$rechnung_auswahl.="<td bgcolor=\"#FFFFFF\" ><h4>$selec[netto_betrag]</font></td>";
$rechnung_auswahl.="<td bgcolor=\"#FFFFFF\" ><h4>$selec[mwst]</font></td>";
$rechnung_auswahl.="<td bgcolor=\"#FFFFFF\" ><h4>$selec[brutto_betrag]</font></td>";
$rechnung_auswahl.="<td bgcolor=\"#FFFFFF\" ><h4>$selec[bezahlt]</font></td>
</tr>";

$name="";

}

/* ;} */

?>



<tr><td align="center" colspan="9">
<?php

$total_result = mysqli_query($link,"SELECT count(re_id) as total FROM rechnungen_summe where $kriterium ");
while ( $total_array = @mysqli_fetch_array( $total_result, MYSQLI_BOTH ) ) {
$total = $total_array['total'];
$pages = $total / $proseite;
$pages = ceil($pages);
}

$zurück = $_GET[start] / $proseite;
$vor = $_GET[start] / $proseite + 2;
$aktuell = $_GET[start] / $proseite + 1;

function kriterium($kriterium_for,$kriterium_get){
if ( ( $kriterium_for != "" ) && ( $kriterium_get == "" ) ) { $kriterium = $kriterium_for; }
if ( ( $kriterium_for == "" ) && ( $kriterium_get != "" ) ) { $kriterium = $kriterium_get; }
if ( ( $kriterium_for != "" ) && ( $kriterium_get != "" ) ) { $kriterium = $kriterium_get; }
return $kriterium;
}


echo	"<tr>
   	<td colspan=\"9\" align=\"center\">";

if ($pages > 1 && $_GET[start] > 0) {
   $foward = $start - $_GET[start];
   echo "<a href='rechnung_abfrage.php?start={$foward}&kriterium_1=".kriterium($kriterium_1,$_GET[kriterium_1])."&kriterium_2=".kriterium($kriterium_2,$_GET[kriterium_2])."'><<<--</a>  ";
   } 

if ($pages > 1 && $_GET[start] > 0) {
   $foward = $_GET[start] - $proseite;
   echo "<a href='rechnung_abfrage.php?start={$foward}&kriterium_1=".kriterium($kriterium_1,$_GET[kriterium_1])."&kriterium_2=".kriterium($kriterium_2,$_GET[kriterium_2])."'>Zur&uuml;ck</a> ";
   }

if ($pages > 1 && $_GET[start] - $proseite >= 0) {
  $foward = $_GET[start] - $proseite;
   echo "<a href='rechnung_abfrage.php?start={$foward}&kriterium_1=".kriterium($kriterium_1,$_GET[kriterium_1])."&kriterium_2=".kriterium($kriterium_2,$_GET[kriterium_2])."'>[$zurück]</a> ";
}
if ($pages > 1) {
   echo "[{$aktuell}]";
}
if ($pages > 1 && $_GET[start] + $proseite < $total) {
  $foward = $_GET[start] + $proseite;
  echo "<a href='rechnung_abfrage.php?start={$foward}&kriterium_1=".kriterium($kriterium_1,$_GET[kriterium_1])."&kriterium_2=".kriterium($kriterium_2,$_GET[kriterium_2])."'>[$vor]</a> ";
}
if ($pages > 1 && $_GET[start] + $proseite < $total) {
	$foward = $_GET[start] + $proseite;
   echo "<a href='rechnung_abfrage.php?start={$foward}&kriterium_1=".kriterium($kriterium_1,$_GET[kriterium_1])."&kriterium_2=".kriterium($kriterium_2,$_GET[kriterium_2])."'>Weiter</a>     ";
} 

if ($pages > 1 && $_GET[start] + $proseite != $total) {
	$foward = $total - ($total % $proseite) ;
   echo "<a href='rechnung_abfrage.php?start={$foward}&kriterium_1=".kriterium($kriterium_1,$_GET[kriterium_1])."&kriterium_2=".kriterium($kriterium_2,$_GET[kriterium_2])."'>-->>></a>";
} 
echo	"</tr>
   	</td>"; 
?>
<tr>
<td bgcolor="#FFFFFF" height="10"><font size="2">Kd.-Nr.</font></td>
<td bgcolor="#c0c0c0" height="10"><font size="2">Re.-Nr.</font></td>
<td bgcolor="#FFFFFF" height="10"><font size="2">Re.-Dat.</font></td>
<td bgcolor="#FFFFFF" height="10"><font size="2">Firma</font></td>
<td bgcolor="#FFFFFF" height="10"><font size="2">Summe netto</font></td>
<td bgcolor="#FFFFFF" height="10"><font size="2">MWSt.</font></td>
<td bgcolor="#FFFFFF" height="10"><font size="2">Re.-Summe</font></td>
</tr>

<?php  

echo $rechnung_auswahl;

$_GET[kriterium_1]="";
$_GET[kriterium_2]="";
$kriterium="";

?>

</td>
</tr>
</font>
        <tr>
      <td width="100%" height="19" align="right" valign="middle" colspan="9">
        <p align="center">
        

         
       <a href="auswahl.php"><b><font size="3">HOME</b></font></a>
       </td></tr>
      
</table>
</form>
        
        </td>
          </tr>
        </table>
      </center>
    </div>

    
  </body>
</html>
