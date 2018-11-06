<?php 
	session_start(); 
	include 'inc/conn.php';
	
	$itemName = $itemPrice = $category = $qty = $status = $itemDesc  = $subCat = '';
	$itemName_err = $itemPrice_err = $category_err = $qty_err = $status_err = $itemDesc_err = $subCat_err = '';

	if(isset($_POST['add'])){
		
		$itemName = ucwords(mysqli_real_escape_string($conn, $_POST['item_name']));
		$itemPrice = mysqli_real_escape_string($conn, $_POST['price']);
		$category = mysqli_real_escape_string($conn, $_POST['item_cat']);
		$subCat = mysqli_real_escape_string($conn, $_POST['sub_cat']);
		$qty = mysqli_real_escape_string($conn, $_POST['qty']);
		$status = mysqli_real_escape_string($conn, $_POST['status']);
		$itemDesc = mysqli_real_escape_string($conn, $_POST['item_desc']);

		// Vars for img-file
		$file = $_FILES['item_img'];
		$fileName = $_FILES['item_img']['name'];
		$fileTmpName = $_FILES['item_img']['tmp_name'];
		$fileSize = $_FILES['item_img']['size'];
		$fileError = $_FILES['item_img']['error'];
		$fileType = $_FILES['item_img']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowedExt = array('jpg', 'jpeg', 'png', 'pdf', 'JPG', 'JPEG', 'PDF', 'PNG');
		
		// File condition block
		if(in_array($fileActualExt, $allowedExt)){
			if($fileError === 0){
				if($fileSize < 100000000){
					$random = rand(6000, 8000);
					// $newFileName = $random.$fileActualExt;
					$newFileName = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'img/'.$newFileName;
					
					move_uploaded_file($fileTmpName, $fileDestination);
				}else{
					echo "File is too big";		
				}
			}else{
				echo "There was an error uploading file";	
			}
		}
		if(empty($itemName)){
			$itemName_err = "Item name is required";
		}
		if(empty($itemPrice)){
			$itemPrice_err = "Price is required";
		}
		if($category === 'none'){
			$category_err = "Please select category";
		}
		if($subCat === 'none'){
			$subCat_err = "Please select sub-category";
		}
		if(empty($qty)){
			$qty_err = "Please enter quantity";
		}
		if($status === 'none'){
			$status_err ="Please select Status";
		}
		if(empty($itemDesc)){
			$itemDesc_err = "Item Descripton is required";
		}
		// if(!preg_match("/^[a-zA-Z]$/", $itemName)){
		// 	$itemName_err = "Invalid Item name";
		// }
		else{
			if(!preg_match("/^[0-9.,]*$/", $itemPrice)){
				$itemPrice_err = "Invalid amount";
			}else{
				if(!preg_match("/^[0-9]*$/", $qty)){
					$qty_err = "Please insert quantity";
				}else{
					$sql = "INSERT INTO item(`cat_id`, `item_name`, `item_img`, `item_cat`, `item_desc`, `item_price`, `item_qty`, `status`, `sub_category`) VALUES((SELECT	`cat_id` FROM category WHERE cat_name = '$category'),	'$itemName', '$newFileName', '$category', '$itemDesc', '$itemPrice', '$qty', '$status', '$subCat');";
					$result = mysqli_query($conn, $sql);
					echo $sql;
					// header("Location:insert_item.php");
					// exit;
				}
			}
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
    <h3 class="center" style="margin-top: 1em;">Add items</h3>
		<div class="row">
			<div class="col s12 m2 l2"></div>
			<div class="col s12 m12 l8">
				<div class="card hoverable">
					<div class="card-content">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="input-field col s6">
									<input type="text" name="item_name" autocomplete="off" id="name" value="<?php echo $itemName; ?>" >
									<label for="item_name">Item name</label>
									<span class="red-text animated fadeIn"><?php echo $itemName_err; ?></span>
								</div>
								<div class="input-field col s6">
									<input type="text" name="price" autocomplete="off" id="price" value="<?php echo $itemPrice; ?>" >
									<label for="price">Item Price <i class="fas fa-rupee-sign"></i></label>
									<span class="red-text animated fadeIn"><?php echo $itemPrice_err; ?></span>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
    							<select name="item_cat" >
										<option value="none" selected>Category Listing</option>
										<?php $sql = "SELECT * FROM category"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
										<option class="blue-text" value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
										<?php }?>
    							</select>
    							<label>Select Category</label>
									<span class="red-text animated fadeIn"><?php echo $category_err; ?></span>
								</div>
								<div class="input-field col s6">
    							<select name="sub_cat" >
										<option value="none" selected>Sub-Category</option>
										<?php $sql = "SELECT * FROM category"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)) { ?>
										<option class="blue-text" value="<?php echo $row[2]; ?>"><?php echo $row[2]; ?></option>
										<?php }?>
    							</select>
    							<label>Select Sub-Category</label>
									<span class="red-text animated fadeIn"><?php echo $category_err; ?></span>
								</div>
							</div>
							<div class="row">	
								<div class="input-field col s6">
									<input type="text" name="qty" id="qty" value="<?php echo $qty; ?>" >
									<label for="qty">Quantity (x1)</label>
									<span class="red-text"><?php echo $qty_err; ?></span>
								</div>
								<div class="input-field col s6">
									<select name="status" >
										<option value="none"selected>Status</option>
										<option value="available">Available</option>
										<option value="Out of Stock">Out of stock</option>
										<option value="Low Stock">Low stock</option>
    							</select>
    							<label>Status</label>
									<span class="red-text animated fadeIn"><?php echo $status_err; ?></span>
  							</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="item_desc" name="item_desc" class="materialize-textarea <?php echo (!empty($catDesc_err)) ? 'invalid' : ''; ?>" autocomplete="off"><?php echo $itemDesc; ?></textarea>
									<label for="item_desc">Item Description</label>    
									<span class="red-text animated fadeIn"><?php echo $itemDesc_err; ?></span>    
								</div>
            	</div>
							<div class="row">
								<div class="file-field input-field">
      						<div class="btn right btn-small blue lighten-1 rounded" style="border-radius: 50px !important;">
        						<span>Upload <i class="fa fa-upload fa-1x"></i></span>
        						<input type="file" name="item_img" value="<?php echo $newFileName; ?>">
      						</div>
      						<div class="file-path-wrapper">
        						<input class="file-path validate"  name="img-name" type="text">
      						</div>
    						</div>							
							</div>
							<input type="submit" name="add" value="Add" class="btn green lighten-1" style="margin-right: 20px;">
							<input type="reset" value="Cancel" class="btn grey lighten-1">
						</form>
					</div>
				</div>
			</div>
			<div class="col s12 m2 l2"></div>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>

        