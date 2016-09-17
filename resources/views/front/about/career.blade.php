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
            <h2>{!! $category->title or '' !!}</h2>
            <div class="content">
                {!! $category->article->content or '' !!}
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop