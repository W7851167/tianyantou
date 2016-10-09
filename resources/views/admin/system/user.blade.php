@extends('admin.common.layout')
@section('title')管理员管理@stop
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
                        <a href="{!! url('system') !!}">系统管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('system/user') !!}">管理员管理</a>
                    </div>
                </div>
                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">管理员列表</a></p>
                    <a href="{!! config('app.admin_url') !!}/system/uedit" class="buttonA">添加管理员</a>
                </div>
                <table class="all_shopping" cellspacing="0">
                    <tr>
                        <th width='80'>编号</th>
                        <th width='200'>用户名</th>
                        <th width="200">角色名称</th>
                        <th>操作</th>
                    </tr>
                    @foreach($lists as $uv)
                        <tr>
                            <td>{!! $uv->id !!}</td>
                            <td>{!! $uv->username !!}</td>
                            <td>{!! $uv->role->name or '' !!}</td>
                            <td>
                                <a href="{!! url('system/uedit',['id'=>$uv->id]) !!}">编辑</a>
                                <a href="{!! url('system/udelete',['id'=>$uv->id]) !!}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop
