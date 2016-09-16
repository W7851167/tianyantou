@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
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
                                    <a href="https://account.touzhijia.com/platforms/analysis.html" class="link footnote-link">查看详情&gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                        <!-- 平台统计end -->
                        <!-- 平台列表start -->
                        <div class="tab click-tab btn-tab">
                            <ul class="tab-nav page-switch clearfix">
                                <li class="active"><a href="javascript:;">已开通平台（2个）</a></li>
                                <li class=""><a href="{!! config('app.account_url') !!}/platforms/statistic.html">未开通平台（{!! $count !!}个）</a>
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
                                                        <span>项目期限：<em>@if($cv->min_days == $cv->max_days){!! dateFormat($cv->max_days) !!}@else{!! dateFormat($cv->min_days) !!}-{!! dateFormat($cv->max_days) !!}@endif</em></span>
                                                        <span>可投标数：<em>{!! $cv->tasks->count() !!}个</em></span>
                                                        <span>安全评级：<em>{!! $cv->level or 'B' !!}</em></span>
                                                        <a class="btn btn-blue-o btn-allwidth" rel="_platform_join"
                                                           data-sso-url="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html">查看详情</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="pagination" data-pagination-ref="unopened_platforms">
                                            <a href="https://account.touzhijia.com/platforms/unopenedPlatforms?page=2" data-ci-pagination-page="2">
                                                <i class="iconfont next"  style="font-size:12px;"></i>
                                            </a>
                                        </div>
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
