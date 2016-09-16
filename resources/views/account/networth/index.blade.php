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
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>赚取收益（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>待收笔数（笔）</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cont-box-wrap">
                        <div class="tab click-tab">
                            <ul class="tab-nav">
                                <li class="active"><a href="javascript:void(0);">进行中的任务</a></li>
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
                                                    <th width="90">完成金额(元)</th>
                                                    {{--<th width="80">待收本息(元)</th>--}}
                                                    <!--      <th>已收本息(元)</th>-->
                                                    <th width="140">提交任务时间</th>
                                                    {{--<th width="50">协议</th>--}}
                                                    <th width="45">状态</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($iLists)  > 0)
                                                    @foreach($iLists as $av)
                                                        <tr>
                                                            <td>{!! date('Y-m-d H:i:s',$av->create_time) !!}</td>
                                                            <td>{!! $av->corp->platform or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! $av->total or '0.00' !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->commit_time) !!}</td>
                                                            <td>@if($av->status==0)未审核 @elseif($av->status==1)已审核 @elseif($av->status==2)已完成 @else 审核驳回 @endif</td>
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
                                                    <th width="140">领取任务时间</th>
                                                    <th width="120">平台名称</th>
                                                    <th width="120">任务名称</th>
                                                    <th width="90">完成金额(元)</th>
                                                    <th width="140">提交任务时间</th>
                                                    <th width="45">状态</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($cLists) > 0)
                                                    @foreach($cLists as $av)
                                                        <tr>
                                                            <td>{!! date('Y-m-d H:i:s',$av->create_time) !!}</td>
                                                            <td>{!! $av->corp->platform or '' !!}</td>
                                                            <td>{!! $av->task->title or '' !!}</td>
                                                            <td>{!! $av->total or '0.00' !!}</td>
                                                            <td>{!! date('Y-m-d H:i:s',$av->commit_time) !!}</td>
                                                            <td>@if($av->status==0)未审核 @elseif($av->status==1)已审核 @elseif($av->status==2)已完成 @else 审核驳回 @endif</td>
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