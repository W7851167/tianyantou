@extends('admin.common.layout')
@section('style')
    {!!HTML::style('admin/css/news.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('/news') !!}">文章管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('/dashboard') !!}">首页</a>
                </div>
                <div class="content-right-page">
                    <div class="content-right-tit clearfix">
                        <p><a href="{!! url('/news') !!}" class="at">所有文章</a></p>
                        <a href="{!! url('/news/create') !!}" class="buttonA">发布文章</a>
                    </div>
                    <table class="client_cases" cellspacing="0">
                        <tr>
                            <th width="100">编号</th>
                            <th>标题</th>
                            <th width="100">类型</th>
                            <th width="160">创建时间</th>
                            <th width="80">操作</th>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>title</td>
                            <td>dfsfds</td>
                            <td>2016-04-27 10:10:00</td>
                            <td>
                                <a href="{!! url('/news/edit/') !!}">编辑</a>
                                <a href="{!! url('/news/del/') !!}">删除</a>
                            </td>
                        </tr>
                    </table>
                    {{--                        <ul class="page">{!! $page !!}</ul>--}}
                    {{--@else--}}
                    {{--<div class="navigation-page-none clearfix">--}}
                    {{--<p>{!!HTML::image('cw100_b2b/images/u464.png')!!}您暂时没有发布任何客户案例!</p>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </div>
@stop