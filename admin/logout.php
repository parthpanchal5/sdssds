<?php
  session_start();
  session_unset($_SESSION['user_id']);
  session_destroy();
  header("Location:login.php");
  // exit;

?>