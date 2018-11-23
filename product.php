<?php 
	session_start();
  include 'inc/conn.php';

  if(isset($_GET['q'])){
    $id = mysqli_real_escape_string($conn, $_GET['q']);
    $sql = "SELECT * FROM item WHERE item_name LIKE ‘%$id%’";
    $result = mysqli_query($conn, $sql);
    echo $sql;
  }
		
?>  
<?php include 'inc/header.php'; ?>
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
	
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>
<!--Content area-->
<div class="container">

</div>


    
<?php include 'inc/footer.php'; ?>

        
      
    