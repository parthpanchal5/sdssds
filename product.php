<?php 
	include 'inc/header.php';
  include 'inc/conn.php';
  

  
  	
?>  


<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
	
<!--Content area-->
<div class="container-fluid" style="margin: 15px 10px 10px 10px;">
  <div class="row animated fadeIn">
    <div class="col s12 m12 l6 xl6">
      <div class="card">
      <!-- <?php if(isset($_GET['pid'])){ $productId = mysqli_real_escape_string($conn, $_GET['pid']); $sql = "SELECT * FROM item WHERE item_id = $productId"; $result = mysqli_query($conn, $sql); } while ($row = mysqli_fetch_array($result)) { ?> -->
        <div class="card-image">
          <img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" class="materialboxed responsive-img" data-caption="<?php echo $row[2]; ?>">
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6 xl6">
      <div class="card-panel animated fadeIn">
        <table class="table highlight striped">
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
            <th class="left">Availability: </th>
            <?php 
              if($row[7] <= 4){
                echo "<td><span class='chips rounded red white-text' style='padding: 6px;'>Out of stock</span></td>";
              }else if($row[7] >= 5 && $row[7] <= 50){
                echo "<td><span class='chips rounded yellow darken-4 white-text' style='padding: 6px;'>Low Stock</span></td>";
              }else if($row[7] >= 51 && $row[7] <= 100){
                echo "<td><span class='chips rounded blue darken-1 white-text' style='padding: 6px;'>Few left</span></td>";
              }else if($row[7] >= 101 && $row[7] <= 350){
                echo "<td><span class='chips rounded green darken-2 white-text' style='padding: 5px;'>Available</span></td>";
              }
            ?>
          </tr>
          <tr>
          <form action="cart.php" method="GET">
            <th>Oty: </th>
            <td><input type="number" min="1" max="5" name="quantity" value="1"></td>
          </tr>
          <tr>
            <td colspan="2" class="left-align">
              <a href="cart.php?action=add&pid=<?php echo $row[0]; ?>" target="_blank" class="btn btn-large amber darken-1">Add to cart <i class="fas fa-shopping-cart fa-1x"></i></a>
              <a href="cart.php?pid=<?php echo $row[0]; ?>" target="_blank" class="btn btn-large amber darken-4 right">Buy now <i class="fas fa-bolt fa-1x"></i></a>
            </td>            
          </tr>
        </table>
        </form>
      </div>
    </div>
    <?php  } ?>
  </div>
</div>    
<?php include 'inc/footer.php'; ?>

        
      
    