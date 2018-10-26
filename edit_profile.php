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

  if(isset($_POST['edit'])){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
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
          $sql = "UPDATE users SET email = '$email', phone = '$phone', address = '$address', username = '$username' WHERE user_id = '".$_SESSION['user_id']."'";
          echo $sql;
          $result = mysqli_query($conn, $sql);
          header("Location:profile.php");
        }
      }
    }
  }
?>