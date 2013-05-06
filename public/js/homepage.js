var home = {
    config : null
};


home.init = function(config){
    this.config = config;
    return this;
};

home.loadActivities = function()
{
    $.post('/user/activities',{
        user: home.config.username
    },function(data){
        $('.user-activity').html(data);
    });
};