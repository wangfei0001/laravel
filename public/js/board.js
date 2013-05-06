var Board = {
    id:null,
    followButtonDom:null
};

Board.init = function(config){
    this.id = config.id;
    this.followButtonDom = $('#board-follow-btn');

    this.followButtonDom.click(function(){
        if($(this).hasClass('board-follow')){
            Board.setFollow(true);
        }else{
            Board.setFollow(false);
        }
    });
}


Board.loadFans = function(){
    //load fans
    $.ajax({
        url: '/default/boards/getfollowers',
        type:'POST',
        data:{ boardid:Board.id },
        success:function(data){
            $('#board-fans').html(data);
        },
        beforeSend: function(){

        },
        complete: function(){

        }
    });
}


Board.setFollow = function(follow){
    $.ajax({
        url: '/default/boards/setfollow',
        type:'POST',
        dataType:'JSON',
        data:{
            boardid:    Board.id,
            status:     follow
        },
        success:function(data){
            if(data.result){
                if(follow){
                    Board.followButtonDom.removeClass('board-follow');
                    Board.followButtonDom.addClass('board-unfollow').html('取消关注');
                }else{
                    Board.followButtonDom.removeClass('board-unfollow');
                    Board.followButtonDom.addClass('board-follow').html('关注');
                }
            }
        },
        beforeSend: function(){

        },
        complete: function(){

        }
    });
}