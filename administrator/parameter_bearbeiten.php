<?php include("../intern/mysql_connect_gscheiderle.php"); ?>

<form action="parameter_bearbeiten.php" method="POST">
<?php


$select_farbcode=mysqli_query($link,"select * from farben");
while($result_farbcode=mysqli_fetch_array($select_farbcode, MYSQLI_BOTH ))
{
$farb_tabelle.="
<tr>
<td>$result_farbcode[was]</td>
<td>$result_farbcode[was_detail]</td>
<td bgcolor=\"$result_farbcode[farbcode]\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>$result_farbcode[farbcode]</td>
<td align=\"center\">$result_farbcode[farb_id]</td>
</tr>
";


} // ende while
?>



<table width="900px" height="" border="1" cellpadding="5px" cellspacing="5px">
<tr>
<td align="left">was wird zugewiesen:</td>
<td align="left">im Detail:</td>
<td align="left">gespeichert ist (Farbe)</td>
<td align="left">gespeichert ist (Code)</td>
<td align="left">Farb-ID</td>
</tr>
<?php echo $farb_tabelle; ?>
<tr>
<td align="left" colspan="5"><font color="#000000" size="4"><b>Hinweis:<br>
Freie Farben k&ouml;nnen &uuml;berall auf der Website (in den Texten) angwendet werden.<br>
Der jeweilige Code steht in den Variablen $freie_farbe_1, $freie_farbe_2 usw. bis 10 zur Verf&uuml;gung.<br>
An den entsprechenden Stellen ist der Schlu&szlig;tag zu setzen < /font > (ohne Wortzwischenraum)</b></font>
</td>
</tr>
</table>

<table width="900px" height="" border="1" cellpadding="5px" cellspacing="5px" bgcolor="#ffd38d">
<tr>
<td align="center">Farbcode zuweisen f&uuml;r Farb_ID:</td>
<td align="center">Neuer Farbcode:</td>
<td align="center"></td>
</tr>

<tr>
<td align="center"><input type="text" name="farb_id_f" value="<?php echo $_POST['farb_id_f']; ?>"></td>
<td align="center"><input type="text" name="farb_code_f" value="<?php echo $_POST['farb_code_f']; ?>"></td>
<td align="center"><input type="submit" name="speichern" value="Farbe &auml;ndern" style=" margin-top: 3px; width:190px; height:44px; background-color:#ec1886;border-width:0;font-size: 14px;color:#FFFFFF;border-radius: 5px 5px 5px 5px; box-shadow: 5px 5px 5px #aaa;\"></td>
</tr>
<tr>
<td align="center" colspan="3"><a href="parameter_bearbeiten.php"><font size="5">Farbtabelle aktualisieren</a></td>
</tr>
</table>
<br><br><br><br><br><br><br>

<?php 
if($_POST['speichern'] == TRUE)
{mysqli_query($link,"update farben set farbcode = '$_POST[farb_code_f]' where
farb_id = '$_POST[farb_id_f]'");}
?>


</form>