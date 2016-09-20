@extends('layout.main')
@section('title')提现@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 872px;">
                <div class="main-inner">
                    <ul class="page-switch page-double clearfix">
                        <li><a href="{!! config('app.account_url_url') !!}/wallet/withdraw.html">我要提现</a></li>
                        <li class="active"><a href="{!! config('app.account_url_url') !!}/wallet/withdrawlist.html">提现记录</a></li>
                    </ul>
                    <div class="cont-box-wrap">
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>累计提现金额（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>账户可用余额（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>提现成功次数</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cont-box-wrap">
                        <div id="withdraw-records-table">
                            <table class="table table-blue table-bordered ucenter-table">
                                <thead>
                                <tr>
                                    <th>提现时间</th>
                                    <th>流水号</th>
                                    <th>提现金额</th>
                                    <th>手续费</th>
                                    <th>到账金额</th>
                                    <th>提现银行</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($lists) > 0)
                                @foreach($lists as $wv)
                                <tr>
                                    <td>{!! $wv->created_at or '---' !!}</td>
                                    <td>无</td>
                                    <td>{!! $wv->price or 0.00 !!}元</td>
                                    <td>{!! $wv->commission or 0.00 !!}元</td>
                                    <td>{!! $wv->price - $wv->commission !!}元</td>
                                    <td>{!! $wv->bank->bank_name or '---' !!}</td>
                                    <td>@if($wv->status==0)已申请@elseif($wv->status==1)已派发@elseif($wv->status=='2')拒绝提现@endif</td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="norecord">
                                    <td colspan="7">
                                        暂无提现记录
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination" data-pagination-ref="withdraw-records-table">{!! $pageHtml !!}</div>
                        </div>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1. 实际提现手续费=原本提现手续费-提现券抵扣（注：如上列表展示中手续费为实际提现手续费）</li>
                                <li>2. 每张提现券可以抵扣提现手续费2元</li>
                            </ul>
                        </div>
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/base64encode.js"></script>
@stop
