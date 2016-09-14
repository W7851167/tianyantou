@extends('admin.common.layout')
@section('title')友情链接@stop
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
                        <a href="{!! url('censu') !!}">数据统计&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript">友情链接</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">友情链接</a></p>
                    <a href="{!!url('link/create')!!}" class="buttonA">创建链接</a>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width="220">标题</th>
                            <th width="400">地址</th>
                            <th width="100">排序</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists  as $lv)
                            <tr>
                                <td>{!! $lv->name !!}</td>
                                <td>{!! $lv->url !!}</td>
                                <td>{!! $lv->sorts  or 0!!}</td>
                                <td>
                                    <a href="{!! url('link/create',['id'=>$lv->id]) !!}">编辑</a>
                                    <a href="{!! url('link/delete',['id'=>$lv->id]) !!}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                <ul class="page_info page">
                    {!! $pageHtml !!}
                </ul>
            </div>
        </div>
    </div>
@stop
