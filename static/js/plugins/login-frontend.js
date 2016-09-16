/*取消label默认事件*/
(function(){
  formLoginCheck();
  formRegisterCheck();
})();

//登录页面验证
function formLoginCheck(){
  /*验证用户名*/
  $('#log-username').keyup(function(){
    var _username = $(this).val();
    checkLogUserName(_username);
  }).blur(function () {
    var _username = $(this).val();
    checkLogUserName(_username);
  });
  function checkLogUserName(username){
    if (username.length >= 6 && username.length < 32){
      $('#log-error').hide();
    }else{
      $('#log-username').focus();
      $('#log-error').show().find('span').html('请输入正确的用户名');
    }
  }
  /*验证密码*/
  $('#log-password').keyup(function(){
    var _password = $(this).val();
    checkLogPassword(_password);
  }).blur(function () {
    var _password = $(this).val();
    checkLogPassword(_password);
  });
  function checkLogPassword(password){
    if (password.length == ''){
      $('#log-password').focus();
      $('#log-error').show().find('span').html('登录密码不能为空');
    }else{
      $('#log-error').hide();
    }
  }
}
//注册页面验证
function formRegisterCheck(){
  /*验证用户名*/
  $('#reg-username').focus(function(){
    $(this).siblings('.error').html('请输入6-15位字母或数字').css('visibility','visible');
  }).keyup(function () {
    checkRegUserName($(this));
  }).blur(function () {
    checkRegUserName($(this));
  });
  function checkRegUserName(input){
    input = input || $('#reg-username');
    var uError = input.siblings('.error'),
        username = input.val();
    if(username == ''){
      uError.html('<i class="icon-error"></i>用户名不能为空').css('visibility','visible');
      return false;
    }
    var _p = /^[a-zA-Z0-9]{6,15}$/;
    if(/^[0-9]{6,15}$/.test(username)){
      uError.html('<i class="icon-error"></i>用户名不支持全数字').css('visibility','visible');
      return false;
    }
    if(username.length > 15){
      uError.html('<i class="icon-error"></i>请输入6-15位字母或数字').css('visibility','visible');
      return false;
    }
    if (_p.test(username)){
      uError.html('<i class="icon-ok"></i>输入正确').css('visibility','visible');
    }else{
      uError.html('<i class="icon-error"></i>请输入6-15位字母或数字').css('visibility','visible');
      return false;
    }
  }

  $('#ac-username').focus(function(){
    $(this).siblings('.error').html('请输入账户名').css('visibility','visible');
  }).keyup(function () {
    checkLoginUserName($(this));
  }).blur(function () {
    checkLoginUserName($(this));
  });
  function checkLoginUserName(input) {
    input = input || $('#reg-username');
    var uError = input.siblings('.error'),
        username = input.val();
    if(username == ''){
      uError.html('<i class="icon-error"></i>请输入账户名').css('visibility','visible');
      return false;
    }
    if(username.length < 6){
      uError.html('<i class="icon-error"></i>账户名最少6位').css('visibility','visible');
      return false;
    }
    uError.html('<i class="icon-ok"></i>输入正确').css('visibility','visible');
    return true;
  }
  /*验证密码*/
  $('#reg-password,#ac-password').focus(function(){
    $(this).siblings('.error').html('密码长度为8-20个字符，至少包含字母和数字').css('visibility','visible');
  }).keyup(function () {
    checkRegPassword($(this));
  }).blur(function () {
    checkRegPassword($(this));
  });
  function checkRegPassword(input){
    input = input || $('#reg-password');
    var pError = input.siblings('.error'),
        password = input.val();
    if(password == ''){
      pError.html('<i class="icon-error"></i>密码不能为空').css('visibility','visible');
      return false;
    }
    var _p = /^((?=[\x21-\x7d])[^\x60]){8,20}$/;
    if (_p.test(password) && /\d/.test(password) && /[a-zA-Z]/.test(password)){
      pError.html('<i class="icon-ok"></i>输入正确').css('visibility','visible');
    }else{
      pError.html('<i class="icon-error"></i>请输入正确的密码').css('visibility','visible');
      return false;
    }
  }
  /*验证重复密码*/
  // $('#reg-confirm-password').focus(function () {
  //   $(this).siblings('.error').html('请再次输入密码').css('visibility','visible');
  // }).keyup(function () {
  //   checkRePassword($(this));
  // }).blur(function () {
  //   checkRePassword($(this));
  // });
  function checkRePassword(input){
    input = input || $('#reg-confirm-password');
    var rpError = input.siblings('.error'),
        password = input.val();
    if ( password && password === $('#reg-password').val()){
      rpError.html('<i class="icon-ok"></i>输入正确').css('visibility','visible');
    }else{
      rpError.html('<i class="icon-error"></i>您输入的密码不一致').css('visibility','visible');
      return false;
    }
  }
  /*验证手机号码*/
  $('#reg-telephone,#ac-phone').focus(function(){
    $(this).siblings('.error').html('请输入用于注册的手机号码').css('visibility','visible');
  }).keyup(function(){
    checkPhone($(this));
  }).blur(function(){
    checkPhone($(this));
  });
  function checkPhone(input){
    input = input || $('#reg-telephone');
    
    var phError = input.siblings('.error'),
        phonenumber = input.val();
    if(phonenumber == ''){
      phError.html('<i class="icon-error"></i>手机号不能为空').css('visibility','visible');
      return false;
    }
    var _p = /^1[3-8][0-9]{9}$/;
    if (_p.test(phonenumber)){
      phError.html('<i class="icon-ok"></i>输入正确').css('visibility','visible');
      $('#reg-sendVerifyCode').addClass('btn-green').removeClass('btn-invalid');
    }else{
      phError.html('<i class="icon-error"></i>请输入正确的手机号码').css('visibility','visible');
      $('#reg-sendVerifyCode').addClass('btn-invalid').removeClass('btn-green');
      return false;
    }
  }

  $('#register .btn-box').click(function() {
    var ok = true;
    ok = checkRegUserName() && ok;
    ok = checkRegPassword() && ok;
    //ok = checkPhone() && ok;
    $.post('/register.html',$("#register").serialize(),function(data){
        if(data.status){
          if(data.url)
            window.location.href = data.url;
          else
            window.location.reload();
        }else{
          if(data.data.username !== 'undefined')
            $("#username-error").html('<i class="icon-error"></i>'+data.data.username);
          if(data.data.password !== 'undefined')
            $("#pwd-error").html('<i class="icon-error"></i>'+data.data.password);
          if(data.data.password_confirmation !== 'undefined')
            $("#rpwd-error").html('<i class="icon-error"></i>'+data.data.password_confirmation);
        }
    },'json');
    //return ok;
  });

  $('#account [type=submit]').click(function() {
    var ok = true;
    ok = checkLoginUserName($('#ac-username')) && ok;
    ok = checkRegPassword($('#ac-password')) && ok;
    return ok;
  });

  /** 第三方账号绑定,验证码 **/
  $("#thirdbind_captcha").click(function() {
    $.getJSON('/signin/captcha', function(data) {
      $("#thirdbind_captcha").attr('src', 'data:image/png;base64,' + data['image']);
      $("input[name=thirdbind_captcha_token]").val(data['token']);
    }).fail(function(xhr) {
      alert(xhr.responseText);
    });
  }).trigger('click');
}

