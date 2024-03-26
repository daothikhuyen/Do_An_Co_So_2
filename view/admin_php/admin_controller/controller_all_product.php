
<?php 
    session_start();
    include '../../../db/connection.php';
    include '../../../model/base.php';
    include '../../../model/shop_mode.php';
    include '../../../model/order_mode.php';

    $userDataJSON = isset($_COOKIE["admin_data"])?$userDataJSON = $_COOKIE["admin_data"]:'';
    $userData = json_decode($userDataJSON, true);

    $shop = new Shop();
    $order = new Order();

    if(isset($_GET['id_product'])){
        echo $_GET['id_product'];
        $res = $shop->select_query('id',$_GET['id_product'], 'delete');

    }

    if(isset($_GET['insert'])){
        switch ($_GET['insert']) {
            case 'success':
                $_SESSION['status_insert'] = 'success';
                $_SESSION['status_code_insert'] = 'Add product successfully';
                header('location:../add_product_admin.php');
                break;
            case 'fail':
                $_SESSION['status_insert'] = 'warning';
                $_SESSION['status_code_insert'] = 'Add failed product';
                header('location:../add_product_admin.php');
                break;
            default:
                break;
        }
    }

    if(isset($_GET['not_confirm'])){
        $data_order = array(
            'status'=>'1'
        );
        $res = $order->update_order($data_order,'id', $_GET['not_confirm']);
        if($res){
            $_SESSION['status'] = 'success';
            $_SESSION['status_code'] = 'Successful order confirmation';
            header('location:../order_confirm.php');
        }else{
            $_SESSION['status'] = 'warning';
            $_SESSION['status_code'] = 'Order confirmation failed';
            header('location:../order_confirm.php');
        }
    }

    if(isset($_GET['cancel'])){
        $data_order = array(
            'status'=>'3'
        );
        $res = $order->update_order($data_order,'id', $_GET['cancel']);
        if($res){
            $_SESSION['status'] = 'success';
            $_SESSION['status_code'] = 'Order canceled successfully';
            header('location:../cancel_order.php');
        }else{
            $_SESSION['status'] = 'warning';
            $_SESSION['status_code'] = 'Order cancellation failed';
            header('location:../cancel_order.php');
        }
    }

    if(isset($_GET['shipping'])){
        $data_order = array(
            'status'=>'2'
        );
        $res = $order->update_order($data_order,'id', $_GET['shipping']);
        if($res){
            $_SESSION['status'] = 'success';
            $_SESSION['status_code'] = 'Confirmed Successfully';
            header('location:../Order_is_shipping.php');
        }else{
            $_SESSION['status'] = 'warning';
            $_SESSION['status_code'] = 'Confirmation Failed';
            header('location:../Order_is_shipping.php');
        }
    }
   

?>
