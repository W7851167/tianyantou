
$.fn.extend({
  countdown: function(seconds) {
    var secs = seconds,
      timer = null,
      self = $(this);
    self.attr('disabled', 'disabled');

    function count() {
      if (!!secs) {
        self.removeClass('btn-captcha').addClass('btn-invalid');
        self.html(secs + '秒后重新发送');
        secs--;
        if (!!timer) {
          clearTimeout(timer);
        }
        timer = setTimeout(function() {
          count();
        }, 1000);
      } else {
        self.removeClass('btn-invalid').addClass('btn-captcha');
        self.html('重新发送');
        self.removeAttr('disabled');
      }
    }
    count();
  }
});


  function setupSendVerifyCodeBtn() {
    $(document).on('click', '[data-toggle=verifyCode]', function(e) {
      e.preventDefault();
      var self = $(this);
      if (self.hasClass('btn-invalid')) {
        return;
      }
      var action = self.data('action');
      var tel = self.data('tel') || 'user';
      if (tel != 'user') {
        tel = $(tel).val();
        if (!(/^1[3|4|5|7|8][0-9]\d{4,8}$/.test(tel))) {
          alert('请输入正确的手机号码');
          return;
        }
      }
      var url = '/common/sendVerifyCode?action=' + action + '&telephone=' + tel;
      if (action == 'register') {
        var $captcha = self.parent().prev();
        var _captcha = $captcha.find('input[name=captcha]').val();
        var _captcha_token = $captcha.find('input[name=captcha_token]').val();
        if (_captcha.length < 1) {
          alert('请输入图形验证码以发送短信');
          return;
        }
        url = url + '&captcha=' + _captcha + '&captcha_token=' + _captcha_token;
      }
      self.addClass('btn-invalid').removeClass('btn-captcha');
      $.ajax({
        url: url,
        method: "post",
        success: function(data) {
          self.countdown(60);
        },
        error: function(xhr) {
          var ct = xhr.getResponseHeader('content-type');
          if (ct.indexOf('plain') > -1) {
            alert(xhr.responseText);
          } else {
            alert('系统繁忙请稍后重试，天眼投客服电话 400-883-1803');
          }
          self.addClass('btn-captcha').removeClass('btn-invalid');
        }
      });
    });
  }

