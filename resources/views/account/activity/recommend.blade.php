@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">

            <div class="l-side-menu" style="height: 1341px;">
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
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/platforms/statistic.html">平台统计</a></li>
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
                        <ul class="second-menu" style="display: block;">
                            <li class="current"><a href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a>
                            </li>
                            <li><a href="https://account.touzhijia.com/activity/tcode.html">专享T码</a></li>
                            <li><a href="https://account.touzhijia.com/shop.html">兑换记录</a></li>
                        </ul>
                    </li>
                    <li><a href="https://account.touzhijia.com/coupon/index.html"><i class="iconfont"></i>理财券</a></li>
                    <li><a href="https://account.touzhijia.com/message.html"><i class="iconfont"></i>消息中心</a></li>
                </ul>
            </div>
            <div class="main tworow" style="height: 1343px;">
                <div class="main tworow invite" style="height: 1343px;">
                    <div class="main-inner">
                        <h1 class="section-title">邀请好友</h1>
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>已获邀请奖励（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>累计邀请好友（人）</dt>
                                    <dd>0</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>未激活理财券（张）</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="cont-box-wrap">
                            <div class="tab click-tab">
                                <ul class="tab-nav">
                                    <li class="active"><a
                                                href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a></li>
                                    <li><a href="https://account.touzhijia.com/activity/recommendlist.html">邀请记录</a></li>
                                </ul>
                                <div class="tab-main">
                                    <div class="active">
                                        <div class="invite-reward">
                                            <img src="./投之家 - 个人中心_files/invite-reward.jpg" alt="">
                                            <a href="http://topics.touzhijia.com/newregister.html" target="_blank"
                                               class="btn btn-blue btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont-box-wrap">
                            <div class="tab click-tab" style="border:0">
                                <ul class="tab-nav" style="border-top:0">
                                    <li style="border-bottom:2px solid #2AA3CE"><a style="padding:0 20px"
                                                                                   href="javascript:void(0);">邀请方式</a></li>
                                </ul>
                                <div class="tab-main" style="border:1px solid #E2E2E2;border-top:0">
                                    <div class="active">
                                        <ul class="invite-method">
                                            <li style="width:210px;height:210px;">
                                                <span class="invite-link">复制注册链接<br>发给好友即可哦~</span>
                                                <a href="javascript:;" class="btn btn-blue btn-m"
                                                   data-url="https://account.touzhijia.com/register.html?uid=2616033"
                                                   id="copy-link">复制链接</a>
                                            </li>
                                            <li style="width:210px;height:210px;">
                                                <span class="invite-wechat">微信邀请</span>
                                                <p>扫描二维码后将链接发给好友</p>
                                                <div id="invite-qrcode"
                                                     data-url="http://m.touzhijia.com/account/register?uid=2616033&amp;tel=150****9522">
                                                    <canvas width="90" height="90"></canvas>
                                                </div>
                                            </li>
                                            <li style="width:210px;height:210px;">
                                                <span class="invite-code">邀请码邀请</span>
                                                <p>好友注册时候可以填写您的<br>手机号码作为推荐码</p>
                                                <em>15072309522</em>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tip tab-rules">
                            <h3 class="title-indent">温馨提示</h3>
                            <div class="tip-main">
                                <ul class="tab-content">
                                    <li>1. 所有红包、投资券及加息券请在“个人中心-理财劵”中查看，购买投之家定期产品时可以使用；</li>
                                    <li>2. 请将上方的推广链接发送给您的好友，或者您好友在注册投之家账号的时候，填写您的手机号码；</li>
                                    <li>3. 根据活动情况，获得投之家邀请奖励会有所变化，具体相关活动请关注网站活动公告。</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
