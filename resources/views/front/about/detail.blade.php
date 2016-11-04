@extends('layout.main')
@section('title')
    {!! $category->title or '' !!} - {!! $news->title or '' !!}
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        <ul class="main-nav">
            <span>当前位置：</span>
            <li><a href="{!! config('app.url') !!}">首页</a></li>
            <li><a href="{!! config('app.url') !!}/about/">关于我们</a></li>
            <li class="nav-location">{!! $category->title or '平台动态' !!}</li>
        </ul>
        <div class="r-side-menu nav-follow">
            <h2>关于我们</h2>
            <ul class="first-menu">
                @foreach($categorys as $cv)
                    <li @if(!empty($category->page)  && $cv->page == $category->page) class="active" @endif><a href="{!! config('app.url') !!}/about/{!! $cv->page !!}.html"><i class="iconfont" >{!! $cv->iconfont !!}</i>{!! $cv->title !!}</a></li>
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
                @if(!empty($first) or !empty($next))
                <div class="prev-next">
                    <span class="prev">上一篇：
                        @if(!empty($first))
                        <a href="{!! url('about/'.$category->page . '/' . $first->id . '.html') !!}" title="{!! $first->title or ''!!}">{!! $first->title or '' !!}</a>
                            @else
                            无
                        @endif
                    </span>
                    <span class="next">下一篇：
                        @if(!empty($next))
                            <a href="{!! url('about/'.$category->page . '/' . $next->id . '.html') !!}" title="{!! $next->title or ''!!}">{!! $next->title or '' !!}</a>
                        @else
                            无
                        @endif
                    </span>
                </div>
                @endif
            </div>
        </div>
</div>
</div>
<!--BODY END-->
@stop

@section('script')
@include('front.about.script')
@stop