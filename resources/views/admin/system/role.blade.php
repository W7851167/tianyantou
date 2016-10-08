@extends('admin.common.layout')
@section('title')系统管理@stop
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
                        <a href="{!! url('system/roles') !!}">权限管理</a>
                    </div>
                </div>
                <div class="content-right-page">
                    <div class="content-right-tit clearfix">
                        <p><a href="javascript:void(0)" class="at">角色列表</a></p>
                        <a href="{!! url('system/redit') !!}" class="buttonA">添加角色</a>
                    </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='80'>ID</th>
                            <th width="200">角色名称</th>
                            <th width="400">描述</th>
                            <th width="80">默认组</th>
                            <th>操作</th>
                        </tr>
                        @if(!empty($lists))
                            @foreach($lists as $lv)
                                <tr>
                                    <td>{!! $lv->id !!}</td>
                                    <td>{!! $lv->name !!}</td>
                                    <td>{!! $lv->intro !!}</td>
                                    <td>{!! $lv->is_default == 1 ? '默认组':'非默认组' !!}</td>
                                    <td>
                                        @if($lv->is_default == 1)
                                            <a href="{!! url('system/redit',['id'=>$lv->id]) !!}">编辑</a>
                                            @else
                                        <a href="{!! url('system/redit',['id'=>$lv->id]) !!}">编辑</a>
                                        <a href="{!! url('system/rdelete',['id'=>$lv->id]) !!}">删除</a>
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    <ul class="page_info page">
                        {!! $page or '' !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
