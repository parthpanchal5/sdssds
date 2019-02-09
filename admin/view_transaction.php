<?php 
    include 'inc/header.php'; 
		include 'inc/conn.php';
		
  
  

		// Define results per page
		$resultPerPage = 10;

		$sql2 = "SELECT * FROM order_details";
		$result2 = mysqli_query($conn, $sql2);
		$noOfResults = mysqli_num_rows($result2);
	
	
		// Determine no of total pages available
		$noOfPages = ceil($noOfResults / $resultPerPage);
	
		// Determine which page number visitor is on
		if (!isset($_GET['page'])) {
			$page = 1;
		}else{
			$page = $_GET['page'];
		}
	
		// Determine sql LIMIT starting no for result on the displaying page
		$startingLimitNo = ($page - 1) * $resultPerPage;	
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
				<div class="card-content">
					<table class="table striped highlight responsive-table">
						<thead class="gradient-5 white-text">
							<th>Transaction ID</th>
							<th>Item name</th>
							<th>Qty</th>
							<th>Subtotal</th>
							<th>User name</th>
							<th class="left-align">Address</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Order Dt</th>
							<th>Shipping Dt</th>
							<th>Status</th>
						</thead>
						<tbody class="animated fadeIn">
						
							<?php 
								$sqlForTransactions = "SELECT 
															ord.order_details_id, ord.item_id, ord.user_id, 
															ord.price, ord.quantity, ord.discount, 
															ord.sub_total, ord.order_date, ord.shipping_date, ord.status, 
															it.item_name, 
															us.firstname, us.lastname, us.address, us.email, us.phone 
														FROM 
															order_details AS ord, item AS it, users AS us 
														WHERE ord.item_id = it.item_id AND ord.user_id = us.user_id
														ORDER BY `order_date` DESC LIMIT ". $startingLimitNo .','. $resultPerPage .";";

											$result = mysqli_query($conn, $sqlForTransactions); 
											while($row = mysqli_fetch_array($result)) { 
							?>
							
							<tr>
								<td><?= $row['order_details_id']; ?></td>
								<td class="center-align"><?= $row['item_name']; ?></td>
								<td><?= $row['quantity']; ?></td>
								<td><?= $row['sub_total']; ?></td>
								<td><?= $row['firstname']." ".$row['lastname']; ?></td>
								<td class="left-align"><?= $row['address']; ?></td>
								<td><?= $row['email']; ?></td>
								<td><?= $row['phone']; ?></td>
								<td><?php echo $orddate = date('d-M-y', strtotime($row['order_date']));  ?></td>
								<td><?php echo $shipdate = date('d-M-y', strtotime($row['shipping_date']));  ?></td>
								<td><?php echo $row['status']; ?></td>
							</tr>

							<?php  } ?>

						</tbody>
					</table>
				</div>
				
				<div class="card-action">
					<?php 
						echo "<ul class='pagination center-align' id='page-container'>";
							for ($page=1; $page <= $noOfPages; $page++) { 
							echo "<li class='waves-effect  pagination-links '>";
								echo '<a class="green-text" href="view_transaction.php?page='.$page.'">' . $page ." . ". '</a>';
							echo "</li>";
						}
						echo "</ul>";
					?>
				</div>
			</div>
		</div>
	</div>    
</div>

<?php include 'inc/footer.php'; ?>

        