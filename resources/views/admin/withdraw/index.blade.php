@extends('admin.common.layout')
@section('title')提现管理@stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('user') !!}">用户管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('user/withdraw') !!}">提现管理</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">提现列表</a></p>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='65'>用户名</th>
                            <th width='65'>开户名</th>
                            <th width='100'>开户银行</th>
                            <th width='100'>省/市</th>
                            <th width="100">支行名称</th>
                            <th width="150">卡号</th>
                            <th width="80">金额</th>
                            <th width="80">手续费</th>
                            <th width="80">提现时间</th>
                            <th width="80">状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists as $wv)
                            <tr>
                                <td>{!! $wv->user->username or ''!!}</td>
                                <td>{!! $wv->bank->hold_name or ''  !!}</td>
                                <td>{!! $wv->bank->bank_name or ''  !!}</td>
                                <td>{!! $wv->bank->province or ''  !!}/{!! $wv->bank->city or ''  !!}</td>
                                <td>{!! $wv->bank->branch_name or ''  !!}</td>
                                <td>{!! $wv->bank->cardno or ''  !!}</td>
                                <td>{!! $wv->price or 0.00 !!}</td>
                                <td>{!! $wv->commission or 0.00 !!}</td>
                                <td>{!! date('m/d',strtotime($wv->created_at))  !!}</td>
                                <td>{!! $wv->status == 0 ? '申请中' :  ($wv->status == 1) ? '已派发':'拒绝派发'  !!}</td>
                                <td>
                                    <a href="{!! url('withdraw/create',['id'=>$wv->id]) !!}">审核</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@stop
