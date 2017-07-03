<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
</head>
<body>
<div class="find-pass">
    <div class="header">

        <a href="{!! config("app.m_url") !!}"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">重置登录密码</p>
    </div>
    <form action="" method="post" data-toggle="ajaxForm">
        {!! csrf_field() !!}
    <ul>
        <li>
            <p>重置密码</p>
            <input type="password" name="password" id="" placeholder="请设置登录密码" />
        </li>

        <li>
            <p>确认密码</p>
            <input type="password" name="repeat_password" id="" placeholder="确认登录密码"/>
        </li>
    </ul>
        <input class="sub-btn" type="submit" value="确认" />
    </form>
</div>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/form.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login-frontend.js"></script>
</body>

</html>
