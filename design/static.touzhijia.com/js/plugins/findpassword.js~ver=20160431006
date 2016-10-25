$(function () {
    $('#captcha').click();

    function checkPasswordLength(password) {
        if (password.length < 8 || password.length > 20) {
            return false
        }
        return true
    }

    $('.reset-password form').on('submit', function () {
        var $this = $(this);
        var _password = $this.find('input[name=password]');
        var _repassword = $this.find('input[name=repeat_password]');

        if (_password.length > 0) {
            if (checkPasswordLength(_password.val()) && checkPasswordLength(_repassword.val())) {
                if ($.trim(_password.val()) != $.trim(_repassword.val())) {
                    messageBox('两次输入的密码不一致', 2, 2000);
                    return false;
                } else {

                }
            } else {
                messageBox('密码应为8-20位的数字与字母组合', 2, 2000);
                return false;
            }
        }

        var $phone_no = $('#phone-no');
        if ($phone_no.length > 0) {
            var _p = /^1[3-8][0-9]{9}$/;
            if (!_p.test($phone_no.val())) {
                messageBox('请输入正确的手机号码', 2, 2000);
                return false;
            }
            if ($('phone-captcha').val().length != 6) {
                messageBox('请输入正确的验证码', 2, 2000);
                return false;
            }
        }

        var $email = $('#binded-email');
        var _emailp = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if ($email.length > 0) {
            if($email.val().length<1) {
                messageBox('请输入邮箱地址', 2, 2000);
            }
            if (!_emailp.test($email.val())) {
                messageBox('请输入正确的邮箱', 2, 2000);
                return false;
            }
            if ($('#log-captcha').val().length < 4) {
                messageBox('请输入验证码以发送找回邮件', 2, 2000);
                return false;
            }
        }

    });
});
