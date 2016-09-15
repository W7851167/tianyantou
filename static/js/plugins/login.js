//登录页面验证
(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var $username = $('input[name=username]');
  var $password = $('input[name=password]');
  var $captcha = $('input[name=captcha]');
  var $msgBox = $('#login').find('.error');
  var $msg = $msgBox.find('span');

  if($msgBox.length > 1){
    $msgBox = $('#login').find('.error:eq(1)');
  }
  //显示错误提示
  function showMsg(msg) {
    $msg.html(msg);
    $msgBox.show();
  }

  //检查username password 是否为空
  function checkValue(username, password, captcha) {
    var name_lens = username.length,
      pw_lens = password.length,
      captcha = captcha || '',
      captcha_lens = captcha.length,
      $login = $('#login'),
      $name_input = $login.find('input[name=username]'),
      $password_input = $login.find('input[name=password]'),
      $captcha_input = $login.find('input[name=captcha]');
    if (!name_lens && !pw_lens) {
      showMsg('请输入账户名和密码');
      $name_input.focus();
    } else if (!name_lens && pw_lens) {
      showMsg('请输入账户名');
      $name_input.focus();
    } else if(name_lens && name_lens<5){
      showMsg('账户名最少5位');
      $name_input.focus();
    } else if (name_lens && !pw_lens) {
      showMsg('请输入密码');
      $password_input.focus();
    } else if(name_lens && pw_lens && pw_lens <8){
      showMsg('密码最少8位');
      $password_input.focus();
    }else if(name_lens && pw_lens>=8 && $captcha.length && !captcha_lens){
      showMsg('请输入验证码');
      $captcha_input.focus();
    } else {
      return true;
    }
    return false;
  }


  $("#captcha").click(function() {
    $.getJSON('/signin/captcha', function(data) {
      $("#captcha").attr('src', 'data:image/png;base64,' + data['image']);
      $("input[name=captcha_token]").val(data['token']);
    }).fail(function(xhr) {
      alert(xhr.responseText);
    });
  }).trigger('click');

  /*提交前验证*/
  $('#login-submit').on('click', function() {
    var username = $username.val(),
        password = $password.val(),
        captcha = $captcha.val();

    username = $.trim(username);
    password = $.trim(password);
    captcha = $.trim(captcha);

    if (checkValue(username, password,captcha)) {
      try{
        $password.attr("type","password");
      }catch(e){
      }
      //password = str_encode(password);
      //$password.val(password);
      $.post('/signin.html',{username:username,password:password},function(data){
        if(data.status){
          if(data.url)
            window.location.href = data.url;
          else
            window.location.reload();
        }else{
          $(".error").show();
          $(".error").find("span").text(data.info);
        }

      },'json');
    }

    return false;
  });

  //实现密码的显示与隐藏
    var poswod=$("#loginpage-pwd").eq(0),
        eyeicon=poswod.next(".iconfont"),
        eyebz=0;
    eyeicon.on("click",function(){
      try{
        if(eyebz==0){
          eyebz=1;
          poswod.attr("type","text");
          $(this).css("color","#2aa3ce");
        }else{
          eyebz=0;
          poswod.attr("type","password");
          $(this).css("color","#94969b");
        }
      }catch(e){

      }
    })

}());
