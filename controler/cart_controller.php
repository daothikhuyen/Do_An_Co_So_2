<?php 
    include '../db/connection.php';
    include '../model/base.php';
    include '../model/cart_mode.php';
    include '../model/shop_mode.php';
    $cart = new cart();
    $shop = new Shop();

    $userDataJSON = isset($_COOKIE["user_data"])?$userDataJSON = $_COOKIE["user_data"]:'';
    $userData = json_decode($userDataJSON, true);
    

    function insert($add = false,$shop,$user_id){
        // $shop = new Shop();
        $cart = new cart();
        
        if ( isset($_GET['product_id']) && isset ($_GET['quantity'])) {
            $id = $_GET['product_id'];
            $quantity = $_GET['quantity'];

            $request_cart_id = $shop->select_query('id',$id,'select');

            $id_diffrent = 0;
            $row_quantity = 0;
            while($row = mysqli_fetch_array($request_cart_id)){
                if($row['quantity'] == 0){
                    $request_cart_id = $cart->select_query('user',$id,'delete');
                }else{
                    if($add == true){
                        
                        $request_cart_insert = $cart->select_query('user_id',$user_id,'select');

                        while($row_update = mysqli_fetch_array($request_cart_insert)){
                            if($row_update['id_product'] == $id){
                                $id_diffrent++;
                                $row_quantity = $row_update['quantity'];
                            }
                        }

                        if($id_diffrent != 0){
                            $row_quantity += $quantity;

                            $cart->select_request("UPDATE `cart` SET `quantity`='$row_quantity' WHERE `user_id`= $user_id AND `id_product`= $id");
                        }else{
                            $cart->create($id,'0',$quantity,$user_id);
                           
                        }
                    }
                }
            }
            return true;

        }

    }

    if(!empty($userData['id'])){
        if(isset($_GET['action'])){
            switch ($_GET['action']){
                case 'add':
                    $result = insert(true,$shop,$userData['id']);
                    break;
                case 'delete':
                    $cart->select_query('id',$_GET['id'],'delete');
                    header("location:../view/php/cart.php");
                    break;
                case 'change_info':
                    if(isset($_POST["Change_infomation"])){
                        $data_user_order = [];
                        $data_user_order['name_order'] = $_POST['name_order'];
                        $data_user_order['phone_order'] = $_POST['phone_order'];
                        $data_user_order['address_order'] = $_POST['address_order'];

                        $sql_select_user = "SELECT * FROM temporary_information WHERE id_user =".$userData['id'];
                        $request_select_info = $cart->select_request($sql_select_user);

                        if(mysqli_num_rows($request_select_info) > 0){
                            $sql_temporary = "UPDATE `temporary_information` SET `username`='".$data_user_order['name_order']."',`phone_number`='".$data_user_order['phone_order']."',`adress`='".$data_user_order['address_order']."' WHERE id_user =".$userData['id'];
                            $sql_info_temporary = $cart->select_request($sql_temporary );
                            header('location:../view/php/cart.php');
                        }else{
                            $sql_temporary = "INSERT INTO `temporary_information`(`username`, `phone_number`, `adress`,`id_user`) VALUES ('".$data_user_order['name_order']."','".$data_user_order['phone_order']."','".$data_user_order['address_order']."','".$userData['id']."')";
                            $sql_info_temporary = $cart->select_request($sql_temporary);
                            header('location:../view/php/cart.php');
                        }
                        
                        
                    }
                    break;
                case 'submit':
                    if($_SERVER['REQUEST_METHOD'] =='POST'){
                        foreach ($_POST['quantity'] as $id_product => $quantity) {
                            $cart->select_request("UPDATE `cart` SET`quantity`='$quantity' WHERE `id_product`='$id_product'");
                        }
                         
                    }
                    
                    break;
            }
        }
    }else{
        echo "bạn chưa đăng nhập";
    }
?>


