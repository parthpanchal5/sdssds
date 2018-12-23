<?php 
  include 'inc/header.php';   
  include 'inc/conn.php';
  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  //   header('Location: index.php');
  //   exit;
  // }
  
?>
<?php ?>
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>

  <div class="row">
    <!-- <div class="col s12 m2 l3 xl2"></div> -->
    <div class="col s12 m4 l3"></div>
    <div class="col s12 m12 l6 center">
      <h5 style="margin-top:2em;" class="green-text">Your Message Sent Successfully!</h5>
      <img src="img/mail.svg" class="animated fadeInLeft " alt="success" height="320" style="margin-top:2em;">
      <h4><a href="index.php" class="btn blue lighten-1 animated fadeInUp">Continue Shopping <i class="fa fa-shopping-cart fa-1x"></i></a></h4>
    </div>
    <div class="col s12 m4 l3"></div>
  </div>
  <!-- <div class="col s12 m2 l3 xl2"></div> -->


<!--Footer-->
<?php include 'inc/footer.php'; ?>