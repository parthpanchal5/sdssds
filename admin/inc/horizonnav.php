<header id="header">
    <div class="navbar-fixed">
        <nav class="blue lighten-2">
            <a href="dashboard.php" class="brand-logo center">Shop</a>
            <ul class="right">
                    <li><a data-target="admin" class="dropdown-trigger">Hello <?php echo $_SESSION['firstname']; ?>!<i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>
                </ul>
        </nav>
        <ul id="admin" class="dropdown-content">
          <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class=" hide-on-med-and-down">
        <div class="navbar">
        <nav class="cyan lighten-2 z-depth-2">
            <div class="nav-wrapper">
                <div class="container">
                    <ul class="hide-on-med-and-down">
                        <li><a href="user.php">Users</i></a></li>
                        <li><a href="category.php" data-target="category" class="dropdown-trigger">Categories <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>
                        <li><a href="product.php" data-target="product" class="dropdown-trigger">Products <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>
                        <li><a href="messages.php" data-target="message" class="dropdown-trigger">Messages <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
                        <li><a href="ads.php" data-target="ads" class="dropdown-trigger">Ads <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
                        <li><a href="seller.php" data-target="seller" class="dropdown-trigger">Sellers <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
                        <li><a href="deliveries.php" data-target="deliveries" class="dropdown-trigger">Deliveries <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
                        <li><a href="transaction.php" data-target="transactions" class="dropdown-trigger">Transactions <i class="fa fa-angle-down fa-1x" style="margin-left: 5px;"></i></a></li>                                       
                    </ul>
                </div>
            </div>
        </nav>
        
        </div>        
    </div>
</header>