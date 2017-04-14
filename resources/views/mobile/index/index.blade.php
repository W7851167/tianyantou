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
                <div class="swiper-slide"><img src="//static.tianyantou.com/images/mobile/he-title.png"></div>
                <div class="swiper-slide"><img src="//static.tianyantou.com/images/mobile/he-title.png"></div>
                <div class="swiper-slide"><img src="//static.tianyantou.com/images/mobile/he-title.png"></div>
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
        <div class="data-list">
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
        </div>

        <div class="data-list">
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
        </div>
    </div>
    <div class="jpform-foot">
        <ul>
            <li>
                <a href="index.html">
                    <img src="//static.tianyantou.com/images/mobile/biao1.png"/>
                </a>
                <p>首页</p>

            </li>
            <li>
                <a href="jp.html">
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
</script>
</body>
</html>
