@extends('layout.main')
@section('title')投资明细@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 1297px;">
                <!-- 主要内容start -->
                <div class="main tworow platform-manage" style="height: 1297px;">
                    <div class="main-inner">
                        <h1 class="section-title">投资明细</h1>
                        <div class="cont-box-wrap">
                            <div class="content-unit">
                                <div class="unit-bd unit-3">
                                    <dl>
                                        <dt>投资金额(元)</dt>
                                        <dd>{!! $census['total'] !!}</dd>
                                    </dl>
                                    <dl>
                                        <dt>累计收益(元)</dt>
                                        <dd>{!! $census['income'] !!}</dd>
                                    </dl>
                                    <dl>
                                        <dt>累计投资平台数(个)</dt>
                                        <dd>{!! $census['platform'] !!}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="filter-group">
                                <dl class="filter plat-filter">
                                    <dt>领取时间：</dt>
                                    <dd @if($search['date'] == 'all')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=all&amp;type=all&amp;platform=all">全部</a>
                                    </dd>
                                    <dd @if($search['date'] == '3days')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=3days&amp;type=all&amp;platform=all">近3天</a>
                                    </dd>
                                    <dd @if($search['date'] == '7days')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=7days&amp;type=all&amp;platform=all">近7天</a>
                                    </dd>
                                    <dd @if($search['date'] == '1month')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=1month&amp;type=all&amp;platform=all">近1个月</a>
                                    </dd>
                                </dl>
                                <dl class="filter plat-filter">
                                    <dt>投资类型：</dt>
                                    <dd @if($search['type'] == 'all')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=all&amp;type=all&amp;platform=all">全部</a>
                                    </dd>
                                    <dd @if($search['type'] == 'ing')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=all&amp;type=ing&amp;platform=all">进行中</a>
                                    </dd>
                                    <dd @if($search['type'] == 'done')class="active" @endif>
                                        <a href="{!! config('app.account_url') !!}/platforms/analysis.html?date=all&amp;type=done&amp;platform=all">已完成</a>
                                    </dd>
                                </dl>
                                <dl class="filter project-origin noborder" style="height: 76px;">
                                    <dt>投资平台：</dt>
                                    <dd @if($search['platform'] == 'all')class="active" @endif>
                                        <a href="{!! url('platforms/analysis.html') !!}?date=all&amp;type=all&amp;platform=all">全部</a>
                                    </dd>
                                    @foreach($corps as $cv)
                                    <dd @if($search['platform'] == $cv->ename)class="active" @endif>
                                        <a href="{!! url('platforms/analysis.html') !!}?date=all&amp;type=all&amp;platform={!! $cv->ename !!}">{!! $cv->name !!}</a>
                                    </dd>
                                    @endforeach
                                </dl>
                                @if($corps->count() > 9)
                                <div class="filter-btn">
                                    <a href="javascript:;" class="btn filterBtnOpen" style="display: inline-block;">展开<i class="iconfont"></i></a>
                                    <a href="javascript:;" class="btn filterBtnClose" style="display: none;">收起<i class="iconfont"></i></a>
                                </div>
                               @endif
                            </div>
                            <!-- 分析结果start -->
                            <!-- 分析结果start -->
                            <div class="records-list-wrap">
                                <!-- 无记录  默认不显示  如需显示加style="display:table;"-->
                                <table class="table table-gray ucenter-table table-norecord">
                                    <thead>
                                    <tr>
                                        <th width="86" class="first-col">平台名称</th>
                                        <th width="150">标的名称</th>
                                        <th width="100">投资(元)</th>
                                        <th width="100">收益(元)</th>
                                        <th width="120">领任务时间</th>
                                        <th width="75">年化率</th>
                                        <th width="85">天眼年化率</th>
                                        <th width="65">状态</th>
                                        <th width="65">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($lists))
                                        @foreach($lists as $lv)
                                        <tr>
                                            <td><a href="{!! config('app.url') . '/platform/' . $lv->corp->ename . '.html' !!}" target="_blank">{!! $lv->corp->name or '' !!}</a></td>
                                            <td>{!! $lv->task->title or '' !!}</td>
                                            <td>{!! $lv->price or '0.00' !!}</td>
                                            <td>{!! $lv->income or '0.00' !!}</td>
                                            <td>{!! $lv->created_at or '--' !!}</td>
                                            <td>{!! $lv->receive->ratio or '0.00' !!}%</td>
                                            <td>{!! $lv->receive->mratio or '0.00' !!}%</td>
                                            <td>
                                                @if($lv->status ==0)待审核@endif
                                                @if($lv->status ==1)已完成@endif
                                                @if($lv->status ==2)已驳回@endif
                                            </td>
                                            <td>
                                                <a href="{!! config('app.account_url') !!}/networth/show/{!! $lv->id or ''!!}" class="btn btn-blue btn-allwidth">查看</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    @if(empty($lists))
                                        <tr class="norecord">
                                            <td colspan="9">账户中没有符合条件的记录！</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- 查询结果end -->
                            <!-- 查询结果end -->
                            <!-- 翻页start -->
                            <div class="flip-wrap">
                                <div class="pagination">{!! $pageHtml or '' !!}</div>
                            </div>
                            <!-- 翻页end -->
                            <div class="tip tab-rules">
                                <h3 class="title-indent">天眼投年化率说明：</h3>
                                <div class="tip-main">
                                    <ul class="tab-content">
                                        <li>1. 通过本平台进行相应的投资。</li>
                                        <li>2. 投资完成后，进入个人中心 - 投资管理 - 投资记录 进行交任务。
                                        </li>
                                        <li>3. 平台审核后，派发天眼投的年化率用户收益！
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/filterEllipsis.js"></script>
    <script language="javascript">
        filterEllipsis('.project-origin',19,76);
    </script>
@stop