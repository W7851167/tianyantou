@extends('layout.main')
@section('title'){!! $category->title or '' !!} - 关于我们 - 天眼投@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>{!! $category->title or '' !!}</h2>
            <div class="content event">
                <div class="axis-box">
                    <div class="axis-line"></div>
                    @foreach($lists as $key => $nv)
                    <div class="axis-info left-box @if($key%5==0)yellow-box @elseif($key%1==0)pink-box @elseif($key%2==0)red-box @elseif($key%3==0)blue-box @elseif($key%4==0)green-box @endif" id="month-{!! $nv->id !!}">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">{!! date('Y',strtotime($nv->created_at)) !!}.{!! date('m',strtotime($nv->created_at)) !!}</span></div>
                        <div class="event-box">
                            <ul>
                                {!! $nv->article->content or '' !!}
                            </ul>
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