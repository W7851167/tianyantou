@extends('layout.main')
@section('title')
    {!! $category->title or '' !!} - 关于我们 - 天眼投
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>网站公告</h2>
            <div class="content notice">
                <div class="axis-box">
                    <div class="axis-line"></div>
                    @foreach($lists as $nv)
                    <div class="notice-box">
                        <span>{!! date('Y-m-d',strtotime($nv->created_at)) !!}</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="{!! $nv->url($category->page) !!}" title="{!! $nv->title !!}" target="_blank">{!! $nv->title !!}</a></h3>
                            <p>{!! str_limit(strip_tags($nv->article->content),150) !!}<a class="toggle" href="{!! $nv->url($category->page) !!}" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination" data-pagination-ref="notice">
                        {!! $pageHtml !!}
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