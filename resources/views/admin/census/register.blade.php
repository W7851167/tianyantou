@extends('admin.common.layout')
@section('title')数据统计@stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
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
                        <a href="{!! url('censu') !!}">数据统计&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript">注册统计</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('census') !!}">任务统计</a></p>
                    <p><a href="{!! url('census/register') !!})" class="at">注册统计</a></p>
                </div>
                <div class="info">
                    <div class="info1">
                        <form action="{!! url('census/register') !!}" method="get">
                            {!! csrf_field() !!}
                        开始时间：<input type="text" name="start_time" class="Wdate" value="{!! date('Y-m-d', $startTime) !!}"  onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})">
                        结束时间：<input type="text" name="end_time" class="Wdate"  value="{!! date('Y-m-d', $endTime) !!}" onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})">
                        <input type="submit" value="查询">
                         <input type="reset" value="重置" onclick="location='/census/register'">
                        </form>
                    </div>
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"
                         data-highcharts-chart="0">
                    </div>
                    <script>
                        $(function () {
                            $('#container').highcharts({
                                title: {
                                    text: '{!! $title !!}',
                                    x: -20 //center
                                },
                                xAxis: {
                                    categories: {!! json_encode($categorys) !!}
                                },
                                yAxis: {
                                    title: {
                                        text: '趋势图'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#808080'
                                    }]
                                },
                                tooltip: {
                                    valueSuffix: ''
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle',
                                    borderWidth: 0
                                },
                                series: [{
                                    name: '新注册人数',
                                    data: {!! json_encode($census) !!}
                                }
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    {!!HTML::script(config('app.static_url').'/js/plugins/highcharts.js')!!}
    @stop
