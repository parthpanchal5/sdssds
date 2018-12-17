<?php 
	session_start();
  include 'inc/conn.php';
	
	// Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		header('Location: login.php');
		exit;
	}
	
	if(!empty($_GET['action'])){
		switch($_GET['action']){
			case "add":
				if(!empty($_POST['quantity'])){
					$productId = "SELECT * FROM item WHERE item_id = '". $_GET['pid']."'";
					$result = mysqli_query($conn, $productId);
					$productArray = array($productId[0]['item_id']=>array('pname'=>$productId[0]['item_name'], 'pid'=>$productId[0]['item_id'], 'quantity'=>$_POST['quantity'], 'price'=>$productId[0]['price'], 'image'=>$productId[0]['item_img']));

					if(!empty($_SESSION['cart_item'])){
						if(in_array($productId[0]['pid'], array_keys($_SESSION['cart_item']))){
							foreach($_SESSION["cart_item"] as $k => $v) {
								if($productId[0]["pid"] == $k) {
									if(empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
							}
						}else{
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
						}
					}else{
						$_SESSION["cart_item"] = $itemArray;
					}
				}
				break;

				case 'remove':
					if(!empty($_SESSION["cart_item"])) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($_GET["pid"] == $k)
									unset($_SESSION["cart_item"][$k]);				
								if(empty($_SESSION["cart_item"]))
									unset($_SESSION["cart_item"]);
						}
					}
				break;
			case "empty":
				unset($_SESSION["cart_item"]);
				break;
		}	
	}

?>
<?php include 'inc/header.php'; ?>

<!--Main navbar-->
<?php include 'inc/mainnav.php'; ?>

<!--Mobile navbar -->
<?php include 'inc/mobilenav.php'; ?>
<!--Content area -->
<div class="container-fluid lighten-4 animated fadeIn" style="margin: 0px 30px 0px 30px;">
  <div class="row" style="margin-top: 10px;">
		<div class="col s12 m12 l8">
			<div class="card">
				<div class="card-content">
					<table class="table responsive-table">
						<tr>
							<td><span class="left" style="font-size: 16px;">My Cart ( 1 )</span></td>
							<td><a href="cart.php?action=empty" class="btn btn-small red right">Empty cart</a></td>
						</tr>
						<?php
							if(isset($_SESSION["cart_item"])){
								$total_quantity = 0;
								$total_price = 0;
						?>
						<tbody>
							
								<?php
									foreach($_SESSION['cart_item'] as $item){
										$itemPrice = $item['quantity']*$item['price'];
								
								?>
								<tr>
									<td><img src="admin/img/<?php echo $item['image']; ?>" alt=""><?php echo $item['item_name']; ?></td>
									<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
									<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
									<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
									<td style="text-align:center;"><a href="index.php?action=remove&pid=<?php echo $item["pid"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
								</tr>
								<?php
									$total_quantity += $item["quantity"];
									$total_price += ($item["price"]*$item["quantity"]);
								?>
								<tr>
									<td colspan="2" align="right">Total:</td>
									<td align="right"><?php echo $total_quantity; ?></td>
									<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
								</tr>
									<?php 
									} 
									?>
								<td><img src="img/empty-cart.png" class="responsive-img" alt="emptycart" id="empty-cart-img"></td>
										<?php } ?>
							</tr>
						</tbody>
					</table>	
					<div class="card-action">
						<table class="table">
							<tr>
								<td class="right">
									<form action="checkout.php" method="POST">
										<a href="index.php" class="btn btn-large grey lighten-5 black-text" style="margin-right: 20px;"><i class="fas fa-chevron-left" style="font-size: 15px; margin-right: 10px;"></i> Continue Shopping</a>
										<input type="submit" value="place order" class="btn btn-large  amber darken-4">
									</form>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m12 l4">
			<div class="card hoverable">
				<div class="card-content">
					<table class="table">
						<tr>
							<td class="left grey-text" style="font-size: 18px; text-transform:uppercase;">Price Details</td>
						</tr>
						<tr>
							<td class="left" style="font-size: 15px;">Price (2 item)</td>
							<td class="right" style="font-size: 15px;"><i class="fas fa-rupee-sign"></i> 650</td>
						</tr>
						<tr>
							<td class="left">Delivery Charges</td>
							<td class="right"><span class="green-text" style="font-size: 15px; text-transform:uppercase;">Free</span></td>
						</tr>
						<tr>
							<td class="left">Amount payable</td>
							<td class="right" style="font-size: 15px;"><i class="fas fa-rupee-sign"></i> 650</td>
						</tr>
						<tr>
							<td class="center green-text" style="text-transform:uppercase;">Your Total savings on this order <i class="fas fa-rupee-sign" style="margin-left: 5px;"></i> 120</td>
						</tr>
					</table>	
				</div>
			</div>
		</div>
  </div>
</div>
<!--Footer  -->
<?php include 'inc/footer.php'; ?>

		
	  
	