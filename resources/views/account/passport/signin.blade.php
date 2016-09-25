@extends('layout.main')
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
    <style type="text/css">
        .user-center {
            margin-top: 0;
        }
        .container {
            width: 100%;
        }
        .content {
            position: relative;
            width: 1200px;
            min-width: 1200px;
            height: 705px;
            margin: 0 auto;
            overflow: hidden;
        }
    </style>
@stop
@section('title') 用户登录 @stop
@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            <div id="loginpage">
                <div class="bg-img">
                    <div class="content">
                        <div id="login-bg">
                            <div id="login-box">
                                <div class="pc-login">
                                    <h2>会员登录 <a href="{!! config('app.account_url') !!}/register.html">没账号？立即注册</a></h2>
                                    <form id="login" method="post"  action="{!! config('app.account_url') !!}/signin.html">
                                        {!! csrf_field() !!}
                                        <div class="error hidden">
                                            <i class="iconfont">&#xe664;</i>
                                            <span></span>
                                        </div>
                                        <div class="input-box">
                                            <input name="username" class="input-style input-size" type="text" placeholder="请输入您的用户名/邮箱/手机" value=""/>
                                            <i class="iconfont">&#xe604;</i>
                                        </div>
                                        <div class="input-box">
                                            <input name="password" class="input-style input-size" type="password" placeholder="请输入登录密码" id="loginpage-pwd"/>
                                            <i class="iconfont">&#xe603;</i>
                                        </div>
                                        <p class="submit-box">
                                            <span class="is-check checked">
                                                <i class="iconfont">&#xe61b;</i>
                                                <input type="checkbox" name="remeber" value="1" checked="checked"/>记住用户名
                                            </span>
                                            <a href="{!! config('app.account_url') !!}/findpassword.html">忘记密码？</a>
                                        </p>
                                        <div class="btn-box">
                                            <input id="login-submit" type="submit" class="btn-blue button-size" value="登录">
                                        </div>
                                        <p></p>
                                        <input type="hidden" name="url" value="{!! config('app.url') !!}"/>
                                        {{--<div class="login-other-box">
                                            <span>用第三方账号直接登陆</span>
                                            <div class="partner-box">
                                                <a class="partner" href="{!! config('app.account_url') !!}/thirdparty/login/qq.html">
                                                    <img src="{!! config('app.static_url') !!}/images/user/reg-qq.png"  alt="腾讯QQ">
                                                </a>
                                            </div>
                                        </div>--}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/base64encode.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/login.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/wxLogin.js"></script>
@stop
