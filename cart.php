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
		<div class="col s12 m8 l6">
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
										<!-- <a class="btn-floating btn-small waves-effect waves-light blue lighten-2"><i class="material-icons">add</i></a> -->
										<p class="range-field">
      								<input type="range" id="test5" min="0" max="5" />
										</p>
										<!-- <a class="btn-floating btn-small waves-effect waves-light green lighten-2"><i class="material-icons">remove</i> -->
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
										<a class="btn-floating btn-small waves-effect waves-light blue lighten-2"><i class="material-icons">add</i></a>
											<input type="text" name="qty" class="small" id="qty-input">
										<a class="btn-floating btn-small waves-effect waves-light green lighten-2"><i class="material-icons">remove</i>
									</form>
								</td>
								<td>35000</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col s12 m5 l4 x4">
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
									<th class="center-align green lighten-2 white-text">Subtotal : </th>
									<td>1050000 <i class="fa fa-rupee-sign fa-1x"></i></td>
								</tr>
								<tr>
									<td colspan="2">
										<a href="#" class="btn btn-medium btn-block blue lighten-2" id="card-toggle">Pay via <i class="fab fa-cc-visa" style="margin-left:10px;"></i></a>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<p>Add a card</p>
										<form id="visa-card-panel">
											<label for="ks" class="icon-prefix"><i class="material-icons">cart</i></label>
											<input type="text">
										</form>
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

		
	  
	