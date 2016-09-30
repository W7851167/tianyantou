@extends('layout.main')
@section('title')网贷记账@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 917px;">
                <div class="main-inner">
                    <div class="cont-box-wrap">
                        <a class="btn btn-blue-o btn-s" style="float:right" href="{!! config('app.account_url') !!}/book/create" data-toggle="modal">记一笔</a>
                    </div>
                    <h1 class="section-title">记账列表</h1>
                    <div id="autoreserve_records">
                        <table class="table table-blue table-bordered ucenter-table" style="font-size:13px;">
                            <thead>
                            <tr>
                                <th>投资平台</th>
                                <th>项目名称</th>
                                <th>起息日期</th>
                                <th>投资金额</th>
                                <th>预期利息</th>
                                <th>期限</th>
                                <th>实际年化</th>
                                <th>返现奖励</th>
                                <th>折扣奖励</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($lists) > 0)
                                @foreach($lists as $bv)
                            <tr>
                                <td>{!! $bv->corp_name ?: '--' !!}</td>
                                <td>{!! $bv->task_name ?: '--' !!}</td>
                                <td>{!! $bv->start_time ?: '--' !!}</td>
                                <td>{!! $bv->money or '0.00' !!}</td>
                                <td>{!! isset($bv->stats['interest']) ? sprintf('%.2f',$bv->stats['interest']) : 0 !!}</td>
                                <td>{!! $bv->term or '--' !!}@if($bv->term_unit==0){!! $bv->term ?'个月':'' !!}@elseif($bv->term_unit==1){!! $bv->term ?'日':'' !!}@endif</td>
                                <td>{!! isset($bv->stats['rate']) ?  sprintf('%.2f',$bv->stats['rate']*100) : 0 !!}%</td>
                                <td>{!! $bv->reward ?: '--' !!}</td>
                                <td>{!! $bv->discount ?: '--' !!}</td>
                                <td>
                                    <a href="{!! url('book/create',['id'=>$bv->id]) !!}" class="btn btn-blue btn-allwidth">编辑</a>
                                    <a href="{!! url('book/delete',['id'=>$bv->id]) !!}" class="btn btn-blue btn-allwidth">删除</a>
                                </td>
                            </tr>
                                @endforeach
                            @else
                            <tr class="norecord">
                                <td colspan="10">
                                    您还没有记账信息
                                </td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="pagination" data-pagination-ref="autoreserve_records"></div>
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
