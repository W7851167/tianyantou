@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        <style type="text/css">
            .user-center{
                margin-top: 0;
            }
            .container{
                width: 100%;
            }
            .content{
                position: relative;
                width: 1200px;
                min-width: 1200px;
                height: 705px;
                margin: 0 auto;
                overflow: hidden;
            }
        </style>
        <div id="loginpage">
            <div class="bg-img">
                <div class="content">
                    <div id="login-bg">
                        <div id="login-box">
                            <div class="pc-login">
                                <h2>会员登录 <a href="https://account.touzhijia.com/register.html" >没账号？立即注册</a></h2>
                                <form id="login" method="post" action="https://account.touzhijia.com/signin.html">
                                    <div class="error hidden"><i class="iconfont">&#xe664;</i><span></span></div>
                                    <div class="input-box">
                                        <input name="username" class="input-style input-size" type="text" placeholder="请输入您的用户名/邮箱/手机" value="18611570121" />
                                        <i class="iconfont">&#xe604;</i>
                                    </div>
                                    <div class="input-box">
                                        <input name="password" class="input-style input-size" type="password" placeholder="请输入登录密码" id="loginpage-pwd"/>
                                        <i class="iconfont">&#xe603;</i>
                                    </div>


                                    <p class="submit-box">
          <span class="is-check checked">
            <i class="iconfont">&#xe61b;</i>
            <input type="checkbox" name="remeber" value="1" checked="checked" />
            记住用户名
          </span>
                                        <a href="https://account.touzhijia.com/findpassword.html">忘记密码？</a>
                                    </p>
                                    <div class="btn-box"><input id="login-submit" type="submit" class="btn-blue button-size" value="登录"></div>
                                    <p></p>
                                    <input type="hidden" name="url" value="https://account.touzhijia.com/" />
                                    <div class="login-other-box">
                                        <span>用第三方账号直接登陆</span>
                                        <div class="partner-box">
                                            <a class="partner" href="https://account.touzhijia.com/thirdparty/login/qq.html"><img src="http://static.tianyantou.com/images/user/reg-qq.png?ver=20160431006" alt="腾讯QQ"></a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="code-login">
                                <h3>微信扫码  安全登录</h3>
                                <div class="code-img" id="wx-qrcode">
                                    <p>二维码加载中...</p>
                                </div>
                            </div>
                            <div class="code-btn">
                                <a href="javascript:;" class="switch-login">扫码登录</a>
                                <span class="msg"><img src="http://static.tianyantou.com/images/user/1.png?ver=20160431006" height="28px" />使用<b>微信</b>快捷登录→</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>    </div>
</div>
@stop
