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
                    <p><a href="javascript:void(0)" class="at">{!! $api->corp->name !!}平台接口数据</a></p>
                </div>
                <div class="info">
                    <div class="info1">
                        <form action="{!! url('api/result',['id'=>$api->id]) !!}" method="get">
                            开始时间：<input type="text" name="start_time" class="Wdate"  value="{!! \Input::get('start_time') !!}" onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})">
                            结束时间：<input type="text" name="end_time" class="Wdate"   value = "{!! \Input::get('end_time')  !!}" onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})">
                            <input type="submit" value="查询">
                        </form>
                    </div>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width="80">用户ID</th>
                            <th width="120">手机号码</th>
                            <th width="80">认证状态</th>
                            <th width="100">注册时间</th>
                            <th width="100">投入金额</th>
                            <th width="100">是否绑卡</th>
                        </tr>
                        @if($result['code'] == 700)
                            @foreach($result['data']['userList']  as $rv)
                                <tr>
                                    <td>{!! $rv['UID'] or '' !!}</td>
                                    <td>{!! $rv['PHONE']  or ''!!}</td>
                                    <td>
                                        @if($rv['RZSTATUS'] == 0) 未认证 @endif
                                        @if($rv['RZSTATUS'] == 1) 已认证 @endif
                                        @if($rv['RZSTATUS'] == 2) 2买入认证 @endif
                                    </td>
                                    <td>{!! $rv['INTIME']  or ''!!}</td>
                                    <td>{!! $rv['money']  or 0.00!!}</td>
                                    <td>{!! $rv['bstaus']  or ''!!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6">{!! $result['message']  or ''!!}</td> </tr>
                       @endif
                    </table>
            </div>
        </div>
    </div>
@stop
