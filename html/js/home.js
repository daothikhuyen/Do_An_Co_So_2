
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()){
            // console.log(1);
            $('#backtop').fadeIn();
        }else{
            // console.log(2);
            $('#backtop').fadeOut();
        }
    });
    $('#backtop').click(function(){
        $('html, body').animate({
            
            scrollTop: 0
        },500)
    });
});