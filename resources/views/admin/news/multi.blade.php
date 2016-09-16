@extends('admin.common.layout')
@section('title')文章管理@stop
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
                    <a href="{!! url('/news') !!}">列表文章</a>
                </div>
                <div class="content-right-page">
                    <div class="content-right-tit clearfix">
                        <p><a href="{!! url('news/multi') !!}" {!! Input::get('category')?'':'class="at"' !!}>所有资讯</a></p>
                        @if(!empty($categorys))
                            @foreach($categorys as $cat)
                             <p><a href="{!! url('news/multi?category=' . $cat->id) !!}" {!! $cat->id==Input::get('category')? 'class="at"' :'' !!}>{!! $cat->title !!}</a></p>
                            @endforeach
                        @endif
                        <a href="{!! url('/news/multi/create') !!}" class="buttonA">发布文章</a>
                    </div>
                    @if(count($lists)>0)
                        <table class="client_cases" cellspacing="0">
                            <tr>
                                <th width="100">编号</th>
                                <th>文章标题</th>
                                <th>分类标题</th>
                                <th width="160">创建时间</th>
                                <th width="80">操作</th>
                            </tr>
                            @foreach($lists as $nv)
                                <tr>
                                    <td>{!! $nv->id !!}</td>
                                    <td>{!! $nv->title !!}</td>
                                    <td>{!! $nv->categoryName($nv->category_id) !!}</td>
                                    <td>{!! $nv->created_at !!}</td>
                                    <td>
                                        <a href="{!! url('news/multi/create/'.$nv->id) !!}">编辑</a>
                                        <a href="{!! url('news/del/'.$nv->id) !!}">删除</a>
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