


 <div class="row">
		

    
<div class="col-md-12 bg-info text-white" style="text-align: center;">
		 
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href='http://localhost/gscheiderle/index.php'>HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='http://localhost/gscheiderle/alle_rubriken.php'>RUBRIKEN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='http://localhost/gscheiderle/cart.php'>CART</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='http://localhost/gscheiderle/einloggen.php'>EINLOGGEN</a>
    </li>
	  
<?php
	  if ( $_COOKIE['kd_nr'] != "" && $_COOKIE['name'] != "" ) {
		  
	echo "
	
	 <li class='nav-item'>
      <a class='nav-link' href='http://localhost/gscheiderle/kasse/zahlung_abschliessen.php'>BEZAHLEN</a>
    </li>
	
	 <li class='nav-item'>
      <a class='nav-link' href='http://localhost/gscheiderle/logout.php'>AUSLOGGEN</a>
    </li>";
	  }
	  ?>
	
	  <li class="nav-item">
      <a class="nav-link" href='http://localhost/gscheiderle/angebot_mitarbeit.php'>EIGENE TIPPS</a>
    </li>
  </ul>
</nav>
		
</div>
	


