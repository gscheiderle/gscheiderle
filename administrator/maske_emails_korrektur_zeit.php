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

 
<table width="500px" border="0">




<?php 

echo "<form action=\"maske_emails_korrektur_zeit.php\" method=\"POST\">"; 
function neuladen($db_ausdruck,$formular_ausdruck,$post)
  {
  if($post == TRUE){echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  } 
    


$jetztzeit=time("Y-m-d");


$zeit_auswahl=mysqli_query($link, "select zufall_id from emails_future where sende_termin >= '$jetztzeit' order by sende_termin " );
while ( $result_zeit=mysqli_fetch_array($zeit_auswahl, MYSQLI_BOTH ) ) {

$auswahl_email_zeit=mysqli_query($link,"select zufall_id, stichwort, betreff from email_texte where zufall_id = '$result_zeit[zufall_id]' ");
while($result_auswahl_email_zeit = mysqli_fetch_array($auswahl_email_zeit, MYSQLI_BOTH ) ) {
$selected_time="";
if ( $result_auswahl_email_zeit["zufall_id"] == $_POST['korrektur_versand_zeit'] ) { $selected_time="selected"; }
$emails_zeit_db.="<option value=\"$result_auswahl_email_zeit[zufall_id]\" $selected_time>Stichwort: $result_auswahl_email_zeit[stichwort], Betreff: $result_auswahl_email_zeit[betreff]</option>";
$selected_time="";
}
}
 ?>



<tr>
<td valign="top" width="15%" align="left"><h11a><br><br>
Versand-Termin &auml;ndern:<br><br>
</h11a>
</td>
</tr>
<tr>
<td valign="top"  width="85%" align="left"><t1>
<select name="korrektur_versand_zeit">
<option>eMail w&auml;hlen</option>
<?php echo $emails_zeit_db; ?>
</select><br><br>
</td>
</tr>

<tr>

<td valign="top"  width="85%" align="left"><t1>
<input type="submit" name="termin_laden" tabindex="10" value="Versand-Termin laden"
style=" width: 300px; height: 50px; color: #FFFFFF; font-size: 24px; background-color: green;  border: 0px; border-radius: 5px 5px 5px 5px;"></t1>
</td>
</tr>


<?php 


if ( $_POST['termin_laden'] == TRUE ) {
$select_time=mysqli_query($link,"select zufall_id from email_texte where zufall_id = '$_POST[korrektur_versand_zeit]' " );
while ( $result_time= mysqli_fetch_array($select_time, MYSQLI_BOTH ) ) {
$zufallid=$result_time['zufall_id'];
$select_sendetermin_klar=mysqli_query($link," select sende_termin, sende_termin_klar from emails_future where zufall_id = '$result_time[zufall_id]' " );
while ( $result_sendetermin_klar = mysqli_fetch_array($select_sendetermin_klar, MYSQLI_BOTH ) ) {
$sende_termin_klar=$result_sendetermin_klar['sende_termin_klar'];
$sende_termin_db=$result_sendetermin_klar['sende_termin'];
}
}
}
             
                                   
$monat_1 = date("m"); 
$tag_1 = date("d");
$jahr = date("Y"); 

for($y=2014; $y <= 2020; $y++) {
$y_selected="y_selected_".$y;
if(date(Y) == $y) {$$y_selected="selected";}
}

for($m=1; $m <= 12; $m++) {
$m_selected="m_selected_".$m;
if(date(m) == $m) {$$m_selected="selected";}
}

for($d=1; $d <= 31; $d++) {
$d_selected="d_selected_".$d;
if(date(d) == $d) {$$d_selected="selected";}
}


// plus eine Stunde, damit die aktuelle Zeit nicht aus Versehen gesetzt wird und in der Folge der Termin nicht mehr erscheint !!!
for($h=6; $h <= 24; $h++) {
$h_selected="h_selected_".$h;
if(date(H)+1 == $h) {$$h_selected="selected";}
}

 ?>         
 <tr><td colspan="1">
 <table border="0"> 
 
 <tr>
            <td  bgcolor="#FFFFFF" colspan="5"><h11a><br><br>Sende-Zeit f&uuml;r obige eMail manipulieren:<br>
            <t1> <br>Bisher geplanter Versand-Termin:<br><b>
            <?php echo $sende_termin_klar; ?></b><br><br>
            </td>
 
 </tr>
 <tr>
            <td  bgcolor="#b1b1b1">Jahr:</td>
            <td  bgcolor="#b1b1b1">Monat:</td>
            <td  bgcolor="#b1b1b1">Tag:</td>
            <td  bgcolor="#b1b1b1">Stunde:</td>
            <td  bgcolor="#b1b1b1">Minute:</td>
            
</tr>






<tr>

            <td  bgcolor="#b1b1b1">
                                <select name="jahr">
                                  <option value="2014"<?php echo $y_selected_2014; ?>>2014</option>
                                  <option value="2015"<?php echo $y_selected_2015; ?>>2015</option> 
                                  <option value="2016"<?php echo $y_selected_2016; ?>>2016</option>
                                </select>
                  
                  </td><td  bgcolor="#b1b1b1">
                 
                              <select name="monat"> 
                                <option value="01" <?php echo $m_selected_1; ?>>Januar</option> 
                                <option value="02" <?php echo $m_selected_2; ?>>Februar</option> 
                                <option value="03" <?php echo $m_selected_3; ?>>M&auml;rz</option>
                                <option value="04" <?php echo $m_selected_4; ?>>April</option> 
                                <option value="05" <?php echo $m_selected_5; ?>>Mai</option> 
                                <option value="06" <?php echo $m_selected_6; ?>>Juni</option>
                                <option value="07" <?php echo $m_selected_7; ?>>Juli</option> 
                                <option value="08" <?php echo $m_selected_8; ?>>August</option> 
                                <option value="09" <?php echo $m_selected_9; ?>>September</option>
                                <option value="10" <?php echo $m_selected_10; ?>>Oktober</option> 
                                <option value="11" <?php echo $m_selected_11; ?>>November</option> 
                                <option value="12" <?php echo $m_selected_12; ?>>Dezember</option>
                              </select>
                                
                                </td><td  bgcolor="#b1b1b1">
                                
                              <select name="tag">
                                <option value="01"<?php echo $d_selected_1; ?>>01</option> 
                                <option value="02"<?php echo $d_selected_2; ?>>02</option> 
                                <option value="03"<?php echo $d_selected_3; ?>>03</option>
                                <option value="04"<?php echo $d_selected_4; ?>>04</option> 
                                <option value="05"<?php echo $d_selected_5; ?>>05</option> 
                                <option value="06"<?php echo $d_selected_6; ?>>06</option>
                                <option value="07"<?php echo $d_selected_7; ?>>07</option> 
                                <option value="08"<?php echo $d_selected_8; ?>>08</option> 
                                <option value="09"<?php echo $d_selected_9; ?>>09</option>
                                <option value="10"<?php echo $d_selected_10; ?>>10</option> 
                                <option value="11"<?php echo $d_selected_11; ?>>11</option> 
                                <option value="12"<?php echo $d_selected_12; ?>>12</option>
                                <option value="13"<?php echo $d_selected_13; ?>>13</option> 
                                <option value="14"<?php echo $d_selected_14; ?>>14</option> 
                                <option value="15"<?php echo $d_selected_15; ?>>15</option>
                                <option value="16"<?php echo $d_selected_16; ?>>16</option> 
                                <option value="17"<?php echo $d_selected_17; ?>>17</option> 
                                <option value="18"<?php echo $d_selected_18; ?>>18</option>
                                <option value="19"<?php echo $d_selected_19; ?>>19</option> 
                                <option value="20"<?php echo $d_selected_20; ?>>20</option> 
                                <option value="21"<?php echo $d_selected_21; ?>>21</option>
                                <option value="22"<?php echo $d_selected_22; ?>>22</option> 
                                <option value="23"<?php echo $d_selected_23; ?>>23</option> 
                                <option value="24"<?php echo $d_selected_24; ?>>24</option>
                                <option value="25"<?php echo $d_selected_25; ?>>25</option> 
                                <option value="26"<?php echo $d_selected_26; ?>>26</option> 
                                <option value="27"<?php echo $d_selected_27; ?>>27</option>
                                <option value="28"<?php echo $d_selected_28; ?>>28</option> 
                                <option value="29"<?php echo $d_selected_29; ?>>29</option> 
                                <option value="30"<?php echo $d_selected_30; ?>>30</option>
                                <option value="31"<?php echo $d_selected_31; ?>>31</option> 
                              </select>
                              
                              </td><td  bgcolor="#b1b1b1">
                                
                              <select name="stunde">
                                <option value="06"<?php echo $h_selected_6; ?>>06</option>
                                <option value="07"<?php echo $h_selected_7; ?>>07</option> 
                                <option value="08"<?php echo $h_selected_8; ?>>08</option> 
                                <option value="09"<?php echo $h_selected_9; ?>>09</option>
                                <option value="10"<?php echo $h_selected_10; ?>>10</option> 
                                <option value="11"<?php echo $h_selected_11; ?>>11</option> 
                                <option value="12"<?php echo $h_selected_12; ?>>12</option>
                                <option value="13"<?php echo $h_selected_13; ?>>13</option> 
                                <option value="14"<?php echo $h_selected_14; ?>>14</option> 
                                <option value="15"<?php echo $h_selected_15; ?>>15</option>
                                <option value="16"<?php echo $h_selected_16; ?>>16</option> 
                                <option value="17"<?php echo $h_selected_17; ?>>17</option> 
                                <option value="18"<?php echo $h_selected_18; ?>>18</option>
                                <option value="19"<?php echo $h_selected_19; ?>>19</option> 
                                <option value="20"<?php echo $h_selected_20; ?>>20</option> 
                                <option value="21"<?php echo $h_selected_21; ?>>21</option>
                                <option value="22"<?php echo $h_selected_22; ?>>22</option> 
                                <option value="23"<?php echo $h_selected_23; ?>>23</option> 
                                <option value="24"<?php echo $h_selected_24; ?>>24</option>
                                </select>
                                
                   
                              </td><td  bgcolor="#b1b1b1">
                                
                              <select name="minute">
                                <option value="00" sellected>00</option>
                                <option value="05">05</option>
                                <option value="10">10</option> 
                                <option value="15">15</option> 
                                <option value="20">20</option>
                                <option value="25">25</option> 
                                <option value="30">30</option> 
                                <option value="35">35</option>
                                <option value="40">40</option> 
                                <option value="45">45</option> 
                                <option value="50">50</option>
                                <option value="55">55</option> 
                                </select>
                                
                              </td>
                                
                                
                <?php             
                                $versandtermin.=$_POST[jahr];
                                $versandtermin.="-";
                                $versandtermin.=$_POST[monat];
                                $versandtermin.="-";
                                $versandtermin.=$_POST[tag];
                                $versandtermin.=", ";
                                $versandtermin.=$_POST[stunde]; 
                                $versandtermin.=":";
                                $versandtermin.=$_POST[minute];
                                
                               
                               $versand_termin=mktime($_POST['stunde'],$_POST['minute'],0,$_POST['monat'],$_POST['tag'],$_POST['jahr'])."<br>";
                               $versand_termin_klar=date($versandtermin);
                               
                            
                 ?>
                  

                  
                  </tr>
                  
                  
                  <?php             if ( $_POST['versand_aendern'] == FALSE ) {  echo
                  " <tr>
                      <td  bgcolor=\"#FFFFFF\" colspan=\"5\"><h11a><br><input type=\"submit\" value=\"Versand-Termin &auml;ndern\" name=\"versand_aendern\" tabindex=\"11\"
                      style=\" width: 300px; height: 50px; color: #FFFFFF; font-size: 24px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                      </td>
                   </tr>"; 
                  }
                  ?>
                  
                  
                  
                  </table>
                  </div>
                  </td>
                </tr>





<?php 


if ($_POST['versand_aendern'] == TRUE) {

mysqli_query($link,"update emails_future set
sende_termin = '$versand_termin',
sende_termin_klar = '$versand_termin_klar'
where zufall_id = '$_POST[korrektur_versand_zeit]'");

}
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