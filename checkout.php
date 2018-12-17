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
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
<div class="container-fluid" style="margin: 10px 10px 0px 10px;">
	
	<div class="row">
    <div class="col s12 m5 l3 xl3">
      <div class="card hoverable rounded">
				<div class="card-title center white-text gradient-4" style="font-size: 14px; text-transform:uppercase; padding:5px 10px !important;">Ads</div>
        <div class="card-image">
				<?php $sql = "SELECT * FROM `item` ORDER BY RAND() LIMIT 1"; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>
          <img src="admin/img/<?php echo $row[3]; ?>" class=" animated fadeIn responsive-img">
        </div>
        <div class="card-content">
					<span class="card-title black-text"><?php echo $row[2]; ?></span>
          <p class="truncate"><?php echo $row[5]; ?></p>
					<a href="product.php?pid=<?php echo $row[0]; ?>">Read More..</a>
        </div>
				<?php } ?>
      </div>
    </div>
		<div class="col s12 m7 l9 xl9">
			<div class="card large">
				<div class="card-title center z-depth-1 gradient-1 white-text" style="font-size: 16px; text-transform:uppercase; padding:10px 0px 10px 0px!important;">Payment Gateway</div>
				<div class="card-content">
					<!-- <form action="">
						<div class="col s6 m6 l6 xl6 center">
							<p style="text-transform:uppercase; font-size: 16px;">Credit</p>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="card_no">
									<label for="Card no">Card no.</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="card_name">
									<label for="Card holders name">Card holder name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="text" name="exp_date">
									<label for="expdate">Expiry</label>
								</div>
								<div class="input-field col s6">
									<i class="fab fa-cc-visa prefix"></i>
									<input type="password" name="cvv" id="icon_prefix" maxlength="3">
									<label for="icon_prefix">CVV</label>
								</div>
							</div>							
						</div>
						
						<div class="col s6 m6 l6 xl6 center">
							<p style="text-transform:uppercase; font-size: 16px;">Debit</p>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="card_no">
										<label for="Card no">Card no.</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="card_name">
										<label for="Card holders name">Card holder name</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="text" name="exp_date">
										<label for="expdate">Expiry</label>
									</div>
									<div class="input-field col s6">
										<i class="fab fa-cc-visa prefix small"></i>
										<input type="password" name="cvv" id="icon_prefix" maxlength="3">
										<label for="icon_prefix">CVV</label>
									</div>
								</div>						
							</div>
							<input type="submit" name="pay" class="btn btn-medium" value="pay">
						</div>
					</form> -->
					<div class="col s12 m6 l6 xl6">
						<div class="row">
						<?php $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'"; $result = mysqli_query($conn, $sql); while ($row =  mysqli_fetch_array($result)) { ?>
							<p style="font-size: 16px; text-align: center; margin-bottom: 20px;">Your Info</p>
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
				</div>
  		</div>      
		</div>

<!--Footer-->
<?php include 'inc/footer.php'; ?>
