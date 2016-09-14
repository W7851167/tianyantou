@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css?ver=20160431006" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">

            <div class="l-side-menu" style="height: 874px;">
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
                            <li><a href="https://account.touzhijia.com/platforms/analysis.html">投资明细</a></li>
                            <li class="current"><a href="https://account.touzhijia.com/platform/bind.html">平台绑定</a></li>
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
            <div class="main tworow" style="height: 876px;">
                <div class="main-inner">
                    <h1 class="section-title">平台绑定</h1>

                    <div class="tab click-tab">
                        <ul class="tab-nav">
                            <li class="active"><a href="javascript:void(0);">已绑定平台</a></li>
                            <li><a href="javascript:void(0);">未绑定平台</a></li>
                        </ul>
                        <div class="tab-main">
                            <div class="active">
                                <div class="tab-content tab-content-table">
                                    <table class="table table-bordered ucenter-table">
                                        <thead>
                                        <tr>
                                            <th>平台名称</th>
                                            <th>绑定用户名</th>
                                            <th>账号类型</th>
                                            <th>绑定时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="norecord">
                                            <td colspan="5">
                                                您还没有绑定平台
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <div class="tab-content tab-content-table">
                                    <table class="table table-bordered ucenter-table">
                                        <thead>
                                        <tr>
                                            <th>平台名称</th>
                                            <th>绑定用户名</th>
                                            <th>账号类型</th>
                                            <th>绑定时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_duanrongwang.html"
                                                   target="_blank">
                                                    短融网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_lianhao.html"
                                                   target="_blank">
                                                    联豪创投 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_shanyidai.html"
                                                   target="_blank">
                                                    杉易贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_gzed.html"
                                                   target="_blank">
                                                    广州e贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_yesvion.html"
                                                   target="_blank">
                                                    粤商贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_chujinsuo.html"
                                                   target="_blank">
                                                    楚金所 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_baobidai.html"
                                                   target="_blank">
                                                    生菜金融 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_xinrong.html"
                                                   target="_blank">
                                                    信融财富 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_365ibank.html"
                                                   target="_blank">
                                                    天天财富 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_wyjr.html"
                                                   target="_blank">
                                                    万盈金融 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_51rzy.html"
                                                   target="_blank">
                                                    融资易 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_chenengdai.html"
                                                   target="_blank">
                                                    车能贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_edai.html"
                                                   target="_blank">
                                                    易贷网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_stjr.html"
                                                   target="_blank">
                                                    石投金融 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_91wangcai.html"
                                                   target="_blank">
                                                    91旺财 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_jujinziben.html"
                                                   target="_blank">
                                                    聚金资本 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_elutongxin.html"
                                                   target="_blank">
                                                    e路同心 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_hepandai.html"
                                                   target="_blank">
                                                    合盘贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_darendai.html"
                                                   target="_blank">
                                                    达人贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_liyedai.html"
                                                   target="_blank">
                                                    立业贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_jintoushou.html"
                                                   target="_blank">
                                                    金投手 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_kaixindai.html"
                                                   target="_blank">
                                                    开鑫贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_huiyingdai.html"
                                                   target="_blank">
                                                    汇盈金服 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_zhubaodai.html"
                                                   target="_blank">
                                                    珠宝贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_bojd.html"
                                                   target="_blank">
                                                    博金贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_rxdai.html"
                                                   target="_blank">
                                                    投哪网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_xinyongbao.html"
                                                   target="_blank">
                                                    信用宝 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_huitouwang.html"
                                                   target="_blank">
                                                    汇投网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_erongsuo.html"
                                                   target="_blank">
                                                    e融所 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop