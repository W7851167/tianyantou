@extends('layout.main')
@section('title')平台统计@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
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
                                    <a href="{!! config('app.account_url') !!}/platforms/analysis.html" class="link footnote-link">查看详情&gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                        <!-- 平台统计end -->
                        <!-- 平台列表start -->
                        <div class="tab click-tab btn-tab">
                            <ul class="tab-nav page-switch clearfix">
                                <li class="active"><a href="javascript:;">已开通平台（{!! $openCount or 0 !!}个）</a></li>
                                <li class=""><a href="{!! config('app.account_url') !!}/platforms/statistic.html">未开通平台（{!! $count or 0 !!}个）</a>
                                </li>
                            </ul>
                            <div class="tab-main">
                                <!-- 已开通平台选项卡 start -->
                                <div class="active">
                                    <div class="platlist-wrap inactivated-plat" id="opened_platforms">
                                        <div class="plat-list active-plat">
                                            @if(count($openLists)>0)
                                                @foreach($openLists as $cv)
                                            <div class="plat-box">
                                                <div class="logo">
                                                    <img src="{!! config('app.static_url') !!}{!! $cv->logo or '' !!}" width="110" height="50" alt="{!! $cv->platform or '' !!}">
                                                    <a rel="show-more" href="{!! config('app.account_url') !!}/platforms/analysis.html?date=all&type=all&platform={!! $cv->ename or '' !!}">明细&nbsp;({!! $cv->census['count'] or 0 !!})</a >
                                                </div>
                                                <div class="details">
                                                    <table border="0">
                                                        <tbody>
                                                            <tr>
                                                                <th width="130">在投本金</th>
                                                                <th>待收利息</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{!! $cv->census['total'] or 0.00 !!}元</td>
                                                                <td>{!! $cv->census['income'] or 0.00 !!}元</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0">
                                                        <tbody>
                                                            <tr>
                                                                <th width="130">投资占比</th>
                                                                <th>平均期限</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{!! $cv->census['proportion'] or 0.00 !!}%</td>
                                                                <td>{!! $cv->census['term'] or 0.0 !!}个月</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html" class="btn btn-blue-o btn-allwidth" rel="_platform_join" data-sso-url="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html">进入平台</a >
                                            </div>
                                                @endforeach
                                            @else
                                            <p class="no-record">您还未开通平台</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- 未开通平台选项卡 start -->
                                <div class="">
                                    <div class="platlist-wrap inactivated-plat" id="unopened_platforms">
                                        @if(count($lists)>0)
                                        <div class="plat-list" id="unopened_platforms">
                                            @foreach($lists as $cv)
                                            <div class="plat-box">
                                                <div class="plat-main">
                                                    <img src="{!! config('app.static_url') !!}{!! $cv->logo or '' !!}" alt="{!! $cv->platform or '' !!}">
                                                    <div class="plat-info" style="position: relative;">
                                                        @if($cv->min_yield == $cv->max_yield)
                                                            <span class="rate"><em>{!! $cv->max_yield or 0.00 !!}</em>%</span>
                                                        @else
                                                            <span class="rate"><em>{!! $cv->min_yield or 0.00 !!}</em>%<em>-</em><em>{!! $cv->max_yield or 0.00 !!}</em>%</span>
                                                        @endif
                                                            <span style="width: 300px;margin-left: -15px;">天眼加年化：<em>@if($cv->min_myield == $cv->max_myield){!! $cv->max_myield or 0.00 !!}%@else{!! $cv->min_myield or 0.00 !!}%-{!! $cv->max_myield or 0.00 !!}%@endif</em></span>
                                                        <span>可投标数：<em>{!!  $cv->tasks->where('status',1)->count() !!}个</em></span>
                                                        <span>安全评级：<em>{!! $cv->level or 'B' !!}</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" href="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html">查看详情</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="pagination" data-pagination-ref="unopened_platforms">
                                            {!! $pageHtml !!}
                                        </div>
                                        @else
                                        <p class="no-record">您还没有未开通平台</p>
                                        @endif
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

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
@stop
