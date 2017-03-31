@extends('layout.main')
@section('title'){!! $category->title or '' !!} - 关于我们 - 天眼投@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>{!! $category->title or '' !!}</h2>
            <div class="content activity">
                <div class="axis-box">
                    <div class="axis-line"><i class="icon-time"></i></div>
                    <div class="event-box">
                        @foreach($lists as $nv)
                        <h4><em>{!! date('m',strtotime($nv->created_at)) !!}月</em><br>{!! date('Y',strtotime($nv->created_at)) !!}年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! $nv->url($category->page) !!}" target="_blank">{!! $nv->title !!}</a></h3>
                                <span class="time">2016-02-27</span>
                                <a href="{!! $nv->url($category->page) !!}" target="_blank"><img src="{!! config('app.static_url') !!}/{!! $nv->image->name or '' !!}" alt="{!! $nv->title !!}" /></a>
                                <p>{!! $nv->article->content or '' !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
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