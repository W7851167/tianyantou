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
                        <?php $type = Input::get('opType')?:'all';$time=Input::get('timespan')?:'or'; ?>
                        <dt>操作类型：</dt>
                        <dd @if($type == 'all')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType=&timespan={!! $time !!}">全部</a></dd>
                        <dd @if($type == 'invest')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType=invest&timespan={!! $time !!}">投资</a></dd>
                        <dd @if($type == 'income')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType=income&timespan={!! $time !!}">回款</a></dd>
                        <dd @if($type == 'recharge')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType=recharge&timespan={!! $time !!}">充值</a></dd>
                        <dd @if($type == 'withdraw')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType=withdraw&timespan={!! $time !!}">提现</a></dd>
                        <dd @if($type == 'other')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType=other&timespan={!! $time !!}">其他</a></dd>
                    </dl>
                    <dl class="filter plat-filter">
                        <dt>查询时间：</dt>
                        <dd @if($time == 'all')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType={!! $type !!}&timespan=all">全部</a></dd>
                        <dd @if($time == '1w')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType={!! $type !!}&timespan=1w">一周内</a></dd>
                        <dd @if($time == '1m')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType={!! $type !!}&timespan=1m">一月内</a></dd>
                        <dd @if($time == '3m')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType={!! $type !!}&timespan=3m">三月内</a></dd>
                        <dd @if($time == '6m')class="active"@endif><a href="{!! config('app.account_url') !!}/wallet/book.html?opType={!! $type !!}&timespan=6m">半年内</a></dd>
                    </dl>
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
                    @if(count($lists) > 0)
                        @foreach($lists as $rv)
                    <tr>
                        <td>{!! $rv->created_at or '---' !!}</td>
                        <td>@if($rv->type==1)投资@elseif($rv->type==2)回款@elseif($rv->type==3)充值@elseif($rv->type==4)体现@else - @endif</td>
                        <td>{!! $rv->income or 0.00 !!}</td>
                        <td>{!! $rv->cost or 0.00 !!}</td>
                        <td>{!! $rv->account or 0.00 !!}</td>
                        <td>{!! $rv->remark or '-' !!}</td>
                    </tr>
                        @endforeach
                    @else
                    <tr class="norecord">
                        <td colspan="6">未查询到相关流水</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
                <div class="pagination"></div>
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
@stop
