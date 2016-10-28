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
                        <a href="javascript">任务列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('census') !!}" class="at">任务统计</a></p>
                    <p><a href="{!! url('census/register') !!}">注册统计</a></p>
                </div>
                <div class="info">
                    <div class="info1">
                        <form action="{!! url('census') !!}" method="get">
                            平台名称:
                            <select name="corp_id">
                                <option value="0">全部平台&nbsp;&nbsp;</option>
                                @foreach($corps as $cv)
                                    <option value="{!! $cv->id or '' !!}" @if(Input::get('corp_id') == $cv->id) selected @endif>{!! $cv->name or '' !!}</option>
                                @endforeach
                            </select>
                            任务名称:
                            <select name="task_id" id="task_id">
                                <option value="0">全部任务&nbsp;&nbsp;</option>
                            </select>
                            开始时间：<input type="text" name="start_time" class="Wdate" value="{!! date('Y-m-d', $startTime) !!}"  onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})">
                            结束时间：<input type="text" name="end_time" class="Wdate"  value="{!! date('Y-m-d', $endTime) !!}" onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})">
                            <input type="submit" value="查询">
                            <input type="reset" value="重置" onclick="location='/census'">
                        </form>
                    </div>
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"
                         data-highcharts-chart="0">
                    </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='100'>平台名称</th>
                            <th width="100">任务标题</th>
                            <th width="60">投资笔数</th>
                            <th width="60">驳回笔数</th>
                            <th width="100">剩余投资笔数</th>
                            <th width="60">驳回金额</th>
                            <th width="60">已完成金额</th>
                            <th width="65">收益金额</th>
                        </tr>
                        @if(count($taskstats) > 0)
                            @foreach($taskstats as $tv)
                        <tr>
                            <td>{!! $tv->corp->name or '' !!}</td>
                            <td>{!! $tv->title or '--' !!}</td>
                            <td>{!! $tv->investnums or '0' !!}</td>
                            <td>{!! $tv->reject or '0' !!}</td>
                            <td>{!! $tv->overplus or '0.00' !!}</td>
                            <td>{!! $tv->create or '0.00' !!}</td>
                            <td>{!! $tv->commit or '0.00' !!}</td>
                            <td>{!! $tv->complete or '0.00' !!}</td>
                            <td>{!! $tv->income or '0.00' !!}</td>
                        </tr>
                            @endforeach
                        @else
                        <tr><td colspan="8"></td></tr>
                        @endif
                    </table>
                    <script>
                        $(function () {
                            $('#container').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: '{!! $title !!}',
                                    x: -20 //center
                                },
                                xAxis: {
                                    categories: {!! json_encode($categorys) !!}
                                },
                                credits: {
                                    enabled: false
                                },
                                series: [{
                                    name: '已领任务',
                                    data: {!! json_encode($census[0]) !!}
                                }, {
                                        name: '已交任务',
                                        data: {!! json_encode($census[2]) !!}
                                }, {
                                    name: '已完成任务',
                                    data: {!! json_encode($census[1]) !!}
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
    <script id="taskTemplate" type="text/x-jquery-tmpl">
    <option value="${id}">${title}</option>
    </script>
    <script src="{!!URL('vendor/jquery.tmpl/jquery.tmpl.min.js')!!}"></script>
    <script language="javascript">
        $(function(){
            $('select[name="corp_id"]').change(function(){
                var corpId = $(this).val();
                $.post('/ajax/tasks',{corp_id:corpId}, function(res){
                    if(res.status == 0) {
                        error(res.message);
                    }
                    var tasks = res.tasks;
                    console.log(tasks);
                    $('#taskTemplate').tmpl(tasks).appendTo('#task_id');
                });
            });
        })
    </script>
@stop
