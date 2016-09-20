@extends('layout.main')
@section('title')交任务@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 863px;">
                <div class="main-inner">
                    <h1 class="section-title">提交投标</h1>
                    <div class="active">
                        <div class="tab-content tab-content-table">
                            <div id="networth_records_1">
                                <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                    <thead>
                                    <tr>
                                        <th width="120">任务名称</th>
                                        <th width="120">投资人用户姓名</th>
                                        <th width="120">注册投资手机号</th>
                                        <th width="90">投资金额(元)</th>
                                        <th width="140">投标期限</th>
                                        <th width="64">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($receiveModel->achieves))
                                        @foreach($receiveModel->achieves as $av)
                                        <tr class="record">
                                            <td>{!! $receiveModel->task->title or '' !!}</td>
                                            <td>{!! $av->realname or '' !!}</td>
                                            <td>{!! $av->mobile or ''!!}</td>
                                            <td>{!! tmoney_format($av->price) !!}</td>
                                            <td>{!! $av->term or 0!!} {!! $av->task->term_unit == 0 ? '天' : ($av->task->term_unit == 1 ? '个月' : '年')!!}</td>
                                            <td><a href="{!! url('networth/delete',['id'=>$av->id]) !!}" class="btn btn-blue btn-allwidth">删除</a></td>
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
                    <div class="form-group bindbankcard">
                        <form id="bindbankcard" method="post" data-toggle="ajaxForm">
                            {!! csrf_field() !!}
                            <div class="control-group">
                                <label>投资编号</label>
                                <input type="text" class="input-style" name="data[order_sn]" value="">
                                <em>请添加投资人在平台投资的编号</em>
                            </div>
                            <div class="control-group">
                                <label for="real-name">真实姓名</label>
                                <input type="text" class="input-style" name="data[realname]" value="">
                                <em>请添加投资人用户姓名</em>
                            </div>
                            <div class="control-group">
                                <label>手机号码</label>
                                <input type="text" name="data[mobile]" class="input-style" value="">
                                <em>请添加投资人用户投资手机号码</em>
                            </div>
                            <div class="control-group">
                                <label>投资金额</label>
                                <input type="text" name="data[price]" class="input-style">
                                <em>请填写真实的投资金额</em>
                            </div>
                            <div class="control-group">
                                <label for="">投资时间</label>
                                <input type="text" name="data[term]" class="input-style" value=""onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
                                {!! $receiveModel->task->term_unit == 0 ? '天' : ($receiveModel->task->term_unit == 1 ? '个月' : '年')!!}
                                <em>请填写真实的投资时间</em>
                            </div>
                            <input type="submit" class="btn-blue btn-l btn-submit" value="提交">
                        </form>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1. 提交平台投资信息、投资人、投资手机号码、投资金额、投标时间等；</li>
                                <li><em>2. 提交后等待平台审核，审核通过后，根据天眼投年化率计算您的收入；</em></li>
                                <li>3. 审核通过，投资营收直接打入您的个人钱包账号中；</li>
                                <li>4. 进入提现操作，进行相应的提现操作。</li>
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
