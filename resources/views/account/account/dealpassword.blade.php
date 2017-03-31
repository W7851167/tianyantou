<form data-toggle="ajaxForm" method="post" action="{!! config('app.account_url') !!}/safe/changeDealPassword.html">
    <div class="form-group">
        <div class="msg-wrap"></div>
        <div class="control-group">
            <label for="account-name">用户名：</label>
            <span>{!! $user['username'] or '' !!}</span>
        </div>
        <div class="control-group">
            <label>原交易密码：</label>
            <input type="password" name="oldPassword" value="" class="input-style" />
        </div>
        <div class="control-group">
            <label>新交易密码：</label>
            <input type="password" name="newPassword" value="" class="input-style" placeholder="密码为6位数字"/>
        </div>
        <div class="control-group">
            <label>确认交易密码：</label>
            <input type="password" name="confirmPassword" value="" class="input-style" />
        </div>
        <input type="submit" value="修改" class="btn-blue btn-s submit-btn" />
    </div>
    <p class="warm-tip">保障账户安全，建议您定期更换密码。</p>
</form>