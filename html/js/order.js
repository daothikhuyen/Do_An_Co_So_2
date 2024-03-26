
if(document.getElementById('fileImg_comment') != null){

    document.getElementById('fileImg_comment').onchange = function(){
        document.getElementById('image_comment').src = URL.createObjectURL(fileImg_comment.files[0]);
    };
}

const btn_menu_order = document.querySelectorAll('.menu_order_page')
const session_order = document.querySelectorAll('.session_order')

btn_menu_order.forEach(function (element, index) {
    element.addEventListener('click', function () {

        const current_btn_under = document.querySelector('.under_menu');
        if(current_btn_under){
            current_btn_under.classList.remove('under_menu');
        }
        session_order.forEach(function (element_session, num) {
            if (num === index) {
                element.classList.add('under_menu');
                element_session.classList.remove('hide_order');
            } else {
                if (!element_session.classList.contains('hide_order')) {
                   element_session.classList.add('hide_order');
                }
            }
        });
    });
});


function home_change() {
    const currentHomeInfo = document.querySelector('.Home_Info.active');

    if (currentHomeInfo) {
        currentHomeInfo.classList.remove('active');
    }

    const clickedElement = event.currentTarget;
    clickedElement.classList.add('active');

    // Your other logic here
}

var btn_see_detail = document.querySelectorAll('.see_detail');
var id_order = document.querySelectorAll('.id_order');
// console.log(id_order[2].value)
btn_see_detail.forEach(function(element,index){
    element.addEventListener('click', function(e){
        var idOrrder = id_order[index].value
        console.log(idOrrder);
        $.ajax({
            type: 'post',
            url : "../../controler/order_controller.php?see_detail_id="+ idOrrder,
        })
        .done(function(data){
            // alert(data)
            var result = JSON.parse(data); // Phân tích chuỗi JSON thành đối tượng JavaScript
            var total_money = 0;
            result.forEach(function(element) {
                document.querySelector('.detail_name').innerHTML = element.fullname;
                document.querySelector('.detail_phone').innerHTML = element.phone_number;
                document.querySelector('.detail_address').innerHTML = element.adress;

                document.querySelector('.detail_date_order').innerHTML = element.create_time;
                document.querySelector('.detail_date_order_last').innerHTML = element.last_time;

                if(idOrrder == element.id){
                    total_money +=element.price * element.quantity;
                    console.log(document.querySelector('.product_order_items'));
                    var html = `<div class="d-flex align-items-center justify-content-between py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="order_img_product">
                                            <img class="image_detail w-100" src="../../image/product/`+element.image+`" alt="">
                                        </div>
                                        <div class="order_product_name ms-3">
                                            <span class="name_product_detail fw-bold">`+element.title+`</span> <br>
                                            <span class=" ps-3" style="font-size: 10px;">
                                                <i class="fa-solid fa-shop " style="font-size: 10px;"></i> 
                                                Shop Mery Cake
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="" style="color: #b15050; font-weight: 550;"> 
                                            <label for="" class="price_detail">` +element.price+'.000<sub>đ</sub>'+`</label>
                                            <label for="">x</label>
                                            <label for="" class="quantity_detail">`+element.quantity+`</label>
                                        </span>
                                    </div>
                                    <div class="product_money_item pe-3">
                                        <h6 class="total_money_detail fw-bold">`+element.price * element.quantity+'.000<sub>đ</sub>'+`</h6>
                                    </div>
                                    </div>
                                <div>
                                `
                    var productOrderItems = document.querySelector('.product_order_items_detail');
                    var newElement = document.createElement('div');
                        newElement.innerHTML = html;
                        productOrderItems.appendChild(newElement);

                }
            });
            
            document.querySelector('.total_detail').innerHTML = total_money + '.000<sub>đ</sub>';

        })
    })
})


var btn_close = document.getElementById('btn-close');
if(btn_close != null){
    btn_close.addEventListener('click', function(e){
        e.preventDefault;
    
        var elements = document.querySelector('.product_order_items_detail')
        elements.innerHTML = ''
    })
}

var btn_comment = document.querySelectorAll('.comment');
var insert_comment = document.getElementById('insert_comment');
var orderProudct = [];

if(btn_comment != null){
    btn_comment.forEach(function(element,index) {

        element.addEventListener('click', function(e){
            // console.log(index);
            var idOrrder = id_order[index].value
            var all_product = document.querySelectorAll('.id_product_'+idOrrder);
            all_product.forEach(element => {
                orderProudct.push(element.value);
            });
        })
        
    });
}

if(insert_comment != null){
    insert_comment.addEventListener('click', function(e){
        var textarea_comment = document.getElementById('textarea_comment');
        // console.log(textarea_comment.value)
       if(textarea_comment.value == ''){
        console.log(textarea_comment.value)
            document.querySelector('.error_comment').innerHTML ='You have not entered a comment yet';
       }else{
            $.ajax({
                type: 'post',
                url: '../../controler/order_controller.php?insert_comment',
                data: {
                    id_product : orderProudct,
                    content_comment: textarea_comment.value
                }
            })
            .done(function(data){
                // alert(data);
                Swal.fire({
                    icon: "success",
                    title: "Comment Successful",
                    showConfirmButton: false,
                    timer: 1500
                })
                
                document.querySelector('.show').remove();
                document.querySelector('.modal-backdrop.show ').remove();
            })
            .fail(function(data){
                alert("Commentfailed");
            })
       }
        
        
        
    })
}







