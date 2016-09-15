@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 786px;">
                <div class="main-inner">
                    <h1 class="section-title">全网通</h1>
                    <div class="cont-box-wrap">
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>待收总额（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl>
                                    <dt>赚取收益（元）</dt>
                                    <dd>0.00</dd>
                                </dl>
                                <dl class="last-item">
                                    <dt>待收笔数（笔）</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cont-box-wrap">
                        <div class="tab click-tab">
                            <ul class="tab-nav">
                                <li class="active"><a href="javascript:void(0);">进行中的债权</a></li>
                                <li class=""><a href="javascript:void(0);">已完成的债权 </a></li>
                            </ul>
                            <div class="tab-main">
                                <div class="active">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_1">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                    <th width="140">购买时间</th>
                                                    <th width="160">债权名称</th>
                                                    <th width="60">年化利率</th>
                                                    <th width="90">投资金额(元)</th>
                                                    <th width="80">待收本息(元)</th>
                                                    <!--      <th>已收本息(元)</th>-->
                                                    <th width="90">到期日</th>
                                                    <th width="50">协议</th>
                                                    <th width="45">状态</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="norecord">
                                                    <td colspan="8">
                                                        没有查询到相关记录
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="pagination" data-pagination-ref="networth_records_1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="tab-content tab-content-table">
                                        <div id="networth_records_2">
                                            <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                                <thead>
                                                <tr>
                                                    <th width="140">购买时间</th>
                                                    <th width="160">债权名称</th>
                                                    <th width="60">年化利率</th>
                                                    <th width="90">投资金额(元)</th>
                                                    <th width="80">已收本息(元)</th>
                                                    <th width="90">到期日</th>
                                                    <th width="50">协议</th>
                                                    <th width="45">状态</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="norecord">
                                                    <td colspan="8">
                                                        没有查询到相关记录
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="pagination" data-pagination-ref="networth_records_2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示：</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1.当有债权发生逾期时，投之家7个工作日内通过专项赎回基金向投资人先行全额赔付。</li>
                                <li>2.购买全网通不收取任何交易手续费。</li>
                                <li>3.发布全网通时，以0.01%*借款本金*借款天数作为居间服务费，其中居间服务费的50%注入投之家专项赎回基金。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop