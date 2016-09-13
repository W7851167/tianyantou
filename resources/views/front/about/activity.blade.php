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
            <h2>活动展示</h2>
            <div class="content activity">
                <div class="axis-box">
                    <div class="axis-line"><i class="icon-time"></i></div>
                    <div class="event-box">
                        <h4><em>02月</em><br>2016年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2808.html" target="_blank">南山行登高望远 青春与诗意做伴</a></h3>
                                <span class="time">2016-02-27</span>
                                <a href="{!! config('app.url') !!}/about/latest/2808.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20160227.jpg?ver=20160431006" alt="南山行登高望远 青春与诗意做伴" /></a>
                                <p>月底，全国大部分地区气候开始回暖，金色的阳光洒满整个深圳，春光明媚，一片祥和，格外适合出去爬爬山、踏踏青。为不负天公美意，投之家于上周六特组织了一次南山之行，登高望远，纵览无限美景。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2775.html" target="_blank">投之家携手广州e贷送豪礼 打响新年第一战</a></h3>
                                <span class="time">2016-02-23</span>
                                <a href="{!! config('app.url') !!}/about/latest/2775.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20160223.jpg?ver=20160431006" alt="投之家携手广州e贷送豪礼 打响新年第一战" /></a>
                                <p>闹完了元宵，宣告着新的一年正式拉开帷幕。新年伊始，投之家携手广州e贷来给新老用户送福利，三步曲写礼包嘉年华，打响网贷豪礼第一战。</span></a></p>
                            </div>
                        </div>
                        <h4><em>12月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2525.html" target="_blank">第12期之家哥活动：田园野炊尽享农家乐</a></h3>
                                <span class="time">2015-12-26</span>
                                <a href="{!! config('app.url') !!}/about/latest/2525.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20151226.jpg?ver=20160431006" alt="第12期之家哥活动：田园野炊尽享农家乐" /></a>
                                <p>冬日的深圳并不见得寒意逼人，而是阳光明媚，温暖宜人。12月26日，投之家组织开展了第12期之家哥俱乐部活动，与十余组投资人家庭一起来到深圳九龙生态农业园，体验了一次农家乐的幸福旅程！</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2462.html" target="_blank">双旦理财享好礼 投之家大派“年终奖”</a></h3>
                                <span class="time">2015-12-04</span>
                                <a href="{!! config('app.url') !!}/about/latest/2462.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20151204.jpg?ver=20160431006" alt="双旦理财享好礼 投之家大派“年终奖”" /></a>
                                <p>继“网贷双十一”活动期间为投资用户送出千万奖金礼品后，本次投之家又开始为投资人筹备“年终奖”了，并推出“2015岁末狂欢”系列活动。12月4日，“双十二岁末狂欢，享超级加息”的岁末狂欢第一波活动正式上线。按照规则，投资人在活动期间新购买的投之家二级市场债权，或投之家合作平台发布的标的，均全面享受0.5%以上的加息奖励。从目前的情况来看，市场反响热烈，活动受到了广大投资人的广泛关注和参与。</span></a></p>
                            </div>
                        </div>
                        <h4><em>11月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2351.html" target="_blank">高交会顺利闭幕 “赚钱啦”APP获热捧</a></h3>
                                <span class="time">2015-11-24</span>
                                <a href="{!! config('app.url') !!}/about/latest/2351.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20151124.jpg?ver=20160431006" alt="高交会顺利闭幕 “赚钱啦”APP获热捧" /></a>
                                <p>11月21日，为期6天的第十七届中国国际高新技术成果交易会(简称“高交会”)在深圳会展中心圆满落幕。投之家通过盘点参加此次高交会的成果发现，除了凝聚了满满的人气，在推广投之家自主开发的APP“赚钱啦”过程中，也赢得了各界的参与、互动和好评，成为高交会现场的明星参展商。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2233.html" target="_blank">网贷双十一：首日成交5.6亿 “苹果三件套”壕相送</a></h3>
                                <span class="time">2015-11-02</span>
                                <a href="{!! config('app.url') !!}/about/latest/2233.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20151102.jpg?ver=20160431006" alt="网贷双十一：首日成交5.6亿 “苹果三件套”壕相送" /></a>
                                <p>由投之家联合百家平台打造的“网贷双十一理财节”于11月2日上午10点盛大上线，首日成交5.6亿，参与人数超十万。大奖频出，价值数万元的苹果三件套（iPhone6s/Apple watch/iPad）在活动上线两小时内即被幸运者收入囊中，更有价值数十万的加息券不断被抽中，当日奖品总价值超百万，令参与者们拿奖拿到手软。</span></a></p>
                            </div>
                        </div>
                        <h4><em>10月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2224.html" target="_blank">投之家举行温泉拓展 温暖舒心之旅</a></h3>
                                <span class="time">2015-10-31</span>
                                <a href="{!! config('app.url') !!}/about/latest/2224.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img02.jpg?ver=20160431006" alt="投之家举行温泉拓展 温暖舒心之旅" /></a>
                                <p>深秋时节，微风捎来一丝凉意，秋意正浓。10月31日、11月1日，投之家团队前往惠州龙门铁泉度假村，开展了一次难忘的秋季温泉之旅，让身心与大自然融于一体。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2190.html" target="_blank">第一届之家哥羽毛球大赛完美收拍</a></h3>
                                <span class="time">2015-10-24</span>
                                <a href="{!! config('app.url') !!}/about/latest/2190.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/20151024.jpg?ver=20160431006" alt="第一届之家哥羽毛球大赛完美收拍" /></a>
                                <p>10月24日，第一届之家哥羽毛球大赛在深圳市南山区海润公寓羽毛球馆顺利开拍。此次比赛经过前期的预报名，共吸引了25人到场参赛，并得到了证券日报、新华网、中国证券报、每日经济新闻、第一财经日报、深圳特区报、深圳晶报、深圳都市报等十多家媒体和参赛人员亲友团的到场助阵。</span></a></p>
                            </div>
                        </div>
                        <h4><em>09月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/2025.html" target="_blank">投之家上线一周年庆典暨Pre-A轮融资发布会隆重举行</a></h3>
                                <span class="time">2015-09-19</span>
                                <a href="{!! config('app.url') !!}/about/latest/2025.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img03.jpg?ver=20160431006" alt="投之家上线一周年庆典暨Pre-A轮融资发布会隆重举行" /></a>
                                <p>9月19日，投之家“家•春秋”周年庆暨Pre-A轮融资发布会在深圳丽思卡尔顿酒店盛大举行。</span></a></p>
                            </div>
                        </div>
                        <h4><em>08月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1846.html" target="_blank">投之家捡便宜炫酷升级 品类繁多“减”到你心动</a></h3>
                                <span class="time">2015-08-28</span>
                                <a href="{!! config('app.url') !!}/about/latest/1846.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img04.png?ver=20160431006" alt="投之家捡便宜炫酷升级 品类繁多“减”到你心动" /></a>
                                <p>7月，投之家曾推出一个名为“捡便宜”的降价竞购活动，受到了广大用户的火爆关注和积极竞购，掀起了一波抢购狂潮。随着第一期捡便宜活动的结束，投之家运营团队决定在第一期的基础上，对“捡便宜”的活动细节做进一步优化，并将于8月28日（本周五）推出经过炫酷升级的第二期“捡便宜”活动。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1721.html" target="_blank">在投之家发起梦想 近千人已“让梦想飞”</a></h3>
                                <span class="time">2015-08-18</span>
                                <a href="{!! config('app.url') !!}/about/latest/1721.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img05.jpg?ver=20160431006" alt="在投之家发起梦想 近千人已“让梦想飞”" /></a>
                                <p>“你发梦想了么？”、“你的梦想飞出多少公里了？”、“快，帮我助飞梦想！”近日，由投之家技术团队开发的一款名为“让梦想飞”的小游戏火遍了朋友圈。截止到上周五，游戏上线仅5天，参与人数已突破3100人次，超过526人发布了梦想并获得好友助力。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1676.html" target="_blank">投之家七夕甜蜜标享加息 为您爱情“保本增值”</a></h3>
                                <span class="time">2015-08-14</span>
                                <a href="{!! config('app.url') !!}/about/latest/1676.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img06.jpg?ver=20160431006" alt="投之家七夕甜蜜标享加息 为您爱情“保本增值”" /></a>
                                <p>再过7天就要迎来中国传统的情人节“七夕”，在这个极具浪漫色彩的节日里，你打算以怎样的方式度过呢？每当这时，光棍们总会倍感孤单，有伴侣的男人则开始犯愁该挑什么礼物。其实，不管你现在是单身或者有伴侣，都不用过分苦恼。因为，国内首家P2P平台搜索引擎投之家，将携手业内近20家优质P2P平台一起开展“甜蜜七夕  乐享加息”的活动，为投资者送出真真切切的投资福利，让他们的幸福感与投资价值齐攀升。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1664.html" target="_blank">投之家开展夏日送清凉活动</a></h3>
                                <span class="time">2015-08-12</span>
                                <a href="{!! config('app.url') !!}/about/latest/1664.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img07.jpg?ver=20160431006" alt="投之家开展夏日送清凉活动" /></a>
                                <p>炎炎盛夏，酷暑难耐，在烈日的街头，来一瓶饮料该是一件多么惬意的事情啊！最近，由投之家运营团队策划的“夏日送清凉”活动正如火如荼地开展。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1633.html" target="_blank">投之家推出“撕名牌”小游戏火遍朋友圈</a></h3>
                                <span class="time">2015-08-11</span>
                                <a href="{!! config('app.url') !!}/about/latest/1633.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img08.jpg?ver=20160431006" alt="投之家推出“撕名牌”小游戏火遍朋友圈" /></a>
                                <p>最近，一款名为“撕名牌”的小游戏刷爆了朋友圈，许多朋友在转发这款游戏的时候，都发出“跪求赐个撕B神器”、“撕B停不下来的节奏”、“撕B路上多煎挺”、“不撕B炫富不人生” 这样的感叹。</span></a></p>
                            </div>
                        </div>
                        <h4><em>07月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1417.html" target="_blank">投之家举行海滨拓展 放逐青春梦想</a></h3>
                                <span class="time">2015-07-11</span>
                                <a href="{!! config('app.url') !!}/about/latest/1417.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img09.jpg?ver=20160431006" alt="投之家举行海滨拓展 放逐青春梦想" /></a>
                                <p>炎炎夏日挡不住年轻的激情，秀美风光映衬出青春的梦想。7月11、12日，投之家团队来到惠州霞涌，开展了一场丰富多彩、形式多样的夏季团队活动，在美丽的海边享受大海与海风带来丝丝凉意！</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1390.html" target="_blank">投之家“捡便宜”正式上线 首台iPhone6以3388元被捡走</a></h3>
                                <span class="time">2015-07-09</span>
                                <a href="{!! config('app.url') !!}/about/latest/1390.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img10.jpg?ver=20160431006" alt="投之家“捡便宜”正式上线 首台iPhone6以3388元被捡走" /></a>
                                <p>7月9日10:00整，投之家最新推出的一款“捡便宜”感恩回馈活动正式上线。活动上线当天，得到了众多投之家新、老用户的积极响应，纷纷转发分享活动消息。最终，首台iPhone6在10：19以3388元被投之家幸运用户z***mm（投之家账户的注册信息显示为：来自深圳的曾**女士）竞得。</span></a></p>
                            </div>
                        </div>
                        <h4><em>06月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1267.html" target="_blank">投之家亿级融资荣耀结束 感恩回馈盛大开启</a></h3>
                                <span class="time">2015-06-18</span>
                                <a href="{!! config('app.url') !!}/about/latest/1267.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img11.png?ver=20160431006" alt="投之家亿级融资荣耀结束 感恩回馈盛大开启" /></a>
                                <p>6月24日，投之家母公司盈灿集团在上海召开的B轮融资暨“互联网金融生态圈战略”发布会圆满落幕，并正式宣布获得中国知名风投机构赛富亚洲投资基金和创东方亿元投资。与此同时，为感谢新老投资用户的鼎力支持与持续关注，投之家特发起“理财大狂欢”系列感恩回馈活动，邀请用户朋友一起庆祝，一起狂欢。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1145.html" target="_blank">投之家上线九个月成交破十亿 六月厚礼重磅启动</a></h3>
                                <span class="time">2015-06-10</span>
                                <a href="{!! config('app.url') !!}/about/latest/1145.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img12.png?ver=20160431006" alt="投之家上线九个月成交破十亿 六月厚礼重磅启动" /></a>
                                <p>国内首家P2P垂直搜索引擎投之家上线短短九个月，成交额突破十亿大关，仅五月单月成交量就超过3亿元，环比增长55.8%，增长速率令业界惊叹。今夏六月，已然成为投之家的感恩回馈月，百万现金红包、iPhone6、iPad mini以及各种金条银条，只为投资者准备。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1097.html" target="_blank">投之家也玩一把穿越，回到童年庆祝六一</a></h3>
                                <span class="time">2015-06-01</span>
                                <a href="{!! config('app.url') !!}/about/latest/1097.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img13.jpg?ver=20160431006" alt="投之家也玩一把穿越，回到童年庆祝六一" /></a>
                                <p>六一儿童节，不仅是小朋友们的节日，超龄儿童们也奇思妙想以各种形式致敬童年，这次，投之家就别出心裁的玩了一把穿越。正午，投之家团队三十多人身穿海魂衫，头戴红军帽，系上红领巾，精神抖擞地来到写字楼下，鲜艳的少先队装扮已经引起了路人的注目。</span></a></p>
                            </div>
                        </div>
                        <h4><em>05月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1104.html" target="_blank">大数据时代金融创新与学术发展论坛成功举办</a></h3>
                                <span class="time">2015-05-29</span>
                                <a href="{!! config('app.url') !!}/about/latest/1104.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img14.jpg?ver=20160431006" alt="大数据时代金融创新与学术发展论坛成功举办" /></a>
                                <p>2015年5月29日， 由深圳投之家金融信息服务有限公司与哈尔滨工业大学深圳研究生院计算机科学与技术学院共同主办的大数据时代金融创新与学术发展论坛在深圳大学城成功举办。活动现场，投之家CTO覃武权、融金所运营总监慕嘉兴、投哪网品牌总监郝歌发表主题演讲，与研究生和业内人士共同探讨了大数据在互联网金融中的应用与实践。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1025.html" target="_blank">“518互联网金融理财节”圆满落幕 投之家单日成交破3000万</a></h3>
                                <span class="time">2015-05-19</span>
                                <a href="{!! config('app.url') !!}/about/latest/1025.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img15.jpg?ver=20160431006" alt="“518互联网金融理财节”圆满落幕 投之家单日成交破3000万" /></a>
                                <p>5月18日，首届“518互联网金融理财节”落下帷幕，据统计，4月24日活动上线以来，投之家累计成交金额超过2.5亿元人民币，新增用户8000余人次。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/1017.html" target="_blank">“518互联网金融理财节”火爆 投之家半日成交破千万</a></h3>
                                <span class="time">2015-05-18</span>
                                <a href="{!! config('app.url') !!}/about/latest/1017.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img16.jpg?ver=20160431006" alt="“518互联网金融理财节”火爆 投之家半日成交破千万" /></a>
                                <p>5月18日，投之家“518互联网金融理财节”活动继续升级。18日全天投之家在坐落于深圳市南山区的科兴科学园东大门举办丰富多彩的线下活动，将“518互联网金融理财节”推向高潮。</span></a></p>
                            </div>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/992.html" target="_blank">投之家CEO黄诗樵变身美国队长走进《复联2》首映礼</a></h3>
                                <span class="time">2015-05-12</span>
                                <a href="{!! config('app.url') !!}/about/latest/992.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img17.jpg?ver=20160431006" alt="投之家CEO黄诗樵变身美国队长走进《复联2》首映礼" /></a>
                                <p>5月12日，投之家携518互联网金融理财节走进《复仇者联盟2》上海首映礼，现场500位观众在观看大片的同时，有机会与投之家CEO黄诗樵零距离接触，了解并参与到518“互联网金融理财节”的活动中。</span></a></p>
                            </div>
                        </div>
                        <h4><em>04月</em><br>2015年</h4>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <div class="event-main">
                                <i class="shape-arrow"></i>
                                <h3><a href="{!! config('app.url') !!}/about/latest/895.html" target="_blank">投之家组织员工开展登山活动</a></h3>
                                <span class="time">2015-04-27</span>
                                <a href="{!! config('app.url') !!}/about/latest/895.html" target="_blank"><img src="//static.touzhijia.com/images/about/activity/img18.jpg?ver=20160431006" alt="投之家组织员工开展登山活动" /></a>
                                <p>阳春三月，莺飞草长，又到一年春风得意时。为丰富投之家各位小伙伴的业余生活，提高身体素质，同时加强公司的凝聚力，4月26日，投之家组织全体员工赴深圳塘朗山进行登山活动。</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop