$(function(){
    $('.form-checkbox').find('.switch').bind('click',function(){
        if($(this).parent().attr('class') == 'enabled'){
            $(this).animate({
                left: '2px',
                right: '32px'
            }, 100, function() {
                $(this).parent().removeClass();
                $(this).parent().addClass('disabled');
            });
            $(this).parents('.form-checkbox').siblings('input[type=hidden]').val(0);
        }else{
            $(this).parent().removeClass();
            $(this).parent().addClass('enabled');
            $(this).animate({
                right: '2px',
                left:'32px'
            }, 100, function() {
            });
            $(this).parents('.form-checkbox').siblings('input[type=hidden]').val(1);
        }
    });

});
