@extends('layout.main')
@section('title') p2p网贷,p2p理财,天眼投投资理财平台 @stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/mainindex.css?ver={!! time() !!}" />
@stop
<!--内容开始-->
@section('content')
<div id="index-con" class="wrap">
    <div class="banner-box">
        <!-- 大轮播区 s-->
        <div class="banner-con">
            <div class="banner-play" id="banner-play-mod">
                <div class="banner-play-con imgplaycon">
                    @if(!empty($advs))
                        @foreach($advs as $av)
                            @if(!empty($av->p_img))
                            <a href="{!! $av->url or '' !!}" title="{!! $av->title or '' !!}" target="_blank"><img src="{!! config('app.admin_url') . $av->p_img !!}" alt="{!! $av->title !!}"/></a>
                            @endif
                        @endforeach
                    @endif
                </div>
                <a href="javascript:void(0);" class="perbtn"><i class="iconfont">&#xe65f;</i></a>
                <a href="javascript:void(0);" class="nextbtn"><i class="iconfont">&#xe660;</i></a>
                <p class="banner-nav imgnav"></p>
                <div class="main-data">
                    <div class="main-data-show">
                        <p class="trading-volume">撮合成交量：<span class="data-num" datanum="{!! tmoney_format($stats['total']+10000000000) !!}"></span>元</p>
                        <p class="user-number">累计用户数：<span class="data-num" datanum="{!! tmoney_format($stats['registers']+250000) !!}"></span>人</p>
                        <p class="earnings-num">累计产生收益：<span class="data-num" datanum="{!! tmoney_format($stats['income']+20000000) !!}"></span>元</p>
                        <p class="fund-num">投资笔数：<span class="data-num" datanum="{!! tmoney_format($stats['itotal']+8000) !!}"></span>笔</p>
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
                        <a href="javascript:;" target="_blank">
                            <div class="honour-iconcon">
                                <span class="honour-icon"></span>
                                <p class="honour-title">
                                    <span>多重安全保障体系</span>
                                </p>
                            </div>
                            <p class="honourdetail honourdetail0">
                                本息盾、风控团队<br />把控投资人本金
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" target="_blank">
                            <div class="honour-iconcon">
                                <span class="honour-icon honour-icon0"></span>
                                <p class="honour-title">
                                    <span>严格审核平台背景</span>
                                </p>
                            </div>
                            <p class="honourdetail honourdetail0">
                                平台资质、备案<br />债权严格考核
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" target="_blank">
                            <div class="honour-iconcon">
                                <span class="honour-icon honour-icon1"></span>
                                <p class="honour-title">
                                    <span>分散投资降低风险</span>
                                </p>
                            </div>
                            <p class="honourdetail honourdetail0">
                                多平台、多样化投资
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" target="_blank">
                            <div class="honour-iconcon">
                                <span class="honour-icon honour-icon3"></span>
                                <p class="honour-title">
                                    <span>天眼投收益+平台收益</span>
                                </p>
                            </div>
                            <p class="honourdetail honourdetail0">
                                天眼投给额外年华收益
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="notice">
                <h3 class="notice-title"><span><i class="iconfont">&#xe627;</i>&nbsp;&nbsp;公告</span> <a href="{!! config('app.url') !!}/about/notice.html" target="_blank">更多>></a></h3>
                <ul class="notice-list">
                    @foreach($notices as $nv)
                    <li><a href="{!! config('app.url') !!}/about/notice/{{$nv->id}}.html" target="_blank">{!! $nv->title !!}</a><span>{!! date('m-d',strtotime($nv->created_at)) !!}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- 数据展示区 e-->
    </div>

    <div class="container">
        <!-- 推荐 s-->
        <div class="index-main-modcon">
            <ul class="platform-list-con">
                @foreach($tasks as $tv)
                <li>
                    <p class="platform-ad">
                        <a  href="{!! config('app.url') !!}/platform/{!! $tv->corp->ename or ''!!}.html"  target="_blank" title="点击了解详情"><img src="{!! config('app.static_url') !!}{!! $tv->home_img or '' !!}" height="129" width="294" alt="{!! $tv->corp->name or ''!!}"></a>
                    </p>
                    <div class="plaform-about">
                        <a href="{!! config('app.url') !!}/platform/{!! $tv->corp->ename or ''!!}.html" target="_blank" class="plat-logo" title="{!! $tv->corp->name or '' !!}">
                            <img src="{!! config('app.static_url') !!}{!! $tv->corp->logo or ''!!}" width="85" height="28" alt="">
                        </a>
                        <h4 class="debt-title" title="{!! $tv->title or '' !!}">{!! $tv->title or '' !!}</h4>
                        <div class="platform-data">
                            <p class="earnings-num">年化收益率<br/><b>{!! $tv->ratio or 0.00 !!}</b><i>%</i></p>
                            <p class="time-limit-num">
                                期限<br/><b>{!! $tv->term or '' !!}@if(isset($tv->term_unit)){!! $tv->term_unit == 0 ? '天' : ($tv->term_unit == 1 ? '个月' : '年')!!}@endif</b><i></i>
                            </p>
                            <p class="safe-leavel">安全级别<br><b>{!! $tv->corp->level or 'A' !!}</b></p>
                        </div>
                        <style>

                        </style>
                        <div class="fenge">
                            天眼投再加年化
                            <i>{!! $tv->mratio or 0.00 !!}</i>
                            %
                        </div>
                        <p class="goin-btn">
                            <span>
                                可购金额：{!! tmoney_format($tv->limit) !!} 元
                            </span>
                            <a href="javascript:;" data-sso-url="/platform/login/{!! $tv->corp->ename or '' !!}/{!! $tv->id !!}" rel="platform_join"
                               data-plat-url="{!! $tv->url or '' !!}"  title="{!! $tv->title or ''!!}" class="btn btn-blue" title="投资">投资</a>
                        </p>
                    </div>
                </li>
                 @endforeach
              </ul>
        </div>
        <!-- 推荐 e-->

        <!-- 新闻&公告 s-->
        <div class="news-notice">
            <div class="hot-news">
                <div class="hot-con recent-news">
                    <h2><span>最新动态</span><a href="{!! config('app.url') !!}/about/latest.html" target="_blank">更多&gt;</a></h2>
                    @foreach($latests as $i=>$lv)
                    <ul @if($i / 2 != 0) class="media-report" @endif>
                        <li>
                            <a href="{!! config('app.url') !!}/about/latest/{!! $lv->id !!}.html" target="_blank" class="img-link">
                                <img style="width: 141px;height: 95px;" src="{!! config('app.static_url') !!}{!! $lv->image->name or '' !!}" alt="{!! $lv->title or '' !!}" height="95">
                            </a>
                            <p class="link-con">
                                <a href="{!! config('app.url') !!}/about/latest/{!! $lv->id !!}.html" target="_blank">{!! $lv->title or '' !!}</a>
                                <span>发布时间：{!! date('Y-m-d',strtotime($lv->created_at)) !!}</span>
                            </p>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="hot-notice">
                <h2><span>投资攻略</span><a href="{!! config('app.url') !!}/about/strategy.html" target="_blank">更多&gt;</a></h2>
                <dl class="rank-list">
                    @foreach($strategys as $sv)
                    <dd><a href="{!! config('app.url') !!}/about/strategy/{!! $sv->id or 0 !!}.html" target="_blank" title="{!! $sv->title or '' !!}"><p>{!! $sv->title or '' !!}</p><em>{!! $sv->views or 0 !!}</em></a></dd>
                    @endforeach
                </dl>
            </div>
        </div>
        <!-- 新闻&公告 e-->
    </div>
    <!-- 友情链接 s-->
    <div class="friend-link">
        <p class="friend-link-con">
            <span class="link-title">友情链接：</span>
               <span class="link-detail">
                   @foreach($links as $lv)
                    <a href="{!! $lv->url !!}" target="_blank">{!! $lv->name !!}</a>
                       @endforeach
                 </span>
        </p>
    </div>
    <!-- 友情链接 e-->

</div>
<!--内容结束-->
@stop
<!--底部开始-->
@section('script')
<link rel="stylesheet" href="{!! config('app.static_url') !!}/css/pagestyle/wx_qr.css">
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/normalplugins.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.dotdotdot.min.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/main.js?ver={!! time() !!}"></script>
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/mainindex.js?ver={!! time() !!}"></script>
<script>
    $(document).ready(function(){
        $('div.other-debt-list-live li div').removeClass('fixedbd');
    });
</script>  <!--其他-->
@stop
