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
                            开始时间：<input type="text" name="start_time" id="start_time" class="Wdate"  value="{!! \Input::get('start_time') !!}" onfocus="WdatePicker({dateFmt: 'yyyyMMdd000000'})">
                            结束时间：<input type="text" name="end_time" id="end_time" class="Wdate"   value = "{!! \Input::get('end_time')  !!}" onfocus="WdatePicker({dateFmt: 'yyyyMMdd000000'})">
                            <input type="submit" id="getData" value="查询">
                    </div>
                </div>
                <table class="all_shopping" cellspacing="0">

                </table>
            </div>
        </div>
    </div>
@stop
@section('script')
<script language="javascript">
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
            if(end_time - start_time !=1000000)
            {
                alert("间隔时间为1天");
                return false;
            }
            $.ajax({
                url: "/niwodai",
                type: 'post',
                data:{start_time:start_time,end_time:end_time},
                dataType:'json',
                success:function(json){
                    if(json.success == 1)
                    {
                        var str = '<tr><th width="100">商品ID</th><th width="50">商品名称</th><th width="50">商品单价</th><th width="50">商品数量</th><th width="50">是否首投</th><th width="50">交易时间</th><th width="50">订单号</th><th width="50">优惠金额</th><th width="50">商品总净金额</th></tr>';
                        if(json.data.data.length>0) {
                            var allTotalPrice = 0;
                            $.each(json.data.data, function (index, val) {
                                str += '<tr><td>'+val.goods_id+'</td><td>'+val.goods_name+'</td><td>'+val.goods_price+'</td><td>'+val.goods_num+'</td><td>'+val.isFirst+'</td><td>'+val.order_time+'</td><td>'+val.order_sn+'</td><td>'+val.discount_amount+'</td><td>'+val.totalPrice+'</td></tr>';
                                allTotalPrice+=parseInt(val.totalPrice);
                            });
                            str += '<tr><td colspan="9">总金额：'+allTotalPrice+'元（RMB）</td></tr>';
                            $('.all_shopping').html(str);
                        }
                        else{
                            str += '<tr><td colspan="9">暂无信息</td></tr>';
                            $('.all_shopping').html(str);
                        }
                    }
                }
            })
        })
    })
</script>
@stop
