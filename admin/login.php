<?php 
  
  session_start();
  
  include 'inc/header.php'; 
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
    } else{
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
                header("Location:dashboard.php");
              }
            } 
          }
        }  
      }


?>
<!-- navbar -->
<nav class="blue darken-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Shop</a>
        </div>
    </div>  
</nav>
<div class="container-fluid">
  <div class="row">
		<h3 class="center">Admin Login</h3>	
    <div class="col s12 m3 l4"></div>
    <div class="col s12 m12 l4">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="card-panel z-depth-1 hoverable animated fadeIn" id="login-card" style="margin-top: 40px;">
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
            <input type="checkbox" class="filled-in blue-text" name="remember"/>
            <span class="blue-text lighten-2">Remember me</span>
          </label>
          <div class="row" style=" margin-top: 20px; margin-left: 10px;">
            <input type="submit" value="Login" name="login" class="btn btn-small blue" style="margin-right: 20px;">
            <input type="reset" value="cancel" class="btn grey btn-small lighten-1">
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col s12 m3 l4"></div>
</div>
<?php include 'inc/footer.php'; ?>    