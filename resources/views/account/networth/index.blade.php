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
                                <li class=""><a href="javascript:void(0);">待审核的任务</a></li>
                                <li class=""><a href="javascript:void(0);">已审核的任务</a></li>
                                <li class=""><a href="javascript:void(0);">已驳回的任务</a></li>
                                <li class=""><a href="javascript:void(0);">已完成的任务</a></li>
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
                                                    <th width="65">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($lists0)  > 0)
                                                    @foreach($lists0 as $av)
                                                        <tr>
                                                            <td>{!! date('Y-m-d H:i:s',$av->create_time) !!}</td>
                                                            <td>{!! $av->corp->name or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! $av->ratio !!}%</td>
                                                            <td>{!! $av->mratio !!}%</td>
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
                                <div class="">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_2">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                <tr>
                                                    <th width="120">平台名称</th>
                                                    <th width="120">任务名称</th>
                                                    <th width="90">完成金额(元)</th>
                                                    <th width="90">收益(元)</th>
                                                    <th width="140">提交任务时间</th>
                                                    <th width="65">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($lists2) > 0)
                                                    @foreach($lists2 as $av)
                                                        <tr>
                                                            <td>{!! $av->corp->name or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! tmoney_format($av->total) !!}</td>
                                                            <td>{!! tmoney_format($av->income)   !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->commit_time) !!}</td>
                                                            <td><a href="{!! url('networth/create',['id'=>$av->id]) !!}" class="btn btn-blue btn-allwidth">查看</a></td>
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
                                            <div class="pagination" data-pagination-ref="networth_records_2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_2">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                <tr>
                                                    <th width="120">平台名称</th>
                                                    <th width="120">任务名称</th>
                                                    <th width="90">完成金额(元)</th>
                                                    <th width="90">收益(元)</th>
                                                    <th width="140">提交任务时间</th>
                                                    <th width="140">审核时间</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($lists1) > 0)
                                                    @foreach($lists1 as $av)
                                                        <tr>
                                                            <td>{!! $av->corp->name or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! tmoney_format($av->total) !!}</td>
                                                            <td>{!! tmoney_format($av->income)  !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->commit_time) !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->check_time) !!}</td>
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
                                            <div class="pagination" data-pagination-ref="networth_records_2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_2">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                <tr>
                                                    <th width="120">平台名称</th>
                                                    <th width="140">任务名称</th>
                                                    <th width="65">收益(元)</th>
                                                    <th width="140">驳回时间</th>
                                                    <th width="140">驳回原因</th>
                                                    <th width="65">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($lists3) > 0)
                                                    @foreach($lists3 as $av)
                                                        <tr>
                                                            <td>{!! $av->corp->name or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! tmoney_format($av->income)  !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->commit_time) !!}</td>
                                                            <td>{!! $av->intro or '' !!}</td>
                                                            <td><a href="{!! url('networth/create',['id'=>$av->id]) !!}" class="btn btn-blue btn-allwidth">查看</a></td>
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
                                            <div class="pagination" data-pagination-ref="networth_records_2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_4">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                <tr>
                                                    <th width="120">平台名称</th>
                                                    <th width="120">任务名称</th>
                                                    <th width="90">完成金额(元)</th>
                                                    <th width="90">收益(元)</th>
                                                    <th width="140">提交任务时间</th>
                                                    <th width="140">结束时间</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($lists4) > 0)
                                                    @foreach($lists4 as $av)
                                                        <tr>
                                                            <td>{!! $av->corp->name or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! tmoney_format($av->total) !!}</td>
                                                            <td>{!! tmoney_format($av->income)  !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->commit_time) !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->complete_time) !!}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="norecord">
                                                        <td colspan="7">
                                                            没有查询到相关记录
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                            <div class="pagination" data-pagination-ref="networth_records_4"></div>
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
                                <li>1.当有债权发生逾期时，投之家7个工作日内通过专项赎回基金向投资人先行全额赔付。</li>
                                <li>2.购买全网通不收取任何交易手续费。</li>
                                <li>3.发布全网通时，以0.01%*借款本金*借款天数作为居间服务费，其中居间服务费的50%注入投之家专项赎回基金。</li>
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