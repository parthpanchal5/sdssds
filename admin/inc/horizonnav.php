<nav class="blue lighten-2 z-depth-2">
	<div class="nav-wrapper">
		<a href="dashboard.php" class="brand-logo" id="admin-brand-logo">Shop</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down" id="menu-items">
			<li><a class="dropdown-trigger" data-target="user-dropdown">Users <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
			<li><a class="dropdown-trigger" data-target="category-dropdown">Category <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>
			<li><a class="dropdown-trigger" data-target="product-dropdown">Product <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>
			<li><a class="dropdown-trigger" data-target="transaction-dropdown">Transaction <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>			
			<li><a class="dropdown-trigger" data-target="message-dropdown">Messages <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>			
			<li><a class="dropdown-trigger" data-target="admin-dropdown">Hello <?php echo $_SESSION['firstname']; ?>!<i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
		</ul>
	</div>
	
</div>

	<!-- Dropdown Contents (Non-Mobile) -->
	<ul id="admin-dropdown" class="dropdown-content">
		<li><a href="logout.php" class="blue-text" style="padding-right: 80px;">Logout</a></li>
	</ul>
	<ul id="user-dropdown" class="dropdown-content">
		<li><a href="view_user.php" class="blue-text">View User</a></li>
		<li><a href="edit_user.php" class="blue-text">Edit User</a></li>
	</ul>
	<ul id="category-dropdown" class="dropdown-content">
		<li><a href="view_cat.php" class="blue-text">View Category</li></a>
		<li><a href="insert_cat.php" class="blue-text">Insert Category</li></a>
		<li><a href="edit_cat.php" class="blue-text">Edit Category</li></a>
	</ul>	
	<ul id="transaction-dropdown" class="dropdown-content">
		<li><a href="view_transaction.php" class="blue-text">View Transaction</a></li>
	</ul>	
	<ul id="product-dropdown" class="dropdown-content">
		<li><a href="view_item.php" class="blue-text">View Items</a></li>
		<li><a href="insert_item.php" class="blue-text">Add Items</a></li>
	</ul>
	<ul id="message-dropdown" class="dropdown-content">
		<li><a href="message.php" class="blue-text">View Messages</a></li>
	</ul>
	
</nav>
<ul class="sidenav collapsible expandable" id="mobile-demo">
	<li>
		<div class="user-view">
			<div class="background">
			<img src="../img/back.jpeg" style="height: 820px"></div>
			<a class="sidenav-close"><i class="material-icons small white-text">arrow_back</i></a>
			<a><img class="circle right" src="../img/avatar.svg"></a>
			<a><span class="white-text name"><h4><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></span></h4></a>
			<a><span class="white-text email"><?php echo $_SESSION['email']; ?></span></a>
		</div>
	</li>
	<li class="bold"><a href="dashboard.php" class="collapsible-header waves-effect" id="mobile-links">Dashboard <i class="material-icons right blue-text">home</i></a></li>	
	<li class="bold"><a class="collapsible-header waves-effect" id="mobile-links">Users <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
				<li><a href="view_user.php" class="blue-text">View Users</a></li>
				<li><a href="edit_user.php" class="blue-text">Edit User</a></li>
			</ul>
		</div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect" id="mobile-links">Category <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
				<li><a href="view_cat.php" class="blue-text">View Category</li></a>
				<li><a href="insert_cat.php" class="blue-text">Insert Category</li></a>
				<li><a href="edit_cat.php" class="blue-text">Edit Category</li></a>
			</ul>
		</div>
	</li>
	<li class="bold"><a class="collapsible-header waves-effect" id="mobile-links">Products <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
				<li><a href="insert_item.php" class="blue-text">Add Items</a></li>
				<li><a href="view_item.php" class="blue-text">View Items</a></li>
			</ul>
		</div>
	</li>
	<li><div class="divider"></div></li>
	<li class="bold active"><a class="collapsible-header waves-effect" id="mobile-links">Categories <i class="material-icons grey-text right">expand_more</i></a>
		<div class="collapsible-body">
			<ul>
				<li><a href="sell.php" class="blue-text">Sell Products</a></li>
				<li><a href="ads.php" class="blue-text">Create Ads</a></li>			
			</ul>
		</div>
	</li>
	<li class="bold"><a href="logout.php" class="collapsible-header waves-effect" id="mobile-links">Logout <i class="fa fa-power-off fa-1x right red-text" style="font-size: 15px;"></i></a></li>
</ul>


			
    



    
        
        
      