const minus_btn = document.querySelectorAll('.minus-btn');
const plus_btn = document.querySelectorAll('.plus-btn');
const input_quantity = document.querySelectorAll('.input-quantity');
const total_money = document.querySelectorAll('.total_money');
const product_price = document.querySelectorAll('.product_price span');


// Tăng giảm số lương
if(input_quantity != null){
console.log(1)
    var total = 0;
    function render(element,index,amount,quantity_sp){

        if(amount > parseInt(quantity_sp) ){
            console.log(quantity_sp);
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
            amount = (isNaN(amount)|| amount == 0)?1:amount;

            input_quantity[index].value = amount;
            total = amount * parseFloat(product_price[index].innerHTML)
            total_money[index].innerHTML =  total + '.000';
            // console.log(total_money[index].innerHTML);
            // console.log($(element).serializeArray());
            $.ajax({
                type: 'POST',
                url: '../../controler/cart_controller.php?action=submit',
                data:$(element).serializeArray(),
                
            })
            .done(function(data){
               
            
            })
            .fail(function(data){
                alert("Commentfailed");
            })
        }
        
        
    }

    // Handle plus
    function handlePlus_cart(index, quantity_sp){
        
        input_quantity.forEach(function(element,location){
            // console.log(element);
            if(location == index){
                amount = input_quantity[index].value;
                amount++;
                render(element,index,amount,quantity_sp)
            }
        })
    }

    // Handle Minus
    function handleMinus_cart(index, quantity_sp){
        input_quantity.forEach(function(element,location){
            if(location == index){
                amount = input_quantity[location].value;
                amount--;
                render(element,index,amount,quantity_sp);
            }
        })
    }

    input_quantity.forEach(function(element,index){
        element.addEventListener('input', function(){
            
            amount = input_quantity.value;
            amount = parseInt(amount);
            amount = (isNaN(amount)|| amount == 0)?1:amount;
            render(element,index,amount);
        })
    })
}



// tổng tiền tạm thời
    var checkboxes = document.querySelectorAll('.checkbox_product');
    
    var totalPrice = 0;
    checkboxes.forEach(function(checkbox, index) {

        checkbox.addEventListener('change', function() {
            var totalMoneyElements = document.querySelectorAll('.total_money');
            var total_temporary = document.getElementById('total_temporary');
            if (this.checked) {
                if (totalMoneyElements[index]) {
                    totalPrice += parseInt(totalMoneyElements[index].textContent);
                    total_temporary.innerHTML = totalPrice + '.000<sub>đ</sub>';
                }
            }else{
                if(totalMoneyElements[index]){
                    totalPrice -= parseInt(totalMoneyElements[index].textContent);
                    total_temporary.innerHTML = totalPrice  + '.000<sub>đ</sub>';
                    
                }
            }
        });
    });


 const btn_order = document.getElementById('btnOrder');

 if(btn_order != null){
    console.log();
   
    var num = 0;
     btn_order.addEventListener('click', function(e){
        e.preventDefault;
        var checkboxes = document.querySelectorAll('.checkbox_product');
        var order_index_info_product = document.querySelectorAll('.order_index');
        var table_thread = document.querySelector('.table_thread')
        var $index_array = [];
        var $array = [];

        checkboxes.forEach(function(checkbox, index) {
            if(checkbox.checked){
                $vitri = $('.input-quantity')[index];
                $array.push($vitri);
                num++;
                $index_array.push(index);
            }
            
        });

        if(num > 0){
            
            if($('#customer-info-name').val() == '' || $('#customer-info-phone').val() == '' || $('#show_user_order_address').val() == '' ){
                // console.log($('#customer-info-phone').val());
                // console.log($('#customer-info-name').val());
                Swal.fire({
                    icon: "warning",
                    title: "Order information is not enough",
                    showConfirmButton: false,
                    timer: 1500
                })
                .then(()=>{
                    window.location.reload(); 
                })
            }else{
                $.ajax({
                    type : 'post',
                            url : '../../controler/order_controller.php?Create_Order',
                            data: [
                                ... $($array).serializeArray(),// Sử dụng spread operator để thêm các phần tử của mảng vào mảng dữ liệu
                                { name: 'username_order', value: $('#customer-info-name').val() },
                                { name: 'phone_order', value: $('#customer-info-phone').val() },
                                { name: 'address_order', value: $('#show_user_order_address').val() },
                                { name: 'total_money', value: $('#total_temporary').html() }
                            ]
                                                  
                })
                .done(function(data){
                    // alert(data);
                    var num_index_elemnt = 0;
                    Swal.fire({
                        icon: "success",
                        title: "Order Success",
                        showConfirmButton: false,
                        timer: 1500
                    })
                      .then(()=>{
                        document.querySelector('.number_product').innerHTML = parseInt(document.querySelector('.number_product').innerHTML) - 1
                        $index_array.forEach(function(element) {
                            console.log(order_index_info_product[element])
                            order_index_info_product[element].remove(); // Loại bỏ phần tử tại vị trí index
                        }); 
    
                        window.location.reload();
                        order_index_info_product.forEach(function(element){
                            if(element != null){
                                num_index_elemnt++;
                                console.log(element);
                            }
                        })
    
                        if(num_index_elemnt == 0){
                            var html =`<div class="no_product w-100 d-flex justify-content-center align-item-center bg-white">
                                        <div class="img_no_product">
                                                <img src="../../image/banner/Smart Online Shop.jpg" alt="">
                                        </div>
                                    </div>`
                            document.querySelector('.table_thread').insertAdjacentHTML('beforeend',html);
                            //insertAdjacentHTML là để thêm chuổi vào một thẻ div giống tạo thẻ con mà không cần tới appchild phải createlemt
                        }
    
                    }) 
                    
                })
                .fail(function(data){
                    alert('Thất Bại')
                })
            }
            
        }else{
            Swal.fire({
                icon: "warning",
                title: "You have not selected a product yet",
                showConfirmButton: false,
                timer: 1500
            })
            .then(()=>{
                window.location.reload(); 
            })
        }
        
     })
 }
