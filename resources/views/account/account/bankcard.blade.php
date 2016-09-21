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
            @if(empty($bank))
            <div class="main tworow" style="height: 863px;">
                <div class="main-inner">
                    <h1 class="section-title">绑定银行卡</h1>
                    <div class="form-group bindbankcard">
                        <form id="bindbankcard" method="post" data-toggle="ajaxForm">
                            <input type="hidden" name="data[user_id]" value="{!! $user['id'] or '' !!}">
                            <input type="hidden" name="data[type]" value="0">
                            <div class="control-group">
                                <label for="real-name">开户名称</label>
                                <input type="text" name="data[hold_name]" class="input-style" value="">
                                <em>请添加相同开户名的银行卡</em>
                            </div>
                            <div class="control-group">
                                <label>开户银行</label>
                                <select name="data[bank_name]" class="input-style required">
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
                                <input type="text" name="data[branch_name]" class="input-style" value="">
                            </div>
                            <div class="control-group">
                                <label>银行卡号</label>
                                <input type="text" name="data[cardno]" class="input-style">
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
            @else
            <div class="main tworow" style="height: 827px;">
                <div class="main-inner">
                    <h1 class="section-title">银行卡</h1>
                    <div class="card-sketch">
                        <div class="card-img"><img src="{!! config('app.static_url') !!}/images/brand/601288.png"></div>
                        <div class="card-id">银行卡号:{!! substr_replace($bank->cardno,'***************',0,(strlen($bank->cardno) - 4)) !!}</div>
                    </div>
                    <div style="margin-top: 12px;">
                        <a href="{!! config('app.account_url') !!}/bankcard/update.html" class="btn-blue btn-l"
                           style="width:250px;">修改银行卡</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/bindbankcard.js"></script>
    <script>
        _init_area(["\u7701","\u5e02","\u533a"]);
    </script>
@stop