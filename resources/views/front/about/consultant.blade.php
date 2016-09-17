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
            <h2>专家顾问</h2>
            <div class="content expert">
                <div class="axis-box">
                    <div class="axis-line"></div>
                    @foreach($lists as $nv)
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="{!! config('app.static_url').$nv->image->name !!}" width="168" height="168">
                            <span class="mask">{!! $nv->description !!}</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">{!! $nv->title or '' !!}</h3>
                            <p>{!! strip_tags($nv->article->content) !!}</p>
                        </div>
                    </div>
                    @endforeach
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