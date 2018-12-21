<?php
  session_start();
  include 'inc/conn.php';
  include 'inc/header.php';
  include 'sort.php';

  if(isset($_GET['q'])){
    $productSearchId = mysqli_real_escape_string($conn, $_GET['q']);
    $productSearchQuery = "SELECT * FROM item WHERE item_name LIKE '%$productSearchId%'";
    $resultOfSearchQuery = mysqli_query($conn, $productSearchQuery);

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
      }
      
    }
  }
 
  
  
?>
<?php include 'inc/mainnav.php'; ?>
  <div class="container-fluid" style="margin: 10px 20px 0px 20px !important;">
    <div class="row">
      <div class="col l3 xl3">
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
                <li style="margin: 0px 0px 20px 0px;!important"><a href="search.php?q=<?php echo $productSearchId; ?>&sort_order=low" class="blue-text">Price: Low to High</a></li>
                <li><a href="search.php?q=<?php echo $productSearchId; ?>&sort_order=high" class="blue-text">Price: High to Low</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 l9 xl9 m12">
        <div class="card-panel">
          <p class="left">You Searched for: <?php echo ucwords('<span class="blue-text darken-2">'.ucwords($productSearchId).'</span>'); ?></p>
          <table class="table striped animated fadeIn">
          <?php while($row = mysqli_fetch_array($resultOfSearchQuery)) { ?>
            <tr>
              <td><img src="admin/img/<?php echo $row[3]; ?>" class="left" height="420" width="360" alt="<?php echo $row[2]; ?>"></td>
              <td><?= $row[2];?></td>
              <td><p id="product-desc"><?= $row[5]; ?> <a href="product.php?pid=<?= $row[0]; ?>" class="truncate">See more...</a></p></td>
              <td><i class="fa fa-rupee-sign"></i> <?= $row[6]; ?></td>
            </tr>
            <tr>
              <td colspan="2" class="left-align"><a href="product.php?pid=<?= $row[0]; ?>" class="btn teal btn-small" style="margin-right: 20px;">See more <i class="fa fa-eye"></i></a> <a href="cart.php?pid=<?= $row[0]; ?>" class="btn amber darken-1 btn-small">Add to cart <i class="fa fa-shopping-cart"></i></a></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>  
    </div>
  </div>
<?php include 'inc/footer.php'; ?>
