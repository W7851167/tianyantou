(function () {
    var $form = $('#bindbankcard');

    $form.submit(function () {
        var $corp_name = $(this).find("input[name='data[corp_name]']"),
            $task_name = $(this).find("input[name='data[task_name]']"),
            $money = $(this).find("input[name='data[money]']"),
            $start_time = $(this).find("input[name='data[start_time]']"),
            $rate = $(this).find("input[name='data[rate]']"),
            $term = $(this).find("input[name='data[term]']");
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
        if (!$.trim($term.val())) {
            messageBox('请填写期限', 2);
            return false;
        }
    });
    $('.use-tpl-btn').on('click', function () {
        $('.note-tpl').toggle();
    });
    $('table tr').on('click', function () {
        var id = $(this).data('id');
        url = '/book/template/' + id;
        $.get(url, function (data) {
            $('#bindbankcard').html(data);
        });
    });
    //$('input').on('blur', function () {
    //    var money = $("input[name='data[money]']").val(),
    //        rate = $("input[name='data[rate]']").val(),
    //        rate_unit = $("input[name='data[rate_unit]']").val(),
    //        term = $("input[name='data[term]']").val(),
    //        term_unit = $("input[name='data[term_unit]']").val(),
    //        repay_type = $("select[name='data[repay_type]']"),
    //        start_time = $("input[name='data[start_time]']").val();
    //      if($.trim(money) && $.trim(rate) && $.trim(rate) && $.trim(term) && $.trim(term_unit) && $.trim(repay_type) && $.trim(start_time)){
    //          $.post('book/stats',{
    //              'money' : money,
    //              'rate' : rate,
    //              'rate_unit' : rate_unit,
    //              'term' : term,
    //              'term_unit' : term_unit,
    //              'repay_type' : repay_type,
    //              'start_time' : start_time,
    //          },function(data){
    //              $('#t_profit').text(data.income);
    //              $('#t_interest').text(data.interest);
    //              $('#t_reward').text(data.reward);
    //              $('#t_rate').text(data.rate);
    //          },'json');
    //      }
    //});
    $('input').blur(function () {
        var money = $("input[name='data[money]']").val(),
            rate = $("input[name='data[rate]']").val(),
            rate_unit = $("input[name='data[rate_unit]']").val(),
            term = $("input[name='data[term]']").val(),
            term_unit = $("input[name='data[term_unit]']").val(),
            repay_type = $("select[name='data[repay_type]']").val(),
            start_time = $("input[name='data[start_time]']").val(),
            reward = $("input[name='data[reward]']").val(),
            discount = $("input[name='data[discount]']").val(),
            manage_fee = $("input[name='data[manage_fee]']").val();
        if ($.trim(money) && $.trim(rate) && $.trim(rate_unit) && $.trim(rate_unit) && $.trim(term) && $.trim(term_unit) && $.trim(start_time)) {
            $.post('/book/stats', {
                money: money,
                rate: rate,
                rate_unit: rate_unit,
                term: term,
                term_unit: term_unit,
                repay_type: repay_type,
                start_time: start_time,
                reward: reward,
                discount: discount,
                manage_fee: manage_fee,
            }, function (data) {
                $('#t_profit').html(data.income);
                $('#t_interest').html(data.interest);
                $('#t_reward').html(data.reward);
                $('#t_rate').html(data.rate + '%');
            },'json');
        }
    });
}());
