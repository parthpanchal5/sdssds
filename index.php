<?php 
	session_start();
  include 'inc/conn.php';

  	// Validate login
  	if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    	header('Location: login.php');
    	exit;
  	}
		
?>
<?php 
	include 'logcode.php';
	include 'inc/header.php'; 
?>
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
</div>

</div>
    
<?php include 'inc/footer.php'; ?>

        
      
    