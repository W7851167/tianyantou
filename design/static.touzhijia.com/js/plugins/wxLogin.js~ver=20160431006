!function(a, b) {
    function d(a) {
        var e, c = b.createElement("iframe"),
        d = "//open.weixin.qq.com/connect/qrconnect?appid=" + a.appid + "&scope=" + a.scope + "&redirect_uri=" + a.redirect_uri + "&state=" + a.state + "&login_type=jssdk";
        d += a.style ? "&style=" + a.style: "",
        d += a.href ? "&href=" + a.href: "",
        c.src = d,
        c.frameBorder = "0",
        c.allowTransparency = "true",
        c.scrolling = "no",
        c.width = "220px",
        c.height = "220px",
        e = b.getElementById(a.id),
        e.innerHTML = "",
        e.appendChild(c)
    }
    a.WxLogin = d;
} (window, document);

$(function() {
    WxLogin({
        id:"wx-qrcode",
        appid: "wx796a0210a2d55243",
        scope: "snsapi_login", 
        redirect_uri: "http://account.touzhijia.com/thirdparty/callback/weixin",
        state: "tzj",
        style: "",
        href: "//static.touzhijia.com/css/pagestyle/wx_qr.css"                  
    });
    $('.switch-login').on('click',function(e){
          $(this).toggleClass('code-on');
          var flag = $(this).hasClass('code-on') ? true : false;
          if(flag){
            $('#login-box .pc-login').hide();
            $('#login-box .code-login').show();
            $('#login-box .code-btn .msg').hide();
          }else{
            $('#login-box .pc-login').show();
            $('#login-box .code-login').hide();
            $('#login-box .code-btn .msg').show();
          }
    });
})