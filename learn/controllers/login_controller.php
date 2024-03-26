<?php
    include '../../controler/connect.php';

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

            
            $sql = "SELECT * FROM `user` WHERE email = '$email'";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($query);
            // echo $data;
            if(mysqli_num_rows($query) > 0){

                $checkPass = password_verify($password, $data['password']);

                if($checkPass){
                    // $_SESSION['user'] = $data;
                    setcookie('is_logged', true, time()+ (86400 * 30), '/');
                    // $setcookie_value = $data_User;
                    setcookie("email",$email, time() + (86400 * 30), "/");
                    setcookie("password",$password, time() + (86400 * 30), "/");
                    // 1 tháng
                    header("location:home.php");
                }{
                    $error['notification'] ='<div class="Error_notifi">
                                                <span class="notification">Password is wrong</span>
                                            </div>';
                }
            }else{
                $error['notification'] ='<div class="Error_notifi">
                                            <span class="notification">Email does not exist</span>
                                        </div>';
            }
            
        }
    }
?>