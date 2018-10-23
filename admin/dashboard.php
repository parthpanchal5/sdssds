<?php 
    session_start();
    include 'inc/header.php'; 
    include 'inc/conn.php';

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    	header('Location:login.php');
    	exit;
  	}
  	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        header('Location:login.php');
    	exit;
    }
    if($_SESSION['email'] != "admin@admin.com"){
        header('Location:login.php');
    	exit;
    }
    if($_SESSION['username'] != "admin123"){
        header('Location:login.php');
    	exit;
    }
      

?>
   
<?php include 'inc/horizonnav.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12 xl12" id="content"> <!--animated fadeInLeft-->
            <div class="row">
                <div class="col s12 m3 l3 xl3">
                    <div class="card rounded gradient-4 z-depth-3 waves-effect waves-white lighten-2">
                        <div class="card-content">
                            <span class="card-title white-text center">Users</span>
                            <p>
                                Total no of users
                                <h2>3622</h2>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 l3 xl3">
                    <div class="card rounded gradient-1 z-depth-3 waves-effect waves-yellow lighten-2">
                        <div class="card-content">
                            <span class="card-title white-text center">Stocks</span>
                            <p>
                                Total no of Stocks
                                <h2>3622</h2>
                            </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 l3 xl3">
                    <div class="card rounded gradient-2 z-depth-3 waves-effect waves-blue">
                        <div class="card-content">
                            <span class="card-title white-text center">Ads</span>
                            <p>
                                Total no of Ads
                                <h2>3622</h2>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 l3 xl3">
                    <div class="card rounded gradient-3 z-depth-3 waves-effect waves-purple lighten-2">
                        <div class="card-content">
                            <span class="card-title white-text center">Seller</span>
                            <p>
                                Total no of Seller
                                <h2>3622</h2>
                            </p>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>    
</div>
<?php include 'inc/footer.php'; ?>

        
      
    