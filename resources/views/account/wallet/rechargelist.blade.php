@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">

            @include('account.common.menu')
            <div class="main tworow" style="height: 876px;">

                <div class="main-inner">
                    <ul class="page-switch page-double clearfix">
                        <li><a href="https://account.touzhijia.com/wallet/recharge.html">我要充值</a></li>
                        <li class="active"><a href="https://account.touzhijia.com/wallet/rechargelist.html">充值记录</a></li>
                    </ul>

                    <div class="cont-box-wrap">
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>累计充值金额(元)</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>账户可用余额(元)</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>充值成功次数</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cont-box-wrap">
                        <div id="recharge-records-table">
                            <table class="table table-blue table-bordered ucenter-table">
                                <thead>
                                <tr>
                                    <th>充值时间</th>
                                    <th>流水号</th>
                                    <th>充值金额</th>
                                    <th>充值方式</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="norecord">
                                    <td colspan="5">
                                        暂无充值记录
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="pagination" data-pagination-ref="recharge-records-table"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
