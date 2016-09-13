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
            <h2>公司介绍</h2>
            <div class="content">
                <p><a href="https://www.touzhijia.com" class="hight-light">深圳投之家金融信息服务有限公司（www.touzhijia.com）</a>2014年9月16日正式上线运营，是国内专业领先的P2P网贷垂直搜索引擎。</p>
                <p>深圳投之家金融信息服务有限公司秉承“精选、分散”的安全投资理念，旨在通过严格的风控管理、创新的互联网技术，为用户提供优质靠谱的搜索、比较、一站式投资服务，让用户的投资理财变得安全、简单、高效。</p>
                <p>深圳投之家金融信息服务有限公司拥有行业内规模较大，专业性强的网贷平台风控考察团队，累计走访了500多家P2P平台，并对180多家平台从风控、法务、财务、运营、IT等多方面进行严格的实地认证。只有通过风控团队实地认证的平台，才会被投之家收录，确保平台的真实可靠性。</p>
                <p>深圳投之家金融信息服务有限公司网贷研究院经过近三年的数据研究和积累，推出了网贷安全评级，通过60多个指标，从六个维度全方位展示平台的真实运营情况，让投资风险、收益一目了然，辅助投资人更好地做出投资决策。</p>
                <p>基于平台认证与安全评级，深圳投之家金融信息服务有限公司推出投资保障计划——T盾计划，保障用户的投资安全，真正做到为投资人保驾护航！</p>
                <img src="//static.touzhijia.com/images/about/company-system.png?ver=20160431006" />
            </div>
            <div class="company gradient-box">
                <h3>创始团队</h3>
                <ul>
                    <li>
                        <img src="//static.touzhijia.com/images/about/team-xu.jpg?ver=20160431006">
                        <div class="mask">
                            <h4>徐红伟<span>（董事长）</span></h4>
                            <p>网贷之家创始人，盈灿集团现任董事长兼总裁，中国政法大学互联网金融创新与法制研究中心副主任。曾就职于世界500强企业宝钢集团中央研究院，价值需求论倡导者。早前曾从事信用卡投资理财研究及实践，精通价格投资。主编国内第一本网贷投资手册《P2P网贷投资手册》,主编《2013网络借贷行业蓝皮书》。担任新浪财经专栏作家，在《中国征信》、第一财经日报《财商》等权威期刊、媒体发表多篇网贷行业研究文章。</p>
                        </div>
                    </li>
                    <li>
                        <img src="//static.touzhijia.com/images/about/team-zhu.jpg?ver=20160431006">
                        <div class="mask">
                            <h4>朱明春<span>（副董事长）</span></h4>
                            <p>2011年联合创办网贷之家网站，现任盈灿集团执行副总裁，清华大学经济管理学院金融硕士行业导师，广东互联网金融协会副会长兼秘书长，民间金融互联网化、阳光化倡导者。多次接受中央二套、凤凰卫视等电视节目关于互联网金融报道的采访。</p>
                        </div>
                    </li>
                    <li>
                        <img src="//static.touzhijia.com/images/about/team-shiqiao.jpg?ver=20160431006">
                        <div class="mask">
                            <h4>黄诗樵<span>（联合创始人 · CEO）</span></h4>
                            <p>毕业于哈尔滨工业大学，在大数据及互联网领域创业投资多年，拥有12年互联网技术和运营经验，在互联网金融领域拥有丰富的全流程实操经验。先后就职于平安集团、平安银行、创东方投资等企业，负责互联网金融系统搭建和大数据技术及应用。熟悉银行、保险、VC、私募基金、资产证券化等金融业务，曾创办过多家企业，有丰富的企业管理经验及广泛的市场资源。2014年，参与创办投之家。</p>
                        </div>
                    </li>
                    <li>
                        <img src="//static.touzhijia.com/images/about/team-dengwei.jpg?ver=20160431006">
                        <div class="mask">
                            <h4>邓伟<span>（联合创始人 · COO）</span></h4>
                            <p>毕业于复旦大学经济学系，曾远赴西藏墨脱进行支教，背包旅游游历大半个中国。先后就职于去哪儿、百度等知名互联网企业，百度LBS事业部创始团队成员。2013年，在O2O领域创业。在OTA、O2O等相关行业，对垂直搜索类互联网产品有着丰富的产品设计、运营实战经验。2014年，参与创办投之家。</p>
                        </div>
                    </li>
                    <li>
                        <img src="//static.touzhijia.com/images/about/team-wuqian.jpg?ver=20160431006">
                        <div class="mask">
                            <h4>覃武权<span>（联合创始人 · CIO）</span></h4>
                            <p>本科学历，曾就职于华为、腾讯等著名企业，拥有丰富的互联网产品研发经验，先后参与腾讯搜索业务线技术运维、运营开发、搜索后台开发的工作，撰写过10余项专利技术发明，主导过业界知名产品「QQ音乐搜索」的技术研发。对技术运营驱动产品研发的理念有深刻理解，在运营支撑体系建设、大数据运营、团队管理人才培养等方面有着丰富的实战经验和管理心得。2014年，参与创办投之家。</p>
                        </div>
                    </li>
                    <li>
                        <img src="//static.touzhijia.com/images/about/team-majun.jpg?ver=20160431006">
                        <div class="mask">
                            <h4>马骏<span>（首席风控官）</span></h4>
                            <p>上海盈灿商务咨询有限公司常务副总经理，网贷研究院首席研究员。毕业于上海交通大学，硕士学历，特许金融分析师CFA二级。曾就职于某券商总部及国内领先的量化对冲基金，在证券、期货、网贷等多个金融子领域均有涉足。推出国内首份网贷平台综合指数评级办法，在《中国征信》等权威期刊上发表过网贷行业研究文章。2014年出版《2013中国网络借贷行业蓝皮书》，担任副主编。</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="gradient-box">
                <h3>我们的使命</h3>
                <img src="//static.touzhijia.com/images/about/company-mission.png?ver=20160431006">
            </div>
            <div class="gradient-box">
                <h3>我们的理念</h3>
                <img src="//static.touzhijia.com/images/about/company-concept.png?ver=20160431006">
            </div>
            <div class="gradient-box">
                <h3>我们的价值</h3>
                <img src="//static.touzhijia.com/images/about/company-value.png?ver=20160431006">
            </div>
            <div class="gradient-box">
                <h3>我们的远景</h3>
                <img src="//static.touzhijia.com/images/about/company-prospect.png?ver=20160431006">
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop