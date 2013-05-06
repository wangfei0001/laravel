function uploadAvatar(imgRoot)
{
    $.ajaxFileUpload({
        url:'/customer/index/upload',
        secureuri:false,
        fileElementId:'avatarUpload',
        dataType: 'json',
        data:{name:'logan', id:'id'},
        success: function (data, status){
            if(data.result){
                var milliseconds = new Date().getTime();
                $('.customer-summary .avatar').attr('src', imgRoot + 'avatar/' + data.data['w204'] + '?' + milliseconds);
                $('.login-area').find('img#avatar-thumb').attr('src', imgRoot + 'avatar/' + data.data['w30'] + '?' + milliseconds);
            }
        },
        error: function (data, status, e){
            alert(e);
        }
    });
}