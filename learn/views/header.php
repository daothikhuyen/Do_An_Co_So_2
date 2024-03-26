
<?php
    // session_start();
    include '../../controler/connect.php';

    // $user = isset($_SESSION['user'])?$user = $_SESSION['user']:[];
    $email = isset($_COOKIE['email'])?$email = $_COOKIE['email']:'';
    $password = isset($_COOKIE['password'])?$password = $_COOKIE['password']:'';

    $sql_user = "SELECT *FROM user WHERE email= '".$email."'";
    $query_user = mysqli_query($conn,$sql_user);
    $row_user = mysqli_fetch_assoc($query_user);

    if(isset($_POST['save-avatar'])){
    
        $img = $_FILES['fileImg']['name'];

        $img_tmp_name = $_FILES['fileImg']['tmp_name'];
        
        $sql_update = "UPDATE user SET avatar = '$img' WHERE id =".$row_user['id'];
        mysqli_query($conn,$sql_update);

        move_uploaded_file($img_tmp_name,'../../image/avatar/'.$img);
        header("location:home.php");
    }
?>

<body>
    <!-- Navbar -->
    <form action="header.php" method="post" enctype="multipart/form-data">
        <header>
            <i class='bx bx-menu' id="menu-icon"></i>
            <a href="#" class="logo">
                <img src="../../image/banner/logo.jpg" alt="">
            </a>
            <ul class="navbar pb-0">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#customer">Customer</a></li>
            </ul>

            <!-- Icon -->
            <div class="header-icon">
                <i class='bx bx-cart' ></i>
                <i class='bx bx-heart' id="heart_icon"></i>
                <!-- <i class='bx bx-search-alt-2' id="search_icon"></i> -->
                <i class="bx bx-login d-none">
                    <a href="login.php" class="text-decoration-none  border border-1 px-3 py-1 rounded-3">Login</a>
                </i>
                <i class="bx bx-Signin d-none">
                    <a href="register.php" class="text-decoration-none  border border-1 px-3 py-1 rounded-3">Sigup</a>
                </i>
                <?php if(!empty($email)){ ?>
                    <i class="bx user" id="usericon">
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
                                <i class="fa-solid fa-gear me-2"></i>
                                <a href="#">Setting</a>
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
                        <a href="register.php" class="text-decoration-none px-3 py-1 rounded-3 fw-bolder">Sigup</a>
                    </i>

                <?php } ?>
                
            </div>
            
            <!-- Modal Body -->

            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Cập Nhập Ảnh Đại Diện</h5>
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
