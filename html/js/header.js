var search = document.querySelector('.search-box');
var SerchIcon = document.getElementById('search_icon');
var menuIcon = document.getElementById('menu-icon');
var usericon = document.querySelector('#usericon');

menuIcon.addEventListener('click', function(){
    document.querySelector('.navbar').classList.toggle('active');
})


// avatar
if(usericon != null){
    usericon.addEventListener('click', function(){
        console.log('1');
        document.querySelector('.nav_setting').classList.toggle('hide');
    })

    document.getElementById('avatar').addEventListener('click', function(){
        // this.classList.toggle('hide');
        document.querySelector('.nav_setting').classList.toggle('hide');
    })

    document.getElementById('fileImg').onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]);
    }
}

function cart_issert(id_user){
    console.log(id_user);
        if(id_user === -1){
            Swal.fire({
                icon: 'warning',
                title: 'Please Log In To Your Account',
                // showCancelButton: true,
                confirmButtonText: 'OK',
                
              }).then((result) => {
                // Chờ hiệu ứng kết thúc, sau đó chuyển hướng trang
                if(result.isConfirmed)
                    window.location.href = "../../view/php/login.php";
              });
        }else{
            window.location.href = "../../view/php/cart.php";
        }
}

// Trượt
function scrollToTop() {
    if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0) {
        $('html, body').animate({
            scrollTop: 0
        },100)
    }
}

// Thực hiện hàm tự động trượt lên sau khi trang được tải
window.onload = function() {
    scrollToTop();
};







