<div class="via-oldphone">
    <ul class="valid-steps valid-steps-3 clearfix">
        <li  class="passed">
            <i class="step-1"></i>
            <span>验证原手机号</span>
        </li>
        <li  class="passed">
            <i class="step-2"></i>
            <span>设置新交易密码</span>
        </li>
        <li >
            <i class="step-3"></i>
            <span>找回交易密码成功</span>
        </li>
    </ul>
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
    <p class="warm-tip">手机号是保障账户与资金安全，是您在投之家重要的身份凭证</p>
</div>