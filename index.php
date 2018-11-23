<?php 
	session_start();
	include 'inc/conn.php';

		// Validate login
		if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
			header('Location: login.php');
			exit;
		}
		
?>
<?php include 'inc/header.php'; ?>
<!--Main navbar -->
<div class="navbar-fixed hide-on-large-only	show-on-medium-and-down	z-depth-3">
  <nav class="blue lighten-2 z-depth-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Shop</a>
      </div>
    </div>  
  </nav>
</div>
<?php include 'inc/mainnav.php'; ?>
<!-- <div class="navbar-fixed hide-on-large-only	show-on-medium-and-down">
  <nav class="white lighten-2 z-depth-1">
    <div class="container">
      <div class="nav-wrapper">				
      </div>
    </div>  
  </nav>
</div>	 -->
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>


<!-- Content area -->
<div class="container-fluid animated fadeIn">
	<!-- Carousel Slider -->
	<div class="carousel carousel-slider" style="margin-top: 15px;">
	<?php $sql = "SELECT * FROM item ORDER BY RAND(`item_id`) DESC LIMIT 4"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
		<div class="carousel-item center" href="#one!">
			<a href="product.php?pid=<?php echo $row[0]; ?>" data-target="_blank">
				<img src="admin/img/<?php echo $row[3]; ?>" alt="" height="550">
			</a>
		</div>
	<?php }?>
	</div>	
	
	<?php $sql = "SELECT * FROM item ORDER BY item_id DESC LIMIT 4"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
	<div class="row product-showcase" style="margin-top: 1em;">
		<div class="col s12 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating btn-small right blue"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="product.php?pid=<?php echo $row[0]; ?>" class="btn btn-small">See More <i class="fa fa-eye"></i></a>
					<a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating btn-small right blue"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
				<a href="product.php?pid=<?php echo $row[0]; ?>" class="btn btn-small">See More <i class="fa fa-eye"></i></a>
					<a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating btn-small right blue"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="product.php?pid=<?php echo $row[0]; ?>" class="btn btn-small">See More <i class="fa fa-eye"></i></a>
					<a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating btn-small right blue"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="product.php?pid=<?php echo $row[0]; ?>" class="btn btn-small">See More <i class="fa fa-eye"></i></a>
					<a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

<?php include 'inc/footer.php'; ?>

				
			
		