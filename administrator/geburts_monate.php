
<?php 
   
for ($tag=1;$tag <= 31; $tag++ ) {

$selected="selected_".$tag;



if ( ( $_POST['geburts_tag'] == $tag ) || ( $geburtstag_db == $tag ) ){
     $$selected="selected";
     }
 }    
    
                           echo "
                                    <select name=\"geburts_tag\" tabindex=\"3\">
                                    <option selected value=\"\">Geburts-Tag</option>
                                    <option $selected_1 value=\"1\">01.</option>
                                    <option $selected_2 value=\"2\">02.</option>
                                    <option $selected_3 value=\"3\">03.</option>
                                    <option $selected_4 value=\"4\">04.</option>
                                    <option $selected_5 value=\"5\">05.</option>
                                    <option $selected_6 value=\"6\">06.</option>
                                    <option $selected_7 value=\"7\">07.</option>
                                    <option $selected_8 value=\"8\">08.</option>
                                    <option $selected_9 value=\"9\">09.</option>
                                    <option $selected_10 value=\"10\">10.</option>
                                    <option $selected_11 value=\"11\">11.</option>
                                    <option $selected_12 value=\"12\">12.</option>
                                    <option $selected_13 value=\"13\">13.</option>
                                    <option $selected_14 value=\"14\">14.</option>
                                    <option $selected_15 value=\"15\">15.</option>
                                    <option $selected_16 value=\"16\">16.</option>
                                    <option $selected_17 value=\"17\">17.</option>
                                    <option $selected_18 value=\"18\">18.</option>
                                    <option $selected_19 value=\"19\">19.</option>
                                    <option $selected_20 value=\"20\">20.</option>
                                    <option $selected_21 value=\"21\">21.</option>
                                    <option $selected_22 value=\"22\">22.</option>
                                    <option $selected_23 value=\"23\">23.</option>
                                    <option $selected_24 value=\"24\">24.</option>
                                    <option $selected_25 value=\"25\">25.</option>
                                    <option $selected_26 value=\"26\">26</option>
                                    <option $selected_27 value=\"27\">27.</option>
                                    <option $selected_28 value=\"28\">28.</option>
                                    <option $selected_29 value=\"29\">29.</option>
                                    <option $selected_30 value=\"30\">30.</option>
                                    <option $selected_31 value=\"31\">31.</option>
                                    </select>
   
   
                                   &nbsp;&nbsp;";
                                   
$monat=1;                                    
for ($i=41;$i <= 52; $i++ ) {

$selected="selected_".$i;

if ( ( $_POST['geburts_monat'] == $monat ) || ( $geburtsmonat_db == $monat ) ) {
     $$selected="selected";
     }
     
     $monat++;
 }                                   
                                    
                                    echo "
                                    <select name=\"geburts_monat\" tabindex=\"3\">
                                    <option selected value=\"\">Geburts-Monat</option>
                                    <option $selected_41 value=\"1\">Januar</option>
                                    <option $selected_42 value=\"2\">Februar</option>
                                    <option $selected_43 value=\"3\">M&auml;rz</option>
                                    <option $selected_44 value=\"4\">April</option>
                                    <option $selected_45 value=\"5\">Mai</option>
                                    <option $selected_46 value=\"6\">Juni</option>
                                    <option $selected_47 value=\"7\">Juli</option>
                                    <option $selected_48 value=\"8\">August</option>
                                    <option $selected_49 value=\"9\">September</option>
                                    <option $selected_50 value=\"10\">Oktober</option>
                                    <option $selected_51 value=\"11\">November</option>
                                    <option $selected_52 value=\"12\">Dezember</option>
                                    </select><br> 
                                    ";
                                    
                                    
                                    ?>
