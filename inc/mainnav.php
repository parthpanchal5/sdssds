<div class="navbar-fixed">
<nav class="light-blue darken-1 z-depth-2">
	<div class="nav-wrapper">
		<a href="index.php" class="brand-logo hide-on-med-and-down" id="client-brand-logo">Shop</a>
		
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		
		<ul class="right hide-on-med-and-down" id="menu-items">
      <!--concept.php  -->
			<li><a class="dropdown-trigger" data-target="more-dropdown" >More <i class="fa fa-angle-down fa-1x" id="child" style="margin-left: 5px;"></i></a></li>                                       
			<li><a class="dropdown-trigger" data-target='cart-dropdown'>Cart <i class="fa fa-shopping-cart fa-1x white-text" style="margin-left: 5px;"></i></a></li>
			<li><a class="dropdown-trigger" data-target='profile-dropdown'>Profile <i class="fa fa-user fa-1x" style="margin-left: 5px;"></i></a></li>
		</ul>
	</div>
	<div class="container">
			<div class="row">
				<div class="col s6">
					<form action="search.php?q=" method="GET">
						<div class="input-field">
							<input type="text" name="q" class="autocomplete" autocomplete="off" value="<?php echo $productSearchId; ?>" class="z-depth-2" id="mega-search" value="<?php echo $productRequest; ?>"  placeholder="Search for products..." onkeyup="autoload();">
							<i id="searchbtn" class="fa fa-search fa-1x"></i>
							<div class="result"></div>
						</div>
					</form>		
				</div>
			</div>
		</div>

</div>
	<!-- Dropdown Contents (Non-Mobile) -->
	<ul id="profile-dropdown" class="dropdown-content">
	<li><a href='profile.php' class='blue-text'>Hello <?php if(!isset($_SESSION['user_id'])) { echo 'Guest'; } else{ echo $_SESSION['firstname']; }?></a></li>
	
	<?php if(!isset($_SESSION['email']) || empty($_SESSION['email'])) : ?>
	
	<?php echo '<li class="bold"><a href="login.php" class="collapsible-header waves-effect" id="mobile-links">Login</a></li>';?>
	
		<?php else: ?>
	
		<?php echo '<li class="bold"><a href="logout.php" class="collapsible-header waves-effect blue-text" id="mobile-links">Logout <i class="fa fa-power-off fa-1x right red-text" style="font-size: 15px; margin-left: 5px;"></i></a></li>';?>
	
	<?php endif; ?>
	
	</ul>
	<ul id="more-dropdown" class="dropdown-content">
		<li><a href="contact_us.php" class="left blue-text">Contact Us<i class="fas fa-envelope right fa-1x" style="padding-left: 15px;"></i></a></li>
	</ul>
	<ul id="cart-dropdown" class="dropdown-content">
		<li>
			<a href="cart.php" class="left blue-text">View Cart <span class="new rounded badge red right"><?php echo count($_SESSION['cart']); ?> </span><i class="fa fa-shopping-cart fa-1x right" style="padding-left: 2px; margin-left: 2px;"></i></a>
		</li>
	</ul>
	
</nav>

<!--Mobile nav-->
<ul class="sidenav collapsible expandable" id="mobile-demo">
	<li>
		<div class="user-view">
			<div class="background">
			<img src="img/back.jpeg" style="height: 820px"></div>
			<a class="sidenav-close"><i class="material-icons small white-text" style="cursor: pointer;">arrow_back</i></a>
			<a><img class="circle right" src="img/avatar.svg"></a>
			<a><span class="white-text name"><h4><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></span></h4></a>
			<a><span class="white-text email"><?php echo $_SESSION['email']; ?></span></a>
		</div>
	</li>
	<li class="bold"><a href="index.php" class="collapsible-header waves-effect" id="mobile-links">Home <i class="material-icons right blue-text">home</i></a></li>
	<?php 
		if(isset($_SESSION['username'])) { 
			echo "<li class='bold'><a class='collapsible-header waves-effect' id='mobile-parent'>Profile <i class='material-icons grey-text right' id='mobile-child'>expand_more</i></a>
			<div class='collapsible-body'>
				<ul>
					<li><a href='profile.php' class='blue-text'>View Profile</a></li>
				</ul>
			</div>
		</li>";	
	} 
	?>
	
	<li class="bold"><a class="collapsible-header waves-effect" id="mobile-links">Cart <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
				<li><a href="cart.php" class="blue-text">View Cart  <span class="new rounded badge red center"><?php echo count($_SESSION['cart']); ?> </span><i class="fa fa-shopping-cart blue-text right"></i></a></li>			
			</ul>
		</div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect" id="mobile-links">More <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
				<li><a href="contact_us.php" class="blue-text">Contact Us<i class="fas fa-envelope blue-text right fa-1x"></i></a></li>
			</ul>
		</div>
	</li>
	<li><div class="divider"></div></li>
	<li class="bold active"><a class="collapsible-header waves-effect" id="mobile-links">Shop by Category <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
			<?php $sql = "SELECT COUNT(*) AS `Rows`, `cat_name` FROM `category` GROUP BY `cat_name` ORDER BY `cat_name` DESC"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) {  ?>
				<li><a href="category_search.php?cat=<?php echo strtolower($row[1]);?>" class="blue-text"><?php echo $row[1]; ?></a></li>	
			<?php } ?>
			</ul>
		</div>
	</li>
	<?php if(!isset($_SESSION['email']) || empty($_SESSION['email'])) :?>
		<?php echo '<li class="bold"><a href="login.php" class="collapsible-header waves-effect" id="mobile-links">Login </a></li>';?>
	<?php else: ?>
	<?php echo '<li class="bold"><a href="logout.php" class="collapsible-header waves-effect" id="mobile-links">Logout <i class="fa fa-power-off fa-1x right red-text" style="font-size: 15px;"></i></a></li>';?>
	<?php endif; ?>

</ul>
