@extends('admin.common.layout')
@section('title')提现操作@stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::script('vendor/area/area.js')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('user') !!}">用户管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="javascript:void(0)">编辑操作</a>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($user->bank->id))
                        <input type="hidden" name="data[id]" value="{!! $user->bank->id !!}">
                    @endif
                    <input type="hidden" name="data[user_id]" value="{!! $user->id !!}">
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">账号名：</div>
                            <div><input type="text" name="data[hold_name]" value="{!! $user->bank->hold_name or '' !!}"></div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft">账号类型：</div>
                            <div>
                                <select name="data[type]" id="bank-type" style="width: 240px;">
                                    <option value="0" @if(!empty($user->bank->type) && $user->bank->type == 0)selected @endif>银行卡</option>
                                    <option value="1" @if(!empty($user->bank->type) && $user->bank->type == 1)selected @endif>支付宝</option>
                                </select>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix bank-content" @if(!empty($user->bank->type)&&$user->bank->type==1)style="display: none" @endif>
                            <div class="infospaceAddLeft">开户行名称：</div>
                            <div>
                                <select name="data[bank_name]" style="width: 240px;">
                                    <option value="">请选择开户银行</option>
                                    <option value="中国工商银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国工商银行')selected @endif>中国工商银行</option>
                                    <option value="中国光大银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国光大银行')selected @endif>中国光大银行</option>
                                    <option value="中国建设银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国建设银行')selected @endif>中国建设银行</option>
                                    <option value="中国农业银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国农业银行')selected @endif>中国农业银行</option>
                                    <option value="招商银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '招商银行')selected @endif>招商银行</option>
                                    <option value="中国银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国银行')selected @endif>中国银行</option>
                                    <option value="交通银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '交通银行')selected @endif>交通银行</option>
                                    <option value="广发银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '广发银行')selected @endif>广发银行</option>
                                    <option value="兰州银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '兰州银行')selected @endif>兰州银行</option>
                                    <option value="中国民生银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国民生银行')selected @endif>中国民生银行</option>
                                    <option value="中信银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中信银行')selected @endif>中信银行</option>
                                    <option value="平安银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '平安银行')selected @endif>平安银行</option>
                                    <option value="北京银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '北京银行')selected @endif>北京银行</option>
                                    <option value="成都银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '成都银行')selected @endif>成都银行</option>
                                    <option value="浦东发展银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '浦东发展银行')selected @endif>浦东发展银行</option>
                                    <option value="华夏银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '华夏银行')selected @endif>华夏银行</option>
                                    <option value="上海银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '上海银行')selected @endif>上海银行</option>
                                    <option value="渤海银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '渤海银行')selected @endif>渤海银行</option>
                                    <option value="宁波银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '宁波银行')selected @endif>宁波银行</option>
                                    <option value="南京银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '南京银行')selected @endif>南京银行</option>
                                    <option value="BEA东亚银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == 'BEA东亚银行')selected @endif>BEA东亚银行</option>
                                    <option value="兴业银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '兴业银行')selected @endif>兴业银行</option>
                                    <option value="天津银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '天津银行')selected @endif>天津银行</option>
                                    <option value="北京农商行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '北京农商行')selected @endif>北京农商行</option>
                                    <option value="杭州银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '杭州银行')selected @endif>杭州银行</option>
                                    <option value="恒丰银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '恒丰银行')selected @endif>恒丰银行</option>
                                    <option value="中国邮政储蓄银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '中国邮政储蓄银行')selected @endif>中国邮政储蓄银行</option>
                                    <option value="青岛银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '青岛银行')selected @endif>青岛银行</option>
                                    <option value="上海农商行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '上海农商行')selected @endif>上海农商行</option>
                                    <option value="重庆农商银行" @if(!empty($user->bank->bank_name)&&$user->bank->bank_name == '重庆农商银行')selected @endif>重庆农商银行</option>
                                </select>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix bank-content" @if(!empty($user->bank->type)&&$user->bank->type==1)style="display: none" @endif>
                            <div class="infospaceAddLeft h80">银行地址：</div>
                            <div>
                                <p>
                                    <select name="data[province]" class="province" id="province">
                                        <option>省</option>
                                    </select>
                                    <select name="data[city]" class="city" id="city" >
                                        <option value="">市</option>
                                    </select>
                                    <select name="" class="county" id="county" style="display: none">
                                        <option>区</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="text" name="data[branch_name]" placeholder="请输入支行名称" value="{!! $user->bank->branch_name or '' !!}" style="margin-top: 18px;">
                                </p>
                            </div>
                        </div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft bank-cardno">{!! empty($user->bank->type)?'银行卡号':'支付宝账号' !!}：</div>
                            <div><input type="text" name="data[cardno]" value="{!! $user->bank->cardno or '' !!}"></div>
                        </div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                            <input class="return" type="reset" value="重置">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        @if(!empty($user))
          _init_area({!! $area !!});
        @else
        _init_area(["\u7701","\u5e02","\u533a"]);
        @endif
        $("#bank-type").on("change",function(){
            if($(this).val() == 1){
                $(".bank-content").fadeOut();
                _init_area(["\u7701","\u5e02","\u533a"]);
                $('.bank-content option:first-child').attr('selected','selected');
                $(".bank-content").find('input').attr('value','');
                $(".bank-cardno").text("支付宝账号:");
            }else{
                $(".bank-content").fadeIn();
                $(".bank-cardno").text("银行卡号:");
            }
        });
    </script>
@stop
