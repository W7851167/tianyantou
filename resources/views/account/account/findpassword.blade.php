<div class="via-oldphone">
    <ul class="valid-steps valid-steps-3 clearfix">
        <li  class="passed">
            <i class="step-1"></i>
            <span>验证原手机号</span>
        </li>
        <li @if($step==1)class="passed" @endif>
            <i class="step-2"></i>
            <span>设置新交易密码</span>
        </li>
        <li >
            <i class="step-3"></i>
            <span>找回交易密码成功</span>
        </li>
    </ul>
    @if($step == 0)
    <form class="form-group" data-toggle="ajaxForm" action="{!! config('app.account_url') !!}/safe/finddealpassword.html?step=1" method="post" data-refresh-url="#dealpassword-panel">
        <div class="control-group">
            <label>原手机号码：</label>
            <input type="text" class="input-style" value="{!! substr_replace($user['mobile'],'****',3,4) !!}" readonly="readonly">
            <a class="action btn-captcha btn-l" data-toggle="verifyCode" data-action="verifyTelephone">发送短信验证码</a>
        </div>
        <div class="control-group">
            <label>短信验证码：</label>
            <input type="text" class="input-style" name="verifyCode">
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="下一步" />
    </form>
    @elseif($step == 1)
    <form class="form-group" data-toggle="ajaxForm" action="{!! config('app.account_url') !!}/safe/finddealpassword.html?step=2" method="post" data-refresh-url="#dealpassword-panel">
        <div class="control-group">
            <label for="phone-id">新交易密码：</label>
            <input type="password" class="input-style" name="dealpassword">
        </div>
        <div class="control-group">
            <label for="new-phone">重复交易密码：</label>
            <input type="password" class="input-style" name="confirmdealpassword">
            <input type="hidden" name="token" value="hrupFM" />
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="提交" />
    </form>
    @endif
    <p class="warm-tip">手机号是保障账户与资金安全，是您在天眼投重要的身份凭证</p>
</div>