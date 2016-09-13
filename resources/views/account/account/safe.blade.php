@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">

        <div class="l-side-menu">
            <ul class="first-menu">
                <li>
                    <div class="user-avatar">
                        <img src="http://static.tianyantou.com/images/user/headerimg1.png?ver=20160431006" alt="" width="100" height="100">
        <span class="user-nickname" title="zhuxishun">
          zhuxishun                  </span>
                        <p class="accoount-validation mt10">
                            <a href="https://account.touzhijia.com/safe.html" title="身份验证" class="activated" ><i class="icon-identity"></i></a>
                            <a href="https://account.touzhijia.com/safe.html" title="手机验证" class="activated" ><i class="icon-phoneno"></i></a>
                            <a href="https://account.touzhijia.com/safe.html" title="邮箱验证" class="activated" ><i class="icon-email"></i></a>
                            <a href="https://account.touzhijia.com/safe.html" title="银行卡验证"  ><i class="icon-bankcard"></i></a>
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
                <li><a href="https://account.touzhijia.com/"><i class="iconfont">&#xe61c;</i>我的天眼投</a></li>      <li><h3><i class="iconfont">&#xe634;</i>理财管理</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/huoqi.html">活期</a></li><li><a href="https://account.touzhijia.com/debt.html">定期</a></li><li><a href="https://account.touzhijia.com/debt/transfer.html">债权转让</a></li><li><a href="https://account.touzhijia.com/debt/autobuy.html">自动购买</a></li></ul></li>      <li><h3><i class="iconfont">&#xe685;</i>全网通</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/networth/index.html">投资记录</a></li></ul></li>      <li><h3><i class="iconfont">&#xe612;</i>平台管理<span class="iconfont newicon">&#xe64d;</span></h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/platforms/statistic.html">平台统计</a></li><li><a href="https://account.touzhijia.com/platforms/analysis.html">投资明细</a></li><li><a href="https://account.touzhijia.com/platform/bind.html">平台绑定</a></li></ul></li>      <li><h3><i class="iconfont">&#xe631;</i>资金管理</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/wallet/recharge.html">充值</a></li><li><a href="https://account.touzhijia.com/wallet/withdraw.html">提现</a></li><li><a href="https://account.touzhijia.com/wallet/book.html">资金流水</a></li></ul></li>      <li><h3><i class="iconfont">&#xe632;</i>账号管理</h3><ul class="second-menu"><li class="current"><a href="https://account.touzhijia.com/safe.html">安全中心</a></li><li><a href="https://account.touzhijia.com/bankcard.html">银行卡</a></li></ul></li>      <li><h3><i class="iconfont">&#xe62f;</i>活动专区</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a></li><li><a href="https://account.touzhijia.com/activity/tcode.html">专享T码</a></li><li><a href="https://account.touzhijia.com/shop.html">兑换记录</a></li></ul></li>      <li><a href="https://account.touzhijia.com/coupon/index.html"><i class="iconfont">&#xe699;</i>理财券</a></li>      <li><a href="https://account.touzhijia.com/message.html"><i class="iconfont">&#xe62d;</i>消息中心</a></li>    </ul>
        </div>
        <div class="main tworow">
            <div class="main-inner">
                <h1 class="section-title">安全中心</h1>
                <div class="validation-group valid-telephone">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">手机验证</span>
                            <i class="iconfont verified">&#xe61b;</i>
                        </dt>
                        <dd>
                            <span class="valid-value">186****0121</span>
                            <a href="https://account.touzhijia.com/safe/changeTelephone.html" class="inline-modify modify-btn" data-target="#telephone-panel">通过原手机修改</a>
                            <a href="" class="modify-btn"></a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="telephone-panel"></div>
                </div>
                <div class="validation-group valid-email">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">邮箱验证</span>
                            <i class="iconfont verified">&#xe61b;</i>
                        </dt>
                        <dd>
                            <span class="valid-value">z*******n@cw100.com</span>
                            <a href="https://account.touzhijia.com/safe/validateEmail.html" class="inline-modify modify-btn" data-target="#email-panel">通过原邮箱修改</a>
                            <a href="https://account.touzhijia.com/safe/changeEmailByTelephone.html" class="inline-modify modify-btn" data-target="#email-panel">通过手机修改</a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="email-panel"></div>
                </div>
                <div class="validation-group valid-id_card">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">实名认证</span>
                            <i class="iconfont verified">&#xe61b;</i>
                        </dt>
                        <dd>
                            <span class="valid-value">* 希顺 2****************X</span>
                            <a href=" " class="modify-btn"> </a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="id_card-panel"></div>
                </div>
                <div class="validation-group valid-bank_id">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">绑定银行卡</span>
                        </dt>
                        <dd>
                            <span class="valid-value">未绑定</span>
                            <a href="https://account.touzhijia.com/bankcard.html" class="modify-btn">绑定</a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="bank_id-panel"></div>
                </div>
                <div class="validation-group valid-password">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">登录密码</span>
                            <i class="iconfont verified">&#xe61b;</i>
                        </dt>
                        <dd>
                            <span class="valid-value">已设置</span>
                            <a href="https://account.touzhijia.com/safe/changePassword.html" class="inline-modify modify-btn" data-target="#password-panel">修改</a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="password-panel"></div>
                </div>
                <div class="validation-group valid-dealpassword">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">交易密码</span>
                            <i class="iconfont verified">&#xe61b;</i>
                        </dt>
                        <dd>
                            <span class="valid-value">已设置</span>
                            <a href="https://account.touzhijia.com/safe/finddealpassword.html" class="inline-modify modify-btn" data-target="#dealpassword-panel">找回交易密码</a>
                            <a href="https://account.touzhijia.com/safe/changeDealPassword.html" class="inline-modify modify-btn" data-target="#dealpassword-panel">修改</a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="dealpassword-panel"></div>
                </div>
                <div class="validation-group valid-security_question">
                    <dl class="validation-status clearfix">
                        <dt>
                            <i class="s-icon"></i>
                            <span class="validation-name">密保问题</span>
                        </dt>
                        <dd>
                            <span class="valid-value">未设置</span>
                            <a href="https://account.touzhijia.com/safe/setSecurityQuestion.html" class="inline-modify modify-btn" data-target="#security_question-panel">设置</a>
                        </dd>
                    </dl>
                    <div class="validation-process hidden" id="security_question-panel"></div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
