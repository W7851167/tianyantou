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
            <h2>网站公告</h2>
            <div class="content notice">
                <div class="axis-box">        <div class="axis-line"></div>
                    <div class="notice-box">
                        <span>2016-09-05</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3188.html" title="骏业日新，投之家迁新家啦" target="_blank">骏业日新，投之家迁新家啦</a></h3>
                            <p>亲爱的之家哥：
                                莺迁仁里，燕贺德邻。即日起，因公司业务规模发展需要，投之家办公地址由“深圳市南山区科兴科学园B1单元901”迁至“深圳市南山区特发信息科技大厦601”，愿...<a class="toggle" href="https://www.touzhijia.com/about/notice/3188.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-09-02</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3187.html" title="感恩回馈！投之家“红包”全新上线" target="_blank">感恩回馈！投之家“红包”全新上线</a></h3>
                            <p>亲爱的之家哥：
                                在投之家2周年庆典暨A轮融资发布会来临之际，为了回馈广大新老用户，即日起，投之家特新增一项投资福利——投之家“红包”，具体使用规则如下：
                                1. 投资时选...<a class="toggle" href="https://www.touzhijia.com/about/notice/3187.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-08-31</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3185.html" title="关于暂停与国诚金融合作的公告" target="_blank">关于暂停与国诚金融合作的公告</a></h3>
                            <p>亲爱的之家哥：
                                经双方友好协商，自8月31日起，投之家将暂停与国诚金融的合作事宜，相关展示一并下线。另，在合作期间通过投之家至国诚金融进行的投资，仍继续享有投之...<a class="toggle" href="https://www.touzhijia.com/about/notice/3185.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-08-16</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3174.html" title="“等额本息回款”债权全新上线" target="_blank">“等额本息回款”债权全新上线</a></h3>
                            <p>亲爱的之家哥：
                                根据市场发展的需要，为满足投资人资金流动性的需求，积极对接平台的消费金融债权，即日起，投之家将新增还款方式为”等额本息”的债权组合，等额本息债权...<a class="toggle" href="https://www.touzhijia.com/about/notice/3174.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-08-11</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3172.html" title="欢迎新成员金投手正式接入投之家" target="_blank">欢迎新成员金投手正式接入投之家</a></h3>
                            <p>亲爱的之家哥：
                                经风控团队严谨细致的调研与评估，金投手现已通过投之家的风控认证，并于即日起正式上线，成为投之家大家庭的一员。
                                欢迎广大新老用户前往投资体验(http...<a class="toggle" href="https://www.touzhijia.com/about/notice/3172.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-08-03</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3168.html" title="欢迎新成员短融网正式接入投之家" target="_blank">欢迎新成员短融网正式接入投之家</a></h3>
                            <p>亲爱的之家哥：
                                经风控团队严谨细致的调研与评估，短融网现已通过投之家的风控认证，并于即日起正式上线，成为投之家大家庭的一员。
                                欢迎广大新老用户前往投资体验(http...<a class="toggle" href="https://www.touzhijia.com/about/notice/3168.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-07-27</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3166.html" title="关于新平台e融所正式上线的公告" target="_blank">关于新平台e融所正式上线的公告</a></h3>
                            <p>亲爱的之家哥：
                                经风控团队严谨细致的调研与评估，e融所现已通过投之家的风控认证，并于即日起正式上线，成为投之家大家庭的一员。
                                欢迎广大新老用户前往投资体验(https...<a class="toggle" href="https://www.touzhijia.com/about/notice/3166.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-07-26</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3165.html" title="关于投之家理财社区正式上线的公告" target="_blank">关于投之家理财社区正式上线的公告</a></h3>
                            <p>亲爱的之家哥：
                                为方便广大投资人分享理财经验，促进用户与投之家的反馈交流，经投之家技术和产品团队的日夜奋战，投之家理财社区现已正式上线。
                                欢迎新老用户积...<a class="toggle" href="https://www.touzhijia.com/about/notice/3165.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-07-21</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3163.html" title="关于升级“资产总额”和“累计收益”结算方式的公告" target="_blank">关于升级“资产总额”和“累计收益”结算方式的公告</a></h3>
                            <p>亲爱的之家哥：
                                即日起，投之家对结算系统进行升级。其中，将“资产总额”和“累计收益”的结算方式升级如下：
                                资产总额=待回款本金+活期金额+冻结金额+账户余额
                                累计收益=...<a class="toggle" href="https://www.touzhijia.com/about/notice/3163.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="notice-box">
                        <span>2016-07-21</span>
                        <div class="axis-info">
                            <i class="shape-circle"></i>
                            <h3 class="title-gray-bold"><a href="https://www.touzhijia.com/about/notice/3162.html" title="关于升级投之家活期产品结算方式的公告" target="_blank">关于升级投之家活期产品结算方式的公告</a></h3>
                            <p>亲爱的之家哥：
                                为提升活期产品体验，满足广大用户的理财需求，投之家现升级活期产品结算方式。即日起，活期产品保持原有收益计算方式不变，将原来每日结算后存至活期账...<a class="toggle" href="https://www.touzhijia.com/about/notice/3162.html" target="_blank"><span class="open">[全文]</span></a></p>
                        </div>
                    </div>
                    <div class="pagination" data-pagination-ref="notice"><a class="curr">1</a><a href="notice?page=2" data-ci-pagination-page="2">2</a><a href="notice?page=3" data-ci-pagination-page="3">3</a><a href="notice?page=2" data-ci-pagination-page="2"><span class="next">&#xe660;</span></a></div>    </div>  </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop