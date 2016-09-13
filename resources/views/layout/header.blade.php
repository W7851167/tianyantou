<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta content="always" name="referrer">
    <title>天眼投-@yield('title')</title>
    <meta name="keywords" content="@yield('description')">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="p2p网贷,p2p理财,天眼投投资理财平台" />
    <meta name="searchtitle" content="p2p网贷,p2p理财,天眼投投资理财平台" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/css.css?ver={!! date("YmdHis",time()) !!}" />
    @yield('style')
</head>
<body>
<div id="head">
    <script type="text/javascript">
        var USER={
            "username":"{!! $user->username or ''!!}",
            "is_login":{!! $user->username or 0 !!},
            "email_flag":{!! $user->email or 0 !!},
            "mobile_flag":{!! $user->mobile or 0 !!},
            "bank_flag":{!! $user->bank or 0 !!},
        };
        var DOMAIN = {
            "www": "{!! config('app.url') !!}",
            "account":"{!! config('app.account_url') !!}",
            "static":"{!! config('app.static_url') !!}",
            "admin":"{!! config('app.admin_url') !!}"
        };
    </script>
    <div id="head-top">
        <div id="head-top-main">
            <p>服务热线：400-883-1803（工作日&nbsp;9:00~20:30&nbsp;&nbsp;节假日&nbsp;10:00~18:00）</p>
            @if(empty($user['username']))
            <div class="top-menu">
                <div class="log">欢迎来到天眼投！请<a id="loginStart" href="{!! config('app.account_url') !!}/signin.html" alt="登录">登录</a>&frasl;
                    <a href="{!! config('app.account_url') !!}/register.html" alt="注册">注册</a>
                    <div class="code-login">
                        <h3>微信扫码 安全登录</h3>
                        <div class="code-img" id="topbar-wx-qrcode">
                        </div>
                    </div>
                </div>
                @else
                <div class="my-menu">
                    <a id="my-menu" href="{!! config('app.account_url') !!}">我的天眼投<i></i></a>
                    <div class="menu-box">
                        <div class="user-img">
                            <a href="{!! config('app.account_url') !!}">
                                <i class="shape-circle"></i>
                                <img src="{!! config('app.static_url') !!}/images/user/headerimg1.png" width="80" height="80"><h3>您好，<span id="user-name" title="{!! $user->username  or ''!!}">{!! $user->username or '' !!}</span></h3>
                            </a>
                        </div>
                        <div class="menu-list">
                            <ul>
                            <ul>
                                <li><a href="{!! config('app.acount_url') !!}/wallet/recharge.html"><i class="iconfont">&#xe63f;</i>账户充值</a></li>
                                <li><a href="{!! config('app.acount_url') !!}m/debt.html"><i class="iconfont">&#xe641;</i>理财管理</a></li>
                                <li><a href="{!! config('app.acount_url') !!}/wallet/book.html"><i class="iconfont">&#xe640;</i>资金流水</a></li>
                                <li><a href="{!! config('app.acount_url') !!}/safe.html"><i class="iconfont">&#xe63e;</i>安全中心</a></li>
                            </ul>
                            <a href="{!! config('app.acount_url') !!}/signout.html" class="logout">安全退出<i class="iconfont">&#xe642;</i></a>
                        </div>
                    </div>
                </div>
                @endif
                <span class="line"></span>
                <a href="{!! config('app.url') !!}/about/help.html">帮助中心</a>
                <span class="line"></span>
                <a href="{!! config('app.url') !!}/about/company.html">关于我们</a>
                <span class="line"></span>
                <div class="contact">
                    <a href="http://weibo.com/tianyantou" target="_blank" class="h_weibo"></a>
                    <a id="h_weixin" href="#" class="h_weixin"></a>
                    <img class="show-img" src="{!! config('app.static_url')!!}/images/common/h_weixin.jpg" width="163">
                </div>
            </div>
        </div>
    </div>
    <div id="head-btm">
        <div id="head-btm-main">
            <h1 id="logo">
                <a href="{!! config('app.url') !!}" style="padding-left:26px;">
                    <img src="{!! config('app.static_url') !!}/images/common/logo.png" alt="天眼投,p2p理财,投资理财,p2p网贷"/>
                </a>
            </h1>
            <div class="main-menu">
                <div class="curr-line"></div>
                <ul>
                    <li class=""><a href="{!! config('app.url') !!}/">首页</a></li>
                    <li class=""><a href="{!! config('app.url') !!}/platform/">选平台</a></li>
                    <li class=""><a href="{!! config('app.url') !!}/platform/project.html">选标中心</a></li>
                    <li class=""><a href="{!! config('app.url') !!}/current/">活期</a></li>
                    <li class=""><a href="{!! config('app.url') !!}/debt/">定期</a></li>
                    <li class=""><a href="{!! config('app.url') !!}/shop/">积分商城</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>