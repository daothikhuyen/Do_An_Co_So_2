<?php 

    if(isset($_POST['register_admin'])){
        $username = $_POST['Username'];
        $email = $_POST['E-mail'];
        $phone = $_POST['Phone'];
        $address = $_POST['Address'];
        $bank = $_POST['Bank'];
        $bank_number = $_POST['Bank_numbers'];
        $password = $_POST['Password'];
        $confirm_pasword = $_POST['Confirm_pasword'];
        $error = [];

        $required_fields = ['Username', 'E-mail','Address','Bank','Bank_numbers','Password','Confirm_pasword'];

        foreach ($required_fields as $value) {
            if(empty($_POST[$value])){
                $error[$value] = $value.' is required';
            }
        }

        if($_POST['Bank'] === ''){
            $error['Bank'] = "Bank is required";
        }

        if(empty($_POST['Phone'])){
            $error['Phone'] = "Phone is required";
        }
        else if(!preg_match("/^[0-9]{10}$/",$phone)){
            $error['Phone'] = "Wrong format";
        }

        if(strlen($password)> 0 && strlen($password) < 3){
            $error['password'] = "Password must be at least 8 charactes long";
        }

        if($password != $confirm_pasword){
            $error['confirm_pasword'] = "Password does not match";
        }

        if(empty($error)){
            include '../../db/connection.php';
            include '../../model/base.php';
            include '../../model/user.php';
            $user = new user();

            $request = $user->select_query('email', $email);

            if(mysqli_num_rows($request) > 0){
                $error['notification'] = '<div class="Error_notifi">
                                                <span class="notification text-white">Account already exists</span>
                                            </div>';
            }else{
                $pass = password_hash($password, PASSWORD_DEFAULT);

                $data_user = array(
                    "username"=>$username,
                    "email"=>$email,
                    "phone_number"=>$phone,
                    "adress"=>$address,
                    "avatar"=> 'user.png',
                    "bank"=>$bank,
                    "bank_account_numbers"=>$bank_number,
                    "password"=>$pass,
                    "status" => 'admin'
                );
                
                $request_user = $user->create($data_user);

                if($request_user){

                    header("location:../php/login.php");
                }else{
                    $error['notification'] = '<div class="Error_notifi">
                                                    <span class="notification text-white">Registration failed</span>
                                                </div>';
                }
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">

<link rel="stylesheet" href="../../html/css/register_admin_css.css">
<title>Title</title>
</head>
<body>
    <form action="form_register_admin.php" method="post">
        <div class="form_admin">
            <div class="container">
                <div class="form_register_admin">
                    <h4>Register To Sell</h4>
                    <h6>Wishing you success in your career</h6>
                    <?=  isset($error['notification'])?$error['notification']:'' ?>
                    <div class="d-flex">
                        <div class="form_01">
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="text" name="Username" id="" placeholder="Username">
                                <small class="Error"><?php echo (isset($error['Username']))?$error['Username']:'' ?></small>
                            </div>
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="email" name="E-mail" id="" placeholder="E-mail">
                                <small class="Error"><?php echo (isset($error['E-mail']))?$error['E-mail']:'' ?></small>
                            </div>
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="text" name="Phone" id="" placeholder="Phone Number">
                                <small class="Error"><?php echo (isset($error['Phone']))?$error['Phone']:'' ?></small>
                            </div>
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="text" name="Address" id="" placeholder="Business Location">
                                <small class="Error"><?php echo (isset($error['Address']))?$error['Address']:'' ?></small>
                            </div>
                            <div class="content mb-2">
                                <span style="color:  hsl(24,53%,38%);">You want to login?</span>
                                <a href="../php/login.php" style="color: #a97575;">Login</a>
                            </div>
                        </div>
                        <div class="form_02">
                            <div class="form_control" style="margin-top: 20px;">
                                <select name="Bank" id="" class="bank w-100">
                                    <option value="">Bank Name</option>
                                    <option value="BIDV">BIDV</option>
                                    <option value="MB">MB</option>
                                    <option value="Agribank">Agribank</option>
                                </select>
                                <small class="Error"><?php echo (isset($error['Bank']))?$error['Bank']:'' ?></small>
                            </div>
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="text" name="Bank_numbers" id="" placeholder="Bank account numbers">
                                <small class="Error"><?php echo (isset($error['Bank_numbers']))?$error['Bank_numbers']:'' ?></small>
                            </div>
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="password" name="Password" id="" placeholder="Password">
                                <small class="Error"><?php echo (isset($error['Password']))?$error['Password']:'' ?></small>
                            </div>
                            <div class="form_control" style="margin-top: 20px;">
                                <input type="password" name="Confirm_pasword" id="" placeholder="Confirm Pasword">
                                <small class="Error"><?php echo (isset($error['Confirm_pasword']))?$error['Confirm_pasword']:'' ?></small>
                            </div>
                            <div class="button">
                                <button type="submit" name="register_admin">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>