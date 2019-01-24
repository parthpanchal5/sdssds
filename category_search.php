<?php 
  include 'inc/header.php';  	
  include 'inc/conn.php';
  
  if(isset($_GET['cat'])){ 
    $category = mysqli_real_escape_string($conn, $_GET['cat']); 
    $sql_for_cat = "SELECT * FROM item WHERE item_cat = '$category'"; 
    $resultForCat = mysqli_query($conn, $sql_for_cat);
  } 

  if(isset($_GET['sort_order'])){
    $sortOrder = mysqli_real_escape_string($conn, $_GET['sort_order']);

    if($sortOrder === "low"){
      $sqlForSorting = "SELECT * FROM item WHERE item_cat = '$category' ORDER BY `item_price` ASC";
      $resultForCat = mysqli_query($conn, $sqlForSorting);
    }
    else if($sortOrder === "high"){
      $sqlForSorting = "SELECT * FROM item WHERE item_cat = '$category' ORDER BY `item_price` DESC";
      $resultForCat = mysqli_query($conn, $sqlForSorting);
    }else if($sortOrder === "new"){
      $sqlForSorting = "SELECT * FROM item WHERE item_cat = '$category' ORDER BY `created_at` DESC";
      $resultForCat = mysqli_query($conn, $sqlForSorting);
    } 
  } 

  
?>  
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>

<div class="container-fluid" style="margin: 0px 10px;">
<div class="row">
  <div class="col s12 m12 l3 xl3">
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
          <li style="margin: 0px 0px 20px 0px;!important"><a href="category_search.php?cat=<?php echo $category; ?>&sort_order=new" class="blue-text">Latest</a><br></li>
          <li style="margin: 0px 0px 20px 0px;!important"><a href="category_search.php?cat=<?php echo $category; ?>&sort_order=low" class="blue-text">Price: Low to High</a></li>
          <li><a href="category_search.php?cat=<?php echo $category; ?>&sort_order=high" class="blue-text">Price: High to Low</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  <div class="col s12 m12 l8 xl8">
    <div class="card">
      <div class="card-content">
        <p style="padding: 10px;">Category: <span class="blue-text"><?php echo ucwords($_GET['cat']);?></span></p>
        <table class="table striped centered animated fadeIn">

        <?php while($row = mysqli_fetch_array($resultForCat)) { ?>
          
          <tr>
            <td class="left"><img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" height="220"><br><p style="font-size: 15px;"><?php echo $row[2];?></p></td>
            <td class="left-align"><p id="cat-prod-desc"><?php echo $row[5];?></p><span><a href="product.php?pname=<?php echo $row[2];?>&pid=<?php echo $row[0]; ?>">Read more</a></span></td>
            <td style="padding-right: 45px; !important"><i class="fas fa-rupee-sign"></i> <?php echo $row[6];?></td>
            <td>
              
              <?php include 'range.php'; ?>
            
            </td>
            <!-- <td><a href="cart.php?pid=<?php echo $row[0];?>" class="btn btn-small amber darken-2">Add to cart</a></td> -->
            <td></td>
          
          </tr>
        
        <?php } ?>
        
        </table>
      </div>
    </div>
  </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
