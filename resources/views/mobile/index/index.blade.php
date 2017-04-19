<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/swiper.min.css"/>
    <title></title>
</head>
<body>
<div class="index">
    <div class="header">
        <div class="swiper-container"style="width: 100%;"><!--swiper容器[可以随意更改该容器的样式-->
            <div class="swiper-wrapper">
                @if(!empty($advs))
                    @foreach($advs as $av)
                        @if(!empty($av->image->name))
                            <div class="swiper-slide">
                                <a href="{!! $av->url or '' !!}" title="{!! $av->title or '' !!}" target="_blank"><img src="{!! config('app.static_url') . $av->image->name !!}" alt="{!! $av->title !!}"  style="width:360px;height: 177px;"/></a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination" style="width: 20%;float: right;margin-left: 80%;"></div><!--分页器-->
        </div>
    </div>

    <div class="header-sec">

        <ul>
            <li>
                <img src="//static.tianyantou.com/images/mobile/p1.png"/>
            </li>
            <li>
                <img src="//static.tianyantou.com/images/mobile/p2.png"/>
            </li>
            <li>
                <img src="//static.tianyantou.com/images/mobile/p3.png"/>
            </li>
            <li>
                <img class="last-img" src="//static.tianyantou.com/images/mobile/p4.png"/>
            </li>
        </ul>
    </div>
    <div class="jpform-con">

        @foreach($tasks as $tv)
        <div class="data-list" style="cursor:pointer;">
            <div class="data-title">
                <img src="{!! config('app.static_url') !!}{!! $tv->corp->m_logo or ''!!}" style="height:18px;width: 49px;"/>
                <span>{!! $tv->title or '' !!}</span>
                <a href="{!! config('app.m_url') !!}/platform/{!! $tv->corp->ename or ''!!}.html">首投</a>
            </div>
            <ul>
                <li class="con-red">
                    <p class="rt"><b>{!! $tv->ratio or 0.00 !!}</b><i>%</i></p>
                    <p>综合年华收益</p>
                </li>
                <li class="con-red">
                    <p class="rt">{!! $tv->term or '' !!}@if(isset($tv->term_unit)){!! $tv->term_unit == 0 ? '天' : ($tv->term_unit == 1 ? '个月' : '年')!!}@endif</p>
                    <p>期 限</p>
                </li>
                <li class="con-p">
                    <p>返利上限：2000元 </p>
                    <p>起投金额：100元 </p>
                    <p>最大金额：{!! tmoney_format($tv->limit) !!}</p>
                </li>
            </ul>
        </div>
        @endforeach

        <!--<div class="data-list">
            <div class="data-title">
                <img src="//static.tianyantou.com/images/mobile/biao0.png"/>
                <span>搜易贷-搜狐集团旗下公司</span>
                <a href="javascript:;">首投</a>
            </div>
            <ul>
                <li class="con-red">
                    <p class="rt">11-25%</p>
                    <p>综合年华收益</p>
                </li>
                <li class="con-red">
                    <p class="rt">30天</p>
                    <p>期 限</p>
                </li>
                <li class="con-p">
                    <p>返利上限：2000元 </p>
                    <p>起投金额：100元 </p>
                    <p>最大金额：50万</p>
                </li>
            </ul>
        </div>-->
    </div>
    <div class="jpform-foot">
        <ul>
            <li>
                <a href="{!! config('app.m_url') !!}">
                    <img src="//static.tianyantou.com/images/mobile/biao1.png"/>
                </a>
                <p>首页</p>

            </li>
            <li>
                <a href="{!! config('app.m_url') !!}/platform">
                    <img src="//static.tianyantou.com/images/mobile/biao2.png"/>
                </a>
                <p>精选</p>

            </li>
            <li>
                <img src="//static.tianyantou.com/images/mobile/biao3.png"/>
                <p>我的</p>
            </li>
        </ul>
    </div>
</div>
<script src="//static.tianyantou.com/js/mobile/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="//static.tianyantou.com/js/mobile/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    /*可以引用到js文件*/
    var mySwiper = new Swiper(".swiper-container",{
        direction:"horizontal",/*横向滑动*/
        loop:true,/*形成环路（即：可以从最后一张图跳转到第一张图*/
        pagination:".swiper-pagination",/*分页器*/
        prevButton:".swiper-button-prev",/*前进按钮*/
        nextButton:".swiper-button-next",/*后退按钮*/
        autoplay:3000/*每隔3秒自动播放*/
    })
    $(function(){
        $(".data-list").click(function(){
            var url = $(this).find("a").attr("href");
            window.location.href=url;
        })
    })
</script>
</body>
</html>