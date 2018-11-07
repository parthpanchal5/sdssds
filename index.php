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
<?php include 'inc/mainnav.php'; ?>
	
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>


<!-- Content area -->
<div class="container-fluid animated fadeIn">
	<div class="carousel carousel-slider center" style="">
		<div class="carousel-item white-text" href="#one!">
		<img src="img/products/laptop.jpeg" alt="">
		</div>
		<div class="carousel-item white-text" href="#two!">
			<img src="img/products/laptop.jpeg" alt="">
		</div>
		<div class="carousel-item white-text" href="#three!">
		<img src="img/products/laptop.jpeg" alt="">
		</div>
		<div class="carousel-item white-text" href="#four!">
			<img src="img/products/laptop.jpeg" alt="">
		</div>
	</div>	
	<?php $sql = "SELECT * FROM item ORDER BY item_id DESC LIMIT 4"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
<div class="row product-showcase animated fadeInUp" style="margin-top: 1em;">
	<div class="col s12 m6 l6">
		<div class="card hoverable">
			<div class="card-image">
				<img src="admin/img/<?php echo $row[3]; ?>" class="materialboxed responsive-img">
			</div>
			<div class="card-content">
				<span class="card-title black-text"style="font-size: 14px !important;"><?php echo $row[2]; ?></span>
				<p><b><h6>Description:</h6></b> <?php echo $row[5]; ?></p>
				<p class="right"><b><h6>Price:</h6></b> <?php echo $row[6]; ?></p>
			</div>
			<div class="card-action">
				<a href="#" class="btn btn-small">Add to Cart</a>
			</div>
		</div>
	</div>
	<!-- <div class="col s12 m6 l6">
		<div class="card sticky-action" style="overflow: visible;">
			<div class="card-image waves-effect waves-block waves-light">
				<img src="admin/img/<?php echo $row[3]; ?>" class="activator">
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>

				<p><a href="#!">This is a link</a></p>
			</div>

			<div class="card-action">
				<a href="#">This is a link</a>
				<a href="#">This is a link</a>
			</div>

			<div class="card-reveal" style="display: none; transform: translateY(0%);">
				<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
				<p>Here is some more information about this product that is only revealed once clicked on.</p>
			</div>
		</div>
	</div> -->
	<div class="col s12 m6 l6">
		<div class="card hoverable">
			<div class="card-image">
				<img src="admin/img/<?php echo $row[3]; ?>" class="materialboxed responsive-img">
			</div>
			<div class="card-content">
			<span class="card-title black-text"><?php echo $row[2]; ?></span>
				<p><b><h6>Description:</h6></b> <?php echo $row[5]; ?></p>
				<p class="right"><b><h6>Price:</h6></b> <?php echo $row[6]; ?></p>
			</div>
			<div class="card-action">
				<a href="#" class="btn btn-small">Add to Cart</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php include 'inc/footer.php'; ?>

				
			
		