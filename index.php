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
<div class="container-fluid grey lighten-4" >
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

	<div class="row">
		<div class="col s12 m3 l3">
		<!-- Where do this php will go  -->
		<?php $sql = "SELECT `item_id`, `item_name`, `item_img`, `item_cat`, `item_desc`, `item_price`, `item_qty`, `status` FROM item"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($conn, $result)) { ?>
			<div class="card">
        <div class="card-image">
          <img src="admin/img/<?php echo $row[3]; ?>">
          <span class="card-title"><?php echo $row[2]; ?></span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
		</div>
	<?php } ?>
	</div>

</div>


		
<?php include 'inc/footer.php'; ?>

				
			
		