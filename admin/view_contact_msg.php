<?php 
    session_start();
    
    include 'inc/conn.php';

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    	header('Location:login.php');
    	exit;
	  }
    if(($_SESSION['email'] != "admin@admin.com") || ($_SESSION['username'] != "admin123")){
        header('Location:login.php');
    	  exit;
    }
		// Delete
		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			mysqli_query($conn, "DELETE FROM contact_us WHERE contact_id = $id");
			header("Location:view_contact_msg.php");
		}
    
    
    // Define results per page
    $resultPerPage = 3;

    $sql1 = "SELECT * FROM contact_us";
    $result1 = mysqli_query($conn, $sql1);
    $noOfResults = mysqli_num_rows($result1);
  
  
    // Determine no of total pages available
    $noOfPages = ceil($noOfResults / $resultPerPage);
  
    // Determine which page number visitor is on
    if (!isset($_GET['page'])) {
      $page = 1;
    }else{
      $page = $_GET['page'];
    }
  
    // Determine sql LIMIT starting no for result on the displaying page
    $startingLimitNo = ($page - 1) * $resultPerPage;	
		
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php';?> 
<div class="row">
    <div class="col s12 m0 l2"></div>
    <div class="col s12 m12 l8 black-text" id="content">
    <h3 class="center" style="margin-top: 1em; margin-bottom: 1em;">Client's Messages</h3>
      <div class="card hoverable">  
        <div class="card-content">
          <table class="highlight responsive-table black-text animated fadeIn striped">
          <thead>
            <tr>
              <th>Sender</th>
              <th>Message</th>
							<th>Sent On</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $sql = "SELECT * FROM contact_us ORDER BY `contact_id` DESC LIMIT ". $startingLimitNo .','. $resultPerPage; $result = mysqli_query($conn, $sql); while ($row = mysqli_fetch_array($result)) { ?>
            <tr id="contact-row">	
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><?php echo $row[3]; ?></td>
              <td>
                <a href="edit_user.php?edit=<?php echo $row[0]; ?>" class="green-text">Reply <i class="fa fa-reply"></i> </a> | 
                <a href="view_contact_msg.php?delete=<?php echo $row[0]; ?>" id="deleteBtn" class="red-text"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <?php 
          echo "<ul class='pagination center' id='page-container'>";
            for ($page = 1; $page <= $noOfPages; $page++) { 
            echo "<li class='waves-effect pagination-links'>";
              echo '<a href="view_contact_msg.php?page='.$page.'">'. $page . '</a>';
            echo "</li>";
          }
          echo "</ul>";
        ?>
      </div>    
    </div>	
  <div class="col s12 m0 l2"></div>
<?php include 'inc/footer.php'; ?>
