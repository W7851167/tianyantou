@extends('layout.main')
@section('title')网贷选平台行情_网贷选平台特色数据_天眼投精选平台搜索@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/laypage//skin/laypage.css?ver={!! time() !!}" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/laypage//skin/laypage.css?ver={!! time() !!}" />
@stop
@section('content')
<div id="platform" class="wrap">
    <!--<div class="top-banner"></div>-->
    <div class="container">
        <ul class="main-nav">
            <span>当前位置：</span>
            <li><a href="/">首页</a></li>
            <li class="nav-location">精选平台</li>
        </ul>
        <div class="main">
            <div class="plat-guide">
                <h3>新手引导</h3>
                <a href="/about/help.html#process" target="_blank">流程类说明</a>
                <a href="/about/help.html#touzhijia" target="_blank">天眼投说明</a>
                <a href="/about/help.html#accounts" target="_blank">账户类说明</a>
            </div>      <div class="filter-box" style="width: 960px; border-right: 1px solid #F2F2F2;">
                <dl class="filter plat-filter">
                    <dt>安全评级：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>AAA</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>AA以上</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>A以上</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>BBB以上</a></dd>
                    <dd><a href="javascript:void(0);" data='5'>BB以上</a></dd>
                    <dd><a href="javascript:void(0);" data='6'>B以上</a></dd>
                </dl>
                <dl class="filter plat-filter">
                    <dt>年化收益：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>20%~16%</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>16%~12%</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>12%~8%</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>8%以下</a></dd>
                </dl>
                <dl class="filter plat-filter">
                    <dt>投资期限：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>30天以内</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>1~3个月</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>3~6个月</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>6~12个月</a></dd>
                    <dd><a href="javascript:void(0);" data='5'>12个月以上</a></dd>
                </dl>
                <dl class="filter plat-filter noborder">
                    <dt>所在区域：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>北京</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>上海</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>广州</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>深圳</a></dd>
                    <dd><a href="javascript:void(0);" data='-1'>其他</a></dd>
                </dl>
            </div>
        </div>
        <div class="content">
           @foreach($lists as $cv)
                <div class="plat-box">
                    <!--
                    <i class="hot-plat"></i>
                    -->
                    <div class="plat-mask" style="display: none; opacity: 1;">
                        <a href="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html" target="_blank"></a>
                    </div>
                    <div class="plat-main">
                        <img src="{!! config('app.static_url') !!}{!! $cv->logo  or ''!!}" alt="{!! $cv->platform !!}">
                        <div class="plat-info" style="position: relative;">
                            <h4>年化收益率
                                @if($cv->min_yield == $cv->max_yield)
                                    <span class="rate"><em>{!! $cv->max_yield or 0.00 !!}</em>%</span>
                                @else
                                    <span class="rate"><em>{!! $cv->min_yield or 0.00 !!}</em>%<em>-</em><em>{!! $cv->max_yield or 0.00 !!}</em>%</span>
                                @endif
                            </h4>

                            <span style="width: 300px;margin-left: -15px;">天眼加年化：<em>@if($cv->min_myield == $cv->max_myield){!! $cv->max_myield or 0.00 !!}%@else{!! $cv->min_yield or 0.00 !!}%-{!! $cv->max_yield or 0.00 !!}%@endif</em></span>
                            <span>可投标数：<em>{!! $cv->tasks->where('status',1)->count()  !!}个</em></span>
                            <span>安全评级：<em>{!! $cv->level !!}</em></span>
                            <a href="/platform/{!! $cv->ename !!}.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                            </div>
                    </div>
                    <!--
                    <i class="event-plat"></i>
                    -->
                </div>
           @endforeach
        </div>
        <div id="platform_pagination" data-pagesize = '1'></div>
    </div>
</div>
<!--内容结束-->
@stop
@section('script')
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/laypage/laypage.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/main.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/laypage/laypage.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/form.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/plugins/login.js?ver={!! time() !!}"></script>
@stop