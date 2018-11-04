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
<div class="container-fluid lighten-4">
  <div class="row" style="margin-top: 20px;">
	<div class="col s12 l1"></div>
		<div class="col s12 m12 l6">
			<div class="card hoverable">
				<div class="card-content">
					<div class="card-title center-align">
						Cart Items
					</div><hr>
					<table class="table responsive-table striped centered">
						<thead>
							<th>Sr.no</th>
							<th>Prod Img</th>
							<th>Desc.</th>
							<th>Qty</th>
							<th>Price (<i class="fa fa-rupee-sign fa-1x" style="margin-left:px;"></i>)</th>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td><img src="img/phone.svg" style="width: 100px; height: 100px;"></td>
								<td>Samsung Phone </td>
								<td>
									<form>
										<a class="btn-floating btn-small waves-effect waves-light blue lighten-2"><i class="material-icons">add</i></a>
											<input type="text" name="qty" id="qty-input" min="0" max="10">
										<a class="btn-floating btn-small waves-effect waves-light green lighten-2"><i class="material-icons">remove</i>
									</form>
								</td>
								<td>35000</td>
							</tr>
							<tr>
								<td>2.</td>
								<td><img src="img/phone.svg" class="thumbnail responsive-img" style="width: 100px; height: 100px;"></td>
								<td>Lorem, ipsum </td>
								<td>
									<form action="">
										<button type="button" class="btn-floating btn-small waves-effect waves-light blue lighten-2" id="addBtn"><i class="material-icons">add</i></button>
											<input type="text" name="qty" class="small" id="qty-input" style="text-align:center;">
										<button type="button" class="btn-floating btn-small waves-effect waves-light red lighten-1" id="removeBtn"><i class="material-icons">remove</i></button>
									</form>
								</td>
								<td>35000</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col s12 m12 l4 x4">
			<div class="card hoverable">
				<div class="card-content">
					<div class="card-title center-align">Checkout Bill</div><hr>
						<table class="table stripped centered">
							<thead>
								<th>Total Qty</th>
								<th>Price (<i class="fa fa-rupee-sign fa-1x"></i>)</th>
							</thead>
							<tbody>
								<tr>
									<td>x 2</td>
									<td>35000 <i class="fa fa-rupee-sign fa-1x"></i></td>
								</tr>								
								<tr>
									<td>x 1</td>
									<td>35000 <i class="fa fa-rupee-sign fa-1x"></i></td>
								</tr>								
								<tr>
									<th class="center-align green white-text">Subtotal : </th>
									<td>1050000 <i class="fa fa-rupee-sign fa-1x"></i></td>
								</tr>
								<tr>
									<td colspan="2">
										<a href="checkout.php" class="btn btn-medium btn-block amber darken-3 white-text" id="card-toggle">Checkout <i class="fab fa-cc-visa" style="margin-left:10px;"></i></a>
									</td>
								</tr>
							</tbody>
					</table> 
				</div>
			</div>
		</div>

  </div>
</div>
<!--Footer  -->
<?php include 'inc/footer.php'; ?>

		
	  
	