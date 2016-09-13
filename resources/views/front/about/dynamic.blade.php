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
            <h2>行业动态</h2>
            <div class="content dynamic">
                <div class="axis-box">                <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3126.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160624/1466763523.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3126.html" target="_blank">牵手国诚金融 浙商银行首家P2P资金存管上线</a></h3>
                            <span>2016-06-24 18:18:43</span><span>来源：投之家</span>
                            <p>6月24日，上海老品牌国诚金融与浙商银行合作，正式接入银行资金存管系统并面向平台所有用户进行公测，成为业内首批完成银行资金存管的平台之一。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3126.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3123.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160623/1466676088.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3123.html" target="_blank">e速贷冲击波 网贷投机者的镇魂曲</a></h3>
                            <span>2016-06-23 18:01:28</span><span>来源：投之家</span>
                            <p>同一平台上的不同产品，风险和预期收益都是有差异的，想要更高的收益率，就要承担更高的风险；想要更高的安全性，就选择更稳健的产品。投资人选择优秀的网贷产品，才能更好地规避风险；平台和行业需要优秀的网贷产品，才会有竞争力。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3123.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3121.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160622/1466564332.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3121.html" target="_blank">P2P门店大收缩 如何破题资产荒？</a></h3>
                            <span>2016-06-22 10:58:52</span><span>来源：投之家</span>
                            <p>徐红伟对21世纪经济报道记者表示，当下银行仍然极少会提供10万元以下的信贷服务，这为网贷平台提供了广阔的空间。许多平台通过将原来的抵押贷款向消费金融领域拓展，与美容院等消费场景开展合作，或者在供应链金融上发力，在汽车消费...<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3121.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3081.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160513/1463131843.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3081.html" target="_blank">万达将目光聚焦场景  或将引发新一轮风潮</a></h3>
                            <span>2016-05-13 17:30:43</span><span>来源：投之家</span>
                            <p>早在今年2月，上海九百股份有限公司发布公告称，拟以人民币10,568.82万元的价格，向上海万达网络金融服务有限公司（下称“万达金融”）转让上海海鼎信息工程股份有限公司（下称“上海海鼎”）522.1万股股权。5月12日，据网易科技报道，万...<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3081.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3076.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160511/1462963491.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3076.html" target="_blank">又一记重磅：界不能随便跨！</a></h3>
                            <span>2016-05-11 18:44:51</span><span>来源：投之家</span>
                            <p>据报道，证监会叫停上市公司跨界定增（募集资金、收购），涉及互联网金融、游戏、影视、VR四个行业。同时，这四个行业的并购重组和再融资也被叫停。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3076.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3058.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160509/1462783573.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3058.html" target="_blank">国家级互金服务平台启动  信息资源或将实现共享</a></h3>
                            <span>2016-05-09 16:46:13</span><span>来源：投之家</span>
                            <p>在金融大圈里，信息资源是极为重要的。目前，互联网金融企业正在受到监管层前所未有的“关注”，对于互金行业中的信息资源管理问题，也一直是业内人士考虑的重点。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3058.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3056.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160506/1462529435.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3056.html" target="_blank">P2P触底反弹 生命力更加顽强</a></h3>
                            <span>2016-05-06 18:10:35</span><span>来源：投之家</span>
                            <p>乱世出英雄，P2P在一路打压中茁壮成长，生命力比起其他金融业务，似乎更加顽强持久。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3056.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3052.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160505/1462440976.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3052.html" target="_blank">最严广告法来了 P2P还能怎么活？</a></h3>
                            <span>2016-05-05 17:36:16</span><span>来源：投之家</span>
                            <p>有人的地方就有江湖，而有广告自然就有伤害。继深圳市公安部门将网贷平台信息预先纳入监管、探索建立P2P网贷平台黑名单制度等多项举措后，深圳商报记者注意到，近日来，关于P2P广告宣传这一块也被纳入“严管”范围里了。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3052.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3048.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160504/1462352898.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3048.html" target="_blank">网贷数据看涨 终于不用再背黑锅了！</a></h3>
                            <span>2016-05-04 17:08:18</span><span>来源：投之家</span>
                            <p>在互联网金融的大环境中，P2P网贷从上线之日起，就一直饱受争议。P2P网贷因早期野蛮生长时留下了“刻板”印象, 这一“原罪”时至今日仍在被反复吊打。但无论从投资人数、投资金额、问题平台占比、涉案平台规模等量化数据来看，P2P网贷最坏...<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3048.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="media-box media-left">
                        <a href="{!! config('app.url') !!}/about/dynamic/3041.html" target="_blank"><img src="//static.touzhijia.com/upload/image/20160503/1462271751.jpg?ver=20160431006"></a>
                        <div class="axis-info">
                            <h3 class="title-gray-bold"><a href="{!! config('app.url') !!}/about/dynamic/3041.html" target="_blank">互金潮起潮落  仍是吸金重地</a></h3>
                            <span>2016-05-03 18:35:51</span><span>来源：投之家</span>
                            <p>近日，蚂蚁金服融资刷爆了朋友圈，B轮融资拿到45亿美元，为全球互联网公司最大笔私募融资。其整体估值高达600亿美元，已经超过阿里巴巴美国刚上市时的市值。<a class="toggle" href="{!! config('app.url') !!}/about/dynamic/3041.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="pagination" data-pagination-ref="dynamic"><a class="curr">1</a><a href="dynamic?page=2" data-ci-pagination-page="2">2</a><a href="dynamic?page=3" data-ci-pagination-page="3">3</a><a href="dynamic?page=2" data-ci-pagination-page="2"><span class="next">&#xe660;</span></a></div>    </div>  </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop