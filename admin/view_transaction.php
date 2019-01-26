<?php 
    include 'inc/header.php'; 
    include 'inc/conn.php';
?>
<?php include 'inc/horizonnav.php'; ?>       

<div class="container-fluid">
	<h4 class="center">Transactions</h4>

	<?php $sql = "SELECT COUNT(`order_details_id`) FROM order_details"; $result1 = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result1)) { ?>

    <p class="center">Total no of Transactions: <h5 class="center"><?php echo $row[0]; ?></h5></p>

  <?php } ?>	

	<div class="row">
		<div class="col s12 m12 l12 xl12" id="content">
			<div class="card-panel">
				<table class="table">
					<thead>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</thead>
				</table>
			</div>
		</div>
	</div>    
</div>

<?php include 'inc/footer.php'; ?>

        