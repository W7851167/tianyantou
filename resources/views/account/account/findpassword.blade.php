<div class="via-oldphone">
    <ul class="valid-steps valid-steps-3 clearfix">
        <li  class="passed">
            <i class="step-1"></i>
            <span>验证原手机号</span>
        </li>
        <li >
            <i class="step-2"></i>
            <span>设置新交易密码</span>
        </li>
        <li >
            <i class="step-3"></i>
            <span>找回交易密码成功</span>
        </li>
    </ul>
    <form class="form-group" data-toggle="ajaxForm" action="https://account.touzhijia.com/safe/finddealpassword.html?step=0" method="post" data-refresh-url="#dealpassword-panel">
        <div class="control-group">
            <label>原手机号码：</label>
            <input type="text" class="input-style" value="150****9522" readonly="readonly">
            <a class="action btn-captcha btn-l" data-toggle="verifyCode" data-action="verifyTelephone">发送短信验证码</a>
        </div>
        <div class="control-group">
            <label>短信验证码：</label>
            <input type="text" class="input-style" name="verifyCode">
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="下一步" />
    </form>
    <p class="warm-tip">手机号是保障账户与资金安全，是您在投之家重要的身份凭证</p>
</div>