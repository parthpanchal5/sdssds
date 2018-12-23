<?php 
include 'inc/header.php';  	
  include 'inc/conn.php';
  

  
?>  
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>

<div class="container">
  <div class="col s12 m12 l12 xl12">
    <div class="card">
      <div class="card-content">
        <p style="padding: 10px;">Category: <span class="blue-text"><?php echo ucwords($_GET['cat']);?></span></p>
        <table class="table striped center-align responsive-table animated fadeIn">
        <?php if(isset($_GET['cat'])){ $category = mysqli_real_escape_string($conn, $_GET['cat']); $sql_for_cat = "SELECT * FROM item WHERE item_cat = '$category'"; $result = mysqli_query($conn, $sql_for_cat);} while($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td class="left"><img src="admin/img/<?php echo $row[3]; ?>" alt="<?php echo $row[2]; ?>" height="220"><br><p style="font-size: 15px;"><?php echo $row[2];?></p></td>
            <td class="left-align"><p id="cat-prod-desc"><?php echo $row[5];?></p><span><a href="product.php?pid=<?php echo $row[0]; ?>">Read more</a></span></td>
            <td style="padding-right: 45px; !important"><i class="fas fa-rupee-sign"></i> <?php echo $row[6];?></td>
            <td>
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
            </td>
            <td><a href="cart.php?pid=<?php echo $row[0];?>" class="btn btn-small amber darken-2">Add to cart</a></td>
            <td></td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </div>

</div>

<?php include 'inc/footer.php'; ?>
