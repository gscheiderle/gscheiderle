<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Wer hat was gebucht</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
          <script src="../ckeditor/ckeditor.js"></script>
	    <script src="../ckeditor/samples/sample.js"></script>
	    <link href="../ckeditor/samples/sample.css" rel="stylesheet">
      <!-- <link href="../intern/css/schriften.css rel="stylesheet"> //-->
  </head>
  <body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
 
 <form action="" method="POST">
  
<?php  
include("../intern/css/span.php");
include("../intern/css/boxen.css"); 
include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");


function neuladen($db_ausdruck,$formular_ausdruck,$post)
  {
  if($post == TRUE){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 



echo  "<div align=\"center\">";
$jetztzeit=date("Y-m-d");

$termin_auswahl=mysqli_query($link, "select distinct termin_id from termine where termin_bis >= '$jetztzeit' order by termin_von limit 20" );
while ( $result_auswahl=mysqli_fetch_array($termin_auswahl, MYSQLI_BOTH ) ) {
$event_id=$result_auswahl['termin_id'];

$event_auswahl=mysqli_query($link, "select distinct kd_nr from teilgenommen_haben where termin_id = '$event_id' " );
while ( $result_event=mysqli_fetch_array($event_auswahl, MYSQLI_BOTH ) ) {
$kdnr=$result_event['kd_nr'];
}


if ( $kdnr == "" ) { $kdnr = 9999; }

$select_thema=mysqli_query($link," select distinct termin_von, thema from termine where termin_id = '$event_id' ");
while ( $result_thema = mysqli_fetch_array( $select_thema, MYSQLI_BOTH ) ) {
$termin_von = $result_thema['termin_von'];
$thema = $result_thema['thema'];
}

if ( $result_auswahl["termin_id"] == $_POST['gebuchte_termine'] ) { $selected="selected"; }  else { $selected=""; } 
$termine_db.="<option value=\"$event_id\" $selected>$termin_von&nbsp;&nbsp;".substr("$thema",0,30)."</option>";
}

?>
  
  <table width="1300px" height="" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
 <tr><td valign="top" colspan="2" height="10%"><br><h11a>
Wer hat was gebucht
  </h11a>
  </td></tr>
  
  
  <tr>
<td valign="top" width="35%" align="right"><h11a>
Auswahl gebuchter Termine:
</h11a>
</td>
<td valign="top"  width="65%" align="left"><t1>
<select name="gebuchte_termine"
style=" width: 240px; height: 30px; color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
<?php echo $termine_db; ?>
</select>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" value="Kunden zeigen" name="kunden_zeigen" /></td>
</tr>
</table>

<table>
<?php 

if ( $_POST['kunden_zeigen'] == TRUE ) {
$zaehler=1;

$buchung_select=mysqli_query($link, "select kd_nr, betrag from teilgenommen_haben where termin_id = '$_POST[gebuchte_termine]' " );
while ( $result_event=mysqli_fetch_array($buchung_select, MYSQLI_BOTH ) ) {
echo $kunden_nr=$buchung_result['kd_nr'];
$betrag=$buchung_result['betrag'];

$select_name=mysqli_query($link," select name, vorname from adressen where kd_nr = '$kunden_nr' ");
while ( $result_name = mysqli_fetch_array( $select_name, MYSQLI_BOTH ) ) {
$name=$result_name['name'];
$vorname=$result_name['vorname'];
}

$selectthema=mysqli_query($link," select termin_von, thema from termine where termin_id = '$event_id' ");
while ( $resultthema = mysqli_fetch_array( $selectthema, MYSQLI_BOTH ) ) {
$terminvon = $resultthema['termin_von'];
$thema = substr("$resultthema[thema]",0,50);
}

echo "
<tr>
<td>$zaehler &nbsp;&nbsp;
<td>$terminvon&nbsp;&nbsp;</td>
<td>$thema&nbsp;&nbsp;</td>
<td>$name&nbsp;&nbsp;</td>
<td>$vorname&nbsp;&nbsp;</td>
<td align='right'>&nbsp;&nbsp;$betrag</td>
</tr>
";
$zaehler++;
}

}
 ?>




</form>
</body>
</html>