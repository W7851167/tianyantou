{!! HTML::script('vendor/jquery.form/jquery.form.min.js') !!}
<div id="popup_box" style="display:none;">
    <div id="maskLevel"></div>
    <div class="popup_tag_box">
        <div class="popup_tag_title">
            <h3></h3>
            <a class="title_del_box" href="javascript:;">×</a>
        </div>
        <div class="popup_tag_con"></div>
    </div>
</div>
<script>
    function succes($msg){
        //顶部提示框
        var time = (arguments.length<2) ? 2000 : arguments[1];
        var $tipstime = (new Date).getTime();
        $("body").append('<div class="top_sucess_info" id="tipstime_'+$tipstime+'">'+$msg+'</div>');
        setTimeout(function (){$("#tipstime_"+$tipstime).remove();},time);
    }

    function error($msg){
        //顶部提示框
        var time = (arguments.length<2) ? 2000 : arguments[1];
        var $tipstime = (new Date).getTime();
        $("body").append('<div class="top_error_info" id="tipstime_'+$tipstime+'">'+$msg+'</div>');
        setTimeout(function (){$("#tipstime_"+$tipstime).remove();},time);
    }

    //弹出框
    function popup($title,$msg,$width){
        $('#popup_box .popup_tag_title h3').html($title);
        $('#popup_box .popup_tag_con').html($msg);
        $('#popup_box').show(300);
        var $p_height = $('#popup_box .popup_tag_box').outerHeight();
        var $p_top = $(document).scrollTop()+($(window).height()-$p_height)/2;
        var $p_left = ($(window).width()-$width)/2;
        $('#popup_box .popup_tag_box').css({'width':$width,'top':$p_top,'left':$p_left}).show(300);
    }
    $(function(){
        var options = {
            beforeSerialize : function(){
                $(':submit').attr('disabled',true);
                succes('努力执行中。。。。');
            },
            success : function(data){
                $(':submit').attr('disabled',false);
                if(data.status){
                    succes(data.info);
                    if(data.url)
                        window.location.href = data.url;
                    else
                        window.location.reload();
                }else
                    error(data.info);
            }
        };
        //基础ajax提交
        $('.base_form').ajaxForm(options);


        //弹出框
        $('.title_del_box').mousedown(function(e){
            e.stopPropagation();
        }).mouseup(function(){
            $('#popup_box').hide(300);
        });
        $('#popup_box').delegate('.del_box','click',function(){
            $('#popup_box').hide(300);
        });
        $('#popup_box').delegate('.base_form','submit',function(){
            $(this).ajaxSubmit(options);
            return false;
        });
        $(".popup_tag_title").mousedown(function(e) {
            var _x = e.pageX;
            var _y = e.pageY;
            $(".popup_tag_box").fadeTo(20, 0.5,function(){
                $(document).mousemove(function(ee){
                    var $mp_top = parseInt($(".popup_tag_box").css('top'))+(ee.pageY-_y);
                    var $mp_left = parseInt($(".popup_tag_box").css('left'))+(ee.pageX-_x);
                    $(".popup_tag_box").css({'top':$mp_top,'left':$mp_left});
                    _x = ee.pageX;
                    _y = ee.pageY;
                }).mouseup(function(){
                    $(".popup_tag_box").fadeTo(20, 1,function(){
                        $(document).unbind('mousemove');
                    });
                });
            });
        });
    });
</script>