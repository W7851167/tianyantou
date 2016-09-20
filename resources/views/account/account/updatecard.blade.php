@extends('layout.main')
@section('title')银行卡@stop
@section('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
    <script src="/vendor/area/area.js"></script>
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
                <div class="main tworow" style="height: 863px;">
                    <div class="main-inner">
                        <h1 class="section-title">绑定银行卡</h1>
                        <div class="form-group bindbankcard">
                            <form id="bindbankcard" method="post" data-toggle="ajaxForm">
                                <input type="hidden" name="data[id]" value="{!! $bank->id or '' !!}">
                                <input type="hidden" name="data[user_id]" value="{!! $bank['user_id'] or '' !!}">
                                <input type="hidden" name="data[type]" value="{!! $bank->type or '' !!}">
                                <div class="control-group">
                                    <label for="real-name">开户名称</label>
                                    <input type="text" name="data[hold_name]" class="input-style" value="{!! $bank->hold_name or '' !!}">
                                    <em>请添加相同开户名的银行卡</em>
                                </div>
                                <div class="control-group">
                                    <label>开户银行</label>
                                    <select name="data[bank_name]" class="input-style required">
                                        <option value="">请选择开户银行</option>
                                        <option value="中国工商银行" @if($bank->bank_name=='中国工商银行')selected @endif>中国工商银行</option>
                                        <option value="中国光大银行" @if($bank->bank_name=='中国光大银行')selected @endif>中国光大银行</option>
                                        <option value="中国建设银行" @if($bank->bank_name=='中国建设银行')selected @endif>中国建设银行</option>
                                        <option value="中国农业银行" @if($bank->bank_name=='中国农业银行')selected @endif>中国农业银行</option>
                                        <option value="招商银行" @if($bank->bank_name=='招商银行')selected @endif>招商银行</option>
                                        <option value="中国银行" @if($bank->bank_name=='中国银行')selected @endif>中国银行</option>
                                        <option value="交通银行" @if($bank->bank_name=='交通银行')selected @endif>交通银行</option>
                                        <option value="广发银行" @if($bank->bank_name=='广发银行')selected @endif>广发银行</option>
                                        <option value="兰州银行" @if($bank->bank_name=='兰州银行')selected @endif>兰州银行</option>
                                        <option value="中国民生银行" @if($bank->bank_name=='中国民生银行')selected @endif>中国民生银行</option>
                                        <option value="中信银行" @if($bank->bank_name=='中信银行')selected @endif>中信银行</option>
                                        <option value="平安银行" @if($bank->bank_name=='平安银行')selected @endif>平安银行</option>
                                        <option value="北京银行" @if($bank->bank_name=='北京银行')selected @endif>北京银行</option>
                                        <option value="成都银行" @if($bank->bank_name=='成都银行')selected @endif>成都银行</option>
                                        <option value="浦东发展银行" @if($bank->bank_name=='浦东发展银行')selected @endif>浦东发展银行</option>
                                        <option value="华夏银行" @if($bank->bank_name=='华夏银行')selected @endif>华夏银行</option>
                                        <option value="上海银行" @if($bank->bank_name=='上海银行')selected @endif>上海银行</option>
                                        <option value="渤海银行" @if($bank->bank_name=='渤海银行')selected @endif>渤海银行</option>
                                        <option value="宁波银行" @if($bank->bank_name=='宁波银行')selected @endif>宁波银行</option>
                                        <option value="南京银行" @if($bank->bank_name=='南京银行')selected @endif>南京银行</option>
                                        <option value="BEA东亚银行" @if($bank->bank_name=='BEA东亚银行')selected @endif>BEA东亚银行</option>
                                        <option value="兴业银行" @if($bank->bank_name=='兴业银行')selected @endif>兴业银行</option>
                                        <option value="天津银行" @if($bank->bank_name=='天津银行')selected @endif>天津银行</option>
                                        <option value="北京农商行" @if($bank->bank_name=='北京农商行')selected @endif>北京农商行</option>
                                        <option value="杭州银行" @if($bank->bank_name=='杭州银行')selected @endif>杭州银行</option>
                                        <option value="恒丰银行" @if($bank->bank_name=='恒丰银行')selected @endif>恒丰银行</option>
                                        <option value="中国邮政储蓄银行" @if($bank->bank_name=='中国邮政储蓄银行')selected @endif>中国邮政储蓄银行</option>
                                        <option value="青岛银行" @if($bank->bank_name=='青岛银行')selected @endif>青岛银行</option>
                                        <option value="上海农商行" @if($bank->bank_name=='上海农商行')selected @endif>上海农商行</option>
                                        <option value="重庆农商银行" @if($bank->bank_name=='重庆农商银行')selected @endif>重庆农商银行</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <label>开户行所在地</label>
                                    <select name="data[province]" class="input-style province" id="province" selectedindex="0">
                                    </select>
                                    {{--<input name="data[province]" type="hidden" value="">--}}
                                    <select name="data[city]" class="input-style city" id="city">
                                        {{--<option value="1">地级市</option>--}}
                                    </select>
                                    {{--<input name="city" type="hidden" value="">--}}
                                </div>
                                <div class="control-group">
                                    <label>开户支行名称</label>
                                    <input type="text" name="data[branch_name]" class="input-style" value="{!! $bank->branch_name or '' !!}">
                                </div>
                                <div class="control-group">
                                    <label>银行卡号</label>
                                    <input type="text" name="data[cardno]" class="input-style" value="{!! $bank->cardno or '' !!}">
                                </div>
                                <div class="control-group">
                                    <label for="">确认卡号</label>
                                    <input type="text" name="confirm_cardno" class="input-style">
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
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/base64encode.js"></script>
    <script>
        _init_area({!! $area !!});
    </script>
@stop