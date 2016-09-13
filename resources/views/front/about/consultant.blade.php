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
            <h2>专家顾问</h2>
            <div class="content expert">
                <div class="axis-box">
                    <div class="axis-line"></div>
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="http://static.tianyantou.com/images/consultant/yanyan2.jpg?ver=20160431006" width="168" height="168">
                            <span class="mask">阎焱</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">赛富亚洲基金首席合伙人</h3>
                            <p>曾任AIG亚洲基础设施投资基金大中国地区董事总经理、SprintInternationalCorporation亚洲区策划及业务拓展董事、美国华盛顿HudsonInstitute研究员和世界银行研究员等职。阎先生曾获得多项荣誉，其中包括“2004年度中国最佳创业投资人”，“2005年中国十佳创业投资人”。其所领导的赛富（SAIF）基金也被中国风险投资协会评选为“2004年度最佳创业投资机构”，“2005年最活跃创业投资基金”，“2005年最佳融资基金”。SAIF在盛大娱乐互动有限公司的投资于2003被评选为“年度最佳投资案例”，并于2004年被评选为“年度最佳退出案例”。2006年二月，SAIF更被世界著名的PrivateEquity International 评选为“2005年亚洲最佳投资基金”。</p>
                        </div>
                    </div>
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="http://static.tianyantou.com/images/consultant/xiaoshuolong2.jpg?ver=20160431006" width="168" height="168">
                            <span class="mask">肖水龙</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">创东方投资董事长、总裁、创始合伙人</h3>
                            <p>同济大学材料学学士及管理硕士，美国纽约城市大学金融投资进修一年。中国创投委2012年度“卓越投资家”（金奖）获得者，至今主持投资案例逾50个，包括长园新材、维尔利、康芝药业等十几家上市企业。自1988年6月起，肖水龙在深圳国际信托投资公司（深国投）工作二十年，期间曾任深国投（现华润信托）董事常务副总经理并曾主持工作，曾任信托地产副总经理、参与创立深国投商用置业公司并任董事，曾任沃尔玛深国投百货公司董事、国信证券董事、上市公司深信泰丰董事长，熟悉金融信托、股权投资、地产开发等领域，拥有丰富的创业投资及地产基金业务经验和广泛的投资业务资源。</p>
                        </div>
                    </div>
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="http://static.tianyantou.com/images/consultant/feifangyu2.jpg?ver=20160431006" width="168" height="168">
                            <span class="mask">费方域</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">上海交通大学中国金融研究院副院长</h3>
                            <p>上海交通大学中国金融研究院副院长、教授、博士生导师, 中国工业经济研究学会常务副理事长,上海现代经济研究所所长。曾任上海交通大学高级金融学院副院长,上海交通大学经济学院执行院长,上海交通大学经济研究中心主任,上海交通大学转型经济 研究中心主任,上海交通大学SMITH实验经济学研究中心 (SRCEE)执行主任,上海金属期货交易所理事,上海市人大常委 会咨询专家,上海市法律与经济研究所学术委员等。</p>
                        </div>
                    </div>
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="http://static.tianyantou.com/images/consultant/liaijun2.jpg?ver=20160431006" width="168" height="168">
                            <span class="mask">李爱君</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">中国政法大学金融法研究中心副主任</h3>
                            <p>法学博士，理论经济学博士后，中国政法大学教授，任教于中国政法大学民商经济法学院财税金融法研究所，北京鑫河律师事务所律师，中国银行法学研究会副秘书长、常务理事，北京市经济法学研究会理事。</p>
                        </div>
                    </div>
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="http://static.tianyantou.com/images/consultant/liugang2.jpg?ver=20160431006" width="168" height="168">
                            <span class="mask">刘钢</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">复旦大学国家示范性软件学院副院长</h3>
                            <p>复旦大学公共绩效与信息化研究中心副主任，电子商务研究中心副主任，CC-CMM标准研究中心主任，中国电子商务协会通信分会副秘书长，<br/>中国呼叫中心产业能力建设管理规范专家委员会副主任委员，上海软件对外贸易联盟副理事长，CC-CMM标准组织首席认证官。</p>
                        </div>
                    </div>
                    <div class="expert-box">
                        <div class="expert-img">
                            <img src="http://static.tianyantou.com/images/consultant/xuduoqi2.jpg?ver=20160431006" width="168" height="168">
                            <span class="mask">许多奇</span>
                        </div>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold">上海交通大学经济法研究所副所长</h3>
                            <p>上海交通大学凯原法学院教授，2003年武汉大学法学院博士毕业后任教于上海交通大学，2008-2009年度美国纽约大学法学院HauserGlobal项目访问学者，2013年台湾大学法学院访问教授。现任上海交通大学财税法研究中心主任、金融法律与政策研究中心执行主任、《互联网金融法律评论》主编。研究方向财税金融法。</p>
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