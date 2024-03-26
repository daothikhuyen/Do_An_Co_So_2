
<?php
    $server ='localhost';
    $user ='root';
    $pass = '';
    $database ='do_an_cs2';

    $conn = new mysqli($server, $user, $pass, $database);

    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8' ");
        // session_start();
        // echo 'Đã kết nối thành công';
        // echo '<br>';
    }else{
        echo 'Kết nối không thành công';
    }
?>