<?php 
    include 'inc/header.php'; 
    include 'inc/conn.php';

    // Init vars
  $firstname = $lastname = $email = $username = $address = $phone = $password = $confirm_password = '';
  $firstname_err = $lastname_err = $email_err = $username_err = $address_err = $phone_err = $password_err = $confirm_password_err = '';

  // Submit
  if(isset($_POST['submit'])){
    $firstname = ucfirst(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = ucfirst(mysqli_real_escape_string($conn, $_POST['lastname']));
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    // Empty
    if(empty($firstname)){
        $firstname_err =  "Firstname is required";
    } 
    if(empty($lastname)){
        $lastname_err = "Lastname is required";
    }
    if(empty($username)){
        $username_err = "Username is required (It must contain lowercase and digits)";
    }
    if(empty($email)){
        $email_err = "Email is required";
    }
    if(empty($address)){
        $address_err = "Address is required";
    }
    if(empty($password)){
        $password_err = "Password is required";
    }
    if(empty($phone)){
        $phone_err = "Phone no is required";
    }
    if(empty($confirm_password)){
        $confirm_password_err = "Confirm Password is required";      
    }
    if(strlen($address) > 200){
        $address_err = "Maximum length exceded (Limit: 200)";
    }
    if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)){
        $firstname_err =  "Firstname is invalid";
        $lastname_err = "Lastname is invalid";
      }
      else{
          if(strlen($password) < 8){
            $password_err = "Password must be 8 characters long";
          }else{
              if(!preg_match("/^[0-9]{10}$/", $phone)){
                  $phone_err = "Phone is invalid";
              }else{
                if($confirm_password != $password){
                  $confirm_password_err = "Password Mismatch";      
                }else{
                  $sql = "SELECT * FROM users WHERE username = '$username'";
                  $result = mysqli_query($conn, $sql);
                  $countRows = mysqli_num_rows($result);
        
                  if($countRows > 0){
                    $username_err = "Username is not available";
                  }else{
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                    // Insert user in DB
                    $sql = "INSERT INTO users (firstname, lastname, email, address, username, phone, password) VALUES ('$firstname', '$lastname', '$email', '$address','$username', '$phone', '$hashedPass')";
                    echo $sql;
                    $result = mysqli_query($conn, $sql);
                    header("Location:login.php");
                    
                    }
                }
              }
            
        }
 } } ?>
<!-- navbar -->
<div class="navbar-fixed">
  <nav class="blue lighten-2 z-depth-2">
	  <div class="container">
		  <div class="nav-wrapper">
			  <a href="#" class="brand-logo">Shop</a>
		  </div>
	  </div>
  </nav>
</div>  
<div class="container">
	<div class="row">
    <h3 class="center animated fadeInDown">Sign Up</h3>
		<div class="col s12 m12 l6 right">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<div class="card-panel animated hoverable fadeIn" id="reg-card" style="margin-top: 25px;">
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
					<p><a href="login.php">Already have an account?</a></p>
				</div>
			</form>
		</div>
		<div class="col s12 m2 hide-on-med-and-down">
			<img src="img/shop.svg" alt="img" height="340" style="margin-top: 100%;" class="animated fadeInLeft">
		</div>
	</div>
</div>

<?php include 'inc/footer.php' ?>