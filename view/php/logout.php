<?php
    include '../../controler/connect.php';
    // Huỷ session theo tên
    // unset($_SESSION['user']);
    // Xoá tất cả session trên máy
    // session_destory()
    // setcookie("email", "", time() - (86400 * 30), "/");
    // setcookie("password", "", time() - (86400 * 30), "/");
    setcookie("user_data", $userDataJSON, time() - (86400 * 30), "/");
    setcookie("admin_data", $userDataJSON, time() - (86400 * 30), "/");
    setcookie('is_logged', false, time() -(86400 * 30), '/');
    header('location:home.php');
?>