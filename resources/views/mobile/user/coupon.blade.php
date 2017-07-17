<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
    <title></title>

</head>
<body class="youhuibody">
<div class="youhui">
    <div class="header">
        <a href="{!! config("app.m_url") !!}/user"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">优惠卷</p>
    </div>
    <ul>
        @if(count($return)>0)
        @foreach($return as $value)
        <a href="/userInvestInfo?coupon_id={{$value->coupon_id}}" ><li>
            <div class="cont1">
                <p class="p1">红包</p>
                <p class="p2">{{$value->over_time}}</p>
                <p class="p3">投资{{$value->month}}个月以上标期，投资{{$value->sum}}可用</p>
            </div>
            <div class="cont2">
                <p class="p1">￥{{$value->moneys}}元</p>
                <p class="p2">适用：{{$value->pertinence}}</p>
                <p class="p3">发布人：{{$value->name}}</p>
            </div>
            </li></a>
       @endforeach
       @else
            <p style=" text-align: center; color:#666; margin-top: 10px;">没有查询到相关记录</p>
       @endif
    </ul>
</div>
</body>
</html>
