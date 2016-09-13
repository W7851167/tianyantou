@extends('layout.main')

@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        <div class="l-side-menu">
            <ul class="first-menu">
                <li>
                    <div class="user-avatar">
                        <img src="https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20160431006" alt="" width="100" height="100">
        <span class="user-nickname" title="zhuxishun">
          zhuxishun                  </span>
                        <p class="accoount-validation mt10">
                            <a href="safe.html" title="身份验证" class="activated" ><i class="icon-identity"></i></a>
                            <a href="safe.html" title="手机验证" class="activated" ><i class="icon-phoneno"></i></a>
                            <a href="safe.html" title="邮箱验证" class="activated" ><i class="icon-email"></i></a>
                            <a href="safe.html" title="银行卡验证"  ><i class="icon-bankcard"></i></a>
                        </p>
                        <div class="checkin-area">
                            <div class="check-in ">
                                <p>积分：<span>20</span></p>
                            </div>
                            <i>+5</i>
                            <div class="checkin-rules">
                                <p>您已连续签到 <em class="checkin-days">0</em>
                                    天，今日签到<em class="check-points">+1</em></p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="current"><a href="account.touzhijia.html"><i class="iconfont">&#xe61c;</i>我的天眼投</a></li>      <li><h3><i class="iconfont">&#xe634;</i>理财管理</h3><ul class="second-menu"><li><a href="huoqi.html">活期</a></li><li><a href="debt.html">定期</a></li><li><a href="debt/transfer.html">债权转让</a></li><li><a href="debt/autobuy.html">自动购买</a></li></ul></li>      <li><h3><i class="iconfont">&#xe685;</i>全网通</h3><ul class="second-menu"><li><a href="networth/index.html">投资记录</a></li></ul></li>      <li><h3><i class="iconfont">&#xe612;</i>平台管理<span class="iconfont newicon">&#xe64d;</span></h3><ul class="second-menu"><li><a href="platforms/statistic.html">平台统计</a></li><li><a href="platforms/analysis.html">投资明细</a></li><li><a href="platform/bind.html">平台绑定</a></li></ul></li>      <li><h3><i class="iconfont">&#xe631;</i>资金管理</h3><ul class="second-menu"><li><a href="wallet/recharge.html">充值</a></li><li><a href="wallet/withdraw.html">提现</a></li><li><a href="wallet/book.html">资金流水</a></li></ul></li>      <li><h3><i class="iconfont">&#xe632;</i>账号管理</h3><ul class="second-menu"><li><a href="safe.html">安全中心</a></li><li><a href="bankcard.html">银行卡</a></li></ul></li>      <li><h3><i class="iconfont">&#xe62f;</i>活动专区</h3><ul class="second-menu"><li><a href="activity/recommend.html">邀请奖励</a></li><li><a href="activity/tcode.html">专享T码</a></li><li><a href="shop.html">兑换记录</a></li></ul></li>      <li><a href="coupon/index.html"><i class="iconfont">&#xe699;</i>理财券</a></li>      <li><a href="message.html"><i class="iconfont">&#xe62d;</i>消息中心</a></li>    </ul>
        </div>
        <div class="main tworow">
            <div class="main-inner">
                <div class="info-wrap clearfix">
                    <dl class="info-description-mod">
                        <dt>资产总额(元)
                            <a href="javascript:void(0)">
                                <i>?</i>
                                <p>资产总额【<span>0.00</span>元】= 待回款本金【<span>0.00</span>元】+ 活期金额【<span>0.00</span>元】+ 冻结金额【<span>0.00</span>元】+ 账户余额【<span>0.00</span>元】</p>
                            </a>
                        </dt>
                        <dd>0.00</dd>
                    </dl>
                    <dl class="info-description-mod">
                        <dt>借款本息(元)</dt>
                        <dd>0.00</dd>
                    </dl>
                    <dl class="info-description-mod">
                        <dt>冻结金额(元)</dt>
                        <dd>0.00</dd>
                    </dl>
                    <dl class="info-description-mod">
                        <dt>账户余额(元)</dt>
                        <dd>0.00</dd>
                    </dl>
                    <div class="shortcuts">
                        <a href="wallet/recharge.html" class="btn-recharge btn-s">充值</a>
                        <a href="wallet/withdraw.html" class="btn-widthdraw btn-s">提现</a>
                    </div>
                </div>

                <div class="info-detail-wrap clearfix">
                    <dl>
                        <dt><i class="info-icon ic-calendar"></i></dt>
                        <dd>您在天眼投理财<br><em>2</em>天</dd>
                    </dl>
                    <dl>
                        <dt><i class="info-icon ic-dollar"></i></dt>
                        <dd>累计收益
                            <a href="javascript:void(0)">
                                <i>?</i>
                                <p>投资收益【<span>0.00</span>元】+ 天眼投奖励(包含理财券奖励)【<span>0.00</span>元】</p>
                            </a>
                            <br><em>0.00</em>元
                        </dd>
                    </dl>
                    <dl>
                        <dt><i class="info-icon ic-awards"></i></dt>
                        <dd>之家奖励<br><em>0.00</em>元</dd>
                    </dl>
                </div>

                <!-- <div class="module-devider"></div>
                <a href="javascript:;" class="broadcast-placeholder">
                  <img src="https:http://static.tianyantou.com/images/user/report.png?ver=20160431006" alt="" width="926" height="60">
                </a> -->
                <div class="module-devider"></div>
                <div>
                    <div class="content-unit  madeup"  id="huoqi"  >
                        <div class="unit-bd unit-5 ">
                            <dl >
                                <dt><h3>活期</h3></dt>
                            </dl>
                            <dl >
                                <dt>活期金额(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl >
                                <dt>已赚收益(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl >
                                <dt>昨日收益(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl  class="last-item">
                                <dt>年化收益率</dt>
                                <dd>6.68%</dd>
                            </dl>
                        </div>
                    </div>      <div class="content-unit  madeup"  id="debt"  >
                        <div class="unit-bd unit-5 ">
                            <dl >
                                <dt><h3>定期</h3></dt>
                            </dl>
                            <dl >
                                <dt>待回款本金(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl >
                                <dt>待回款收益(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl >
                                <dt>已赚取收益(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl  class="last-item">
                                <dt>加权年化收益率</dt>
                                <dd>0.00%</dd>
                            </dl>
                        </div>
                    </div>      <div class="content-unit  madeup"  id="applyloan"  >
                        <div class="unit-bd unit-5 ">
                            <dl >
                                <dt><h3>全网通</h3></dt>
                            </dl>
                            <dl >
                                <dt>待回款本金(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl >
                                <dt>待回款收益(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl >
                                <dt>已赚取收益(元)</dt>
                                <dd>0.00</dd>
                            </dl>
                            <dl  class="last-item">
                                <dt>加权年化收益率</dt>
                                <dd>0.00%</dd>
                            </dl>
                        </div>
                    </div>    </div>

                <!--平台投资-->
                <div class="module-devider"></div>
                <div class="plat-invest">
                    <h2>平台投资<a rel="btn-fresh" href="javascript:void(0)" class="fresh"><i class="iconfont"></i></a></h2>
                    <div style="text-align: center; font-size: 16px; padding: 30px;" id="no-plat-distribution-data">
                        <p>21道风控精选平台，高达18%年化收益，还有1%加息券等着您----<a style="color: #2AA3CE;" href="../www.touzhijia.com/platform/project.html">去看看>></a></p>
                    </div>
                </div>
                <div class="module-devider"></div>
                <input name="utoken" type="hidden" value="f33727ce94e40d191cd7b45e80cc86d6">
                <div class="chart-calendar">
                    <div class="tab click-tab">
                        <ul class="tab-nav">
                            <li class="active"><a href="javascript:void(0);">资金日历</a></li>
                            <li><a href="javascript:void(0);">近半年收益</a></li>
                        </ul>
                        <div class="tab-main">
                            <div class="active">
                                <p class="summary-info">&nbsp;&nbsp;<em></em></p>
                                <ul class="color-tags clearfx">
                                    <li style="color:#2aa3ce;"><i style="background-color:#2aa3ce;"></i>已还</li>
                                    <li style="color:#fb4242"><i style="background-color:#fb4242"></i>待还</li>
                                    <li style="color:#FB9142;"><i style="background-color:#FB9142;"></i>已收</li>
                                    <li style="color:#79B32B;"><i style="background-color:#79B32B;"></i>待收</li>
                                </ul>
                                <div id="paieback-calendar" class="paieback-calendar">
                                </div>
                            </div>
                            <div >
                                <div id="profit-chart" class="profit-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="module-devider"></div>
                <div class="module-section">
                    <h4 class="sec-tit">去这里赚钱</h4>
                    <!-- 与原有的一样 -->
                    <ul class="logolink">
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_erongsuo.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-0']);" target="_blank" title="e融所">
                                <p class="logoimgp">
                                    <img src="https:http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016080810123766531.png?ver=20160431006" alt="e融所" title="e融所" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_huitouwang.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-1']);" target="_blank" title="汇投网">
                                <p class="logoimgp">
                                    <img src="{!!config('app.static_url')!!}/upload/image/bidimg/logo_recommend_img/2016071813583280943.jpg.jpg" alt="汇投网" title="汇投网" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_xinyongbao.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-2']);" target="_blank" title="信用宝">
                                <p class="logoimgp">
                                    <img src="{!!config('app.static_url')!!}/upload/image/bidimg/logo_recommend_img/2016042614212699586.jpg.jpg" alt="信用宝" title="信用宝" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_rxdai.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-3']);" target="_blank" title="投哪网">
                                <p class="logoimgp">
                                    <img src="{!!config('app.static_url')!!}/upload/image/bidimg/logo_recommend_img/201411262133482121.jpg.jpg" alt="投哪网" title="投哪网" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_duanrongwang.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-4']);" target="_blank" title="短融网">
                                <p class="logoimgp">
                                    <img src="{!!config('app.static_url')!!}/upload/image/bidimg/logo_recommend_img/2016080213010228018.jpg.jpg" alt="短融网" title="短融网" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_zhubaodai.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-5']);" target="_blank" title="珠宝贷">
                                <p class="logoimgp">
                                    <img src="{!!config('app.static_url')!!}/upload/image/bidimg/logo_recommend_img/2015041617455545546.jpg.jpg" alt="珠宝贷" title="珠宝贷" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_huiyingdai.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-6']);" target="_blank" title="汇盈金服">
                                <p class="logoimgp">
                                    <img src="{!!config('app.static_url')!!}/upload/image/bidimg/logo_recommend_img/2015080414060923178.jpg.jpg" alt="汇盈金服" title="汇盈金服" height="55">
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="../www.touzhijia.com/platform/detail_kaixindai.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-7']);" target="_blank" title="开鑫贷">
                                <p class="logoimgp">
                                    <img src="https:http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/201605031509119460.png?ver=20160431006" alt="开鑫贷" title="开鑫贷" height="55">
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
