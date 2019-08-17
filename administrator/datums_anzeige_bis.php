                  <?php 
                  
                 
                                   
$monat_1 = date("m"); 
$tag_1 = date("d");
$jahr = date("Y"); 

for($y=2017; $y <= 2019; $y++) {
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

for($h=6; $h <= 24; $h++) {
$h_selected="h_selected_".$h;
if(date(H) == $h) {$$h_selected="selected";}
}

 ?>                 
            <td  bgcolor="#FFFFFF" align="right">Termin bis: </td>
            
            <td  bgcolor="#b1b1b1" align="left">
            
            
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
                              
                              &nbsp;&nbsp;

                  
                 
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
                                
                   &nbsp;&nbsp;
                                

                              
                                                              <select name="jahr">
                                  <option value="2017"<?php echo $y_selected_2017; ?>>2017</option>
                                  <option value="2018"<?php echo $y_selected_2018; ?>>2018</option> 
                                  <option value="2019"<?php echo $y_selected_2019; ?>>2019</option>
                                </select>
                              
                              </td>
                              
                              

                                
                                
                <?php          
                
                $jahr=$_POST['jahr'];
                $monat=$_POST['monat'];
                $tag=$_POST['tag'];
                
                $termin_bis=date("$jahr-$monat-$tag");
                               
                            
                 ?>