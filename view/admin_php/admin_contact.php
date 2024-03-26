<?php 
    session_start();
    $userDataJSON = isset($_COOKIE["admin_data"])?$userDataJSON = $_COOKIE["admin_data"]:'';
    $userData = json_decode($userDataJSON, true);
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
  <!-- email -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rizalcss@2.0.9/css/cdn.rizal.css" integrity="sha256-0vFAs0ft9ykF6DOLV4g0iRVz5hJ+V7HvY5fZapVeUD0=" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="https://kit.fontawesome.com/1e8d61f212.js"></script>
  <!-- Favicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- boostrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../html/css_admin/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../html/css_admin/adminlte.min.css">
  <link rel="stylesheet" href="../../html/css_admin/admin.css">
  <link rel="stylesheet" href="../../html/css/contact/style.css">

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
                        <a href="add_product_admin.php" class="nav-link ">
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
                        <a href="admin_contact.php" class="nav-link active">
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
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex aglin-items-center">
                    <section class="section contact">
                        <div class="row gy-4">

                            <div class="col-xl-6">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="info-box card">
                                            <i class='bx bx-location-plus' ></i>
                                            <h3>Address</h3>
                                            <p>365,Tran Dai Nghia<br>Cong Nghe Thong Tin Viet-Han</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="info-box card">
                                        <i class='bx bx-phone'></i>
                                        <h3>Call Us</h3>
                                        <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="info-box card">
                                        <i class='bx bx-envelope' ></i>
                                        <h3>Email Us</h3>
                                        <p>khuyendt.22itb@vku.udn.vn<br>minhht.22itb@vku.udn.vn</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="info-box card">
                                        <i class="fa-regular fa-clock"></i>
                                        <h3>Open Hours</h3>
                                        <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-6">
                                <div class="card p-4">
                                    <form action="../admin_php/email.php" method="post" class="php-email-form">
                                        <div class="row gy-4">

                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                        </div>

                                        <div class="col-md-6 ">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                        </div>

                                        <div class="col-md-12">
                                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>

                                            <button type="submit" name="send">Send Message</button>
                                        </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </section>
    </div>

  

  </main><!-- End #main -->
</body>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../html/js/add_product_admin.js"></script>
    <script src="../../html/js/js_admin/jquery.min.js"></script>
    <script src="../../html/js/js_admin/adminlte.js"></script>
    <script src="../../html/js//js_admin/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><?php 
    if((isset($_SESSION['status'])) && $_SESSION['status'] != ''){
        print_r($_SESSION['status']);
?>
    <script>
            Swal.fire({
            icon: "<?= $_SESSION['status'] ?>",
            title: "<?= $_SESSION['status_code'] ?>",
            showConfirmButton: false,
            timer: 1500
            });
    </script>  
<?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
    }
?>
</html>