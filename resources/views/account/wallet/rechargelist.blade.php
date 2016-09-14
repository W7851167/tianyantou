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
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/platforms/statistic.html">平台统计</a></li>
                            <li><a href="https://account.touzhijia.com/platforms/analysis.html">投资明细</a></li>
                            <li><a href="https://account.touzhijia.com/platform/bind.html">平台绑定</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>资金管理</h3>
                        <ul class="second-menu" style="display: block;">
                            <li class="current"><a href="https://account.touzhijia.com/wallet/recharge.html">充值</a></li>
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

                <div class="main-inner">
                    <ul class="page-switch page-double clearfix">
                        <li><a href="https://account.touzhijia.com/wallet/recharge.html">我要充值</a></li>
                        <li class="active"><a href="https://account.touzhijia.com/wallet/rechargelist.html">充值记录</a></li>
                    </ul>

                    <div class="cont-box-wrap">
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>累计充值金额(元)</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>账户可用余额(元)</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>充值成功次数</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cont-box-wrap">
                        <div id="recharge-records-table">
                            <table class="table table-blue table-bordered ucenter-table">
                                <thead>
                                <tr>
                                    <th>充值时间</th>
                                    <th>流水号</th>
                                    <th>充值金额</th>
                                    <th>充值方式</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="norecord">
                                    <td colspan="5">
                                        暂无充值记录
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="pagination" data-pagination-ref="recharge-records-table"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
