@extends('layout.main')
@section('title')我的天眼投@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
    <div class="container clearfix">
        @include('account.common.menu')
        <div class="main tworow">
            <div class="main-inner">
                <div class="info-wrap clearfix">
                    <dl class="info-description-mod">
                        <dt>资产总额(元)
                            <a href="javascript:void(0)">
                                <i>?</i>
                                <p>资产总额【<span>{!! $user->money->total or '0.00' !!}</span>元】= 待回款本金【<span>0.00</span>元】+ 冻结金额【<span>{!! $user->money->withdraw or '0.00' !!}</span>元】+ 账户余额【<span>0.00</span>元】</p>
                            </a>
                        </dt>
                        <dd>{!! $user->money->total or '0.00' !!}</dd>
                    </dl>
                    <dl class="info-description-mod">
                        <dt>可用金额(元)</dt>
                        <dd>{!! $user->money->money or '0.00' !!}</dd>
                    </dl>
                    <dl class="info-description-mod">
                        <dt>冻结金额(元)</dt>
                        <dd>{!! $user->money->withdraw or '0.00' !!}</dd>
                    </dl>
                    <dl class="info-description-mod">
                        <dt>冻结返利(元)</dt>
                        <dd>{!! $user->money->rebate or '0.00' !!}</dd>
                    </dl>
                    <div class="shortcuts">
                        {{--<a href="wallet/recharge.html" class="btn-recharge btn-s">充值</a>--}}
                        <a href="/wallet/withdraw.html" class="btn-widthdraw btn-s">提现</a>
                    </div>
                </div>

                <div class="info-detail-wrap clearfix">
                    <dl>
                        <dt><i class="info-icon ic-calendar"></i></dt>
                        <dd>您在天眼投理财<br><em>2</em>天</dd>
                    </dl>
                    <dl>
                        <dt><i class="info-icon ic-dollar"></i></dt>
                        <dd>累计收益
                            <a href="javascript:void(0)">
                                <i>?</i>
                                <p>投资收益【<span>0.00</span>元】+ 天眼投奖励(包含理财券奖励)【<span>0.00</span>元】</p>
                            </a>
                            <br><em>0.00</em>元
                        </dd>
                    </dl>
                    <dl>
                        <dt><i class="info-icon ic-awards"></i></dt>
                        <dd>之家奖励<br><em>0.00</em>元</dd>
                    </dl>
                </div>

                <!-- <div class="module-devider"></div>
                <a href="javascript:;" class="broadcast-placeholder">
                  <img src="https:http://static.tianyantou.com/images/user/report.png?ver=20160431006" alt="" width="926" height="60">
                </a> -->
                <!--平台投资-->
                <div class="module-devider"></div>
                <div class="plat-invest">
                    <h2>平台投资<a rel="btn-fresh" href="javascript:void(0)" class="fresh"><i class="iconfont"></i></a></h2>
                    <div style="text-align: center; font-size: 16px; padding: 30px;" id="no-plat-distribution-data">
                        <p>21道风控精选平台，高达18%年化收益，还有1%加息券等着您----<a style="color: #2AA3CE;" href="../www.touzhijia.com/platform/project.html">去看看>></a></p>
                    </div>
                </div>
                <div class="module-devider"></div>
                <input name="utoken" type="hidden" value="f33727ce94e40d191cd7b45e80cc86d6">
                <div class="chart-calendar">
                    <div class="tab click-tab">
                        <ul class="tab-nav">
                            <li class="active"><a href="javascript:void(0);">资金日历</a></li>
                            <li><a href="javascript:void(0);">近半年收益</a></li>
                        </ul>
                        <div class="tab-main">
                            <div class="active">
                                <p class="summary-info">&nbsp;&nbsp;<em></em></p>
                                <ul class="color-tags clearfx">
                                    <li style="color:#2aa3ce;"><i style="background-color:#2aa3ce;"></i>已还</li>
                                    <li style="color:#fb4242"><i style="background-color:#fb4242"></i>待还</li>
                                    <li style="color:#FB9142;"><i style="background-color:#FB9142;"></i>已收</li>
                                    <li style="color:#79B32B;"><i style="background-color:#79B32B;"></i>待收</li>
                                </ul>
                                <div id="paieback-calendar" class="paieback-calendar">
                                </div>
                            </div>
                            <div >
                                <div id="profit-chart" class="profit-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="module-devider"></div>
                <div class="module-section">
                    <h4 class="sec-tit">去这里赚钱</h4>
                    <!-- 与原有的一样 -->
                    <ul class="logolink">
                        @foreach($corps as $cv)
                        <li>
                            <a href="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html" onclick="javascript:_paq.push(['trackEvent', 'home-click', 'ad-hot-plat', 'ad-0']);" target="_blank" title="{!! $cv->platform !!}">
                                <p class="logoimgp">
                                    <img src="{!! config('app.static_url') !!}{!! $cv->logo  or ''!!}" alt="{!! $cv->platform !!}" title="{!! $cv->platform !!}" height="55">
                                </p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/highcharts.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/fullcalendar/moment.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/fullcalendar/lang-all.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/incomechart.js"></script>
@stop
