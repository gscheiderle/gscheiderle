<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>$uwesack</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
 
 <form action="" method="POST">
  
<?php  
include("../intern/css/span.php");
include("../intern/css/boxen.css"); 
include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");
?>
  

  
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
Details f&uuml;r den Ternin am <?php echo $_GET['termin'] ?> in <?php echo $_GET['ort'] ?>:
  </h11>
  </td></tr>
  
<tr>
<td valign="top" width="35%" align="right"><t1>
Wochentag
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="wochentag_f" size="75" tabindex="1" value="<?php echo $_POST['wochentag_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Datum
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="datum_f" size="75" tabindex="2" value="<?php echo $_POST['datum_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Uhrzeit
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="uhrzeit_f" size="75" tabindex="3" value="<?php echo $_POST['uhrzeit_f']; ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="35%" align="right"><t1>
Aktion
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="text" name="aktion_f" size="75" tabindex="4" value="<?php echo $_POST['aktion_f']; ?>"/></t1>
</td>
</tr>
<tr>
<td valign="top" width="35%" align="right"><t1>
Allg. Infos
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<textarea rows="6" name="info_f" cols="60" 
tabindex="5"><?php echo $_POST['info_f']; ?></textarea>
</td>
</tr>


<tr>
<td valign="top" width="35%" align="right"><t1>
Details speichern
</t1>
</td>
<td valign="top"  width="65%" align="left"><t1>
<input type="submit" name="speichern" size="75" tabindex="6" value="Speichern" />
</td>
</tr>

<?php 
if ($_POST['speichern'] == TRUE) {
mysqli_query($link,"insert into event_details
(
event_id,
tag,
datum,
zeit,
action,
info
)
values
(
'$_GET[event_id]',
'$_POST[wochentag_f]',
'$_POST[datum_f]',
'$_POST[uhrzeit_f]',
'$_POST[aktion_f]',
'$_POST[info_f]'
)
");
echo $error=mysql_error();
$insert_id=mysql_insert_id();
}

if($error == FALSE) { echo "

<tr>
<td valign=\"top\" width=\"35%\" align=\"right\"><t1>
Weitere Tage
</t1>
</td>
<td valign=\"top\"  width=\"65%\" align=\"left\">
<a href=\"maske_termine_details.php?event_id=$_GET[event_id]&termin=$_GET[termin]&ort=$_GET[ort]\"><t1>hier</t1></a>
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



 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->
 
</form>
  </body>
</html>