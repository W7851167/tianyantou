<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
    <title>P2P投资理财节</title>
    <style type="text/css">

    </style>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?4bce883bdb22bd76c22b2983afc1ae4d";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body style="padding-bottom:60px;">
<div class="platform">
    <div class="header">
        <a href="{!! config('app.m_url') !!}/platform"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
        <p class="plat-title">{!! $corp->name or '' !!}</p>
    </div>
    <div class="header-nav">
        <a  href="{!! config('app.m_url') !!}/platform/{!! $corp->ename or '' !!}/{!! $task_id or '' !!}.html">投资信息</a>
        <a class="active" href="{!! config('app.m_url') !!}/platform/{!! $corp->ename or '' !!}/{!! $task_id or '' !!}.info">平台信息</a>
    </div>

    <div class="content1">
        <div >
            <img src="{!! config('app.static_url') !!}{!! $corp->logo or '' !!}"/>
            <a class="native" href="javascript:;">商家返现</a>
            <a href="javascript:;">仅限首投</a>
        </div>
        <p>关键词：{!! $corp->keyword or '' !!}</p>

    </div>
    <p class="title">天眼投综合评级：{!! $corp->level or '' !!}</p>
    <div class="content2">
        <p class="tit">平台简介</p>
		<p class="titcont">
          {!! $corp->article->content or '' !!}
		</p>
    </div>
    <div class="content3">
        <p class="tit">平台档案</p>
        <table border="0" cellspacing="" cellpadding="">
            <tr>
                <td width="40%">投资服务费</td>
                <td width="60%">{!! $metas['icp_invest_cost'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">提现到账</td>
                <td width="60%">{!! $metas['icp_cash_in'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">提现门槛</td>
                <td width="60%">{!! $metas['icp_cash_door'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">VIP费用</td>
                <td width="60%">{!! $metas['icp_vip_cost'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">起息时间</td>
                <td width="60%">{!! $metas['icp_carry_time'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">回款时间</td>
                <td width="60%">{!! $metas['icp_payment_time'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">托管存管</td>
                <td width="60%">{!! $metas['icp_custody'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">逾期/坏账保障</td>
                <td width="60%">{!! $metas['icp_overdue_ensure'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">逾期垫付</td>
                <td width="60%">{!! $metas['icp_overdue_pay'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">债权转账</td>
                <td width="60%">{!! $metas['icp_bond'] or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">上线时间</td>
                <td width="60%">{!! $corp->online or '' !!}</td>
            </tr>
            <tr>
                <td width="40%">注册资本</td>
                <td width="60%">{!! $corp->capital or 0 !!}</td>
            </tr>
            <tr>
                <td width="40%">ICP备案</td>
                <td width="60%">{!! $metas['icp_no'] or '' !!}</td>
            </tr>
        </table>
    </div>
    <div class="content4">
        <p class="tit">平台证照</p>
        @if(!empty($metas['credentials']))
            <?php $count = count($metas['credentials']); $len = $count / 5 + 1; ?>
                @for($i=0; $i<$len; $i++)
                    @for($l=0;$l<5;$l++)
                        <?php $key = 5 * $i + $l;?>
                        @if(!empty($metas['credentials'][$key]))
                            <img src="{!! $metas['credentials'][$key] !!}"/>
                        @endif
                    @endfor
                @endfor
            @endif
        <!--<img class="plat-img1"  src="//static.tianyantou.com/images/mobile/pID1.jpg"/>
        <img class="plat-img2" src="//static.tianyantou.com/images/mobile/pID2.jpg"/>
        <img class="plat-img1" src="//static.tianyantou.com/images/mobile/pID3.jpg"/>-->
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
            均由各商家自行提供，天眼投仅作为信息展示平台，不对用户投资行为进行任何主观性引导。
            投资前请慎重考虑平台信用、
            投资项目的真实性、可行性等因素。用户如因投资发生争议，请与该平台进行沟通交涉。
        </p>
    </div>
    <div class="foot" style="position:fixed;bottom:0;">
        @if(!empty($ctask = $corp->tasks->where('status',1)->first()))
            <a href="{!! $ctask->url or '' !!}" data-sso-url="/platform/login/{!! $corp->ename or ''!!}/{!! $ctask->id or 0 !!}" rel="platform_join"
               data-plat-url="{!! $ctask->url or '' !!}" class="btn btn-blue btn-allwidth">立即投资
            </a>
        @endif
    </div>
</div>
<script src="{!! config('app.static_url') !!}/js/mobile/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
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
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/lib/jquery-1.11.3.min.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/lib/jquery.dotdotdot.min.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/lib/prettyPhoto/jquery.prettyPhoto.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/imgopacity.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript" src="{!!config('app.static_url')!!}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/imgmove.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/tab.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/form.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/login.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/echarts-all.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/plugins/main.js?ver={!! date('YmdHIs') !!}"></script>
<script type="text/javascript"
        src="{!! config('app.static_url') !!}/js/lib/laypage/laypage.js?ver={!! date('YmdHIs') !!}"></script>
</body>
</html>
