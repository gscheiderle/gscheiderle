<?php if ( $_POST['verwenden'] == TRUE ) { $checked= "checked";} ?>                  
<input type="checkbox" name="verwenden" <?php echo $checked; ?> style=" height: 25px; width: 25px;"> Vorzugspreis bei Buchung und Bezahlung bis zum                  
<?php  

if ( $_POST['verwenden'] == TRUE ) {                
                                  
$monat_1 = date("m"); 
$tag_1 = date("d");
$jahr = date("Y"); 

for($y=2017; $y <= 2019; $y++) {
$y_selected="y_selected_".$y."3";
if($_POST['jahr_f'] == $y) {$$y_selected="selected";}
}

for($m=1; $m <= 12; $m++) {
$m_selected="m_selected_".$m."3";
if($_POST['monat_f'] == $m) {$$m_selected="selected";}
}

for($d=1; $d <= 31; $d++) {
$d_selected="d_selected_".$d."3";
if ( $_POST['tag_f'] == $d ) { echo $$d_selected="selected"; }
}

}
 
 ?>                             <select name="tag_f">
                                <option value="00" selected>Tag</option> 
                                <option value="01"<?php echo $d_selected_13; ?>>01</option> 
                                <option value="02"<?php echo $d_selected_23; ?>>02</option> 
                                <option value="03"<?php echo $d_selected_33; ?>>03</option>
                                <option value="04"<?php echo $d_selected_43; ?>>04</option> 
                                <option value="05"<?php echo $d_selected_53; ?>>05</option> 
                                <option value="06"<?php echo $d_selected_63; ?>>06</option>
                                <option value="07"<?php echo $d_selected_73; ?>>07</option> 
                                <option value="08"<?php echo $d_selected_83; ?>>08</option> 
                                <option value="09"<?php echo $d_selected_93; ?>>09</option>
                                <option value="10"<?php echo $d_selected_103; ?>>10</option> 
                                <option value="11"<?php echo $d_selected_113; ?>>11</option> 
                                <option value="12"<?php echo $d_selected_123; ?>>12</option>
                                <option value="13"<?php echo $d_selected_133; ?>>13</option> 
                                <option value="14"<?php echo $d_selected_143; ?>>14</option> 
                                <option value="15"<?php echo $d_selected_153; ?>>15</option>
                                <option value="16"<?php echo $d_selected_163; ?>>16</option> 
                                <option value="17"<?php echo $d_selected_173; ?>>17</option> 
                                <option value="18"<?php echo $d_selected_183; ?>>18</option>
                                <option value="19"<?php echo $d_selected_193; ?>>19</option> 
                                <option value="20"<?php echo $d_selected_203; ?>>20</option> 
                                <option value="21"<?php echo $d_selected_213; ?>>21</option>
                                <option value="22"<?php echo $d_selected_223; ?>>22</option> 
                                <option value="23"<?php echo $d_selected_233; ?>>23</option> 
                                <option value="24"<?php echo $d_selected_243; ?>>24</option>
                                <option value="25"<?php echo $d_selected_253; ?>>25</option> 
                                <option value="26"<?php echo $d_selected_263; ?>>26</option> 
                                <option value="27"<?php echo $d_selected_273; ?>>27</option>
                                <option value="28"<?php echo $d_selected_283; ?>>28</option> 
                                <option value="29"<?php echo $d_selected_293; ?>>29</option> 
                                <option value="30"<?php echo $d_selected_303; ?>>30</option>
                                <option value="31"<?php echo $d_selected_313; ?>>31</option> 
                              </select>
            
            
        
                  
             &nbsp;&nbsp;
                 
                              <select name="monat_f"> 
                              <option value="00" selected>Monat</option>
                                <option value="01" <?php echo $m_selected_13; ?>>Januar</option> 
                                <option value="02" <?php echo $m_selected_23; ?>>Februar</option> 
                                <option value="03" <?php echo $m_selected_33; ?>>M&auml;rz</option>
                                <option value="04" <?php echo $m_selected_43; ?>>April</option> 
                                <option value="05" <?php echo $m_selected_53; ?>>Mai</option> 
                                <option value="06" <?php echo $m_selected_63; ?>>Juni</option>
                                <option value="07" <?php echo $m_selected_73; ?>>Juli</option> 
                                <option value="08" <?php echo $m_selected_83; ?>>August</option> 
                                <option value="09" <?php echo $m_selected_93; ?>>September</option>
                                <option value="10" <?php echo $m_selected_103; ?>>Oktober</option> 
                                <option value="11" <?php echo $m_selected_113; ?>>November</option> 
                                <option value="12" <?php echo $m_selected_123; ?>>Dezember</option>
                              </select>
                                
                   &nbsp;&nbsp;
                   
                   
                              <select name="jahr_f">
                              <option value="00" selected>Jahr</option>
                                 <option value="2017"<?php echo $y_selected_20173; ?>>2017</option>
                                 <option value="2018"<?php echo $y_selected_20183; ?>>2018</option> 
                                 <option value="2019"<?php echo $y_selected_20193; ?>>2019</option>
                              </select>
                                
   
                              
                              
                              
                              

                                
                                
                <?php          
                
                $jahr_f=$_POST['jahr_f'];
                $monat_f=$_POST['monat_f'];
                $tag_f=$_POST['tag_f'];
                
                $fruehbuch_datum=date("$jahr_f-$monat_f-$tag_f");
                               
                            
                 ?>