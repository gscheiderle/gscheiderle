<?php
session_start(); 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Auswahl Rechnungen</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action='auswahl_rechnung.php' method='POST'>"; 

$zeit=time(H,i,s);
include("../intern/mysql_connect_gscheiderle.php");


?>  
  

<!-- /////////////////////////////////////////////////////////////////////////////////// //-->


<?php echo "
<br><br><br><br><br><br>
<div align='center'>
<table border='0' width='1000px' bgcolor='' cellspacing='10px'>

    
    
    <tr>
      <td bgcolor='#33ffff' width='' height='19' align='center' valign='middle'>
        <br>
        <font face='Courier' size='6' color='#000000'><b><a href='rechnungsformular.php?kd_nr=$_GET[kd_nr]&re_nr=$_GET[re_nr]'>Rechnung drucken Papier </a></b></font><br><br>
      </td>
    </tr>
    
    <tr>
      <td bgcolor='#33ffff' width='' height='19' align='center' valign='middle'>
        <br>
        <font face='Courier' size='6' color='#000000'><b><a href='../tcpdf/examples/pdf_rechnung_gscheiderle.php?kd_nr=$_GET[kd_nr]&re_nr=$_GET[re_nr]'>Rechnung drucken PDF </a></b></font><br><br>
      </td>
    </tr>
    
 

</table>
";
 ?>  
  </div>


