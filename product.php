<?php 
	session_start();
  include 'inc/conn.php';
  include 'inc/header.php';

  if(isset($_GET['q'])){
    $productSearchId = mysqli_real_escape_string($conn, $_GET['q']);
    $productSearchQuery = "SELECT * FROM item WHERE item_name LIKE '$productSearchId%' OR item_desc LIKE '$productSearchId%'";
    $resultOfSearchQuery = mysqli_query($conn, $productSearchQuery);
    $row1 = mysqli_fetch_array($resultOfSearchQuery);
    print_r($row1);
  }
  	
?>  

  <?php echo $row[0]; ?>
  <?php echo $row[1]; ?>
  <?php echo $row[2]; ?>
  


<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
	
<!--Content area-->
<div class="container-fluid" style="margin: 00px 00px 0px 0px;">
  <div class="row animated fadeIn">
    <div class="col s12 m12 l6 xl6">
      <div class="card">
      <?php if(isset($_GET['pid'])){ $productId = mysqli_real_escape_string($conn, $_GET['pid']); $sql = "SELECT * FROM item WHERE item_id = $productId"; $result = mysqli_query($conn, $sql); } while ($row = mysqli_fetch_array($result)) { ?>
        <div class="card-image">
          <img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" class="responsive-img materialboxed" data-caption="<?php echo $row[2]; ?>">
        </div>
        <div class="card-action">
          <a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-large amber darken-1 left" style="margin-right: 15em;">Add to cart <i class="fas fa-shopping-cart fa-1x"></i></a>
          <a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-large amber darken-4">Buy now <i class="fas fa-bolt fa-1x" style="margin-left: 10px;"></i></a>
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6 xl6">
      <div class="card-panel animated fadeIn">
        <table class="table highlight">
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
            <td><?php echo $row[4]; ?></td>
          </tr>
          <tr>
            <th class="left">Availability: </th>
            <?php 
              if ($row[8] == "Available"){
                echo "<td><span class='chips rounded green white-text' style='padding: 5px;'>$row[8]</td>";
              }if ($row[8] == "Out of Stock"){
                echo "<td><span class='chips rounded red white-text' style='padding: 5px;'>$row[8]</td>";
              }if ($row[8] == "Low stock"){
                echo "<td><span class='chips rounded amber darken-2 white-text' style='padding: 5px;'>$row[8]</td>";
              }
            ?>
          </tr>
          <tr>
            <th>Oty: </th>
            <td><div class="input-field"><input type="number" min="1" max="5" value="1"></div></td>
          </tr>
        </table>
      </div>
    </div>
    <?php } ?>
  </div>
</div>    
<?php include 'inc/footer.php'; ?>

        
      
    