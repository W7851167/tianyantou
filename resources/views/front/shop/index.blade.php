@extends('layout.main')
@section('title')积分商城@stop
@section('content')
<!--内容开始-->
<div id="mall" class="wrap">
    <div class="container">
        <div class="content">
            <div class="mall-events">
                <div class="events-side">
                    <!--<div class="mission"><i class="iconfont">&#xe6a2;</i><a href="/shop/mission">积分任务</a></div>-->
                    <h2>公告</h2>
                    <div class="list-move" id="notice-move">
                        <span class="axis-line"></span>

                        <ul class="listmodcon">
                            <li><a href="http://topics.touzhijia.com/topic20151212.html" target="_blank"><i class="shape-circle active"></i>1.双12岁末狂欢第一波 积分兑换加息券</a></li>
                            <li><a href="https://www.touzhijia.com/about/dynamic/2408.html" target="_blank"><i class="shape-circle active"></i>2.T积分商城抽出大奖 中奖者喜得iPhone6s</a></li>
                            <li><a href="https://www.touzhijia.com/about/notice/2301.html" target="_blank"><i class="shape-circle active"></i>3.T积分系统隆重上线公告</a></li>
                        </ul>

                    </div>
                    <h2>兑换</h2>
                    <div class="list-move" id="lucky-move">
                        <span class="axis-line"></span>
                        <ul class="listmodcon">
                            <li><a href="javascript:void(0)" title="AO******兑换了青铜T码">
                                    <i class="shape-circle active"></i>AO******兑换了青铜T码</a></li>
                            <li><a href="javascript:void(0)" title="ha******兑换了青铜T码">
                                    <i class="shape-circle active"></i>ha******兑换了青铜T码</a></li>
                            <li><a href="javascript:void(0)" title="ha******兑换了青铜T码">
                                    <i class="shape-circle active"></i>ha******兑换了青铜T码</a></li>
                            <li><a href="javascript:void(0)" title="7t******抽奖获得2元提现券">
                                    <i class="shape-circle active"></i>7t******抽奖获得2元提现券</a></li>
                            <li><a href="javascript:void(0)" title="nr******兑换了黄金T码">
                                    <i class="shape-circle active"></i>nr******兑换了黄金T码</a></li>
                            <li><a href="javascript:void(0)" title="ho******兑换了石投金融1.0%加息券">
                                    <i class="shape-circle active"></i>ho******兑换了石投金融1.0%加息券</a></li>
                            <li><a href="javascript:void(0)" title="DU******抽奖获得黄金T码">
                                    <i class="shape-circle active"></i>DU******抽奖获得黄金T码</a></li>
                            <li><a href="javascript:void(0)" title="jg******抽奖获得2元提现券">
                                    <i class="shape-circle active"></i>jg******抽奖获得2元提现券</a></li>
                            <li><a href="javascript:void(0)" title="HA******抽奖获得2元提现券">
                                    <i class="shape-circle active"></i>HA******抽奖获得2元提现券</a></li>
                            <li><a href="javascript:void(0)" title="GM******抽奖获得黄金T码">
                                    <i class="shape-circle active"></i>GM******抽奖获得黄金T码</a></li>
                        </ul>
                    </div>
                </div>
                <div class="imgplay" id="mall-carousel">
                    <div class="imgplaycon">
                        <ul class="imglistcon">
                            <li><a href="/shop/mission"><img src="http://static.tianyantou.com/images/mall/carousel/3.jpg" /></a></li>
                            <!--<li><a href="https://account.touzhijia.com/shop.html"><img src="http://static.tianyantou.com/images/mall/carousel/1.jpg" /></a></li>
                            <li><a href="/"><img src="http://static.tianyantou.com/images/mall/carousel/2.jpg" /></a></li>-->
                        </ul>
                    </div>
                    <!--<p class="imgnav"><span class="active"></span><span></span></p>-->
                </div>
            </div>
            <div class="mall-main">
                <div class="tab click-tab noborder">
                    <!-- 导航栏 -->
                    <ul class="tab-nav">
                        <li class="active"><a href="#">幸运大抽奖</a></li>
                        <li class=""><a href="#">精品推荐</a></li>
                        <li id="coupon" class=""><a href="#"><i class="icon-hot"></i>加息券</a></li>
                        <div class="mall-list-title">
                            <a id="my-item" href="https://account.touzhijia.com/shop.html" class="btn btn-blue-o">我的宝贝</a>
                            <span><em id="my-score" class="unlogin">请登录</em></span>
                        </div>
                    </ul>
                    <!-- 导航栏end -->
                    <div class="tab-main">
                        <!-- 内容1(幸运大抽奖) -->
                        <div class="active">
                            <!-- 直接遍历出需要的数据 -->
                            <!--幸运大抽奖-->
                            <div class="active">
                                <div id="lottery1" class="lottery-box">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td class="lottery-unit lottery-unit-0" class-id="0" data-id="oilcthQEBLX26Yf4IgsK">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/e38c0bd83dbc181d5af22f7cd328db22-20160118.jpg" width="100">
                                                <span>iPhone6s Plus</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-1" class-id="1" data-id="IDmOkm0SJ7DopJq9Tgc6">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/2ad97206607a25866fed00c06e12e1e6-20160118.jpg" width="100">
                                                <span>10元投资券</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-2" class-id="2" data-id="D7G84tWWRibjXXeqcjm9">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/e7ec1ec1e8aab3c43d6b4c645fb768fd-20160621.jpg" width="100">
                                                <span>悦卡洗车器</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-3" class-id="3" data-id="UtlriZ10tCS8BJd66PCO">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/47f04a17b94c4060e463cf7a2bc5ba43-20160118.jpg" width="100">
                                                <span>钻石T码</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-4" class-id="4" data-id="eLE4c96VWOG6mh8loOt0">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/94b942c05d73cefe4c17e56493bfd99c-20160118.jpg" width="100">
                                                <span>iPad mini4</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lottery-unit lottery-unit-13" class-id="13" data-id="mSNk56AQgG4slCTLWgzk">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/7eca58fa55d885dd01259884ccdb926a-20160118.jpg" width="100">
                                                <span>黄金T码</span>
                                            </td>
                                            <td class="lottery-btn" colspan="3" rowspan="2">
                                                <span>50积分/次</span>
                                                <a class="go" rel="go" href="javascript:void(0);"></a>
                                            </td>
                                            <td class="lottery-unit lottery-unit-5" class-id="5" data-id="nrDGZbyIMoNla4qdv1HR">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/6bd09a78fb59f69a4b5d536e08ddd921-20160621.jpg" width="100">
                                                <span>美的挂烫机</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lottery-unit lottery-unit-12" class-id="12" data-id="Gno73v0tZW2pY7yW6ch5">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/2cb9830b0fdcc2e5825b57c7ca81861d-20160901.png" width="100">
                                                <span>30元投资券</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-6" class-id="6" data-id="Xo1M3VgT1UVvvsuKP9CJ">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/efcfe6e8ba806012aa2f3b3251118086-20160118.jpg" width="100">
                                                <span>Apple Watch</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lottery-unit lottery-unit-11" class-id="11" data-id="adfzojlC3lQ46Fcw25zo">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/dda7818f14ce168df1572dcfca9330c7-20160621.jpg" width="100">
                                                <span>凯仕乐按摩器</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-10" class-id="10" data-id="lSDkhL3S044aZzQlXxn4">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/4f0a65d1c2c32c47e1f352486851e483-20160624.jpg" width="100">
                                                <span>小羊玫瑰金锁骨链</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-9" class-id="9" data-id="VRsrP5c5bxNWEXIg18f8">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/db4e62da88e73540e71424883fc43d61-20160621.jpg" width="100">
                                                <span>荣事达养生壶</span>
                                            </td>
                                            <td class="lottery-unit lottery-unit-8"><img src="http://static.tianyantou.com/images/mall/lottery-thx.jpg" class="thx">
                                                <h5>谢谢参与</h5></td>
                                            <td class="lottery-unit lottery-unit-7" class-id="7" data-id="ErG8wwPXh8iJBDZMtAwJ">
                                                <img src="https:http://static.tianyantou.com/images/shop/items/c8b8ee1c2444f7c4bebbe8216a4fe161-20160118.jpg" width="100">
                                                <span>2元提现券</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div id="prize" class="overlayer">
                                <div class="layer-main">
                                    <div class="layer-close"></div>
                                    <div class="lucky-bg"></div>
                                    <div class="layer-content">
                                        <p>获得<span class="title" style="font-family: '微软雅黑'; font-size: 2.2rem;">IPHONE6S</span></p>
                                        <div class="prize">
                                            <img class="stuff" src="https:http://static.tianyantou.com/images/shop/items/94b942c05d73cefe4c17e56493bfd99c-20151124.jpg" />
                                        </div>
                                    </div>
                                </div>
                            </div>            </div>
                        <!-- 内容1 end -->
                        <!-- 内容2(精品推荐) -->
                        <div class="">
                            <!-- 直接遍历出需要的数据 -->


                            <div class="mall-item-list">
                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/47f04a17b94c4060e463cf7a2bc5ba43-20151214.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>钻石T码                                    <span
                                                        class="rate">800                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/ztd5M1ZTSA3h9UKx3AM6.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/7eca58fa55d885dd01259884ccdb926a-20151214.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>黄金T码                                    <span
                                                        class="rate">400                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/PgveAdVa3PErZKJDE6dg.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/e7c908f5ca5f82ac2f1c3e3bfcf53328-20151214.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>白银T码                                    <span
                                                        class="rate">200                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/b4A0bSHn9WAhQhX0bkYg.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/2ea8b3bb90aa3ba77c72c5eb983a54cc-20151214.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>青铜T码                                    <span
                                                        class="rate">40                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/iLh8iNlxubbL1faV3hP6.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/6581c3aa8cc5ee9500a015682455eb19-20151222.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>2元提现券                                    <span
                                                        class="rate">300                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/tYloCGe8rZ0FyHWwzmLV.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/dff6f6b9fe1766bf12b212574a910df7-20151124.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>2014中国网络借贷行业蓝皮书                                    <span
                                                        class="rate">360                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/GWteTT2T4s3TrJ5r8IGC.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/ca557160610ab4bd2343fcb11b2d0cce-20160707.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>新金融英雄                                    <span
                                                        class="rate">8000                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/4ivqZzQUl72HEeZdQLMW.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/043a5a8aaab7df9b84c4dc55e4bf0537-20160629.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>2015中国网络借贷行业蓝皮书                                    <span
                                                        class="rate">8000                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/hGO0qSvmsO66xzTlP79j.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/5d7d50c54262c330518c650282641c71-20160216.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>之家玩偶-之家妹                                    <span
                                                        class="rate">1000                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/7jyklMxJo3q4vYMgmtKx.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/069028d928aaf1ca8b036406ba6f678e-20160621.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>富士拍立得相机                                    <span
                                                        class="rate">34900                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/aq9hUTBeYcxLQmK4MnMr.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/19650812c7d82df635f9bf092418e81d-20160621.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>汝窑 正品仿宋开片汝瓷功夫茶具                                    <span
                                                        class="rate">40000                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/r9a9tQShUXWPZPKyNIS3.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/05c62e0c5704c73b9d7cb2636774eba6-20160325.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>众筹之家现金券                                    <span
                                                        class="rate">300                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/mChvLKeUkcrJL1fOLbLY.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-box">
                                    <div class="item-main">
                                        <img src="https:http://static.tianyantou.com/images/shop/items/d6d7e87f9bc9665f9245f3ad4f207a4a-20160509.jpg"
                                             onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                        <div class="item-info">
                                            <h4>齐家网装修优惠券                                    <span
                                                        class="rate">50                                        积分</span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/6gjr9Xds8dTMCqXN9kQP.html"
                                               class="btn btn-gray btn-l">查看详情</a>
                                        </div>
                                    </div>
                                </div>



                            </div>            </div>
                        <!-- 内容2 end -->
                        <!-- 内容3(加息券) -->
                        <div>
                            <!-- 直接遍历出需要的数据 -->


                            <div class="mall-item-list">
                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/52ad23a31f2cb3eba817833336208dae-20160317.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>石投金融</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>石投金融1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        100积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/VmtEmPE0yJjaqcjfauvq.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/9f64479bab1422b39d22ba7823aee4d5-20151208.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>天天财富</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>天天财富1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        100积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/fZBLCgbujyRCly5by9Es.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/a241265d996be5020030853b83dd1e81-20151223.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>联豪创投</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>联豪创投1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        100积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/k20gDzHbMHSfUtYz3FEL.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/6d6a0e29bfdde2435d8b53ccf02792d7-20151208.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>楚金所</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>楚金所1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        150积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/ysFVwmLzNpuJI5c1Rhb7.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/9291aea62f776e39ed90577ce4c06578-20151208.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>生菜金融</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>生菜金融1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        150积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/e9WSWM07SovO751eV4YQ.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/f819fd01195f60fb4a64cf093b72073c-20151228.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>汇盈金服</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>汇盈金服1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        150积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/Au7EhQGWSWgyLAeN6nsH.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/71ea43fdc7f7bf5cfc0febee8348d1dd-20160428.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>信用宝</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>信用宝1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/lMZHjC3ACJ0q3f8utFsZ.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/dc827d4742d8999a184a3619a0582c18-20151229.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>易贷网</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>易贷网0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/toKwv5WFPlsgel145B6b.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/071aaa06bc9e40116199a6321db034c7-20160223.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>万盈金融</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>万盈金融0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/EaZeGUUL76uODEZYYd5r.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/17c9863b4484cd05005af462600fafbc-20151228.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>e路同心</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>e路同心0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/0RlxDxbPi7ntU61Lbkp9.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/8a37924a6277c0c71b740dd91dbbc65f-20151225.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>91旺财</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>91旺财1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/VS9aTNEhKzV9rdwHUhab.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/f3028a5bef6ebf5ecfd30120b0a74cdc-20160111.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>博金贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>博金贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/VTbbAVXQWrQcRib25PVY.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/1b4b81ac30516d9f6174a898b600d76c-20151208.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>合盘贷</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>合盘贷0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        200积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/nK8SqY4R1SA0V7XT2Fou.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/c073eb689605a55a7b7f1e7c20294b63-20160509.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>开鑫贷</p>
                                            <span><em>0.3</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>开鑫贷0.3%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        250积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/1g7k8eIvqZ5lHC8pUuPF.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/9316d07eb652bd1a6e47f63758cfbe64-20160511.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>车能贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>车能贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        250积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/H3OYWMvCNsctIWz6awjK.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/86b352e7370f7eed005d2783d638be05-20160718.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>汇投网</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>汇投网1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/KOFYhwwla2q994GGFPBc.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/7dbf0c0e9dde97715e0768c5b08a725a-20151223.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>聚金资本</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>聚金资本1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/ug1F0btis1Ifmd2Qqbvk.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/982b6b4610bb43174ebb9dd930a04c26-20151225.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>珠宝贷</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>珠宝贷0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/zMm7ri1yIa35nZUldKXj.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/772723e551778d5d783507c42729c875-20160629.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>杉易贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>杉易贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/9ADVo4dXo1dn948sKW0a.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/14e4f026e749e954f23e8757a6012f9e-20151223.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>融资易</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>融资易1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/T7rsREGcw0kKqRwjT68c.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/14e4f026e749e954f23e8757a6012f9e-20151223.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>立业贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>立业贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/zTyJyk406yM2wYLu5iaY.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/a241265d996be5020030853b83dd1e81-20151223.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>达人贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>达人贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        300积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/HC1BUfoZ5k062gNSwfuE.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/17c9863b4484cd05005af462600fafbc-20151228.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>投哪网</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>投哪网0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        400积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/1w1Z7GanYOAxI0YKmgyt.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/6386a45f04784d91d5f7de495a01911f-20151221.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>粤商贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>粤商贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        400积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/HY8OWq59URT8beI1z47r.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/3c2e8a88f8753bc279a5e6db457b70c9-20151225.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>广州e贷</p>
                                            <span><em>1.0</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>广州e贷1.0%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        400积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/fPkC3JaqypTmoIvc0WZ2.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->


                                <!-- 加息券特别UI -->
                                <div class="item-box">
                                    <i
                                            class="soldout"></i>                        <div class="item-main item-quan">
                                        <div class="quan-img">
                                            <img
                                                    src="https:http://static.tianyantou.com/images/shop/items/a5e09bfb3de51a2242f0129514828f94-20151224.png"
                                                    onerror="this.src='https:http://static.tianyantou.com/images/user/headerimg1.png?ver=20151008001'">
                                            <p>信融财富</p>
                                            <span><em>0.5</em>%</span>
                                        </div>

                                        <div class="item-info">
                                            <h4>信融财富0.5%加息券                                    <span class="rate">
                                        <!--
	                                        <s></s><i class="tag-discount">2折</i>
                                        -->                                        400积分
                                                                              </span>
                                            </h4>
                                            <a href="https://www.touzhijia.com/shop/item/4H0STlGV8IrhU7eOLT0u.html"
                                               target="_blank" class="btn btn-l btn-gray">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 加息券特别UI END -->




                            </div>            </div>
                        <!-- 内容3 end -->
                    </div>

                </div>

                <div class="mall-rule">
                    <div class="tab click-tab">
                        <ul class="tab-nav">
                            <li class="active"><a href="#">礼品兑换</a></li>
                            <!-- <li class=""><a href="#">积分获取</a></li> -->
                        </ul>
                        <div class="tab-main">
                            <div class="active">
                                <p>
                                    1、会员积分可在天眼投兑换相应礼品或兑换券，兑换成功后将从会员帐户中扣减相应积分分值；<br>
                                    2、积分兑换的礼品会定期更新，数量有限，先兑先得，兑完为止；<br>
                                    3、所有礼品兑换不提供任何发票或报销单据；所有礼品兑换均不提供更换、退货、售后等服务，请仔细看准后再进行兑换；<br>
                                    4、积分兑换的礼品（实物类）统一采用快递发货。
                                </p>
                                <h3>温馨提示</h3>
                                <p>
                                    1、积分只在同一会员帐户内累计，不同帐户的积分不能合并；<br>
                                    2、每一笔积分自获得之日起2年内有效，过期清零。<br>
                                    3、兑换记录和中奖记录请在个人中心-积分商城里面查询。<br>
                                </p>
                                <span>最终解释权归天眼投所有。</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--内容结束-->
@stop