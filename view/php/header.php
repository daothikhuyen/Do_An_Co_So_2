
<?php
    // session_start();
    // include '../../controler/connect.php';
    include '../../db/connection.php';
    include '../../model/base.php';
    include '../../model/user.php';
    include '../../model/cart_mode.php';


    $userDataJSON = isset($_COOKIE["user_data"])?$userDataJSON = $_COOKIE["user_data"]:'';
    $userData = json_decode($userDataJSON, true);

    $num_product_html = '';
    if(!empty($userData['id'])){
        $user = new user();
        $cart = new cart();
        $query_user = $user->select_query('email',$userData['email']);
        $row_user = mysqli_fetch_assoc($query_user);

        $request_cart = $cart->select_query('user_id',$row_user['id'],'select');
        $num_product = mysqli_num_rows($request_cart);

        $num_product_html = '<div class="number_product" name="number_product" aria-hidden="true">'.$num_product.'</div>';
    }

    if(isset($_POST['save-avatar'])){
    
        $img = $_FILES['fileImg']['name'];

        $img_tmp_name = $_FILES['fileImg']['tmp_name'];
        
        $sql_update = "UPDATE user SET avatar = '$img' WHERE id =".$row_user['id'];
        $base = new BaseModel();
        $base->execute($sql_update);

        $founder = "/image";
        $element = $founder .basename($img_tmp_name);

        if(!file_exists($element)){
            move_uploaded_file($img_tmp_name,'../../image/avatar/'.$img);
        }
        header("location:home.php");
    }
?>


<body>
    <!-- Navbar -->
    <form action="header.php" method="post" enctype="multipart/form-data">
        <header>
            <i class='bx bx-menu' id="menu-icon"></i>
            <a href="home.php" class="logo">
                <img src="../../image/banner/logo.jpg" alt="">
            </a>
            <ul class="navbar pb-0">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="aboust_us.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <!-- Icon -->
            <div class="header-icon">
                <a id="cart_issert" onclick="cart_issert(<?= $id_user = isset($userData['id'])?$id_user=$userData['id']:'-1' ?>)">
                    <i class='bx bx-cart position-relative' ></i>
                </a>
                <?= $num_product_html ?>
                <i class='bx bx-heart ms-3' id="heart_icon"></i>

                <i class="bx bx-login d-none">
                    <a href="login.php" class="text-decoration-none  border border-1 px-3 py-1 rounded-3">Login</a>
                </i>
                <i class="bx bx-Signin d-none">
                    <a href="register.php" class="text-decoration-none  border border-1 px-3 py-1 rounded-3">Sigup</a>
                </i>
                <?php if(!empty($userData['email'])){ ?>
                    <i class="bx user" id="usericon" class="usericon">
                        <img class="avatar" src="../../image/avatar/<?= $row_user['avatar'] ?>" alt="">
                    </i>
                    <div class="nav_setting hide">
                        <div class="setting">
                            <div class="set_bock_user d-flex align-items-center pb-2 mb-3 ">
                                <i class="bx user me-3" id="usericon">
                                    <img class="avatar" src="../../image/avatar/<?= $row_user['avatar'] ?>" alt="">
                                </i>
                                <i class='bx bx-plus' id="avatar" data-bs-toggle="modal" data-bs-target="#modalId"></i>
                                <h4 class="fs-5 fw-bold" style ="color: #b15050"><?= $row_user['username'] ?></h4>
                            </div>
                            <div class="box-item">
                                <i class="fa-solid fa-address-card me-2"></i>
                                <a href="order.php">Purchase Order</a>
                            </div>
                            <div class="box-item">
                                <i class="fa-solid fa-right-from-bracket me-2"></i>
                                <a href="logout.php">Logout</a>
                            </div>
                            
                        </div>
                    </div>
                <?php }else{ ?>
                    <i class="bx bx-login" >
                        <a href="login.php"  class="text-decoration-none  px-3 py-1 rounded-3 fw-bolder">Login</a>
                    </i>
                    
                    <i class="bx bx-Signin">
                        <a href="register.php"  class="text-decoration-none  px-3 py-1 rounded-3 fw-bolder">Register</a>
                        <!-- <a href="register.php" class="text-decoration-none px-3 py-1 rounded-3 fw-bolder" data-bs-toggle="modal" data-bs-target="#modalId">Register</a> -->
                    </i>

                    <!-- Modal Body -->
                    <!-- <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div>
                                        <h3 class="text-center fw-bold" style="color: #b15050;">Who Are You ?</h3>
                                    </div>
                                    <div class="change_user_admin">
                                        <div class="user_choose w-100 text-center">
                                            <img class="w-100" src="../../image/banner/user_choose.jpg" alt="">
                                            <a href="register.php">
                                                <h6 class="text-center fw-bold" style="color: #b15050;">Shopper</h6>
                                            </a>
                                        </div>
                                        <div class="admin_choose w-100 text-center">
                                            <img class="w-100" src="../../image/banner/admin_choose.jpg" alt="">
                                            <a href="../../view/admin_php/form_register_admin.php">
                                                <h6 class="text-center fw-bold" style="color: #b15050;">Salesman</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    

                <?php } ?>
                
            </div>
            
            <!-- Modal Body -->

            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Update Your Avatar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body into-avatar">
                            <!-- <input type="file"  name="hinhanh"> -->
                            <input type="hidden" name="id" id="" value = "<?php $row_user['id'];?>">
                            <div class=upload>
                                <img src="../../image/avatar/<?php echo $row_user['avatar'] ?>" id="image" alt="">

                                <div class="rightRound" id="upload">
                                    <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                                    <i class="fa fa-solid fa-camera"></i>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn" name="save-avatar">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </form>
