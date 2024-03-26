
<?php
    // include 'connect.php';
    include '../db/connection.php';
    include '../model/base.php';
    include '../model/user.php';

    $user = new User();

    $userDataJSON = isset($_COOKIE["user_data"])?$userDataJSON = $_COOKIE["user_data"]:'';
    $userData = json_decode($userDataJSON, true);

    if(isset($_GET['update_user'])){
        $img = $_FILES['fileImg_comment']['name'];
        $img_tmp = $_FILES['fileImg_comment']['tmp_name'];
        if(empty($img)){
            $img = $userData['avatar'];
        }

        $username = $_POST['username'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $Nationality = $_POST['Nationality'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $user->update_user($username,$email,$address,$phone,$img,$gender,$Nationality,'id',$userData['id']);
        
        $founder = "/image";
        $element = $founder .basename($img_tmp_name);

        if(!file_exists($element)){
            move_uploaded_file($img_tmp_name,'../../image/avatar/'.$img);
        }
        header("location:../view/php/account_info.php");

    }
?>
