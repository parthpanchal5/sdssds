<?php 
	
	include	'inc/header.php';
	include 'inc/conn.php';
	
	if(isset($_GET['action'])){
    $cartAction = mysqli_real_escape_string($conn, $_GET['action']);
    
    // Add
    if($cartAction === "add"){

      $sqlForAdd = "INSERT INTO cart (cart_id, product_id, user_id) values ('')";
      
			echo "added";
      
    }

    // Remove
    else if($cartAction === "remove"){
      echo "product removed";
      
    }

    // Empty
    else if($cartAction === "empty"){
			$sqlForDeletinAllItemsInCart = "DELETE FROM cart WHERE cart_id = '$cartAction'";
			$resultForDel = mysqli_query($conn, $sqlForDeletinAllItemsInCart);
			
			print_r($sqlForDeletinAllItemsInCart);
			echo "<br>cart emptied";


    }
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
<div class="container-fluid lighten-4 animated fadeIn" style="margin: 0px 30px 0px 30px;">
  <div class="row" style="margin-top: 10px;">
		<div class="col s12 m12 l8">
			<div class="card">
				<div class="card-content">
					<table class="table responsive-table">
						<tr>
							<td><span class="left" style="font-size: 16px;">My Cart ( 1 )</span></td>
							<td><a href="cart.php?action=empty" class="btn btn-small red right">Empty cart</a></td>
						</tr>
					
						<tbody>
							
						
								<tr>
									<td><img src="admin/img/<?php echo $item['image']; ?>" alt=""></td>
									<td style="text-align:right;"><a href="cart.php?action=remove" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></td>
									<td  style="text-align:right;"></td>
									<td  style="text-align:right;"></td>
									<td style="text-align:center;"></td>
								</tr>
						
								<tr>
									<td colspan="2">Total:</td>
									<td></td>
									<td colspan="2"><strong></strong></td>
								</tr>
								
							
								<td><img src="img/empty-cart.png" class="responsive-img" alt="emptycart" id="empty-cart-img"></td>
									
							</tr>
						</tbody>
					</table>	
					<div class="card-action">
						<table class="table">
							<tr>
								<td class="right">
									<form action="checkout.php" method="POST">
										<a href="index.php" class="btn btn-large grey lighten-5 black-text" style="margin-right: 20px;"><i class="fas fa-chevron-left" style="font-size: 15px; margin-right: 10px;"></i> Continue Shopping</a>
										<input type="submit" value="place order" class="btn btn-large  amber darken-4">
									</form>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m12 l4">
			<div class="card hoverable">
				<div class="card-content">
					<table class="table">
						<tr>
							<td class="left grey-text" style="font-size: 18px; text-transform:uppercase;">Price Details</td>
						</tr>
						<tr>
							<td class="left" style="font-size: 15px;">Price (2 item)</td>
							<td class="right" style="font-size: 15px;"><i class="fas fa-rupee-sign"></i> 650</td>
						</tr>
						<tr>
							<td class="left">Delivery Charges</td>
							<td class="right"><span class="green-text" style="font-size: 15px; text-transform:uppercase;">Free</span></td>
						</tr>
						<tr>
							<td class="left">Amount payable</td>
							<td class="right" style="font-size: 15px;"><i class="fas fa-rupee-sign"></i> 650</td>
						</tr>
						<tr>
							<td class="center green-text" style="text-transform:uppercase;">Your Total savings on this order <i class="fas fa-rupee-sign" style="margin-left: 5px;"></i> 120</td>
						</tr>
					</table>	
				</div>
			</div>
		</div>
  </div>
</div>
<!--Footer  -->
<?php include 'inc/footer.php'; ?>

		
	  
	