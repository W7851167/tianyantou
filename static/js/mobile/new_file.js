$(document).ready(function() {
//#N_ID改变的标签值得id；例如改变下拉框的值
    $("#N_ID").change(function(){
    	//前台接收值的标签
            $(".Wdate").val("");
        //调去后台传入的值
           $.ajax({
           	type:"get",
           	url:"",
           	async:true
           	
           });
           $(".Wdate").keyup(function(){
           	
           })
     });
});