<?php 
    session_start();
    include 'inc/conn.php';

    $catName = $catDesc = $subCatName = '';
    $catName_err = $catDesc_err = $subCatName_err = '';
    
    if(isset($_POST['submit'])){
      $catName = ucwords(mysqli_real_escape_string($conn, $_POST['cat_name']));
      $catDesc = ucwords(mysqli_real_escape_string($conn, $_POST['cat_desc']));
      $subCatName = ucwords(mysqli_real_escape_string($conn, $_POST['sub_cat']));


      // Empty fields
      if(empty($catName)){
        $catName_err = "Category name required";
      }
      if(empty($catDesc)){
        $catDesc_err = "Category Description required";
      }
      if(empty($subCatName)){
        $subCatName_err = "Sub-Category required";
      }
      else{
        if(preg_match("/^[0-9]*$/", $catName)){
          $catName_err = "Invalid Category Name";
        }
        // if(preg_match("/^[0-9]*$/", $subCatName)){
        //   $subCatName_err = "Invalid Category Name";
        // }
        else{
          if(strlen($catDesc) > 200){
            $catDesc_err = "Maximum length exceded (Limit: 200)";
          }else{
            $sql = "INSERT INTO category (cat_name, sub_cat_name, cat_desc) VALUES ('$catName', '$subCatName', '$catDesc')";
            $result = mysqli_query($conn, $sql);
            header("Location:view_cat.php?inserted");
            exit;
          }
        }
      }      
    }
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
  <h3 class="center" style="margin-top: 1em;">Add Category</h3>
  <div class="row"> 
  <span class="green-text"><?php $msg; ?></span>
    <div class="col s12 m2 l3"></div>
    <div class="col s12 m12 l6">
      <div class="card" style="margin-top: 30px;">
        <div class="card-content">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="cat_name" autocomplete="off" value="<?php echo $catName; ?>" class="<?php echo (!empty($catName_err)) ? 'invalid' : ''; ?>">
                <label for="category">Category</label>
								<span class="red-text animted fadeIn"><?php echo $catName_err; ?></span>
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
            <input type="submit" value="Save" name="submit" class="btn blue lighten-1" style="margin-right: 20px;">
            <input type="reset" value="Cancel" class="btn grey ">
          </form>
        </div>
      </div>
    </div>
    <div class="col s12 m2 l3"></div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
