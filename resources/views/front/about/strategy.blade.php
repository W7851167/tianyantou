@extends('layout.main')
@section('title'){!! $category->title or '' !!} - 关于我们 - 天眼投@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>{!! $category->title or '' !!}</h2>
            <div class="content strategy">
                <ul class="news-list">
                    @foreach($lists as $nv)
                    <li><i class="iconfont">&#xe672;</i><a href="{!! $nv->url($category->page) !!}" target="_blank">{!! $nv->title !!}</a></li>
                    @endforeach
                    <div class="pagination" data-pagination-ref="strategy">
                        <a class="curr">1</a>
                        <a href="strategy?page=2" data-ci-pagination-page="2">2</a>
                        <a href="strategy?page=3" data-ci-pagination-page="3">3</a>
                        <a href="strategy?page=2" data-ci-pagination-page="2"><span class="next">&#xe660;</span></a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop