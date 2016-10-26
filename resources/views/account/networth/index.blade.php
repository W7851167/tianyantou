@extends('layout.main')
@section('title')投资记录@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 786px;">
                <div class="main-inner">
                    <h1 class="section-title">投资记录</h1>
                    <div class="cont-box-wrap">
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>待收总额（元）</dt>
                                    <dd>{!! tmoney_format($unIncome)!!}</dd>
                                </dl>
                                <dl>
                                    <dt>赚取收益（元）</dt>
                                    <dd>{!! tmoney_format($hasIncome)!!}</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>待收笔数（笔）</dt>
                                    <dd>{!! $unCount or 0!!}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cont-box-wrap">
                        <div class="tab click-tab">
                            <ul class="tab-nav">
                                <li class="active"><a href="javascript:void(0);">待提交的任务</a></li>
                            </ul>
                            <div class="tab-main">
                                <div class="active">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_1">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                    <th width="140">领取任务时间</th>
                                                    <th width="120">平台名称</th>
                                                    <th width="120">任务名称</th>
                                                    <th width="90">平台年化率</th>
                                                    <th width="140">天眼投年化率</th>
                                                    <th width="65">已交任务</th>
                                                    <th width="65">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($lists)  > 0)
                                                    @foreach($lists as $av)
                                                        <tr>
                                                            <td>{!! $av->created_at !!}</td>
                                                            <td>{!! $av->corp->name or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! $av->ratio or 0!!}%</td>
                                                            <td>{!! $av->mratio or 0!!}%</td>
                                                            <td>{!! $av->nums or 0 !!}</td>
                                                            <td><a href="{!! url('networth/create',['id'=>$av->id]) !!}" class="btn btn-blue btn-allwidth">完成任务</a></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="norecord">
                                                        <td colspan="6">
                                                            没有查询到相关记录
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                            <div class="pagination" data-pagination-ref="networth_records_1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示：</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1.用户提交任务7日前平台审核通过或驳回。</li>
                                <li>2.平台审核通过后7日平台自动发送收益款项。</li>
                                <li>3.用户收益，以天眼投年化率*借款本金*借款天数作为计算用户收益。</li>
                            </ul>
                        </div>
                    </div>
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
@stop