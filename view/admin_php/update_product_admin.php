<?php 
session_start();
    include '../../db/connection.php';
    include '../../model/base.php';
    include '../../model/user.php';
    include '../../model/shop_mode.php';
    include '../../model/category_mode.php';

    $userDataJSON = isset($_COOKIE["admin_data"])?$userDataJSON = $_COOKIE["admin_data"]:'';
    $userData = json_decode($userDataJSON, true);

    
    if(isset($_FILES['upload']) && strlen($_FILES['upload']['name'])>1){

        $file = $_FILES['upload']['tmp_name'];

        $file_name = $_FILES['upload']['name'];


        $file_name_array = explode(".", $file_name);
        $extension = end($file_name_array);

        // $new_imgae_name = rand(). '.' . $extension;
        chmod('upload', 0777);

        $founder = '../../image/product/';
        $element = $founder.basename('file');

        $allowed_extension = array("jpg","gif","png");
        if(in_array($extension,$allowed_extension)){
           if(!file_exists($element)){
                move_uploaded_file($file, '../../image/product/'.$file);
           }
            $function_number = $_GET['CKEditorFuncNum'];
            $url = '../../image/product/'.$file_name;
            $message = "";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }

    if(isset($_POST['btn_add_product'])){
        $error = [];

        if(empty($_FILES['fileimg']['name'])){
            $_FILES['fileimg']['name'] = $_POST['name_img'];
        }

        if(filter_var($_POST['Price'], FILTER_VALIDATE_FLOAT) == false ){
            $error['Price'] = 'Price Money is not valid';
        }

        if(filter_var($_POST['Discount'], FILTER_VALIDATE_FLOAT) == false ){
            $error['Discount'] = 'Price Money is not valid';
        }

        if(empty($error)){
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $shop = new Shop();

            if(empty($_POST['form-check-input'])){
                $hot = 'No';
            }else{
                $hot = 'Yes';
            }

            $data_array = array(
                'category_id'=>$_POST['Product_Type'],
                'title'=> $_POST['Title'],
                'price'=>$_POST['Price'],
                'discount'=>$_POST['Discount'],
                'description' => $_POST['Description'],
                'created_time'=> date("d-m-Y h:i:sa"),
                'last_update'=> date("d-m-Y h:i:sa"),
                'quantity' => $_POST['Quantity'],
                'image' => $_FILES['fileimg']['name'],
                'Hot' => $hot,
            );


            $shop->update_product($data_array,'id', $_GET['id_product']);

            $file_tmp_name = $_FILES['fileimg']['tmp_name'];
            $founder = '../../image/product';
            $element = $founder.basename($file_tmp_name);

            if(!file_exists($element)){
                move_uploaded_file($file_tmp_name,'../../image/product'.$_FILES['fileimg']['name']);
            }

            // $error['notification'] = '<div class="alert alert-success">
            //                             Update successfully
            //                         </div>';
            
            if($shop){
                $_SESSION['status'] = 'success';
                $_SESSION['status_code'] = 'Product update successful';
                header('location:all_product.php');

            }else{
                $_SESSION['status'] = 'warning';
                $_SESSION['status_code'] = 'Product update failed';
                header('location:all_product.php');
            }
            
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
    <?php include 'admin_header.php' ?>
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
                        <a href="#" class="nav-link">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Update Product</h3>
                            </div>
                            
                            <form action='update_product_admin.php?id_product=<?= $_GET['id_product'] ?>' method="post" enctype="multipart/form-data">
                                <?php 
                                    $shop = new Shop();
                                    $resquest = $shop->select_query('id',$_GET['id_product'],'select');
                                    $row_product = mysqli_fetch_assoc($resquest);
                                ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="w-100">
                                            <small class="Error text-danger"><?php echo (isset($error['fileimg']))?$error['fileimg']:'' ?></small>
                                            <div class="upload">
                                                <img src="../../image/product/<?= $row_product['image'] ?>" id="image" alt="">
                                                <input type="hidden" name="name_img" id="" value="<?= $row_product['image'] ?>">
                                                <div class="rightRound" id="upload">
                                                    <input type="file" name="fileimg" id="fileimg" accept=".jpg, .jpeg, .png">
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <small class="Error text-danger"><?php echo (isset($error['Title']))?$error['Title']:'' ?></small>
                                        <input type="text" class="form-control" name="Title" id="exampleInputEmail1" placeholder="Enter product name" value="<?= $row_product['title'] ?>">
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="w-100" style="margin-right: 10px;">
                                            <label for="exampleInputPassword1">Product Type</label>
                                            <small class="Error text-danger"><?php echo (isset($error['Product_Type']))?$error['Product_Type']:'' ?></small>
                                            <div class="form-group_select">
                                                <select name="Product_Type" id="" class="w-100">
                                                    <option value="">Type of Cake</option>
                                                <?php 
                                                    $category = new Category();
                                                    $category_product = $category->select_all_category();
                                                    while($row = mysqli_fetch_array($category_product)){
                                                        if($row['id'] == $row_product['category_id']){    
                                                ?>
                                                    <option value="<?= $row['id'] ?>" selected ><?= $row['name']?> </option>
                                                <?php
                                                        }else{
                                                ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['name']?> </option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-100" style="margin-left: 10px;">
                                            <label for="exampleInputPassword1">Quantity</label>
                                            <small class="Error text-danger"><?php echo (isset($error['Quantity']))?$error['Quantity']:'' ?></small>
                                            <input type="text" class="form-control" name="Quantity" id="exampleInputPassword1" placeholder="Enter quantity" value="<?= $row_product['quantity'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="w-100" style="margin-right: 10px;">
                                            <label for="exampleInputPassword1">Price</label>
                                            <small class="Error text-danger"><?php echo (isset($error['Price']))?$error['Price']:'' ?></small>
                                            <input type="text" class="form-control" name="Price" id="exampleInputPassword1" placeholder="0.000đ....." value="<?= $row_product['price'] ?>">
                                        </div>
                                        <div class="w-100" style="margin-left: 10px;">
                                            <label for="exampleInputPassword1">Old Price</label>
                                            <small class="Error text-danger"><?php echo (isset($error['Discount']))?$error['Discount']:'' ?></small>
                                            <input type="text" class="form-control" name="Discount" id="exampleInputPassword1" placeholder="Sale 0.000đ..." value="<?= $row_product['discount'] ?>">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputFile">Description</label>
                                        <small class="Error text-danger"><?php echo (isset($error['Description']))?$error['Description']:'' ?></small>
                                        <textarea name="Description" id="Description" cols="30" rows="10"><?= $row_product['description'] ?></textarea>
                                    </div>
                                    <div class="form-check">
                                    <?php 
                                        if($row_product['Hot'] === 'No'){
                                    ?>
                                        <input type="checkbox" name="form-check-input" class="form-check-input" id="exampleCheck1">
                                    <?php
                                        }else{
                                    ?>
                                        <input type="checkbox" name="form-check-input" class="form-check-input" id="exampleCheck1" checked>
                                    <?php
                                        }
                                    ?>
                                        <label class="form-check-label" for="exampleCheck1">Best selling product</label>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" name="btn_add_product" class="btn btn_add_product">Update</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        
        
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../html/js/add_product_admin.js"></script>
<script src="../../html/js/js_admin/jquery.min.js"></script>
<script src="../../html/js/js_admin/adminlte.js"></script>
<script src="../../html/js//js_admin/demo.js"></script>

</html>
