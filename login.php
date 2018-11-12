<?php 
  session_start();
  include 'inc/conn.php';
  // Init vars
  $userinput = $password = '';
  $userinput_err = $password_err = '';

  // Process form when post submit
  if(isset($_POST['login'])){    
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $userinput = mysqli_real_escape_string($conn, $_POST['userinput']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate email
    if(empty($userinput)){
      $userinput_err = 'Please enter email or username';  
    }
    if(empty($password)){
      $password_err = 'Please enter password';
    } 
    else{
        $sql = "SELECT * FROM users WHERE username = '$userinput' OR email = '$userinput'";
        $result = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);
        if($checkResult < 1){
          $userinput_err = "User not found";
        }else{
          while($row = mysqli_fetch_assoc($result)){
            $hashPass = password_verify($password, $row['password']);
            if($hashPass == false){
              $password_err = "Invalid Password";
            }elseif($hashPass == true){
              $_SESSION['username'] = $row['username'];
              $_SESSION['firstname'] = $row['firstname'];
              $_SESSION['lastname'] = $row['lastname'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['phone'] = $row['phone'];
              $_SESSION['address'] = $row['address'];
              $_SESSION['user_id'] = $row['user_id'];
              header("Location:index.php");

              // if(($_SESSION['email'] === "admin@admin.com") || ($_SESSION['username'] === 'admin123') ||($_SESSION['username'] === "admin123")){
              //   header('Location:admin/dashboard.php');
              //   exit;
              // }
            }
          } 
        }
      }  
    }
?>
  
<?php include 'inc/header.php'; ?>
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
  <h3 class="center animated fadeInDown">Login</h3>
    <div class="col s2 hide-on-med-and-down m2 l2">
      <img src="img/login.svg" alt="img" height="320" style="margin-top: 80%;" class="hide-on-med-and-down animated ">
    </div>
    <div class="col s12 m12 l6 right">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="card-panel z-depth-1 hoverable animated fadeIn" id="login-card" style="margin-top: 10px;">
          <div class="row">
            <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <input id="user_input" type="text" class="validate <?php echo (!empty($userinput_err)) ? 'invalid' : ''; ?>" value="<?php echo $userinput; ?>" name="userinput">
              <label for="user_input">Email or username</label>
              <span class="red-text" style="margin-left: 40px;" id="error"><?php echo $userinput_err; ?></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field" style="margin-bottom: -5px !important;">
              <i class="material-icons prefix">security</i>
              <input id="password" type="password" value="<?php echo $password; ?>" class="validate <?php echo (!empty($password_err)) ? 'invalid' : ''; ?>" name="password">
              <label for="password">Password</label>
              <span class="red-text" style="margin-left: 40px;"><?php echo $password_err; ?></span>
            </div>
          </div>
          <label style="margin-left: 5px;">
            <input type="checkbox" class="filled-in" name="remember"/>
            <span class="grey-text lighten-2">Remember me</span>
          </label>
          <div class="row" style=" margin-top: 20px; margin-left: 10px;">
            <input type="submit" value="Login" name="login" class="btn btn-small blue" style="margin-right: 20px;">
            <input type="reset" value="cancel" class="btn grey btn-small lighten-1">
          </div>
          <div class="row" style="margin-top: 10px; margin-left: 10px;">
            <a href="forgot.php">Forgot Password?</a>  
          </div>
          <p style="margin-left: 10px;">Don't have an account? Click to <a href="reg.php">Signup</a></p>  
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>    