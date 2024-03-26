<?php 
    include '../../db/connection.php';
    include '../../model/base.php';
    include '../../model/user.php';
    include '../../model/order_mode.php';

    $order = new Order();

    $userDataJSON = isset($_COOKIE["admin_data"])?$userDataJSON = $_COOKIE["admin_data"]:'';
    $userData = json_decode($userDataJSON, true);

    //phân trang
    $current_page = !empty($_GET['page'])?$_GET['page']:1;// số sản phẩm trong 1 page
    
    $limit = 6;

    $request_query = $order->select_where('order','status', '0');

    $totalRecords = mysqli_num_rows($request_query);

    $totalPages = ceil($totalRecords/ $limit);

    $start = (($current_page -1)*$limit);

    if($current_page > $totalPages){
        $current_page = $totalPages;
    }else if($current_page < 1){
        $current_page = 1;
    }

    $sql_all = "SELECT * FROM `order` WHERE `status`= '0' LIMIT 0,6 ";
    $res= $order->select_request($sql_all);

    if(isset($_GET['status'])){
        if(isset($_POST['submit'])){
             $sql = "SELECT *FROM `order` WHERE `fullname` like '%".trim($_POST['search'])."%' AND `status` =".$_GET['status'] ;
             $res = $order->select_request($sql);
        }
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN MERY CAKE</title>
    <!-- logo -->
    <link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../html/css_admin/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../html/css_admin/adminlte.min.css">
  <link rel="stylesheet" href="../../html/css_admin/admin.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Navbar -->
<div class="wrapper">
 
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
                    <form class="form-inline" action="Purchase_Order.php?status=0" method="post">
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
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primar elevation-4"  id="collapsibleNavId">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="../../image/banner/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MERY CAKE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../image/avatar/126d9638795b2dc43765f3a2f6544399.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $userData['email'] ?></a>
                </div>
            </div>

        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="add_product_admin.php" class="nav-link">
                            <i class="fa-solid fa-file-import"></i>
                            <p>
                                Add Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="all_product.php?product" class="nav-link">
                            <i class="fa-solid fa-shop"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="fa-solid fa-list-check"></i>
                            <p>
                                Managing orders
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Purchase_Order.php" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order not confirmed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="order_confirm.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order is shipping</p>
                                
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Order_is_shipping.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order confirmed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="cancel_order.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order canceled</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="admin_contact.php" class="nav-link">
                            <i class='bx bx-envelope' ></i>
                            <p>
                                Contact
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="cancel_order.php" class="nav-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </aside>

    <div class="content-wrapper">

        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Your Order</h3>
                            </div>
                            <div class="show_product">
                                <div class="table_thread thread_first fw-bold border-0">
                                    <div class="STT">STT</div>
                                    <div class="use_name">Full Name</div>
                                    <div class="address d-sm-none d-md-block">Address</div>
                                    <div class="phone">Phone Number</div>
                                    <div class="total_money">Total Money</div>
                                    <div class="datetime d-sm-none d-md-block">Datetime</div>
                                    <div class="status">Status</div>
                                </div>
                                <div class="table_body">
                                    <?php 

                                        while($row = mysqli_fetch_array($res)){
                                            $start++;
                                    ?>
                                        <div class="table_thread px-2 px-sm-3">
                                            <div class="STT"><?= $start ?></div>
                                            <div class="use_name">
                                                <?= $row['fullname'] ?>
                                            </div>
                                            <div class="address d-sm-none d-md-block"><?= $row['adress'] ?></div>
                                            <div class="phone"><?= $row['phone_number'] ?></div>
                                            <div class="total_money"><?= $row['total_money'] ?></div>
                                            <div class="datetime d-sm-none d-md-block"><?= $row['create_time'] ?></div>
                                            <div class="status">
                                                <div class="d-block">
                                                    <a href="confirm_order.php?id_order=<?= $row['id'] ?>&&notconfirm" class="btn_status" >Unconfimred </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="page_number">
                                <?php 

                                    if($totalRecords > 6){
                                        if($current_page > 2 && $totalPages > 1){
                                            $prev_page = $current_page -1 ;
                                            echo '<a href="all_product.php?page='.$prev_page.'"><i class="fa-solid fa-angle-left"></i></a>';
                                        }
    
                                        for ($i=1; $i <= $totalPages; $i++) { 
    
                                            if($i != $current_page){
                                                if($i > $current_page - 2 &&  $i < $current_page + 2){
                                                    if(isset($_GET['page']) &&$_GET['page'] == $i ){
                                                        echo "<a href='all_product.php?page=$i' class='change_page' style='color:#fff' >$i</a>";
                                                    }else{
                                                        echo "<a href='all_product.php?page=$i'>$i</a>";
                                                    }
                                                }
                                            }else{
                                               
                                                if((isset($_GET['page']) &&$_GET['page'] == $i)){
                                                    echo "<a href='all_product?' class='change_page'  style='color:#fff'>$i</a>";
                                                }else{
                                                    echo "<a href='all_product?'>$i</a>";
                                                }
                                            }
                                            
                                        }
    
                                        if($current_page < $totalPages - 1 && $totalPages > 1){
                                            $next_page = $current_page + 1;
                                            echo '<a href="all_product.php?page='.$next_page.'"><i class="fa-solid fa-angle-right"></i></a>';
                                        }
                                    }
                                ?>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        
        
    </div>
</div> 
</body>
<script src="../../html/js/js_admin/jquery.min.js"></script>
<script src="../../html/js/js_admin/adminlte.js"></script>
<script src="../../html/js//js_admin/demo.js"></script>
</html>
