<nav class="blue lighten-2">
	<div class="nav-wrapper">
		<a href="index.php" class="brand-logo" id="brand-logo">Shop</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down" id="menu-items">
      <!--concept.php  -->
			<li><a class="dropdown-trigger" data-target="more-dropdown">More <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
			<li><a class="dropdown-trigger" data-target='cart-dropdown'>Cart <i class="fa fa-shopping-cart fa-1x white-text" style="margin-left: 5px;"></i></a></li>
			<li><a class="dropdown-trigger" data-target='profile-dropdown'>Profile <i class="fa fa-user fa-1x" style="margin-left: 5px;"></i></a></li>
		</ul>
	</div>


	<!-- Dropdown Contents (Non-Mobile) -->
	<ul id="profile-dropdown" class="dropdown-content">
		<li><a href="profile.php" class="blue-text">Hello <?php echo $_SESSION['firstname']; ?></a></li>
		<li><a href="logout.php" class="blue-text">Logout</a></li>
	</ul>
	<ul id="more-dropdown" class="dropdown-content">
		<li><a href="sell.php" class="left blue-text">Sell Products<i class="fas fa-chart-line right fa-1x" style="padding-left: 15px;"></i></a></li>
		<li><a href="ads.php" class="left blue-text">Create Ads<i class="fas fa-ad right fa-1x" style="padding-left: 15px; margin-left: 5px;"></i></a></li>
	</ul>
	<ul id="cart-dropdown" class="dropdown-content">
		<li><a href="cart.php" class="left blue-text">View Cart<i class="fa fa-shopping-cart fa-1x right" style="padding-left: 10px; margin-left: 5px;"></i></a></li>
	</ul>
</nav>