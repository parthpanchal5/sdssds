<?php 
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "root";
  $dbName = "shop";

  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

  if(!$conn){
    echo "<b>Error: </b>".mysqli_connect_error();
  }

?>