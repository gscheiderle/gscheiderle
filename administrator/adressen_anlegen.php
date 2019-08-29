<?php session_start();  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Adressen anlegen</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action=\"adressen_anlegen.php\" method=\"POST\">"; 

$zeit=time(H,i,s);


/* include("../intern/css/span.php");
include("../intern/css/boxen.css");  */
/* include("../intern/css/schriften.css");  */
include("../intern/parameter.php");
include("../intern/mysql_connect_gscheiderle.php");


function datum_format($datum_orig)
{
$datum=substr($datum_orig,8,2).".";
$datum.=substr($datum_orig,5,2).".";
$datum.=substr($datum_orig,0,4);
return $datum;
}


$datum=date("Y.m.d");
$datum_f=date("d.m.y");


$angabe=TRUE; // f&uuml;r die Fehlerauswertung
$mindestinhalt=TRUE; // f&uuml;r die Fehlerauswertung
$tag=date("d")-6;
$jetztzeit=date("Y-m-$tag");


$termin_auswahl=mysqli_query($link, "select termin_id, ort, termin_von, thema from termine where termin_bis >= '$jetztzeit' order by termin_von " );
while ( $result_auswahl=mysqli_fetch_array($termin_auswahl, MYSQLI_BOTH ) ) {

$datum_von=datum_format($result_auswahl[termin_von]);

if ( $result_auswahl["termin_id"] == $_POST['event_name'] ) { $selected="selected"; }  else { $selected=""; } 
$termine_db.="<option value=\"$result_auswahl[termin_id]\" $selected>$datum_von&nbsp;-&nbsp;$result_auswahl[ort]&nbsp;-&nbsp;".substr("$result_auswahl[thema]",0,10)." ...</option>";
$datum_von="";
$selected="";
}


?>  
  
 

<div align="center">

<table height="" width="1000px" border="0" bgcolor="" border="1">

<tr>
<td width="1000px" align="center" valign="top">

<div class="box1">


<!-- /////////////////////////////////////////////////////////////////////////////////// //-->

<?php 

function datumladen($text_feld,$datum)
         {
         if ( $text_feld == "" ) 
         {
         echo $datum;
         }
         else
         {
         echo $text_feld;
         }
         return $textfeld;
         }
         
function aus_db_laden($sucheemail, $suchename, $postspeichern, $trotzdemspeichern, $ueberschreiben, $db_eintrag, $textfeld)
         {
         if 
         (
         ( ( $sucheemail == TRUE ) && ( $db_eintrag != "" ) ) ||
         ( ( $suchename == TRUE ) && ( $db_eintrag != "" ) )
         )
         {
        
         echo $db_eintrag;
         }
       
         
         if ( ( $postspeichern == TRUE ) || ( $trotzdemspeichern == TRUE ) || ( $ueberschreiben == TRUE ) ) { echo $textfeld; } 
         
         
         return $db_eintrag;
         return $textfeld;  

         }         

         
function neuladen_extra($suche_nach_name, $suche_nach_email, $db_ausdruck, $formular_ausdruck)
  {
  if ( ( $suche_nach_name == TRUE ) || ( $suche_nach_email == TRUE ) ) {echo $db_ausdruck;}
  else {echo $formular_ausdruck;}
  }
  
function neuladen($formular_ausdruck,$wechsel)
{
 if(($formular_ausdruck != "") && ($wechsel == "")){echo $formular_ausdruck;}
 // if(($formular_ausdruck == "") && ($korr_veri != "")) {echo $korr_veri;}
 if($wechsel != ""){echo $wechsel;}
}   

?>


<div align="center"><center>
<table border="0" width="1000px" bgcolor="" cellspacing="10px">

<?php include("nav_leiste.html"); ?>

 
     
  </table>
  
  <div align="center">
  <table border="0" width="1200px" height="" cellspacing="4px" cellpadding="5px" bgcolor="">
  
  
  
<?php 

if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}


?>
  
      <tr>
      <td bgcolor="" width="250px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      Suche nach eMail:&nbsp;
      </td>
      <td bgcolor="" width="650px" height="19" align="left" valign="middle"><b>
      <input type="text" name="email_suche" size="30" tabindex="1" value="<?php echo $_POST['email_suche']; ?>"
      <?php $email_f=strtolower(str_replace(" ","",trim($_POST['email_suche']))); 
                     $email_f=strip_tags($email_f); ?>
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">&nbsp;&nbsp;
      <input type="submit" value="Suche eMail" name="suche_nach_email" tabindex="2"
                   style=" width: 100px; height: 25px; font-color: #000000; font-size: 16px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
                   
         
      
      </td>
    </tr>
    
          <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      Suche Nachname oder Kd.-Nr.:&nbsp;<br>
      (mind. 4 Buchstaben)&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="top"><b>
 
      <input type="text" name="nachname_suche" size="30" tabindex="3" value="<?php echo neuladen($_POST['nachname_suche'],$_POST['kundennummer']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">&nbsp;&nbsp;
      <input type="submit" value="Suche Name" name="suche_nach_nachname" tabindex="4"
                   style=" alt: width: 100px; height: 25px; font-color: #000000; font-size: 16px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
                       
      </td>
</tr>
    
<?php 
$table="adressen";
if ( $_POST['suche_in_neuanlage_email'] == TRUE ) { $table="zwischentabelle"; }



if ( ( $_POST['suche_nach_email'] == TRUE )  && (preg_match($email_match,$email_f)) ) {

$suche_nach_email=mysqli_query($link,"select kd_nr, kontakt_art, markierung_1, markierung_2, name, vorname, geschlecht, strasse, plz, ort, land, telefon, mobil_telefon, email, ausbildung from $table where email like '%$email_f%'");
while( $result_nach_email = mysqli_fetch_array($suche_nach_email, MYSQLI_BOTH ) ) {
$kdnr_db_em=$result_nach_email['kd_nr'];
$kontakt_art_db_em=$result_nach_email['kontakt_art'];
$markierung_1_db_em=$result_nach_email['markierung_1'];
$markierung_2_db_em=$result_nach_email['markierung_2'];
$name_db_em=$result_nach_email['name'];
$vorname_db_em=$result_nach_email['vorname'];
$geschlecht_db_em=$result_nach_email['geschlecht'];
$strasse_db_em=$result_nach_email['strasse'];
$plz_db_em=$result_nach_email['plz'];
$ort_db_em=$result_nach_email['ort'];
$land_db_em=$result_nach_email['land'];
$telefon_db_em=$result_nach_email['telefon'];
$mobil_telefon_db_em=$result_nach_email['mobil_telefon'];
$email_db_em=$result_nach_email['email'];
$ausbildung_db_em=$result_nach_email['ausbildung'];
}

$select_geburtstag=mysqli_query($link,"select geburtstag, geburtsmonat from geburtstage where email = '$email_db_em' " );
while($result_geburtstag = mysqli_fetch_array($select_geburtstag, MYSQLI_BOTH ) ) {
$geburtstag_db=$result_geburtstag['geburtstag'];
$geburtsmonat_db=$result_geburtstag['geburtsmonat'];
}

?>
<input type="hidden" name="geburts_tag" value="<?php echo $geburtstag_db; ?>" />
<input type="hidden" name="geburts_monat" value="<?php echo $geburtsmonat_db; ?>" />

<?php

if ( ( $_POST['suche_nach_email'] == TRUE ) && ( $kdnr_db_em > 1000 ) ) {
echo "
<tr><td colspan='2' align='center'>
<font color='#00cc00' ><b>Vorhandene Daten wurden in das Formular eingetragen !<br>
Wenn m&ouml;glich und notwendig komplettieren !<br><br>
</td></tr>";
}
}

if ( 
     ( ( $_POST['suche_nach_email'] == TRUE ) && ( !preg_match($email_match,$email_f) ) )
     || 
     ( ( $_POST['suche_nach_email'] == TRUE ) && ( preg_match($email_match,$email_f) ) && ( $kdnr_db_em == "" ) )
   ) {
echo "
<tr><td colspan='2'  align='center'>
<font color=\"red\"><br><b>Kein Datensatz mit dieser eMail-Adresse vorhanden<br>
oder die eMail-Adresse ist ung&uuml;ltig (formal) !!!<br><br>
</td></tr>";
}


$nachname_suche=trim($_POST['nachname_suche']);

if ( ( $_POST['suche_nach_nachname'] == TRUE ) || ( $_POST['kundennummer'] == TRUE ) ) {

if (  ( ( $_POST['suche_nach_nachname'] == TRUE ) && ( strlen($nachname_suche) >= 4 ) ) || ( $_POST['kundennummer'] == TRUE ) ) {

$counter=mysqli_query($link,"select count(name) as coun_ter from adressen where name like '$nachname_suche%' ");
while( $result_counter = mysqli_fetch_array($counter, MYSQLI_BOTH ) ) {
$zaehler=$result_counter['coun_ter'];
}

if ( $zaehler > 1 ) {
echo "
<tr><td colspan=\"2\" align=\"center\">
<table width=\"1000px\" border=\"0\">
<tr><td>Kd.-Nr.</td><td>Name</td><td>Vorname</td><td>m / w</td><td>Strasse</td><td>PLZ</td><td>Ort</td>
<td>eMail</td>
</tr>
<tr><td colspan=\"8\"><hr></td></tr>
";
}


$table_1="adressen";
if ( $_POST['suche_in_neuanlage_name'] == TRUE ) { $table_1="zwischentabelle"; }


$zaehler_2=1;
$suche_nach_email=mysqli_query($link,"select kd_nr, kontakt_art, markierung_1, markierung_2, name, vorname, geschlecht, strasse, plz, ort, land, telefon, mobil_telefon, email, ausbildung from $table_1 where name like '$nachname_suche%' 
or kd_nr = '$_POST[nachname_suche]' ");
while( $result_nach_email = mysqli_fetch_array($suche_nach_email, MYSQLI_BOTH ) ) {
$kdnr_db_em=$result_nach_email['kd_nr'];
$kontakt_art_db_em=$result_nach_email['kontakt_art'];
$markierung_1_db_em=$result_nach_email['markierung_1'];
$markierung_2_db_em=$result_nach_email['markierung_2'];
$name_db_em=$result_nach_email['name'];
$vorname_db_em=$result_nach_email['vorname'];
$geschlecht_db_em=$result_nach_email['geschlecht'];
$strasse_db_em=$result_nach_email['strasse'];
$plz_db_em=$result_nach_email['plz'];
$ort_db_em=$result_nach_email['ort'];
$land_db_em=$result_nach_email['land'];
$telefon_db_em=$result_nach_email['telefon'];
$mobil_telefon_db_em=$result_nach_email['mobil_telefon'];
$email_db_em=$result_nach_email['email'];
$ausbildung_db_em=$result_nach_email['ausbildung'];


///////////////////////////////////

$select_geburtstag=mysqli_query($link,"select geburtstag, geburtsmonat from geburtstage where email = '$email_db_em' " );
while($result_geburtstag = mysqli_fetch_array($select_geburtstag, MYSQLI_BOTH ) ) {
$geburtstag_db=$result_geburtstag['geburtstag'];
$geburtsmonat_db=$result_geburtstag['geburtsmonat'];
}

?>
<input type="hidden" name="geburtstag" value="<?php echo $geburtstag_db; ?>" />
<input type="hidden" name="geburtsmonat" value="<?php echo $geburtsmonat_db; ?>" />

<?php


/////////////////////////////////////


$liste_namen.="
<tr><td><input type='submit' value='$result_nach_email[kd_nr]' name='kundennummer'></td>
<td>$result_nach_email[name]</td>
<td>$result_nach_email[vorname]</td>
<td>$result_nach_email[geschlecht]</td>
<td>$result_nach_email[strasse]</td>
<td>$result_nach_email[plz]</td>
<td>$result_nach_email[ort]</td>
<td>$result_nach_email[email]</td>
</tr>";


}

if ( $zaehler > 1 ) {
$liste_namen.="
</table>
</td></tr>";
echo $liste_namen;
}
}
else {
echo "
<tr><td colspan='2' align='center'>
<font color='red' ><b>Sie m&uuml;ssen mindestens<br>
4 Anfangs-Buchstaben eingeben (oder die komplette Kd.-Nr.) !!!
</td></tr>";
}



if ( ( $_POST['suche_nach_nachname'] == TRUE ) && ( $kdnr_db_em > 1000 ) ) {
echo "
<tr><td colspan='2' align='center'>
<font color='#00cc00' ><b>Vorhandene Daten wurden im Formular eingetragen !<br>
Nach M&ouml;glichkeit komplettieren !<br><br>
</td></tr>";
}
}
?> 
<input type="hidden" name="kdnrdbem" value="<?php neuladen_extra($_POST['suche_nach_nachname'], $_POST['suche_nach_email'],$kdnr_db_em,$_POST['kdnrdbem']); ?>">

    
 <tr>
      <td bgcolor="red" colspan="2" height="5px" align="center" valign="middle"><b>
      
      </td>

    </tr>
    
<tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Kontakt-Art</font>&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="kontakt_art_f" size="40" tabindex="5 " 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $kontakt_art_db_em, $_POST['kontakt_art_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['kontakt_art_f']=trim(strip_tags($_POST['kontakt_art_f'])); 
    ?>
      </td>
    </tr>
    
    
<tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Markierung_1</font>&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="markierung_1_f" size="40" tabindex="6" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $markierung_1_db_em, $_POST['markierung_1_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['markierung_1_f']=trim(strip_tags($_POST['markierung_1_f'])); 
    ?>
      </td>
    </tr>    
    
<tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Markierung_2</font>&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="markierung_2_f" size="40" tabindex="7" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $markierung_2_db_em, $_POST['markierung_2_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['markierung_2_f']=trim(strip_tags($_POST['markierung_2_f'])); 
    ?>
      </td>
    </tr>    
    
    
    
   
    
   
  
     <tr>
           <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">&nbsp;</font>&nbsp;
      </td>
      <td bgcolor=""  height="25px" align="left" valign="middle"><b>
      <font face="Courier" color="#000000">
 <?php
    $selected = "selected";
    if ( $_POST['geschlecht'] == "w" ) {$selected_w = "selected"; $selected_m = ""; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $_POST['geschlecht'] == "m" ) {$selected_w = ""; $selected_m = "selected"; $selected_m_db = ""; $selected_w_db = ""; $selected = "";}
    if ( $geschlecht_db_em == "w" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = ""; $selected_w_db = "selected"; $selected = "";}
    if ( $geschlecht_db_em == "m" ) {$selected_w = ""; $selected_m = ""; $selected_m_db = "selected"; $selected_w_db = ""; $selected = "";}
    echo "
    <select name=\"geschlecht\" tabindex=\"8\">
    <option $selected value=\"\">Anrede</option>
    <option $selected_w $selected_w_db value=\"w\">Frau</option>
    <option $selected_m $selected_m_db value=\"m\">Herr</option>
    </select>";

    if (($_POST['geschlecht'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Geschlechts-Angabe\" fehlt !"; $angabe=FALSE;  $mindestinhalt=FALSE;}
 ?>     
</td>
    </tr>   
    
    
         <tr>
           <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Geburtstag</font>&nbsp;
      </td>
      <td bgcolor=""  height="25px" align="left" valign="middle"><b>
      <font face="Courier" color="#000000">
                                    
                   <?php 
                   
                   
               
                   include("geburts_monate.php"); ?> 
    </td>
    </tr>  
    
    
   <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Firma</font>&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="firma_f" size="40" tabindex="11" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $name_db_em, $_POST['firma_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['firma_f']=trim(strip_tags($_POST['firma_f'])); 
      if (($_POST['firma_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Firma\" fehlt !"; $angabe=FALSE;}
      ?>
      </td>
    </tr>           
  
  
    <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">Name</font>&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="name_f" size="40" tabindex="11" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $name_db_em, $_POST['name_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['name_f']=trim(strip_tags($_POST['name_f'])); 
      if (($_POST['name_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Der \"Name\" fehlt !"; $angabe=FALSE; $mindestinhalt=FALSE;}
      ?>
      </td>
    </tr>
      
    <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      Vorname&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="vorname_f" size="40" tabindex="12" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'],  $_POST['ueberschreiben'], $vorname_db_em, $_POST['vorname_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['vorname_f']=trim(strip_tags($_POST['vorname_f'])); 
      if (($_POST['vorname_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Der \"Vorname\" fehlt !"; $angabe=FALSE; $mindestinhalt=FALSE;}
      ?>
      
      </td>
    </tr>
    
    
    
   <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000" style=" background-color: yellow;">&nbsp;
      Ausbildung, wenn neu: DHH-<?php echo date("Y"); ?>&nbsp;</font>&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="ausbildung_f" size="40" tabindex="12" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'],  $_POST['ueberschreiben'], $ausbildung_db_em, $_POST['ausbildung_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
      
      </td>
    </tr>
    
    
    
    <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      Strasse&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="strasse_f" size="40" tabindex="13"
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $strasse_db_em, $_POST['strasse_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['strasse_f']=trim(strip_tags($_POST['strasse_f'])); 
      if (($_POST['strasse_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Strasse\" fehlt !"; $angabe=FALSE;}
      ?>
      
      </td>
    </tr>
    
    <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      P L Z&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="plz_f" size="6" tabindex="14" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $plz_db_em, $_POST['plz_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
      &nbsp;&nbsp;Ort: <input type="text" name="ort_f" size="30" tabindex="15" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $ort_db_em, $_POST['ort_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $_POST['plz_f']=trim(strip_tags($_POST['plz_f'])); 
      if (($_POST['plz_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Postleitzahl\" fehlt !"; $angabe=FALSE;}
      ?>
      
      <?php $_POST['ort_f']=trim(strip_tags($_POST['ort_f'])); 
      if (($_POST['ort_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Der \"Ort\" fehlt !"; $angabe=FALSE;}
      ?>
      </td>
    </tr>
    
    
       <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      Land&nbsp;

      </td>
      <td bgcolor=""  height="25px" align="left" valign="middle"><b>
      <font face="Courier" color="#000000">
 <?php

  $selected = "selected";
     if ( ( $land_db_em == "D" ) ||  ( $_POST['land_f'] == "D" ) ) { $selected_d = "selected"; $selected_a = "";  $selected_c = "";  $selected_e = ""; $selected = "";}
     if ( ( $land_db_em == "A" ) ||  ( $_POST['land_f'] == "A" ) ) { $selected_d = ""; $selected_a = "selected";  $selected_c = "";  $selected_e = ""; $selected = "";}
     if ( ( $land_db_em == "CH" ) ||  ( $_POST['land_f'] == "CH" ) ){ $selected_d = ""; $selected_a = "";  $selected_c = "selected";  $selected_e = ""; $selected = "";}
     if ( ( $land_db_em == "E" ) ||  ( $_POST['land_f'] == "E" ) ) { $selected_d = ""; $selected_a = "";  $selected_c = "";  $selected_e = "selected"; $selected = "";}
    


    echo "
    <select name=\"land_f\" tabindex=\"8\">
    <option $selected value=\"\">L&auml;nder Europas</option>
    <option $selected_d value=\"D\">D</option>
    <option $selected_a value=\"A\">A</option>
    <option $selected_c value=\"CH\">CH</option>
    <option $selected_e value=\"E\">Europa</option>
    </select>";

    if (($_POST['land_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Land-Angabe\" fehlt !"; $angabe=FALSE;  $mindestinhalt=TRUE;}
 ?>     
</td>
    </tr>
    
   
    
        
    <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle">
      <font face="Courier" color="#000000"><b>
      Telefon&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="telefon_f" size="40" tabindex="16"
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $telefon_db_em, $_POST['telefon_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
 <?php $_POST['telefon_f']=trim(strip_tags($_POST['telefon_f'])); 
      if (($_POST['telefon_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Telefon-Nr.\" fehlt !"; $angabe=FALSE;}
      ?>
     
      </td>
    </tr>
    
        <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle">
      <font face="Courier" color="#000000"><b>
      Mobil-Telefon&nbsp;
      </td>
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="mobil_telefon_f" size="40" tabindex="17"
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $mobil_telefon_db_em, $_POST['mobil_telefon_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
 <?php $_POST['mobil_telefon_f']=trim(strip_tags($_POST['mobil_telefon_f'])); 
      if (($_POST['mobil_telefon_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"Mobil-Nr.\" fehlt !"; $angabe=FALSE;}
      ?>
     
      </td>
    </tr>            

    <tr>
      <td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      eMail</font></b>
       </td>
       
      <td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
      <input type="text" name="email_f" size="40" tabindex="18" 
      value="<?php aus_db_laden($_POST['suche_nach_email'], $_POST['suche_nach_nachname'], $_POST['adressen_speichern'], $_POST['trotzdem_speichern'], $_POST['ueberschreiben'], $email_db_em, $_POST['email_f']); ?>"
      style="color:#000000; background-color:#dadada; border-width:1; border-color:#dadada; border-style:;">
<?php $email_for=strtolower(str_replace(" ","",trim($_POST['email_f']))); 
                     $email_for=strip_tags($email_for);
      if (($_POST['email_f'] == "") && ($_POST['adressen_speichern'] == TRUE)){echo "<font color=\"red\"><br>Die \"eMail Adresse\" fehlt !"; $angabe=FALSE;  $mindestinhalt=FALSE;}

      
// email vergleich
 $email_vorhanden=mysqli_query($link,"select email from adressen where email = '$email_for");
while ($email_result=@mysqli_fetch_array($email_vorhanden, MYSQLI_BOTH ))
{ // start while eMail-Check
if(($email_result['email'] == $email_for) && ($_POST['adressen_speichern'] == TRUE))
{echo "<font color=\"red\"><br><br>Diese eMail-Adresse wird schon verwendet !<br>Wenn Sie \"Trotzdem speichern\" w&auml;hlen wird der \"Kontakt\" &uuml;berschrieben !";
 $angabe=FALSE;}
} // ende while eMail_check


if ((!preg_match($email_match,$_POST['email_f'])) && ($_POST['adressen_speichern'] == TRUE)){
echo "<font color=\"red\"><br>Diese eMail-Adresse ist ung&uuml;ltig !"; $angabe=FALSE; $mindestinhalt = FALSE;
}
 
?>
   </td>
    </tr> 
    
 
<tr>
<td bgcolor="" width="350px" height="25px" align="right" valign="middle"><b>
      <font face="Courier" color="#000000">
      Newsletter&nbsp;</font></b>
</td>
       
<td bgcolor="" width="350px" height="19" align="left" valign="middle"><b>
    <select name="newsletter" tabindex="20"> <option selected value="Ja">Ja</option> <option value="Nein">Nein</option></select>   
</td>
</tr>

    <tr>
      <td bgcolor="" colspan="2" height="25px" align="center" valign="middle"><b>
       <font face="Courier" color="#000000">

                  <p><input type="submit" value="Adresse speichern" name="adressen_speichern" tabindex="21"
                   style=" width: 200px; height: 30px; font-color: #000000; font-size: 18px; background-color: #00cc00;  border: 0px; border-radius: 5px 5px 5px 5px;">
                  </p>
                  
                  <?php 
                  if ( ( $_POST['adressen_speichern'] == TRUE ) && ( $mindestinhalt == FALSE ) ) {
                                   echo "<p><font color=\"#000000\"><br>Um einen Datensatz speichern zu k&ouml;nnen m&uuml;ssen MINDESTENS !!!<br>
                                   <font color=\"red\"><b>Anrede, Name, Vorname, eMail-Adresse</b> <font color=\"#000000\"><br>
                                   enthalten sein !</p>
                                   <font color=\"red\"><b>Pseudo-E-Mail-Adresse: h1234@h1234.de</b> <font color=\"#000000\"><br>";
                  }
                  
                  if   ( ( $_POST['adressen_speichern'] == TRUE ) && ( $angabe == FALSE ) && ( $mindestinhalt == TRUE ) ) {
                  echo "<p><input type=\"submit\" value=\"Unvollst&auml;ndigen Datensatz speichern\" name=\"trotzdem_speichern\" tabindex=\"22\"
                   style=\" width: 350px; height: 30px; color: #FFFFFF; font-size: 18px; background-color: red;  border: 0px; border-radius: 5px 5px 5px 5px;\">
                  </p>";
                  }
                  ?>
                  
                  
   </td>
                  </tr>

                  <div align="center">
<?php 
$time=time();


if ( ( ( $_POST['adressen_speichern'] == TRUE ) && ( $angabe == TRUE ) ) ||
     ( ( $_POST['trotzdem_speichern'] == TRUE ) && ( $mindestinhalt == TRUE ) )
     )
   {
   


if ( ( $_POST['adressen_speichern'] == TRUE ) || ( $_POST['trotzdem_speichern'] == TRUE ) ) {   

$email_select=mysqli_query($link,"select kd_nr from adressen where email = '$email_for'");
while($result_email=mysqli_fetch_array($email_select, MYSQLI_BOTH )){
$resultemail=$result_email['email'];
$resultkdnr_db=$result_email['kd_nr'];
}

if ( ( $resultkdnr_db != "" ) && ( $email_for != "h1234@h1234.de" ) ) { // das eine adresse mit der Pseudo_eMail-Adresse gespeichert werden kann 
echo
"<tr>
<td colspan=\"2\" bgcolor=\"red\" width=\"350px\" height=\"25px\" align=\"center\" valign=\"middle\"><b>
      <font face=\"Courier\" color=\"#FFFFFF\">
Eine Adresse mit dieser eMail ist schon vorhanden !
</td>
</tr>";
exit;
}




$resultkdnr_db;

$sperren=mysqli_query($link,"LOCK TABLES kundennummer write, kundennummer as kundennummer read");

$select_kd_nr = mysqli_query($link,"select max(kd_nr) + 1 as kdnr from kundennummer");
while ($result_kdnr=mysqli_fetch_array($select_kd_nr, MYSQLI_BOTH )){
$neuekdnr=$result_kdnr['kdnr'];
}
mysqli_query($link," insert into kundennummer (kd_nr, event) values ('$neuekdnr', '$_POST[codierung_f]') ");
mysqli_query($link," insert into kundennummer_kopie (kd_nr, event) values ('$neuekdnr', '$_POST[codierung_f]') ");
mysqli_query($link,"UNLOCK TABLES");
} 

////////////////////
 
$kundennummer = $neuekdnr;

if( $resultkdnr_db == "" ) {
$kundennummer = $neuekdnr;
}
$firma=htmlentities($_POST['firma_f']);
$firma_f=mysqli_real_escape_string($link, $firma);

$name=htmlentities($_POST['name_f']);
$name_f=mysqli_real_escape_string($link, $name);

$vorname=htmlentities($_POST['vorname_f']);
$vorname_f=mysqli_real_escape_string($link, $vorname);

mysqli_query($link," insert into teilgenommen_haben (event, kd_nr) values ('$_POST[codierung_f]', '$kundennummer') ");
///////////////////

$email_code=md5($email_for);

$kontaktart=htmlentities($_POST['kontakt_art_f']);
$markierung_1=htmlentities($_POST['markierung_1_f']);
$markierung_2=htmlentities($_POST['markierung_2_f']);
$strasse=htmlentities($_POST['strasse_f']);
$ort=htmlentities($_POST['ort_f']);

mysqli_query($link,"insert into adressen
(
kd_nr,
kontakt_art,
markierung_1,
markierung_2,
firma,
name,
vorname,
geschlecht,
strasse,
plz,
ort,
land,
telefon,
mobil_telefon,
email,
email_reserve,
email_code,
ausbildung,
newsletter,
new,
zeitstempel
)
values
(
'$kundennummer',
'$kontaktart',
'$markierung_1',
'$markierung_2',
'$firma_f',
'$name_f',
'$vorname_f',
'$_POST[geschlecht]',
'$strasse',
'$_POST[plz_f]',
'$ort',
'$_POST[land_f]',
'$_POST[telefon_f]',
'$_POST[mobil_telefon_f]',
'$email_for',
'$email_for',
'$email_code',
'$_POST[ausbildung_f]',
'$_POST[newsletter]',
'$_POST[newsletter]',
'$time'

)
");


mysqli_query($link,"insert into adressen_kopie
(
kd_nr,
kontakt_art,
markierung_1,
markierung_2,
firma,
name,
vorname,
geschlecht,
strasse,
plz,
ort,
land,
telefon,
mobil_telefon,
email,
email_reserve,
email_code,
ausbildung,
newsletter,
new,
zeitstempel
)
values
(
'$kundennummer',
'$kontaktart',
'$markierung_1',
'$markierung_2',
'$firma_f',
'$name_f',
'$vorname_f',
'$_POST[geschlecht]',
'$strasse',
'$_POST[plz_f]',
'$ort',
'$_POST[land_f]',
'$_POST[telefon_f]',
'$_POST[mobil_telefon_f]',
'$email_for',
'$email_for',
'$email_code',
'$_POST[ausbildung_f]',
'$_POST[newsletter]',
'$_POST[newsletter]',
'$time'

)
");




$fehler_1=mysql_error();

$email_select_g=mysqli_query($link,"select email  from geburtstage where email = '$email_for' ");
while($result_email_g=mysqli_fetch_array($email_select_g, MYSQLI_BOTH )){
$resultemail_g=$result_email_g['email'];

}
if  ( $resultemail_g == "" ) {
mysqli_query($link," insert into geburtstage
(
geburtstag,
geburtsmonat,
email
)
values
(
'$_POST[geburts_tag]',
'$_POST[geburts_monat]',
'$email_for'
)
");

$fehler_2=mysql_error();

mysqli_query($link," delete from geburtstage where geburtstag = '' or email = 'h1234@h1234.de' ");

$fehler_3=mysql_error();
}


echo "
 <tr>
 
<td bgcolor=\"\" colspan=\"2\" width=\"350px\" height=\"25px\" align=\"center\" valign=\"middle\"><b>
      <font face=\"Courier\" color=\"green\">";
 
if ( ( $fehler_1 == "" ) && ( $fehler_2 == "" ) && ( $fehler_3 == "" ) ) {
echo "DER DATENSATZ F&Uuml;R <font face=\"Courier\" style=' color:#FFFFFF; background-color: red;'>&nbsp;$_POST[name_f], $_POST[vorname_f]&nbsp;<font face=\"Courier\" style=' color:#000000; background-color: #FFFFFF;'> <font face=\"Courier\" color=\"green\">WURDE FEHLERFREI ABGESPEICHERT !";
}
echo "
</td>
</tr>
";

} 


// MAIL SENDEN  ///////////////////////////////////////////////////////////////////////////////////////////////
/* if (($_POST['speichern']== TRUE) && ($angabe == TRUE)){

$empfaenger = $_POST['email_f'].',';
$empfaenger.='info@variusmedien.de'.',';
$empfaenger.='info@copyshop-eberbach.de';
$betreff = "Bestaetigung per eMail von T-VARIUS T-Shirts and more";
$inhalt.= "
<div align=\"center\">
  <center>
  <table border=\"0\" width=\"600\">

    <tr>
      <td align=\"center\"><font face=\"Times\" size=\"4\" color=\"#000000\">
      Folgen Sie diesem Link:
      <br><br><i>";
$inhalt.= "<a href=\"http://192.168.2.106/gscheiderle/shop/index.php?seiten_index=erstanmeldung&code=$_COOKIE[PHPSESSID]&zurueck=$warenkorb\">Code_Link</a>"; 
   
$inhalt.= "<br><br>
Funktioniert evtl. nicht in allen eMail-Programmen: dann kopieren Sie den Link<br>
      und f&uuml;gen ihn in die Adress-Leiste Ihres Internet-Browsers ein.<br><br>
      http://192.168.2.106/gscheiderle/shop/index.php?seiten_index=erstanmeldung&code=$_COOKIE[PHPSESSID]&zurueck=$warenkorb<br><br>

      </i>IHR TEAM VARIUSMEDIEN e.K.<br>
      Copy-Shop Eberbach
      <br><br>
      </td>
    </tr>

  </table>
  </center>
</div>
";

$header.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $header.='Content-Transfer-Encoding: 8bit' . "\r\n"; 
$header.='From: info@variusmedien.de' . "\r\n";
$header.='Reply-To:u.sack@variusmedien.de' . "\r\n";  

mail($empfaenger, $betreff, $inhalt, $header); 

                                                
} */// if freischalten == TRUE wird die mail gesendet




// Box ende

 ?>
 


</div> 
</td>

</tr>





</table>
  
   
</div> <!-- ende div Table //-->

 </form>
  </body>
</html>