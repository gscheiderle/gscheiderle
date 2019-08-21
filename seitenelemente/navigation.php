


<div class="row">
   
<div class="col-md-12 bg-info text-white" style="text-align: center;">
		 
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">NAVIGATION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href='http://192.168.2.106/gscheiderle/index.php'>HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='http://192.168.2.106/gscheiderle/alle_rubriken.php'>RUBRIKEN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='http://192.168.2.106/gscheiderle/cart.php'>CART</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='http://192.168.2.106/gscheiderle/einloggen.php'>EINLOGGEN</a>
    </li>
	  
<?php
	  if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
		  
	echo "
	
	 <li class='nav-item'>
      <a class='nav-link' href='http://192.168.2.106/gscheiderle/kasse/zahlung_abschliessen.php'>BEZAHLEN</a>
    </li>
	
	 <li class='nav-item'>
      <a class='nav-link' href='http://192.168.2.106/gscheiderle/logout.php'>AUSLOGGEN</a>
    </li>";
	  }
?>
	
	  <li class="nav-item">
      <a class="nav-link" href='http://192.168.2.106/gscheiderle/angebot_mitarbeit.php'>EIGENE TIPPS</a>
    </li>
  </ul>
</nav>
		
</div>
	</div>
	


