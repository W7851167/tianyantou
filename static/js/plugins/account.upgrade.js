$("#layui-layer1 .layui-layer-close-btn").on("click","",function(){
	$.cookie("upgrade_has_been_read", 1, { expires: 360 });
	$(".layui-layer").hide();
});