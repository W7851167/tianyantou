<!-- 头信息 -->
@include('mobile.public.header')
        <!-- 头信息结束 -->
<body>
<div class="zhuce">





    <form id="m_register" data-toggle="ajaxForm" method="post" action="">
        {!! csrf_field() !!}
        <a href="{!! config("app.m_url") !!}"><img src="//static.tianyantou.com/images/mobile/return.png"  class="return_img"/></a>
        <img src="//static.tianyantou.com/images/mobile/register_banner.png" width="100%" />
        <p class="baomi">平台不会在任何地方泄露您的信息</p>
        <ul>
            <li><img src="//static.tianyantou.com/images/mobile/phone.png">
                <p>手机号：</p>
                <input type="text" name="mobile" id="m_reg-telephone" placeholder="请输入手机号" />
            </li>

            <li>
                <img src="//static.tianyantou.com/images/mobile/password.png">
                <p>登录密码：</p>
                <input type="password" name="password" id="m_loginpage-pwd" placeholder="6至16位数字、字母组合"/>
                <img class="zhuce22img" src="//static.tianyantou.com/images/mobile/tiany-3.png"/>
            </li>
            <!--<li>
                <p>图形验证码</p>
                <input id="m_log-captcha" name="captcha" type="text"  placeholder="验证码" style="width: 134px;margin-right: 13px;" />
                <img id="captcha" src="{!!url('signin/captcha')!!}" class="img" onclick="this.src='{!!url("signin/captcha?")!!}'+Math.random();" style="vertical-align: middle; float:right;" />
            </li>-->
            <li>
                <img src="//static.tianyantou.com/images/mobile/code.png">
                <p>动态码：</p>
                <input class="dongtai"  type="text" name="verifyCode" id="reg-captcha" placeholder="验证码"/>
                <a href="javascript:;" class="btn-captcha" data-toggle="m_verifyCode" data-action="m_register" data-tel="#m_reg-telephone">获取验证码</a>
            </li>
        </ul>
        <div class="explain">
            <div class="">

            </div>
            <p style="">我已阅读并同意<span>《天眼投服务协议（个人会员版）》</span><a href="/signin.html" style="float: right; margin-right: 3%;">登录</a></p>
            <input type="submit" class="sub-btn"  value="完成注册">
        </div>
    </form>
    <img src="//static.tianyantou.com/images/mobile/register_img1.png" width="100%" />
    <p style="padding: 3.5% 3%; background: #f4f5fa; ">四大核心 安享高收益</p>
    <div class="register3">

        <div>
            <img src="//static.tianyantou.com/images/mobile/register1.png">
            <span>多重安保体系</span>
            <p>专业的风控团队把控投资人本金和收益</p>
        </div>
        <div>
            <img src="//static.tianyantou.com/images/mobile/register2.png">
            <span>严格审核平台背景</span>
            <p>严格审核平台资质、备案信息、债权</p>
        </div>
        <div>
            <img src="//static.tianyantou.com/images/mobile/register3.png">
            <span>分散投资降低风险</span>
            <p>多个合作平台。多样化投资选择。<br/>帮您把投资风险降到最低</p>
        </div>
        <div>
            <img src="//static.tianyantou.com/images/mobile/register4.png">
            <span>天眼投额外加息</span>
            <p>除投资平台给的收益之外。<br />天眼投额外给用户加息返利。</p>
        </div>
    </div>
    <div class="register4">
        <p>合作平台</p>
        <img src="//static.tianyantou.com/images/mobile/pintai.png">
    </div>
</div>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/form.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/login-frontend.js"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/mobile/ucenter.js"></script>
</body>
</html>
