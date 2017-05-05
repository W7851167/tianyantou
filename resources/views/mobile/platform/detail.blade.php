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
        <p class="plat-title">{!! $tasks->title or '' !!}</p>
    </div>
    <div class="header-nav">
        <a class="active"  href="{!! config('app.m_url') !!}/platform/{!! $corps->ename or '' !!}/{!! $tasks->id or '' !!}.html">投资信息</a>
        <a href="{!! config('app.m_url') !!}/platform/{!! $corps->ename or '' !!}/{!! $tasks->id or '' !!}.info">平台信息</a>
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
            <a href="javascript:;">期限一个月</a>
            <a href="javascript:;">起投100元</a>
            <a href="javascript:;">限投10000元</a>
        </div>
        <div class="pl-bl-c">
            <p class="hc">
                投资金额预算
                <input type="text" name="" id="money" placeholder="请输入投资金额" />
                元
            </p>
            <p class="hc">
						期限：<select id="term">
								<option value="0" selected="selected">天</option>
								<option value="1">月</option>
								<option value="2">年</option>
							</select>
                            <select id="term_unit" style="display: none;">
                            </select>
            </p>
            <p class="tc">
                天眼投加息奖励：
                <input type="text" name="" id="tytPrice" placeholder="{!! $tasks->raise or '' !!}" value="{!! $tasks->raise or '' !!}" />
                元
            </p>
            <p class="tc">
                红  包：
                <input type="text" name="" id="tytPacket" placeholder="{!! $tasks->packet or '' !!}" value="{!! $tasks->packet or '' !!}" />
                元
            </p>
            <p class="tc">
                体验金：
                <input type="text" name="" id="tytExperience" placeholder="{!! $tasks->bbin or '' !!}" value="{!! $tasks->bbin or '' !!}" />
                元
            </p>
            <p class="tc">
                平台奖励：
                <input type="text" name="" id="plPrice" placeholder="{!! $tasks->plat_reward or '' !!}" value="{!! $tasks->plat_reward or '' !!}" />
                元
            </p>
            <p class="tc">
                利 息：
                <input type="text" name="" id="accrual" placeholder="" />
                元
            </p>

            <p class="p-right" id="inTotal" style="margin-right:50px;">
                总合收益：( <span>1</span>   )元
            </p>
            <p class="p-right" id="allPlatYear" style="margin-right:50px;">
                综合年华：(  <span>2</span>  )%
            </p>
        </div>
        <div class="pl-bl-c2">
            <p class="tit">
                投资必看
            </p>
            <p class="con">{!! $tasks->must_see or '' !!}</p>
            <!--<p class="con">1，不在天眼投合作标的范围内且首投资格作废。</p>
            <p class="con">2，未通过天眼投转注册、投资和注册平台手机号与天眼投手机号不统一、不予返利。</p>-->
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
        @if(!empty($tasks))
            <a href="{!! $tasks->url or '' !!}" data-sso-url="/platform/login/{!! $corps->ename or 0 !!}{!! $tasks->id or 0 !!}" rel="platform_join"
               data-plat-url="{!! $tasks->url or '' !!}" class="btn btn-blue btn-allwidth">立即投资
            </a>
        @endif
    </div>
    <input type="hidden" value="{!! $tasks->ratio or 0 !!}" id="plat_year" />
    <input type="hidden" value="{!! $tasks->mratio or 0 !!}" id="tyt_year" />
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
    $(document).ready(function() {
        forTermUnit();
    //#N_ID改变的标签值得id；例如改变下拉框的值
        $("#term").change(function(){
            //前台接收值的标签
            var money = $("#money").val();
            if(money == '' || money == 0)
            {
                alert("请输入投资金额");
                return false;
            }
            forTermUnit();
        })

    });
    /**
     * 刷新即调用
     */
    function forTermUnit()
    {
        var termVal = $("#term").find("option:selected").val();
        var termStr = '';
        var termUnits = calculateTerm(termVal);
        for(var i=1;i<=termUnits;i++)
        {
            termStr += '<option value='+i+'>'+i+'</option>'
        }
        $("#term_unit").html(termStr);
        $("#term_unit").show();
    }

    //计算相对应的时间
    function calculateTerm(termVal)
    {
        var termUnit = 0;
        if(termVal == 0){
            termUnit = 360;
        }else if(termVal == 1){
            termUnit = 24;
        }else if(termVal == 2){
            termUnit = 2;
        }else{
            termUnit = 1;
        }
        return termUnit;
    }

    //计算天数
    function countDay(termVal,termUnitVal)
    {
        if(termVal == 0){
            return termUnitVal;
        }else if(termVal == 1){
            return termUnitVal*30;
        }else if(termVal == 2){
            return termUnitVal*360;
        }
    }

    $(document).ready(function() {
        $("#term_unit").change(function(){
            //前台接收值的标签
            var termVal = $("#term").find("option:selected").val();//天/月/年
            var termUnitVal = $("#term_unit").find("option:selected").val();//期限
            var moneys = $("#money").val();//投资金额
            var tytPrice = $("#tytPrice").val();console.log(tytPrice);//天眼投加息
            var tytPacket = $("#tytPacket").val();console.log(tytPacket);//红包
            var tytExperience = $("#tytExperience").val();console.log(tytExperience);//体验金
            var plPrice = $("#plPrice").val();console.log(plPrice);//平台奖励
            var platYear = $("#plat_year").val();//平台年化
            var accrual = 0;
            var inTotal = 0;
            var allPlatYear = 0;
            var calculateDay = countDay(termVal,termUnitVal);//期限(单位：天)
            accrual = moneys*platYear/calculateDay;//利息
            inTotal = parseInt(moneys)+parseInt(tytPrice)+parseInt(tytPacket)+parseInt(tytExperience)+parseInt(plPrice)+parseInt(accrual);//综合收益
            allPlatYear = inTotal/calculateDay*360/moneys*100;//综合年化
            //列入内容
            $("#accrual").attr({placeholder:parseInt(accrual)});
            $("#inTotal").find("span").html(parseInt(inTotal));
            $("#allPlatYear").find("span").html(parseInt(allPlatYear/100));
        });
    });
</script>
</body>
</html>

