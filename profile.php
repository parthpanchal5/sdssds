
<?php 
	include 'inc/header.php';
	include 'edit_profile_code.php'; 
?>

<!--Main navbar-->
<?php include 'inc/mainnav.php'; ?>

<!--Mobile navbar -->
<?php include 'inc/mobilenav.php'; ?>
<!--Content area -->

<?php 
  $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_row($result)){ ?>
<div class="container-fluid lighten-4">
  <div class="row">
    <div class="col s12 m2 l2 xl2"></div>
    <div class="col s12 m8 l8">
      <div class="card z-depth-1 waves-effect hoverable">
        <div class="card-image">
          <img src="img/back.jpeg" height="380">
          <span class="card-title white-text"><h4><?php echo $row[1]." ".$row[2];  ?></h4></span>
          <a href="#modal1" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 modal-trigger"><i class="material-icons">create</i></a>
        </div>
        <div class="card-content black-text">
          <span class="card-title"><h6><b>Email: </b><u><?php echo $row[3]; ?></u></h6></span>
          <span class="card-title"><h6><b>Phone: </b><u><?php echo $row[6]; ?></u></h6></span>
        </div>
      </div>
    </div>
    <div class="col s12 m2 l2"></div>
  </div>
  <div class="row">
    <div class="col s12 m2 l2"></div>
    <div class="col s12 m4 l4">
      <div class="card z-depth-1  waves-effect lighten-2 gradient-4 hoverable" id="address">
        <div class="card-content">
          <div class="card-title white-text center">Delivery Address</div>
          <ul class="white-text">
            <li><?php echo $row[4]; ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col s12 m2 l4">
      <div class="card z-depth-1  waves-effect  lighten-2 hoverable">
        <div class="card-content"> 
          <div class="card-title center">Purchased</div>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed, veniam?</p>
        </div>
      </div>
    </div>
    <div class="col s12 m2 l2"></div>
  </div>
</div>

<!--Edit Modal-->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h5 class="center">Edit Profile <i class="fa fa-edit fa-1x"></i></h5>
    <form action="edit_profile_code.php" method="POST">
      <div class="row">
        <div class="input-field col s12">
            <input id="email" type="text" class="validate <?php echo (!empty($email_err)) ? 'invalid' : ''; ?>" name="email" value="<?php echo $row[3]; ?>">
            <label for="email">Email</label>
            <span class="red-text"><?php echo $email_err; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s5">
            <input id="username" type="text" class="validate <?php echo (!empty($username_err)) ? 'invalid' : ''; ?>" name="username" value="<?php echo $row[5]; ?>">
            <label for="username">@Username</label>
            <span class="red-text"><?php echo $username_err; ?></span>
        </div>
        <div class="input-field col s7">
            <input id="phone" type="text" data-length="10" class="validate <?php echo (!empty($phone_err)) ? 'invalid' : ''; ?>" name="phone" value="<?php echo $row[6]; ?>">
            <label for="phone">Phone no</label>
            <span class="red-text"><?php echo $phone_err; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="address" name="address" data-length="120" class="materialize-textarea bold <?php echo (!empty($address_err)) ? 'invalid' : ''; ?>"><?php echo $row[4]; ?></textarea>
          <label for="address">Address</label>
          <span class="red-text"><?php echo $address_err; ?></span>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" value="Update" name="edit" class="btn btn-block btn-small right red lighten-1">
    </div>
  </form>
</div>
<?php } ?>


<!--Footer  -->
<?php include 'inc/footer.php'; ?>

        
      
    