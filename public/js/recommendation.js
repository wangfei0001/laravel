var Recommendation = {

};


Recommendation.init = function(){
    $('.recommendation').find('li').click(function(){
        if($(this).attr('class') == 'selected'){
            $(this).removeClass('selected');
        }else{
            $(this).addClass('selected');
        }
    });
}


    $(function(){
        Recommendation.init();
    })