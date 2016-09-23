(function () {
    var $form = $('#bindbankcard');

    $form.submit(function () {
        var $corp_name = $(this).find("input[name='data[corp_name]']"),
            $task_name = $(this).find("input[name='data[task_name]']"),
            $money = $(this).find("input[name='data[money]']"),
            $start_time = $(this).find("input[name='data[start_time]']"),
            $rate = $(this).find("input[name='data[rate]']")
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
    $('.use-tpl-btn').on('click',function(){
        $('.note-tpl').toggle();
    });
    $('table tr').on('click',function(){
        var id = $(this).data('id');
        url = '/book/template/' + id;
        $.get(url,function(data){
            $('#bindbankcard').html(data);
        });
    });
}());
