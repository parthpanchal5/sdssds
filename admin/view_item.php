<?php 
	session_start(); 
  include 'inc/conn.php';

  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM item WHERE item_id = $id");
    header("Location:view_item.php?Deleted");
  }

  $sql = "SELECT `item_id`, `item_name`, `item_img`, `item_cat`, `item_desc`, `item_price`, `item_qty`, `status` FROM item";
  $result = mysqli_query($conn, $sql);
  
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col s12 m0 l0"></div>
    <div class="col s12 m12 l12">
      <h3 class="center">View Item</h3>
      <div class="card-panel hoverable">
        <div class="card-content">
          <table class="table highlight responsive-table stripped">
            <thead>
              <th>Item.id</th>
              <th>Item Name</th>
              <th id="admin-prod-row">Item Image</th>
              <th>Item Category</th>
              <th>Description</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><b><?php echo $row[0];?></b></td>
                <td><?php echo $row[1];?></td>
                <td><img src="img/<?php echo $row[2];?>" alt="<?php echo $row[1]; ?>" class="materialboxed" data-caption="<?php echo $row[1]?>" id="admin-prod-img" width="120"></td>
                <td><?php echo $row[3]?></td>
                <td><?php echo $row[4];?></td>
                <td><?php echo $row[5];?></td>
                <td><?php echo $row[6];?></td>
                <td><?php echo $row[7];?></td>
                <td>
                  <a href="edit_item.php?edit=<?php echo $row[0]; ?>" class="blue-text">edit <i class="fa fa-edit"></i></a> | 
                  <a href="view_item.php?delete=<?php echo $row[0]; ?>" id="deleteBtn" class="red-text">delete <i class="fa fa-trash"></i></a>
                </td>
                <?php } ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col s12 m0 l0"></div>
  </div>
</div>



<?php include 'inc/footer.php'; ?>
