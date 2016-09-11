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
                        <p><a href="{!! url('news/single') !!}" class="at">单文章管理</a></p>
                        {{--<a href="{!! url('/news/create') !!}" class="buttonA">发布单文章</a>--}}
                    </div>
                    @if(!empty($lists))
                        <table class="client_cases" cellspacing="0">
                            <tr>
                                <th width="100">编号</th>
                                <th>分类标题</th>
                                <th width="160">创建时间</th>
                                <th width="80">操作</th>
                            </tr>
                            @foreach($lists as $cat)
                                <tr>
                                    <td>{!! $cat->id !!}</td>
                                    <td>{!! $cat->title !!}</td>
                                    <td>{!! $cat->created_at !!}</td>
                                    <td>
                                        <a href="{!! url('news/single/'.$cat->id) !!}">编辑</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="page">{!! $page or '' !!}</ul>
                    @else
                        <div class="navigation-page-none clearfix">
                            <p>{!!HTML::image('admin/images/u464.png')!!}您暂时没有发布任何文章!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop