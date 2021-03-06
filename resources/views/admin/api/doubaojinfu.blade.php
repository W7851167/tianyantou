@extends('admin.common.layout')
@section('title')Api接口@stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript">Api接口</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">{!! $api->intro or '平台接口数据' !!}</a></p>
                </div>
                <div class="info">
                    <div class="info1">
                        开始时间：<input type="text" name="start_time" id="start_time" class="Wdate"  value="{!! \Input::get('start_time') !!}" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'})">
                        结束时间：<input type="text" name="end_time" id="end_time" class="Wdate"   value = "{!! \Input::get('end_time')  !!}" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'})">
                        <input type="submit" id="getData" value="查询">
                    </div>
                </div>
                <table class="all_shopping" cellspacing="0">

                </table>
            </div>
        </div>
    </div>
    <?php $user = \Session::get('user.passport'); ?>
    <input  type="hidden" value="{!! $user['role'] !!}" id="roleid" />
@stop
@section('script')
    <script language="javascript" type="text/javascript">
        $(function(){
            $("#getData").click(function(){
                var start_time = $("#start_time").val();
                var end_time = $("#end_time").val();
                if(start_time == '')
                {
                    alert("开始时间不能为空");
                    return false;
                }
                if(end_time == '')
                {
                    alert("结束时间不能为空");
                    return false;
                }
                $.ajax({
                    url: "/doubaojinfu",
                    type: 'post',
                    data:{start_time:start_time,end_time:end_time},
                    dataType:'json',
                    success:function(json){
                        var str = '<tr><th width="100">订单ID</th><th width="50">手机号</th><th width="50">真实姓名</th><th width="50">标详情</th><th width="50">投资金额</th><th width="50">投资年化</th><th width="50">交易时间</th><th width="50">订单状态</th></tr>';
                        if(json.totalcount > 0)
                        {
                            var allTotalPrice = 0;
                            $.each(json.data, function (index, val) {
                                if(val.deadline > 1) {
                                    var roleid = $("#roleid").val();
                                    var user_mobile = val.mobile;
                                    var str_mobile = user_mobile.substr(0,3)+"***"+user_mobile.substr(6);
                                    if(roleid==4)
                                    {
                                        user_mobile = str_mobile;
                                    }
                                    str += '<tr><td>' + val.OrderNo + '</td><td>' + user_mobile + '</td><td>' + val.real_name + '</td><td>' + val.goodsname + '</td><td>' + val.money + '</td><td>' + val.annualrate + '</td><td>' + formatDate(val.create_time) + '</td><td>' + val.status + '</td></tr>';
                                    allTotalPrice += parseInt(val.money);
                                }
                            });
                            str += '<tr><td colspan="8">总金额：'+allTotalPrice+'元（RMB）</td></tr>';
                            $('.all_shopping').html(str);
                        }
                        else{
                            str += '<tr><td colspan="8" style="color:red;">暂无信息</td></tr>';
                            $('.all_shopping').html(str);
                        }
                    }
                })
            })
        })
        function formatDate(now) {
            return new Date(parseInt(now)).toLocaleString();
        }

    </script>
@stop
