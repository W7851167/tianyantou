<!-- 头信息 -->
@include('mobile.public.header')
        <!-- 头信息结束 -->
<body>
<div class="touzi">
    <div class="first">
        <p class="p1">
            <img src="//static.tianyantou.com/images/mobile/tixian.png"/>
            <span>用户名:{!! $user['mobile'] !!}</span>

        </p>
        <p class="p2">
            <img src="//static.tianyantou.com/images/mobile/tixian-2.png"/>
            <img src="//static.tianyantou.com/images/mobile/tixian-1.png"/>

        </p>
    </div>
    <div class="header">
        <p class="p1">天眼投资累计收益（元）</p>
        <p class="p2" style="font-size: 22px;margin-top: 3%;">{{$return->total}}</p>
    </div>
    <ul class="header2">
        <li>

            <p class="p2">可用余额<span>{{$return->money}}</span>元</p>
        </li>
        <li>

            <p class="p2">提现</p>
        </li>
    </ul>

    <ul class="content">
        <li class="llot">
            <img src="//static.tianyantou.com/images/mobile/tixian-a.jpg"/>
            <a href="/userInvestInfo">
            <div>
                <p class="p1">投资提交</p>
                <p class="p2">记录投资、奖励领取</p>
            </div>
            </a>
        </li>
        <li class="llot">
            <img src="//static.tianyantou.com/images/mobile/tixian-b.jpg"/>

                <div>
                <p class="p1">提现记录</p>
                <p class="p2">{{$return->price}}</p>
            </div>

        </li>
        <li class="llot">
            <img src="//static.tianyantou.com/images/mobile/tixian-c.jpg"/>
            <a href="record.html">
            <div>
                <p class="p1">投资记录</p>
                <p class="p2">最高11%的收益</p>
            </div>
            </a>
        </li>
        <li class="llot">
            <img src="//static.tianyantou.com/images/mobile/tixian-d.jpg"/>
            <a href="recommend.html">
            <div>
                <p class="p1">推荐有奖</p>
                <p class="p2">1个可用</p>
            </div>
            </a>
        </li>
    </ul>
    <ul class="foot-cont">
        <a href="coupon.html"><li>
            <img src="//static.tianyantou.com/images/mobile/tixian-e.jpg"/>
            <span>优惠卷</span>
            <img src="//static.tianyantou.com/images/mobile/tixian--.png"/>
        </li></a>
        <li>
            <img src="//static.tianyantou.com/images/mobile/tixian-f.jpg"/>
            <span>大转盘</span>
            <img src="//static.tianyantou.com/images/mobile/tixian--.png"/>
        </li>
        <li>
            <img src="//static.tianyantou.com/images/mobile/tixian-g.jpg"/>
            <span>在线客服</span>
            <img src="//static.tianyantou.com/images/mobile/tixian--.png"/>
        </li>
        <li>
            <img src="//static.tianyantou.com/images/mobile/tixian-h.jpg"/>
            <span>帮助与反馈</span>
            <img src="//static.tianyantou.com/images/mobile/tixian--.png"/>
        </li>
    </ul>
</div>
<!-- 公用banner开始 -->
@include('mobile.public.userbanner')
        <!-- 公用banner结束 -->
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
        $(".submit-gold").click(function(){
            var url = $(this).find("a").attr("href");
            window.location.href=url;
        })
        $(".jump_url").click(function(){
            var url = $(this).find("a").attr("href");
            window.location.href=url;
        })
    })
</script>
</body>
</html>
