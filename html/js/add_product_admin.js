
if(document.getElementById('Description') != null){
    CKEDITOR.replace( 'Description',{
        filebrowserUploadUrl: 'add_product_admin.php',
        filebrowserUploadUrl: 'update_product_admin.php',
        filebrowserUploadMethod: 'form'
    } );
}

if(document.getElementById('fileimg') != null){
    document.getElementById('fileimg').onchange= function(e){
        e.preventDefault();
        document.getElementById('image').src = URL.createObjectURL(fileimg.files[0])
    }
}


if(document.querySelector('.btn_delete_product') != null){
    $('.btn_delete_product').on('click', function(e){
        var delete_id = $(this).data('id');
        $click_btn = $(this);

        Swal.fire({
            icon: "warning",
            
            footer: '<a href="#">Why do I have this issue?</a>'
          });

          Swal.fire({
            title: "Are you sure?",
            text: "You want to delete the product",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {

            $.ajax({
                type :'post',
                url :'admin_controller/controller_all_product.php?id_product='+delete_id+'',
            })
            .done(function(data){
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: "success",
                        title: "Deleted!",
                        text: "Your product has been deleted.",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result)=>{
                        $click_btn.closest('.table_thread').remove();
                    })
                }
            })
            .fail(function(data){
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your product has not been deleted yet.",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
            
          });

    })
}
