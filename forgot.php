<?php include 'inc/conn.php';
  // Vars
  $email = $password = $confirm_pass = '';
  $email_err = $pass_err = $confirm_pass_err = '';
  if(isset($_POST['submit'])){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

    // empty field
    if(empty($email)){
      $email_err = "Please enter email";
    }
    if(empty($password)){
      $pass_err = "Please enter password";
    }
    if(empty($confirm_pass)){
      $confirm_pass_err = "Please enter confirm password";
    }else{
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Invalid email";
      }else{
        if(strlen($password) < 8){
          $pass_err = "Please must be 8 Chars long";
        }else{
          if($confirm_pass != $password){
            $confirm_pass_err = "Password Mismatch";
          }else{
            $sql = "SELECT `email` FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $checkResult = mysqli_num_rows($result);
            if($checkResult < 1){
              $email_err = "User not found";
            }else{
              $hashPass = password_hash($password, PASSWORD_DEFAULT);
              $sql = "UPDATE users SET password = '$hashPass' WHERE email = '$email'";
              // echo $sql;
              mysqli_query($conn, $sql);
              header("Location:login.php");
              exit;
            }
          }
        }
      }
    }
  }
?>
<?php include 'inc/header.php'; ?>
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
    <div class="col s3"></div>
    <div class="col s12 m6">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="card-panel z-depth-3 animated fadeIn" id="login-card" style="margin-top: 70px;">
          <div class="row">
            <div class="input-field">
              <i class="material-icons prefix">mail</i>
              <input id="email" type="text" class="validate <?php echo (!empty($email)) ? 'invalid' : ''; ?>" value="<?php echo $email; ?>" name="email">
              <label for="email">Registered Email</label>
              <span class="red-text" style="margin-left: 45px;"><?php echo $email_err; ?></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <i class="material-icons prefix">security</i>
              <input id="password" type="password" name="password" class="validate <?php echo (!empty($password)) ? 'invalid' : ''; ?>" value="<?php echo $password; ?>">
              <label for="password">New Password</label>
              <span class="red-text" style="margin-left: 45px;"><?php echo $pass_err; ?></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <i class="material-icons prefix">security</i>
              <input id="confirm_pass" name="confirm_pass" type="password" class="validate <?php echo (!empty($confirm_pass)) ? 'invalid' : ''; ?>" value="<?php echo $confirm_pass; ?>">
              <label for="confirm_pass">Confirm New Password</label>
              <span class="red-text" style="margin-left: 45px;"><?php echo $confirm_pass_err; ?></span>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-small blue lighten-2 left" style="margin-top: 10px; margin-left: 20px;">
            <a href="login.php" class="right" style="margin-top: 20px; margin-right: 20px;">Back to login</a>
          </div>
        </div>
      </form>
    </div>
    <div class="col s3"></div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>    
