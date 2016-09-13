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
            <h2>投资攻略</h2>
            <div class="content strategy">
                <ul class="news-list">                <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3127.html" target="_blank">别随便查征信，会影响申卡下卡率？</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3124.html" target="_blank">《全国住房公积金2015年年度报告》发布，住房公积金隐藏多少玄机？</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3122.html" target="_blank">止损还是分散投资？快跟这些动物学理财</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3117.html" target="_blank">没有存在感？赶紧提高你的核心竞争力吧！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3116.html" target="_blank">8招助你成为千万富翁（已经过亿的勿看~）</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3115.html" target="_blank">那么多隐性富豪城市 其实你不非得扎在北上广！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3111.html" target="_blank">不买房的你 能拿公积金怎么用？</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3110.html" target="_blank">你比月薪万元以上人差在哪？</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3108.html" target="_blank">会花这些钱 你将赚得更多！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3106.html" target="_blank">最低工资标准里的那些门道 看懂了让你每月多赚一两万！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3105.html" target="_blank">养成这七大习惯  你也是大富翁！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3104.html" target="_blank">越早做到这些  你不工作也不愁钱花！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3103.html" target="_blank">不要提前还贷 你能多出一套房！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3102.html" target="_blank">六月了 你的工资因为这些而增加！</a></li>
                    <li><i class="iconfont">&#xe672;</i><a href="https://www.touzhijia.com/about/strategy/3100.html" target="_blank">从超市技巧看生活门道</a></li>
                    <div class="pagination" data-pagination-ref="strategy"><a class="curr">1</a><a href="strategy?page=2" data-ci-pagination-page="2">2</a><a href="strategy?page=3" data-ci-pagination-page="3">3</a><a href="strategy?page=2" data-ci-pagination-page="2"><span class="next">&#xe660;</span></a></div>    </ul>  </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop