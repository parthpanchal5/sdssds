<?php 
	include 'inc/header.php';
	include 'inc/conn.php';

		// // Validate login
		// if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		// 	header('Location: login.php');
		// 	exit;
		// }
		if(isset($_GET['s'])){
			$status = mysqli_real_escape_string($conn, $_GET['s']);

			if($status == "empty"){
				unset($_SESSION['cart']);
			}
		}
		
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


<!-- Content area -->
<div class="container-fluid animated fadeIn">

	<div class="slider" style="margin-top: 10px; padding: px 0px;">
    <ul class="slides">
		
		<?php $sql = "SELECT * FROM item WHERE RAND(`item_id`) ORDER BY `created_at` DESC LIMIT 5"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	
      
			<li>
			<a href="product.php?pcat=<?php echo $row[4]; ?>&pname=<?php echo $row[2]; ?>&pid=<?php echo $row[0]; ?>" data-target="_blank">

        <img src="admin/img/<?php echo $row[3]; ?>" class="responsive-img" > <!-- random image -->
				</a>
        <div class="caption center-align">
          <h3 class="white-text"><?php echo $row[2]; ?></h3>
          <h5 class="light black-text text-lighten-3 truncate green"><?php echo $row[5];?></h5>
        </div>
      </li>
  
		<?php } ?>	


    </ul>
  </div>
</div>

<div class="container-fluid animated fadeIn" style="margin: 10px 15px;">
	<div class="row">
		<div class="card-panel">
			<h5 class="card-title">Shop by Electronics</h5>
			<div class="card-content">
				<div class="row">

				<?php $sql = "SELECT * FROM item WHERE `item_cat` = 'Electronics' ORDER BY `created_at` ASC"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	

					<div class="col s12 m6 l3 xl3">
						<div class="card-panel">
							<div class="card-image center"><a class="tooltipped"  data-position="top" data-tooltip="<?php echo $row[2]; ?>" href="product.php?pname=<?php echo $row[2]; ?>&pid=<?php echo $row[0];?>"><img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" class="responsive-img" id="search-img"></a></div>
							<div class="card-content">
								<span class="truncate"><?php echo $row[5]; ?></span><br><a href="product.php?pid=<?php echo $row[0]; ?>&pname=<?php echo $row[2]; ?>" target="_blank">Read More</a>
							</div>					
						</div>
					</div>

				<?php } ?>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="card-panel">
			<h5 class="card-title">Shop by Accessories</h5>
			<div class="card-content">
				<div class="row">

				<?php $sql = "SELECT * FROM item WHERE `item_cat` = 'Accessories' ORDER BY `created_at` DESC"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	

					<div class="col s12 m6 l3 xl3">
						<div class="card-panel">
							<div class="card-image center"><a class="tooltipped"  data-position="top" data-tooltip="<?php echo $row[2]; ?>" href="product.php?pname=<?php echo $row[2]; ?>&pid=<?php echo $row[0];?>"><img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" class="responsive-img" id="search-img"></a></div>
							<div class="card-content">
								<span class="truncate"><?php echo $row[5]; ?></span><br><a href="product.php?pid=<?php echo $row[0]; ?>&pname=<?php echo $row[2]; ?>" target="_blank">Read More</a>
							</div>					
						</div>
					</div>

				<?php } ?>

				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="card-panel">
			<h5 class="card-title">Shop by Clothes</h5>
			<div class="card-content">
				<div class="row">

				<?php $sql = "SELECT * FROM item WHERE `item_cat` = 'Clothes' ORDER BY `created_at` ASC"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>	

					<div class="col s12 m6 l3 xl3">
						<div class="card-panel">
							<div class="card-image center"><a class="tooltipped"  data-position="top" data-tooltip="<?php echo $row[2]; ?>" href="product.php?pname=<?php echo $row[2]; ?>&pid=<?php echo $row[0];?>"><img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" class="responsive-img" id="search-img"></a></div>
							<div class="card-content">
								<span class="truncate"><?php echo $row[5]; ?></span><br><a href="product.php?pid=<?php echo $row[0]; ?>&pname=<?php echo $row[2]; ?>" target="_blank">Read More</a>
							</div>					
						</div>
					</div>

				<?php } ?>

				</div>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript">
	var uri = window.location.toString();
	if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			window.history.replaceState({}, document.title, clean_uri);
	}

	ScrollReveal({ reset: true });
</script>

<?php include 'inc/footer.php'; ?>

				
			
		