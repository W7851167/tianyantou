@extends('layout.main')
@section('title')
    {!! $category->title or '' !!} - 关于我们 - 天眼投
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        <ul class="main-nav">
            <span>当前位置：</span>
            <li><a href="{!! config('app.url') !!}">首页</a></li>
            <li><a href="{!! config('app.url') !!}/about/">关于我们</a></li>
            <li class="nav-location">{!! $category->title or '平台动态'!!}</li>
        </ul>
        <div class="r-side-menu nav-follow">
            <h2>关于我们</h2>
            <ul class="first-menu">
                @foreach($categorys as $cv)
                    <li @if($cv->page == $category->page)class="active"@endif><a href="{!! config('app.url') !!}/about/{!! $cv->page !!}.html"><i class="iconfont" >{!! $cv->iconfont !!}</i>{!! $cv->title !!}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="main tworow" style="min-height: 852px;">
            <div class="content detail">
                <div class="news-title">
                    <h3 class="title-gray-bold">{!! $news->title or '' !!}</h3>
                    <div class="timebar">
                        <span class="time">发布时间：{!! $news->created_at !!}</span>
                        <span>浏览：<em>{!! $news->views or 0 !!}</em></span>
                    </div>
                </div>
                {!! $news->article->content or '' !!}
                <div class="prev-next">
                    <span class="prev">上一篇：<a href="https://www.touzhijia.com/about/notice/3188.html" title="骏业日新，投之家迁新家啦">骏业日新，投之家迁新家啦</a></span>
                    <span class="next">下一篇：无</span>
                </div>
            </div>
        </div>
</div>
</div>
<!--BODY END-->
@stop

@section('script')
@include('front.about.script')
@stop