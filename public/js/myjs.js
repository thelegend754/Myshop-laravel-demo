
$("div.sm-box").delay(3000).slideUp();


$(".add-to-cart-btn").on('click',function(){
    var id = $(this).data('id');
    $.ajax({
        url:BASE_URL+"shop/add-to-cart",
        type:"get",
        dataType:"html",
        data:{product_id:id},
        success:function(response){
            location.reload();
        }
    });
    
});

$(".update-cart").on('click',function(){
    var id = $(this).data('id');
    var op = $(this).val();
    $.ajax({
        url:BASE_URL+"shop/update-cart",
        type:"get",
        dataType:"html",
        data:{
            product_id:id,
            op:op
        },
        success:function(response){
            location.reload();
        }
    });
    
});


