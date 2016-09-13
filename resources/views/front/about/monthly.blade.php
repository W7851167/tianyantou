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
            <h2>月度报告</h2>
            <div class="content monthly">
                <ul>
                    <li><a href="http://topics.touzhijia.com/monthly/201608"><img src="//static.touzhijia.com/images/about/monthly/20160801.jpg?ver=20160431006" alt="2016年8月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201607"><img src="//static.touzhijia.com/images/about/monthly/20160701.jpg?ver=20160431006" alt="2016年7月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201601-06"><img src="//static.touzhijia.com/images/about/monthly/20160715.jpg?ver=20160431006" alt="2016年半年报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201606"><img src="//static.touzhijia.com/images/about/monthly/20160601.jpg?ver=20160431006" alt="2016年6月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201605"><img src="//static.touzhijia.com/images/about/monthly/20160501.jpg?ver=20160431006" alt="2016年5月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201604"><img src="//static.touzhijia.com/images/about/monthly/20160401.jpg?ver=20160431006" alt="2016年4月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201603"><img src="//static.touzhijia.com/images/about/monthly/201603.jpg?ver=20160431006" alt="2016年3月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201602"><img src="//static.touzhijia.com/images/about/monthly/20160304.jpg?ver=20160431006" alt="2016年2月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201601"><img src="//static.touzhijia.com/images/about/monthly/201601.jpg?ver=20160431006" alt="2016年1月月报" /></a></li>
                    <li><a href="{!! config('app.url') !!}/annual/index.html"><img src="//static.touzhijia.com/images/about/monthly/20160115.jpg?ver=20160431006" alt="2015年年报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201511"><img src="//static.touzhijia.com/images/about/monthly/20151203.jpg?ver=20160431006" alt="2015年11月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201510"><img src="//static.touzhijia.com/images/about/monthly/20151103.jpg?ver=20160431006" alt="2015年10月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201509"><img src="//static.touzhijia.com/images/about/monthly/20151008.jpg?ver=20160431006" alt="2015年9月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201508"><img src="//static.touzhijia.com/images/about/monthly/20150902.png?ver=20160431006" alt="2015年8月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201507"><img src="//static.touzhijia.com/images/about/monthly/20150806.jpg?ver=20160431006" alt="2015年7月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201506"><img src="//static.touzhijia.com/images/about/monthly/20150708.jpg?ver=20160431006" alt="2015年6月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201505"><img src="//static.touzhijia.com/images/about/monthly/20150608.jpg?ver=20160431006" alt="2015年5月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201504"><img src="//static.touzhijia.com/images/about/monthly/20150508.jpg?ver=20160431006" alt="2015年4月月报" /></a></li>
                    <li><a href="http://topics.touzhijia.com/monthly/201503"><img src="//static.touzhijia.com/images/about/monthly/20150408.jpg?ver=20160431006" alt="2015年3月月报" /></a></li>
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