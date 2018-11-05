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
			header("Location:view_contact_msg.php?Deleted");
		}
		
		$sql = "SELECT `contact_id`, `user_email`, `message`, `sent_date` FROM contact_us ORDER BY `contact_id` DESC";
    $result =mysqli_query($conn, $sql);
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php';?> 
<div class="row">
    <div class="col s12 m0 l2"></div>
    <div class="col s12 m12 l8 black-text" id="content">
    <h3 class="center" style="margin-top: 1em; margin-bottom: 1em;">Client's Messages</h3>
      <div class="card hoverable">  
        <div class="card-content">
          <table class="highlight responsive-table black-text">
          <thead>
            <tr>
              <th>Sender</th>
              <th>Message</th>
							<th>Sent On</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr id="contact-row">	
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><?php echo $row[3]; ?></td>
              <td>
                <a href="edit_user.php?edit=<?php echo $row['user_id']; ?>" class="blue-text">Reply <i class="fa fa-reply"></i></a> | 
                <a href="view_contact_msg.php?delete=<?php echo $row[0]; ?>" id="deleteBtn" class="red-text">delete <i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>    
    </div>	
  <div class="col s12 m0 l2"></div>
<?php include 'inc/footer.php'; ?>
