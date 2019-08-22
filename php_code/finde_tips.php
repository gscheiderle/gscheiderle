<?php


 /*** selektiert die Tips's der von der Frontpage aus angewählten Rubrik */
$zaehler_2=0;
$zaehler=0;

$color= "#D2D1F7";

$select_tips=mysqli_query($link, "select tip, ru_id, rubrik, code, preis, eigentuemer from die_tips where ru_id = '$nummer_rubrik' or ru_id = '$_POST[nummer_rubrik]' " );
while ( $result_tips = mysqli_fetch_array( $select_tips, MYSQLI_BOTH ) ) {
	
	if ( $zaehler_2 % 2 == 0 ) { $color= "#F1C491"; }
	if ( $zaehler_2 % 3 == 0 ) { $color= "#2FECDD"; }
	if ( $zaehler_2 % 4 == 0 ) { $color= "#F0B1B1"; }
	

	
$tabelle.=
    "<div class='col-md-4' style='background-color: $color;'><h2>".$result_tips['tip']."<br>
    nur &euro; ".$result_tips['preis']."</h2><br>

    <h2>Das will ich wissen: </h2>
    <button type='submit' name='in_cart' value='$result_tips[code]'><img src='images_system/cart.png' height='40px' width='40px' alt='cart.png'></button>
	</div>";
	

	


$zaehler_2++;
$color="";	
    
if ( $zaehler == 2 )	{ $tabelle.="</tr><tr>"; $zaehler=0; }

$zaehler++;
    
   $code=$result_tips['code'];
   $tip=$result_tips['tip'];
   $rubrik=$result_tips['rubrik'];
   $ru_id=$result_tips['ru_id'];
   $preis=$result_tips['preis'];
   $eigentuemer=$result_tips['eigentuemer'];
    
 }

?>

<input type="hidden" name="code" value="<?php echo $code; ?>">
<input type="hidden" name="tip" value="<?php echo $tip; ?>">
<input type="hidden" name="rubrik" value="<?php echo $rubrik; ?>">
<input type="hidden" name="ru_id" value="<?php echo $ru_id; ?>">
<input type="hidden" name="preis" value="<?php echo $preis; ?>">
<input type="hidden" name="eigentuemer" value="<?php echo $eigentuemer; ?>">

