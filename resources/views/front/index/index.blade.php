@extends('layout.main')
@section('title') P2P网贷平台搜索引擎，一站式投资理财，给理财多一份安全保障 @stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/mainindex.css?ver={!! date("YmdHis",time()) !!}"/>
    @stop
@section('content')
    <div id="index-con" class="wrap">
        <div class="banner-box">
            <!-- 大轮播区 s-->
            <div class="banner-con">
                <div class="banner-play" id="banner-play-mod">
                    <div class="banner-play-con imgplaycon">
                        <a href="{!! config('app.topic_url') !!}/activities/anniversaryParty" title="梦想有礼，之家两周年庆"
                           target="_blank"><img
                                    src="//static.touzhijia.com/upload/image/banner/20160902/20160902114415_14070.jpg?ver=20160431006"
                                    alt="梦想有礼，之家两周年庆"/></a>
                        <a href="{!! config('app.topic_url') !!}/activities/anniversary" title="天眼投两周年庆暨A轮融资发布会"
                           target="_blank"><img
                                    src="//static.touzhijia.com/upload/image/banner/20160902/20160902145203_56236.png?ver=20160431006"
                                    alt="天眼投两周年庆暨A轮融资发布会"/></a>
                        <a href="{!! config('app.topic_url') !!}/monthly/201608" title="天眼投8月运营报告" target="_blank"><img
                                    src="//static.touzhijia.com/upload/image/banner/20160902/20160902190437_65949.jpg?ver=20160431006"
                                    alt="天眼投8月运营报告"/></a>
                        <a href="http://ask.touzhijia.com/question/77" title="天眼投两周年送好礼" target="_blank"><img
                                    src="//static.touzhijia.com/upload/image/banner/20160831/20160831211411_85242.png?ver=20160431006"
                                    alt="天眼投两周年送好礼"/></a>
                        <a href="{!! config('app.topic_url') !!}/newregister" title="新手注册享三重好礼" target="_blank"><img
                                    src="//static.touzhijia.com/upload/image/banner/20160831/20160831152615_97248.png?ver=20160431006"
                                    alt="新手注册享三重好礼"/></a>
                        <a href="{!! config('app.url') !!}/about/consultant.html" title="天眼投专家顾问团队" target="_blank"><img
                                    src="//static.touzhijia.com/upload/image/banner/20160418/20160418095418_13566.jpg?ver=20160431006"
                                    alt="天眼投专家顾问团队"/></a>
                    </div>
                    <a href="javascript:void(0);" class="perbtn"><i class="iconfont">&#xe65f;</i></a>
                    <a href="javascript:void(0);" class="nextbtn"><i class="iconfont">&#xe660;</i></a>

                    <p class="banner-nav imgnav"></p>

                    <div class="main-data">
                        <div class="main-data-show">
                            <p class="trading-volume">撮合成交量：<span class="data-num" datanum="8,533,635,487"></span>元</p>

                            <p class="user-number">累计用户数：<span class="data-num" datanum="2,498,399"></span>人</p>

                            <p class="earnings-num">累计产生收益：<span class="data-num" datanum="216,735,707"></span>元</p>

                            <p class="fund-num">专项赎回基金：<span class="data-num" datanum="13,109,942"></span>元</p>
                        </div>
                        <div class="main-data-mask"></div>
                    </div>
                </div>
            </div>

            <!-- 大轮播区 e-->
            <!-- 数据展示区 s-->
            <div class="data-con">
                <div class="honour-show">
                    <ul class="company-honour" id="honour-list">
                        <li>
                            <a href="{!! config('app.topic_url') !!}/financing.html" target="_blank">
                                <div class="honour-iconcon">
                                    <span class="honour-icon"></span>

                                    <p class="honour-title">
                                        <span>顶尖风投亿级融资</span>
                                    </p>
                                </div>
                                <p class="honourdetail honourdetail0">
                                    赛富、创东方助力<br/>新未来
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="{!! config('app.topic_url') !!}/honorwall.html" target="_blank">
                                <div class="honour-iconcon">
                                    <span class="honour-icon honour-icon0"></span>

                                    <p class="honour-title">
                                        <span>中国互联网金融协会</span>
                                    </p>
                                </div>
                                <p class="honourdetail honourdetail0">
                                    中国互联网金融协会<br/>会员单位
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="{!! config('app.topic_url') !!}/tplan.html" target="_blank">
                                <div class="honour-iconcon">
                                    <span class="honour-icon honour-icon1"></span>

                                    <p class="honour-title">
                                        <span>天眼投T盾计划</span>
                                    </p>
                                </div>
                                <p class="honourdetail honourdetail0">
                                    确保投资人资金安全<br/>为您的投资保驾护航
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="{!! config('app.url') !!}/about/latest/2274.html" target="_blank">
                                <div class="honour-iconcon">
                                    <span class="honour-icon honour-icon3"></span>

                                    <p class="honour-title">
                                        <span>CCTV等权威媒体采访</span>
                                    </p>
                                </div>
                                <p class="honourdetail honourdetail0">
                                    央视采访<br/>权威媒体报道
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="notice">
                    <h3 class="notice-title"><span><i class="iconfont">&#xe627;</i>&nbsp;&nbsp;公告</span> <a
                                href="{!! config('app.url') !!}/about/notice.html" target="_blank">更多>></a></h3>
                    <ul class="notice-list">
                        <li><a href="{!! config('app.url') !!}/about/notice/3188.html"
                               target="_blank">骏业日新，天眼投迁新家啦</a><span>09-05</span></li>
                        <li><a href="{!! config('app.url') !!}/about/notice/3187.html"
                               target="_blank">感恩回馈！天眼投“红包”全新上线</a><span>09-02</span></li>
                        <li><a href="{!! config('app.url') !!}/about/notice/3185.html"
                               target="_blank">关于暂停与国诚金融合作的公告</a><span>08-31</span></li>
                    </ul>
                </div>
            </div>
            <!-- 数据展示区 e-->
        </div>

        <div class="container">
            <!-- 推荐 s-->
            <div class="index-main-modcon">
                <ul class="platform-list-con">
                    <li>
                        <p class="platform-ad">
                            <a en-name="erongsuo" href="{!! config('app.url') !!}/platform/detail_erongsuo.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/erongsuo.jpg?ver=20160431006"
                                        height="129" width="294" alt="e融所"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_erongsuo.html" target="_blank"
                               class="plat-logo" title="e融所">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/201608081012379276.png?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="新手福利标160909X">新手福利标160909X </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>15.00</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>10</b><i>天</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>BBB</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：10,000 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-0']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='https://www.myerong.com/financing/sbtz/bdxq/1216.html'
                                   data-bid="1216"
                                   href="javascript:void(0);"
                                   data-en-name="erongsuo"
                                   data-invest-id="1216"
                                   title="新手福利标160909X"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="huitouwang" href="{!! config('app.url') !!}/platform/detail_huitouwang.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/huitouwang.jpg?ver=20160431006"
                                        height="129" width="294" alt="汇投网"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_huitouwang.html" target="_blank"
                               class="plat-logo" title="汇投网">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/2016071813583224369.jpg?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="新手专属-JQ201609075">新手专属-JQ20160907... </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>8.80</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>3</b><i>天</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>A</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：100,000 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-1']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='http://www.huitoubj.com/projects/project.html?code=TZ14734086302'
                                   data-bid="7876"
                                   href="javascript:void(0);"
                                   data-en-name="huitouwang"
                                   data-invest-id="7876"
                                   title="新手专属-JQ201609075"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="xinyongbao" href="{!! config('app.url') !!}/platform/detail_xinyongbao.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/xinyongbao.jpg?ver=20160431006"
                                        height="129" width="294" alt="信用宝"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_xinyongbao.html" target="_blank"
                               class="plat-logo" title="信用宝">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/2016042614212639089.jpg?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="信投宝_27848">信投宝_27848 </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>12.60</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>18</b><i>月</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>BB</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：12,238 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-2']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='https://www.xyb100.com/invest/xtb/27848?channel=61000'
                                   data-bid="xtb_27848"
                                   href="javascript:void(0);"
                                   data-en-name="xinyongbao"
                                   data-invest-id="xtb_27848"
                                   title="信投宝_27848"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="rxdai" href="{!! config('app.url') !!}/platform/detail_rxdai.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/rxdai.jpg?ver=20160431006"
                                        height="129" width="294" alt="投哪网"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_rxdai.html" target="_blank"
                               class="plat-logo" title="投哪网">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/2014112621334890473.jpg?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="年省心Ⅱ">年省心Ⅱ </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>10.50</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>18</b><i>月</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>A</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：230,000 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-3']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='http://www.touna.cn/monthLot-detail.html?id=16722'
                                   data-bid="smart_16722"
                                   href="javascript:void(0);"
                                   data-en-name="rxdai"
                                   data-invest-id="smart_16722"
                                   title="年省心Ⅱ"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="duanrongwang" href="{!! config('app.url') !!}/platform/detail_duanrongwang.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/duanrongwang.jpg?ver=20160431006"
                                        height="129" width="294" alt="短融网"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_duanrongwang.html" target="_blank"
                               class="plat-logo" title="短融网">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/2016080213010267196.jpg?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="车押宝C201605103">车押宝C201605103 </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>14.00</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>5</b><i>天</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>BBB</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：75,200 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-4']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='http://www.duanrong.com/loanDetail/160907140735969074'
                                   data-bid="160907140735969074"
                                   href="javascript:void(0);"
                                   data-en-name="duanrongwang"
                                   data-invest-id="160907140735969074"
                                   title="车押宝C201605103"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="zhubaodai" href="{!! config('app.url') !!}/platform/detail_zhubaodai.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/zhubaodai.jpg?ver=20160431006"
                                        height="129" width="294" alt="珠宝贷"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_zhubaodai.html" target="_blank"
                               class="plat-logo" title="珠宝贷">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/2015041617455587746.jpg?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="珠宝贷201609090035">珠宝贷201609090035 </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>13.00</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>6</b><i>月</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>AA</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：3,900,000 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-5']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='https://secure.zhubaodai.com/investmentDetail/investmentDetails/'
                                   data-bid="JK16090919377881"
                                   href="javascript:void(0);"
                                   data-en-name="zhubaodai"
                                   data-invest-id="JK16090919377881"
                                   title="珠宝贷201609090035"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="huiyingdai" href="{!! config('app.url') !!}/platform/detail_huiyingdai.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/huiyingdai.jpg?ver=20160431006"
                                        height="129" width="294" alt="汇盈金服"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_huiyingdai.html" target="_blank"
                               class="plat-logo" title="汇盈金服">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/20150804140609844.jpg?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="潍坊市徐先生个人房产抵押借款第一期【共四期】">潍坊市徐先生个人房产抵押借款第... </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>13.00</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>6</b><i>月</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>BBB</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：400,000 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-6']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='http://www.hyjf.comproject/getProjectDetail.do?borrowNid=ZXH160904801.html'
                                   data-bid="ZXH160904801"
                                   href="javascript:void(0);"
                                   data-en-name="huiyingdai"
                                   data-invest-id="ZXH160904801"
                                   title="潍坊市徐先生个人房产抵押借款第一期【共四期】"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <p class="platform-ad">
                            <a en-name="kaixindai" href="{!! config('app.url') !!}/platform/detail_kaixindai.html"
                               target="_blank" title="点击了解详情"><img
                                        src="//static.touzhijia.com/images/index/new/kaixindai.jpg?ver=20160431006"
                                        height="129" width="294" alt="开鑫贷"></a>
                        </p>

                        <div class="plaform-about">
                            <a href="{!! config('app.url') !!}/platform/detail_kaixindai.html" target="_blank"
                               class="plat-logo" title="开鑫贷">
                                <img src="//static.touzhijia.com/upload/image/bidimg/logo_img/2016050315091179206.png?ver=20160431006"
                                     width="70" alt="">
                            </a>
                            <h4 class="debt-title" title="变现贷BX160910041367">变现贷BX1609100413... </h4>

                            <div class="platform-data">
                                <p class="earnings-num">年化收益率<br/><b>8.77</b><i>%</i></p>

                                <p class="time-limit-num">
                                    期限<br/><b>42</b><i>天</i>
                                </p>

                                <p class="safe-leavel">安全级别<br><b>AAA</b></p>
                            </div>
                            <p class="goin-btn">
                                <span>可购金额：107,405 元</span>
                                <a rel="invest_layer"
                                   onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-7']);"
                                   flag="0" data-isskip="0"
                                   data-inversurl='http://www.gkkxd.com/trade/invest/viewInvestableRealizeDetail/1b'
                                   data-bid="1b1558f54c8642e8a5df99bdaff13a20"
                                   href="javascript:void(0);"
                                   data-en-name="kaixindai"
                                   data-invest-id="1b1558f54c8642e8a5df99bdaff13a20"
                                   title="变现贷BX160910041367"
                                   class="btn btn-blue" title="投资">投资</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- 推荐 e-->

            <!-- 品牌专区 -->

            <div class="index-main-modcon index-main-brand">
                <div class="modcon-title">
                    <h3 class="titlein">品牌</h3>

                    <div class="line-separate"></div>
                    <ul class="good-list">
                        <li>一键购买</li>
                        <li>超高收益</li>
                        <li>特色打造</li>
                    </ul>
                    <p class="more-btn"><a href="{!! config('app.url') !!}/debt/borrows/brands.html" target="_blank"
                                           class="btn btn-white btn-xs">更多»</a></p>
                </div>
                <div class="main-modeconin">
                    <div class="top-line"></div>
                    <div class="main-modeconin-detail">
                        <div class="brand-debt">


                            <div class="brand-debt-box">
                                <div class="soldout-tip"><a
                                            href="{!! config('app.url') !!}/shop/item/lMZHjC3ACJ0q3f8utFsZ.html"
                                            style="color:#5E7AD4" target="_blank">去信用宝官网投资，享1.0%额外加息！</a><a
                                            href="{!! config('app.url') !!}/shop/item/lMZHjC3ACJ0q3f8utFsZ.html"
                                            class="btn" target="_blank" data-baidu-track="平台加息券"
                                            data-baidu-track-action="click" data-baidu-track-label="信用宝1.0%">兑换加息券</a>
                                </div>
                                <a href="{!! config('app.url') !!}/debt/borrow/P20160901001.html" target="_blank">
                                    <h4>
                                        <img src="//static.touzhijia.com/upload/image/bidimg/logo_recommend_img/2016042614212699586.jpg?ver=20160431006"
                                             alt=""/></h4>

                                    <div class="debt-info">
                                        <p class="debt-rate">年化收益率<br><b>8.80<em>%</em></b></p>

                                        <p class="debt-money">期限<br><b>1月<em></em></b></p>

                                        <p class="debt-time">安全级别<br><b>BB</b></p>
                                    </div>
                                    <div class="action-con">
                                        <div class="debt-progress">
                                            <span class="progress-bar" style="width:0%"></span>

                                            <p>可购份额：<em>250,000</em>份</p>
                                        </div>
                                        <a class="btn changeBtn" target="_blank"
                                           href="{!! config('app.url') !!}/debt/borrow/P20160901001.html"><span
                                                    class="count countDown" did=""
                                                    exp_sec="30810"><em>8</em>时<em>33</em>分<em>30</em>秒</span></a></div>
                                </a>
                            </div>
                            <div class="brand-debt-box">
                                <div class="soldout-tip"><a
                                            href="{!! config('app.url') !!}/shop/item/HC1BUfoZ5k062gNSwfuE.html"
                                            style="color:#5E7AD4" target="_blank">去达人贷官网投资，享1.0%额外加息！</a><a
                                            href="{!! config('app.url') !!}/shop/item/HC1BUfoZ5k062gNSwfuE.html"
                                            class="btn" target="_blank" data-baidu-track="平台加息券"
                                            data-baidu-track-action="click" data-baidu-track-label="达人贷1.0%">兑换加息券</a>
                                </div>
                                <a href="{!! config('app.url') !!}/debt/borrow/P20160901012.html" target="_blank">
                                    <h4>
                                        <img src="//static.touzhijia.com/upload/image/bidimg/logo_recommend_img/2016041416230228610.png?ver=20160431006"
                                             alt=""/></h4>

                                    <div class="debt-info">
                                        <p class="debt-rate">年化收益率<br><b>8.50<em>%</em></b></p>

                                        <p class="debt-money">期限<br><b>1月<em></em></b></p>

                                        <p class="debt-time">安全级别<br><b>BBB</b></p>
                                    </div>
                                    <div class="action-con">
                                        <div class="debt-progress">
                                            <span class="progress-bar" style="width:100%"></span>

                                            <p>可购份额：<em>0</em>份</p>
                                        </div>
                                        <a class="btn btn-invalid" target="_blank"
                                           href="{!! config('app.url') !!}/debt/borrow/P20160901012.html">售罄</a></div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- 转让 s-->
            <!-- 转让 e-->

            <!-- 新闻&公告 s-->
            <div class="news-notice">
                <div class="hot-news">
                    <div class="hot-con recent-news">
                        <h2><span>最新动态</span><a href="{!! config('app.url') !!}/about/latest.html" target="_blank">更多&gt;</a>
                        </h2>
                        <ul>
                            <li>
                                <a href="{!! config('app.url') !!}/about/latest/3184.html" target="_blank"
                                   class="img-link">
                                    <img src="//static.touzhijia.com/upload/image/20160831/1472634275.jpg?ver=20160431006"
                                         alt="天眼投CEO黄诗樵受邀主讲《吴晓波频道》金融社群" height="95">
                                </a>

                                <p class="link-con">
                                    <a href="{!! config('app.url') !!}/about/latest/3184.html" target="_blank">天眼投CEO黄诗樵受邀主讲《吴晓波频道》金融社群</a>
                                    <span>发布时间：2016-08-31</span>
                                </p>
                            </li>
                            <li>
                                <a href="{!! config('app.url') !!}/about/latest/3183.html" target="_blank"
                                   class="img-link">
                                    <img src="//static.touzhijia.com/upload/image/20160829/1472450458.jpg?ver=20160431006"
                                         alt="徐红伟：监管将打破舆论鸿沟 实力玩家入局P2P" height="95">
                                </a>

                                <p class="link-con">
                                    <a href="{!! config('app.url') !!}/about/latest/3183.html" target="_blank">徐红伟：监管将打破舆论鸿沟
                                        实力玩家入局P2P</a>
                                    <span>发布时间：2016-08-29</span>
                                </p>
                            </li>
                        </ul>
                        <ul class="media-report">
                            <li>
                                <a href="{!! config('app.url') !!}/about/latest/2274.html?source=touzhijia&subsource=index.top.banner5&pk_campaign=touzhijia&pk_kwd=index.top.banner5&hmsr=touzhijia&hmpl=default&hmcu=default&hmkw=index.top.banner5"
                                   class="img-link" target="_blank">
                                    <img src="//static.touzhijia.com/upload/image/20151112/1447301221.jpg?ver=20160431006"
                                         alt="黄诗樵接受CCTV采访实录" height="95">
                                    <span class="playicon"></span>
                                </a>

                                <p class="link-con">
                                    <a href="{!! config('app.url') !!}/about/latest/2274.html?source=touzhijia&subsource=index.top.banner5&pk_campaign=touzhijia&pk_kwd=index.top.banner5&hmsr=touzhijia&hmpl=default&hmcu=default&hmkw=index.top.banner5"
                                       target="_blank">黄诗樵接受CCTV采访实录</a>
                                    <span>发布时间：2015-11-11</span>
                                </p>
                            </li>
                            <li>
                                <a href="{!! config('app.url') !!}/about/latest/2255.html" class="img-link"
                                   target="_blank">
                                    <img src="//static.touzhijia.com/upload/image/20151202/1449024206.jpg?ver=20160431006"
                                         alt="《创客深圳》节目：天眼投一年成交20亿的背后" height="95">
                                    <span class="playicon"></span>
                                </a>

                                <p class="link-con">
                                    <a href="{!! config('app.url') !!}/about/latest/2255.html" target="_blank">《创客深圳》节目：天眼投一年成交20亿的背后</a>
                                    <span>发布时间：2015-11-06</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hot-notice">
                    <h2><span>投资攻略</span><a href="{!! config('app.url') !!}/about/strategy.html"
                                            target="_blank">更多&gt;</a></h2>
                    <dl class="rank-list">
                        <dd><a href="{!! config('app.url') !!}/about/strategy/3127.html" target="_blank"
                               title="别随便查征信，会影响申卡下卡率？"><p>别随便查征信，会影响申卡下卡率？</p><em>1478</em></a></dd>
                        <dd><a href="{!! config('app.url') !!}/about/strategy/3124.html" target="_blank"
                               title="《全国住房公积金2015年年度报告》发布，住房公积金隐藏多少玄机？"><p>《全国住房公积金2015年年度报告》发布，住房公积金隐藏多少玄机？</p>
                                <em>921</em></a></dd>
                        <dd><a href="{!! config('app.url') !!}/about/strategy/3122.html" target="_blank"
                               title="止损还是分散投资？快跟这些动物学理财"><p>止损还是分散投资？快跟这些动物学理财</p><em>1078</em></a></dd>
                        <dd><a href="{!! config('app.url') !!}/about/strategy/3117.html" target="_blank"
                               title="没有存在感？赶紧提高你的核心竞争力吧！"><p>没有存在感？赶紧提高你的核心竞争力吧！</p><em>1049</em></a></dd>
                        <dd><a href="{!! config('app.url') !!}/about/strategy/3116.html" target="_blank"
                               title="8招助你成为千万富翁（已经过亿的勿看~）"><p>8招助你成为千万富翁（已经过亿的勿看~）</p><em>1315</em></a></dd>
                        <dd><a href="{!! config('app.url') !!}/about/strategy/3115.html" target="_blank"
                               title="那么多隐性富豪城市 其实你不非得扎在北上广！"><p>那么多隐性富豪城市 其实你不非得扎在北上广！</p><em>1169</em></a></dd>
                    </dl>
                </div>
            </div>
            <!-- 新闻&公告 e-->
        </div>

        <!-- 媒体报到 s-->
        <div class="media-con">
            <div class="media-list" id="mediaListCon">
                <div class="media-list-logo play-list-con">
                    <ul>
                        <li>
                            <a target="_bank" href="http://www.jiemian.com/article/816591.html"
                               title="P2P监管细则影响有多大？ 听听从业者怎么说">
                                <img src="//static.touzhijia.com/upload/image/20160825/1472110959.jpg?ver=20160431006"
                                     alt="P2P监管细则影响有多大？ 听听从业者怎么说" style="height:55px;">
                                <span>P2P监管细则影响有多大？ 听听从业者怎么说</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank"
                               href="http://www.ccstock.cn/money/licai/2016-08-24/A1472033442822.html?from=singlemessage&isappinstalled=0"
                               title="互金大咖谈《网络借贷信息中介机构业务活动管理暂行办法》">
                                <img src="//static.touzhijia.com/upload/image/20160825/1472102728.jpg?ver=20160431006"
                                     alt="互金大咖谈《网络借贷信息中介机构业务活动管理暂行办法》" style="height:55px;">
                                <span>互金大咖谈《网络借贷信息中介机构业务活动管理暂行办法》</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank"
                               href="http://m.hexun.com/news/2016-08-24/185688453.html?from=singlemessage&isappinstalled=0"
                               title="业内解读网贷监管细则：短期对平台运营有较大影响">
                                <img src="//static.touzhijia.com/upload/image/20160825/1472101950.jpg?ver=20160431006"
                                     alt="业内解读网贷监管细则：短期对平台运营有较大影响" style="height:55px;">
                                <span>业内解读网贷监管细则：短期对平台运营有较大影响</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank" href="http://kuaixun.stcn.com/2016/0811/12833206.shtml#userconsent#"
                               title="第三方互联网金融服务平台天眼投完成8000万A轮融资">
                                <img src="//static.touzhijia.com/upload/image/20160816/1471328162.jpg?ver=20160431006"
                                     alt="第三方互联网金融服务平台天眼投完成8000万A轮融资" style="height:55px;">
                                <span>第三方互联网金融服务平台天眼投完成8000万A轮融资</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank" href="http://tech.163.com/16/0811/15/BU6U6ALG00097U7V.html"
                               title="P2P垂直搜索引擎“天眼投”宣布获8000万融资">
                                <img src="//static.touzhijia.com/upload/image/20160816/1471327993.jpg?ver=20160431006"
                                     alt="P2P垂直搜索引擎“天眼投”宣布获8000万融资" style="height:55px;">
                                <span>P2P垂直搜索引擎“天眼投”宣布获8000万融资</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank" href="http://xiaofei.china.com.cn/news/info-11-9-228590.html"
                               title="资本寒冬下，天眼投逆势完成8000万A轮融资">
                                <img src="//static.touzhijia.com/upload/image/20160816/1471327856.jpg?ver=20160431006"
                                     alt="资本寒冬下，天眼投逆势完成8000万A轮融资" style="height:55px;">
                                <span>资本寒冬下，天眼投逆势完成8000万A轮融资</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank" href="http://ln.ifeng.com/a/20160526/4589678_0.shtml"
                               title="天眼投CEO黄诗樵：刺激与转型，互联网金融发展的S型曲线">
                                <img src="//static.touzhijia.com/upload/image/20160701/1467340109.jpg?ver=20160431006"
                                     alt="天眼投CEO黄诗樵：刺激与转型，互联网金融发展的S型曲线" style="height:55px;">
                                <span>天眼投CEO黄诗樵：刺激与转型，互联网金融发展的S型曲线</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank"
                               href="http://gd.sina.com.cn/finance/szitfin/2016-06-27/cj-ifxtmweh2562862.shtml?qq-pf-to=pcqq.c2c"
                               title="近10家P2P出海布局 做全球化资产配置风险在哪">
                                <img src="//static.touzhijia.com/upload/image/20160704/1467601830.jpg?ver=20160431006"
                                     alt="近10家P2P出海布局 做全球化资产配置风险在哪" style="height:55px;">
                                <span>近10家P2P出海布局 做全球化资产配置风险在哪</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank" href="http://www.iimedia.cn/41881.html" title="天眼投CEO黄诗樵：提高互联网金融平台相对的安全性">
                                <img src="//static.touzhijia.com/upload/image/20160701/1467339953.jpg?ver=20160431006"
                                     alt="天眼投CEO黄诗樵：提高互联网金融平台相对的安全性" style="height:55px;">
                                <span>天眼投CEO黄诗樵：提高互联网金融平台相对的安全性</span>
                            </a>
                        </li>
                        <li>
                            <a target="_bank" href="http://ah.ifeng.com/a/20160519/4566336_0.shtml"
                               title="首创互金直播新玩法 天眼投518单日成交量猛破5800万">
                                <img src="//static.touzhijia.com/upload/image/20160701/1467339733.jpg?ver=20160431006"
                                     alt="首创互金直播新玩法 天眼投518单日成交量猛破5800万" style="height:55px;">
                                <span>首创互金直播新玩法 天眼投518单日成交量猛破5800万</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="imgnav"></p>
                <a href="javascript:void(0);" class="actbtn perbtn"><span class="iconfont">&#xe65f;</span></a>
                <a href="javascript:void(0);" class="actbtn nextbtn"><span class="iconfont">&#xe660;</span></a>
            </div>
        </div>
        <!-- 媒体报到 e-->

        <!-- 友情链接 s-->
        <div class="friend-link">
            <p class="friend-link-con">
                <span class="link-title">友情链接：</span>
                            <span class="link-detail">
                    <a href="http://www.wdzj.com" target="_blank">网贷之家</a>
                    <a href="http://bbs.wdzj.com" target="_blank">网贷论坛</a>
                    <a href="http://www.touzhijia.com/debt/" target="_blank">二级市场</a>
                    <a href="http://wenda.touzhijia.com/" target="_blank">投资问答</a>
                    <a href="http://finance.china.com.cn/money/efinance/index.shtml" target="_blank">中国网</a>
                    <a href="http://huaxia.kameng.com" target="_blank">华夏银行</a>
                    <a href="http://ipo.qianzhan.com" target="_blank">资本前瞻</a>
                    <a href="http://www.678678.com" target="_blank">淘金网</a>
                    <a href="http://www.rongzhijia.com" target="_blank">融之家</a>
                    <a href="http://www.yiyebang.com/" target="_blank">异业邦</a>
                    <a href="http://www.12308.com" target="_blank">12308汽车票</a>
                    <a href="http://www.liveapp.cn/" target="_blank">场景应用</a>
                    <a href="http://www.yingcanzixun.com/" target="_blank">盈灿咨询</a>
                    <a href="http://www.jinlibaba.com" target="_blank">黄金价格</a>
                    <a href="http://www.gifa.com.cn/" target="_blank">广东互联网金融协会</a>
                 </span>
            </p>
        </div>
        <!-- 友情链接 e-->

    </div>
@stop
@section('script')
<link rel="stylesheet" href="https://res.wx.qq.com/connect/zh_CN/htmledition/style/impowerApp29579a.css"/>
<link rel="stylesheet" href="{!! config('app.static_url') !!}/css/pagestyle/wx_qr.css"/>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/normalplugins.js?ver={!! date("YmdHis",time()) !!}"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.dotdotdot.min.js?ver={!! date("YmdHis",time()) !!}"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/main.js?ver={!! date("YmdHis",time()) !!}"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/mainindex.js?ver={!! date("YmdHis",time()) !!}"></script>
@stop




