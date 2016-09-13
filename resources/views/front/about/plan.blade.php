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
            <h2>T盾计划</h2>
            <div class="content t-shield">
                <div class="style-quote">
                    <i class="l-quote"></i>
                    <i class="r-quote"></i>
                    <p>为确保投资人的资金安全，真正做到为用户的投资保驾护航，作为国内专业领先的P2P网贷垂直搜索引擎，天眼投首家推出了针对天眼投用户的投资保障计划——T盾计划。</p>
                </div>
                <div class="t-shield-detail">
                    <span class="fl">所有通过天眼投在合作平台进行投资的注册用户。只有通过天眼投到平台进行投资，在天眼投账号个人中心有记录的投资才能享受天眼投保障计划。</span>
                    <span class="fr" style="text-align: right;">天眼投提倡安全第一、分散投资。单个账户在投总金额超出100万的投资，不纳入保障计划。单个账户在同一平台在投总额超出10万的投资，不纳入保障计划。投资人需意识到投资风险，分散投资，做好资金的合理配置。</span>
                    <div class="para-img">
                        <img src="//static.touzhijia.com/images/about/t-shield.png?ver=20160431006">
                    </div>
                    <p>天眼投的合作平台都有相应的本息垫付制度，天眼投用户除了享受平台自有的本息垫付服务之外，还额外专享天眼投T盾计划的保障服务：</p>
                    <p>通过天眼投在合作平台进行投资的注册用户，如果遇到平台出现恶意倒闭、跑路的情况，在投资金额不超过1000元的部分，可享受T盾计划提供的全额赔付。</p>
                    <p>举例天眼投已接入N家合作平台，每个用户都可享受天眼投T盾计划提供的1000xN元的投资保障。随着天眼投合作平台的不断接入，T盾计划还将会为用户提供更多的有力保障。</p>
                    <p>通过天眼投在合作平台进行投资的注册用户，如果平台出现恶意倒闭、跑路的情况，导致投资无法收回，在投金额超过1000元的部分，享受T盾计划为用户提供1%的保障。</p>
                    <p>如，某投资人在A平台在投金额为2000元，如果A平台出现恶意倒闭、跑路的情况，则投资人可拿到1010元（1000+10）的赔付金额。</p>
                    <p>同时，天眼投还会全力帮助用户进行维权，向平台追讨债务。</p>
                </div>
            </div>
        </div>    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop