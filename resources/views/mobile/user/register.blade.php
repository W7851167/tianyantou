<!-- 头信息 -->
@include('mobile.public.header')
        <!-- 头信息结束 -->
<body>
<div class="zhuce">
    <div class="header">
        <a href="{!! config("app.m_url") !!}"><img src="//static.tianyantou.com/images/mobile/close.jpg"/></a>
        <a href="{!! config("app.m_url") !!}/signin.html"><p>已有账号，去登录</p></a>
    </div>
    <form id="m_register" data-toggle="ajaxForm" method="post" action="">
        {!! csrf_field() !!}
        <img class="zhuceimg" src="//static.tianyantou.com/images/mobile/zhuce.jpg"/>
        <ul>
            <li>
                <p>手机号</p>
                <input type="text" name="mobile" id="m_reg-telephone" placeholder="请输入手机号" />
            </li>

            <li>
                <p>登录密码</p>
                <input type="password" name="password" id="m_loginpage-pwd" placeholder="6至16位数字、字母组合"/>
                <img class="zhuce22img" src="//static.tianyantou.com/images/mobile/tiany-3.png"/>
            </li>
            <!--<li>
                <p>图形验证码</p>
                <input id="m_log-captcha" name="captcha" type="text"  placeholder="验证码" style="width: 134px;margin-right: 13px;" />
                <img id="captcha" src="{!!url('signin/captcha')!!}" class="img" onclick="this.src='{!!url("signin/captcha?")!!}'+Math.random();" style="vertical-align: middle; float:right;" />
            </li>-->
            <li>
                <p>动态码</p>
                <input class="dongtai"  type="text" name="verifyCode" id="reg-captcha" placeholder="动态码"/>
                <a href="javascript:;" class="btn-captcha" data-toggle="m_verifyCode" data-action="m_register" data-tel="#m_reg-telephone">获取动态码</a>
            </li>
        </ul>
        <div class="foot">
            <div class="">

            </div>
            <p style="font-size:12px;">我已阅读并同意<span>《天眼投服务协议（个人会员版）》</span></p>
        </div>
        <div class="error" style="text-align: center;">

        </div>
        <input type="submit" class="sub-btn"  value="注册">
    </form>
</div>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/form.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login-frontend.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/ucenter.js"></script>
</body>
</html>
