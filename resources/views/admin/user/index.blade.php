@extends('admin.common.layout')
@section('title')用户管理@stop
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
                        <a href="{!! url('user') !!}">用户列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">用户列表</a></p>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='65'>用户名</th>
                            <th width='65'>手机认证</th>
                            <th width='65'>邮箱认证</th>
                            <th width='65'>身份认证</th>
                            <th width="100">总资产</th>
                            <th width="100">钱包</th>
                            <th width="100">冻结返利</th>
                            <th width="100">冻结提现</th>
                            <th width="100">积分</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists as $uv)
                            <tr>
                                <td>{!! $uv->username !!}</td>
                                <td>{!! !empty($uv->mobile) ? '已认证':'未认证' !!}</td>
                                <td>{!! !empty($uv->email) ? '已认证':'未认证' !!}</td>
                                <td>{!! !empty($uv->idno) ? '已认证':'未认证' !!}</td>
                                <td>{!! $uv->money->total or 0.00!!}</td>
                                <td>{!! $uv->money->money or 0.00 !!}</td>
                                <td>{!! $uv->money->rebate or 0.00!!}</td>
                                <td>{!! $uv->money->withdraw or 0.00!!}</td>
                                <td>{!! $uv->money->score or 0.00!!}</td>
                                <td>
                                    <a href="{!! url('user/score',['id'=>$uv->id]) !!}">添加积分</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@stop
