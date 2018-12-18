<?php
  session_start();
  include 'inc/conn.php';
  include 'inc/header.php';
  if(isset($_GET['q'])){
    $productSearchId = mysqli_real_escape_string($conn, $_GET['q']);
    $productSearchQuery = "SELECT * FROM item WHERE item_name LIKE '%$productSearchId%'";
    $resultOfSearchQuery = mysqli_query($conn, $productSearchQuery);
    // $row1 = mysqli_fetch_array($resultOfSearchQuery);
    // print_r($row1);
  }
  
?>
<?php include 'inc/mainnav.php'; ?>
  <div class="container-fluid" style="margin: 10px 20px 0px 20px !important;">
    <div class="row">
      <div class="col l3 xl3">
        <ul class="collapsible">
          <li>
            <div class="collapsible-header" tabindex="0">
              <i class="material-icons">filter_list</i>Filters</div>
            <div class="collapsible-body">
              
            </div>
          </li>
          <li>
            <div class="collapsible-header" tabindex="0">
              <i class="material-icons">sort</i>Sort By</div>
            <div class="collapsible-body">
              
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 l9 xl9 m12">
        <div class="card-panel">
          <p class="left">You Searched for: <?php echo ('<span class="blue-text">'.ucwords($productSearchId).'</span>'); ?></p>
          <table class="table striped animated fadeIn">
          <?php while($row = mysqli_fetch_array($resultOfSearchQuery)) { ?>
            <tr>
              <td><img src="admin/img/<?php echo $row[3]; ?>" class="materialboxed" height="320" width="320" data-caption="<?php echo $row[2];?>" alt="<?php echo $row[2]; ?>"></td>
              <td><?= $row[2];?></td>
              <td><p id="product-desc"><?= $row[5]; ?> <a href="product.php?pid=<?= $row[0]; ?>" class="truncate">See more...</a></p></td>
              <td><i class="fa fa-rupee-sign"></i> <?= $row[6]; ?></td>
            </tr>
            <tr>
              <td colspan="2" class="left-align"><a href="product.php?pid=<?= $row[0]; ?>" class="btn teal btn-small" style="margin-right: 20px;">See more <i class="fa fa-eye"></i></a> <a href="cart.php?pid=<?= $row[0]; ?>" class="btn amber darken-1 btn-small">Add to cart <i class="fa fa-shopping-cart"></i></a></td>
              
            </tr>
            <?php } 
              if($row < 1){
                  echo "<td>
                          <img src='img/error.png' class='responsive-img'/>
                          <h4 class='center'>Something's not right</h4>
                          <span class='grey-text'>Please try again later</span><br>
                          <a href='index.php' class='btn btn-medium blue darken-1' style='margin: 20px 0px;'>Go back</a>
                        </td>";
                }?>
          </table>
        </div>
      </div>  
    </div>
  </div>
<?php include 'inc/footer.php'; ?>
