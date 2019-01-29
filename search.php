<?php
  include 'inc/header.php';
  include 'inc/conn.php';
  
  

  if(isset($_GET['q'])){
    $productSearchId = mysqli_real_escape_string($conn, $_GET['q']);
    $productSearchQuery = "SELECT `item_id`, `cat_id`, `item_name`, `item_img`, `item_cat`, `item_desc`, `item_price`, `item_qty`, `sub_category` FROM item WHERE item_name LIKE '%$productSearchId%'";
    $resultOfSearchQuery = mysqli_query($conn, $productSearchQuery);
    
    if(empty($productSearchId)){
      header('Location:index.php');
    }
   
     // check sort options is clicked
    if(isset($_GET['sort_order'])){
      $sortOrder = mysqli_real_escape_string($conn, $_GET['sort_order']);
  
      if($sortOrder === "low"){
        $sqlForSorting = "SELECT * FROM `item` WHERE item_name LIKE '%$productSearchId%' ORDER BY `item_price` ASC";
        $resultOfSearchQuery = mysqli_query($conn, $sqlForSorting);
      }
      else if($sortOrder === "high"){
        $sqlForSorting = "SELECT * FROM `item` WHERE item_name LIKE '%$productSearchId%' ORDER BY `item_price` DESC";
        $resultOfSearchQuery = mysqli_query($conn, $sqlForSorting);
      }else if($sortOrder === "new"){
        $sqlForSorting = "SELECT * FROM `item` WHERE item_name LIKE '%$productSearchId%' ORDER BY `created_at` DESC";
        $resultOfSearchQuery = mysqli_query($conn, $sqlForSorting);
      } 
    } 
  }
?>
<?php include 'inc/mainnav.php'; ?>

  <div class="container-fluid" style="margin: 10px 10px 0px 10px !important;">
    <div class="row">
      <div class="col s12 l3 xl3">
        <ul class="collapsible">
          <li class="bold">
            <div class="collapsible-header" tabindex="0">
             <i class="material-icons">filter_list</i>Filters
            </div>
		        <div class="collapsible-body">
              <ul>
                <li><a href="filter.php" class="blue-text">df</a></li>
              </ul>
		        </div>
	        </li>
          <li>
            <div class="collapsible-header" tabindex="0">
              <i class="material-icons">sort</i>Sort By</div>
            <div class="collapsible-body">
            <ul>
              <li style="margin: 0px 0px 20px 0px;!important"><a href="search.php?q=<?php echo $productSearchId; ?>&sort_order=new" class="blue-text">Latest</a><br></li>
              <li style="margin: 0px 0px 20px 0px;!important"><a href="search.php?q=<?php echo $productSearchId; ?>&sort_order=low" class="blue-text">Price: Low to High</a></li>
              <li><a href="search.php?q=<?php echo $productSearchId; ?>&sort_order=high" class="blue-text">Price: High to Low</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 l9 xl9 m12">
        <div class="card-panel">
          <p class="left">You Searched for: <?php echo ucwords('<span class="blue-text darken-2">'.ucwords($productSearchId).'</span>'); ?></p><br>
          <!-- <p class="left">Products Found: <?php echo ('<span class="blue-text darken-2">'.$resultForCount. '</span>'); ?></p> -->
          <table class="table striped animated fadeIn">

          <?php while($row = mysqli_fetch_array($resultOfSearchQuery)) { ?>

            <tr>
              <td class="left-align"><a href="product.php?pname=<?= $row[2]; ?>&pcat=<?= $row[4]; ?>&pid=<?= $row[0]; ?>" target="_blank"><img src="admin/img/<?php echo $row[3]; ?>" height="300" width="250" id="search-img" alt="<?php echo $row[2]; ?>"></a><br><?= $row[2];?></td>
              <td class="left-align"><p id="product-desc" ><?= $row[5]; ?> <a href="product.php?pname=<?= $row[2]; ?>&pid=<?= $row[0]; ?>" class="truncate" target="_blank">See more...</a></p></td>
              <td><p class="left-align"><i class="fa fa-rupee-sign"></i> <?= $row[6]; ?></p></td>
            </tr>
  
            <?php } ?>
          
          </table>
        </div>
      </div>  
    </div>
  </div>


<?php include 'inc/footer.php'; ?>
