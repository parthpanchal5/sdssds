<?php
  session_start();
  // setcookie("user_login", "");
  session_unset($_SESSION['user_id']);
  // session_destroy();
  header("Location:login.php");
  exit;

?>