
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
<link rel="stylesheet" href="../../html/css/shop.css">
<link rel="stylesheet" href="../../html/css/footer.css">
<title>MERY CAKE</title>
</head>
<?php
    include 'header.php';
    include '../../model/category_mode.php';
    include '../../model/shop_mode.php';
    include '../../controler/shop_control.php';
?>

    <!-- Home -->
    <section >
        
        <div class="section_header">
            <div class="title">
                <h1>Welcome To Mery Cakes Store</h1>
                <span class="Wellcome"><a href="#" class="home">Home</a> <i class='bx bx-chevron-right ms-2'></i> <a href="#">All Product</a> </span>
            </div>
            <!-- Category -->
            <div class="container" id="category">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6 py-3 py-sm-3 d-flex justify-content-center align-item-center">
                        <div class="category-img">
                            <img class="w-100" src="../../image/banner/category_01.jpg" alt="">
                            <div class="Cakes_titel">
                                <h6>Trung Thu Cake <i class='bx bxs-donate-heart'></i></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-3 py-sm-3 d-flex justify-content-center align-item-center">
                        <div class="category-img">
                            <img class="w-100" src="../../image/banner/category_02.jpg" alt="">
                            <div class="Cakes_titel">
                                <h6>Birthday Cake <i class='bx bxs-donate-heart'></i></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-3 py-sm-3 d-flex justify-content-center align-item-center">
                        <div class="category-img">
                            <img class="w-100" src="../../image/banner/category_03.jpg" alt="">
                            <div class="Cakes_titel">
                                <h6>Tiramisu Cake <i class='bx bxs-donate-heart'></i></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 py-3 py-sm-3 d-flex justify-content-center align-item-center">
                        <div class="category-img">
                            <img class="w-100" src="../../image/banner/category_04.jpg" alt="">
                            <div class="Cakes_titel">
                                <h6>Black Forest Cake <i class='bx bxs-donate-heart'></i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="All_Product" >
                <h1>All product</h1>
                <div class="row">
                    <div class="cate_product_item col-lg-3 col-md-3 d-md-block d-sm-none mt-4 ">
                        <div class="category-item">
                            <h2>Category Product</h2>
                            <div class="catogory_item_son">
                                <ul>
                                <?php while($row_category = mysqli_fetch_array($query_category)) { ?> 
                                    <li>
                                        <a href="shop.php?idCategory=<?php echo $row_category['id'] ?>"><?php echo $row_category['name'] ?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="category-item item_02">
                            <h2>Help me found product</h2>
                        </div>
                        <div class="category-item">
                            <h2>Level Price</h2>
                            <div class="catogory_item_son">
                                <ul>
                                    <li>
                                        <a href="shop.php?price_start=0&price_end=150" >Dưới 150.000<sub>đ</sub> </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?price_start=150&price_end=300">150.000<sub>đ</sub>  - 300.000<sub>đ</sub> </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?price_start=300&price_end=400">300.000<sub>đ</sub>  - 400.000<sub>đ</sub>  </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?price_start=400&price_end=5000">400.000<sub>đ</sub>  - 5000.000<sub>đ</sub> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="View_product col-lg-9 col-md-9 col-sm-12 mt-4" id="shop">
                        <div class="d-md-block d-none">
                            <div class="product_header_search d-flex justify-content-between ">
                                <div class="arrange">
                                    <label for=""><i class='bx bx-sort-a-z'></i> Arrange</label>
                                    <?php 
                                        if(isset($_GET['select'])){
                                    ?>
                                        <a href="shop.php?select=allproduct" class="arrange_item <?= $_GET['select']=='allproduct'?'active':'' ?>  col-sm-12 py-2" name="allproduct">All product</a>
                                        <a href="shop.php?select=ASC" class="arrange_item col-sm-12 py-2 <?= $_GET['select']=='ASC'?'active':'' ?>">Ascending</a>
                                        <a href="shop.php?select=DESC" class="arrange_item <?= $_GET['select']=='DESC'?'active':'' ?> col-sm-12 py-2">Decrease</a>
                                    <?php
                                        }else{
                                    ?>
                                        <a href="shop.php?select=allproduct" class="arrange_item active col-sm-12 py-2" name="allproduct">All product</a>
                                        <a href="shop.php?select=ASC" class="arrange_item col-sm-12 py-2">Ascending</a>
                                        <a href="shop.php?select=DESC" class="arrange_item col-sm-12 py-2">Decrease</a>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="search">
                                    <form action="shop.php?select=SEARCH" method="post">
                                        <div class="search_item d-flex align-item-center">
                                            <input type="text" name="searchSP" id="">
                                            <button type="submit" name="btn"><i class='bx bx-search'></i></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <?php
                                if(empty($shop_all)){
                                    echo '<div class="no_product">
                                                Không Có Sản Phẩm Bạn Muốn Tìm
                                            </div>';
                                }
                                while($row = mysqli_fetch_array( $shop_all)) { ?> 
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6 mt-4 d-flex justify-content-center">
                                    <a href="product_detail.php?product_id=<?=$row['id']?>">
                                        <div class="card" id="card">
                                            <div class="overlay_img"  class="d-flex justify-content-center">
                                                <div class="overlay">
                                                    <button class="btn btn-secondary" title="Quick Shop" >
                                                        <i class="fa-regular fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-secondary " title="Add To Wishlist " >
                                                        <i class="fa-regular fa-heart check_header"></i>
                                                    </button>
                                                </div>
                                                <!-- <div class="over_product d-block"> -->
                                                    <img class="w-100" src="../../image/product/<?= $row['image'] ?>" alt="">
                                                <!-- </div> -->
                                                <div>
                                                    <h3>
                                                        <a href="" class="title_product"><?= $row['title'] ?></a>
                                                    </h3>
                                                    <div class="star">
                                                    <?php 
                                                            for($i=1; $i <= 5; $i++){
                                                                if($i < $row['star']){
                                                                    echo "<i class='bx bxs-star checked'></i>";
                                                                }else{
                                                                    if(is_int($row['star']) == false && round($row['star'])== $i) {
                                                                        echo "<i class='bx bxs-star-half checked'></i>"; 
                                                                    }else{
                                                                        echo "<i class='bx bxs-star'></i>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card-body py-0 my-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="h6-price"><?= $row['price'] ?>.000 <sup>đ</sup></div>
                                                    
                                                </div>
                                                <div class="mt-3 col-12">
                                                    <a href="product_detail.php?product_id=<?=$row['id']?>"  class="btn_add">Add Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php }?>
                           
                            <div class="col-12 page">
                                <?php  include '../../controler/page_controler.php' ?>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="backtop">
            <i class='bx bx-chevron-up'></i>
        </div>
    </section>

<?php
    include 'footer.php'
?>