<?php 
    include 'inc/header.php'; 
    include 'inc/reg_code.php'; 

?>
<!-- navbar -->
<nav class="blue lighten-2">
	<div class="container">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">Shop</a>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col s12 m6 right">
			<form action="reg_code.php" method="POST">
				<div class="card-panel animated fadeInRight" id="reg-card" style="margin-top: 20px;">
					<div class="row">
						<div class="input-field  col s6">
								<input id="firstname" type="text" class="validate <?php echo (!empty($firstname_err)) ? 'invalid' : ''; ?>" name="firstname" value="<?php echo $firstname; ?>">
								<label for="firstname">First Name</label>
								<span class="red-text"><?php echo $firstname_err; ?></span>
						</div>
						<div class="input-field col s6">
								<input id="lastname" type="text" class="validate <?php echo (!empty($lastname_err)) ? 'invalid' : ''; ?>" name="lastname" value="<?php echo $lastname; ?>">
								<label for="lastname">Last Name</label>
								<span class="red-text"><?php echo $lastname_err; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" type="text" class="validate <?php echo (!empty($email_err)) ? 'invalid' : ''; ?>" name="email" value="<?php echo $email; ?>">
							<label for="email">Email</label>
							<span class="red-text"><?php echo $email_err; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5">
							<input id="username" type="text" class="validate <?php echo (!empty($username_err)) ? 'invalid' : ''; ?>" name="username" value="<?php echo $username; ?>">
							<label for="username">@Username</label>
							<span class="red-text"><?php echo $username_err; ?></span>
						</div>
						<div class="input-field col s7">
							<input id="phone" type="text" data-length="10" class="validate <?php echo (!empty($phone_err)) ? 'invalid' : ''; ?>" name="phone" value="<?php echo $phone; ?>">
							<label for="phone">Phone no</label>
							<span class="red-text"><?php echo $phone_err; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="address" name="address" data-length="120" class="materialize-textarea <?php echo (!empty($address_err)) ? 'invalid' : ''; ?>"><?php echo $address; ?></textarea>
							<label for="address">Address</label>
							<span class="red-text"><?php echo $address_err; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
								<input id="password" type="password" class="validate <?php echo (!empty($password_err)) ? 'invalid' : ''; ?>" name="password" value="<?php echo $password; ?>">
								<label for="password">Password</label>
								<span class="red-text"><?php echo $password_err; ?></span>
						</div>
						<div class="input-field col s6">
								<input id="confirm_pass" type="password" class="validate <?php echo (!empty($confirm_password_err)) ? 'invalid' : ''; ?>" name="confirm_password" value="<?php echo $confirm_password; ?>">
								<label for="confirm_pass">Retype Password</label>
								<span class="red-text"><?php echo $confirm_password_err; ?></span>
						</div>
					</div>
					<input type="submit" value="Signup" name="submit" class="btn blue btn-small lighten-2" style="margin-right: 30px;">
					<input type="reset" value="cancel" class="btn btn-small grey lighten-1">
					<p>Have an account? Click to <a href="login.php">Login</a></p>
				</div>
			</form>
		</div>
		<div class="col m2">
			<img src="img/shop.svg" alt="img" height="340" style="margin-top: 100%;" class="hide-on-med-and-down animated fadeInLeft">
		</div>
	</div>
</div>

<?php include 'inc/footer.php' ?>