<?php 
    session_start();
		include 'inc/conn.php';

		// Delete
		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			mysqli_query($conn, "DELETE FROM category WHERE cat_id = $id");
			header("Location:view_cat.php?Deleted");
    }
    
    // Define results per page
	  $resultPerPage = 3;

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
		
		$sql = "SELECT * FROM category LIMIT " . $startingLimitNo . '.' . $resultPerPage;
    $result = mysqli_query($conn, $sql);
    

?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>


<div class="container-fluid">
  <h4 class="center">Category</h4>
  <?php $sql3 = "SELECT COUNT(`cat_id`) FROM category"; $result2 = mysqli_query($conn, $sql3); while($row = mysqli_fetch_array($result2)) { ?>
    <p class="center">Total no of categories: <h5 class="center"><?php echo $row[0]; ?></h5></p>
  <?php }?>
  <?php ?>
  <div class="row">
    <div class="col s12 m2 l3"></div>
    <!-- <div class="col s12 m8 l6">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" type="text" name="q" class="validate">
            <label for="icon_prefix">Search Categories</label>
          </div>
          <input type="submit" class="right btn btn-small blue lighten-1" value="search"> 
        </div>
      </form>
    </div> -->
    <div class="col s12 m2 l3"></div>
  </div>
  <div class="row">
    <div class="col s12 m0 l2"></div>
    <div class="col s12 m12 l8 black-text" id="content">
      <div class="card hoverable">  
        <div class="card-content">
          <table class="highlight animated fadeIn responsive-table black-text center-align" style="margin-top: 10px;"  id="searchTable">
          <thead>
            <tr>
              <th>Cat Id</th>
              <th>Category</th>
              <th>Sub Category</th>
              <th>Category Desc</th>
              <th>Created on</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $sql = "SELECT * FROM category LIMIT " . $startingLimitNo .','. $resultPerPage; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)){ ?>
            <tr>	
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><?php echo $row[3]; ?></td>
              <td><?php echo $row[4]; ?></td>
              <td>
                <a href="edit_cat.php?edit=<?php echo $row['cat_id']; ?>" class="blue-text"><i class="fa fa-edit"></i></a> | 
                <a href="view_cat.php?delete=<?php echo $row['cat_id']; ?>" id="deleteBtn" class="red-text"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php 
            echo "<ul class='pagination center' id='page-container'>";
              for ($page=1; $page <= $noOfPages; $page++) { 
              echo "<li class='waves-effect pagination-links'>";
                echo '<a href="view_cat.php?page='.$page.'">'. $page . '</a>';
              echo "</li>";
            }
            echo "</ul>";
          ?>
      </div>    
    </div>	
  <div class="col s12 m0 l2"></div>
</div>    
<?php include 'inc/footer.php'; ?>

        