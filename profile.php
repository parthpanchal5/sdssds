<?php 
	session_start();
  include 'inc/conn.php';
  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('Location: login.php');
    exit;
  } 

  $email = $phone = $address = $username = '';
  $email_err = $phone_err = $address_err = $username_err = '';

  if(isset($_GET['edit'])){
    echo "sd;nlsdk";
    // Sanitize POST
    // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $id = mysqli_real_escape_string($conn, $_GET['id']); 
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $phone = mysqli_real_escape_string($conn, $_GET['phone']);
    $address = mysqli_real_escape_string($conn, $_GET['address']);
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    
    if(empty($email)){
      $email_err = "Email is required";
    }
    if(empty($phone)){
      $phone_err = "Phone no is required";
    }
    if(empty($address)){
      $address_err = "Address is required";
    }
    if(strlen($address) > 200){
      $address_err = "Maximum length exceded (Limit: 200)";
    }
    if(empty($username)){
      $username_err = "username is required";
    }else{
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Email is invalid";                        
      }else{
        if(!preg_match("/^[0-9]{10}$/", $phone)){
          $phone_err = "Phone is invalid";
        }else{
          $sql = "SELECT * FROM users WHERE username = '$username'";
          $result = mysqli_query($conn, $sql);
          $countRows = mysqli_num_rows($result);

          if($countRows > 0){
            $username_err = "Username is not available";
          }
          // Update user in DB
          $sql = "UPDATE users SET email = '$email', phone = '$phone', address = '$address', username = '$username' WHERE user_id = '$id'";
          echo $sql;
          $result = mysqli_query($conn, $sql);
          header("Location:profile.php");
          exit;
        }
      }
    }
  }
  
		
?>
<?php include 'inc/header.php'; ?>

<!--Main navbar-->
<?php include 'inc/mainnav.php'; ?>

<!--Mobile navbar -->
<?php include 'inc/mobilenav.php'; ?>
<!--Content area -->
<div class="container-fluid lighten-4">
<?php 
  $sql = "SELECT * FROM users WHERE user_id = '$id'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_row($result)){ ?>
  <div class="row">
    <div class="col s12 m4 l2"></div>
    <div class="col s12 m4 l8">

      <div class="card z-depth-1 waves-effect hoverable">
        <div class="card-image">
          <img src="img/back.jpeg" height="400">
          <span class="card-title white-text"><h4><?php echo $row[1]." ".$row[2];  ?></h4></span>
          <a href="#modal1" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 modal-trigger"><i class="material-icons">create</i></a>
        </div>
        <div class="card-content black-text">
          <span class="card-title"><h6><b>Email: </b><u><?php echo $row[3]; ?></u></h6></span>
          <span class="card-title"><h6><b>Phone: </b><u><?php echo $row[6]; ?></u></h6></span>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l2"></div>
  </div>
  <div class="row">
    <div class="col s12 m4 l2"></div>
    <div class="col s12 m4 l3">
      <div class="card z-depth-1 waves-effect lighten-2 rounded hoverable" id="address">
        <div class="card-content">
          <div class="card-title center">Delivery Address</div><hr>
          <ul>
            <li><?php echo $row[4]; ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l5">
      <div class="card z-depth-1  waves-effect  lighten-2 rounded hoverable">
        <div class="card-content"> 
          <div class="card-title">Purchased</div>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed, veniam?</p>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l2"></div>
  </div>
  <?php } ?>
</div>

<!--Edit Modal-->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h5 class="center">Edit Profile</h5>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
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
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div class="modal-footer">
      <input type="submit" value="Update" name="edit" class="btn btn-block btn-small red lighten-1">
    </div>
  </form>
</div>
<!--Footer  -->
<?php include 'inc/footer.php'; ?>

        
      
    