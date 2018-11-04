<?php 
	session_start();
	include 'inc/conn.php';

		// Validate login
		if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
			header('Location: login.php');
			exit;
		}
		
?>

<?php include 'inc/header.php'; ?>
<!--Main navbar -->
<?php include 'inc/mainnav.php'; ?>
<!-- Sidenav Bar -->
<?php include 'inc/mobilenav.php'; ?>




<!--Footer-->
<?php include 'inc/footer.php'; ?>
