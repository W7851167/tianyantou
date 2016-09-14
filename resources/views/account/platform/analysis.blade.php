@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">

            <div class="l-side-menu" style="height: 1295px;">
                <ul class="first-menu">
                    <li>
                        <div class="user-avatar">
                            <img src="./投之家 - 个人中心_files/headerimg2.png" alt="" width="100" height="100">
        <span class="user-nickname" title="15072309522">
          15072309522          <a class="iconfont" style="color: #666;"
                                  href="https://account.touzhijia.com/safe.html"></a>        </span>
                            <p class="accoount-validation mt10">
                                <a href="https://account.touzhijia.com/safe.html" title="身份验证"><i class="icon-identity"></i></a>
                                <a href="https://account.touzhijia.com/safe.html" title="手机验证" class="activated"><i
                                            class="icon-phoneno"></i></a>
                                <a href="https://account.touzhijia.com/safe.html" title="邮箱验证"><i
                                            class="icon-email"></i></a>
                                <a href="https://account.touzhijia.com/safe.html" title="银行卡验证"><i
                                            class="icon-bankcard"></i></a>
                            </p>
                            <div class="checkin-area">
                                <div class="check-in ">
                                    <p>积分：<span>10</span></p>
                                </div>
                                <i>+5</i>
                                <div class="checkin-rules">
                                    <p>您已连续签到 <em class="checkin-days">0</em>
                                        天，今日签到<em class="check-points">+1</em></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="https://account.touzhijia.com/"><i class="iconfont"></i>我的投之家</a></li>
                    <li><h3><i class="iconfont"></i>理财管理</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/huoqi.html">活期</a></li>
                            <li><a href="https://account.touzhijia.com/debt.html">定期</a></li>
                            <li><a href="https://account.touzhijia.com/debt/transfer.html">债权转让</a></li>
                            <li><a href="https://account.touzhijia.com/debt/autobuy.html">自动购买</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>全网通</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/networth/index.html">投资记录</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>平台管理<span class="iconfont newicon"></span></h3>
                        <ul class="second-menu" style="display: block;">
                            <li><a href="https://account.touzhijia.com/platforms/statistic.html">平台统计</a></li>
                            <li class="current"><a href="https://account.touzhijia.com/platforms/analysis.html">投资明细</a>
                            </li>
                            <li><a href="https://account.touzhijia.com/platform/bind.html">平台绑定</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>资金管理</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/wallet/recharge.html">充值</a></li>
                            <li><a href="https://account.touzhijia.com/wallet/withdraw.html">提现</a></li>
                            <li><a href="https://account.touzhijia.com/wallet/book.html">资金流水</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>账号管理</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/safe.html">安全中心</a></li>
                            <li><a href="https://account.touzhijia.com/bankcard.html">银行卡</a></li>
                        </ul>
                    </li>
                    <li><h3><i class="iconfont"></i>活动专区</h3>
                        <ul class="second-menu">
                            <li><a href="https://account.touzhijia.com/activity/recommend.html">邀请奖励</a></li>
                            <li><a href="https://account.touzhijia.com/activity/tcode.html">专享T码</a></li>
                            <li><a href="https://account.touzhijia.com/shop.html">兑换记录</a></li>
                        </ul>
                    </li>
                    <li><a href="https://account.touzhijia.com/coupon/index.html"><i class="iconfont"></i>理财券</a></li>
                    <li><a href="https://account.touzhijia.com/message.html"><i class="iconfont"></i>消息中心</a></li>
                </ul>
            </div>
            <div class="main tworow" style="height: 1297px;">
                <!-- 主要内容start -->
                <div class="main tworow platform-manage" style="height: 1297px;">
                    <div class="main-inner">
                        <h1 class="section-title">投资明细</h1>
                        <div class="cont-box-wrap">
                            <div class="content-unit">
                                <div class="unit-bd unit-3">
                                    <dl>
                                        <dt>投资金额(元)</dt>
                                        <dd>0.00</dd>
                                    </dl>
                                    <dl>
                                        <dt>累计收益(元)</dt>
                                        <dd>0.00</dd>
                                    </dl>
                                    <dl>
                                        <dt>累计投资平台数(个)</dt>
                                        <dd>0</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="filter-group">
                                <dl class="filter plat-filter">
                                    <dt>购买时间：</dt>
                                    <dd class="active"><a
                                                href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=all">全部</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=3days&amp;type=all&amp;platform=all">近3天</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=7days&amp;type=all&amp;platform=all">近7天</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=1month&amp;type=all&amp;platform=all">近1个月</a>
                                    </dd>
                                </dl>
                                <dl class="filter plat-filter">
                                    <dt>投资类型：</dt>
                                    <dd class="active"><a
                                                href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=all">全部</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=ing&amp;platform=all">进行中</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=done&amp;platform=all">已完成</a>
                                    </dd>
                                </dl>
                                <dl class="filter project-origin noborder" style="height: 76px;">
                                    <dt>投资平台：</dt>
                                    <dd class="active"><a
                                                href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=all">全部</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=erongsuo">e融所</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=huitouwang">汇投网</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=xinyongbao">信用宝</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=rxdai">投哪网</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=bojd">博金贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=zhubaodai">珠宝贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=huiyingdai">汇盈金服</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=kaixindai">开鑫贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=jintoushou">金投手</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=liyedai">立业贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=darendai">达人贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=hepandai">合盘贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=elutongxin">e路同心</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=jujinziben">聚金资本</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=91wangcai">91旺财</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=stjr">石投金融</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=edai">易贷网</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=chenengdai">车能贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=51rzy">融资易</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=wyjr">万盈金融</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=365ibank">天天财富</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=xinrong">信融财富</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=baobidai">生菜金融</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=chujinsuo">楚金所</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=yesvion">粤商贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=gzed">广州e贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=shanyidai">杉易贷</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=lianhao">联豪创投</a>
                                    </dd>
                                    <dd>
                                        <a href="https://account.touzhijia.com/platforms/analysis.html?date=all&amp;type=all&amp;platform=duanrongwang">短融网</a>
                                    </dd>
                                </dl>
                                <div class="filter-btn"><a href="javascript:;" class="btn filterBtnOpen"
                                                           style="display: inline-block;">展开<i class="iconfont"></i></a><a
                                            href="javascript:;" class="btn filterBtnClose" style="display: none;">收起<i
                                                class="iconfont"></i></a></div>
                            </div>
                            <!-- 分析结果start -->
                            <!-- 分析结果start -->
                            <div class="records-list-wrap">
                                <!-- 无记录  默认不显示  如需显示加style="display:table;"-->
                                <table class="table table-gray ucenter-table table-norecord">
                                    <thead>
                                    <tr>
                                        <th width="86" class="first-col">平台名称</th>
                                        <th width="110">标的名称</th>
                                        <th width="100">投资金额(元)</th>
                                        <th width="100">到期收益(元)</th>
                                        <th width="100">购买时间</th>
                                        <!--<th width="100">到期日</th>-->
                                        <th width="75">投资期限</th>
                                        <th width="65">状态</th>
                                        <th width="65">加息券</th>
                                        <th width="65">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="norecord">
                                        <td colspan="9">账户中没有符合条件的记录！</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- 查询结果end -->            <!-- 查询结果end -->
                            <!-- 翻页start -->
                            <div class="flip-wrap">
                                <div class="pagination"></div>
                            </div>
                            <!-- 翻页end -->
                            <div class="tip tab-rules">
                                <h3 class="title-indent">平台加息券说明：</h3>
                                <div class="tip-main">
                                    <ul class="tab-content">
                                        <li>1. 使用积分在积分商城兑换平台加息券。</li>
                                        <li>2. 从2015年12月4日活动开始后的平台投资记录里，手动匹配使用平台加息券，加息奖励会返还到账户余额（
                                            注：新手体验标、转让标、已还清的投资记录、活动开始前的投资标的除外）。
                                        </li>
                                        <li>3. 平台加息券：有效期为1个月，购买时自动激活，每张加息券使用限额为10万元，最多可以获取30天的加息收益。
                                            加息收益=加息额度*投资金额*债权期限/365（债权期限＜30天以债权期限为准，债权期限≥30天按30天计算），例如：
                                            投资平台100000元，购买了1个月的债权，使用1%该平台加息券，获取的收益为：1%*100000*30/365=82.19元。
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 主要内容end -->
            </div>
        </div>
    </div>
@stop
