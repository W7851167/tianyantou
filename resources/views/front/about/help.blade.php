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
            <h2>帮助中心</h2>
            <div class="content help">
                <div class="tab click-tab">
                    <ul class="tab-nav">
                        @foreach($hCategorys as $key => $hc)
                        <li id="faq{!! (1+$key) !!}" @if($key==0)class="active"@endif><a style="text-align:left;">{!! $hc->title !!}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-main">
                        @foreach($hCategorys as $key => $hv)
                        <div class="help-box @if($key==0)active @endif">
                            <ul class="first-menu">
                                @if(count($hv->news)>0)
                                    @foreach($hv->news as $k => $nv)
                                <li id="faq{!! (1+$key) !!}_{!! (1+$k) !!}" name="faq{!! (1+$key) !!}_{!! (1+$k) !!}">
                                    <i class="iconfont">&#xe672;</i>
                                    <h3>{!! $nv->title or '' !!}</h3>
                                    {!! $nv->article->content or '' !!}
                                </li>
                                    @endforeach
                                @endif
                            </ul>
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