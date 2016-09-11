<!DOCTYPE html>
<html>
<head>
    <link rel="dns-prefetch" href="{!! config('app.static_url') !!}">
    <meta content="always" name="referrer">
    <title>用户注册_投之家</title>
    @yield('style')
</head>
<body>
<div id="head">
    <script type="text/javascript">
        var USER = {
            "username": "",
            "islogin": 0,
            "email_flag": 0,
            "telephone_flag": 0,
            "bank_flag": 0,
            "security_question_flag": 0,
            "invest_flag": 0
        };
    </script>
    <div id="head-top">
        <div id="head-top-main">
            <p>服务热线：400-883-1803（工作日&nbsp;9:00~20:30&nbsp;&nbsp;节假日&nbsp;10:00~18:00）</p>

            <div class="top-menu">
                <div class="log">欢迎来到投之家！请<a id="loginStart" href="https://account.touzhijia.com/signin.html" alt="登录">登录</a>&frasl;<a
                            href="https://account.touzhijia.com/register.html" alt="注册">注册</a>

                    <div class="code-login">
                        <h3>微信扫码 安全登录</h3>

                        <div class="code-img" id="topbar-wx-qrcode">
                        </div>
                    </div>
                </div>
                <span class="line"></span>
                <a href="http://topics.touzhijia.com/20150910" target="_blank">投之家APP</a>
                <span class="line"></span>
                <a href="https://www.touzhijia.com/about/help.html">帮助中心</a>
                <span class="line"></span>
                <a href="https://www.touzhijia.com/about/company.html">关于我们</a>
                <span class="line"></span>
                <a href="http://wenda.touzhijia.com/">投资问答</a>
                <span class="line"></span>

                <div class="contact">
                    <a href="http://weibo.com/touzhijia" target="_blank" class="h_weibo"></a>
                    <a id="h_weixin" href="#" class="h_weixin"></a>
                    <img class="show-img" src="//static.touzhijia.com/images/common/h_weixin.jpg?ver=20160431006"
                         width="163">
                </div>
            </div>
        </div>
    </div>
    <div id="head-btm">
        <div id="head-btm-main">
            <h1 id="logo">
                <a href="">
                    <img src="" alt="投之家,p2p理财,投资理财,p2p网贷"
                         title="投之家-中国领先的P2P网贷投资平台，您的个人理财专家"/>
                </a>
                <a href="https://www.touzhijia.com/" style="padding-left:26px;">
                    <img src="//static.touzhijia.com/images/common/logo.png?ver=20160431006"
                         alt="投之家,p2p理财,投资理财,p2p网贷"/>
                </a>
                <a href="http://topics.touzhijia.com/activities/anniversaryParty" target="_blank">
                    <img src="//static.touzhijia.com/images/common/logo_anniversary_2nd.gif?ver=20160431006"
                         alt="梦想有礼，之家2周年">
                </a>
            </h1>

            <div class="main-menu">
                <div class="curr-line"></div>
                <ul>
                    <li class=""><a
                                href="https://www.touzhijia.com/">首页</a>
                    </li>
                    <li class=""><a
                                href="https://www.touzhijia.com/platform/">选平台</a>
                    </li>
                    <li class=""><a
                                href="https://www.touzhijia.com/platform/project.html">选标中心</a>
                    </li>
                    <li class=""><a
                                href="https://www.touzhijia.com/current/">活期</a>
                    </li>
                    <li class=""><a
                                href="https://www.touzhijia.com/debt/">定期</a>
                    </li>
                    <li class="" style="padding-right:17px"><a
                                href="http://ask.touzhijia.com/" target="_blank">社区</a>
                        <span class="iconfont newicon" style="margin-top: 22px;margin-left: -8px;">&#xe64d;</span>
                    </li>
                    <li class=""><a
                                href="https://www.touzhijia.com/shop/">积分商城</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>