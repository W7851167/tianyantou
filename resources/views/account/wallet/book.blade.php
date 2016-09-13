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
                <li><a href="https://account.touzhijia.com/"><i class="iconfont">&#xe61c;</i>我的天眼投</a></li>      <li><h3><i class="iconfont">&#xe634;</i>理财管理</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/huoqi.html">活期</a></li><li><a href="https://account.touzhijia.com/debt.html">定期</a></li><li><a href="https://account.touzhijia.com/debt/transfer.html">债权转让</a></li><li><a href="https://account.touzhijia.com/debt/autobuy.html">自动购买</a></li></ul></li>      <li><h3><i class="iconfont">&#xe685;</i>全网通</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/networth/index.html">投资记录</a></li></ul></li>      <li><h3><i class="iconfont">&#xe612;</i>平台管理<span class="iconfont newicon">&#xe64d;</span></h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/platforms/statistic.html">平台统计</a></li><li><a href="https://account.touzhijia.com/platforms/analysis.html">投资明细</a></li><li><a href="https://account.touzhijia.com/platform/bind.html">平台绑定</a></li></ul></li>      <li><h3><i class="iconfont">&#xe631;</i>资金管理</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/wallet/recharge.html">充值</a></li><li><a href="https://account.touzhijia.com/wallet/withdraw.html">提现</a></li><li class="current"><a href="https://account.touzhijia.com/wallet/book.html">资金流水</a></li></ul></li>      <li><h3><i class="iconfont">&#xe632;</i>账号管理</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/safe.html">安全中心</a></li><li><a href="https://account.touzhijia.com/bankcard.html">银行卡</a></li></ul></li>      <li><h3><i class="iconfont">&#xe62f;</i>活动专区</h3><ul class="second-menu"><li><a href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a></li><li><a href="https://account.touzhijia.com/activity/tcode.html">专享T码</a></li><li><a href="https://account.touzhijia.com/shop.html">兑换记录</a></li></ul></li>      <li><a href="https://account.touzhijia.com/coupon/index.html"><i class="iconfont">&#xe699;</i>理财券</a></li>      <li><a href="https://account.touzhijia.com/message.html"><i class="iconfont">&#xe62d;</i>消息中心</a></li>    </ul>
        </div>
        <div class="main tworow">
            <div class="main-inner">
                <h1 class="section-title">资金流水</h1>
                <div class="content-unit "  >
                    <div class="unit-bd unit-3 ">
                        <dl >
                            <dt>账户余额(元)</dt>
                            <dd>0.00</dd>
                        </dl>
                        <dl >
                            <dt>已充值金额(元)</dt>
                            <dd>0.00</dd>
                        </dl>
                        <dl  class="last-item">
                            <dt>已提现金额(元)</dt>
                            <dd>0.00</dd>
                        </dl>
                    </div>
                </div>
                <div class="filter-group">
                    <dl class="filter plat-filter">
                        <dt>产品类型：</dt>
                        <dd class="active"><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=all">全部</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=debt&opType=all&timespan=all">定期</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=transfer&opType=all&timespan=all">债权转让</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=huoqi&opType=all&timespan=all">活期</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=fund&opType=all&timespan=all">e利多</a></dd>  </dl>
                    <dl class="filter plat-filter">
                        <dt>操作类型：</dt>
                        <dd class="active"><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=all">全部</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=invest&timespan=all">投资</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=income&timespan=all">回款</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=recharge&timespan=all">充值</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=withdraw&timespan=all">提现</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=other&timespan=all">其他</a></dd>
                    </dl>
                    <dl class="filter plat-filter">
                        <dt>查询时间：</dt>
                        <dd class="active"><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=all">全部</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=1w">一周内</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=1m">一月内</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=3m">三月内</a></dd><dd><a href="https://account.touzhijia.com/wallet/book.html?appType=all&opType=all&timespan=6m">半年内</a></dd>  </dl>
                </div>

                <table class="table table-blue table-bordered ucenter-table">
                    <thead>
                    <tr>
                        <th>时间</th>
                        <th>类型</th>
                        <th>收入(元)</th>
                        <th>支出(元)</th>
                        <th>账户金额(元)</th>
                        <th width="280">备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="norecord">
                        <td colspan="6">
                            未查询到相关流水  </td>
                    </tr>    </tbody>
                </table>
                <div class="pagination"></div></div>    </div>
    </div>
</div>
@stop
