<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Korrekturmaske-eMails</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
      <script src="../ckeditor/ckeditor.js"></script>
	    <script src="../ckeditor/samples/sample.js"></script>
	    <link href="../ckeditor/samples/sample.css" rel="stylesheet">
      <link href="../intern/css/schriften.css rel="stylesheet">
  </head>
  <body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<?php 
include("../intern/css/span.php");
include("../intern/css/boxen.css"); 
include("../intern/css/schriften.css"); 
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");
 ?>  

 
<?php  echo "<form action=\"maske_emails_korrektur.php?zufallid=$zufallid\" method=\"POST\">"; 
function neuladen($db_ausdruck,$formular_ausdruck,$post)
  {
  if($post == TRUE){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 
    
$jetztzeit=time("Y-m-d");

$mail_auswahl=mysqli_query($link, "select zufall_id from emails_future where sende_termin >= '$jetztzeit' order by sende_termin " );
while ( $result_auswahl=mysqli_fetch_array($mail_auswahl, MYSQLI_BOTH ) ) {

$auswahl_email_texte=mysqli_query($link,"select mail_id, stichwort, betreff from email_texte where zufall_id = '$result_auswahl[zufall_id]' ");
while($result_auswahl_email_texte = mysqli_fetch_array($auswahl_email_texte, MYSQLI_BOTH ) ) {

if ( $result_auswahl_email_texte["mail_id"] == $_POST['korrektur_emails'] ) { $selected="selected"; }  else { $selected=""; } 
$emails_db.="<option value=\"$result_auswahl_email_texte[mail_id]\" $selected>Stichwort: $result_auswahl_email_texte[stichwort], Betreff: $result_auswahl_email_texte[betreff]</option>";
}
echo mysql_error();
}
?>

  
 <div align="left">

 <table width="1000px" height="500px" cellpadding="0" cellspacing="0" bgcolor=<?php echo $feldfarbe; ?> border="0">
 <tr><td align="left"  width="1300px" height="50px" valign="top" bgcolor="">
<!-- mittleres, grosses Feld mit Inhalt fuellen //-->
  <table width="1000px" height="500px" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF" border="0"
  style="bgcolor: #FFFFFF;        
       z-index: +5;
       border: 0px  solid #4A4A4A;
       border-radius: 20px 20px 20px 20px;
       padding: 5px;
       box-shadow: 0px 0px 0px #4A4A4A;">
       
       
 <tr>
 <td valign="top" colspan="2" height="10%"><br><h11a>
eMail-Korrekturmaske:
  </h11a>
  </td></tr>
  
  
<tr>
<td valign="top" width="15%" align="right"><t1>
eMails zur Korrektur:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<select name="korrektur_emails">
<option>eMail w&auml;hlen</option>
<?php echo $emails_db; ?>
</select>
</td>
</tr>


<tr>
<td valign="top" width="15%" align="right"><t1>
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<input type="submit" name="email_laden" tabindex="10" value="eMail laden"
style=" width: 300px; height: 50px; color: #FFFFFF; font-size: 24px; background-color: green;  border: 0px; border-radius: 5px 5px 5px 5px;"></t1>
</td>
</tr>


<?php 

if ( $_POST['email_laden'] == TRUE ) {
$select_email=mysqli_query($link,"select * from email_texte where mail_id = '$_POST[korrektur_emails]' " );
while ( $result_email= mysqli_fetch_array($select_email, MYSQLI_BOTH ) ) {
$zufall_id_db=$result_email['zufall_id'];
$kopfbild_db=$result_email['kopfbild'];
$thema_db=$result_email['thema'];
$anrede_db=$result_email['anrede'];
$text_db=$result_email['text'];
$betreff_db=$result_email['betreff'];
$stichwort_db=$result_email['stichwort'];
$absender_db=$result_email['email_absender'];

}
}
?>  


<tr>
<td valign="top" width="15%" align="right"><t1>
Kopfbild:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<input type="text" name="kopfbild" size="100" tabindex="1" value="<?php echo neuladen($kopfbild_db,$_POST['kopfbild'],$_POST['email_laden']); ?>"/></t1>
</td>
</tr>


<tr>
<td valign="top" width="15%" align="right"><t1>
Thema:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<input type="text" name="thema" size="100" tabindex="1" value="<?php echo neuladen($thema_db,$_POST['thema'],$_POST['email_laden']); ?>"/></t1>
</td>
</tr>

<tr>
<td valign="top" width="15%" align="right"><t1>
Anrede:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<textarea cols="100" rows="1" name="anrede" tabindex="1"><?php echo neuladen($anrede_db,$_POST['anrede'],$_POST['email_laden']); ?></textarea>
</td>
</tr>

<tr>
<td valign="top" width="15%" align="right"><t1>
Betreff:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<textarea cols="100" rows="1" name="betreff" tabindex="1"><?php echo neuladen($betreff_db,$_POST['betreff'],$_POST['email_laden']); ?></textarea>
</td>
</tr>

<tr>
<td valign="top" width="15%" align="right"><t1>
Stichwort:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<textarea cols="100" rows="1" name="stichwort" tabindex="1"><?php echo neuladen($stichwort_db,$_POST['stichwort'],$_POST['email_laden']); ?></textarea>
</td>
</tr>

<tr>
<td valign="top" width="15%" align="right"><t1>
Absender:
</t1>
</td>
<td valign="top"  width="85%" align="left"><t1>
<textarea cols="100" rows="1" name="absender" tabindex="1"><?php echo neuladen($absender_db,$_POST['absender'],$_POST['email_laden']); ?></textarea>
</td>
</tr>


<tr>

<td valign="top"  colspan="2" width="" align="left"><t1>

<textarea cols="120" rows="30" id="email_text" name="email_text"><?php echo neuladen($text_db,$_POST['email_text'],$_POST['email_laden']); ?></textarea>
        <script>
                // Replace the <textarea id="email_text"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'email_text' );
            </script>

</t1>
</td>
</tr>



<tr>
<td valign="top" width="15%" align="right"><t1>
</t1>
</td>

<td valign="top"  width="85%" align="left"><t1>

<?php            
if ( $_POST['speichern'] == FALSE ) { echo 
"<input type=\"submit\" name=\"speichern\" tabindex=\"10\" value=\"eMail &auml;ndern\"
style=\" width: 300px; height: 50px; color: #FFFFFF; font-size: 24px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\" />"; 
} 
?>
                  <td bgcolor="#FFFFFF" rowspan="2">              
                  </td></t1>
</td>
</tr>







<?php 


$betreff=htmlentities(mysqli_real_escape_string($link, $_POST['betreff']));
$thema=htmlentities(mysqli_real_escape_string($link, $_POST['thema']));
$stichwort=htmlentities(mysqli_real_escape_string($link, $_POST['stichwort']));
$email_text=htmlentities(mysqli_real_escape_string($link, $_POST['email_text']));

if ($_POST['speichern'] == TRUE) {
mysqli_query($link,"update email_texte set
kopfbild = '$_POST[kopfbild]',
thema = '$thema',
anrede = '$_POST[anrede]',
text = '$email_text',
betreff = '$betreff',
stichwort = '$stichwort',
email_absender = '$_POST[absender]'
where mail_id = '$_POST[korrektur_emails]'
");
}
echo mysql_error();

 ?>

   </td>
 </tr>
    
  </table>
</td>
 </tr>
 </table>
</div> 
</form>
  </body>
</html>