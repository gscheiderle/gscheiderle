<?php

include ("../intern/mysql_connect_gscheiderle.php");

   ?>
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="weaverslave.Editor.Document">
<title>geladenen Bilder</title>
    
    
    	<link rel="stylesheet" type="text/css"  media="screen and (max-width: 980px)" href="../css/style_768.css"> <!-- Handy -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 981px )" href="../css/style_tip_cart.css"> <!-- stehendes Rechteck -->
		
		<link rel="stylesheet" type="text/css"  media="screen and (min-width: 1300px)" href="../css/style_1200.css"> <!-- grosser Bildschirm -->
    
</head>
    
    
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
    
<form name="" action="bild_liste.php" method="post" enctype="multipart/form-data">
     
     
<div class="wrapper">
    
<h2>   
<table border="0" width="900px" id="table" cellspacing="0" cellpadding="0" height="456" background="../logos/home_table_unten.jpg">
  <tr>
      <td valign="top">
      <div align="center"><center>

      <table border="0" width="100%" bgcolor="" cellspacing="0" cellpadding="10px">
        <tr>
          <td colspan="6" align="center"><font face="Arial" size="5" color="#000000">Bisher geladene Bilder<br><br>
          <button type="submit" value="seite_aktualisieren" name="noname"><font style=' color:#000; font-size: 24px;'>&nbsp;<b>Seite neu laden</font></button><br><br>
          </td>
        </tr>
             
        
        <tr>
            
        
          <td width="10%" bgcolor="#C0C0C0"><font face="Arial" size="2" color="#000000">&nbsp;&nbsp;&nbsp;Bild-Nr.:</td>
          
          <td width="15%" bgcolor="#C0C0C0"><font face="Arial" size="2" color="#000000">&nbsp;</td>
                                                                                       
          <td width="35%" bgcolor="#C0C0C0"><font face="Arial" size="2" color="#000000">&nbsp;</td>
                      
          <td width="40%" align="right" bgcolor="#C0C0C0"><font face="Arial" size="2" color="#000000">&nbsp;</td>
        </tr>
  
<?php 


if ( $_COOKIE['kd_nr'] == "" ) { 
echo "<tr><td><h2>Es gibt ein Problem mit Ihren Login-Angaben !<br>
Gehen Sie auf die <a href='index.php'>Startseite</a> und versuchen Sie sich erneut einzuloggen !<br></h2></td></tr>";
exit;
}


  
$listen=mysqli_query($link,"select * from bildspeicher where eigentuemer = '$_COOKIE[eigentuemer]'
order by bild_nr desc");
while ( $list_result=@mysqli_fetch_array($listen, MYSQLI_BOTH ) ) {
$bild_name= $list_result['datei_name'];
$bild_nr= $list_result['bild_nr'];
$vorschau=$list_result['vorschauort'];
$speicher_ort=$list_result['speicherort'];



$liste.="<tr>
         <td width='10%'><font style=' color:#000; font-size: 24px;'>&nbsp;&nbsp;&nbsp; $list_result[bild_nr]
         </td>";
$bildnummer.="<option value='$list_result[bild_nr]'>$list_result[bild_nr]</option>";

    
    
// Vorschau auslesen und ausgeben
    
if (file_exists("$vorschau")){
$img_width=@imagesx("$vorschau");
$img_height=@imagesy("$vorschau");  
$liste.="<td width='15%'><a href='$list_result[speicherort]' target='blank'><img src='$vorschau' border='0'></a></td>"; }
else{$liste.="<td width='30%'><a href='$list_result[speicherort]' target='blank'>
<font color='#FFFFFF'><h3>Keine Vorschau vorhanden !</a></td>";} 

$liste.="<td width='35%'><font style=' color:#000; font-size: 24px;'><a href='http://localhost/gscheiderle/pictures/$list_result[datei_name]' target='_blank'>LINK zur Grafik</td>";    


$namen="";
$liste.="<td align='right' colspan='2'>
        <button type='submit' name='loeschen' value='$list_result[bild_nr]'><font style=' color:#000; font-size: 24px;'>&nbsp;Bild Nr.: $list_result[bild_nr] loeschen ?</font></button> </td></tr>";
         
                
if( $_POST['loeschen'] == $list_result['bild_nr'] ) {
    echo "
    <tr>
    <td colspan='5' bgcolor='#FFF'>
    <p>&nbsp;&nbsp;</p>
    </td>
  </tr>
    
  <tr>
    <td colspan='5' bgcolor='red'>
        <font style=' color:#FFF; font-size: 24px;'>Bild-Nr. $list_result[bild_nr] final loeschen ?</b>&nbsp;&nbsp;
        <button type='submit' name='definitiv_loeschen' value='$list_result[bild_nr]'><font style=' color:#000; font-size: 24px;'>&nbsp;<b>Bild $list_result[bild_nr] loeschen!</font></button>
    </td>
  </tr>
  
      <tr>
    <td colspan='5' bgcolor='#FFF'>
    <p>&nbsp;&nbsp;</p>
    </td>
  </tr>
  
  ";
}
    
//$bildnummer="";
$vorschau="";
$speicherort="";
} // ende while_listen
       
echo $liste;

if($_POST['definitiv_loeschen'] == TRUE){
$loeschen=mysqli_query($link,"select vorschauort, speicherort from bildspeicher
where bild_nr = '$_POST[definitiv_loeschen]'");
while($loesch_result=mysqli_fetch_array($loeschen, MYSQLI_BOTH ))
{
if(!(file_exists($loesch_result['speicherort'])))
{echo "font style=' color:#000; font-size: 24px;'>Die Datei ist nicht mehr vorhanden!";
mysqli_query($link,"delete from bildspeicher where bild_nr = '$_POST[definitiv_loeschen]'");}
else {echo "<tr><td colspan='5' align='center'><font style=' color:#000; font-size: 24px;'>Die Datei und der Eintrag wurden gel&ouml;scht!</td></tr>"; 
$loeschen_eins=unlink("$loesch_result[speicherort]");}

if(!(file_exists($loesch_result['vorschauort'])))
{echo "<font style=' color:#000; font-size: 24px;'>Die Vorschau ist nicht mehr vorhanden!";
mysqli_query($link,"delete from bildspeicher where bild_nr = '$_POST[definitiv_loeschen]'");}
else {echo "<tr><td colspan='5' align='center'><font style=' color:#000; font-size: 24px;'>Die Vorschau und der Eintrag wurden gel&ouml;scht!</td></tr>
<tr><td colspan='5' align='center'><button type='submit' value='O.K.'><font style=' color:#000; font-size: 24px;'><b>OK</button></td></tr>"; 
$loeschen_zwei=unlink("$loesch_result[vorschauort]");}
echo "</table>";

if(($loeschen_eins == TRUE)||($loeschen_zwei==TRUE)){
mysqli_query($link,"delete from bildspeicher where bild_nr = '$_POST[definitiv_loeschen]'");
$pos=stripos($vorschauort,"/");
} // ende if
} // ende if
} // ende while_loeschen
?>
      
<br><br>      
</tr>



            <tr>
              <td valign="top" align="center" colspan="5"><br>
              <button type="submit" name="neuladen" value="neuladen"><font style=' color:#000; font-size: 24px;'>&nbsp;<b>Seite neu laden</font></td>
              </td>
            </tr>

      </table>
      

      
      </td>
		</tr>
		</table>
</div>

</body>

</html>
