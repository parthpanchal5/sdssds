<?php
  include 'inc/conn.php';

  if(isset($_GET['q'])){
    $productSearchId = mysqli_real_escape_string($conn, $_GET['q']);
    $productSearchQuery = "SELECT * FROM item WHERE item_name LIKE '%$productSearchId%'";
    $resultOfSearchQuery = mysqli_query($conn, $productSearchQuery);


    while($row = mysqli_fetch_assoc($resultOfSearchQuery)){
      echo "<script>console.log('$row')</script>";
    }
  }


?>