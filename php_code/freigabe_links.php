<?php
//////////////////////////////////////////
//
// FREIGABEN LINKS
//
/////////////////////////////////////////
?>

<table width="800px" border="0" cellspacing="10px" cellpadding="10px" style="background-color: #FFF; color: red; ">
<?php

$font="<font style='color: red; weight: 800; background-color: #FFF; text-decoration: none'>"; 
	
$freigabelink=array();   
	
$select_links=mysqli_query($link," select tip_nr from freigabe where re_nr = '$_GET[re_nr]' ");
while ( $result_links = mysqli_fetch_array( $select_links, MYSQLI_BOTH ) ) {
   
$select_tips=mysqli_query($link," select titel from tip_texte where tip_nr = '$result_links[tip_nr]' ");
while ( $result_tips = mysqli_fetch_array( $select_tips, MYSQLI_BOTH ) ) {
    
$freigabe_link=$result_tips['titel'];
	
$freigabelink[]=("<a href='http://localhost/tcpdf/examples/pdf_tips_gscheiderle.php?renr=$_GET[re_nr]&tip_nr=$result_links[tip_nr]' target='_blanc'>&nbsp;$freigabe_link&nbsp;</a>");	
	
	

/*echo "<a href='http://localhost/tcpdf/examples/pdf_tips_gscheiderle.php?renr=$_GET[re_nr]&tip_nr=$result_links[tip_nr]' target='_blanc'>$font&nbsp;$freigabe_link&nbsp;</font></a>";
echo "<br>";  */  
    

    
}
 
}

?>
    
</table>    