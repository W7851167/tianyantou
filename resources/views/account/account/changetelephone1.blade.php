<div class="via-oldphone">
    <ul class="valid-steps valid-steps-3 clearfix">
        <li  class="passed">
            <i class="step-1"></i>
            <span>验证原手机号</span>
        </li>
        <li  class="passed">
            <i class="step-2"></i>
            <span>验证新手机号</span>
        </li>
        <li >
            <i class="step-3"></i>
            <span>验证成功</span>
        </li>
    </ul>
    <form class="form-group" data-toggle="ajaxForm" action="{!! config('app.account_url') !!}/safe/changeTelephone.html?step=2" method="post" data-refresh-url="#telephone-panel">
        <div class="control-group">
            <label for="new-phone">新手机号码：</label>
            <input type="text" class="input-style" name="telephone" id="new-telephone">
            <a href="javascript:;" data-toggle="verifyCode" data-action="changeTelephone" data-tel="#new-telephone" class="action btn-captcha btn-l">发送短信验证码</a>
        </div>
        <div class="control-group">
            <label for="captcha-code">短信验证码：</label>
            <input type="text" class="input-style" name="verifyCode" />
            <input type="hidden" name="token" value="LC7dbH" />
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="提交" />
    </form>
    <p class="warm-tip">手机号是保障账户与资金安全，是您在投之家重要的身份凭证</p>
</div>