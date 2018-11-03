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
<div class="container">
	<div class="row center-align">
		<div class="col s12 m3 l3 xl3">
			<div class="card  rounded gradient-4 z-depth-1 waves-effect waves-white lighten-2 hoverable">
				<div class="card-content">
					<span class="card-title white-text">Users</span>
					<p><h5>Total Users</h5>
					<?php $sql = "SELECT COUNT(`user_id`) FROM users"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
						<h2 class="white-text"><?php echo $row[0]; ?></h2>
					<?php }?>
					</p>
				</div>
			</div>
		</div>
		<div class="col s12 m3 l3 xl3">
			<div class="card  rounded gradient-1 z-depth-1 waves-effect waves-yellow lighten-2 hoverable">
				<div class="card-content">
					<span class="card-title white-text">Products</span>	
					<p><h5>Total Products</h5>
					<?php $sql = "SELECT COUNT(`item_id`) FROM item"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
						<h2 class="white-text"><?php echo $row[0]; ?></h2>
					<?php }?>
					</p>
				</div>
			</div>
		</div>
			<div class="col s12 m3 l3 xl3">
				<div class="card  rounded gradient-2 z-depth-1 waves-effect waves-blue hoverable">
					<div class="card-content">
						<span class="card-title white-text">Categories</span>
						<p><h5>Total Categories</h5>
						<?php $sql = "SELECT COUNT(`cat_id`) FROM category"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
							<h2 class="white-text"><?php echo $row[0]; ?></h2>
						<?php } ?>
						</p>
					</div>
				</div>
			</div>
			<div class="col s12 m3 l3 xl3">
				<div class="card  rounded gradient-3 z-depth-1 waves-effect waves-purple lighten-2 hoverable">
					<div class="card-content">
						<span class="card-title white-text">Transactions</span>
						<p>Total Transcation
							<h4 class="white-text">3665 <i class="fa fa-rupee-sign fa-1x  white-text" style="font-size: 35px"></i></h4>
						</p>
					</div>
				</div>
			</div>
		</div>   
	</div>
</div>
<?php include 'inc/footer.php'; ?>

        
      
    