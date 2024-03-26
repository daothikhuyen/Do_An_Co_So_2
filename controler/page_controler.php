<?php

   if(mysqli_num_rows($shop_all) > 5){
        if($current_page > 2 && $totalPages > 1){
            $prev_page = $current_page -1;
            echo '<a class="page_item text-decoration-none m-2 d-block" href="?per_page='. $item_per_page.'&page= '.$prev_page.'"><i class="bx bx-chevrons-left"></i></a>';
        }
        
        for($i =1; $i <= $totalPages; $i++){ 
            if($i != $current_page){
                if($i > $current_page -2 && $i< $current_page +2){
                    echo '<a class="page_item text-decoration-none m-2 " href="?per_page='. $item_per_page.'&page='.$i.'">'. $i.'</a>';
                }
            }else{
                    echo '<strong class="curent_page page_item m-2 ">'. $i.'</strong>';
            }
        }

        if($current_page < $totalPages -1 && $totalPages > 1){
            $next_page = $current_page +1;
            echo '<a class="page_item text-decoration-none m-2 d-block" href="?per_page='. $item_per_page. '&page= '.$next_page.'"><i class="bx bx-chevrons-right" ></i></a>';
        }
   }
?>