<?php
	include 'inc/header.php';
	include 'inc/conn.php';

  // if(!isset($_GET['pid'])){
  //   $productId = mysqli_real_escape_string($conn, $_GET['pid']);
  //   if($productId == '' || empty($productId)){
  //     $errorImg = '<img src="img/error.png" class="responsive-img"/>';
  //   }
  // }


?>


<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>

<!--Content area-->
<div class="container-fluid" style="margin: 15px 10px 10px 10px;">
  <div class="row animated fadeIn">
    <div class="col s12 m12 l6 xl6">
      <div class="card">
       <?php if(isset($_GET['pid'])){ $productId = mysqli_real_escape_string($conn, $_GET['pid']); $sql = "SELECT * FROM item WHERE item_id = $productId"; $result = mysqli_query($conn, $sql); } while ($row = mysqli_fetch_array($result)) { ?>
        <div class="card-image">
          <img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" class="materialboxed responsive-img" data-caption="<?php echo $row[2]; ?>">
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6 xl6">
    <form action="cart.php?action=add&pid=<?php echo $row[0]; ?>" method="POST">
      <?php echo $errorImg; ?>
      <div class="card-panel animated fadeIn">
        <table class="table striped">
          <tr>
            <th colspan="2"><h5><?php echo $row[2]; ?></h5></th>
          </tr>
          <tr>
            <th class="left">Description: </th>
            <td style="text-align:left;"><?php echo $row[5];?></td>
          </tr>
          <tr>
            <th class="left">Price:</th>
            <td><?php echo $row[6];?> <i class="fas fa-rupee-sign"></i></td>
          </tr>
          <tr>
            <th class="left">Delivery:</th>
            <td class="green-text" style="text-transform:uppercase;">Free</td>
          </tr>
          <tr>
            <th class="left">Category: </th>
            <td><?php echo $row[4]; ?><br></td>
          </tr>
          <tr>
            <th class="left">Ratings: </th>
            <td>
              <a class="tooltipped black-text rounded" data-position="right" data-tooltip="Total Ratings: 4.5"><i class="fa fa-star amber-text darken-4"></i><span style="margin-left: 8px;">4.5</span></a>
            </td>
          </tr>
          <tr>
            <th class="left">Availability: </th>
            <?php include 'range.php'; ?>
          </tr>
					<?php if($row[7] > 4): ?>

						<tr>
							<th class="left">Qty: </th>
							<td>
								<input type="number" min="1" max="5" value="1" name="quantity">
							</td>
						</tr>
					<?php endif;?>

					<tr>
						<td colspan='2' class='left-align'>
							<?php if($row[7] <= 4): ?>
								<a href='#' class='btn btn-large blue darken-1 left'>Notify me <i class='fa fa-bell fa-1x' style='font-size: 15px; margin-left: 10px;'></i></a>
							<?php else:?>
								<button type="submit" name="add_to_cart" class="btn btn-large amber darken-2" style="font-family: 'Poppins', sans-serif !important;">Add to cart <i class="fa fa-shopping-cart" style="font-size: 16px;"></i></button>
								<a href='cart.php?pid=<?php echo $row[0]; ?>' target='_blank' class='btn btn-large amber darken-4 right'>Buy now <i class='fas fa-bolt'style="font-size: 16px;"></i></a>
							</td>
              <?php endif;?>

            </td>
            <input type="hidden" name="hidden_name" value="<?php echo $row['item_name']; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row['item_price']; ?>">
            <input type="hidden" name="hidden_img" value="<?php echo $row['item_img']; ?>">
          </tr>
          </form>
        </table>
      </div>
			<?php  } ?>
  </div>

	<div class="col s12 m12 xl6">
		<div class="card-panel">
			<div class="card-title"><h5>Ratings & Review</h5></div><hr>
				<div class="card-content">
					<table class="table">
						<tbody>
							<tr>
								<td class="left-align"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam cumque eius voluptas at ipsum provident blanditiis, labore neque quo non! At! <br> <span class=" grey-text" style="margin-top: 20px;">-By Parth Panchal <a class="tooltipped black-text rounded" style="margin-left: 10px;" data-position="right" data-tooltip="Ratings: 4.5"><i class="amber-text darken-4 fa fa-star"></i><span style="margin-left: 8px;">4.5</span></a></span></span></td>
							</tr>
							<tr>
								<td class="left-align"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam cumque eius voluptas at ipsum provident blanditiis, labore neque quo non! At! <br> <span class=" grey-text">-By Parth Panchal <a class="tooltipped black-text rounded" style="margin-left: 10px;" data-position="right" data-tooltip="Ratings: 4.5"><i class="amber-text darken-4 fa fa-star"></i><span style="margin-left: 8px;">4.5</span></a></span></span></td>
							</tr>
							<tr>
								<td class="left-align"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam cumque eius voluptas at ipsum provident blanditiis, labore neque quo non! At! <br> <span class=" grey-text">-By Parth Panchal <a class="tooltipped black-text rounded" style="margin-left: 10px;" data-position="right" data-tooltip="Ratings: 4.5"><i class="amber-text darken-4 fa fa-star"></i><span style="margin-left: 8px;">4.5</span></a></span></span></td>
							</tr>
							<tr>
								<td class="left-align"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam cumque eius voluptas at ipsum provident blanditiis, labore neque quo non! At! <br> <span class=" grey-text">-By Parth Panchal <a class="tooltipped black-text rounded" style="margin-left: 10px;" data-position="right" data-tooltip="Ratings: 4.5"><i class="amber-text darken-4 fa fa-star"></i><span style="margin-left: 8px;">4.5</span></a></span></span></td>
							</tr>
							<tr>
								<td class="left-align"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam cumque eius voluptas at ipsum provident blanditiis, labore neque quo non! At! <br> <span class=" grey-text">-By Parth Panchal <a class="tooltipped black-text rounded" style="margin-left: 10px;" data-position="right" data-tooltip="Ratings: 4.5"><i class="amber-text darken-4 fa fa-star"></i><span style="margin-left: 8px;">4.5</span></a></span></span></td>
							</tr>

							
						</tbody>
					</table>
				</div>										
		</div>
	</div>


  <!-- <div class="col s12 m12 l6 xl6">
    <div class="card-panel">
      <h6>Users who also bought this items</h6>
      <?php $productCat = mysqli_real_escape_string($conn, $_GET['pcat']); $sqlForItems = "SELECT * FROM `item` WHERE `item_cat` = '$productCat' ORDER BY item_price LIMIT 2"; $resultForItems = mysqli_query($conn, $sqlForItems);  while($rowForItems = mysqli_fetch_array($resultForItems)) {?>
        <div class="card" style="margin: 20px 0px;">
          <div class="card-image">
            <img src="admin/img/<?php echo $rowForItems[3]; ?>">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-size: 16px;"><?php echo $rowForItems[2]; ?></span>
              <a href="product.php?pcat=<?php echo $rowForItems[4]; ?>&pname=<?php echo $rowForItems[2]; ?>&pid=<?php echo $rowForItems[0]; ?>" target="_blank">See more</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div> -->
	</div>

<?php include 'inc/footer.php'; ?>



