<form data-toggle="ajaxForm" method="post" action="{!! config('app.static_url') !!}/safe/changeNickname.html" >
    <div class="form-group">
        <div class="msg-wrap"></div>
        <div class="control-group">
            <label>用户名：</label>
            <input type="text" name="nickname" value="" class="input-style" placeholder="8~15位字母，可加数字"/>
        </div>
        <div class="control-group">
            <label>重复用户名：</label>
            <input type="text" name="nickname_verify" value="" class="input-style" />
        </div>
        <input type="submit" value="修改" class="btn-blue btn-s submit-btn" />
    </div>
    <p class="warm-tip">用户名一旦修改成功后将无法修改，请谨慎操作。</p>
</form>