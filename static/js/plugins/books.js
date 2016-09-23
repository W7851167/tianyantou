(function () {
    var $form = $('#bindbankcard');

    $form.submit(function () {
        var $corp_name = $(this).find("input[name='data[corp_name]']"),
            $task_name = $(this).find("input[name='data[task_name]']"),
            $money = $(this).find("input[name='data[moeny]']"),
            $start_time = $(this).find("input[name='data[start_time]']"),
            $rate = $(this).find("input[name='data[rate]']")
            $rate = $(this).find("input[name='data[rate]']");
        var $province = $(this).find("select[name='data[province]']");
        var $city = $(this).find("select[name='data[city]']");
        var bankName = $(this).find("select[name='data[bank_name]']").val();
        if (!$.trim($corp_name.val())) {
            messageBox('请填写投资平台', 2);
            return false;
        }
        if (!$.trim($task_name.val())) {
            messageBox('请填写项目名称', 2);
            return false;
        }
        if (!$.trim($money.val())) {
            messageBox('请填写投资金额', 2);
            return false;
        }
        if (!$.trim($start_time.val())) {
            messageBox('请填写项目名称', 2);
            return false;
        }
        if (!$.trim($rate.val())) {
            messageBox('请填写利率', 2);
            return false;
        }
        if ($money.val() == '省') {
            messageBox('请填写投资金额', 2);
            return false;
        }
        if ($city.val() == '市') {
            messageBox('请选择城市', 2);
            return false;
        }
        if (!$.trim($(this).find("input[name='data[branch_name]']").val())) {
            messageBox('请填写开户支行名称', 2);
            return false;
        }
        var bank_id = $.trim($(this).find("input[name='data[cardno]']").val());
        if (!bank_id) {
            messageBox('请输入银行卡号', 2);
            return false;
        }
        if (!/^\d{12,19}$/.test(bank_id)) {
            messageBox('银行卡只能包含12到19位数字', 2);
            return false;
        }
        if ($.trim($(this).find('input[name=confirm_cardno]').val()) != bank_id) {
            messageBox('两次银行卡输入不相同', 2);
            return false;
        }
        //if(!$.trim($(this).find('input[name=verify_code]').val())){
        //    messageBox('请输入手机验证码', 2);
        //    return false;
        //}
        $province.children("option").each(function (i) {
            if ($(this).val() == $province.val()) {
                $('input[name=sheng_str]').val($(this).html());
            }
        });
        $city.children("option").each(function (i) {
            if ($(this).val() == $city.val()) {
                $('input[name=city_str]').val($(this).html());
            }
        });
    });


    //var $submit = $('input[type=submit]')

    function checkPlatform() {
        var $platformName = $('input[name="data[corp_name]"]'),
            $msg = $(this).parents('.form-group').find('.msg-wrap');
        if ($platformName == null || $platformName == '') {
            showMessage($msg, '平台名称不能为空', 'error');
            Ucenter.disableSubmit($submit);
        } else {
            $msg.html('').hide();
        }
    }

    $('input[name="data[corp_name]"]').blur(function () {
        alert(1);
        checkPlatform()
    })
}());
