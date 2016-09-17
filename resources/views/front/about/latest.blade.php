@extends('layout.main')
@section('title'){!! $category->title or '' !!} - 关于我们 - 天眼投@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>{!! $category->title or '' !!}</h2>
            <div class="content latest">
                <div class="axis-box">
                    @foreach($lists as $nv)
                    <div class="media-box media-left">
                        <a href="{!! $nv->url($category->page) !!}" target="_blank"><img src="{!! config('app.static_url') !!}/{!! $nv->image->name or '' !!}"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! $nv->url($category->page) !!}" target="_blank">{!! $nv->title or '' !!}</a></h3>
                            <span>{!! $nv->created_at or '' !!}</span><span>来源：天眼投</span>
                            <p>{!! strip_tags($nv->article->content) !!}<a class="toggle" href="{!! $nv->url($category->page) !!}" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination" data-pagination-ref="latest">
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