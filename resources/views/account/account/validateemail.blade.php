<div>
    <ul class="valid-steps valid-steps-2 clearfix">
        <li  class="passed">
            <i class="step-1"></i>
            <span>发送验证邮件</span>
        </li>
        <li >
            <i class="step-2"></i>
            <span>验证成功</span>
        </li>
    </ul>
    <form class="form-group" data-toggle="ajaxForm" method="post" action="{!! config('app.account_url') !!}/safe/validateEmail.html"
                       data-refresh-url="#email-panel" data-callback ="autoResize">
        <div class="control-group">
            <label>邮箱：</label>
            <input id="newemail" type="text" name="email" class="input-style"/>
            <a class="action btn-captcha btn-l" data-toggle="verifyEmail" data-url="{!! config('app.account_url') !!}/safe/validateEmail.html" data-email="#newemail" data-action="authEmail">发送邮箱验证码</a>
            <input type="hidden" name="action" value="emailauth"/>
        </div>
        <div class="control-group">
            <label>邮箱验证码：</label>
            <input type="text" class="input-style" name="verifyCode">
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="下一步">
    </form>
    <p class="warm-tip">邮件接收账户通知，及时了解账户信息变动情况。</p>
</div>