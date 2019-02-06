<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	
<title> <?php if(isset($_GET['pname'])){ $titleBar =  $_GET['pname']; echo "Shop it | ".$titleBar; } else{ echo $titleBar = 'Shopit'; }  ?></title>
	
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<meta name="description" content="<?php if(isset($_GET['pid'])){ include 'inc/conn.php'; $metadesc =  $_GET['pid']; $sql = "SELECT * FROM item WHERE `item_id` = '$metadesc'"; $result = mysqli_query($conn, $sql); while($row = mysqli_fetch_array($result)){ echo "Shop it | ".$row['item_desc']; } } else{ echo $metadesc = 'Shopit is a place where all your wishes of buying products come true so welcome and buy your dream products'; }  ?>"/>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" href="img/logo/logo.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500" rel="stylesheet">
	<link rel="stylesheet" href="js/pace-master/themes/blue/ppace-theme-center-radar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
	<link rel="stylesheet" href="css/style.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.5/scrollreveal.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script src="https://unpkg.com/scrollreveal"></script>


	<!-- <script type="text/javascript">
		var uri = window.location.toString();
		if (uri.indexOf("?") > 0) {
				var clean_uri = uri.substring(0, uri.indexOf("?"));
				window.history.replaceState({}, document.title, clean_uri);
		}
	</script> -->
	
    
    
</head>
<body>