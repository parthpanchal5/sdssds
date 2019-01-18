<?php 
	include 'inc/header.php';
	include 'inc/conn.php';

		// Validate login
		if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
			header('Location: login.php');
			exit;
		}

		// Check cart is empty or not 
		if(empty($_SESSION['cart'])){
			header('Location: index.php');
			exit;
		}else{
			print_r ($_SESSION['cart']);
		}
		
?>


<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>

<div class="container-fluid" style="margin: 10px 10px 0px 10px;">
	<div class="row">
	<div class="col s12 m12 l9 xl9">
			<div class="card large">
				<div class="card-title center z-depth-1 gradient-1 white-text" style="font-size: 16px; text-transform:uppercase; padding:10px 0px 10px 0px!important;">Payment Gateway</div>
				<div class="card-content">
					<div class="col s12 m12 l4 xl4">
						<div class="row">

						<?php $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'"; $result = mysqli_query($conn, $sql); while ($row =  mysqli_fetch_array($result)) { ?>

							<p style="font-size: 16px; text-align: left; margin-bottom: 20px;">Personal Details</p>
								<form>
								<div class="input-field col s12 l6 m6">
									<input type="text" name="firstname" disabled value="<?php echo $row[1]; ?>" id="disabled-inputs">
									<label for="firstname">Firstname</label>
								</div>
								<div class="input-field col s12 l6 m6">
									<input type="text" name="lastname" disabled value="<?php echo $row[2]; ?>" id="disabled-inputs">
									<label for="lastname">Lastname</label>
								</div>
								<div class="input-field col s12 l12 m6">
									<input type="text" name="email" disabled value="<?php echo $row[3]; ?>" id="disabled-inputs">
									<label for="email">Email</label>
								</div>
								<div class="input-field col s12 l12 m6">
									<input type="text" name="phone" disabled value="<?php echo $row[6]; ?>" id="disabled-inputs">
									<label for="Phone">Phone</label>
								</div>
								<div class="input-field col s12 m12 l12">
									<textarea class="materialize-textarea" disabled id="disabled-inputs"><?php echo $row[4];?></textarea>
          				<label for="address">Delivery Address</label>
								</div>
							</form>

							<?php } ?>
						
						</div>
					</div>

					<div class="col 12 m12 l8 xl8">
						<table class="table striped highlight responsive-table">
							<thead>
								<tr>
									<th class="left-align">Item name</th>
									<th >Qty</th>
									<th class="right-align"><a class="black-text tooltipped" data-position="top" data-tooltip="Including Discounts">Total Price</a></th>
								</tr>
							</thead>
							<tbody>

							<?php foreach($_SESSION['cart'] as $key => $value) : ?>

								<tr>
									<td class="left-align"><?php echo $value['item_name']; ?></td>
									<td ><?php echo $value['quantity']; ?></td>
									<td class="right-align"><?php $sp = $value['item_price'] * $value['quantity'] - ($value['item_price'] * ($value['discount'] / 100) ); echo number_format($sp); ?><i class="fa fa-rupee-sign" style="margin-right: 5px; margin-left: 5px;"></i></td>
								</tr>
								
								<?php $total = $total + $sp; ?>

								<?php endforeach; ?>

								<tr>
									<td colspan="3" class="right-align"><h6>Sub Total: <i class="fa fa-rupee-sign" style="margin-right: 5px; margin-left: 20px;"></i><?php echo number_format($total, 2); ?></h6></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
  		</div>      
		</div>
    <div class="col s12 m12 l3 xl3">
      <div class="card hoverable rounded">
				<div class="card-title center white-text gradient-4" style="font-size: 14px; text-transform:uppercase; padding:5px 10px !important;">Ads</div>
        <div class="card-image">

				<?php $sql = "SELECT * FROM `item` ORDER BY RAND() LIMIT 1"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>

          <img src="admin/img/<?php echo $row[3]; ?>" class=" animated fadeIn responsive-img">
        </div>
        <div class="card-content">
					<span class="card-title black-text"><?php echo $row[2]; ?></span>
          <p class="truncate"><?php echo $row[5]; ?></p>
					<a href="product.php?pid=<?php echo $row[0]; ?>&pname=<?php echo $row[2]; ?>" target="_blank">Read More..</a>
        </div>

				<?php } ?>

      </div>
    </div>
		

<!--Footer-->
<?php include 'inc/footer.php'; ?>
