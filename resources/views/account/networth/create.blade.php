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
                                <input type="text" class="input-style" readonly="readonly" value="* 希顺">
                                <em>请添加相同开户名的银行卡</em>
                            </div>
                            <div class="control-group">
                                <label>开户银行</label>
                                <select name="bank_name" class="input-style required">
                                    <option value="">请选择开户银行</option>
                                    <option value="中国工商银行">中国工商银行</option>
                                    <option value="中国光大银行">中国光大银行</option>
                                    <option value="中国建设银行">中国建设银行</option>
                                    <option value="中国农业银行">中国农业银行</option>
                                    <option value="招商银行">招商银行</option>
                                    <option value="中国银行">中国银行</option>
                                    <option value="交通银行">交通银行</option>
                                    <option value="广发银行">广发银行</option>
                                    <option value="兰州银行">兰州银行</option>
                                    <option value="中国民生银行">中国民生银行</option>
                                    <option value="中信银行">中信银行</option>
                                    <option value="平安银行">平安银行</option>
                                    <option value="北京银行">北京银行</option>
                                    <option value="成都银行">成都银行</option>
                                    <option value="浦东发展银行">浦东发展银行</option>
                                    <option value="华夏银行">华夏银行</option>
                                    <option value="上海银行">上海银行</option>
                                    <option value="渤海银行">渤海银行</option>
                                    <option value="宁波银行">宁波银行</option>
                                    <option value="南京银行">南京银行</option>
                                    <option value="BEA东亚银行">BEA东亚银行</option>
                                    <option value="兴业银行">兴业银行</option>
                                    <option value="天津银行">天津银行</option>
                                    <option value="北京农商行">北京农商行</option>
                                    <option value="杭州银行">杭州银行</option>
                                    <option value="恒丰银行">恒丰银行</option>
                                    <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
                                    <option value="青岛银行">青岛银行</option>
                                    <option value="上海农商行">上海农商行</option>
                                    <option value="重庆农商银行">重庆农商银行</option>
                                </select>
                            </div>
                            <div class="control-group">
                                <label>开户行所在地</label>
                                <select name="sheng" class="input-style" selectedindex="0"><option value="0">省份</option><option value="1">北京市</option><option value="22">天津市</option><option value="44">上海市</option><option value="66">重庆市</option><option value="108">河北省</option><option value="406">山西省</option><option value="622">内蒙古</option><option value="804">辽宁省</option><option value="945">吉林省</option><option value="1036">黑龙江省</option><option value="1226">江苏省</option><option value="1371">浙江省</option><option value="1500">安徽省</option><option value="1679">福建省</option><option value="1812">江西省</option><option value="1992">山东省</option><option value="2197">河南省</option><option value="2456">湖北省</option><option value="2613">湖南省</option><option value="2822">广东省</option><option value="3015">广西</option><option value="3201">海南省</option><option value="3235">四川省</option><option value="3561">贵州省</option><option value="3728">云南省</option><option value="3983">西藏</option><option value="4136">陕西省</option><option value="4334">甘肃省</option><option value="4499">青海省</option><option value="4588">宁夏</option><option value="4624">新疆</option><option value="4802">香港</option><option value="4822">澳门</option></select>
                                <input name="sheng_str" type="hidden" value="">
                                <select name="city" class="input-style"><option value="1">地级市</option></select>
                                <input name="city_str" type="hidden" value="">
                            </div>
                            <div class="control-group">
                                <label>开户支行名称</label>
                                <input type="text" name="zhihang" class="input-style" value="">
                            </div>
                            <div class="control-group">
                                <label>银行卡号</label>
                                <input type="text" name="bank_id" class="input-style">
                            </div>
                            <div class="control-group">
                                <label for="">确认卡号</label>
                                <input type="text" name="confirm_bank_id" class="input-style">
                            </div>
                            <div class="control-group">
                                <label for="">手机号码</label>
                                <input type="text" class="input-style" readonly="readonly" value="186****0121">
                                <a href="javascript:;" class="btn-captcha btn-l" data-toggle="verifyCode" data-action="bindbankcard">发送验证码</a>
                            </div>
                            <div class="control-group">
                                <label>手机验证码</label>
                                <input type="text" class="input-style" name="verify_code">
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