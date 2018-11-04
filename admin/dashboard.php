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


<div id="card-stats" style="margin-top: 20px;">
	<div class="row">
		<div class="col s12 m6 l3">
			<div class="card gradient-4 z-depth-1 hoverable center-align">
				<div class="card-content white-text">
					<p class="card-stats-title"><i class="fa fa-user-plus" style="margin-right: 5px;"></i> New Users</p>
					<?php $sql = "SELECT COUNT(`user_id`) FROM users"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
					<h4 class="card-stats-number"><?php echo $row[0]; ?></h4>
					<?php } ?>
				</div>			
			</div>
		</div>
    <div class="col s12 m6 l3">
			<div class="card gradient-1 z-depth-1 hoverable center-align">
				<div class="card-content white-text">
					<p class="card-stats-title"><i class="fa fa-shopping-cart" style="margin-right: 5px;"></i> Total Products</p>
					<?php $sql = "SELECT COUNT(`item_id`) FROM item"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
					<h4 class="card-stats-number"><?php echo $row[0]; ?></h4>
					<?php } ?>
				</div>			
			</div>
		</div>                                                   
		<div class="col s12 m6 l3">
			<div class="card gradient-2 hoverable z-depth-1 center-align">
				<div class="card-content white-text">
					<p class="card-stats-title"><i class="fa fa-user-plus" style="margin-right: 5px;"></i> New Users</p>
					<?php $sql = "SELECT COUNT(`cat_id`) FROM category"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
					<h4 class="card-stats-number"><?php echo $row[0]; ?></h4>
					<?php } ?>
				</div>			
			</div>
		</div>
		<div class="col s12 m6 l3">
			<div class="card z-depth-1 hoverable gradient-5 center-align">
				<div class="card-content white-text">
					<p class="card-stats-title"><i class="fa fa-user-plus" style="margin-right: 5px;"></i> New Users</p>
					<?php $sql = "SELECT COUNT(`user_id`) FROM users"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
					<h4 class="card-stats-number"><?php echo $row[0]; ?></h4>
					<?php } ?>
				</div>			
			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>

        
      
    