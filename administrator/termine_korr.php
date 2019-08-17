<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>$uwesack</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
 
 <form action="" method="POST">
  
<?php  
include("../../intern/css/span.php");
include("../../intern/css/boxen.css"); 
include("../../intern/css/schriften.css"); 
include("../../intern/parameter.php");
include("../../intern/mysql_connect_gscheiderle.php");
?>
  
  <div class="lph">
  <div align="center">
  <table width="250px" height="841px"><tr><td align="center" valign="top">
  <img border="0" src="../../intern/pictures/system/lph.png" width="225px" height="756px">
  </td></tr></table>
  </div>
  </div>
  
  <div align="center">
  
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->

  
<?php include("../../intern/kopf.php"); ?>
 
 <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //--> 
 
 </td>
 </tr>
 
<tr>
 <td colspan="3" height="20px" align="center" valign="top" bgcolor=<?php echo $menu; ?>>
 <table width="780px" height="20px" cellpadding="0" cellspacing="0" bgcolor=<?php echo $menu; ?> border="0">
 <tr><td align="center"  width="780px" height="20px" valign="top">
 <?php include("../../intern/css/dropdown_menue.php"); ?>
 </td></tr>
 </table>
 </td>
 </tr>
</table>

  
<table width="100%" cellpadding="0" cellspacing="0" bgcolor="" border="0" >
  
 <tr>
 <td bgcolor="#FFFFFF" colspan="3" height="5px" align="center"  valign="TOP">
 </td>
</tr>

 <tr>
 <td bgcolor=<?php echo $feldfarbe; ?> colspan="3" height="500px" align="center"  valign="TOP">

 <table width="1050px" height="500px" cellpadding="0" cellspacing="0" bgcolor=<?php echo $feldfarbe; ?> border="0">
 <tr><td align="center"  width="1050px" height="50px" valign="top" bgcolor="">
<!-- mittleres, grosses Feld mit Inhalt fuellen //-->
<br><br>
  <table width="900px" height="500px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 12px 12px 12px #4A4A4A;">
 <tr><td valign="top" colspan="2" height="10%"><br><h11>
Eingabemaske Termine:
  </h11>
  </td></tr>
  
<tr>
<td valign="top" width="35%" align="right"><t1>
Termin (Format: YYYY-MM-DD)
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="termin_f" size="75" tabindex="1" value="<?php echo $_POST['termin_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Termin von/bis
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="termin_von_bis_f" size="75" tabindex="2" value="<?php echo $_POST['termin_von_bis_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Ort
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="ort_f" size="75" tabindex="3" value="<?php echo $_POST['ort_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Thema
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="thema_f" size="75" tabindex="4" value="<?php echo $_POST['thema_f']; ?>"/></t1>
</td>
</tr>
<tr>
<td valign="top" width="35%" align="right"><t1>
Moderation
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="moderation_f" size="75" tabindex="5" value="<?php echo $_POST['moderation_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Veranstaltungs-Adresse
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="v_adresse_f" size="75" tabindex="6" value="<?php echo $_POST['v_adresse_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Anfahrt
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="anfahrt_f" size="75" tabindex="7" value="<?php echo $_POST['anfahrt_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Daten speichern
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="submit" name="speichern" tabindex="8" value="Speichern"></t1>
</td>
</tr>



<?php 
if ($_POST['speichern'] == TRUE) {
mysqli_query($link,"insert into termine
(
termin,
termin_alle,
ort,
thema,
moderation,
event_adresse,
anfahrt
)
values
(
'$_POST[termin_f]',
'$_POST[termin_von_bis_f]',
'$_POST[ort_f]',
'$_POST[thema_f]',
'$_POST[moderation_f]',
'$_POST[v_adresse_f]',
'$_POST[anfahrt_f]'
)
");
$error=mysql_error();
$insert_id=mysql_insert_id();
}

if($error == FALSE) { echo "

<tr>
<td valign=\"top\" width=\"35%\" align=\"right\"><t1>
Event-Details eintragen
</t1>
</td>
<td valign=\"top\"  width=\"65%\" align=\"left\">
<a href=\"maske_termine_details.php?event_id=$insert_id&termin=$_POST[termin_f]&ort=$_POST[ort_f]\"><t1>hier</t1></a>
</td>
</tr>
";
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
 
  <tr>
 <td bgcolor="#FFFFFF" colspan="3" height="5px" align="center"  valign="TOP">
 </td>
</tr>

<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  //--> 

<?php include("../intern/fuss.php"); ?>

 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->
 
 
 
 
 
</form>
  </body>
</html>