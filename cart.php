<?php 
	
	include	'inc/header.php';
	include 'inc/conn.php';

	
	if(isset($_GET['action'])){
		$cartAction = mysqli_real_escape_string($conn, $_GET['action']);

    // Add to cart
    if($cartAction == "add"){

			if(isset($_POST['add_to_cart'])){
				if(isset($_SESSION['cart'])){
					$item_array_id = array_column($_SESSION['cart']. "item_id");
					if(!in_array($_GET['pid'], $item_array)){
						$count = count($_SESSION['cart']);
						$item_array = array(
							'item_id' => $_GET['pid'],
							'item_name' => $_POST['hidden_name'],
							'item_price' => $_POST['hidden_price'],
							'item_img' => $_POST['hidden_img'],
							'discount' => $_POST['hidden_discount'],
							'quantity' => $_POST['quantity']
						);
						$_SESSION['cart'][$count] = $item_array;
					}else{
						echo '<script>alert("Item already added");</script>';
						// echo '<script>window.location="cart.php";</script>';
					}
				}else{
					$item_array = array(
						'item_id' => $_GET['pid'],
						'item_name' => $_POST['hidden_name'],
						'item_price' => $_POST['hidden_price'],
						'item_img' => $_POST['hidden_img'],
						'discount' => $_POST['hidden_discount'],
						'quantity' => $_POST['quantity']
					);
					$_SESSION['cart'][0] = $item_array;
				}
			}
		} 
		
		// Remove 
		if($cartAction == "remove"){
			foreach($_SESSION['cart'] as $key => $value){
				if($value['item_id'] == $_GET['pid']){
					unset($_SESSION['cart'][$key]);
				}
			}
		}
	}
	// Empty cart img
	if(empty($_SESSION['cart'])){
		$emptyCartImg = '<tr><td colspan="6"><img src="img/empty-cart.png" height="350" style="margin: 20px 0px;"/><h5>It seems your cart is empty</h5><br><a href="index.php" class="btn blue darken-1" style="margin-bottom: 30px;">Shop something <i class="fa fa-cart-arrow-down"></i></a></tr>';
	}
	
	
		
	// Validate login
  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	// 	header('Location: login.php');
	// 	exit;
	// }
	
?>

<!--Main navbar-->
<?php include 'inc/mainnav.php'; ?>

<!--Content area -->
<div class="container-fluid lighten-4 animated fadeIn" style="margin: 0px 10px 0px 10px;">
  <div class="row" style="margin-top: 10px;">
		<div class="col s12 m12 l8">
			<div class="card">
				<div class="card-content">
					<h4 class="center">My Cart</h4>
					<table class="table">
						<thead>
							<th><h6>Item</h6></th>
							<th><h6>Name</h6></th>
							<th><h6>Qty</h6></th>
							<th><h6>Price</h6></th>
							<th><h6>Discount</h6></th>
							<th><h6>Total</h6></th>
							<th>Action</th>
						</thead>
						<tbody>
							
						<?php echo $emptyCartImg; ?>
							<?php 
							if(!empty($_SESSION['cart'])){
								$total = 0;
								foreach ($_SESSION['cart'] as $key => $value) {
							?>
							
							<tr>
								<td><img src="admin/img/<?php echo $value['item_img']; ?>" class="circle" alt="<?php echo $value['item_name']; ?>" style="width: 120px; height: 120px;"></td>
								<td><?php echo $value['item_name']; ?></td>
								<td><?php echo $value['quantity']; ?></td>
								<td><i class="fas fa-rupee-sign" style="margin-right: 5px;"></i><?php echo number_format($value['item_price']); ?></td>
								<td><?php echo '<i class="fas fa-rupee-sign" style="margin-right: 5px;"></i>'. number_format($value['discount'], 1); ?> %</td>

								<td><i class="fas fa-rupee-sign" style="margin-right: 5px;"></i><?php $sp = $value['item_price'] - ($value['item_price'] * ($value['discount'] / 100)); echo number_format($sp); ?></td>
								<td><a href="cart.php?action=remove&pid=<?php echo $value['item_id']; ?>" class="btn-floating waves-effect btn-small red"><i class="material-icons">remove</i></a></td>
							</tr>
							
							<?php $total = $total + ($value['quantity'] * $sp); 
								} 
							?>
							
							<tr>
								<td colspan="3"><h5 class="right">Total:</h5></td>
								<td colspan="5"><h5><i class="fa fa-rupee-sign" style="margin-right: 5px;"></i><?php echo number_format($total, 2); ?></h5></td>
							</tr>
							
							<?php  }	?>
						
						</tbody>
					</table>	
					<div class="card-action">
						<table class="table">

							<?php if(!empty($_SESSION['cart']) && $_SESSION['user_id'] != ''): ?>
							
							<tr>
								<td class="right">
									<form action="checkout.php" method="POST">
										<a href="index.php" class="btn btn-large grey lighten-5 black-text" style="margin-right: 20px;"><i class="fas fa-chevron-left" style="font-size: 15px; margin-right: 10px;"></i> Continue Shopping</a>
										<input type="submit" value="place order" class="btn btn-large  amber darken-4">
									</form>
								</td>

								<?php elseif(empty($_SESSION['user_id'])) :?>
								
								<td class="right">
									<a href="login.php" class="btn btn-small blue z-depth-2 hoverable">Login</a>
								</td>

							</tr>


								<?php endif; ?>

						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col s12 m12 l4">
		
		<?php if(!empty($_SESSION['cart'])) { ?>

			<div class="card hoverable">
				<div class="card-content">
					<table class="table">
						<tr>
							<td class="left grey-text" style="font-size: 18px; text-transform:uppercase;">Price Details</td>
						</tr>
						<tr>
							<td class="left" style="font-size: 15px;">Price (<span><?php echo count($_SESSION['cart']); ?></span> item)</td>
							<td class="right" style="font-size: 15px;"><p><i class="fa fa-rupee-sign" style="margin-right: 5px;"></i><?php echo number_format($total, 2); ?></p></td>
						</tr>
						<tr>
							<td class="left">Amount payable</td>
							<td class="right" style="font-size: 15px;"><p><i class="fa fa-rupee-sign" style="margin-right: 5px;"></i><?php echo number_format($total, 2); ?></p></td>
						</tr>
					</table>	
				</div>
			</div>
		</div>

		<?php } ?>
	
	</div>
</div>

<!--Footer  -->
<?php include 'inc/footer.php'; ?>

		
	  
	