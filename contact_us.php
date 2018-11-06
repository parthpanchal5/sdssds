<?php 
	session_start();
	include 'inc/conn.php';

		// Validate login
		if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
			header('Location: login.php');
			exit;
    }
    
    $userEmail = $message = "";
    $userEmail_err = $message_err = '';

    if(isset($_POST['send'])){
      $userEmail = mysqli_real_escape_string($conn, $_POST['user_email']);
      $message = mysqli_real_escape_string($conn, $_POST['message']);

      // Empty
      if(empty($userEmail)){
        $userEmail_err = "It Cannot be left Blank";
      }else{
        if(empty($message)){
          $message_err = "C'mon Don't be shy";
        }else{
          if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
            $email_err = "Email is invalid";                        
          }else{
            $sql = "INSERT INTO contact_us (user_email, message) VALUES ('$userEmail', '$message')";
            $result = mysqli_query($conn, $sql);
            header("Location:msg_success.php");
            exit;
          }
        }
      }
    }

    
		
?>

<?php include 'inc/header.php'; ?>
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>
<div class="container-fluid">
  <div class="row">
  <h4 class="center" style="margin-top: 20px;">Contact Us</h4>
    <div class="col s12 m2 l2 xl2">
      <img src="img/contact.svg" alt="contact us" class="hide-on-med-and-down" height="420" style="margin-top: 30px; margin-left: 80px;">
    </div>
    <div class="col s12 m12 l5 right">
      <div class="card-panel hoverable" style=""id="contact-card">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" name="user_email" id="email" class="<?php echo (!empty($email_err)) ? 'invalid' : ''; ?>" value="<?php echo $_SESSION['email'];?>">
              <label for="email">Email</label>
              <span class="red-text animated fadeIn"><?php echo $email_err;?></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textarea3" autocomplete="off" class="materialize-textarea <?php echo (!empty($message_err)) ? 'invalid' : ''; ?>" name="message"><?php echo $message; ?></textarea>
              <label for="textarea3">Message</label>
              <span class="red-text animated fadeIn"><?php echo $message_err;?></span>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light btn-small right" type="submit" name="send">Send
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col s12 m2 l2 xl2"></div>
  </div>
</div>
<!--Footer-->
<?php include 'inc/footer.php'; ?>
