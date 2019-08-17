
<?php
include("../intern/mysql_connect_gscheiderle.php");
include("../intern/funktionen.php");
  
   ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Menu bearbeiten</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body>
<form method="POST" action="menue_bearbeiten.php">  
  <table width="1100px" border="0" cellspacing="2">
  <tr>
<td valign="top" width="60%" rowspan="0">
<?php 
$i=1;
$font ="<font size=\"2\" face=\"arial\" color=\"#CD1076\"><b>";
$bgcolor="bgcolor=\"#E5E5E5\" ";
echo "
<table  width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">

<tr><td colspan=\"7\">
<font size=\"4\" face=\"arial\" color=\"#000000\"><b>

Das Haupt-Menu:<br><br></td></tr>
<tr>

<tr>
<td $bgcolor>$font Link-Nr.</td>
<td $bgcolor>$font Direkt-Link</td>
<td $bgcolor>$font Klapp-Link</td>
<td $bgcolor>$font Sub-Link</td>
<td $bgcolor>$font Letzter Sub-Link</td>
<td $bgcolor>$font Seiten_id</td>
<td $bgcolor>$font Konventioneller Link</td>
<td $bgcolor>$font Thema</td></tr>";
$menu=mysqli_query($link,"select * from hauptmenu order by link_nr");
while($result_menu=mysqli_fetch_array($menu, MYSQLI_BOTH )){
if($i % 2 != 0) {
$bgcolor="bgcolor=\"#CD1076\" ";
$font="<font size=\"2\" face=\"arial\" color=\"#E5E5E5\"><b>";}
else{$bgcolor="bgcolor=\"#E5E5E5\" ";
$font="<font size=\"2\" face=\"arial\" color=\"#CD1076\"><b>";}

echo "<tr>
<td $bgcolor>$font $result_menu[link_nr]</td>
<td $bgcolor>$font $result_menu[direkt_link]</td>
<td $bgcolor>$font $result_menu[klapp_link]</td>
<td $bgcolor>$font $result_menu[sub_link]</td>
<td $bgcolor>$font $result_menu[last_sublink]</td>
<td $bgcolor>$font $result_menu[seiten_id]</td>
<td $bgcolor>$font $result_menu[konventioneller_link]</td>
<td $bgcolor>$font $result_menu[thema]</td></tr>

";
$i++; 
}

$font ="<font size=\"2\" face=\"arial\" color=\"#CD1076\"><b>";
$bgcolor="bgcolor=\"#E5E5E5\" ";
echo "
<table cellspacing=\"5\" cellpadding=\"5\">
<tr><td colspan=\"2\">
<font size=\"3\" face=\"arial\" color=\"#000000\"><b>
<br><br><br>
gespeicherte Seiten:<br><br>
<tr>
<td $bgcolor>$font Seiten-Id</td>
<td $bgcolor>$font Seiten-Name</td>";

$ii=1;
$vorhandene_seiten=mysqli_query($link,"select * from seitenliste");
while ($result_liste=mysqli_fetch_array($vorhandene_seiten, MYSQLI_BOTH )){

if($ii % 2 != 0) {
$bgcolor="bgcolor=\"#CD1076\" ";
$font="<font size=\"2\" face=\"arial\" color=\"#E5E5E5\"><b>";}
else{$bgcolor="bgcolor=\"#E5E5E5\" ";
$font="<font size=\"2\" face=\"arial\" color=\"#CD1076\"><b>";}

echo "<tr>
<td $bgcolor>$font $result_liste[seiten_id]</td>
<td $bgcolor>$font $result_liste[seitenname]</td></tr>

";
$ii++; 
}
 ?>


</table>
</td>  

<?php echo "<tr><td>
<font size=\"4\" face=\"arial\" color=\"#000000\"><b>

Haupt-Menu bearbeiten
<br>
</td></tr>"; ?>
<td valign="top" align="middle" bgcolor="#D1EEEE"><font face="arial" size="3"><b>
Link-Nr.:<br>
<input type="text" name="menuenr" size="5"><br>
zur Bearbeitung zeigen<br><br>
<input type="submit" name="menu_zeigen" value="Menu zeigen"><br><br>

<?php 
if ($_POST['menu_zeigen'] == TRUE){
$menu=mysqli_query($link,"select * from hauptmenu where link_nr = '$_POST[menuenr]' order by link_nr limit 1");
while($result_menu=mysqli_fetch_array($menu, MYSQLI_BOTH )){
$menu_id=$result_menu['menu_id'];
$link_nr=$result_menu['link_nr'];
$direkt_link=$result_menu['direkt_link'];
$klapp_link=$result_menu['klapp_link'];
$sub_link=$result_menu['sub_link'];
$last_sublink=$result_menu['last_sublink'];
$seiten_id=$result_menu['seiten_id'];
$konventioneller_link=$result_menu['konventioneller_link'];
$thema=$result_menu['thema'];
}

$i = 0;
$vorh_nummer = array();
$menu_1=mysqli_query($link,"select link_nr from hauptmenu");
while($result=mysqli_fetch_array($menu_1, MYSQLI_BOTH )){
$vorh_nummer[$i]=$result;
$i++;
}
} // ende if Menu zeigen
 ?>

<input type="hidden" name="menu_id" value="<?php  echo neuladen($_POST['menu_id'], $menu_id); ?>">

<font color="#000000" face="arial" size="3"><b>
 
Link-Nr.:<br>
 <input type="text" name="link_nr" size="10" value="<?php echo $link_nr; ?>"><br><br>
 
Direkt-Link (nur 1 Link)<br>
 <input type="text" name="direkt_link" size="10" value="<?php echo $direkt_link; ?>"><br><br>
 
 Klapp-Link (1 Link mit mind. einem Sub-Link)<br>
 <input type="text" name="klapp_link" size="10" value="<?php echo $klapp_link; ?>"><br><br>
 
 Sub-Link<br>
 <input type="text" name="sub_link" size="10" value="<?php echo $sub_link; ?>"><br><br>
 
 ... und ist der letzte Sublink der Gruppe<br>
 <input type="text" name="last_sublink" size="10" value="<?php echo $last_sublink; ?>"><br><br>
 
 Seiten-ID<br>
 <input type="text" name="seiten_id" size="10" value="<?php echo $seiten_id; ?>"><br><br>
 
  Konventioneller Link<br>
 <input type="text" name="konventioneller_link" size="30" value="<?php echo $konventioneller_link; ?>"><br><br>
 
 Thema<br>
 <input type="text" name="thema" size="50" value="<?php echo $thema; ?>"><br><br>
 

 
 
<font color="red" face="arial" size="4"><b> Link wie oben hinzuf&uuml;gen:<br>
<input type="submit" name="link_speichern" value="Link hinzuf&uuml;gen"><br><br>


Link-Nr. <?php echo $link_nr; ?> wie oben &auml;ndern:<br>
<input type="submit" name="link_updaten" value="Link &auml;ndern"><br><br>

Link-Nr. <?php echo $link_nr; ?> l&ouml;schen:<br>
<input type="submit" name="link_loeschen" value="Link l&ouml;schen"><br><br>
 
<?php 
if($_POST['link_speichern'] == TRUE) { // if speichern

mysqli_query($link,"insert into hauptmenu
(
link_nr,
direkt_link,
klapp_link,
sub_link,
last_sublink,
seiten_id,
konventioneller_link,
thema
)
values
(
'$_POST[link_nr]',
'$_POST[direkt_link]',
'$_POST[klapp_link]',
'$_POST[sub_link]',
'$_POST[last_sublink]',
'$_POST[seiten_id]',
'$_POST[konventioneller_link]',
'$_POST[thema]'
)
");
} // ende if speichern



if($_POST['link_updaten'] == TRUE) { // if speichern

mysqli_query($link,"update hauptmenu set

link_nr='$_POST[link_nr]',
direkt_link='$_POST[direkt_link]',
klapp_link='$_POST[klapp_link]',
sub_link='$_POST[sub_link]',
last_sublink='$_POST[last_sublink]',
seiten_id='$_POST[seiten_id]',
konventioneller_link='$_POST[konventioneller_link]',
thema='$_POST[thema]'
where menu_id = '$_POST[menu_id]'
");
} // ende if speichern

if($_POST['link_loeschen'] == TRUE) { // if speichern

mysqli_query($link,"delete from hauptmenu where menu_id = '$_POST[menu_id]'
");
} // ende if loeschen
 ?> 
 
 
 
 </font></b>
 </td></tr>
 </table>
 
 </form>
  </body>
</html>