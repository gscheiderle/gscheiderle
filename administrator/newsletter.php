<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Newsletter-Abfrage</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body link="#000000" vlink="#000000" alink="#000000">
<form action="newsletter.php" method="POST">
<?php  
include("intern/css/span.php");
include("intern/css/boxen.css"); 
include("intern/css/schriften.css"); 
include("intern/parameter.php");
include("intern/mysql_connect_gscheiderle.php");
?>
  
<!--     <div class="lph">
  <div align="center">
  <table width="250px" height="841px"><tr><td align="center" valign="top">
  <img border="0" src="intern/pictures/system/lph.png" width="225px" height="756px">
  </td></tr></table>
  </div>
  </div> //-->

  
  <div align="center">
  
  <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->

  
<?php include("intern/kopf.php"); ?>
 
 <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //--> 
 
 </td>
 </tr>
 
<tr>
 <td colspan="3" height="20px" align="center" valign="top" bgcolor=<?php echo $menu; ?>>
 <table width="780px" height="20px" cellpadding="0" cellspacing="0" bgcolor=<?php echo $menu; ?> border="0">
 <tr><td align="center"  width="780px" height="20px" valign="top">
 <?php include("intern/css/dropdown_menue.php"); ?>
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
 <tr><td valign="top" colspan="2" height="10%">

<?php




 
?>

<h1t> <b>Newsletter Best&auml;tigung:</b> </h1t>




</td></tr>
<tr><td>
                     



                  </td>
                 
                </tr>
               
                <tr>
                  <td width="482" height="20px" valign="middle" align="center">
                 <input type="submit" value="eMail senden" name="email_senden" tabindex="11"><br>
                
                  </td>
                  

                </tr>




<?php

if($_POST['email_senden'] == TRUE) {

$select_email=mysqli_query($link,"select vorname, email, code from adressen where email like 'usnh2000@yahoo.de' or email like 'lph@variusmedien.de'");
while($result_email=mysqli_fetch_array($select_email, MYSQLI_BOTH )){
$empfaenger_db=$result_email['email'];
echo "<tr><td>".$result_email[email]."<br>";
echo$result_email[vorname]."<br>";
echo $result_email[code]."<br></td></tr>";

$empfaenger = $empfaenger_db;
$betreff = "Newsletter Master $uwesack";
$inhalt.= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"800\" height=\"300\" bgcolor=\"\">
    <tr>
      <td width=\"80%\" align=\"center\">
      </td>
    </tr>
    
     <tr>
      <td width=\"80%\" align=\"left\">
      <font face=\"arial\" size=\"4\">
      <p>Liebe(r) $result_email[vorname]</font><br><br>
      
      <h111 style=\"width:335px; height:155px; float:right; color:red\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img border=\"0\" src=\"http://www.petra-$uwesack.de/intern/pictures/system/master_petra_frontpage.png\" width=\"245px\" height=\"344px\">
</h111>
      <font face=\"arial\" size=\"2\">
      es ist meine Aufgabe Dir und den Menschen zu dienen.<br>
      Was nicht sein soll ist, dass ich als aufdringlich empfunden werde.<br>
      Deshalb m&ouml;chte ich meine Adressliste aktualisieren und bitte um Deine Mitarbeit und Nachricht,
      ob Du weiterhin Einladungen und meinen Newsletter per eMail erhalten m&ouml;chtest.<br><br>
      
      Mit einem einfachen Klick in dieser Nachricht kannst Du den weiteren Empfang von meinen Informationen und Einladungen best&auml;tigen oder Dich aus dem Verteiler l&ouml;schen.<br>
      Es &ouml;ffnet sich eine Seite auf meiner website, auf der aber keine weiteren Aktionen notwendig sind.<br><br>
      
      <font face=\"arial\" size=\"4\" color=\"green\"><b><a href=\"http://www.petra-$uwesack.de/rueckmeldung.php?code=$result_email[code]&newsletter=yes&email=$result_email[email]\">Ich m&ouml;chte weiterhin Nachrichten erhalten</a><br>
      <font face=\"arial\" size=\"4\" color=\"red\"><b><a href=\"http://www.petra-$uwesack.de/rueckmeldung.php?code=$result_email[code]&newsletter=no\">Ich m&ouml;chte keine Nachrichten mehr erhalten</a></b><br><br>
      
      <font face=\"arial\" size=\"2\" color=\"#000000\"></b>Solltest Du diese Nachrichten erhalten, obwohl Du Dich schon<br>
      aus dem Verteiler hast l&ouml;schen lassen,<br>
      so ist das keine b&ouml;ser Wille sondern eine kleine<br>
      menschliche Unzul&auml;nglichkeit.<br>
Also in jederm Fall reagieren.<br><br>

<font face=\"arial\" size=\"2\">
Mit Licht und Liebe<br>
Master $uwesack<br><br>

P.S.: Hebe diese eMail auf und Du kannst deine Entscheidung jederzeit per Klick revidieren !
      
      
      </td>
    </tr>
    
    <td width=\"80%\" align=\"left\">
    

  </table>
  </center>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header.='Content-Transfer-Encoding: 8bit' . "\r\n";
$header.='From: Petra.$uwesack@drsha.com' . "\r\n";
$header.='Reply-To: Petra.$uwesack@drsha.com' . "\r\n";

mail($empfaenger, $betreff, $inhalt, $header);



$empfaenger="";
$betreff="";
$inhalt="";
$header="";

} // ende while
} // ende if senden

?>

   </t1>
  </td>
  
  </tr>
  
    
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

<?php include("intern/fuss.php"); ?>

 <!--  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //-->
 </form>

  </body>
</html>