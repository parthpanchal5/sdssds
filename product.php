<?php 
	session_start();
  include 'inc/conn.php';
  include 'inc/header.php';

  if(isset($_GET['q'])){
    $productSearchId = mysqli_real_escape_string($conn, $_GET['q']);
    $productSearchQuery = "SELECT * FROM item WHERE item_name LIKE '$productSearchId%' OR item_desc LIKE '$productSearchId%'";
    $resultOfSearchQuery = mysqli_query($conn, $productSearchQuery);
    $row1 = mysqli_fetch_array($resultOfSearchQuery);
    print_r($row1);
  }
  	
?>  
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
	
<!--Content area-->
<div class="container">

<?php if(isset($_GET['pid'])){ $productId = mysqli_real_escape_string($conn, $_GET['pid']); $sql = "SELECT * FROM item WHERE item_id = $productId"; $result = mysqli_query($conn, $sql); } while ($row = mysqli_fetch_array($result)) { ?>
  
<?php } ?>

    
<?php include 'inc/footer.php'; ?>

        
      
    