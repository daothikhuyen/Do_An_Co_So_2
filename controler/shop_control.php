<?php
    
    $shop = new Shop();
    $category = new Category();

    $query_category = $category->select_all_category();
    
    // Chạy tất cả san phẩm
    function renderAll($shop,$item_per_page,$offset){

        $sql_all = "SELECT * FROM product ORDER BY RAND() ASC LIMIT ". $item_per_page." OFFSET ". $offset;
        $request_query= $shop->select_request($sql_all);
        return $request_query;
    }

    // tìm kiếm theo danh mục
    function select_product($shop, $id){
        $sql_all = "SELECT * FROM product WHERE category_id = $id  LIMIT 9 OFFSET 0";
        $request_query= $shop->select_request($sql_all);
        return $request_query;
    }

// tìm kiếm theo giá tiền
    function select_price($shop, $price_start, $price_end){
        $sql_all = "SELECT * FROM product WHERE price >= $price_start AND price <= $price_end LIMIT 9 OFFSET 0;";
        $request_query= $shop->select_request($sql_all);
        return $request_query;
    }

    function Sort_price($shop, $action){
        $sql_sort = "SELECT * FROM product ORDER BY price $action  LIMIT 9 OFFSET 0";
        $request_query= $shop->select_request($sql_sort);
        return $request_query;
    }

//Phân page
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page'] :9;// giới hạn sản phẩm

    $current_page = !empty($_GET['page'])?$_GET['page']:1;// số sản phẩm trong 1 page

    $offset = ($current_page -1) * $item_per_page;

    $shop_all = renderAll($shop,$item_per_page,$offset);

    $request_query = $shop->select_all_product();

    $totalRecords = mysqli_num_rows($request_query);

    $totalPages = ceil($totalRecords/ $item_per_page);

// end phân

    if(!empty($_GET['select'] )){

        switch($_GET['select']){
            case "allproduct":
                $shop_all = renderAll($shop,9,0);
                break;
            case "ASC":
                $shop_all = Sort_price($shop,$_GET['select']);
                break;
            case "DESC":
                $shop_all = Sort_price($shop,$_GET['select']);
                break;
            case "SEARCH":
                $key = $_POST['searchSP'];
                $sql_search = "SELECT * FROM product WHERE title like '%$key%' LIMIT 9 OFFSET 0 ";
                $shop_all = $shop->select_request($sql_search);
                break;

        }     
    }

    if(!empty($_GET['idCategory'])){
        $shop_all = select_product($shop,$_GET['idCategory']);
    }

    if(!empty($_GET['price_start']) && !empty($_GET['price_end'])){
        $shop_all = select_price($shop,$_GET['price_start'], $_GET['price_end']);
    }
?>