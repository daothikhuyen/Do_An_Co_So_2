<?php 
    session_start();
    include '../../db/connection.php';
    include '../../model/base.php';
    include '../../model/user.php';
    include '../../model/order_mode.php';

    $userDataJSON = isset($_COOKIE["admin_data"])?$userDataJSON = $_COOKIE["admin_data"]:'';
    $userData = json_decode($userDataJSON, true);

    $order = new Order();

    if(isset($_GET['id_order'])){
        $sql_cus_info = 'SELECT *FROM `order` WHERE `id`='.$_GET['id_order'];
        $res_query = $order->select_request($sql_cus_info);
        $res = mysqli_fetch_assoc($res_query);

        $sql_cus_product = 'SELECT order_detail.*,product.title, product.image
                            FROM `order_detail` INNER JOIN `product`
                            ON order_detail.product_id = product.id
                            WHERE order_detail.order_id ='.$_GET['id_order'];
        $res_query_cus_product = $order->select_request($sql_cus_product);
    }

    if(isset($_GET['id_order_shipping'])){
        $sql_cus_info = 'SELECT *FROM `order` WHERE `id`='.$_GET['id_order_shipping'];
        $res_query = $order->select_request($sql_cus_info);
        $res = mysqli_fetch_assoc($res_query);

        $sql_cus_product = 'SELECT order_detail.*,product.title, product.image
                            FROM `order_detail` INNER JOIN `product`
                            ON order_detail.product_id = product.id
                            WHERE order_detail.order_id ='.$_GET['id_order_shipping'];
        $res_query_cus_product = $order->select_request($sql_cus_product);
    }
    
        
?>
<a href=""></a>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN MERY CAKE</title>
  <!-- logo -->
  <link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg">
  <!-- boostrap -->
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
  <link rel="stylesheet" href="../../html/css_admin/manger_admin.css">

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
                        <a href="all_product.php?product" class="nav-link ">
                            <i class="fa-solid fa-shop"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="Purchase_Order.php" class="nav-link active">
                            <i class="fa-solid fa-list-check"></i>
                            <p>
                                Managing orders
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Purchase_Order.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order not confirmed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="order_confirm.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order confirmed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Order_is_shipping.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order is shipping</p>
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
                        <a href="../php/logout.php" class="nav-link">
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
            <div class="confirm_order">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                            <?php 
                                if(isset($_GET['canceled'])){
                            ?>
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Order Cancelled</h3>
                                </div>
                            <?php
                                }
                                if(isset($_GET['confimred'])){
                            ?>
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Confirmed</h3>
                                </div>
                            <?php
                                }if(isset($_GET['notconfirm'])){
                            ?>
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Not confirmed yet</h3>
                                </div>
                            <?php
                                }
                                if(isset($_GET['shipping'])){     
                            ?>
                            
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Delivered</h3>
                                </div>
                            <?php
                                }
                            ?>
                                <div class="mt-4 px-3 pb-3">
                                    <h5 class="title_card">Customer information</h5>
                                    <div class="cus-info d-flex justify-content-around">
                                        <div>
                                            <div class="info">
                                                <label for="">Full Name:</label>
                                                <input type="text" name="" id="" value="<?= $res['fullname'] ?>" readonly>
                                            </div>
                                            <div class="info">
                                                <label for="">Phone Number:</label>
                                                <input type="number" name="" id="" style="font-family: 'Times New Roman', Times, serif; font-size: 15px; font-weight: 300;" value="<?= $res['phone_number'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="info">
                                                <label for="">Address:</label>
                                                <input type="text" name="" id="" value="<?= $res['adress'] ?>" readonly> 
                                            </div>
                                            <div class="info">
                                                <label for="">Payment method:</label>
                                                <input type="text" name="" id="" value="Cash upon receipt" readonly> 
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="title_card">Purchase Order</h5>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-10 offset-1">
                                                <div class="info_order">
                                                        <div class="show_product border border-2">
                                                            <div class="table_thread thread_first fw-bold border-0">
                                                                <div class="STT">STT</div>
                                                                <div class="product_name" style="width:300px">Product's Name</div>
                                                                <div class="quantity ">Quantity</div>
                                                                <div class="price ">Price</div>
                                                                <div class="update_product d-sm-none d-md-block">Datetime</div>
                                                            </div>
                                                            <div class="table_body">
                                                                <?php 
                                                                $num = 0;
                                                                    while($row = mysqli_fetch_array($res_query_cus_product)){
                                                                        $num++;
                                                                ?>
                                                                    <div class="table_thread">
                                                                        <div class="STT"><?= $num ?></div>
                                                                        <div class="product_name" style="width:300px">
                                                                            <div class="img_product">
                                                                                <img class="w-100" src="../../image/product/<?= $row['image'] ?>" alt="">
                                                                            </div>
                                                                            <div class="title_product w-100 ms-2">
                                                                                <span for=""><?= $row['title'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="quantity fs-4"><?= $row['quantity'] ?></div>
                                                                        <div class="price text-danger fw-bold"><?= $row['price'] ?>.000<sub>đ</sub>/1 cakes</div>
                                                                        <div class="update_product d-sm-none d-md-block ">
                                                                            <?= $row['create_time']?>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="border-top p-3" >
                                                        <div class="total_money float-end">
                                                            <label for="">Vat:</label>
                                                            <span for="">0<sub>đ</sub></span> <br>
                                                            <label for="">Total Money:</label>
                                                            <span class="fs-5 text-danger"><?= $res['total_money'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            if(isset($_GET['notconfirm'])){
                                        ?>
                                        <hr>
                                            <div class="accept_or_cancel d-flex">
                                                <div class="accept">
                                                    <a href="admin_controller/controller_all_product.php?not_confirm=<?=$_GET['id_order']?>">Confirm</a>
                                                </div>
                                                <div class="accept">
                                                    <a href="admin_controller/controller_all_product.php?cancel=<?=$_GET['id_order']?>">Cancel order</a>
                                                </div>
                                            </div>
                                        <?php
                                            } 
                                            if(isset($_GET['shipping'])){
                                        ?>
                                        <hr>
                                            <div class="accept_or_cancel d-flex">
                                                <div class="accept">
                                                    <a href="admin_controller/controller_all_product.php?shipping=<?=$_GET['id_order_shipping']?>">Confirmed Delivered</a>
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    
</div>
</body>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../html/js/add_product_admin.js"></script>
<script src="../../html/js/js_admin/jquery.min.js"></script>
<script src="../../html/js/js_admin/adminlte.js"></script>
<script src="../../html/js//js_admin/demo.js"></script>


</html>
