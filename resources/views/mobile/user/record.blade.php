<!-- 头信息 -->
@include('mobile.public.header')
<!-- 头信息结束 -->
<script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("a").click(function () {
            $(this).attr('class','activenn');
        });
    });
</script>
<body class="jilu-body">
<div class="jilu">
    <div class="header">
        <a href="{!! config("app.m_url") !!}/user"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">投资记录</p>
    </div>
    <div class="content">
        <ul class="na1">
            <li>
                <a href="record.html?key=audit">申核中</a>
            </li>
            <li>
                <a href="record.html?key=pass">已投资</a>
            </li>
            <li>
                <a href="record.html?key=reject">已回款</a>
            </li>
        </ul>
        @if(count($return)>0)


        @foreach($return as $value)
        <div class="cont1">
            <ul>
                <li>
                    <div class="p1">
                        <img src="//static.tianyantou.com{{$value->logo}}" style="width: auto; height:50px;"/>
                        <span>
									{{$status}}
								</span>
                    </div>
                    <div class="p2">
                        <div class="p2-c1">
                            <p>投标期限: {{$value->term}}个月</p>
                            <p>平台年化率：{{$value->ratio}}%</p>
                            <p>天眼投年化率:{{$value->mratio}}%</p>
                        </div>
                        <div class="p2-c2">
                            <p class="tit">{{$value->price}}</p>
                            <p>投资金额(元)</p>
                        </div>
                    </div>
                    <div class="p3">
                        <span>领取任务时间：{{$value->created_at}}</span>
                        <span></span>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
        @else
            <p style=" text-align: center; color:#666; margin-top: 10px;">没有查询到相关记录</p>
        @endif
    </div>
</div>
</body>
</html>