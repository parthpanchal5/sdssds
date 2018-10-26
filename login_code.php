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
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['user_id'] = $row['user_id'];
                header("Location:index.php");
              }
            } 
          }
        }  
      }
?>