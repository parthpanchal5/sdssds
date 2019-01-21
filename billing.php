<?php 
	session_start();
	include 'inc/header.php'; 
	include 'inc/conn.php';
	include 'inc/mainnav.php';
  

  // echo "Payment Success";
  $sql = "SELECT * FROM `order_details` WHERE `user_id` = '".$_SESSION['user_id']."'";
  $result = mysqli_query($conn, $sql);

?>




<div class="container-fluid" style="margin: 10px 10px;">
  <div class="row">
    
    <div class="col s12 m6 l6 xl6">
      <div class="card-panel">
        <h6 class="card-title">Bill No: <span class="right">#100</span></h6> <hr>
        <div class="card-content">
          <table class="table striped responsive-table">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>

              <?php 
                if($result){

                  while($row = mysqli_fetch_array($result)) { 

              ?>
            
              <tr>
                <td><?php echo $row['item_id']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><i class="fa fa-rupee-sign"></i> <?php echo $row['price']; ?> </td>
                <td><?php echo $row['discount']; ?>%</td>
                <td><?php echo $row['sub_total']; ?></td>
              </tr>
							
							  <?php } ?>

								<td colspan="4" class="right-align">Sub Total:</td>
								<td class="green lighten-5 animated fadeIn"><i class="fa fa-rupee-sign"></i> <?php echo $row['subtotal']; ?></td>
							</tr>
              <?php }?>
        
            </tbody>
          </table>
        </div>


      </div>
    </div>
    
    <div class="col s12 m6 l6 xl6">
			<div class="card-panel">
				<h6 class="card-title">Delivery Info: <span class="right"></span></h6> <hr>
					<table class="table">
					
					<?php $sqlForUser = "SELECT * FROM users RIGHT JOIN order_details ON users.user_id = order_details.user_id WHERE `user_id` = '".$_SESSION['user_id']."'"; $resultForUser = mysqli_query($conn, $sqlForUser); while($row = mysqli_fetch_array($resultForUser)) { ?>
						
						<tr>
							<th class="grey lighten-3">Name</th>
							<td class="left-align white"><?php echo $row[1]." ".$row[2]; ?></td>
						</tr>
						<tr>
							<th class="grey lighten-3">Address</th>
							<td class="left-align white"><?php echo $row[4]; ?></td>
						</tr>
						<tr>
							<th class="grey lighten-3">Phone <i class="fa fa-phone fa-flip-horizontal" aria-hidden="true"></i></th>
							<td class="left-align white"><?php echo $row[6]; ?> </td>
						</tr>
						<tr>
							<th class="grey lighten-3">Email <i class="fa fa-at"></i></th>
							<td class="left-align white"><?php echo $row[3]; ?></td>
						</tr>
            <tr>
							<th class="grey lighten-3">Billing Dt: </th>
							<td class="left-align white"><?php echo $date = date('d-M-Y', strtotime($row[8])); ?></td>
						</tr>
            <tr>
							<th class="grey lighten-3">Delivery Dt: </th>
							<td class="left-align white"><?php echo $date = date('d-M-Y', strtotime($row[8])); ?></td>
						</tr>

					<?php } ?>
					
					</table>
			</div>
    </div>

  </div>
</div>
<?php include 'inc/footer.php'; ?>