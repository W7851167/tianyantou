@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">

            <div class="l-side-menu" style="height: 874px;">
                <ul class="first-menu">
                    <li>
                        <div class="user-avatar">
                            <img src="./投之家 - 个人中心_files/headerimg2.png" alt="" width="100" height="100">
        <span class="user-nickname" title="15072309522">
          15072309522          <a class="iconfont" style="color: #666;"
                                  href="https://account.touzhijia.com/safe.html"></a>        </span>
                            <p class="accoount-validation mt10">
                                <a href="https://account.touzhijia.com/safe.html" title="身份验证"><i class="icon-identity"></i></a>
                                <a href="https://account.touzhijia.com/safe.html" title="手机验证" class="activated"><i
                                            class="icon-phoneno"></i></a>
                                <a href="https://account.touzhijia.com/safe.html" title="邮箱验证"><i
                                            class="icon-email"></i></a>
                                <a href="https://account.touzhijia.com/safe.html" title="银行卡验证"><i
                                            class="icon-bankcard"></i></a>
                            </p>
                            <div class="checkin-area">
                                <div class="check-in ">
                                    <p>积分：<span>10</span></p>
                                </div>
                                <i>+5</i>
                                <div class="checkin-rules">
                                    <p>您已连续签到 <em class="checkin-days">0</em>
                                        天，今日签到<em class="check-points">+1</em></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="https://account.touzhijia.com/"><i class="iconfont"></i>我的投之家</a></li>
                    <li><h3><i class="iconfont"></i>理财管理</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/huoqi.html">活期</a></li>
                            <li><a href="https://account.touzhijia.com/debt.html">定期</a></li>
                            <li><a href="https://account.touzhijia.com/debt/transfer.html">债权转让</a></li>
                            <li><a href="https://account.touzhijia.com/debt/autobuy.html">自动购买</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>全网通</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/networth/index.html">投资记录</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>平台管理<span class="iconfont newicon"></span></h3>
                        <ul class="second-menu" style="display: block;">
                            <li class="current"><a href="https://account.touzhijia.com/platforms/statistic.html">平台统计</a>
                            </li>
                            <li><a href="https://account.touzhijia.com/platforms/analysis.html">投资明细</a></li>
                            <li><a href="https://account.touzhijia.com/platform/bind.html">平台绑定</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>资金管理</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/wallet/recharge.html">充值</a></li>
                            <li><a href="https://account.touzhijia.com/wallet/withdraw.html">提现</a></li>
                            <li><a href="https://account.touzhijia.com/wallet/book.html">资金流水</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>账号管理</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/safe.html">安全中心</a></li>
                            <li><a href="https://account.touzhijia.com/bankcard.html">银行卡</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>活动专区</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a></li>
                            <li><a href="https://account.touzhijia.com/activity/tcode.html">专享T码</a></li>
                            <li><a href="https://account.touzhijia.com/shop.html">兑换记录</a></li>
                        </ul>
                    </li>
                    <li><a href="https://account.touzhijia.com/coupon/index.html"><i class="iconfont"></i>理财券</a></li>
                    <li><a href="https://account.touzhijia.com/message.html"><i class="iconfont"></i>消息中心</a></li>
                </ul>
            </div>
            <div class="main tworow" style="height: 876px;">
                <!-- 主要内容start -->
                <div class="main tworow platform-manage" style="height: 876px;">
                    <div class="main-inner">
                        <h1 class="section-title">平台统计</h1>
                        <!-- 平台统计 start -->
                        <div class="cont-box-wrap">
                            <div class="content-unit">
                                <div class="unit-bd unit-5">
                                    <dl>
                                        <dt>在投本金(元)</dt>
                                        <dd>0.00</dd>
                                    </dl>
                                    <dl>
                                        <dt>待收利息(元)</dt>
                                        <dd>0.00</dd>
                                    </dl>
                                    <dl>
                                        <dt>累计收益(元)</dt>
                                        <dd>0.00</dd>
                                    </dl>
                                    <dl>
                                        <dt>投资平台数(家)</dt>
                                        <dd>0</dd>
                                    </dl>
                                    <dl class="last-item">
                                        <dt>综合年化收益率</dt>
                                        <dd>0.00%</dd>
                                    </dl>
                                    <a href="https://account.touzhijia.com/platforms/analysis.html"
                                       class="link footnote-link">查看详情&gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                        <!-- 平台统计end -->
                        <!-- 平台列表start -->
                        <div class="tab click-tab btn-tab">
                            <ul class="tab-nav page-switch clearfix">
                                <li class="active"><a href="javascript:;">已开通平台（2个）</a></li>
                                <li class=""><a href="https://account.touzhijia.com/platforms/statistic.html">未开通平台（27个）</a>
                                </li>
                            </ul>
                            <div class="tab-main">
                                <!-- 已开通平台选项卡 start -->
                                <div class="active">
                                    <!--<div class="activate-plat">
                                        <i class="iconfont">&#xe624;</i><span>活动：新开平台送积分+豪礼！</span>
                                        <a class="btn btn-orange btn-l" target="_blank" href="../platform/activate-plat.html">开通新平台(12)</a>
                                    </div>-->
                                    <!-- 切换图表分析 end -->
                                    <!-- 平台列表 start -->
                                    <div class="platlist-wrap activated-plat" id="opened_platforms">
                                        <!-- 切换图表分析 start -->
                                        <div class="switch-btn">
                                            <!--<a rel="switch-graph" class="btn btn-gray btn-l" href="#"><i class="iconfont">&#xe6b9;</i>图表分析</a>-->
                                        </div>
                                        <p class="no-record">您还未开通平台</p>
                                    </div>
                                    <!-- 平台列表 end -->
                                    <!-- 图表分析  start -->
                                    <div class="graph">
                                        <div class="switch-btn">
                                        </div>
                                    </div>
                                    <!-- 图表分析  end -->
                                </div>
                                <!-- 已开通平台选项卡 end -->
                                <!-- 未开通平台选项卡 start -->
                                <div class="">
                                    <div class="platlist-wrap inactivated-plat" id="unopened_platforms">
                                        <div class="plat-list" id="unopened_platforms">
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="./投之家 - 个人中心_files/2014112411514815981.jpg" alt="信融财富">
                                                    <div class="plat-info" style="position: relative;">
                                                        <h4>年化收益率<span class="rate"><em>11.10-13.80</em>%</span></h4>
                                                        <span>项目期限：<em>1月-12月</em></span>
                                                        <span>可投标数：<em>50个</em></span>
                                                        <span>安全评级：<em>A</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="https://www.touzhijia.com/platform/login/xinrong/0.html">开通账户</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="./投之家 - 个人中心_files/2014112411074456854.jpg" alt="91旺财">
                                                    <div class="plat-info" style="position: relative;">
                                                        <h4>年化收益率<span class="rate"><em>7.00-12.00</em>%</span></h4>
                                                        <span>项目期限：<em>1月-6月</em></span>
                                                        <span>可投标数：<em>待发布</em></span>
                                                        <span>安全评级：<em>A</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="https://www.touzhijia.com/platform/login/91wangcai/0.html">开通账户</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="./投之家 - 个人中心_files/2014112414002812896.jpg" alt="楚金所">
                                                    <div class="plat-info" style="position: relative;">
                                                        <h4>年化收益率<span class="rate"><em>8.00-10.00</em>%</span></h4>
                                                        <span>项目期限：<em>1月-12月</em></span>
                                                        <span>可投标数：<em>1个</em></span>
                                                        <span>安全评级：<em>AA</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="https://www.touzhijia.com/platform/login/chujinsuo/0.html">开通账户</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="./投之家 - 个人中心_files/201411262133482121.jpg" alt="投哪网">
                                                    <div class="plat-info" style="position: relative;">
                                                        <h4>年化收益率<span class="rate"><em>7.00-12.00</em>%</span></h4>
                                                        <span>项目期限：<em>7日-36月</em></span>
                                                        <span>可投标数：<em>5个</em></span>
                                                        <span>安全评级：<em>A</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="https://www.touzhijia.com/platform/login/rxdai/0.html">开通账户</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="./投之家 - 个人中心_files/2014121116172774628.png" alt="粤商贷">
                                                    <div class="plat-info" style="position: relative;">
                                                        <h4>年化收益率<span class="rate"><em>10.00-15.00</em>%</span></h4>
                                                        <span>项目期限：<em>15日-12月</em></span>
                                                        <span>可投标数：<em>1个</em></span>
                                                        <span>安全评级：<em>BB</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="https://www.touzhijia.com/platform/login/yesvion/0.html">开通账户</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="./投之家 - 个人中心_files/2014122314312929936.jpg" alt="融资易">
                                                    <div class="plat-info" style="position: relative;">
                                                        <h4>年化收益率<span class="rate"><em>12.00-16.50</em>%</span></h4>
                                                        <span>项目期限：<em>30日-6月</em></span>
                                                        <span>可投标数：<em>1个</em></span>
                                                        <span>安全评级：<em>BB</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="https://www.touzhijia.com/platform/login/51rzy/0.html">开通账户</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination" data-pagination-ref="unopened_platforms"><a
                                                    href="https://account.touzhijia.com/platforms/unopenedPlatforms?page=2"
                                                    data-ci-pagination-page="2"><i class="iconfont next"
                                                                                   style="font-size:12px;"></i></a></div>
                                    </div>
                                </div>
                                <!-- 未开通平台选项卡 end -->
                            </div>
                        </div>
                        <!-- 平台列表start -->
                    </div>
                </div>
                <!-- 主要内容end -->
            </div>
        </div>
    </div>
@stop
