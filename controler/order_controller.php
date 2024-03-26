
<?php

include '../db/connection.php';
include '../model/base.php';
include '../model/order_mode.php';
include '../model/shop_mode.php';
include '../model/order_detail_mode.php';
include '../model/cart_mode.php';
include '../model/comment.php';

$userDataJSON = isset($_COOKIE["user_data"])?$userDataJSON = $_COOKIE["user_data"]:'';
$userData = json_decode($userDataJSON, true);

$shop = new Shop();
$order = new Order();
$product = new Shop();
$order_detail = new Order_Detail();
$cart = new cart();
$comments = new Comments();
$connection = new Connection();

$con = $connection->connect();
    
    if(isset($_GET['Create_Order'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $sql_order = "INSERT INTO `order`(`user_id`, `fullname`, `email`, `adress`, `phone_number`, `status`, `total_money`, `create_time`, `last_time`) 
                    VALUES ('".$userData['id']."','".$_POST['username_order']."','".$userData['email']."','".$_POST['address_order']."','".$_POST['phone_order']."','0','".$_POST['total_money']."','".date("d-m-Y h:i:sa")."','".date("d-m-Y h:i:sa")."')";
        
        mysqli_query($con,$sql_order);
        $order_id = $con->insert_id;
        // echo $order_id;

        foreach ($_POST['quantity'] as $id => $quantity) {

            $request_order_product = $shop->select_query('id',$id,'select');
            $row_order = mysqli_fetch_assoc($request_order_product);

            $order_detail->create($order_id,$id,$quantity,$row_order['price'], date("d-m-Y h:i:sa"), date("d-m-Y h:i:sa"));

            $sql = "DELETE FROM `cart` WHERE `user_id` = ".$userData['id'] ." AND `id_product` =".$row_order['id'];

            $cart->select_request($sql);

            $quantity_data = $shop->select_query('id', $id,'select');
            $row_select_product = mysqli_fetch_assoc($quantity_data);
            $num_quantity = $row_select_product['quantity'] - $quantity;

            // Update sản phẩm trong sản phẩm
            $data_product_update = array(
                'quantity' => $num_quantity
            );

            $shop->update_product($data_product_update,'id',$id);

            echo 'Thêm Thành Công';
        }
    }

    if(isset($_GET['cancel_order'])){
        $sql_cancel = "UPDATE `order` SET `status` = '3' WHERE id =".$_GET['cancel_order'];
        $order->select_request($sql_cancel);

        $select_quantity_order = $order_detail->select_where('order_detail','order_id',$_GET['cancel_order']);
        $row_quantity_cancel = mysqli_fetch_assoc($select_quantity_order);

        $quantity_data = $shop->select_query('id',$_GET['product_id'],'select');
        $row_select_product = mysqli_fetch_assoc($quantity_data);

        // Tăng lại số lượng sản phâme trong kho
        $num_quantity = $row_select_product['quantity'] + $row_quantity_cancel['quantity'];

            // Update sản phẩm trong sản phẩm
            $data_product_update = array(
                'quantity' => $num_quantity
            );

        $shop->update_product($data_product_update,'id',$_GET['product_id']);
        header('location:../view/php/order.php');
    }

    if(isset($_GET['see_detail_id'])){
        $sql_see_detail = "SELECT DH.*, DHCT.product_id, DHCT.quantity, DHCT.price, SP.title, SP.image
        FROM `order` DH INNER JOIN order_detail DHCT 
        ON DH.id = DHCT.order_id
        INNER JOIN product SP
        ON DHCT.product_id = SP.id
        WHERE DH.user_id =".$userData['id']." AND DH.id=".$_GET['see_detail_id'] ;

        $request_order_product = $order_detail->select_request($sql_see_detail);

        $rows = array();
        while($row_see_detail = mysqli_fetch_array($request_order_product)){
            $rows[] = $row_see_detail;
        }
        
        echo json_encode($rows);

    }

    if(isset($_GET['insert_comment'])){

        foreach ($_POST['id_product'] as $value) {

            $comments->create($userData['id'],$value,$_POST['content_comment'],date('d/m/y'));
        }
    }
    
    


    
?>