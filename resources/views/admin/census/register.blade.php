@extends('admin.common.layout')
@section('title')数据统计@stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
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
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"
                         data-highcharts-chart="0">
                    </div>
                    <script>
                        $(function () {
                            $('#container').highcharts({
                                title: {
                                    text: '最近7天注册统计',
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
    <script type="text/javascript" src="https://static.tianyantou.com/js/plugins/highcharts.js"></script>
@stop