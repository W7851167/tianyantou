@extends('layout.main')
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
                                    <th width="99">剩余积分</th>
                                    <th width="107">备注</th>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-09-16 15:26:01</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 8</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-09-15 18:56:32</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 7</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-09-04 08:53:49</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 6</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-09-03 07:37:31</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 5</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-08-31 19:12:53</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 4</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-08-26 10:36:26</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 3</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-08-19 21:55:08</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 2</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                <tr>
                                    <td width="113" align="center"> 2016-08-05 16:22:25</td>
                                    <td width="102" align="center"> 收入</td>
                                    <td width="108" align="center">
                                        <i style="color: red">+ 1</i>
                                    </td>
                                    <td width="91" align="center"> 1</td>
                                    <td width="99" align="center"> 签到获得1积分</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="meneame" style="margin-top: 30px"> 8 条记录 1/1 页</div>
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
