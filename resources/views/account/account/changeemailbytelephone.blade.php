<div class="control-group">
    <ul class="valid-steps valid-steps-3 clearfix">
        <li class="passed">
            <i class="step-1"></i>
            <span>验证手机号码</span>
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
    <form class="form-group" data-toggle="ajaxForm"
          action="{!! config('app.account_url') !!}/safe/changeEmailByTelephone.html?step=0" method="post">
        <div class="control-group">
            <label>原手机号码：</label>
            <input type="text" class="input-style" value="{!! substr_replace($user['mobile'],'****',3,4) !!}" readonly="readonly">
            <a class="action btn-captcha btn-l" data-toggle="verifyCode" data-action="changeEmailByTelephone">发送短信验证码</a>
        </div>
        <div class="control-group">
            <label>短信验证码：</label>
            <input type="text" class="input-style" name="verifyCode">
        </div>
        <input type="submit" class="btn-blue btn-s submit-btn" value="下一步"/>
    </form>
    <p class="warm-tip">邮件接收账户通知，及时了解账户信息变动情况。</p>
</div>