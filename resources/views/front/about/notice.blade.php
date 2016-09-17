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
                            <p>{!! strip_tags($nv->article->content) !!}<a class="toggle" href="{!! $nv->url($category->page) !!}" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination" data-pagination-ref="notice">
                        <a class="curr">1</a>
                        <a href="notice?page=2" data-ci-pagination-page="2">2</a>
                        <a href="notice?page=3" data-ci-pagination-page="3">3</a>
                        <a href="notice?page=2" data-ci-pagination-page="2"><span class="next">&#xe660;</span></a>
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