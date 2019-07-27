<?php 
  session_start();
  include 'inc/conn.php';

  // Delete
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE user_id = $id");
    header("Location:view_user.php?Deleted");
  }

  // Define results per page
  $resultPerPage = 10;

  $sql1 = "SELECT * FROM category";
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
<?php include 'inc/header.php';?>
<?php include 'inc/horizonnav.php'; ?>     
<div class="container-fluid">
  <h4 class="center">Users</h4>
  <?php $sql = "SELECT COUNT(`user_id`) FROM users"; $result1 = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result1)) { ?>
    <p class="center">Total no of users: <h5 class="center"><?php echo $row[0]; ?></h5></p>
  <?php }?>
  <div class="row">
    <div class="col s12 m2 l3"></div>
    <!-- <div class="col s12 m8 l6">
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
    </div> -->
    <div class="col s12 m2 l3"></div>
  </div>
  
  <div class="row">
    <div class="col s12 m0 l2"></div>
    <div class="col s12 m12 l8 black-text" id="content">
      <div class="card">  
        <div class="card-content">
          <table class="highlight animated fadeIn striped responsive-table black-text" style="margin-top: 10px;"  id="searchTable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              <th>Delivery Address</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT ". $startingLimitNo .','. $resultPerPage; $result = mysqli_query($conn, $sql); $checkRecord = mysqli_num_rows($result);
if ($checkRecord < 1) {
  echo '<tr><td colspan="11">No Data Found</td></tr>';
} 
 while ($row = mysqli_fetch_array($result)) { ?>
            <tr>	
              <td><?php echo $row['user_id']; ?></td>
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['lastname']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td class="left-align"><?php echo $row['address']; ?></td>
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
      <div class="card-action">
					<?php 
						echo "<ul class='pagination center-align' id='page-container'>";
							for ($page=1; $page <= $noOfPages; $page++) { 
							echo "<li class='waves-effect  pagination-links '>";
								echo '<a class="green-text" href="view_user.php?page='.$page.'">' . $page ." . ". '</a>';
							echo "</li>";
						}
						echo "</ul>";
					?>
				</div>
    </div>	
  <div class="col s12 m0 l2"></div>
</div>    

<?php include 'inc/footer.php'; ?>
