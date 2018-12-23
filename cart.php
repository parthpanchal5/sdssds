<?php 
	session_start();
	include 'inc/conn.php';
	
	
	// Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		header('Location: login.php');
		exit;
	}
	

?>
<?php include 'inc/cart_code.php'; ?>

<?php include	'inc/header.php'; ?>
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
									<td style="text-align:right;"></td>
									<td  style="text-align:right;"></td>
									<td  style="text-align:right;"></td>
									<td style="text-align:center;"></td>
								</tr>
						
								<tr>
									<td colspan="2" align="right">Total:</td>
									<td align="right"></td>
									<td align="right" colspan="2"><strong></strong></td>
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

		
	  
	