<?php 
	session_start(); 
  include 'inc/conn.php';

  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM item WHERE item_id = $id");
    header("Location:view_item.php?Deleted");
  }
  // Define results per page
	$resultPerPage = 3;

  $sql1 = "SELECT * FROM item";
  $result1 = mysqli_query($conn, $sql1);
  $noOfResults = mysqli_num_rows($result1);


  // Determine no of total pages available
  $noOfPages = ceil($noOfResults / $resultPerPage);
  
  // Determine which page number visitor is on
	if (!isset($_GET['page'])) {
		$page = 1;
	}else{
		$page = $_GET['page'];
  }
  
  // Determine sql LIMIT starting no for result on the displaying page
  $startingLimitNo = ($page - 1) * $resultPerPage;	
  
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col s12 m0 l0"></div>
    <div class="col s12 m12 l12">
      <h3 class="center">View Item</h3>            
      <?php $sql = "SELECT COUNT(`item_id`) FROM item"; $result1 = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result1)) { ?>
      <p class="center">Total no of products: <h5 class="center-align"><?php echo $row[0]; ?></h5></p>
      <?php }?>
      <div class="card-panel">
        <div class="card-content">
          <table class="table highlight responsive-table striped animated fadeIn">
            <thead>
              <th>Id</th>
              <th>Name</th>
              <th id="admin-prod-row">Image</th>
              <th>Category</th>
              <th>Sub-Category</th>
              <th>Description</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Discounted Price</th>
              <th>Qty</th>
              <th style="padding: 40px;">Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $sql = "SELECT * FROM item LIMIT " . $startingLimitNo .','. $resultPerPage; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)){ ?>
              <tr>
                <td><b><?php echo $row[0];?></b></td>
                <td><?php echo $row['item_name'];?></td>
                <td><img src="img/<?php echo $row['item_img'];?>" alt="<?php echo $row['item_name']; ?>" class="materialboxed" data-caption="<?php echo $row['item_name']; ?>" id="admin-prod-img" width="120"></td>
                <td><?php echo $row['item_cat'];?></td>
                <td><?php echo $row['sub_category'];?></td>
                <td><p id="admin-product-desc"><?php echo $row['item_desc']; ?></p></td>
                <td><?php echo number_format($row['item_price'], 1);?> <i class="fa fa-rupee-sign green-text"></i></td>
                <td><?php echo number_format($row['discount'], 1);?>% </td>
                <td>
                  <?php 
                    $sp = $row['item_price'] - ($row['item_price'] * ($row['discount'] / 100));
                    echo number_format($sp, 2);
                  ?> <i class="fa fa-rupee-sign green-text"></i>
                </td>
                <td><?php echo $row['item_qty'];?></td>
                <?php 
                  if($row['item_qty'] <= 4){
                    echo "<td><span class='chips rounded red white-text' style='padding: 6px;'>Out of stock</span></td>";
                  }else if($row['item_qty'] >= 5 && $row['item_qty'] <= 50){
                    echo "<td><span class='chips rounded yellow darken-4 white-text' style='padding: 6px;'>Low Stock</span></td>";
                  }else if($row['item_qty'] >= 51 && $row['item_qty'] <= 100){
                    echo "<td><span class='chips rounded blue darken-1 white-text' style='padding: 6px;'>Few left</span></td>";
                  }else if($row['item_qty'] >= 101 && $row['item_qty'] >= 350){
                    echo "<td><span class='chips rounded green darken-2 white-text' style='padding: 5px;'>Available</span></td>";
                  }
                ?>
                <td>
                  <a href="edit_item.php?edit=<?php echo $row[0]; ?>" class="blue-text"><i class="fa fa-edit"></i></a> | 
                  <a href="view_item.php?delete=<?php echo $row[0]; ?>" id="deleteBtn" class="red-text"><i class="fa fa-trash"></i></a>
                </td>
                <?php  } ?>
              </tr>
            </tbody>
          </table>
          <?php 
            echo "<ul class='pagination center' id='page-container'>";
              for ($page=1; $page <= $noOfPages; $page++) { 
              echo "<li class='waves-effect pagination-links'>";
                echo '<a href="view_item.php?page='.$page.'">'. $page . '</a>';
              echo "</li>";
            }
            echo "</ul>";
          ?>
        </div>
      </div>      
    </div>
    <div class="col s12 m0 l0"></div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
