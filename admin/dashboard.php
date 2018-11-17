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


<div id="card-stats" style="margin-top: 20px;" class="animated ">
	<div class="row">
		<div class="col s12 m6 l3">
			<div class="card gradient-4 z-depth-1 hoverable center-align">
				<div class="card-content white-text">
					<p class="card-stats-title"><i class="fa fa-user-plus" style="margin-right: 5px;"></i> Total Users</p>
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
					<p class="card-stats-title"><i class="fa fa-list-ul" style="margin-right: 5px;"></i> Total Categories</p>
					<?php $sql = "SELECT COUNT(`cat_id`) FROM category"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
					<h4 class="card-stats-number"><?php echo $row[0]; ?></h4>
					<?php } ?>
				</div>			
			</div>
		</div>
		<div class="col s12 m6 l3">
			<div class="card z-depth-1 hoverable gradient-5 center-align">
				<div class="card-content white-text">
					<p class="card-stats-title"><i class="fa fa-chart-bar" style="margin-right: 5px;"></i> Total Sales</p>
					<?php $sql = "SELECT COUNT(`user_id`) FROM users"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
					<h4 class="card-stats-number"><?php echo $row[0]; ?></h4>
					<?php } ?>
				</div>			
			</div>
		</div>
	</div>
</div>

<!--Messaging card-->
<?php 	
	// Delete
	if(isset($_GET['d'])){
		$id = $_GET['d'];
		mysqli_query($conn, "DELETE FROM contact_us WHERE contact_id = $id");
		header("Location:dashboard.php");
	}
		
	$sql = "SELECT `contact_id`, `user_email`, `message`, `sent_date` FROM contact_us ORDER BY `sent_date` DESC LIMIT 5";
	$result = mysqli_query($conn, $sql);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col s12 m6 l6 xl6">
			<div class="card-panel hoverable">
				<div class="card-title center" style="font-size: 18px;">New Messages</div><hr>
					<div class="card-content">
						<table class="table striped highlight responsive-table">
							<thead class=left-align>
								<th>Sender</th>
								<th>Message</th>
								<th>Action</th>
							</thead>
							<tbody>
							<?php while ($row = mysqli_fetch_array($result)) { ?>
								<tr>
									<td><?php echo $row[1]; ?></td>
									<td style="text-align:center;"><?php echo $row[2]; ?></td>
									<td>
                		<a href="dashboard.php?d=<?php echo $row[0]; ?>" id="deleteBtn" class="red-text"><i class="fa fa-trash"></i></a>
              		</td>
								</tr>
							<?php }?>
							</tbody>
						</table>	
					</div>
			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>

        
      
    