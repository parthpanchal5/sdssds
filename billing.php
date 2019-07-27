<?php 
	session_start();
	if(!isset($_SESSION['email']) || empty($_SESSION['email'] || empty($_SESSION['user_id']))){
		header('Location: index.php');
		// exit;
	}
	include 'inc/header.php'; 
	include 'inc/conn.php';
	include 'inc/mainnav.php';

	// if(!isset($_SESSION['user_id']) || empty($_SESSION['email'])){
	// 	header('Location:index.php');
	// }
  $curUser = $_SESSION['user_id'];
  
  if(isset($_GET['t_status'])){
    // $user_id = ;
    $status = mysqli_real_escape_string($conn, $_GET['t_status']);
    
    if($status == "k"){
      echo $successMsg = ' <div class="col s12 m12 l12 xl12">
			<div class="card-panel center gradient-2 animated fadeIn" style="padding-bottom: 50px !important;"><h2 class="center white-text animated fadeInUp">Purchased Successfully</h2>
			<h5 class="center  white-text animated fadeIn">Thanks for Shopping with us</h5><br>
			<a href="index.php?s=empty" class="btn btn-small blue">Continue Shopping <i class="fa fa-shopping-cart"></i></a>	</div> 
      </div>';
    }
  }
  // Payment Success
  $sql = "SELECT
  od.order_details_id,
  od.item_id,
  od.user_id,
  od.bill_no,
  od.price,
  od.quantity,
  od.discount,
  od.sub_total,
  od.order_date,
  od.shipping_date,
  it.item_name
FROM
  order_details AS od,
  item AS it
WHERE
  od.user_id = '$curUser' AND od.item_id = it.item_id
ORDER BY
  `shipping_date`
DESC";

  $result = mysqli_query($conn, $sql);

?>




<div class="container-fluid" style="margin: 10px 10px;">
  <div class="row">		
    <div class="col s12 m6 l6 xl6">
      <div class="card-panel">
        <div class="card-content">
          <table class="table striped responsive-table">
            <thead>
        <h6 class="card-title">Bill No: <span class="right">#100</span></h6> <hr>

              <tr>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Order Dt</th>
                <th>Shipping Dt</th>
                <th>Tot.</th>
              </tr>
            </thead>
            <tbody>

            <?php if($result) { while($row = mysqli_fetch_array($result)) { ?>
            
              <tr>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><i class="fa fa-rupee-sign"></i> <?php echo $row['price']; ?> </td>
                <td><?php echo $row['discount']; ?>%</td>
                <td><?php echo $date = date('d-M-y',  strtotime($row['order_date'])); ?></td>
                <td><?php echo $date = date('d-M-y',  strtotime($row['shipping_date'])); ?></td>
                <td><?php echo $row['sub_total']; ?></td>
              </tr>
						
							<?php 
								 $sp = $row['item_price'] - ($row['item_price'] * ($row['discount'] / 100)); 
								 $total = $row['sub_total'] + ($row['quantity'] * $sp); ?>
						<?php } ?>
							
          <?php  } ?>
        
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <div class="col s12 m6 l6 xl6">
			<div class="card-panel">
				<h6 class="card-title">Delivery Info: <span class="right"></span></h6> <hr>
				<table class="table">
          <tbody>
					    
          <?php $sqlForUser = "SELECT us.firstname, us.lastname, us.email, us.address, us.phone, od.shipping_date FROM users AS us, order_details AS od WHERE us.user_id = '".$_SESSION['user_id']."' AND od.user_id = us.user_id LIMIT 1"; $resultForUser = mysqli_query($conn, $sqlForUser); while($row = mysqli_fetch_array($resultForUser)) { ?>     
            
            <tr>
              <td class="grey lighten-3">Name</td>
							<td class="left-align white"><?php echo $row[0]." ".$row[1]; ?></td>
						</tr>
            
            <tr>
              <td class="grey lighten-3">Address</td>
							<td class="left-align white"><?php echo $row[3]; ?></td>
            </tr>
							
            <tr>
              <td class="grey lighten-3">Phone <i class="fa fa-phone fa-flip-horizontal" aria-hidden="true"></i></td>
							<td class="left-align white"><?php echo $row[4]; ?> </td>
            </tr>
            	
            <tr>
              <td class="grey lighten-3">Email <i class="fa fa-at"></i></td>
							<td class="left-align white"><?php echo $row[2]; ?></td>
            </tr>
                        
					<?php } ?>

          </tbody>
				</table>
			</div>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
	var uri = window.location.toString();
	if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			window.history.replaceState({}, document.title, clean_uri);
	}
</script> -->

<?php include 'inc/footer.php'; ?>