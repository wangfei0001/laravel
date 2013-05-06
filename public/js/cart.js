var cart = {


};

cart.init = function(){

    $('.del-prod').click(function(){
        var productid = $(this).data('productid');
        var $delDom = $(this);

        $.ajax({
            url: '/default/cart/remove',
            type: 'POST',
            dataType: 'json',
            data:{
                prodid: productid
            },
            beforeSend: function(){
            },
            success: function(data){
                if(data.result){
                    $('#grandtotal span').html(data.summary.grandtotal);
                    $('#items-count').html(data.summary.itemscount);
                    if(data.summary.grandtotal == 0){
                        $('.summary').remove();
                    }
                    $delDom.parents('li').remove();
                }
            }
        });

    });
};

cart.changeQuantityUp = function(obj){
    var productid = $(obj).parents('.number-input-box').find('.number').data('productid');
    this.updateQuantity(1, productid);
};

cart.changeQuantityDown = function(obj){
    var productid = $(obj).parents('.number-input-box').find('.number').data('productid');
    this.updateQuantity(-1, productid);
};

cart.updateQuantity = function(direction, productid){
    $.ajax({
        url: '/default/cart/update',
        type: 'POST',
        dataType: 'json',
        data:{
            direction: direction,
            prodid: productid
        },
        beforeSend: function(){

        },
        success: function(data){
            for(var i = 0; i < data.items.length; i++){
                $('#quantity_' + data.items[i].productid).val(data.items[i].quantity);
                $('#subtotal_' + data.items[i].productid).html(data.items[i].price);

                $('#head-bag-quantity_' + data.items[i].productid).html(data.items[i].quantity);
                $('#head-bag-subtotal_' + data.items[i].productid).html(data.items[i].price);
            }
            $('#grandtotal').html(data.grandtotal);
            $('#head-bag-grandtotal').html(data.grandtotal);
        }

    });
};

cart.remove = function(){


};


$(function(){
    cart.init();
});
