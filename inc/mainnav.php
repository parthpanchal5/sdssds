<div class="navbar-fixed">
<nav class="blue lighten-2 z-depth-2">
	<div class="nav-wrapper">
		<a href="index.php" class="brand-logo hide-on-med-and-down" id="client-brand-logo">Shop</a>
		
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		
		<ul class="right hide-on-med-and-down" id="menu-items">
      <!--concept.php  -->
			<li><a class="dropdown-trigger" data-target="more-dropdown">More <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
			<li><a class="dropdown-trigger" data-target='cart-dropdown'>Cart <i class="fa fa-shopping-cart fa-1x white-text" style="margin-left: 5px;"></i></a></li>
			<li><a class="dropdown-trigger" data-target='profile-dropdown'>Profile <i class="fa fa-user fa-1x" style="margin-left: 5px;"></i></a></li>
		</ul>
	</div>
	<div class="container">
			<div class="row">
				<div class="col s6">
					<form action="" method="POST">
						<div class="input-field">
							<input type="text" name="q" id="mega-search" placeholder="Search for products...">
							<i id="filtersubmit" class="fa fa-search fa-1x"></i>
						</div>
					</form>		
				</div>
			</div>
		</div>

</div>
	<!-- Dropdown Contents (Non-Mobile) -->
	<ul id="profile-dropdown" class="dropdown-content">
		<li><a href="profile.php" class="blue-text">Hello <?php echo $_SESSION['firstname']; ?></a></li>
		<li><a href="logout.php" class="blue-text">Logout <i class="fa fa-power-off red-text fa-1x right" style="margin-left: 20px;"></i></a></li>
	</ul>
	<ul id="more-dropdown" class="dropdown-content">
		<li><a href="sell.php" class="left blue-text">Sell Products<i class="fas fa-chart-line right fa-1x" style="padding-left: 15px;"></i></a></li>
		<li><a href="ads.php" class="left blue-text">Create Ads<i class="fas fa-ad right fa-1x" style="padding-left: 15px;"></i></a></li>
		<li><a href="contact_us.php" class="left blue-text">Contact Us<i class="fas fa-envelope right fa-1x" style="padding-left: 15px;"></i></a></li>
	</ul>
	<ul id="cart-dropdown" class="dropdown-content">
		<li><a href="cart.php" class="left blue-text">View Cart<i class="fa fa-shopping-cart fa-1x right" style="padding-left: 10px; margin-left: 5px;"></i></a></li>
	</ul>
	
</nav>