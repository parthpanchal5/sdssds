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
	
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>


<!-- Content area -->
<div class="container-fluid animated fadeIn">

	<div class="carousel carousel-slider" style="">
	<?php $sql = "SELECT * FROM item ORDER BY item_id ASC LIMIT 1"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
		<div class="carousel-item white-text" href="#one!">
			<img src="admin/img/<?php echo $row[3]; ?>" alt="" height="550">
		</div>
		<div class="carousel-item white-text" href="#two!">
		<img src="admin/img/<?php echo $row[3]; ?>" alt="" height="550">
		</div>
		<div class="carousel-item white-text" href="#three!">
		<img src="admin/img/<?php echo $row[3]; ?>" alt="" height="550">
		</div>
		<?php }?>
	</div>	
	
	<?php $sql = "SELECT * FROM item ORDER BY item_id DESC LIMIT 4"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
	<div class="row product-showcase animated fadeInUp" style="margin-top: 1em;">
		<div class="col s6 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating pulse right blue lighten-3"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="#" class="btn btn-block btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
		<div class="col s6 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating pulse right blue lighten-3"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="#" class="btn btn-block btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
		<div class="col s6 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating pulse right blue lighten-3"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="#" class="btn btn-block btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
				<div class="card-reveal" style="display: none; transform: translateY(0%);">
					<span class="card-title grey-text text-darken-4"><?php echo $row[2]; ?><i class="material-icons right">close</i></span>
					<p><h6>Description:</h6><br>	<?php echo $row[5]; ?></p>
					<p><h6>Price: </h6><?php echo $row[6]; ?> <i class="fa fa-rupee-sign"></i></p>
				</div>
			</div>
		</div>
		<div class="col s6 m6 l3 xl3">
			<div class="card sticky-action" style="overflow: visible;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="admin/img/<?php echo $row[3]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row[2]; ?><a class="btn-floating pulse right blue lighten-3"><i class="material-icons">expand_less</i></a></span>
				</div>
				<div class="card-action">
					<a href="#" class="btn btn-block btn-small orange lighten-1">Add to Cart <i class="fa fa-shopping-cart"></i></a>
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

				
			
		