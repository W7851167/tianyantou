@include('mobile.public.header')
<body>
<div class="find-pass">
    <div class="header">
        <a href="{!! config('app.m_url') !!}"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">找回登录密码</p>
    </div>
    <form action="" method="post" data-toggle="ajaxForm">
        <input type="hidden" value="1" name="step" />
        {!! csrf_field() !!}
    <ul class="menu">
        <li>
            <img src="//static.tianyantou.com/images/mobile/phone.png">
            <p>手机号码：</p>
            <input type="text" name="mobile" id="m_reg-telephone" placeholder="请输入手机号" />
        </li>
        <li>
            <img src="//static.tianyantou.com/images/mobile/code.png">
            <p>验证码：</p>
            <input type="text" name="captcha" id="" placeholder="请输入验证码" />
            <a href="javascript:;" class="btn-captcha" data-toggle="m_verifyCode" data-action="m_register" data-tel="#m_reg-telephone">获取验证码</a>
        </li>
        {{--<li>
            <p>证件号</p>
            <input type="text" name="" id="" placeholder="请输入证件号"/>
        </li>--}}
    </ul>

        <input type="submit"  value="下一步" class="sub-btn" />
    </form>
</div>
</body>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/form.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login-frontend.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/ucenter.js"></script>
</html>
