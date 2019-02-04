<?php 
	include 'inc/header.php';
	include 'inc/conn.php';

		// Validate login
		if(!isset($_SESSION['email']) || empty($_SESSION['user_id'])){
			header('Location: login.php');
			exit;
		}

		// Check cart is empty or not 
		if(empty($_SESSION['cart'])){
			header('Location: index.php');
		}
		
		// Pay
		if(isset($_POST['pay'])){			
			
			// $pay = mysqli_real_escape_string($conn, $_POST['pay']);

			$payee_name = $card_no = $expiry = $cvv = '';
			$payee_name_err = $card_no_err = $expiry_err = $cvv_err = '';


			$payee_name = mysqli_real_escape_string($conn, $_POST['card_name']);
			$card_no = mysqli_real_escape_string($conn, $_POST['card_no']);
			$expiry = mysqli_real_escape_string($conn, $_POST['expiry']);
			$cvv = mysqli_real_escape_string($conn, $_POST['cvv']);

			if(empty($payee_name)){
				$payee_name_err = 'Enter card name';
			}
			if(empty($card_no)){
				$card_no_err = 'Enter 14-digit card no';
			}
			if(empty($expiry)){
				$expiry_err = "Enter card-expiry date";
			}
			if(empty($cvv)){
				$cvv_err = "Enter 3-digit CVV no";
			}
			if(preg_match("/^[a-zA-Z]*$/", $payee_name)){
				$payee_name_err = "Invalid name";
			}
			if(!preg_match("/^[0-9 ]/", $card_no)){
				$card_no_err = "Invalid card no";
			}
			if(!preg_match('/^[0-9-\/ ]/', $expiry)){
				$expiry_err = "Invalid expiry";
			}
			if(!preg_match('/^[0-9]{3}/', $cvv)){
				$cvv_err = "Invalid CVV no";
			}
			if(strlen($card_no) > 14){
				$card_no_err = "Card no limit exceded";
			}
			if(strlen($expiry)> 5){
				$expiry_err = "Expiry exceded";
			}
			if(strlen($cvv) > 3){
				$cvv_err = "Invalid cvv";
			}else{
				foreach($_SESSION['cart'] as $key => $value) {			

					$item_id = $value['item_id'];
					$inSessionUser = $_SESSION['user_id'];			
					$price = $value['item_price'];
					$quantity = $value['quantity'];
					$discount = $value['discount'];
					$sp = $value['item_price'] * $value['quantity'] - ($value['item_price'] * ($value['discount'] / 100));
					$total = $total + $sp;				
					$bill_no = 100;
					$shippingdt = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 5, date('Y')));
					$sql = "INSERT INTO order_details (`item_id`, `user_id`, `bill_no`, `price`, `quantity`, `discount`, `sub_total`, `shipping_date`, `status`) VALUES ('$item_id', '$inSessionUser', '$bill_no', '$price', '$quantity', '$discount', '$total','$shippingdt', 'Paid')";
					$result = mysqli_query($conn, $sql);
					// echo $sql;
					header('Location:billing.php?t_status=k');
								// unset($_SESSION['cart']);
				}
			}					
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
						<p style="font-size: 16px; text-align: left; margin-bottom: 20px;">Personal Details</p>
						
						<?php $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'"; $result = mysqli_query($conn, $sql); while ($row =  mysqli_fetch_array($result)) { ?>

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
					<table class="table striped highlight responsive-table animated fadeIn">
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
				
				<div class="col s12 m12 l5 xl5 left" style="margin: 10px 0px;">
					<div class="card-panel small">
						<span class="card-title">Card</span><br>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							
							<div class="input-field col s12 l12 m6">
								<input type="text" name="card_name" class="validate <?php echo (!empty($payee_name_err)) ? 'invalid' : ''; ?>" id="input-cc" value="<?php echo $payee_name; ?>">
								<label for="card-name">Card holder's name</label>
								<span class="red-text"><?php echo $payee_name_err; ?></span>
							</div>
							
							<div class="input-field col s12 l12 m6">
								<input type="text" id="card-no" class="validate <?php echo (!empty($card_no_err)) ? 'invalid' : ''; ?>" name="card_no" maxlength="14" data-length="14" value="<?php echo $card_no; ?>">
								<label for="card-no">Enter 14-digit number</label>
								<span class="red-text"><?php echo $card_no_err; ?></span>
							</div>
							
							<div class="row">
								<div class="input-field col s12 l6 xl6 m6">
									<input type="text" name="expiry"  class="validate <?php echo (!empty($expiry_err)) ? 'invalid' : ''; ?>" value="<?php echo $expiry; ?>">
									<label for="expiry">Expiry</label>
									<span class="red-text"><?php echo $expiry_err; ?></span>
								</div>
								<div class="input-field col s12 l6 m6 xl5">
									<input type="text" maxlength="3" id="cvv" data-length="3" name="cvv" class="validate <?php echo (!empty($cvv_err)) ? 'invalid' : ''; ?>" value="<?php echo $cvv; ?>">
									<label for="cvv">CVV</label>
									<span class="red-text"><?php echo $cvv_err; ?></span>
								</div>
							</div>

							<input type="submit" value="Pay it" name="pay" class="btn blue darken-2">
						</form>
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
	</div>
	
<!--Footer-->
<?php include 'inc/footer.php'; ?>
