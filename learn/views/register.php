<?php
   
    if(isset($_POST['register'])){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $enterPassword = trim($_POST['Re-enter_Password']);
        $error = [];

        if(empty($username)){
            $error['username'] = "Username is required";
        }
        if(empty($email)){
            $error['email'] = "Email is required";
        }
        if(empty($password)){
            $error['password'] = "Password is required";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = "Email is not vaild";
        }
        if(strlen($password)> 0 && strlen($password) < 3){
            $error['password'] = "Password must be at least 8 charactes long";
        }
        if($enterPassword != $password){
            $error['Re-enter_Password'] = 'Password does not match';
        }

        if(empty($error)){
            // include '../../controler/connect.php';
            include '../../learn/models/user.php';

            $pass = password_hash($password, PASSWORD_DEFAULT);
                $sql_user = "INSERT INTO `user`( `username`, `email`, `avatar`,`password`) VALUES 
                                                ('$username','$email','user.png','$pass')";
                $user = new User();
                $user = $user->create($username, $email, 'user.png', $pass);
                if($user){
                    $error['notification'] = `  <div class="Error_notifi">
                                                <span class="notification">Registration success</span>
                                            </div>`;
                    header("location:login.php");
                }else{
                    $error['notification'] = `  <div class="Error_notifi">
                                                <span class="notification">Registration failed</span>
                                            </div>`;
                }

            // $sql = "SELECT * FROM user WHERE username='$username' OR email  = '$email'";
            // $request = mysqli_query($conn, $sql);
            // if(mysqli_num_rows($request) > 0){
            //     $error['notification'] = `  <div class="Error_notifi">
            //                                     <span class="notification">Account already exists</span>
            //                                 </div>`;
            // }else{
            //     $pass = password_hash($password, PASSWORD_DEFAULT);
            //     $sql_user = "INSERT INTO `user`( `username`, `email`, `avatar`,`password`) VALUES 
            //                                     ('$username','$email','user.png','$pass')";
            //     $user = new User();
            //     $user = $user->create($username, $email, 'user.png', $pass);
            //     if($user){
            //         $error['notification'] = `  <div class="Error_notifi">
            //                                     <span class="notification">Registration success</span>
            //                                 </div>`;
            //         header("location:login.php");
            //     }else{
            //         $error['notification'] = `  <div class="Error_notifi">
            //                                     <span class="notification">Registration failed</span>
            //                                 </div>`;
            //     }
            // }
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../../html/css/login.css">
<title>Title</title>
</head>
<body>
    <div class="login">
        <div class="form_login">
            <div class="form">
                <h2>Register</h2>
                <?php echo isset($error['notification'])?$error['notification']:'' ?>
                <form action="register.php" method="post">
                    <div class="form_control" style="margin-top: 20px;">
                        <input type="text" name="username" id="" placeholder="Username">
                        <span></span>
                        <small class="Error"><?php echo (isset($error['username']))?$error['username']:''  ?></small>
                    </div>
                    
                    <div class="form_control">
                        <input type="email" name="email" id="" placeholder="Email ">
                        <span ></span>
                        <small class="Error"><?php echo (isset($error['email']))?$error['email']:'' ?></small>
                    </div>
                    <div class="form_control">
                        <input type="password" name="password" id="" placeholder="Password?">
                        <span></span>
                        <small class="Error"><?php echo (isset($error['password']))?$error['password']:'' ?></small>
                    </div>
                    <div class="form_control">
                        <input type="password" name="Re-enter_Password" id="" placeholder="Re-enter the password?">
                        <span></span>
                        <small class="Error"><?php echo (isset($error['Re-enter_Password']))?$error['Re-enter_Password']:'' ?></small>
                    </div>
                    
                    <div class="button">
                        <button type="submit" name="register">Register</button>
                    </div>
                    <h6 class="text-center mt-4">Faster Register With Your Favourite Social Profite</h6>
                    <div class="social d-flex justify-content-center mb-4 mt-4">
                        <span><i class="fa-brands fa-facebook-f"></i></span>
                        <span><i class="fa-brands fa-google-plus-g"></i></span>
                        <span><i class="fa-brands fa-twitter"></i></span>
                    </div>
                    <div class="content text-center mb-2">
                        <span>You want to login?</span>
                        <a href="login.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>