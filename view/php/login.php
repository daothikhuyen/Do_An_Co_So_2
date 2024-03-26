<?php
    // include '../../controler/connect.php';
    include '../../db/connection.php';
    include '../../model/base.php';
    include '../../model/user.php';

    if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $error = [];

        if(empty($email)){
            $error['email'] = "Email is required";
        }
        if(empty($password)){
            $error['password'] = "Password is required";
        }
        if(!filter_has_var(INPUT_POST, 'checkRobot')){
            $error['checkRobot'] = "You are a robot";
        }

        if(empty($error)){
            $user = new user();
            $query = $user->select_query('email',$email);
            $data = mysqli_fetch_assoc($query);
            // echo $data;
            if(mysqli_num_rows($query) > 0 ){

                if($data['status'] === 'user'){

                    $checkPass = password_verify($password, $data['password']);
    
                    if($checkPass){
                        $userDataJSON = json_encode($data);
                        setcookie("user_data", $userDataJSON, time() + (86400 * 30), "/");
                        header("location:home.php");
                    }{
                        $error['notification'] ='<div class="Error_notifi">
                                                    <span class="notification">Password is wrong</span>
                                                </div>';
                    }
                }else if($data['status'] === 'admin'){
                    $checkPass = password_verify($password, $data['password']);
    
                    if($checkPass){
                        $userDataJSON = json_encode($data);
                        setcookie("admin_data", $userDataJSON, time() + (86400 * 30), "/");
                        header("location:../admin_php/add_product_admin.php");
                    }{
                        $error['notification'] ='<div class="Error_notifi">
                                                    <span class="notification">Password is wrong</span>
                                                </div>';
                    }
                }
            }else{
                $error['notification'] ='<div class="Error_notifi">
                                            <span class="notification">Email does not exist</span>
                                        </div>';
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../../html/css/login.css">
<title>Title</title>
</head>
<body>
    <div class="login">
        <div class="form_login">
            <div class="form">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <?php echo (isset($error['notification']))?$error['notification']:'' ?>
                    <div class="form_control" style="margin-top: 20px;">
                        <input type="email" name="email" id="" placeholder="Email">
                        <span></span>
                        <small class="Error"><?php echo (isset($error['email']))?$error['email']:'' ?></small>
                    </div>
                    <div class="form_control">
                        <input type="password" name="password" id="" placeholder="Password?">
                        <span></span>
                        <small class="Error"><?php echo (isset($error['password']))?$error['password']:'' ?></small>
                    </div>
                    <div class="tick">
                        <div class="check d-flex align-items-center">
                            <input type="checkbox" name="checkRobot" value="I'm not a robot">
                            <label for="">I'm not a robot <i class="fa-solid fa-recycle"></i></label>
                        </div>               
                        <div class="forgot_Pass">
                            <a href="#">Forgot Password?</a>
                        </div>

                        
                    </div>
                    <div class="Error_check"><?php echo (isset($error['checkRobot']))?$error['checkRobot']:'' ?></div>
                    <div class="button">
                        <button type="submit" name="login">Login</button>
                    </div>
                    <h6 class="text-center mt-4">Or login with</h6>
                    <div class="social d-flex justify-content-center mb-4 mt-4">
                        <span><i class="fa-brands fa-facebook-f"></i></span>
                        <span><i class="fa-brands fa-google-plus-g"></i></span>
                        <span><i class="fa-brands fa-twitter"></i></span>
                    </div>
                    <div class="content text-center mb-2">
                        <span>Not a member?</span>
                        <a href="register.php">Register</a>
                        <!-- <a href="register.php" data-bs-toggle="modal" data-bs-target="#modalId">Register</a> -->
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>