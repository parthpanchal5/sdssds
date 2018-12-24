<?php 
	include 'inc/header.php';
	include 'inc/conn.php';

		// // Validate login
		// if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		// 	header('Location: login.php');
		// 	exit;
		// }
		
?>

<!--Main navbar -->
<div class="navbar-fixed hide-on-large-only	show-on-medium-and-down	z-depth-3">
  <nav class="blue lighten-2 z-depth-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo">Shop</a>
      </div>
    </div>  
  </nav>
</div>
<?php include 'inc/mainnav.php'; ?>
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>


<!-- Content area -->
<div class="container-fluid animated fadeIn">
	<!-- Carousel Slider -->
	<div class="carousel carousel-slider" style="margin-top: 15px;">
	<?php $sql = "SELECT * FROM item ORDER BY RAND(`item_id`) DESC LIMIT 4"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
		<div class="carousel-item center" href="#one!">
			<a href="product.php?pcat=<?php echo $row[4]; ?>&pname=<?php echo $row[2]; ?>&pid=<?php echo $row[0]; ?>" data-target="_blank">
				<img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" height="550">
			</a>
		</div>
	<?php }?>
	</div>	
</div>

<div class="container-fluid animated fadeIn grey lighten-3" style="margin-top: 20px;">
	<div class="row">
		<div class="col s12 l3 xl3">
			<div class="card">
					sd
			</div>
		</div>	
		<div class="col s12 l3 xl3">
			<div class="card">
					sd
			</div>
		</div>	
		<div class="col s12 l3 xl3">
			<div class="card">
					sd
			</div>
		</div>	
		<div class="col m3 l3 right">
			<div class="card">
			<?php $sql = "SELECT * FROM `item` ORDER BY RAND() LIMIT 1;"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
        <div class="card-image">
          <img src="admin/img/<?php echo $row[3]; ?>">
        </div>
        <div class="card-content">
					<span class="card-title" style="font-size: 16px;"><?php echo $row[2]; ?></span>
          	<p class="truncate"><?php echo $row[5]; ?></p>
						<a href="product.php?pcat=<?php echo $row[4]; ?>&pname=<?php echo $row[2]; ?>&pid=<?php echo $row[0]; ?>" target="_blank">See more</a>
        </div>
      </div>
			<?php } ?>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>

				
			
		