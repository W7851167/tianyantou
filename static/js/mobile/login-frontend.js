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
  /*验证密码*/
  $('#m_loginpage-pwd').focus(function(){
    $(".error").html('<i style="color:red;">密码长度为6至16位数字、字母组合</i>');
  }).keyup(function () {
    checkRegPassword($(this));
  }).blur(function () {
    checkRegPassword($(this));
  });
  function checkRegPassword(input){
        password = $('#m_loginpage-pwd').val();
    if(password == ''){
      $('.error').html('<i style="color:red;">密码不能为空</i>');
      return false;
    }
    var _p = /^((?=[\x21-\x7d])[^\x60]){8,20}$/;
    if (_p.test(password) && /\d/.test(password) && /[a-zA-Z]/.test(password)){
      $('.error').html('<i style="color:green;">输入正确</i>');
    }else{
        $('.error').html('<i style="color:red;">请输入正确的密码</i>');
      return false;
    }
  }
  function checkRegCaptcha(input){
        captcha = $("#m_log-captcha").val();
    if(captcha == ''){
      $('.error').html('<i style="color:red;">验证码不能为空</i>');
      return false;
    }
    $.ajax({
      type:"POST",
        async: false,
        url:"/signin/captcha",
        data:{captcha:captcha},
        success:function(msg) {
            check = msg;
        }
    });
    if(check == 'fail'){
      $('.error').html('<i style="color:red;">验证码错误</i>');
      return false;
    }
      $('.error').html('<i style="color:green;">验证码正确</i>');
  }
  $('#m_log-captcha').focus(function(){
    $('.error').html('<i style="color:red;">请输入验证码</i>');
  }).keyup(function () {
    checkRegCaptcha($(this));
  }).blur(function () {
    checkRegCaptcha($(this));
  });
  /*验证手机号码*/
  $('#m_reg-telephone').focus(function(){
    $('.error').html('<i style="color:red;">请输入用于注册的手机号码</i>');
  }).keyup(function(){
    checkPhone($(this));
  }).blur(function(){
    checkPhone($(this));
  });
  function checkPhone(input){
    input =  $('#m_reg-telephone');
        phonenumber = input.val();
    if(phonenumber == ''){
        $('.error').html('<i style="color:red;">手机号不能为空</i>');
      return false;
    }
    var _p = /^1[3-8][0-9]{9}$/;
    if (_p.test(phonenumber)){
        $('.error').html('<i style="color:green;">输入正确</i>');
    }else{
        $('.error').html('<i style="color:red;">请输入正确的手机号码</i>');
      return false;
    }
  }

  $('#register .btn-box').click(function() {
    var ok = true;
    //ok = checkRegUserName() && ok;
    ok = checkRegPassword() && ok;
    ok = checkRegCaptcha() && ok;
    return ok;
  });

}

