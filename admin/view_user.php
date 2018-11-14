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
  <h4 class="center">User</h4>
  <?php $sql = "SELECT COUNT(`user_id`) FROM users"; $result1 = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result1)) { ?>
    <p class="center">Total no of users: <h5 class="center"><?php echo $row[0]; ?></h5></p>
  <?php }?>
  <div class="row">
    <div class="col s12 m2 l3"></div>
    <div class="col s12 m8 l6">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="card-panel hoverable">
          <div class="row">
            <div class="input-field col s10">
              <i class="material-icons prefix">search</i>
              <input id="icon_prefix" type="text" name="q" class="validate">
              <label for="icon_prefix">Search User</label>
            </div>
            <input type="submit" name="submit" class="btn btn-small blue lighten-1 right" value="search">
          </div>
        </div>
      </form>
    </div>
    <div class="col s12 m2 l3"></div>
  </div>
  
  <div class="row">
    <div class="col s12 m0 l2"></div>
    <div class="col s12 m12 l8 black-text" id="content">
      <div class="card hoverable">  
        <div class="card-content">
          <table class="highlight responsive-table black-text center-align" style="margin-top: 10px;"  id="searchTable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>	
              <td><?php echo $row['user_id']; ?></td>
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['lastname']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td>
                <a href="edit_user.php?edit=<?php echo $row['user_id']; ?>" class="blue-text"><i class="fa fa-edit"></i></a> | 
                <a href="view_user.php?delete=<?php echo $row['user_id']; ?>" id="deleteBtn" class="red-text"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>    
    </div>	
  <div class="col s12 m0 l2"></div>
</div>    

<?php include 'inc/footer.php'; ?>
