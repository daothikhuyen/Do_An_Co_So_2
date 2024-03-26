


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="shortcut icon" type="image/png" href="../../image/banner/logo.jpg"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Fira+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Uchen&family=Ysabeau:wght@200;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../html/css/header.css">
<link rel="stylesheet" href="../../html/css/home.css">
<link rel="stylesheet" href="../../html/css/footer.css">
<title>MERY CAKE</title>
</head>
    <?php 
        include 'header.php';

    ?>

 <!-- Home -->
    <section >
        <div class="slides_show">
           <!-- <video class="w-100 back-video" autoplay loop muted plays-inline  src="../../image/video/video1.mp4" type="cake.mp4"></video> -->
           <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="home px-3">
                            <div class="ria_home">
                                <div class="home-text">
                                    <h3>Fresh cakes every day</h3>
                                    <p class="pt-2">20% discount when ordering online</p>
                                    <a href="shop.php" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                    <div class="home_show_2 px-3 ps-5">
                        <div class="ria_home">
                            <div class="home-text">
                                <h3>Strong Discount on Items</h3>
                                <p class="pt-2">Price for large scale, hurry up</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top cards strat -->
        <div class="product_selling container" id="box">
            <div class="selling row">
                <div class="col-md-4 py-md-0">
                    <div class="card">
                        <img src="../../image/product/selling_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 py-md-0">
                    <div class="card">
                        <img src="../../image/product/selling_02.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 py-md-0">
                    <div class="card">
                        <img src="../../image/product/selling_03.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Top cards end -->
        <!-- banner -->
        <div class="banner ">
            <div class="content row ">
                <div class="content_item col-md-6 col-sm-6">
                    <h3>Delicious Cake</h3>
                    <h2>UPTO 50% OFF</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi modi perspiciatis dignissimos iste? Nobis, animi asperiores. Facilis consequatur dolores, soluta fugiat voluptatum ut rem consectetur laborum, in, expedita fugit dignissimos. </p>
                    <div id="btnorder">
                        <a href="./cart.php" class="btn" >Order Now</a>
                    </div>
                </div>
                <div class="img col-md-6 col-sm-6">
                    <div class="img_product">
                        <div class="img_item item">
                            <img src="../../image/banner/sp_01.jpg" alt="">
                        </div>
                        <div class="img_item item_02">
                            <img src="../../image/banner/sp_02.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- banner end -->

        <!-- product card -->
        <div id="product_cards">
            <div class="container">
                <h1>Hot Products</h1>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/Traditional Flower Birthday Cake.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/Mixed Moon Cakes.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">

                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/Black sugar pearl milk tea cake.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/Taiwanese egg tarts.jpg" alt="">
                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/product_08.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/Tort walentynkowy czekoladowo.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/Salted Egg Moon Cake.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-md-0 mb-4">
                        <div class="card">
                            <div class="overlay_img"  class="d-flex justify-content-center">
                                <div class="over_product d-block">
                                    <img class="w-100" src="../../image/product/product_09.jpg" alt="">
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="overlay">
                                <button class="btn btn-secondary" title="Quick Shop" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Wishlist " >
                                    <i class='bx bxs-heart'></i>
                                </button>
                                <button class="btn btn-secondary" title="Add To Cart" >
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </div>
                            <div class="card-body py-0">
                                <h6>$50.10</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- product cards -->

        <!-- About -->
        <div class="container-fluid" id="about">
            <h1>About Us</h1>
            <div class="row py-4 mt-4 mx-5">
                <div class="col-md-6 py-3 py-md-0">
                    <div class="card me-4">
                        <img src="../../image/product/selling_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 py-3 py-md-0">
                    <h2>Chocolate Cake</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                    </p>
                    <div id="bt"><button>Read More...</button></div>
                </div>
            </div>
            <div class="d-md-block d-sm-none">
                <div class="row py-4 mx-5">
                    <h2>Pumpkin Cake</h2>
                    <div class="col-md-6 py-3 py-md-0">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                        </p>
                        <div id="bt"><button>Read More...</button></div>
                    </div>
                    <div class="col-md-6 py-3 py-md-0">
                        <div class="card ms-4">
                            <img src="../../image/banner/banner_02.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-4 d-md-none d-sm-block mx-5">
                <div class="col-md-6 py-3 py-md-0">
                    <div class="card me-4">
                        <img src="../../image/banner/banner_02.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 py-3 py-md-0">
                    <h2>Pumpkin Cake</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque amet quibusdam cumque tenetur dolorum, quidem, voluptas voluptates veritatis expedita
                    </p>
                    <div id="bt"><button>Read More...</button></div>
                </div>
            </div>
        </div>
        <!-- About end -->

        <!-- Contact -->
        <div class="container my-4" id="video">
            <video src="../../image/video/video_02.mp4" autoplay muted loop style="border-radius: 20px;"></video>
        </div>

        <div id="backtop">
            <i class='bx bx-chevron-up'></i>
        </div>
    </section>

<?php
    include 'footer.php'
?>

