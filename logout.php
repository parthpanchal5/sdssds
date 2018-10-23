<?php
  session_start();
  // setcookie("user_login", "");
  session_unset();
  session_destroy();
  header("Location:login.php");
  exit;

?>