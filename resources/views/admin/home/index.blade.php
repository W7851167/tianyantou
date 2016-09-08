@extends('admin.common.layout')
@section('style')

@endsection
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            <div class="content-left ">
                <div class="content-left-heaeder ">
                    <div class="content-left-header-pic clearfix">
                        <a href="javascript:void(0)"><img src="{!! url('cw100_b2b/images/cw100.jpg')!!}"/></a>
                        <div class="content-left-header-pic-page">
                            <span>{!! $userInfo['username'] or ''!!}</span>
                            <p><a href="{!! url('/logout') !!}">退出登录</a></p>
                            <p><a href="{!! url('/account/create') !!}">创建账户</a></p>
                        </div>
                    </div>
                    <div class="content-left-page">
                    </div>
                </div>
                <ul class="content-left-menu clearfix">
                    <li><a class="on" href="{!!url('store/info')!!}">基本信息</a></li>
                    <li><a href="{!!url('goods/add/one')!!}">认领商品</a></li>
                    {{--<li><a href="{!!url('goods/saleup')!!}">商品列表</a></li>--}}
                    <li><a href="{!!url('goods/online/list')!!}">在售商品管理</a></li>
                    <li><a href="{!!url('goods/offline/list')!!}">下家商品管理</a></li>
                </ul>
            </div>
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <img src="{!!url('cw100_b2b/images/u5.png')!!}"/>
                    <a href="{!! url('/dashboard') !!}">商家管理中心&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="{!! url('/dashboard') !!}">首页</a>
                </div>
                <div class="content-right-user clearfix">
                    <div class="content-right-user-lt clearfix">
                        <div class="content-right-user-lt-pic">
                            <img src="{!! url('cw100_b2b/images/cw100.jpg')!!}"/>
                        </div>
                        <ul class="content-right-user-lt-name clearfix">
                            <li>
                                <span>用户姓名：</span>
                                <span></span>
                            </li>
                            <li>
                                <span>最后登录：</span>
                                <span></span>
                            </li>
                            <li>
                                <span>管理权限：</span>
                                <span></span>
                            </li>
                            <li>
                                <span>商家ID：</span>
                                <span></span>
                            </li>
                            <li>
                                <span>店铺ID：</span>
                                <span></span>
                            </li>
                            <li>
                                <span>商家类型：</span>
                                <span>POP</span>
                            </li>
                            <li>
                                <span>店铺名称：</span>
                                <span></span>
                            </li>
                            <li>
                                <span>有效期至：</span>
                                <span>2016-10-10</span>
                            </li>
                        </ul>
                    </div>
                    <div class="content-right-user-rg">
                        <p class="content-right-user-rg-tit">店铺动态评分：</p>
                        <ul class="content-right-user-rg-nums">
                            <li>专业<span class="yellow">{!! $shopInfo['comment_avg'] or '' !!}--<i class="line-icon"></i></span></li>
                            <li>服务<span class="green">{!! $shopInfo['service_avg'] or ''!!}<i class="top-icon"></i></span></li>
                            <li>发货<span class="yellow">{!! $shopInfo['shipping_avg'] or ''!!}<i class="down-icon"></i></span></li>
                        </ul>
                    </div>
                </div>
                <table border="0" cellspacing="" cellpadding="" class="content-news">
                    <tr>
                        <td width="488px" style="border-bottom: 1px solid #F2F2F2;">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line frist"></div>
                                    <div class="td-inner-tit-news">
                                        <p>店铺及商品提示</p>
                                        <span>您需要关注的店铺信息以及待处理事项</span>
                                    </div>
                                </div>
                                <div class="td-inner-cue">
                                    <p>店铺商品发布情况：<span></span></p>
                                    <p>店铺运营推广：
                                        {{--<span>参与活动数<strong class="yellow">1</strong></span>--}}
                                    </p>
                                </div>
                                <ul class="td-inner-tag td-inner-tag-left clearfix">
                                    <li><a href="{!!url('goods/online/list')!!}" class="on">出售中<span class="td-inner-tag-nums">{!! $count['online_goods'] or ''!!}</span></a></li>
                                    <li><a href="{!!url('goods/offline/list')!!}" class="on">下架商品<span class="td-inner-tag-nums">{!! $count['offline_goods'] or ''!!}</span></a></li>
                                    {{--<li><a href="###">违规下架</a></li>--}}
                                    <li><a href="{!!url('consult/index')!!}">待回复咨询<span class="td-inner-tag-nums">@if(!empty($consult)){!! $consult !!} @else 0 @endif</span></a></li>
                                    {{--                                    <li class="mg-lt-no"><a href="{!!url('/promote/promoteList')!!}">到期促销<span class="td-inner-tag-nums"></span></a></li>--}}
                                    {{--<li><a href="###">到期套餐</a></li>--}}
                                    {{--<li><a href="###">到期活动</a></li>--}}
                                </ul>
                            </div>
                        </td>
                        <td width="488px" style="border-left: 1px solid #F2F2F2;border-bottom: 1px solid #f2f2f2;">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line second"></div>
                                    <div class="td-inner-tit-news">
                                        <p>交易提醒</p>
                                        <span>您需要立即处理的交易订单</span>
                                    </div>
                                </div>
                                {{--<div class="td-inner-cue">--}}
                                {{--<p>最近售出：<span>交易中的订单<strong class="yellow">3</strong></span></p>--}}
                                {{--<p>维权提示：<span>收到维权投诉<strong class="yellow">1</strong></span></p>--}}
                                {{--</div>--}}
                                <ul class="td-inner-tag td-inner-tag-sc clearfix">
                                    <li><a href="{!! url('/order/list?s=10') !!}" class="on">待付款<span class="td-inner-tag-nums">{!! $count['nopay'] or ''!!}</span></a></li>
                                    <li><a href="{!! url('/order/list?s=12') !!}" class="on">待发货<span class="td-inner-tag-nums">{!! $count['nodelivery'] or '' !!}</span></a></li>
                                    {{--<li><a href="###">售前退款</a></li>--}}
                                    {{--<li><a href="###">售后退款</a></li>--}}
                                    {{--<li><a href="###">售前退货</a></li>--}}
                                    {{--<li><a href="###">售后退货</a></li>--}}
                                    {{--<li><a href="###" class="on">待确认账单<span class="td-inner-tag-nums">1</span></a></li>--}}
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="448px" style="border-bottom: 1px solid #F2F2F2;">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line three"></div>
                                    <div class="td-inner-tit-news">
                                        <p>销量情况统计</p>
                                        <span>按周期统计商家店铺的订单量和订单金额</span>
                                    </div>
                                </div>
                                <ul class="td-inner-stat clearfix">
                                    <li>
                                        <p>项目</p>
                                        <p>订单量</p>
                                        <p>订单金额</p>
                                    </li>
                                    <li>
                                        <p>昨日销量</p>
                                        <p>{!! $count['yCount'] or 0 !!}</p>
                                        <p>{!! 0 !!}</p>
                                    </li>
                                    <li>
                                        <p>月销量</p>
                                        <p>{!! $count['mCount'] or 0 !!}</p>
                                        <p>{!!0 !!}</p>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td width="448px" style="border-left: 1px solid #F2F2F2;border-bottom: 1px solid #f2f2f2">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit bulletin clearfix">
                                    <div class="td-inner-tit-line four"></div>
                                    <div class="td-inner-tit-news ">
                                        <p>系统公告</p>
                                    </div>
                                    <a href="###">更多公告>></a>
                                </div>
                                <div class="cancel-none">
                                    <p>
                                        <img src="{!!url('cw100_b2b/images/u464.png')!!}"/>
                                        暂无公告!
                                    </p>
                                </div>
                                <ul class="td-inner-bulletin clearfix">
                                    {{--<li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>--}}
                                    {{--<li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>--}}
                                    {{--<li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>--}}
                                    {{--<li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>--}}
                                    {{--<li><i></i><a href="###">总系统发布的公告标题总系统发布的公告标题</a><span>[2015-10-10]</span></li>--}}
                                </ul>
                                <!-- <div class="td-inner-tit-tel-line"></div>
									 <div class="td-inner-tit relation clearfix">

									 	<div class="td-inner-tit-line"></div>
									 	<div class="td-inner-tit-news ">
									 		<p>平台联系方123式</p>
									 	</div>
									 	<div style="clear: both;"></div>
									 	<div class="td-inner-relation clearfix">
									 		<p class="relation-tel"><i></i>电话：<span>010-12345678</span></p>
									 		<p class="relation-tel"><i></i>邮箱：<span>cw100@cw100.com</span></p>
									 	</div>
									 </div>-->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="448px">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line five"></div>
                                    <div class="td-inner-tit-news">
                                        <p>商品销量排名</p>
                                        <span>掌握30日内最热销的商品及时补充货源</span>
                                    </div>
                                </div>
                                <ul class="td-inner-hotgoods clearfix">
                                    <li>
                                        <p>排名</p>
                                        <p>商品信息</p>
                                        <p>销量</p>
                                    </li>

                                        <li>
                                            <span class="green">sfsfds</span>
                                            <a href="" class="blue" target="_blank">
                                                <img src="">aaaaa
                                            </a>
                                            <span>20</span>
                                        </li>

                                </ul>
                            </div>

                        </td>
                        <td width="448px" style="border-left: 1px solid #F2F2F2;">
                            <div class="content-news-td-inner clearfix">
                                <div class="td-inner-tit clearfix">
                                    <div class="td-inner-tit-line six"></div>
                                    <div class="td-inner-tit-news">
                                        <p>最新活动</p>
                                        <span>合理参与促销活动可以有效提升商品销量</span>
                                    </div>
                                    <a href="###">更多活动>></a>
                                </div>
                                <div class="cancel-none">
                                    <p>
                                        <img src="{!!url('cw100_b2b/images/u464.png')!!}"/>
                                        暂无最新活动!
                                    </p>
                                </div>
                                <ul class="td-inner-active clearfix">
                                    {{--<li>--}}
                                    {{--<div class="td-inner-active-news">--}}
                                    {{--<p><span>活动标题：</span><a href="###">家装厨卫节，满减大抢购-(10月01日-10月31日)</a></p>--}}
                                    {{--<p>已有12家商家报名参与</p>--}}
                                    {{--</div>--}}
                                    {{--<a class="active-btn" href="###">参加活动</a>--}}
                                    {{--</li>--}}

                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="consult">
                {{--<div class="consult-page">--}}
                {{--<div class="consult-pic"><img src="{!!url('cw100_b2b/images/u384.png')!!}"></div>--}}
                {{--<a href="javascript:void(0)">我要咨询</a>--}}
                {{--</div>--}}
                <div class="consult-message pr">
                    <div class="consult-pic"><img src="{!!url('cw100_b2b/images/u384.png')!!}"></div>

                    <a href="{!!url('/message')  !!}" >您有<span>@if(!empty($counted)){!! $counted !!}@else 0 @endif</span>条消息</a>

                    <div class="consult-messageList pa">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.td-inner-tag-nums').each(function(){
                if($.trim($(this).text()).length<3)
                {
                    $(this).css({'width':'18px'});
                }
                if($.trim($(this).text()).length==3)
                {
                    $(this).css({'width':'30px'});
                }
                if($.trim($(this).text()).length>3)
                {
                    $(this).css({'width':'50px'});
                }
            });
        });
    </script>
@stop