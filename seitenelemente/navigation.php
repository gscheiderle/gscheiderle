
<?php
switch ($_GET['seiten_id']) {

		
	case 103:
        $active_3="active";
		$style_3="<font style='color: yellow; font-size: 18px; weight: 700'>";
		break;
		
		
	case 105:
        $active_5="active";
		$style_5="<font style='color: yellow; font-size: 18px; weight: 700'>";
		break;
		
	case 107:
        $active_7="active";
		$style_7="<font style='color: yellow; font-size: 18px; weight: 700'>";
		break;
		
    case 109:
        $active_9="active";
		$style_9="<font style='color: yellow; font-size: 18px; weight: 700'>";
		break;
		
	case 111:
        $active_11="active";
		$style_11="<font style='color: yellow; font-size: 18px; weight: 700'>";
		break;
		
	case 113:
        $active_13="active";
		$style_13="<font style='color: yellow; font-size: 18px; weight: 700'>";
		break;
		
}

?>



<?php
$id_101=101;
$id_103=103;
$id_105=105;
$id_107=107;
$id_109=109;
$id_111=111;
$id_113=113;
$id_115=115;
$id_117=117;


echo "<div class='row'>
<div class='col-$md-12 bg-info text-white' style='text-align: center;'>
  <nav class='navbar navbar-expand-md bg-dark navbar-dark'>
  <a class='navbar-brand' href='#'>NAVIGATION</a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'> <span class='navbar-toggler-icon'></span> </button>
  <div class='collapse navbar-collapse' id='collapsibleNavbar'>
    <ul class='navbar-nav'>
      <li class='nav-item $active_1' $style_1> <a class='nav-link' href='http://192.168.2.106/gscheiderle/index.php?seiten_id=$id_101'>$style_1 HOME</font></a> </li>
      <li class='nav-item $active_3'> <a class='nav-link' href='http://192.168.2.106/gscheiderle/alle_rubriken.php?seiten_id=$id_103'>$style_3 RUBRIKEN</font></a> </li>
      <li class='nav-item $active_5'> <a class='nav-link' href='http://192.168.2.106/gscheiderle/cart.php?seiten_id=$id_105'>$style_5 CART</font></a> </li>
      <li class='nav-item $active_7'> <a class='nav-link' href='http://192.168.2.106/gscheiderle/einloggen.php?seiten_id=$id_107'>$style_7 EINLOGGEN</font></a> </li>";
	?>	
		
    <?php

      if ( $_COOKIE[ 'kd_nr' ] != "" && $_COOKIE[ 'name' ] != "" ) {

        echo "
	
	 <li class='nav-item $active_9'>
      <a class='nav-link' href='http://192.168.2.106/gscheiderle/kasse/zahlung_abschliessen.php?seiten_id=$id_109'>$style_9 BEZAHLEN</font></a>
    </li>
	
	 <li class='nav-item $active_11'>
      <a class='nav-link' href='http://192.168.2.106/gscheiderle/logout.php?seiten_id=$id_111'>$style_11 AUSLOGGEN</font></a>
    </li>";
      }
   ?>

  <?php 
    echo "
      <li class='nav-item $active_13'> <a class='nav-link' href='http://192.168.2.106/gscheiderle/angebot_mitarbeit.php?seiten_id=$id_113'>$style_13 EIGENE TIPPS</font></a> </li>
    </ul>
    </nav>
  </div>
</div>";
