
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
  <link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Fira+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Uchen&family=Ysabeau:wght@200;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../html/css/header.css">
<link rel="stylesheet" href="../../html/css/product_detail.css">
<link rel="stylesheet" href="../../html/css/footer.css">
<title>MERY CAKE</title>
</head>

<?php
    include 'header.php';
    include '../../model/shop_mode.php';
    $shop = new Shop();
    $user = new user();

    if(!empty($_GET['product_id'])){

    // show like or dis like
        function getLikes($comment_id){
            global $userData;
            global $user;

            $sql = "SELECT COUNT(*) FROM `rating_info`
                    WHERE `comment_id` = $comment_id AND `rating_action`= 'like'";
            
            $res = $user->select_request($sql);
            $result = mysqli_fetch_array($res);

            return $result[0];
        }

        function getDisLikes($comment_id){
            global $userData;
            global $user;

            $sql = "SELECT COUNT(*) FROM `rating_info`
                    WHERE `comment_id` = $comment_id AND `rating_action`= 'dislike'";
            
            $res = $user->select_request($sql);
            $result = mysqli_fetch_array($res);

            return $result[0];
        }
        
        function userLike($comment_id){
            global $userData;
            global $user;

            $sql = "SELECT *FROM `rating_info` WHERE `user_id` = ".$userData['id']." AND `comment_id` = $comment_id AND `rating_action` = 'like' ";
            $result = $user->select_request($sql);
            if(mysqli_num_rows($result) > 0){
                return true;
            }else{
                return false;
            }
        }

        function userDisLike($comment_id){
            global $userData;
            global $user;

            $sql = "SELECT *FROM `rating_info` WHERE `user_id` = ".$userData['id']." AND `comment_id` = $comment_id AND `rating_action` = 'dislike' ";
            $result = $user->select_request($sql);
            if(mysqli_num_rows($result) > 0){
                return true;
            }else{
                return false;
            }

        }

        $tables = ['product', 'category'];
        $fields = ['product.*', 'category.name'];
        $conditions = ['product.category_id = category.id',"product.id=".$_GET['product_id'].""];

        $request = $shop->select_inner_join($tables,$fields,$conditions);
        $row_product = mysqli_fetch_assoc($request);

// Comments
        $tables_comment = ['user', 'comments'];
        $fields_comment = ['username','avatar','content', 'comments.id AS comment_id'];
        $conditions_comment = ['user.id = comments.user_id',"product_id=".$_GET['product_id'].""];
            
        $request_comment = $user->select_inner_join($tables_comment,$fields_comment,$conditions_comment);
    }
?>
        <!-- Home -->
        
    <section class="product_detail_session">
        
        <div class="section_header" style="background-color: rgb(249, 233, 233,0.6);">
            <div class="title">
                <h1><?= $row_product['title']?></h1>
            </div>

            <!-- product detail -->
            <div class="container my-5 p-3">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12" >
                        <div class="details-img p-sm-2 col-12">
                            <img class="w-100" src="../../image/product/<?= $row_product['image']?>" alt="">
                        </div>
                        <div class="row mt-3 ms-1 mb-sm-3 ">
                            <div class="Image_Son col-md-3 col-sm-3 col-3 active">
                                <img class="w-100" src="../../image/product/<?= $row_product['image']?>" alt="">
                            </div>
                            <div class="Image_Son col-md-3 col-sm-3 col-3">
                                <img class="w-100" src="../../image/product/<?= $row_product['image']?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="content_product col md-8 col-sm-8 p-3 text-black" >
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <!-- <form class="quick-buy-form" method="post"> -->
                                    <h2><?= $row_product['title']?></h2>
                                    <hr style="width: 50px; height: 3px;">
                                    <div class="d-flex justify-content-between me-5 my-4">
                                        <div class="kind"><span class="text-black fw-light">Type:</span> <?= $row_product['name']?> </div> 
                                        <div class="kind">
                                            <span class="text-black fw-light">Warehouse:</span>
                                            <span class="limit_quantity"><?= $row_product['quantity']?></span>
                                        </div>
                                    </div>
                                    <h1><?= $row_product['price']?>.000<small><sub>đ</sub></small></h1>
                                    <div class="my-4">
                                        Old Price: <span class="Lastprice"><?= $row_product['discount']?>.000<small>đ</small></span><br>
                                    </div>
                                    <div class="product_quantity">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button type="button" class="up_and_down" id="minus-btn" onclick="handleMinus()">
                                                <!-- <i class="fa-solid fa-minus ms-1"></i> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" 
                                                    fill="none" viewBox="0 0 24 24" 
                                                    stroke-width="1.5" 
                                                    stroke="currentColor" 
                                                    class="w-6 h-6"
                                                >
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                </svg>                                          
                                            </button>
                                            <input type="text" name="quantity[<?= $row_product['id'] ?>]" id="quantity" class="input-quantity text-center border-0 d-flex align-items-center" style="width: 50px; font-size: 20px;" value="1">
                                            <button type="button" class="up_and_down" id="plus=btn" onclick="handlePlus()">
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
                                    
                                    <div class=" my-4">
                                        <!-- <input type="submit" class="AddToCart" id="AddToCart" name="addtocart" value="Mua sản phẩm"> -->
                                       <button class="AddToCart" id="AddToCart" name="addtocart"  onclick="AddToCart(<?= $row_product['id'] ?>)">Add To Cart</button>
                                    </div>
                                <!-- </form> -->
                            </div>
                            <div class="col-md-5 d-md-block d-none">
                                <div class="video_advertisement">
                                    <video class="w-100" src="../../image/video/quang_cao.mp4" loop autoplay muted></video>
                                </div>
                                <div class="w-100">
                                    <div class="row mt-3 mb-sm-3 ">
                                        <div class="col-md-4 col-sm-4 col-4 bg-black">
                                            <img class="w-100" src="../../image/banner/advertisement.jpg" alt="">
                                        </div>
                                        <div class="col-md-8 col-sm-4 col-4 p-0">
                                            <img class="w-100" src="../../image/banner/sales.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="change-page d-flex align-item-center justify-content-center">
                            <button class="describe active_page">Describe</button>
                            <button class="comment">Comment</button>
                        </div>
                        <hr class="fw-bolder text-black">
                        <div class="describe-item ">
                            <div class="describe-item hide_Content d-block">
                                <p clas="" style="color: black; text-indent: 30px;">
                                        Cakes are one of the dishes loved by many people.
                                        Delicious cakes combined with a cup of hot coffee will bring comfort, helping to reduce stress and tension. 
                                        Enjoying a cake is like enjoying a pleasure by pampering your taste buds, satisfying yourself after stressful hours of work or study. 
                                        It can be said that cakes are a dish that soothes the soul.
                                </p>
                                <div class="d-block text-center">
                                
                                    <img class="w-50" src="../../image/product/<?= $row_product['image'] ?>" alt="">
                                </div>
                                <h2 class="fw-bold" style="color:rgb(211, 156, 73);">Cakes - a gift for yourself</h2>
                                <p style="color: black; text-indent: 30px;">
                                    Many people choose cakes for times when they feel lonely.
                                    A cake does not easily make people too full, but it helps soothe and balance the spirit.
                                    It is not difficult for you to encounter thoughtful people sitting, thinking, listening to music or working next to a cup of tea, 
                                    coffee and a small plate of cakes in a gentle shop, with a relaxing space.
                                    The feeling of eating a delicious piece of cake is the same as when we reward ourselves with a little sweetness. If the fun needs excitement, alcoholic drinks. When alone, cake is a true gift for the soul. All sadness passes away, only sweetness and comfort remains.
                                    Many people like to go into the kitchen and make cakes for themselves. Being able to mix the dough, make the filling, and watch the cake rise in the oven can also make us happy. When experiencing that, each person's mood becomes happier, happier, and satisfied with what they have. Perhaps that's why cakes are a delicious gift for everyone who wants to have their own space, wants to give that sweetness to themselves.
                                </p>
                            </div>
                        </div>
                        <div class="Comment-item mt-3 hide_Content">
                            <?php
                                while($row_comments = mysqli_fetch_array($request_comment)){
                            ?>
                                <div>
                                    <div class="infomation d-flex align-items-center">
                                        <div class="img">
                                            <img class="img_content w-100" src="../../image/avatar/<?= $row_comments['avatar'] ?>" alt="">
                                        </div>
                                        <div class="nickname d-flex align-items-center ms-3 ">
                                            <h6 class="text-black fw-bolder"><?= $row_comments['username'] ?></h6>
                                        </div>
                                    </div>
                                    <div class="content-comment text-black ps-4">
                                        <p class="mb-1" style="text-indent: 20px; color: #545454;"><?= $row_comments['content'] ?></p>
                                    </div>
                                    <div class="status_user text-black d-flex align-item-center ps-4 w-100">
                                            <i 
                                                <?php 
                                                    if(userLike($row_comments['comment_id'])){
                                                ?>
                                                    class='like-btn bx bxs-like' title="like" 
                                                <?php
                                                    }else{
                                                ?>
                                                    class='like-btn bx bx-like' title="like" 
                                                <?php
                                                    }
                                                ?>
                                                data-id="<?= $row_comments['comment_id'] ?>">
                                            </i>
                                            <span class="num_likes"><?= getLikes($row_comments['comment_id']) ?></span>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <i 
                                                <?php 
                                                    if(userDisLike($row_comments['comment_id'])){
                                                ?>
                                                    class='dislike-btn bx bxs-dislike' title="dislike" 
                                                <?php
                                                    }else{
                                                ?>
                                                    class='dislike-btn bx bx-dislike' title="dislike" 
                                                <?php
                                                    }
                                                ?>
                                                data-id="<?= $row_comments['comment_id'] ?>">
                                            </i>
                                            <span class="num_dislikes"><?= getDisLikes($row_comments['comment_id']) ?></span>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            
                            
                           
                        </div>
                        
                    </div>
                    <div class="col-lg-4 d-lg-block d-none border-top border-1 border-secondary">
                        
                    </div>
                </div>

            </div>
            <!-- product detail -->
        <div id="backtop">
            <i class='bx bx-chevron-up'></i>
        </div>
    </section>
    
    
<?php
    include 'footer.php'
?>