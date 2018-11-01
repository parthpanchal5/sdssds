<?php 
    session_start();
    
    include 'inc/conn.php';

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    	header('Location:login.php');
    	exit;
	}
    if(($_SESSION['email'] != "admin@admin.com") || ($_SESSION['username'] != "admin123")){
        header('Location:login.php');
    	exit;
    }

      

?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php';?> 
 


<!-- <div class="container-fluid">
	<div class="row center-align">
		<div class="col s12 m3 l3 xl3">
			<div class="card small rounded gradient-4 z-depth-1 waves-effect waves-white lighten-2 hoverable">
				<div class="card-content">
					<span class="card-title white-text">Users</span>
					<p>Total no of users
						<h2>3622</h2>
					</p>
				</div>
			</div>
		</div>
		<div class="col s12 m3 l3 xl3">
			<div class="card small rounded gradient-1 z-depth-1 waves-effect waves-yellow lighten-2 hoverable">
				<div class="card-content">
					<span class="card-title white-text">Stocks</span>
					<p>Total no of Stocks
						<h2>3622</h2>
					</p>
				</div>
			</div>
		</div>
			<div class="col s12 m3 l3 xl3">
				<div class="card small rounded gradient-2 z-depth-1 waves-effect waves-blue hoverable">
					<div class="card-content">
						<span class="card-title white-text">Ads</span>
						<p>Total no of Ads
							<h2>3622</h2>
						</p>
					</div>
				</div>
			</div>
			<div class="col s12 m3 l3 xl3">
				<div class="card small rounded gradient-3 z-depth-1 waves-effect waves-purple lighten-2 hoverable">
					<div class="card-content">
						<span class="card-title white-text">Seller</span>
						<p>Total no of Seller
							<h2>3622</h2>
						</p>
					</div>
				</div>
			</div>
		</div>   
	</div>
</div> -->
<?php include 'inc/footer.php'; ?>

        
      
    