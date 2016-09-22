@extends('layout.main')
@section('title')记一笔@stop
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/template.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 863px;">
                <div class="main-inner">
                    <h1 class="section-title tit tit1">
                        <div class="use-tpl-btn fr"><div class="txt">使用模板记账</div>
                            <div class="note-tpl" style="display: block;">
                                <table>
                                    <tbody><tr><th>平台</th><th>项目名称</th><th>年化收益</th><th>期限</th><th>还款方式</th><th></th></tr>
                                    <tr onclick="javascript:fillRecord('d5e5108e-ccd5-49da-aeb6-f18de4085235')" id="d5e5108e-ccd5-49da-aeb6-f18de4085235">
                                        <td>久信e贷</td>
                                        <td>久信e贷_2016_9_22</td>
                                        <td>10.80%/年</td>
                                        <td>6个月</td>
                                        <td>一次性还本付息</td>
                                        <td><a class="del_button" onclick="delModel('d5e5108e-ccd5-49da-aeb6-f18de4085235');">删</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <i class="icn arr"></i>
                            </div>
                        </div>
                        记一笔
                    </h1>
                    <div class="form-group bindbankcard">
                        <form id="bindbankcard" method="post" data-toggle="ajaxForm">
                            <input type="hidden" name="data[user_id]" value="{!! $user['id'] or '' !!}">
                            <div class="control-group">
                                <label for="real-name">投资平台</label>
                                <input type="text" name="data[corp_name]" class="input-style" value="">
                            </div>
                            <div class="control-group">
                                <label>项目名称</label>
                                <input type="text" name="data[task_name]" class="input-style" value="" placeholder="输入项目名称必填">
                            </div>
                            <div class="autobuy-panel-2 control-group">
                                <label>投资金额</label>
                                <input class="input-style input-size" type="text" name="data[money]" value="" placeholder="输入实投金额(不含抵扣)" />
                                <i class="input-icon">元</i>
                            </div>
                            <div class="autobuy-panel-2 control-group">
                                <label>起息日期</label>
                                <input id="valueDate" class="input-style input-size" type="text" name="data[start_time]" value="" onclick="WdatePicker()" placeholder="选择起息时间" />
                                <i class="input-icon iconfont">&#xe689;</i>
                            </div>
                            <div class="control-group">
                                <label>利率</label>
                                <input type="text" name="data[start_time]" class="input-style" placeholder="例:10.8">
                                <label class="control-option">
                                    <input type="radio" name="data[rate_unit]" value="年" checked="checked" /> 年利率
                                </label>
                                <label class="control-option">
                                    <input type="radio" name="data[rate_unit]" value="月" /> 月利率
                                </label>
                            </div>
                            <div class="control-group">
                                <label for="">期限</label>
                                <input type="text" name="data[term]" class="input-style" placeholder="例:6">
                                <label class="control-option">
                                    <input type="radio" name="data[term_unit]" value="月" checked="checked" /> 月
                                </label>
                                <label class="control-option">
                                    <input type="radio" name="data[term_unit]" value="年" /> 年
                                </label>
                            </div>
                            <div class="control-group">
                                <label for="">还款方式</label>
                                <select name="data[term_unit]" class="input-style required">
                                    <option value="一次性还本付息">一次性还本付息</option>
                                    <option value="按月付息到期还本">按月付息到期还本</option>
                                    <option value="按日付息到期还本">按日付息到期还本</option>
                                    <option value="等额本金">等额本金</option>
                                    <option value="等额本息">等额本息</option>
                                    <option value="月还息按季等额本金">月还息按季等额本金</option>
                                    <option value="利息复投">利息复投</option>
                                    <option value="满标付息，到期还本">满标付息，到期还本</option>
                                    <option value="按季付息到期还本">按季付息到期还本</option>
                                    <option value="固定付息日">固定付息日</option>
                                </select>
                            </div>
                            <div class="control-group">
                                <label for="">现金奖励</label>
                                <input type="text" name="data[back_reward]" class="input-style" placeholder="选填">
                                <label for="">折扣奖励</label>
                                <input type="text" name="data[discount_reward]" class="input-style" placeholder="选填">
                            </div>
                            <div class="control-group">
                                <label for="">管理费</label>
                                <input type="text" name="data[manage_fee]" class="input-style" placeholder="输入管理费(选填)">
                                <i class="input-icon">%</i>
                            </div>
                            <div class="control-group">
                                <label for="">模板名称</label>
                                <input type="text" name="data[template_name]" class="input-style" placeholder="输入模板名称(选填)">
                                <label class="control-option">
                                    <input type="checkbox" name="data[is_template]" value="1"  /> 存为模板
                                </label>
                            </div>
                            <div class="control-group">
                                <label for="">备注</label>
                                <input type="text" name="data[remark]" class="input-style">
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
    <script src="{!! config('app.url') !!}/vendor/datepicker/WdatePicker.js"></script>
@stop