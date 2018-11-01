<?php
  session_start();
  include 'inc/conn.php';
      
  $edit_state = false;
  // Update
  if (isset($_POST['update'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    mysqli_query($conn, "UPDATE users SET firstname = '$firstname', lastname = '$lastname',email = '$email', phone = '$phone' WHERE user_id = $id");
    header("Location:view_user.php?Updated");
    exit();
  }
  
  // Fetch Data into textbox
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id");
    $record = mysqli_fetch_array($rec);
    $firstname = $record['firstname'];
    $lastname = $record['lastname'];
    $email = $record['email'];
    $phone = $record['phone'];
  }
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>     
<div class="container-fluid">
  <div class="row">
    <div class="col s12 m4 l3"></div>
    <div class="col s12 m4 l6" style="margin-top: 20px;">
      <div class="card">
        <div class="card-content">
          <h4 class="center">Edit User</h4>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style="margin-top: 30px;">
				      <div class="row">
							  <div class="input-field">
									<input type="text" name="firstname" autocomplete="off" value="<?php echo $firstname; ?>" id="firstname">
									<label for="firstname">Firstname</label>
							  </div>
						  </div>
						  <div class="row">
							  <div class="input-field">
									<input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" autocomplete="off">
									<label for="lastname">Lastname</label>
							  </div>
						  </div>
						  <div class="row">
							  <div class="input-field">
									<input type="text" name="email" data-error="invalid" value="<?php echo $email; ?>" id="email" autocomplete="off">
									<label for="email">Email</label>
							  </div>
						  </div>
						  <div class="row">
							  <div class="input-field">
									<input type="text" id="phone" data-length="10" value="<?php echo $phone; ?>" name="phone" autocomplete="off">
									<label for="phone">Phone no</label>
							</div>
						</div>   
						<div class="row">
							<div class="input-field">
								<?php if ($edit_state == true) : ?> 
								  <input type="hidden" name="id" value="<?php echo $id; ?>">
								  <input type="submit" value="Update" name="update" class="btn blue">
								<?php endif; ?>
							</div>
						</div>                    
				  </div>
			  </form>          
      </div>
    </div>
  </div>
  <div class="col s12 m4 l3"></div>
<?php include 'inc/footer.php'; ?>  