<!-- 头信息 -->
@include('mobile.public.header')
<!-- 头信息结束 -->
<body style="padding-bottom:60px;">
<div class="platform">
    <div class="header">

        <p class="plat-title">
            <a href="{!! config('app.m_url') !!}/platform"><img src="//static.tianyantou.com/images/mobile/return.png"></a>
            <a href="{!! config('app.m_url') !!}/platform/{!! $corps->ename or '' !!}/{!! $tasks->id or '' !!}.html">
                <input class="touzhi t1" type="button" value="投资信息" style="border-radius: 3px 0 0 3px" />
            </a>
            <a href="{!! config('app.m_url') !!}/platform/{!! $corps->ename or '' !!}/{!! $tasks->id or '' !!}.info">
                <input class="touzhi t2" type="button" value="平台信息" style="border-radius: 0 3px 3px 0;margin-left: -5px;" />
            </a>
        </p>
    </div>

    <div class="content1">

            <img src="{!! config('app.static_url') !!}{!! $corps->logo or '' !!}"/>
            <a href="javascript:;">仅限首投</a>
            <a class="native" href="javascript:;">商家返现</a>




    </div>


    <div class="platfrom-blanks">
        <div class="pl-bl-t">

                <a>期限一个月</a>
                <a class="pl-bl-t-a">起投{!! $tasks->sued or 0 !!}</a>
                <a>限投@if($tasks->limit >= 100000.00)100000.00 @else {!! $tasks->limit or 0 !!}@endif</a>

        </div>
        <div class="pl-bl-c">
            <p class="hc">
                投资金额预算：
                <input type="text" name="" id="money" placeholder="请输入投资金额" style="width:52%;font-size:2.6vh;" />
                <b style="float: right; margin-right: 3%;">元</b>
            </p>
            <p class="hc">

						期限：
                <select id="term_unit" style="display: none;">
                    </select> &nbsp; {!! $tasks->term_name !!}
            </p>
            <p class="hc" id="tytPrice">
                天眼投加息奖励：<span>0</span>

                元
            </p>
            <p class="hc" id="tytPacket">
                红  包：
                <span>0</span>
                元
            </p>
            <p class="hc">
                体验金：
                <span style="color: #f04f25;">{!! $tasks->bbin or 0 !!}</span>
                元
            </p>
            <p class="hc" id="plPrice">
                平台奖励：
                <span>0</span>

                元
            </p>
            <p class="hc" id="accrual" style="padding-left: 16px;margin-left: 0;">
                利 息：
                <span>0</span>
                元
            </p>
            <br/>
            <p  id="inTotal" style="text-align: right;margin-right: 16px;">
                预计综合收益：( <span style="color:#f04f25;">0</span>   )元
            </p>
            <br/>
            <p id="allPlatYear" style="text-align: right;margin-right: 16px;">
                预计综合年化：(  <span style="color: #f04f25;">0</span>  )%
            </p>
        </div>
        <div class="pl-bl-c2">
            <img src="//static.tianyantou.com/images/mobile/touzhi.png">
            <a class="tit">
                投资必看
            </a>
            <p style="color: #000">{!! $corps->name !!}投资必看：</p>
            <p class="con">{!! $tasks->must_see or '' !!}</p>
            <p style="color: #f04f25; text-align: right; font-size: 2.3vh; padding: 2.2vh 0;">{!! $corps->name !!}拥有最终解释权</p>
        </div>
        <img class="win" src="//static.tianyantou.com/images/mobile/2win.png"/>
    </div>




    <div class="content5">
        <img src="//static.tianyantou.com/images/mobile/jinggao.png">
        <a class="cont5-tit">风险提示：</a>
        <p class="cont5-con">
            理财有风险，投资需谨慎。投资者投资不同的理财产品将获得不同的收益预期，
            也将承担不同程度的风险。一般来说，理财产品的收益预期越高，投资者可能承担的风险越大。
            投资人应当认真阅读理财产品的相关说明，了解产品特点，并根据自身投资目的、
            投资期限、投资经验、资产状况等判断是否和投资人的风险承受能力相适应。
        </p>
        <img src="//static.tianyantou.com/images/mobile/wenben1.png">
        <a class="cont5-tit">免责声明：</a>
        <p class="cont5-con">
            本活动所有信息（包括但不局限于平台介绍、平台背景、平台数据等关于平台的各类信息）
            均由各商家自行提供，天眼投仅作为信息展示平台，不对用户投资行为进行任何主观性引导。
            投资前请慎重考虑平台信用、
            投资项目的真实性、可行性等因素。用户如因投资发生争议，请与该平台进行沟通交涉。
        </p>
    </div>
    <p style="height: 40px;"></p>
    <div class="foot" style="position:fixed;bottom:0;">
        @if(!empty($tasks))
                <a id="jump_url" goto="{!! $tasks->url or '' !!}" data-sso-url="/platform/login/{!! $corps->ename or 0 !!}{!! $tasks->id or 0 !!}" rel="platform_join"
                   data-plat-url="{!! $tasks->url or '' !!}" class="btn btn-blue btn-allwidth">立即投资
                </a>
        @endif
    </div>
    <input type="hidden" value="{!! $tasks->ratio or 0 !!}" id="plat_year" />
    <input type="hidden" value="{!! $tasks->mratio or 0 !!}" id="tyt_year" />
    <input type="hidden" value="{!! $tasks->term or 0 !!}" id="termDay" />
	<input type="hidden" value="{!! $tasks['packet']['title'] or 0 !!}" id="packet_title" />
	<input type="hidden" value="{!! $tasks['packet']['status'] or 0 !!}" id="packet_status" />
	<input type="hidden" value="{!! $tasks['plat_reward']['title'] or 0 !!}" id="plat_reward_title" />
	<input type="hidden" value="{!! $tasks['plat_reward']['status'] or 0 !!}" id="plat_reward_status" />
	<input type="hidden" value="{!! $tasks['plat_time'] or 0 !!}" id="plat_time" />
	<input type="hidden" value="{!! $tasks['packet_time'] or 0 !!}" id="packet_time" />
    <input type="hidden" value="{!! $user['mobile'] or 0 !!}" id="user_mobile" />
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
    $("input").unbind('keydown').bind('keydown', function(){
        $("input").width(textWidth($("input").val()));
    });
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
		$("#tytPacket").attr({placeholder:0});
		$("#tytPrice").attr({placeholder:0});
		$("#plPrice").attr({placeholder:0});
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
        var termVal = '{!! $tasks->term_unit !!}';
        var termStr = '';
		var termUnit = $("#termDay").val();
        var termUnits = calculateTerm(termVal);
        for(var i=termUnit;i<=termUnits;i++)
        {
            termStr += '<option value='+i+'>'+i+'</option>'
        }
        $("#term_unit").html(termStr);
        $("#term_unit").show();
    }

    //计算相对应的时间（下拉框）
    function calculateTerm(termVal)
    {
		if(termVal == 0){
            return 360;
        }else if(termVal == 1){
            return 24;
        }else if(termVal == 2){
            return 1;
        }
    }

    //计算天数（标期）
    function countDay(termVal)
    {
        if(termVal == 0){
            return 360;
        }else if(termVal == 1){
            return 12;
        }else if(termVal == 2){
            return 1;
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
        var termVal = '{!! $tasks->term_unit !!}';//天/月/年
        var termUnitVal = $("#term_unit").find("option:selected").val();//期限
        var moneys = parseInt($("#money").val())>0?parseInt($("#money").val()):0;//投资金额
        var tytExperience = parseInt($("#tytExperience").val())>0? parseInt($("#tytExperience").val()):0;//体验金
        var platYear = parseInt($("#plat_year").val())>0?parseInt($("#plat_year").val()):0;//平台年化
		var tytYear = parseInt($("#tyt_year").val())>0?parseInt($("#tyt_year").val()):0;//天眼投年化

		var calculateDay = countDay(termVal);//标期
		var tytPrice = 0;  tytPrice = moneys*(tytYear/100)/calculateDay*termUnitVal;//天眼投加息奖励（1）
		var tytPacket = 0;  tytPacket = packetOrPlatCount($("#packet_title").val(),$("#packet_status").val(),$("#packet_time").val(),termUnitVal);//平台红包（2）
		var plPrice = 0;   plPrice = packetOrPlatCount($("#plat_reward_title").val(),$("#plat_reward_status").val(),$("#plat_time").val(),termUnitVal);//平台奖励（4）
        var accrual = 0;  accrual = moneys*(platYear/100)/calculateDay*termUnitVal;//利息（5）
        var inTotal = 0; inTotal = tytPrice+tytPacket+plPrice+accrual;//综合收益（6）
        var allPlatYear = 0;  allPlatYear = inTotal/termUnitVal*calculateDay/moneys*100;//综合年化（7）
 
        //列入内容
        $("#tytPrice").find("span").html(Math.floor(tytPrice*100)/100);//天眼投加息奖励（1）
		$("#tytPacket").find("span").html(Math.floor(tytPacket));//平台红包（2）
		$("#plPrice").find("span").html(Math.floor(plPrice));//平台奖励（4）
        $("#accrual").find("span").html(Math.floor(accrual*100)/100);//利息（5）
        $("#inTotal").find("span").html(Math.floor(inTotal*100)/100);//综合收益（6）
        $("#allPlatYear").find("span").html(Math.floor(allPlatYear*100)/100);//综合年华（7）
    }

	//红包和平台奖励算法
	function packetOrPlatCount(title,status,time,termUnit)
	{
		//title:红包档位/平台奖励档位
		//status:1-->相加0-->不相加
		var price = 0;
		if(title == 0)
		{
			return price;
		}
		if(termUnit < time)
        {
            return price;
        }
        var moneys = parseInt($("#money").val())>0?parseInt($("#money").val()):0;//投资金额
		var str = new Array();
		var ss  =  new Array();
		str = title.split("|");
		for(var i=0;i<str.length;i++)
		{
			ss = str[i].split("-");
			if(moneys >= ss[0])
			{
				if(status == 1)
				{
					price = parseInt(price)+parseInt(ss[1]);//累计相加
				}
				else if(status == 0)
				{
					price = parseInt(ss[1]);//单独计算
				}
				
			}
		}
		return price;
	}

</script>
<script type="text/javascript">
    $(function(){
        $("#jump_url").click(function(){
            var user_mobile = $("#user_mobile").val();
            if(user_mobile > 0)
            {
                var url = $(this).attr("goto");
                window.location.href=url;
            }
            else
            {
                window.location.href="https://m.tianyantou.com/signin.html";
            }
        })
    })
</script>
</body>
</html>

