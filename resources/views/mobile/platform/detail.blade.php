<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/reset.css"/>
    <link rel="stylesheet" type="text/css" href="//static.tianyantou.com/css/mobile/defult.css"/>
    <title></title>
</head>
<body style="padding-bottom:60px;">
<div class="platform">
    <div class="header">
        <a href="#" onClick="javascript :history.back(-1);"><img src="//static.tianyantou.com/images/mobile/11.png"/></a>
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
                <input type="text" name="" id="tytPrice" placeholder="{!! $tasks->raise or 0 !!}" value="{!! $tasks->raise or 0 !!}" />
                元
            </p>
            <p class="tc">
                红  包：
                <input type="text" name="" id="tytPacket" placeholder="{!! $tasks->packet or 0 !!}" value="{!! $tasks->packet or 0 !!}" />
                元
            </p>
            <p class="tc">
                体验金：
                <input type="text" name="" id="tytExperience" placeholder="{!! $tasks->bbin or 0 !!}" value="{!! $tasks->bbin or 0 !!}" />
                元
            </p>
            <p class="tc">
                平台奖励：
                <input type="text" name="" id="plPrice" placeholder="{!! $tasks->plat_reward or 0 !!}" value="{!! $tasks->plat_reward or 0 !!}" />
                元
            </p>
            <p class="tc">
                利 息：
                <input type="text" name="" id="accrual" placeholder="0"  />
                元
            </p>

            <p class="p-right" id="inTotal" style="margin-right:50px;">
                总合收益：( <span>0</span>   )元
            </p>
            <p class="p-right" id="allPlatYear" style="margin-right:50px;">
                综合年华：(  <span>0</span>  )%
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
    <div class="foot" style="position:fixed;bottom:0;">
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
        forTermUnit();//展示下拉框
    //#N_ID改变的标签值得id；例如改变下拉框的值
        $("#term").change(function(){
            //前台接收值的标签
            forTermUnit();//展示下拉框
            checkMoney();//检查金额
        })

        //触发期限事件
        $("#term_unit").change(function(){
            checkMoney();//检查金额
        });

        //输入金额
        $("#money").keyup(function(){
            var money = $("#money").val();
            if(money == '' || money <= 0)
            {
                setInCome();
                return false;
            }
            if(money>=100)
            {
                inSlefPacket();//计算收益
            }
        })

    });

    //利息和收益设置为0
    function setInCome()
    {
        $("#accrual").attr({placeholder:0});
        $("#inTotal").find("span").html(0);
        $("#allPlatYear").find("span").html(0);
    }

    //判断金额
    function checkMoney()
    {
        var money = $("#money").val();
        if(money == '' || money <= 0)
        {
            setInCome();
            alert("请输入投资金额");
            return false;
        }
        if(money<100)
        {
            setInCome();
            alert("投资金额需要大于100");
            return false;
        }

        if(money>=100)
        {
            inSlefPacket();//计算收益
        }
    }

    /**
     * 刷新即调用
     * 展示期限选择下拉框
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
            return termUnitVal*360;
        }else if(termVal == 1){
            return termUnitVal*12;
        }else if(termVal == 2){
            return termUnitVal*1;
        }
    }

    /**
     *   利息算法
     *   单位：天   投资金额：1000    计算：(投资金额*年华/100)/360*天数
     *   单位：月   投资金额：1000    计算：（投资金额*年华/100)/12*月数
     *   单位：年   投资金额：1000    计算：（投资金额*年化/100)/1*年数
     *
     *   综合年化算法
     *   单位：天    计算：总收益/360*天数/本金*100
     *   单位：月    计算：总收益/12*月数/本金*100
     *   单位：年    计算：总收益/1*年数/本金*100
     */
    //计算利息和收益
    function inSlefPacket()
    {
        //前台接收值的标签
        var termVal = $("#term").find("option:selected").val();//天/月/年
        var termUnitVal = $("#term_unit").find("option:selected").val();//期限
        var moneys = parseInt($("#money").val())>0?parseInt($("#money").val()):0;//投资金额
        var tytPrice = parseInt($("#tytPrice").val())>0?parseInt($("#tytPrice").val()):0;//天眼投加息
        var tytPacket = parseInt($("#tytPacket").val())>0?parseInt($("#tytPacket").val()):0;//红包
        var tytExperience = parseInt($("#tytExperience").val())>0? parseInt($("#tytExperience").val()):0;//体验金
        var plPrice = parseInt($("#plPrice").val())>0?parseInt($("#plPrice").val()):0;//平台奖励
        var platYear = parseInt($("#plat_year").val())>0?parseInt($("#plat_year").val()):0;//平台年化
        var accrual = 0;
        var inTotal = 0;
        var allPlatYear = 0;
        var calculateDay = countDay(termVal,termUnitVal);//标期
        accrual = (moneys*(platYear/100))/calculateDay;//利息
        inTotal = tytPrice+tytPacket+plPrice+accrual;//综合收益
        allPlatYear = parseInt(inTotal)/calculateDay/moneys*100;//综合年化
        //列入内容
        $("#accrual").attr({placeholder:parseInt(accrual)});
        $("#inTotal").find("span").html(parseInt(inTotal));
        $("#allPlatYear").find("span").html(parseInt(allPlatYear));
    }

</script>
</body>
</html>

