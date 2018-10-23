<?php 
    include 'inc/header.php'; 
    include 'inc/conn.php';

  // Init vars
  $acc_type = '';
  $acc_type_err = '';

  // Submit
  if(isset($_GET['submit'])){
    $id = $_GET['id'];
    $acc_type = mysqli_real_escape_string($conn, $_GET['type']);

    $sql = "UPDATE INTO users SET acc_type = '$acc_type' WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    header("Location:index.php?inserted");
    exit;

  }
  

  
  
?>
<!-- navbar -->
<nav class="blue lighten-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Shop</a>
        </div>
    </div>
</nav>
<div class="container">
  <div class="row">
    <h4 class="center-align grey-text">Create an ads Account</h4>
      <div class="col s12 m6 right">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
          <div class="card-panel animated fadeInRight" id="reg-card" style="margin-top: 10%;">
            <div class="row">
              <div class="input-field col s12">
                <select name="type">
                  <option value="0" selected>Choose your option</option>
                  <option value="Ads">Ads Account</option>
                  <option value="Seller">Seller Account</option>
                </select>
                <label>Select Account type</label>
              </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Create" name="submit" class="btn blue btn-small lighten-2" style="margin-right: 30px;">
            <input type="reset" value="cancel" class="btn btn-small grey lighten-1">
          </div>
        </form>
      </div>
      <div class="col m2">
          <img src="img/ad-banner.svg" alt="img" height="340" style="margin-top: 30%;" class="hide-on-med-and-down animated fadeInLeft">
      </div>
  </div>
</div>

<?php include 'inc/footer.php' ?>