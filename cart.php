<?php 
	session_start();
  include 'inc/conn.php';
  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header('Location: login.php');
	exit;
  } 
?>
<?php include 'inc/header.php'; ?>

<!--Main navbar-->
<?php include 'inc/mainnav.php'; ?>

<!--Mobile navbar -->
<?php include 'inc/mobilenav.php'; ?>
<!--Content area -->
<div class="container-fluid lighten-4" style="margin: 0px 30px 0px 30px;">
  <div class="row" style="margin-top: 10px;">
		<div class="col s12 m12 l8">
			<div class="card">
				<div class="card-content">
					<table class="table responsive-table">
						<tr>
							<td colspan="3"><span class="left" style="font-size: 16px;">My Cart ( 1 )</span></td>
						</tr>
						<tbody>
							<!-- <tr>
								<td><img src="img/phone.svg" alt="" height="120"></td>
								<td>
									Lorem ipsum dolor sit amet consectetur.... <br>
									<span class="left" style="margin-left: 25px; margin-top: 25px; font-size: 18px;"><i class="fas fa-rupee-sign"></i> 650</span>
								</td>
								<td style="margin-right: 18px;">Delivery by Mon, Nov 19 | Free</td>
							</tr>
							<tr>
								<td colspan="3" style="text-align:left;">
									<form action=""  style="margin-left: 35px;">
										<a class="btn-floating btn-small waves-effect waves-light grey lighten-3" id="removeBtn"><i class="material-icons black-text">remove</i></a>
										<input type="number" name="qty" id="qty-input" min="1" max="5">
										<a class="btn-floating btn-small waves-effect waves-light grey lighten-3" id="addBtn"><i class="material-icons black-text">add</i></a>
										<input type="submit" value="Remove" name="remove" class="grey lighten-4 btn black-text" style="margin-left: 3em;">
									</form>
								</td>
							</tr> -->
							<tr>
								<td><img src="img/empty-cart.png" class="responsive-img" alt="" id="empty-cart-img"></td>
							</tr>
						</tbody>
					</table>	
					<div class="card-action">
						<table class="table">
							<tr>
								<td class="right">
									<form action="#" method="POST">
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

		
	  
	