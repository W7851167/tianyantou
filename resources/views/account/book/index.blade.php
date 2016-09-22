@extends('layout.main')
@section('title')网贷记账@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 917px;">
                <div class="main-inner">
                    <div class="cont-box-wrap">
                        <a class="btn btn-blue-o btn-s" style="float:right" href="{!! config('app.account_url') !!}/book/create" data-toggle="modal">记一笔</a>
                    </div>
                    <h1 class="section-title">记账列表</h1>
                    <div id="autoreserve_records">
                        <table class="table table-blue table-bordered ucenter-table" style="font-size:13px;">
                            <thead>
                            <tr>
                                <th>投资平台</th>
                                <th>项目名称</th>
                                <th>起息日期</th>
                                <th>投资金额</th>
                                <th>预期利息</th>
                                <th>期限</th>
                                <th>实际年化</th>
                                <th>返现奖励</th>
                                <th>折扣奖励</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($lists) > 0)
                                @foreach($lists as $bv)
                            <tr>
                                <td>{!! $bv->corp_name or '--' !!}</td>
                                <td>{!! $bv->task_name or '--' !!}</td>
                                <td>{!! $bv->start_time or '--' !!}</td>
                                <td>{!! $bv->money or '0.00' !!}</td>
                                <td>@if($bv->rate_unit=='月'){!! $bv->money*12*$bv->rate !!}@elseif($bv->rate_unit=='年'){!! $bv->money*$bv->rate !!}@endif</td>
                                <td>{!! $bv->rate or '--' !!}@if($bv->rate_unit=='月'){!! $bv->rate ?'个月':'' !!}@elseif($bv->rate_unit=='年'){!! $bv->rate ?'年':'' !!}@endif</td>
                                <td>@if($bv->rate_unit=='月'){!! sprintf('%.2f',$bv->rate * 12) !!}@elseif($bv->rate_unit=='年'){!! sprintf('%.2f',$bv->rate) !!}@endif</td>
                                <td>{!! $bv->back_reward or '--' !!}</td>
                                <td>{!! $bv->discount_reward or '--' !!}</td>
                                <td></td>
                            </tr>
                                @endforeach
                            @else
                            <tr class="norecord">
                                <td colspan="10">
                                    您还没有记账信息
                                </td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="pagination" data-pagination-ref="autoreserve_records"></div>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1、除活期、等额本息债权及全网通外，其他待回款金额均可参与续购，续购的债权是普通的精选P2P债权组合，即不含新手、专享、移动专属和品牌专享。</li>
                                <li>2、预约续购享受加息奖励，奖励规则如下： <br>续购第一次奖励加息0.2%， 第二次0.5%， 第三次1%， 续购三次之后循环。<br>例如：续购债权的年化利率是14%，则续购第一次年化利率=14%+0.2%，第二次年化利率=14%+0.5%，
                                    第三次年化利率=14%+1%，第四次年化利率=14%+0.2%。
                                </li>
                                <li>3、续购奖励的金额会在回款日发放到账户中。</li>
                                <li>4、已转让的债权将自动取消续购且没有续购奖励。</li>
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
@stop
