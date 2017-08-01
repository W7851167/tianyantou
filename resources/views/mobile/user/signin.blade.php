<!-- 头信息 -->
@include('mobile.public.header')
<!-- 头信息结束 -->
<body>

<div class="login">
    <div class="header">
        <a href="/"><img src="//static.tianyantou.com/images/mobile/return.png"  class="return_img"/></a>

    </div>
    <img class="log"  src="//static.tianyantou.com/images/mobile/tiany.png"/>
    <div class="cont1">
        <form id="login" method="post" data-toggle="ajaxForm" action="{!! config('app.m_url') !!}/signin.html">
            {!! csrf_field() !!}

            <ul class="menu">
                <li><img src="//static.tianyantou.com/images/mobile/phone.png">
                    <p>手机号：</p>
                    <input type="text" name="username" id="log-username" placeholder="请输入手机号" />
                </li>
                <li>
                    <img src="//static.tianyantou.com/images/mobile/password.png">
                    <p>登录密码：</p>
                    <input type="password" name="password" id="m_loginpage-pwd" placeholder="登录密码" />
                    <img class="zhuce22img" src="//static.tianyantou.com/images/mobile/tiany-3.png"/>
                </li>
            </ul>



            <input class="sub-btn" type="submit" value="登录">
            <input type="hidden" name="m_url" value="{!! config('app.m_url') !!}"/>
            <p style="text-align: right;width: 97%;">
                <a href="{!! config('app.m_url') !!}/register.html">注册</a>/
                <a href="{!! config('app.m_url') !!}/findpassword.html">找回密码</a>
            </p>
        </form>
    </div>
</div>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/form.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login-frontend.js"></script>

</body>
</html>
