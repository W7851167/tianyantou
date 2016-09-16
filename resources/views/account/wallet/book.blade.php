@extends('layout.main')
@section('title')资金流水@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        @include('account.common.menu')
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

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/base64encode.js"></script>
@stop
