<?php 
  session_start();
  include 'inc/conn.php';

  // Delete
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE user_id = $id");
    header("Location:view_user.php?Deleted");
  }


  // View 
  $sql = "SELECT * FROM users ORDER BY user_id DESC";
  $result = mysqli_query($conn, $sql);

?>
<?php include 'inc/header.php';?>
<?php include 'inc/horizonnav.php'; ?>     
<div class="container-fluid">
	<h3 class="center">User</h3>
  <div class="row">
    <div class="col s12 m2 l3"></div>
    <div class="col s12 m2 l6">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" type="text" name="q" class="validate">
            <label for="icon_prefix">Search User</label>
          </div>
        </div>
      </form>
    </div>
    <div class="col s12 m2 l3"></div>
  </div>
  
  <div class="row">
    <div class="col s12 m4 l2"></div>
    <div class="col s12 m4 l8 black-text" id="content">
      <div class="card">  
        <div class="card-content">
          <table class="highlight responsive-table black-text center-align" style="margin-top: 10px;"  id="searchTable">
          <thead>
            <tr>
              <th class="center">Id</th>
              <th class="center">Firstname</th>
              <th class="center">Lastname</th>
              <th class="center">Email</th>
              <th class="center">Phone</th>
              <th class="center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>	
              <td class="center"><?php echo $row['user_id']; ?></td>
              <td class="center"><?php echo $row['firstname']; ?></td>
              <td class="center"><?php echo $row['lastname']; ?></td>
              <td class="center"><?php echo $row['email']; ?></td>
              <td class="center"><?php echo $row['phone']; ?></td>
              <td>
                <a href="edit_user.php?edit=<?php echo $row['user_id']; ?>" class="blue-text">edit <i class="fa fa-edit"></i></a> | 
                <a href="view_user.php?delete=<?php echo $row['user_id']; ?>" id="deleteBtn" class="red-text">delete <i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>    
    </div>	
  <div class="col s12 m4 l2"></div>
</div>    

<?php include 'inc/footer.php'; ?>
