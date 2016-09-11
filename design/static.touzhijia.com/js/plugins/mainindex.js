/*首页JS s*/
$(function(){
    (function(){
        var bannero=$("#banner-play-mod");
        function isPc(){  
            var userAgentInfo = navigator.userAgent.toLowerCase();
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod","mobile"); 
            var len=Agents.length;
            var flag = true;  
           for (var v = 0; v < len; v++) {  
               if (userAgentInfo.indexOf(Agents[v].toLowerCase()) > 0){
                  flag = false;
                  break;
                }  
           }  
           return flag;  
        }
        //减小banner刚刚进来时的闪动
        /*function resetBanner(){
          var windoww=$(window).width()>1200?$(window).width():1200;
            bannero.css({"width":windoww+"px","height":windoww*300/1920+"px","marginLeft":(-windoww/2)+"px"});
        }*/
        //改变banner亮度
        function changeBanner(){
          if (!isPc()||window.screen.width<=1000) {
              bannero.css({"width":"2400px","height":"375px","position":"relative","left":"50%","marginLeft":"-1200px"});
              $("html,body").css("overflowX","hidden")
          }
        }
        changeBanner();
        //大banner轮播
        new Playimgindex("banner-play-mod",{sped:400});
        //列表无限滚播插件
        //new Listmove("good-list-con");
        //荣誉列表效果
        var honouro=$("#honour-list"),
            honourli=honouro.find("li");
        honouro.on("mouseover","li",function(){
          $(this).removeClass("hideother").stop().animate({"width":"280px","margin-right":"0px"},300).find(".honourdetail").show();
          $(this).siblings().addClass("hideother").stop().animate({"width":"160px","margin-right":"0px"},300).find(".honourdetail").hide();
        })
        honouro.on("mouseout","li",function(){
          $(this).stop().animate({"width":"160px","margin-right":"40px"},300).siblings().removeClass("hideother").stop().animate({"width":"160px","margin-right":"40px"},300).end().find(".honourdetail").hide();
        })
        //底部媒体列表
        new Playimgone("mediaListCon",{
          time:0,
          navo:""
        });
        /*数字加载动画*/
        $(".data-num").each(function(i,e){
          var o = $(this);
          var t = 10;
          var changenum=o.attr("datanum");
          var val = parseInt(changenum.replace(/,/g,""))/t;
          var setIntervalId = window.setInterval(function(){
            if(t--){
              var v = parseInt(val*(10-t)).toString();
              var varr = v.split("");
              for (var i = varr.length-4; i >= 0; i -= 3) varr[i] += ",";
              o.text(varr.join(""));
            }
            else{clearInterval(setIntervalId);}
          },100);
        });
        //热点平台效果
        var hotPlatform=$("#hot-platform-list").find("li");
        hotPlatform.on("mouseover",function(){
          $(this).removeClass("hide-half").siblings().addClass("hide-half");
        })
        hotPlatform.on("mouseout",function(){
          hotPlatform.removeClass("hide-half");
        })
  })();
  
});

/*首页JS e*/
