<?php

    $order = new Order();

        $sql = "SELECT DH.id, DH.user_id,DH.status , DH.total_money, DHCT.product_id, DHCT.quantity, DHCT.price, SP.title, SP.image
        FROM `order` DH 
        INNER JOIN order_detail DHCT ON DH.id = DHCT.order_id
        INNER JOIN product SP ON DHCT.product_id = SP.id
        WHERE DH.user_id = ".$userData['id']." AND DH.status = 2";
    
        // $request = mysqli_query($conn,$sql);
        $request = $order->select_request($sql);
    
        $rows = mysqli_fetch_all($request, MYSQLI_ASSOC);
?>
<section class="session_order Order_has_been_delivered hide_order">
    <div class="order_success my-3">
        <div class="success_product px-3">
            <div class="border-bottom d-inline-block  px-2 mb-2 rounded-3">
                    <div class="d-flex align-items-center">
                        <span class="mx-2 fs-6"><i class="fa-solid fa-truck"></i></span>
                        <h6 class="fw-bold">Successful Delivery</h6>
                    </div>
                </div>
            <?php 
                $status = 0;
                $id = 0;
                $num = count($rows);
                for ($i = 0; $i < count($rows); $i++) { 
                    $id = $rows[$i];
                    $currenttRown = $rows[$i];

            ?>
                <div class="product_order_items d-flex align-items-center justify-content-between py-2">
                    <div class="d-flex align-items-center">
                        <div class="order_img_product">
                            <!-- <input type="hidden" class="id_order" name="id_order" id="id_order" value=""> -->
                            <input type="hidden" name="id_product" class="id_product_<?= $rows[$i]['id'] ?>" value="<?= $rows[$i]['product_id'] ?>">
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

                <div class="total_money_order pt-2">
                    <div class="d-flex align-items-center">
                        <span class="">
                            <label>Order Paid</label>
                        </span>
                        <span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#see_detail" class='see_detail'>See detail</button>
                        </span>
                        <span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#comment_product_order" class="comment">Comment</button>
                        </span>
                    </div>
                    <div class="money_primary d-flex align-items-center">
                        <input type="hidden" class="id_order" name="id_order" id="id_order" value="<?= $id['id'] ?>">
                        <h6 class="fw-bold me-3" style="color: rgb(125, 100, 69,0.7);">Total Money :</h6>
                        <span><?= $currenttRown['total_money'] ?></span>
                    </div>
                </div>
            <?php
                }
            }else{
            ?>
                <div class="total_money_order pt-2">
                    <div class="d-flex align-items-center">
                        <span class="">
                            <label>Order Paid</label>
                        </span>
                        <span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#see_detail" class='see_detail'>See detail</button>
                        </span>
                        <span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#comment_product_order" class="comment">Comment</button>
                        </span>
                    </div>
                    <div class="money_primary d-flex align-items-center">
                    <input type="hidden" class="id_order" name="id_order" id="id_order" value="<?= $id['id'] ?>">
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
    <div class="see_detail_order">                         
    <!-- Modal Body -->
        <div class="modal fade" id="see_detail" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal_see_detail_order modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title d-flex align-items-center" style="color: #7d6445;" id="modalTitleId">
                            <span class="mx-2 fs-6"><i class="fa-solid fa-truck"></i></span>
                            <span class="fw-bold">Order Delivered</span>
                            <span></span>
                        </h6>
                            <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body">
                        <div class="info_user_order">
                            <h5 class="tittle_order">Customer information</h5>
                            <div class="input_info_user_order ps-3">
                                <div class="order_info_parent d-flex">
                                    <div class="permanent_info_child">
                                        <span for="" class="permanent_info_01">Username </span>
                                    </div>
                                    <span class="detail_name">: Đào Thị Khuyên </span>
                                </div>
                                <div class="order_info_parent d-flex">
                                    <div class="permanent_info_child">
                                        <span for="" class="permanent_info_01">Phone Number(+84) </span>
                                    </div>
                                    <span class="detail_phone">: 0834006551 </span>
                                </div>
                                <div class="order_info_parent d-flex">
                                    <div class="permanent_info_child">
                                        <span for="" class="permanent_info_01">Address </span>
                                    </div>
                                    <span class="detail_address">: Tam Kỳ, Quảng Nam </span>
                                </div>
                            </div>
                        </div>
                        <div class="order_success order_success_child">
                            <h5 class="tittle_order">Order Information</h5>
                            <div class="day px-3 border-bottom pb-4">
                                <div class="pb-2">
                                    <label for="" class="fw-bold">Form of Payment:</label>
                                    <label for="">Cash payment</label>
                                </div>
                                <div class=" d-flex justify-content-between pb-2">
                                    <div class="order_date">
                                        <label for="" class="fw-bold">Date Of Order: </label>
                                        <label for="" class="detail_date_order">31-07-2004</label>
                                    </div>
                                    <div class="Delivery_day">
                                        <label for="" class="fw-bold">Delivery Day: </label>
                                        <label for="" class="detail_date_order_last">31-07-2004</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="Purchase_Order fw-bold" >
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-bag-shopping"></i></h6>
                                            <h6 class="fw-bold ms-1" >Purchase Order</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="success_product px-3 mt-4">
                                
                                <div class="product_order_items_detail">
       
                                </div>
                                <div class="total_money_order">
                                    <div>
                                        <span class="" style="color: #b15050;">Order Paid</span>
                                    </div>
                                    <div class="money_primary">
                                        <div>
                                            <label class="fw-bold me-3" style="color: rgb(125, 100, 69,0.7);">Tax :</label>
                                            <span >0<sub>đ</sub></span>
                                        </div> <br>
                                        <div>
                                            <label class="fw-bold me-3" style="color: rgb(125, 100, 69,0.7);">Total Money :</label>
                                            <span  class="total_detail"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end body -->
                </div>
            </div>
        </div>
    </div>
    <div class="comment_product">
        <div class="modal fade" id="comment_product_order" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="mode_comment_product modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Product Comments</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="row mb-2 d-inline-block ">
                            <div class="error_comment col-12 fw-bold p-1 d-inline-block rounded-3 text-danger">
                                
                            </div>
                        </div>
                        <div class="row">
                            <label  for="colFormLabelSm" class="mode_comment_product_01 col-sm-3 col-form-label col-form-label-sm">Content</label>
                            <div class="col-sm-9">
                                <textarea class="w-100 border rounded-3" name="" id="textarea_comment" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="insert_comment" id="insert_comment" name="Change_infomation">Comment</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>