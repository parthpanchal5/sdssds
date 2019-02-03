<?php 
	include 'inc/conn.php';
	include 'inc/header.php';
	
	$itemName = $itemPrice = $category = $qty = $itemDesc  = $subCat = $discount = '';
	$itemName_err = $itemPrice_err = $category_err = $qty_err = $itemDesc_err = $subCat_err = $discount_err = '';

	if(isset($_POST['add'])){
		
		$itemName = ucwords(mysqli_real_escape_string($conn, $_POST['item_name']));
		$itemPrice = mysqli_real_escape_string($conn, $_POST['price']);
		$category = mysqli_real_escape_string($conn, $_POST['item_cat']);
		$subCat = mysqli_real_escape_string($conn, $_POST['sub_cat']);
		$qty = mysqli_real_escape_string($conn, $_POST['qty']);
		$itemDesc = mysqli_real_escape_string($conn, $_POST['item_desc']);
		$discount = mysqli_real_escape_string($conn, $_POST['disc']);


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
		if(empty($itemDesc)){
			$itemDesc_err = "Item Descripton is required";
		}
		if(empty($discount)){
			$discount = "0.0";
			$discount_err = "Can't be blank";
		}
		else{
			if(!preg_match("/^[0-9.,]*$/", $itemPrice)){
				$itemPrice_err = "Invalid amount";
			}else{
				if(!preg_match("/^[0-9]*$/", $qty)){
					$qty_err = "Please insert quantity";
				}else{
						$sql1 = "SELECT * FROM category"; $result1 = mysqli_query($conn, $sql1); while($row = mysqli_fetch_array($result1)){ $cat_id = $row[0];
						$sql = "INSERT INTO item (`cat_id`, `item_name`, `item_img`, `item_cat`, `item_desc`, `item_price`, `item_qty`, `sub_category`, `discount`) VALUES ((SELECT `cat_id` FROM category WHERE `cat_id` = '$cat_id'),	'$itemName', '$newFileName', '$category', '$itemDesc', '$itemPrice', '$qty', '$subCat', '$discount')";
					} 
					$result = mysqli_query($conn, $sql);
					// echo $sql;
					header("Location:view_item.php?s=su");
					exit;
				}
			}
		}
	}
?>

<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
    <h3 class="center" style="margin-top: 1em;">Add items</h3>
		<div class="row">
			<div class="col s12 m2 l2"></div>
			<div class="col s12 m12 l8">
				<div class="card hoverable">
					<div class="card-content">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="input-field col s12 m12 l6 xl6">
									<input type="text" name="item_name" autocomplete="off" class="<?php echo (!empty($itemName_err)) ? 'invalid' : '';?>" id="name" value="<?php echo $itemName; ?>" autofocus>
									<label for="item_name">Item name</label>
									<span class="red-text animated fadeIn"><?php echo $itemName_err; ?></span>
								</div>
								<div class="input-field col s12 m12 l6 xl6">
									<input type="text" name="price" class="<?php echo (!empty($itemPrice_err)) ? 'invalid' : ''; ?>" autocomplete="off" id="price" value="<?php echo $itemPrice; ?>" >
									<label for="price">Item Price <i class="fas fa-rupee-sign"></i></label>
									<span class="red-text animated fadeIn"><?php echo $itemPrice_err; ?></span>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m12 l6 xl6">
    							<select name="item_cat" class="browser-default">
										<option value="none" selected>Category</option>

										<?php $sql = "SELECT COUNT(*) AS `Rows`, `cat_name` FROM `category` GROUP BY `cat_name` ORDER BY `cat_name`"; $result = mysqli_query($conn, $sql);  while($row = mysqli_fetch_array($result)) { ?>

										<option class="blue-text" value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>

										<?php } ?>

    							</select>
									<span class="red-text animated fadeIn"><?php echo $category_err; ?></span>
								</div>
								<div class="input-field col s12 m12 l6 xl6">
    							<select name="sub_cat" class="browser-default">
										<option value="none" selected>Sub-Category</option>
										
										<?php $sql = "SELECT * FROM category ORDER BY `sub_cat_name` ASC"; $result = mysqli_query($conn, $sql);  while($row = mysqli_fetch_array($result)) { ?>

										<option class="blue-text" value="<?php echo $row[2]; ?>"><?php echo $row[2]; ?></option>

										<?php } ?>

    							</select>
									<span class="red-text animated fadeIn"><?php echo $subCat_err; ?></span>
								</div>
							</div>
							<div class="row">	
								<div class="input-field col s12 m12 l6 xl6">
									<input type="text" name="qty" id="qty" class="<?php echo (!empty($qty_err)) ? 'invalid' : '';?>" value="<?php echo $qty; ?>" >
									<label for="qty">Quantity (x1)</label>
									<span class="red-text"><?php echo $qty_err; ?></span>
								</div>
								<div class="input-field col s12 m12 l6 xl6">
									<input type="text" name="disc" id="discount" class="<?php echo (!empty($discount_err)) ? 'invalid' : '';?>" value="<?php echo $discount; ?>" >
									<label for="discount">Discount (%)</label>
									<span class="red-text"><?php echo $discount_err; ?></span>
								</div>
							</div>
							<div class="row">
								<div class=" col s12 m12 l12 xl12">
									<!-- <textarea id="item_desc" name="item_desc" class="materialize-textarea <?php echo (!empty($catDesc_err)) ? 'invalid' : ''; ?>" autocomplete="off"></textarea> -->
									<textarea name="item_desc" id="editor" class="<?php echo (!empty($catDesc_err)) ? 'invalid' : ''; ?>"><?php echo $itemDesc; ?></textarea>
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
        						<input class="file-path validate"  name="img-name" placeholder="Img-name" type="text">
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

        