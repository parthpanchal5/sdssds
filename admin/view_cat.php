<?php 
    session_start();
		include 'inc/conn.php';

		// Delete
		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			mysqli_query($conn, "DELETE FROM category WHERE cat_id = $id");
			header("Location:view_cat.php?Deleted");
		}
		
		$sql = "SELECT * FROM category";
		$result = mysqli_query($conn, $sql);

?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>


<div class="container-fluid">
	<h3 class="center">Category</h3>
  <div class="row">
    <div class="col s12 m2 l3"></div>
    <div class="col s12 m8 l6">
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
              <th>Cat Id</th>
              <th>Category</th>
              <th>Sub Category</th>
              <th>Category Desc</th>
              <th>Created on</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>	
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><?php echo $row[3]; ?></td>
              <td><?php echo $row[4]; ?></td>
              <td>
                <a href="edit_cat.php?edit=<?php echo $row['cat_id']; ?>" class="blue-text">edit <i class="fa fa-edit"></i></a> | 
                <a href="view_cat.php?delete=<?php echo $row['cat_id']; ?>" id="deleteBtn" class="red-text">delete <i class="fa fa-trash"></i></a>
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

        