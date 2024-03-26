
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
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Fira+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Uchen&family=Ysabeau:wght@200;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../html/css/header.css">
<link rel="stylesheet" href="../../html/css/product_detail.css">
<link rel="stylesheet" href="../../html/css/footer.css">
<title>Title</title>
</head>

<?php
    include 'header.php'
?>
        <!-- Home -->
    <section >
        
        <div class="section_header" style="background-color: rgb(249, 233, 233,0.6);">
            <div class="title">
                <h1>Welcome To Mery Cakes Store</h1>
            </div>
            <!-- product detail -->
            <div class="pro_detail container my-5">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12" >
                        <div class="details-img p-sm-2 col-12">
                            <img class="w-100" src="../../image/product/Buu Yen moon cake.jpg" alt="">
                        </div>
                        <div class="row mt-3 ms-1 mb-sm-3">
                            <div class="Image_Son col-md-3 col-sm-3 col-3 active">
                                <img class="w-100" src="../../image/product/product_01.jpg" alt="">
                            </div>
                            <div class="Image_Son col-md-3 col-sm-3 col-3">
                                <img class="w-100" src="../../image/product/product_01.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="content_product col md-8 col-sm-8 p-3 text-black" >
                        <h2>Bánh Chocolate</h2>
                        <p>Type: <span class="kind">Bánh Chôclate</span></p>
                        <p class="mb-2">Dimension: <span class="kind">300 x 400</span> </p>
                        <label for="" class="me-3">Price: </label><span class="Newprice">600.000 <span style="font-size: 16px; text-decoration: underline;">đ</span></span>
                        <span class="Lastprice">400.000 đ</span><br>
                        <label for="">Save: </label><span class="kind ms-3">10.000 <span style="font-size: 10px; text-decoration: underline;">đ</span></span> <br> 
                        <!-- <hr>
                        <h4>Describe</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus soluta neque eligendi ad illo commodi in a maiores nulla enim dolores tempore porro, dolorem ratione repellat consequatur voluptates quod suscipit.</p> -->

                        <label for="" class="kind" >Quantity</label>
                        <input type="number" name="quantity" class="fs-5 text-center" style="width: 40px; height: 30px;" value="1"><br> <br>

                        <a href="" class="AddToCart" name="addtocart">Add To Cart <i class='bx bx-basket ms-2' ></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="change-page d-flex align-item-center">
                        <button class="describe">Describe</button>
                        <button class="comment">Comment</button>
                    </div>
                    <hr class="fw-bolder text-black">
                    <div class="describe-item ">
                        <p class="text-black" style="text-indent: 20px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit repellat nobis aspernatur ad possimus distinctio nemo unde rerum nisi ut, eos facilis debitis? Dolor amet hic culpa soluta perspiciatis distinctio.</p>
                    </div>
                    <div class="Comment-item mt-3 hide_Content">
                        <div class="infomation d-flex align-items-center">
                            <div class="img">
                                <img class="w-100" src="../../image/avatar/user.png" alt="">
                            </div>
                            <div class="nickname d-flex align-items-center ms-3 ">
                                <h6 class="text-black fw-bolder">Khuyên Khuyên</h6>
                            </div>
                        </div>
                        <div class="content-comment text-black ps-4">
                            <p class="mb-1" style="text-indent: 20px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt consectetur, rem quo est ipsum ea aut officiis neque vitae placeat animi quas aspernatur aperiam alias. Perferendis inventore nulla similique natus!</p>
                        </div>
                        
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
?>z