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
            <h2>安全评级</h2>
            <div class="content">
                <p>天眼投所收录的平台，专业的线下考察团队会对其进行实地认证考察。根据实地认证考察的情况结合平台线上运营数据，对平台进行安全评级。</p>
                <div class="para-img">
                    <img src="http://static.tianyantou.com/images/about/safe-level.jpg?ver=20160431006">
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