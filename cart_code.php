<?php
  // get submit action
  if(isset($_GET['action'])){
    $cartAction = mysqli_real_escape_string($conn, $_GET['action']);

    if($cartAction == "add"){
      echo "fgfg";
      $sqlForAdding = "INSERT INTO ";
    }
  }

?>