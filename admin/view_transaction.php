<?php 
    include 'inc/header.php'; 
		include 'inc/conn.php';
		
		$sqlForTransactions = "SELECT 
														ord.order_details_id, ord.item_id, ord.user_id, 
														ord.price, ord.quantity, ord.discount, 
														ord.sub_total, ord.order_date, ord.shipping_date, ord.status, 
														it.item_name, 
														us.firstname, us.lastname, us.address, us.email, us.phone 
													FROM 
														order_details AS ord, item AS it, users AS us 
													WHERE ord.item_id = it.item_id AND ord.user_id = us.user_id";
		$result = mysqli_query($conn, $sqlForTransactions);
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
						<th>Transaction</th>
						<th>Item name</th>
						<th>User name</th>
						<th>Qty</th>
						<th>Subtotal</th>
					</thead>
					<tbody>
						
						<?php while($row = mysqli_fetch_array($result)) { ?>
						
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>

						<?php  } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>    
</div>

<?php include 'inc/footer.php'; ?>

        