<div class="control-group">
    <ul class="valid-steps valid-steps-3 clearfix">
        <li class="passed">
            <i class="step-1"></i>
            <span>发送验证邮件</span>
        </li>
        <li>
            <i class="step-2"></i>
            <span>验证新邮箱</span>
        </li>
        <li>
            <i class="step-3"></i>
            <span>修改成功</span>
        </li>
    </ul>
    <form class="form-group" data-toggle="ajaxForm" method="post" action="{!! config('app.account_url') !!}/safe/validateEmail.html" data-refresh-url="#email-panel" data-callback="autoResize">
        <div class="control-group">
            <label>原邮箱：</label>
            <input type="text" value="{!! substr_replace($user['email'],'******',1,6) !!}" class="input-style" readonly="readonly">
            <a class="action btn-captcha btn-l" data-toggle="verifyEmail" data-url="{!! config('app.account_url') !!}/safe/validateEmail.html" data-action="authOld">发送邮箱验证码</a>
        </div>
        <div class="control-group">
            <label>邮箱验证码：</label>
            <input type="text" class="input-style" name="verifyCode">
            <input type="hidden" name="action" value="emailstep1"/>
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="下一步">
    </form>
    <p class="warm-tip">邮件接收账户通知，及时了解账户信息变动情况。</p>
</div>