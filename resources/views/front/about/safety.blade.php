@extends('layout.main')
@section('style')
    <meta name="keywords" content="专家顾问，投之家专家顾问，投之家顾问团队，投之家理财投资平台">
    <meta name="description" content="投之家是国内领先的P2P网贷评级、选标和服务平台，为您提供精选多项P2P组合，分散投资债券理财，为投资者推荐优良的P2P选标和P2P投资服务。">
    <meta name="author" content="p2p网贷,p2p理财,投之家投资理财平台" />
    <meta name="searchtitle" content="p2p网贷,p2p理财,投之家投资理财平台" />
    <link rel="stylesheet" href="//static.touzhijia.com/css/css.css?ver=20160431006" />
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>安全评级</h2>
            <div class="content">
                <p>投之家所收录的平台，专业的线下考察团队会对其进行实地认证考察。根据实地认证考察的情况结合平台线上运营数据，对平台进行安全评级。</p>
                <div class="para-img">
                    <img src="//static.touzhijia.com/images/about/safe-level.jpg?ver=20160431006">
                </div>
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop