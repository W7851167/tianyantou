@extends('layout.main')
@section('title'){!! $category->title or '' !!} - 关于我们 - 天眼投@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>{!! $category->title or '' !!}</h2>
            <div class="content dynamic">
                <div class="axis-box">
                    @foreach($lists as $nv)
                    <div class="media-box media-left">
                        <a href="{!! $nv->url($category->page) !!}" target="_blank"><img src="{!! config('app.static_url') !!}/{!! $nv->image->name or '' !!}"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! $nv->url($category->page) !!}" target="_blank">{!! $nv->title !!}</a></h3>
                            <span>{!! $nv->created_at !!}</span><span>来源：天眼投</span>
                            <p>{!! strip_tags($nv->article->content) !!}<a class="toggle" href="{!! $nv->url($category->page) !!}" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    @endforeach
                    <div class="media-box media-left">
                        <a href="https://www.touzhijia.com/about/dynamic/3041.html" target="_blank"><img src="http://static.tianyantou.com/upload/image/20160503/1462271751.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/dynamic/3041.html" target="_blank">互金潮起潮落  仍是吸金重地</a></h3>
                            <span>2016-05-03 18:35:51</span><span>来源：天眼投</span>
                            <p>近日，蚂蚁金服融资刷爆了朋友圈，B轮融资拿到45亿美元，为全球互联网公司最大笔私募融资。其整体估值高达600亿美元，已经超过阿里巴巴美国刚上市时的市值。<a class="toggle" href="https://www.touzhijia.com/about/dynamic/3041.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="pagination" data-pagination-ref="dynamic">
                        <a class="curr">1</a><a href="dynamic?page=2" data-ci-pagination-page="2">2</a>
                        <a href="dynamic?page=3" data-ci-pagination-page="3">3</a>
                        <a href="dynamic?page=2" data-ci-pagination-page="2"><span class="next">&#xe660;</span></a>
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