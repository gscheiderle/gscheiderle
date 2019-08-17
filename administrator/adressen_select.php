<?php 
if ( $_POST['adressen_suchen'] == "email" ) { $select_1 = "selected"; }
if ( $_POST['adressen_suchen'] == "name" ) { $select_2 = "selected"; }
if ( $_POST['adressen_suchen'] == "firma" ) { $select_3 = "selected"; }
if ( $_POST['adressen_suchen'] == "plz" ) { $select_4 = "selected"; }
if ( $_POST['adressen_suchen'] == "markierung_1" ) { $select_15 = "selected"; }
if ( $_POST['adressen_suchen'] == "markierung_2" ) { $select_5 = "selected"; }
if ( $_POST['adressen_suchen'] == "kontakt_neu_ver" ) { $select_6 = "selected"; }
if ( $_POST['adressen_suchen'] == "div_plz_dhh" ) { $select_7 = "selected"; }
if ( $_POST['adressen_suchen'] == "div_plz_dhh_neu_alle" ) { $select_8 = "selected"; }
if ( $_POST['adressen_suchen'] == "div_plz_dhh_neu" ) { $select_9 = "selected"; }
if ( $_POST['adressen_suchen'] == "div_plz" ) { $select_10 = "selected"; }
if ( $_POST['adressen_suchen'] == "plz_bereich" ) { $select_11 = "selected"; }
if ( $_POST['adressen_suchen'] == "email_alle" ) { $select_12 = "selected"; }
if ( $_POST['adressen_suchen'] == "kdnr" ) { $select_13 = "selected"; }
if ( $_POST['adressen_suchen'] == "alle" ) { $select_14 = "selected"; }
 
 ?>
 <select name="adressen_suchen" tabindex="12"
          style=" width: 200px; height: 30px; font-color: #000000; font-size: 16px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
          <option value="" selected>Optionen</option>
          <option <?php echo $select_1; ?> value="email">nach E-Mail</option>
          <option <?php echo $select_2; ?> value="name">nach Namen</option>
          <option <?php echo $select_3; ?> value="firma">nach Firma</option>
          <option <?php echo $select_4; ?> value="plz">nach PLZ</option>
          <option <?php echo $select_15; ?> value="markierung_1">Markierung 1</option>
          <option <?php echo $select_5; ?> value="markierung_2">Markierung 2</option>
          <option <?php echo $select_6; ?> value="kontakt_neu_ver">Event alle neuen Teilnehmer</option>
          <option <?php echo $select_7; ?> value="div_plz_dhh">DDH in PLZs suchen</option>
          <option <?php echo $select_8; ?> value="div_plz_dhh_neu_alle">ALLE NEUE DDH suchen</option>
          <option <?php echo $select_9; ?> value="div_plz_dhh_neu">NEUE DDH nach PLZs suchen</option>
          <option <?php echo $select_10; ?> value="div_plz">mehrere PLZ's</option>
          <option <?php echo $select_11; ?> value="plz_bereich">PLZ-Bereich</option>
          <option <?php echo $select_12; ?> value="email_alle">alle E-Mail listen</option>
          <option <?php echo $select_13; ?> value="kdnr">nach Kd.-Nr. suchen</option>
          <option <?php echo $select_14; ?> value="alle">alle Adressen listen</option>
          
   </select>

</td>

<td>

<td>
<input type="text" size="36" name="kriterium" tabindex="13" value="<?php if ( $_POST['adressen_selectieren'] == TRUE ) { echo $_POST['kriterium']; } else { $_POST['kriterium'] = ""; }?>"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 14px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
</td>

<?php 




$suche_kontakt_art=mysqli_query($link,"select distinct kontakt_art  from adressen 
where kontakt_art != '' order by kd_id desc limit 10");
while($finde_kontakt=@mysqli_fetch_array($suche_kontakt_art, MYSQLI_BOTH )) {
$kontakt_arten.="<option value=\"$finde_kontakt[kontakt_art]\">Kontakt: $finde_kontakt[kontakt_art]</option>";
}

$suche_kontakt_art_1=mysqli_query($link,"select distinct markierung_1 from adressen 
where markierung_1 != '' order by kd_id desc limit 5");
while($finde_kontakt_1=@mysqli_fetch_array($suche_kontakt_art_1, MYSQLI_BOTH )) {
$markierung_1.="<option value=\"$finde_kontakt_1[markierung_1]\">Markierung 1: $finde_kontakt_1[markierung_1]</option>";
}

$suche_kontakt_art_2=mysqli_query($link,"select distinct markierung_2 from adressen 
where markierung_2 != '' order by kd_id desc limit 5");
while($finde_kontakt_2=@mysqli_fetch_array($suche_kontakt_art_2, MYSQLI_BOTH )) {
$markierung_2.="<option value=\"$finde_kontakt_2[markierung_2]\">Markierung 2: $finde_kontakt_2[markierung_2]</option>";
}

$suche_bonus=mysqli_query($link,"select distinct bonus from adressen 
where bonus != '' order by kd_id desc limit 5");
while($finde_bonus=@mysqli_fetch_array($suche_bonus, MYSQLI_BOTH )) {
$bonus.="<option value=\"$finde_bonus[bonus]\">Bonus: $finde_bonus[bonus]</option>";
}
$suche_event=mysqli_query($link,"select distinct event from kundennummer 
where event != '' order by kdnr_id desc limit 5");
while($finde_event=@mysqli_fetch_array($suche_event, MYSQLI_BOTH )) {
$event.="<option value=\"$finde_event[event]\">Event: $finde_event[event]</option>";
}
?>

<td>
 <select name="kriterium_2" tabindex="14"
 style=" width: 200px; height: 30px; font-color: #000000; font-size: 14px; background-color: #c0c0c0;  border: 0px; border-radius: 5px 5px 5px 5px;">
 <option selected>w&auml;hle Kontakt</option>
 <?php 
       
       echo $kontakt_arten;
       echo $bonus;
       echo $markierung_1;
       echo $markierung_2; 
       echo $event;
       
?>
 </select>

