@extends('layout.main')
@section('title')交任务@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css"/>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 863px;">
                <div class="main-inner">
                    <h1 class="section-title">提交投标</h1>
                    <div class="active">
                        <div class="tab-content tab-content-table">
                            <div id="networth_records_1">
                                <table class="table table-bordered ucenter-table" style="font-size: 13px;">
                                    <thead>
                                    <tr>
                                        <th width="120">任务名称</th>
                                        <th width="120">投资人用户姓名</th>
                                        <th width="120">注册投资手机号</th>
                                        <th width="90">投资金额(元)</th>
                                        <th width="140">投标时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="norecord">
                                        <td colspan="6">
                                            没有查询到相关记录
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="pagination" data-pagination-ref="networth_records_1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group bindbankcard">
                        <form id="bindbankcard" method="post" data-toggle="ajaxForm">
                            <div class="control-group">
                                <label for="real-name">真实姓名</label>
                                <input type="text" class="input-style" name="data[realname]" value="">
                                <em>请添加投资人用户姓名</em>
                            </div>
                            <div class="control-group">
                                <label>投资人手机号码</label>
                                <input type="text" name="data[mobile]" class="input-style" value="">
                            </div>
                            <div class="control-group">
                                <label>投资金额</label>
                                <input type="text" name="data[price]" class="input-style">
                            </div>
                            <div class="control-group">
                                <label for="">投资时间</label>
                                <input type="text" name="data[invest_time]" class="input-style">
                            </div>
                            <input type="submit" class="btn-blue btn-l btn-submit" value="提交">
                        </form>
                    </div>
                    <div class="tip tab-rules">
                        <h3 class="title-indent">温馨提示</h3>
                        <div class="tip-main">
                            <ul class="tab-content">
                                <li>1. 为保障您的账户资金安全，绑定银行卡时，您选择的银行卡开户名必须与您实名认证姓名一致；</li>
                                <li><em>2. 请您提供正确的银行卡信息，如果您提供的银行卡信息有误，2元/笔的可提现手续费银行将不予退还；</em></li>
                                <li>3. 禁止套现、洗钱行为，绑定银行卡仅限储蓄卡，不支持信用卡绑定提现；</li>
                                <li>4. 填写银行卡信息时，请确认您的“支行名称”(如上海分行虹口支行)，如您无法确定，请致电您的开户银行客服进行咨询。</li>
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
