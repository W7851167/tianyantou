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
            <h2>大事记</h2>
            <div class="content event">
                <div class="axis-box">
                    <div class="axis-line"></div>
                    <div class="axis-info left-box yellow-box"  id="month-19">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.07</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">7月6日</span>天眼投主编互金创客传——《新金融英雄》正式面世。</p></li>
                                <li><p><span class="time">7月1日</span>天眼投总注册用户数突破200万。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box pink-box"  id="month-18">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.06</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">6月29日</span>天眼投首席风控官马骏直播网贷风控。</p></li>
                                <li><p><span class="time">6月26日</span>之家哥俱乐部暨“网贷神州行”大型行业交流会在南昌成功举行。</p></li>
                                <li><p><span class="time">6月12日</span>天眼投进驻第二十届深港澳国际汽车博览会获好评。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box red-box"  id="month-17">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.05</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">5月20日</span>天眼投CEO黄诗樵获南京大学创业导师荣誉称号。</p></li>
                                <li><p><span class="time">5月19日</span>天眼投分会场总成交破百亿 第二届518理财节圆满落幕。</p></li>
                                <li><p><span class="time">5月6日</span>天眼投CEO黄诗樵获聘为市消委会金融专业委员会第一届专业顾问。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box blue-box"  id="month-16">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.04</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">4月15日</span>天眼投受邀参加国家发改委等12部委调研座谈会。</p></li>
                                <li><p><span class="time">4月8日</span>天眼投累计成交量强势突破50亿。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box green-box" style="margin-top:15px;" id="month-15">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.03</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">3月28日</span>天眼投首席风控官马骏接受CCTV《焦点访谈》采访。</p></li>
                                <li><p><span class="time">3月25日</span>顺利加入中国互联网金融协会，成为首批会员。</p></li>
                                <li><p><span class="time">3月15日</span>天眼投荣获“2016年广东省金融行业信用共建单位”荣誉称号。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box yellow-box" style="margin-top:170px;" id="month-14">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.02</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">2月15日</span>天眼投累计成交额突破40亿元。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box pink-box" style="margin-top:0px;" id="month-13">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2016.01</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">1月22日</span>全球网贷行业发展趋势研讨会(深圳站)在天眼投成功举办。</p></li>
                                <li><p><span class="time">1月18日</span>天眼投“网贷记账”功能上线。</p></li>
                                <li><p><span class="time">1月13日</span>全网通成交量突破百万。</p></li>
                                <li><p><span class="time">1月11日</span>天眼投日成交量突破2000万，再创新高。</p></li>
                                <li><p><span class="time">1月7日</span>全网通媒体发布会于北京召开。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box red-box" style="margin-top:58px;" id="month-12">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.12</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">12月28日</span>天眼投加入深媒会 获理事单位授牌。</p></li>
                                <li><p><span class="time">12月26日</span>天眼投注册用户数破百万。</p></li>
                                <li><p><span class="time">12月21日</span>湛江市政协副主席欧先伟率考察团到天眼投进行调研交流。</p></li>
                                <li><p><span class="time">12月19日</span>天眼投“活期”产品重磅上线。</p></li>
                                <li><p><span class="time">12月15日</span>天眼投总成交量突破30亿元。</p></li>
                                <li><p><span class="time">12月3日</span>天眼投荣获2015南都金砖奖“最佳产品创新奖”。</p></li>
                                <li><p><span class="time">12月1日</span>天眼投全网通正式上线。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box blue-box"  id="month-11">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.11</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">11月28日</span>天眼投CEO黄诗樵获宁波诺丁汉大学创业导师荣誉称号。</p></li>
                                <li><p><span class="time">11月24日</span>天眼投二级市场成交破10亿。</p></li>
                                <li><p><span class="time">11月24日</span>天眼投CEO黄诗樵获中国政法大学创业导师荣誉称号。</p></li>
                                <li><p><span class="time">11月22日</span>天眼投全网债权转让上线。</p></li>
                                <li><p><span class="time">11月16日</span>天眼投CEO黄诗樵获评广东金融学院互联网系创业导师荣誉称号。</p></li>
                                <li><p><span class="time">11月8日</span>天眼投CEO黄诗樵获评中国互联网金融董事在联盟“2015年度十大影响力人物”。</p></li>
                                <li><p><span class="time">11月5日</span>天眼投荣获“2015互联网金融产品创新奖”（融资中国）。</p></li>
                                <li><p><span class="time">11月3日</span>天眼投获评“中国十佳互联网金融创新企业”。</p></li>
                                <li><p><span class="time">11月2日</span>网贷双十一重磅启幕 上线首日苹果三件套被抽中。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box green-box" style="margin-top:310px;" id="month-10">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.10</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">10月31日</span>天眼投举行温泉拓展户外之旅。</p></li>
                                <li><p><span class="time">10月24日</span>天眼投举办第一届之家哥羽毛球大赛。</p></li>
                                <li><p><span class="time">10月22日</span>天眼投成功晋级新浪全球APP路演总决赛。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box yellow-box"  id="month-9">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.09</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">9月25日</span>黄诗樵受邀出席2015香港互联网金融高峰论坛，与诺奖得主詹姆斯·莫里斯亲切对话。</p></li>
                                <li><p><span class="time">9月22日</span>微信服务号绑定功能上线。</p></li>
                                <li><p><span class="time">9月21日</span>黄诗樵、邓伟、覃武权受邀做客《对话网贷人》节目。</p></li>
                                <li><p><span class="time">9月19日</span>天眼投一周年庆暨Pre-A轮融资发布会成功举办。</p></li>
                                <li><p><span class="time">9月11日</span>天眼投总成交额突破20亿。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box pink-box"  id="month-8">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.08</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">8月28日</span>天眼投iOS版APP正式上线。</p></li>
                                <li><p><span class="time">8月25日</span>天眼投注册用户数突破50万。</p></li>
                                <li><p><span class="time">8月18日</span>天眼投联合汇添富正式推出货币基金“e利多”。</p></li>
                                <li><p><span class="time">8月12日</span>天眼投二级市场推出债权转让功能。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box red-box"  id="month-7">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.07</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">7月9日</span>天眼投“捡便宜”火爆上线，创新营销模式引追捧。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box blue-box"  id="month-6">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.06</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">6月30日</span>天眼投高票当选广东互联网金融协会理事单位。</p></li>
                                <li><p><span class="time">6月26日</span>天眼投参展广州金交会，广东省省长朱小丹亲临展位指导工作。</p></li>
                                <li><p><span class="time">6月24日</span>天眼投母公司盈灿集团获赛富亚洲及创东方B轮亿级融资。</p></li>
                                <li><p><span class="time">6月13日</span>二级市场专项赎回基金由起始300万增至1000万元。</p></li>
                                <li><p><span class="time">6月10日</span>天眼投上线九个月成交破十亿，二级市场成交超3亿。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box green-box"  id="month-5">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.05</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">5月18日</span>天眼投打造首届518互联网金融理财节，合作平台总成交破十亿，总参与人数超25万，天眼投25天成交金额超2.5亿，单日成交破3000万元。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box yellow-box"  id="month-4">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.04</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">4月15日</span>天眼投微信端上线随时随地，购买债权。</p></li>
                                <li><p><span class="time">4月1日</span>天眼投二级市场交易额破亿。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info left-box pink-box"  id="month-3">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2015.01</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">1月31日</span>天眼投二级市场正式上线，仅48小时成交额突破150万。</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="axis-info right-box red-box"  id="month-2">
                        <i class="shape-circle"></i>
                        <div class="term"><span class="time">2014.09</span></div>
                        <div class="event-box">
                            <ul>
                                <li><p><span class="time">9月16日</span>天眼投正式上线运营。</p></li>
                            </ul>
                        </div>
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