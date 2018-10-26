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
    }else{
      if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)){
        $firstname_err =  "Firstname is required";
        $lastname_err = "Lastname is required";
      }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $email_err = "Email is invalid";                        
        }else{
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
                    // echo $sql;
                    $result = mysqli_query($conn, $sql);
                    header("Location:login.php");
                    
                    }
                }
              }
            }
        }
      }
    }
  }
?>