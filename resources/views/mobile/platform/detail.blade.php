<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
    <title></title>
</head>
<body>
<div class="platform">
    <div class="header">
        <a href="/platform"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">{!! $corp->name or '' !!}</p>
    </div>
    <div class="header-nav">
        <a class="active"  href="{!! config('app.m_url') !!}/platform/{!! $corp->ename or '' !!}.html">投资信息</a>
        <a href="{!! config('app.m_url') !!}/platform/{!! $corp->ename or '' !!}.info">平台信息</a>
    </div>

    <div class="content1">
        <div >
            <img src="//static.tianyantou.com/images/mobile/log1.jpg"/>
            <a class="native" href="javascript:;">商家返现</a>
            <a href="javascript:;">仅限首投</a>
        </div>


    </div>


    <div class="platfrom-blanks">
        <div class="pl-bl-t">
            <a href="javascript::">期限一个月</a>
            <a href="javascript::">起投100元</a>
            <a href="javascript::">限投10000元</a>
        </div>
        <div class="pl-bl-c">
            <p class="hc">
                投资金额预算
                <input type="text" name="" id="" placeholder="请输入投资金额" />
                元
            </p>
            <p class="hc">
						期限：<select>
								<option>（1）月	</option>
								<option>（2）月	</option>
								<option>（3）月	</option>
							</select>
            </p>
            <p class="tc">
                天眼投加息奖励：
                <input type="text" name="" id="" placeholder="" />
                元
            </p>
            <p class="tc">
                红  包：
                <input type="text" name="" id="" placeholder="" />
                元
            </p>
            <p class="tc">
                体验金：
                <input type="text" name="" id="" placeholder="" />
                元
            </p>
            <p class="tc">
                平台奖励：
                <input type="text" name="" id="" placeholder="" />
                元
            </p>
            <p class="tc">
                利 息：
                <input type="text" name="" id="" placeholder="" />
                元
            </p>

            <p class="p-right">
                总合收益：(    )元
            </p>
            <p class="p-right">
                综合年华：(    )%
            </p>
        </div>
        <div class="pl-bl-c2">
            <p class="tit">
                投资必看
            </p>
            <p class="con">1，不在天眼投合作标的范围内且首投资格作废。</p>
            <p class="con">2，未通过天眼投转注册、投资和注册平台手机号与天眼投手机号不统一、不予返利。</p>
        </div>
        <img class="win" src="//static.tianyantou.com/images/mobile/2win.png"/>
    </div>




    <div class="content5">
        <p class="cont5-tit">*风险提示：</p>
        <p class="cont5-con">
            理财有风险，投资需谨慎。投资者投资不同的理财产品将获得不同的收益预期，
            也将承担不同程度的风险。一般来说，理财产品的收益预期越高，投资者可能承担的风险越大。
            投资人应当认真阅读理财产品的相关说明，了解产品特点，并根据自身投资目的、
            投资期限、投资经验、资产状况等判断是否和投资人的风险承受能力相适应。
        </p>
        <p class="cont5-tit">*免责声明：</p>
        <p class="cont5-con">
            本活动所有信息（包括但不局限于平台介绍、平台背景、平台数据等关于平台的各类信息）
            均由各商家自行提供，券妈妈仅作为信息展示平台，不对用户投资行为进行任何主观性引导。
            投资前请慎重考虑平台信用、
            投资项目的真实性、可行性等因素。用户如因投资发生争议，请与该平台进行沟通交涉。
        </p>
    </div>
    <div class="foot">
        @if(!empty($ctask = $corp->tasks->where('status',1)->first()))
            <a href="{!! $ctask->url or '' !!}" data-sso-url="/platform/login/{!! $corp->ename or ''!!}/{!! $ctask->id or 0 !!}" rel="platform_join"
               data-plat-url="{!! $ctask->url or '' !!}" class="btn btn-blue btn-allwidth">立即投资
            </a>
        @endif
    </div>
</div>
<script src="//static.tianyantou.com/js/mobile/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="//static.tianyantou.com/js/mobile/new_file.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        $(".header-nav a").click(function(){
            $(this).addClass("active").siblings().removeClass("active")
        })
        $(".content1 div a").click(function(){
            $(this).addClass("native").siblings().removeClass("native")
        })
    })
</script>
</body>
</html>

