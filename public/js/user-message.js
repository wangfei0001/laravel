var message = {
    dom: null

}

message.init = function(){
    $('.send-message').find('#close').click(function(){
        message.close();
    });
    this.dom = $('.send-message');
    $('.messages-list').find('.reply').click(function(){
        var li = $(this).parents('li');

        message.dom.find('#screenname').html(li.data('screenname'));
        message.dom.find('#userid').val(li.data('userid'));
        $('.send-message').modal({
        persist:true,
        opacity:30,
        overlayCss: { backgroundColor:"#000" }
        });
    });
    this.dom.find('.but-submit').click(function(){
        $.ajax({
            url: '/customer/messages/reply',
            type: 'post',
            dataType: 'json',
            data: message.dom.find('form').serialize(),
            success: function(data) {
                if(data.result){
                    message.close();
                }else{

                }
            }
        });
    })
}

message.close = function(){
    $.modal.close();
}



$(function(){
    message.init();

})