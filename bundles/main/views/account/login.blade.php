<div class="login-wrap clearfix">

    <div class="left" style="padding: 30px;">
        <h2>合作网站帐号登录</h2>
        <div class="login-connection">
            <a href="https://api.weibo.com/oauth2/authorize?client_id=2674354511&amp;redirect_uri=http%3A%2F%2Ffront.olutu.com%2Fweibo%2Fcallback.php&amp;response_type=code" class="connection-btn"><span id="weibo"></span>新浪微博</a>
            <a href="" class="connection-btn"><span id="tengxun"></span>腾讯微博</a>
            <a href="" class="connection-btn"><span id="renren"></span>人人网</a>
            <a href="" class="connection-btn"><span id="qq"></span>QQ登录</a>
            <a href="https://www.facebook.com/dialog/oauth?client_id=376384352390979&amp;redirect_uri=http%3A%2F%2Fpinterest.front%2Ffacebook%2Fcallback.php&amp;state=784c266f00eae8ea7b600a3e23495250" class="connection-btn"><span id="facebook"></span>Facebook</a>
        </div>            <p>还没有账号？马上<a href="/customer/index/signup">注册</a></p>
    </div>


    <div class="left" style="padding: 30px;">

{{Form::open()}}


        <div class="form-row">
            <div class="small-3 columns">
                {{Form::label('username', '用户名')}}
            </div>
            <div class="small-9 columns">
                {{Form::text('username')}}
            </div>
        </div>



        <div class="form-row">
            <div class="small-3 columns">
                {{Form::label('password', '密码')}}
            </div>
            <div class="small-9 columns">
                {{Form::password('password')}}
            </div>
        </div>


        <div class="form-row">
            <div class="small-3 columns">

            </div>
            <div class="small-9 columns">
                {{Form::submit('登录', array('class' => 'small button'))}}
            </div>
        </div>

{{Form::token()}}

{{Form::close()}}

        <a href="/main/account/forgot">忘记密码?</a>

</div>




        </div>

</div>