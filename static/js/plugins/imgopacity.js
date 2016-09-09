(function($){
  function Playimg(imgidz,options){
    var This=this;
    this.playcon=$("#"+imgidz);
    this.playimga=this.playcon.find(".imgplaycon").children();
    this.nava=this.playcon.find(".imgnav");
    this.nowid=0;//存储当前索引号
    this.timer=null;
    //默认参数
    this.setting={
      time:3000,//自动切换的时间间隙,如果设为0就是不支持自动切换
      sped:500,//切换速度
      hclass:"active",//导航默认高亮样式
      lrbtn:true,//是否有左右切换按钮
      backfn:null//默认回调为空
    }
    this.setting=$.extend(this.setting,options)
    if(this.setting.lrbtn==true){//判断当前是否有左右按钮
      this.prebtn=this.playcon.find(".perbtn");
      this.nextbtn=this.playcon.find(".nextbtn");
    }
    this.initfn();
    this.adevent();
    this.autoplay();//自动轮播
  }
  //组件初始化
  Playimg.prototype.initfn=function(){
    var len=this.playimga.length;
    var str="";
    for(var i=0;i<len;i++){//根据要切换的内容块来自动生成导航
      i===0?str+="<span class="+this.setting.hclass+"></span>":str+="<span></span>";
    }
    this.nava.html(str);
    this.playimga.eq(this.nowid).css("display","block").siblings().css({"display":"none","opacity":0});
  }
  //图片切换功能实现
  Playimg.prototype.playfn=function(idz){//根据是否传入了idz来判断是用户点击的，还是自动切换的
    var This=this;
    var dqz=this.nowid;
    if(idz!==undefined){
      this.nowid=idz;
    }else{
      this.nowid++;
      if(this.nowid>=this.playimga.length){
        this.nowid=0;
      } 
    }
    //如果切换的就是当前项，不执行切换
    if(dqz==this.nowid){
      return;
    }
    this.playimga.eq(dqz).animate({"opacity":0},this.setting.sped,function(){
      This.playimga.eq(dqz).css("display","none")
    });
    this.playimga.eq(this.nowid).css("display","block").animate({"opacity":1},this.setting.sped,function(){
      This.nava.children().eq(This.nowid).addClass(This.setting.hclass).siblings().removeClass(This.setting.hclass);
      This.setting.backfn && This.setting.backfn({
      imgcon:This.playimga,
      navcon:This.nava
      },This.nowid);
    });
  }
  //手动切换功能实现
  Playimg.prototype.adevent=function(){
    var This=this;
    //当用户想去操作或者点击的时候停止自动切换，准备接受用户响应
    this.playcon.on("mouseenter",function(){
      clearInterval(This.timer);
    })
    this.playcon.on("mouseleave",function(){
      This.autoplay();
    })
    this.nava.children().on("click",function(){
      This.playfn($(this).index());
    })
    if(this.setting.lrbtn){//实现左右按钮的切换效果
      this.prebtn.on("click",function(){//上一张
        var clickindex=This.nowid;
        clickindex--;
        if(clickindex<0){
          clickindex=This.playimga.length-1;
        }
        This.playfn(clickindex);
      })
      this.nextbtn.on("click",function(){//下一张
        var clickindex=This.nowid;
        clickindex++;
        if(clickindex>=This.playimga.length){
          clickindex=0;
        }
        This.playfn(clickindex);
      })
    }
  }
  //自动播放方法
  Playimg.prototype.autoplay=function(){
    if(this.setting.time<=0){
      return;
    }
    var This=this;
    clearInterval(this.timer);
    this.timer=setInterval(function(){This.playfn()},this.setting.time);
  }
  window.Playimg=Playimg;
})($)