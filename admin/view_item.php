<?php 
	session_start(); 
  include 'inc/conn.php';

  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM item WHERE item_id = $id");
    header("Location:view_item.php?Deleted");
  }
  // Define results per page
	$resultPerPage = 4;

  $sql1 = "SELECT * FROM item";
  $result1 = mysqli_query($conn, $sql);
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
      <div class="card-panel hoverable">
        <div class="card-content">
          <table class="table highlight responsive-table stripped">
            <thead>
              <th>Id</th>
              <th>Name</th>
              <th id="admin-prod-row">Image</th>
              <th>Category</th>
              <th>Sub-Category</th>
              <th class="center">Description</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $sql = "SELECT `item_id`, `item_name`, `item_img`, `item_cat`, `item_desc`, `item_price`, `item_qty`, `status`, `sub_category` FROM item LIMIT " . $startingLimitNo .','. $resultPerPage; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)){ ?>
              <tr>
                <td><b><?php echo $row[0];?></b></td>
                <td><?php echo $row[1];?></td>
                <td><img src="img/<?php echo $row[2];?>" alt="<?php echo $row[1]; ?>" class="materialboxed" data-caption="<?php echo $row[1]; ?>" id="admin-prod-img" width="120"></td>
                <td><?php echo $row[3];?></td>
                <td><?php echo $row['sub_category'];?></td>
                <td><?php echo $row['item_desc']; ?></td>
                <td><?php echo $row[5];?></td>
                <td><?php echo $row[6];?></td>
                <td><?php echo $row[7];?></td>
                <td>
                  <a href="edit_item.php?edit=<?php echo $row[0]; ?>" class="blue-text"><i class="fa fa-edit"></i></a> | 
                  <a href="view_item.php?delete=<?php echo $row[0]; ?>" id="deleteBtn" class="red-text"><i class="fa fa-trash"></i></a>
                </td>
                <?php  } ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php 
        for ($page=1; $page <= $noOfPages; $page++) { 
          echo '<a href="view_item.php?page='.$page.'">'. $page . '</a>';
        }
      ?>
      
      
    </div>
    <div class="col s12 m0 l0"></div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
