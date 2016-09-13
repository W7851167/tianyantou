<script type="text/javascript" src="//static.touzhijia.com/js/lib/jquery-1.11.3.min.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/lib/jquery.dotdotdot.min.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/lib/layer/layer.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/imgopacity.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/imgmove.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/tab.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/form.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/login.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/navFollow.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript" src="//static.touzhijia.com/js/plugins/main.js?ver={!! date('YmdHis') !!}"></script>
<script type="text/javascript">
    (function(){
        $('.company .mask').css('opacity',0);
        $('.company').find('li').hover(function(){
            var mask = $(this).children('.mask');
            mask.css('opacity',0.9);
        },function(){
            var mask = $(this).children('.mask');
            mask.css('opacity',0);
        });
    })();
</script>