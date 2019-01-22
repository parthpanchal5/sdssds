<?php 
	include 'inc/header.php';
	include 'edit_profile_code.php'; 
?>

<!--Main navbar-->
<?php include 'inc/mainnav.php'; ?>

<!--Content area -->
<?php $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_row($result)) { ?>

<div class="container lighten-4">
  <div class="row">
    <div class="col s12 m12 l12" style="margin-top: 10px;">
      <div class="card z-depth-1 waves-effect hoverable">
        <div class="card-image">
          <img src="img/back.jpeg" height="360">
          <span class="card-title white-text"><h4><?php echo $row[1]." ".$row[2];  ?></h4></span>
          <a href="#modal1" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 modal-trigger"><i class="material-icons">create</i></a>
        </div>
        <div class="card-content black-text">
          <span class="card-title"><h6><b>Email: </b><u><?php echo $row[3]; ?></u></h6></span>
          <span class="card-title"><h6><b>Phone: </b><u><?php echo $row[6]; ?></u></h6></span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6 l6 xl6">
      <div class="card-panel z-depth-1" id="address">
        <div class="card-title left-align"><u>Delivery Address:</u></div>
        <div class="card-content">
          <ul class="black-text">
            <li><h6><?php echo $row[4]; ?></h6></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l6 xl6">
      <div class="card-panel z-depth-1">
        <span class="card-title left-align"><u>My Orders</u></span>
        <div class="card-content">
          <ul class="black-text">
            <li><h6 class="left-align">Click <a href="my_orders.php">here</a>  to see the list of your purchased goods</h6></li> 
          </ul>
        </div>       
      </div>
    </div>
  </div>
</div>

<!--Edit Modal-->
<div id="modal1" class="modal modal-fixed-footer animated slideInDown">
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
          <label for="address">Delivery Address</label>
          <span class="red-text"><?php echo $address_err; ?></span>
        </div>
      </div>
    </div>
    
    <?php } ?>
    
    <div class="modal-footer">
      <input type="submit" value="Update" name="edit" class="btn btn-block btn-small right red lighten-1" style="margin-right: 30px;">
    </div>
  </form>
</div>



<!--Footer  -->
<?php include 'inc/footer.php'; ?>

        
      
    