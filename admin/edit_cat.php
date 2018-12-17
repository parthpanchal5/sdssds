<?php 
  session_start();
  include 'inc/conn.php';

  $edit_state = false;
  $catName = $catDesc = $subCatName = '';
  $catName_err = $catDesc_err = $subCatName_err = '';
  // Update
  if (isset($_POST['update'])) {
    $catName = ucwords(mysqli_real_escape_string($conn, $_POST['cat_name']));
    $catDesc = ucwords(mysqli_real_escape_string($conn, $_POST['cat_desc']));
    $subCatName = ucwords(mysqli_real_escape_string($conn, $_POST['sub_cat']));
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    if(empty($catName)){
      $catName_err = "Category name is required";
    }
    if(empty($catDesc)){
      $catDesc_err = "Description is required";
    }
    if(empty($subCatName)){
      $subCatName_err = "Sub-Category is required";
    }
    else{
      if(preg_match("/^[0-9]*$/", $catName)){
        $catName_err = "Invalid Category Name";
      }else{
        if(strlen($catDesc) > 200){
          $catDesc_err = "Maximum length exceded (Limit: 200)";
        }else{
          $sql = "UPDATE category SET cat_name = '$catName', sub_cat_name = '$subCatName',cat_desc = '$catDesc' WHERE cat_id = $id";
          mysqli_query($conn, $sql);
          header("Location:view_cat.php?Updated");
          exit;
        }
      }
    }
  }
  
  // Fetch Data into textbox
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $getRecord = mysqli_query($conn, "SELECT * FROM category WHERE cat_id = $id");
    $storeRecord = mysqli_fetch_array($getRecord);
    $catName = $storeRecord['cat_name'];
    $catDesc = $storeRecord['cat_desc'];
    $subCatName = $storeRecord['sub_cat_name'];
  }
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col s12 m4 l3"></div>
    <div class="col s12 m4 l6" style="margin-top: 20px;">
      <div class="card">
        <div class="card-content">
          <h4 class="center">Edit Category</h4>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style="margin-top: 30px;">
				      <div class="row">
							  <div class="input-field col s12">
									<input type="text" name="cat_name" autocomplete="off" class="validate <?php echo (!empty($catDesc_err)) ? 'invalid' : ''; ?>" value="<?php echo $catName; ?>">
									<label for="category">Category Name</label>
                  <span class="red-text animated fadeIn"><?php echo $catName_err; ?></span>    
							  </div>
						  </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name="sub_cat" autocomplete="off" value="<?php echo $subCatName; ?>" class="<?php echo (!empty($subCatName_err)) ? 'invalid' : ''; ?>">
                  <label for="sub-category">Sub-Category</label>
								  <span class="red-text animted fadeIn"><?php echo $subCatName_err; ?></span>
                </div>
              </div>
						  <div class="row">
                <div class="input-field col s12">
                  <textarea id="desc" name="cat_desc" class="materialize-textarea <?php echo (!empty($catDesc_err)) ? 'invalid' : ''; ?>" autocomplete="off"><?php echo $catDesc; ?></textarea>
                  <label for="desc">Category Description</label>    
                  <span class="red-text animated fadeIn"><?php echo $catDesc_err; ?></span>    
                </div>
              </div> 
						  <div class="row">
							<div class="input-field">
								<?php if ($edit_state == true) : ?> 
								  <input type="hidden" name="id" value="<?php echo $id; ?>">
								  <input type="submit" value="Update" name="update" class="btn blue">
								<?php endif; ?>
							</div>
						</div>                    
				  </div>
			  </form>          
      </div>
    </div>
  </div>
  <div class="col s12 m4 l3"></div>
</div>
<?php include 'inc/footer.php'; ?>