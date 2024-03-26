const describe = document.querySelector('.describe');
const comment = document.querySelector('.comment');
const minus = document.getElementById('minus');
const plus = document.getElementById('plus');
const amountElement = document.getElementById('quantity');
const limit_quantity = document.querySelector('.limit_quantity');

// console.log(limit_quantity.innerHTML);

    if(describe != null){
        describe.addEventListener('click', function(){
            document.querySelector('.describe-item').classList.toggle('hide_Content');
            document.querySelector('.Comment-item').classList.toggle('hide_Content');

            document.querySelector('.describe').classList.toggle('active_page');
            document.querySelector('.comment').classList.toggle('active_page');
        })
    }

    if(comment != null || describe != null){
        comment.addEventListener('click', function(){
            document.querySelector('.describe-item').classList.toggle('hide_Content');
            document.querySelector('.Comment-item').classList.toggle('hide_Content');

            document.querySelector('.describe').classList.toggle('active_page');
            document.querySelector('.comment').classList.toggle('active_page');
        })
    }

// Tăng giảm số lương
    if(amountElement != null){
        amount = amountElement.value;
        function render(amount,product_id){
            if(amount > parseInt(limit_quantity.innerHTML)){

                let infomation_quantity = document.createElement('div');
                infomation_quantity.className = 'infomation_small_quantity';

                infomation_quantity.innerHTML= `<span>Quantity purchased exceeds stock</span>`;
                document.querySelector('body').appendChild(infomation_quantity);

                setTimeout(()=>{
                    document.querySelector('.infomation_small_quantity span').style.display ='block';
                    document.querySelector('.infomation_small_quantity span').style.animation = 'show_slide 1s ease forwards'
                },100)
                
                setTimeout(() => {
                    document.querySelector('.infomation_small_quantity span').remove()
                },2000)
            }else{
                amountElement.value = amount;
            }
        }
    
        // Handle Plus
        function handlePlus(product_id){
            amount++;
            console.log(amount);
            render(amount,product_id);
            
        }
    
        // Handle Minus
        function handleMinus(product_id){
            if(amount > 1){
                amount--;
                render(amount,product_id);
            }
        }
    
        // Handle input
        amountElement.addEventListener('input', function(){
            amount = amountElement.value;
            amount = parseInt(amount);
            amount = (isNaN(amount)|| amount == 0)?1:amount;
            render(amount);
        })

    }

// chuyển tới trang thêm giỏ hàng
function AddToCart(product_id) {
    
    var quantity = amountElement.value;
    // var product_id = product_id;
    $.ajax({
        type: "POST",
        url: "../../controler/cart_controller.php?action=add&&product_id="+product_id+"&quantity="+quantity,
        data: $(this).serializeArray(),
    })
    .done(function(data){
        Swal.fire({
            title: 'Add to cart successfully',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            // window.location.reload(); 
            document.querySelector('.number_product').innerHTML = parseInt(document.querySelector('.number_product').innerHTML) + 1
        })
    })
    .fail(function(data){
        Swal.fire({
            title: 'Add to cart failed',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.reload(); 
        })
    })

}

// Like bình luận
$(document).ready(function(){

    // Nếu click vào like
    $('.like-btn').on('click',function(){
        var comment_id = $(this).data('id');
        $clicked_btn = $(this);
        console.log($clicked_btn);

        if($clicked_btn.hasClass('bx-like')){
            action = 'like';
        }else if($clicked_btn.hasClass('bxs-like')){
            action = 'unlike';
        }

        $.ajax({
            type: 'post',
            url : '../../controler/controller_like_dislike.php?like_dislike',
            data :{
                'action': action,
                'comment_id': comment_id
            },
            success:function(data){
                res = JSON.parse(data);

                if(action == 'like'){
                    $clicked_btn.removeClass('bx-like');
                    $clicked_btn.addClass('bxs-like');
                }
                if(action == 'unlike'){
                    $clicked_btn.removeClass('bxs-like');
                    $clicked_btn.addClass('bx-like');
                }

                $clicked_btn.siblings('span.num_likes').text(res.likes);
                $clicked_btn.siblings('span.num_dislikes').text(res.dislikes);
                
                $clicked_btn.siblings('i.bxs-dislike').removeClass('bxs-dislike').addClass('bx-dislike')
            }
        })
    })

    $('.dislike-btn').on('click',function(){
        var comment_id = $(this).data('id');
        $clicked_btn = $(this);
        console.log($clicked_btn);

        if($clicked_btn.hasClass('bx-dislike')){
            action = 'dislike';
        }else if($clicked_btn.hasClass('bxs-dislike')){
            action = 'undislike';
        }

        $.ajax({
            type: 'post',
            url : '../../controler/controller_like_dislike.php?like_dislike',
            data :{
                'action': action,
                'comment_id': comment_id
            },
            success:function(data){
                res = JSON.parse(data);

                if(action == 'dislike'){
                    $clicked_btn.removeClass('bx-dislike');
                    $clicked_btn.addClass('bxs-dislike');
                }
                if(action == 'undislike'){
                    $clicked_btn.removeClass('bxs-dislike');
                    $clicked_btn.addClass('bx-dislike');
                }

                $clicked_btn.siblings('span.num_likes').text(res.likes);
                $clicked_btn.siblings('span.num_dislikes').text(res.dislikes);

                $clicked_btn.siblings('i.bxs-like').removeClass('bxs-like').addClass('bx-like')
            }
        })
    })
})

