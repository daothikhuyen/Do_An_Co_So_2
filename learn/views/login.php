<?php include '../controllers/login_controller.php' ?>

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
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <?php echo (isset($error['notification']))?$error['notification']:'' ?>
                    <div class="form_control" style="margin-top: 20px;">
                        <input type="email" name="email" id="" placeholder="Email ">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>