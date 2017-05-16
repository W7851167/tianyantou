<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
    <title>P2P投资理财节</title>

</head>
<body>

<div class="login">
    <div class="header">
        <a href="/"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">登录</p>
    </div>
    <img class="log"  src="//static.tianyantou.com/images/mobile/tiany.png"/>
    <div class="cont1">
        <form id="login" method="post"  action="{!! config('app.m_url') !!}/signin.html">
            {!! csrf_field() !!}
            <div class="">
                <input type="text" name="username" id="" placeholder="手机号" />
            </div>
            <div class="">
                <input type="password" name="password" id="loginpage-pwd" placeholder="登录密码" />
                <img src="//static.tianyantou.com/images/mobile/yan-1.png"/>
            </div>

            <input class="sub-btn" type="submit"  id="m-login-submit" value="登录">
            <input type="hidden" name="m_url" value="{!! config('app.m_url') !!}"/>
            <p>
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
</body>
</html>
