
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Fira+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Uchen&family=Ysabeau:wght@200;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../html/css/header.css">
<link rel="stylesheet" href="../../html/css/cart.css">
<link rel="stylesheet" href="../../html/css/footer.css">
<title>MERY CAKE</title>
</head>
<!-- <body> -->
    <!-- Navbar -->
<?php 
        include 'header.php';
        $user = new user();
        $cart = new cart();

        $userDataJSON = isset($_COOKIE["user_data"])?$userDataJSON = $_COOKIE["user_data"]:"";
        $userData = json_decode($userDataJSON, true);
    
    
    // Thông tin người dùng khi đặt hàng
        if(!empty($userData['id'])){
            $sql_change_user_info = "SELECT *FROM temporary_information WHERE id_user=".$userData['id'];
            $request_change_info = $user->select_request($sql_change_user_info);
            $row_change_info = mysqli_fetch_assoc($request_change_info);
    
            $tables = ['cart', 'product'];
            $fields = ['cart.*', 'product.title', 'product.price', 'product.image',' product.quantity AS quantity_sp'];
            $conditions = ['product.id = cart.id_product','cart.user_id='.$userData['id'].''];
    
            $request_cart_show = $cart->select_inner_field($tables,$fields,$conditions);
        }
?>

    <!-- Home -->
    <section  id="cart_home">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="cart_01 col-lg-9 col-md-8 col-sm-12">
                    <div class="row ">
                        <div class="bg-white mb-3">
                            <h2 class="fw-bolder py-2" style="color: rgb(173, 121, 89); text-shadow: 1px 1px 5px rgb(184, 106, 58);">My Cart</h2>    
                        </div> 
                        <div class="text-black w-100 h-100 bg-white mb-3" >
                            <div class="text-center">
                                <div class="table_thread w-100">
                                    <div class="tr_table d-flex justify-content-between align-items-center fw-bolder" style="color: rgb(173, 121, 89);" class="tr-thread text-center">
                                        <div class="th-table product_checkbox"><input type="checkbox" name="checkbox" id=""></div>
                                        <div class= "th-table product_info_header" style="width: 296px;" colspan="2">Product information</div>
                                        <div class= "th-table product_price">Price</div>
                                        <div class= "th-table product_quantity">Quantity</div>
                                        <div class= "th-table product_money" style="padding-left: 30px;">Into Money</div>
                                        <div class="th-table product_delete" style="margin-left: 6px;"><i class='bx bxs-trash fs-4 mt-1' ></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-black w-100 h-100 px-2 bg-white">
                            <div class="text-center">
                                <form class="Update_quantity_product" ></form>
                                    <div class="table_thread w-100">   
                                        <?php 
                                            $num = 0;
                                            while($row_cart_show = mysqli_fetch_array($request_cart_show)){?>
                                            <div class="order_index tr_table d-flex justify-content-between align-items-center fw-bold" style="color: rgb(173, 121, 89);">
                                                <div class="th-table product_checkbox"><input class="checkbox_product" type="checkbox" name="checkbox_product" id=""></div>
                                                <div class= "th-table product_img" >
                                                    <img name="order_img" src="../../image/product/<?= $row_cart_show['image']  ?>" alt="">
                                                </div>
                                                <div class= "product_title">
                                                    <a href="../../view/php/product_detail.php?product_id=<?= $row_cart_show['id_product'] ?>"  name="order_title"><?= $row_cart_show['title']?></a>
                                                </div>
                                                <div class= "th-table product_price">
                                                    
                                                    <span name="order_price"><?= $row_cart_show['price'] ?>.000<small class=""></small><sub>đ</sub> </span>
                                                </div>
                                                <div class= "th-table product_quantity">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <button type="submit" class="up_and_down" id="minus-btn" onclick="handleMinus_cart(<?=$num?>,<?= $row_cart_show['quantity_sp'] ?>)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                                fill="none" viewBox="0 0 24 24" 
                                                                stroke-width="1.5" 
                                                                stroke="currentColor" 
                                                                class="w-6 h-6"
                                                            >
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                            </svg>                                          
                                                        </button>
                                                        <input type="text" name="quantity[<?=  $row_cart_show['id_product'] ?>]" id="quantity_cart" class="input-quantity" value="<?= $row_cart_show['quantity'] ?>">
                                                        <button type="submit" class="up_and_down" id="plus-btn" onclick="handlePlus_cart(<?=$num?>,<?= $row_cart_show['quantity_sp'] ?>)">
                                                            <!-- <i class="fa-solid fa-plus"></i> -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                                fill="none" viewBox="0 0 24 24" 
                                                                stroke-width="1.5" 
                                                                stroke="currentColor" 
                                                                class="w-6 h-6"
                                                            >
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                            </svg>
                                                            
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class= "th-table product_money">
                                                    <span class="total_money"><?= $row_cart_show['price']  * $row_cart_show['quantity'] ?>.000<small class=""></small><sub>đ</sub></span>
                                                </div>
                                                <div class="th-table product_delete"><a class="Icon_delete" href="../../controler/cart_controller.php?action=delete&&id=<?= $row_cart_show['id'] ?> "><i class='bx bxs-trash fs-4 mt-1' ></i></a></div>
                                            </div>
                                            
                                        <?php
                                            $num+=1;     
                                        }
                                            if(mysqli_num_rows($request_cart_show) == 0){
                                        ?>
                                            <div class="no_product w-100 d-flex justify-content-center align-item-center bg-white">
                                                <div class="img_no_product">
                                                        <img src="../../image/banner/Smart Online Shop.jpg" alt="">
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="infomation_customer col-lg-3 col-md-4 col-sm-12 text-black">
                    <div class="w-100 h-100 px-2 py-1 ">
                        <div class="Cusstomer-info col-12 bg-white px-2 py-2">
                            <div class="d-flex justify-content-between border-bottom mt-1">
                                <h6>Deliver To</h6>
                                <button type="button" class="bg-transparent border-0 fw-bold" style="color: #b15050;" data-bs-toggle="modal" data-bs-target="#change_address">
                                  Change
                                </button>
                                
                            </div>
                            <div id="order_customer">
                                <form action="" id="form_show_infomation_user_order" method="post">
                                <div class="info-user-default px-2 pb-0">
                                        <?php 
                                                if(!empty($row_change_info['username'])){
                                        ?>
                                            <input type="text" id="customer-info-name" class="customer-info-name mt-2 " name="show_user_order_name" 
                                            value="<?= $row_change_info['username'] ?>">        
                                        <?php } else{
                                        ?>
                                            <input type="text" id="customer-info-name" class="customer-info-name mt-2 " name="show_user_order_name"
                                            value="" placeholder="Update Name">   
                                        
                                        <?php }?>
                                        <!-- <input type='text' id="customer-info-name" class="customer-info-name mt-2 " name="show_user_order_name" value="<?= !empty($row_change_info['username'])?$row_change_info['username']:"Update Name" ?>"> -->
                                        <i class="" ></i>
                                        <?php 
                                                if(!empty($row_change_info['phone_number'])){
                                        ?>
                                            <input type="text" id="customer-info-phone" class="customer-info-phone fw-light mt-2" style="font-family: Inter;" name="show_user_order_phone" 
                                            value="<?= $row_change_info['phone_number'] ?>">        
                                        <?php } else{
                                        ?>
                                            <input type="text" id="customer-info-phone" class="customer-info-phone fw-light mt-2" style="font-family: Inter;" name="show_user_order_phone" 
                                            value="" placeholder="Vietnam(+84)">   
                                        
                                        <?php }?>
                                    </div>
                                    <div class="info-address-default">
                                        <span class="address-type-home">Adress</span>
                                        <?php 
                                            if(!empty($row_change_info['adress'])){
                                        ?>
                                            <input type="text" name="show_user_order_address" id="show_user_order_address"
                                            value="<?= $row_change_info['adress'] ?>">        
                                        <?php } else{
                                        ?>
                                            <input type="text" name="show_user_order_address" id="show_user_order_address" 
                                            value="" placeholder="Update address">   
                                        
                                        <?php }?>
                                    </div>
                                </form>
                            </div>
                            

                            <form action="../../controler/cart_controller.php?action=change_info" method="post" >
                                <div class="modal fade change_address" id="change_address" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Customer Information</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                  
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name_order" id="colFormLabel" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label f for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Phone number</label>
                                                    <div class="col-sm-9">
                                                      <input type="phone" class="form-control" name="phone_order" id="colFormLabel" placeholder="Vietname(+84)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label  for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="address_order" id="colFormLabel" placeholder="Enter address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn" name="Change_infomation">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="promotional_coupon mt-3 ">
                            <div class="mb-3 d-md-block d-sm-none ">
                               <img class="w-100" src="../../image/banner/GIAMGIA.jpg" alt="">
                            </div>
                        </div>
                        <div class="Total_Money mt-3 p-2 bg-white">
                            <div class="border-bottom mb-3 py-2">
                                <label class="freeship">FREESHIP</label>
                                <label class="fw-bold">has been applied !</label>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h6>Total Money</h6>
                                <span id="total_temporary">0<sub>đ</sub></span>
                            </div>
                        </div>
                                
                            <div class="w-100 mt-4">
                                <button type="submit" class="btnOrder w-100 py-2" id="btnOrder" name="Order" type="submit">Order</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php  include 'footer.php' ?>