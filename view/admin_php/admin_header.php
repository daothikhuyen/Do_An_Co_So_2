
<?php 

if(isset($_GET['product'])){
       if(isset($_POST['submit'])){
            $sql = "SELECT *FROM `product` WHERE `title` like '%".trim($_POST['search'])."%' ";
            $res = $shop->select_request($sql);
       }
}

    if(isset($_GET['order'])){
        if(isset($_POST['sumbit'])){
            $order = new Order();
            $sql = "SELECT *FROM `order` WHERE `fullname` like '%".$_POST['search']."%'";
            $res = $order->select_request($sql);
        }
    }

?>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav"  data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                <form class="form-inline" action="<?= isset($_GET['product'])?'all_product.php?product':'all_product.php?order'?>" method="post">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" name="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </li>
        </ul>
    </nav>