
<?php 

    $order = new Order();

    $sql = "SELECT DH.id, DH.user_id,DH.status , DH.total_money, DHCT.product_id, DHCT.quantity, DHCT.price, SP.title, SP.image
    FROM `order` DH 
    INNER JOIN order_detail DHCT ON DH.id = DHCT.order_id
    INNER JOIN product SP ON DHCT.product_id = SP.id
    WHERE DH.user_id = ".$userData['id']."  AND DH.status = 1";
    
    $request = $order->select_request($sql);

    $rows = mysqli_fetch_all($request, MYSQLI_ASSOC);

?>
<section class="session_order Order_is_being_delivered hide_order">
<div class="order_success my-3">
        <div class="success_product px-3">
            <div class="border-bottom d-inline-block  px-2 mb-2 rounded-3">
                <div class="d-flex align-items-center">
                    <span class="mx-2 fs-6"><i class="fa-solid fa-truck"></i></span>
                    <h6 class="fw-bold">Shipping</h6>
                </div>
            </div>
            <?php 
                $status = 0;
                $id = 0;
                $num = count($rows);
                for ($i = 0; $i < count($rows); $i++) { 
                    $currenttRown = $rows[$i];

            ?>
                <div class="product_order_items d-flex align-items-center justify-content-between py-2">
                    <div class="d-flex align-items-center">
                        <div class="order_img_product">
                            <img class="w-100" src="../../image/product/<?= $rows[$i]['image'] ?>" alt="">
                        </div>
                        <div class="order_product_name ms-3">
                            <span class="name fw-bold"><?= $rows[$i]['title'] ?></span> <br>
                            <span class=" ps-3" style="font-size: 10px;">
                                <i class="fa-solid fa-shop " style="font-size: 10px;"></i> 
                                Shop Mery Cake
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="" style="color: #b15050; font-weight: 550;"> 
                            <label for=""><?= $rows[$i]['price'] ?>.000<sub>đ</sub></label>
                            <label for="">x</label>
                            <label for=""><?= $rows[$i]['quantity'] ?></label>
                        </span>
                    </div>
                    <div class="product_money_item pe-3">
                        <h6 class="fw-bold"><?= $rows[$i]['price'] * $rows[$i]['quantity'] ?>.000<sub>đ</sub></h6>
                    </div>
                </div>

            <?php
                if ( !empty($rows[$i+1]['id']) ) {
                    if($rows[$i]['id'] !== $rows[$i+1]['id']){
                            
            ?>

                <div class="total_money_order mt-2">
                    <div>
                        <span class="" style="color: #b15050;">Delivering</span>
                    </div>
                    <div class="money_primary d-flex align-items-center">
                        <h6 class="fw-bold me-3" style="color: rgb(125, 100, 69,0.7);">Total Money :</h6>
                        <span><?= $currenttRown['total_money'] ?></span>
                    </div>
                </div>
            <?php
                }
            }else{
            ?>
                <div class="total_money_order mt-2">
                    <div>
                        <span class="" style="color: #b15050;">Delivering</span>
                    </div>
                    <div class="money_primary d-flex align-items-center">
                        <h6 class="fw-bold me-3" style="color: rgb(125, 100, 69,0.7);">Total Money :</h6>
                        <span><?= $currenttRown['total_money'] ?></span>
                    </div>
                </div>
            <?php
                }
            }

             ?> 
            
            
        </div>
    </div>
</section>
