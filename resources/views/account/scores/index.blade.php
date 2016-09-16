@extends('layout.main')
@section('title')积分明细@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/geren.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <!--右边-->
            <div style="height: 676px;" class="main tworow">
                <div class="main-inner">
                    <h1 class="section-title">积分明细</h1>
                    <div class="infobox clearfx">
                        <div class="integral float_left">
                            <p>总积分：{!! $total or 0 !!}分</p>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="infobox">
                        <h1 class="h_short">积分历史记录</h1>
                        <span id="span_data">
                            <table cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                <tr>
                                    <th width="100">时间</th>
                                    <th width="102">类型</th>
                                    <th width="108">积分</th>
                                    {{--<th width="99">剩余积分</th>--}}
                                    <th width="107">备注</th>
                                </tr>
                                @foreach($lists as $sv)
                                <tr>
                                    <td width="113" align="center">{!! $sv->created_at or '' !!}</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ {!! $sv->score or 0 !!}</i>
                                    </td>
                                    {{--<td width="91" align="center">{!! $cv->score or 0 !!}</td>--}}
                                    <td width="99" align="center">{!! $sv->intro or '' !!}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="meneame" style="margin-top: 30px"> {!! $count !!} 条记录 1/1 页</div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
@stop
