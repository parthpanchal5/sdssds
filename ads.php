<?php 
	session_start();
  include 'inc/conn.php';

		
?>
<?php include 'inc/header.php'; ?>
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
	
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>
<!--Content area-->
<div class="container">
  <h4 class="center-align">Welcome, <?php echo $_SESSION['firstname']; ?></h4>
  <blockquote id="ads-blockquote" class="white hoverable" style="padding: 15px; font-size: 16px;">We are glad that you want to sell ads based on your business and we are here to help you provide a platform so that you can showcase your product in front of thousands of users in a simple way</blockquote>
  <h6><u>Follow this simple steps to create your ads on our platform</u></h6>
  <ol>
    <li>Create an account with it's type as Ads Account.</li>
    <li>That's it and we'll manage everything.</li>
  </ol>
  <h5 class="center-align"><a href="ad_reg.php" class="btn btn-large waves-effect blue lighten-1">Create an Ads Account</a></h5>
</div>


    
<?php include 'inc/footer.php'; ?>

        
      
    