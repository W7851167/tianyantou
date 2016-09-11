(function(window,$){
/***************永远的左右的滚动轮播组件 s***************/
function Playmoveimg(imgidz,options){
  var This=this;
  this.playcon=$("#"+imgidz);//总轮播的总父级
  this.playimg=this.playcon.find(".imglistcon");//包含切换元素的dom
  this.playimga=this.playimg.children();//需要用来切换的元素集合
  this.playlen=this.playimga.length;//需要切换的元素内容块数量
  this.showcon=[];
  this.nava=this.playcon.find(".imgnav");//导航
  this.navt = '';
  this.nowid=0;//存储当前索引号
  this.timer=null;
  //默认参数
  this.setting={
    time:3000,//自动切换的时间间隙,如果设为0就是不支持自动切换
    sped:500,//切换速度
    direction:1,//默认是左右滚动,如查传入0即是上下滚动
    navt:'',//导航文字，可无
    hclass:"active",//导航默认高亮样式
    lrbtn:true,//是否有左右切换按钮
    backfn:null//默认回调为空
  }
  this.setting=$.extend(this.setting,options)
  if(this.setting.lrbtn==true){//判断当前是否有左右按钮
    this.prebtn=this.playcon.find(".perbtn");
    this.nextbtn=this.playcon.find(".nextbtn");
  }
  for(var i=0;i<this.playlen;i++){
    this.showcon.push(this.playimga.eq(i).html());
  }
  if(this.setting.direction==1){
    this.everstep=this.playimga.eq(0).outerWidth();//每次走的步长值
  }else{
    this.everstep=this.playimga.eq(0).outerHeight();//每次走的步长值
  }
  this.initfn();//组件初始化
  this.adevent();//事件绑定
  this.autoplay();//自动轮播
}
//组件初始化
Playmoveimg.prototype.initfn=function() {
  var navstr = "",
      playstr = "";
  if(this.setting.navt !== '' && typeof this.setting.navt == 'object'){
    this.navt = this.setting.navt;
    for (var i = 0; i < this.playlen; i++) {//根据要切换的内容块来自动生成导航
      i === 0 ? navstr += "<span class=" + this.setting.hclass + ">" + this.navt[i] + "</span>" : navstr += "<span>" + this.navt[i] + "</span>";
    }
  }else{
    for (var i = 0; i < this.playlen; i++) {//根据要切换的内容块来自动生成导航
      i === 0 ? navstr += "<span class=" + this.setting.hclass + "></span>" : navstr += "<span></span>";
    }
  }
  this.nava.html(navstr);
  playstr += "<li>" + this.showcon[0] + "</li>";
  playstr += "<li>" + this.showcon[1] + "</li>";
  this.playimg.html(playstr).css(this.setting.direction==1?"width":"height",this.everstep*2+"px");
  this.playimg.css(this.setting.direction==1?"height":"width","100%");
}
//导航高亮效果改变
Playmoveimg.prototype.hlnavFn=function(index){
  this.nava.children().eq(index).addClass(this.setting.hclass).siblings().removeClass(this.setting.hclass);
}
/*图片切换功能实现*/
//图片向左走功能实现
Playmoveimg.prototype.moveLfn=function(index){
  var This=this,
      oldindex=this.nowid,
      playimgch=This.playimg.children();
  if(index!=undefined){//如果有传入滚轮到某一个索引，就无需再执行加加运算
    this.nowid=index;
  }else{
    this.nowid++;
    if(this.nowid==this.playlen){
      this.nowid=0;
    }
  }
  if(this.playimg.css(this.setting.direction==1?"left":"top")===-this.everstep+"px"){//当向右切换到向左走的时候，要准备一下往左走的状态，也就是把初始的left由0改为负一个显示块的长度
    playimgch.eq(0).html(this.showcon[oldindex]);
    this.playimg.css(This.setting.direction==1?"left":"top",0);
    playimgch.eq(1).html(this.showcon[this.nowid]);
  }
  //滚播切换过程
  //滚播切换过程
  if(this.setting.direction==1){
    this.playimg.animate({"left":-this.everstep+"px"},this.setting.sped,function(){
      callback(This);
    })
  }else{
    this.playimg.animate({"top":-this.everstep+"px"},this.setting.sped,function(){
      callback(This);
    })
  }
  function callback(obj){
    var This=obj;
    playimgch.eq(0).html(This.showcon[This.nowid]);//把第一张与当前显示的相同
    This.playimg.css(This.setting.direction==1?"left":"top",0);//立即复位到0
    playimgch.eq(1).html(This.showcon[(This.nowid+1)==This.playlen?0:(This.nowid+1)]);//准备下一张要显示的
    This.hlnavFn(This.nowid);//高亮导航效果
    This.setting.backfn && This.setting.backfn(This.showcon,This.nowid);//执行回调，如果有传入回调
  }
}
//图片向右走功能实现
Playmoveimg.prototype.moveRfn=function(index){
  var This=this,
      oldindex=this.nowid,//存储未改变前的索引值
      playimgch=This.playimg.children();
  if(index!=undefined){//如果有传入滚轮到某一个索引，就无需再执行减减
    this.nowid=index;
  }else{
    this.nowid--;
    if(this.nowid<0){
      this.nowid=this.playlen-1;
    }
  }
  if(this.playimg.css(this.setting.direction==1?"left":"top")==="0px"){//当向左切换到向右走的时候，要准备一下往左走的状态，也就是把初始的left由0改为负一个显示块的长度
    playimgch.eq(1).html(this.showcon[oldindex]);
    this.playimg.css(This.setting.direction==1?"left":"top",-this.everstep+"px");
    playimgch.eq(0).html(this.showcon[this.nowid]);
  }
  //滚播切换过程
  if(this.setting.direction==1){
    this.playimg.animate({"left":0},this.setting.sped,function(){
      callback(This);
    })
  }else{
    this.playimg.animate({"top":0},this.setting.sped,function(){
      callback(This);
    })
  }
  function callback(obj){
    var This=obj;
        playimgch.eq(1).html(This.showcon[This.nowid]);//把第二块内容显示与当前的相同
    This.playimg.css(This.setting.direction==1?"left":"top",-This.everstep+"px");//并强行把二块图片设置为当前显示块
    playimgch.eq(0).html(This.showcon[(This.nowid-1)<0?(This.playlen-1):(This.nowid-1)]);//准备下一张要显示的
    This.hlnavFn(This.nowid);
    This.setting.backfn && This.setting.backfn(This.showcon,This.nowid);//执行回调，如果有传入回调
  }
}
//手动切换功能实现
Playmoveimg.prototype.adevent=function(){
  var This=this;
  if(this.prebtn){//上一张
    this.prebtn.on("click",function(){
      This.moveRfn();
    })
  }
  if(this.nextbtn){//下一张
    this.nextbtn.on("click",function(){
      This.moveLfn();
    })
  }
  this.nava.children().on("click",function(){
    var thisindex=$(this).index();
    if(This.nowid==thisindex){
      return;
    }else if(This.nowid>thisindex){
      This.moveRfn(thisindex);
    }else{
      This.moveLfn(thisindex);
    }
  })
  //当检测鼠标移入轮播区域时，关闭自动切换，开始让用户操作
  this.playcon.on("mouseenter",function(){
    clearInterval(This.timer);
  })
  this.playcon.on("mouseleave",function(){
    This.autoplay();
  })
}
//自动播放方法
Playmoveimg.prototype.autoplay=function(){
  if(this.setting.time<=0){
    return;
  }
  var This=this;
  clearInterval(this.timer);
  this.timer=setInterval(function(){This.moveLfn()},this.setting.time);
}
window.Playmoveimg=Playmoveimg;
/***************永远的左右的滚动轮播组件 e***************/

/***************一进无缝滚动组件 s***************/
function Playimgone(imgidz,options){
  this.playo=$("#"+imgidz);
  this.playovero=this.playo.find(".play-list-con");
  this.playoverw=this.playovero.width();
  this.listcon=this.playovero.children();
  this.playlen=this.listcon.children().length;
  this.playw=this.listcon.children().outerWidth();
  this.playing=true;
  this.navo=null;
  this.lrbtna=null;
  this.timer=null;//定时器
  this.nowid=0;//当前在哪一张
  //默认参数
  this.setting={
    time:3000,//自动切换的时间间隙,如果设为0就是不支持自动切换
    sped:500,//切换速度
    navo:".imgnav",//导航默认样式
    hclass:"active",//导航默认高亮样式
    lrbtn:".actbtn",//是否有左右切换按钮
    golen:0,//初始步长
    backfn:null//默认回调为空
  }
  this.setting=$.extend(this.setting,options);
  if(this.setting.lrbtn!=""){//是否有左右切换按钮
    this.lrbtna=this.playo.find(this.setting.lrbtn)
  }
  this.initfn();//初始化
  this.adevent();
  if(this.setting.time!=0){
    this.autoplay();
  }
}
Playimgone.prototype.initfn=function(){
  var navstr = "",//导航html
      playstr = "",//播放块内容html
      This=this;
  //如果有导航，动态生成导航
  if(this.setting.navo !== ""){
    this.nava = this.playo.find(this.setting.navo);
    for (var i = 0; i < this.playlen; i++) {//根据要切换的内容块来自动生成导航
      i === 0 ? navstr += "<span class=" + this.setting.hclass + "></span>" : navstr += "<span></span>";  
    }
    this.nava.html(navstr);
  }
  //生成播放块内容
  this.playw=this.setting.golen==0?this.playw:this.setting.golen;
  this.listcon.css({"width":this.playlen*this.playw*2+"px"});//动态设置播放列表的宽度
  playstr=this.listcon.html();
  this.listcon.html(playstr+playstr);
}
//事件绑定
Playimgone.prototype.adevent=function(){
  var This=this;
  if(this.lrbtna!=null){
    this.lrbtna.eq(0).on("click",function(){
      if(This.nowid==0){
        This.nowid=-(This.playlen);
      }
      This.nowid++;
      This.playmoveper();
    })
    this.lrbtna.eq(1).on("click",function(){
      if(This.playing){
        This.playing=false;
        This.nowid--;
        This.playmovenext();
      }
    })
  }
  //只有自动播放的时候才需要做
  if(this.setting.time!=0){
    this.playo.on("mouseenter",function(){
      clearInterval(This.timer);
    })
    this.playo.on("mouseleave",function(){
      This.autoplay();
    })
  }
  
}
//自动播放
Playimgone.prototype.autoplay=function(){
  var This=this;
  clearInterval(this.timer);
  this.timer=setInterval(function(){
    if(This.playing){
      This.playing=false;
      This.nowid--;
      This.playmovenext();
    }
  },this.setting.time) 
}
//下一张播放函数
Playimgone.prototype.playmovenext=function(){
  var This=this;
  this.listcon.stop().animate({"left":this.nowid*this.playw+"px"},this.setting.sped,function(){
    This.playing=true;
    if(Math.abs(This.nowid)==This.playlen){
      This.nowid=0;
      This.listcon.css("left",0);
    }
  });
}
//上一张播放函数
Playimgone.prototype.playmoveper=function(){
  var This=this;
  if(Math.abs(This.nowid)==This.playlen-1){
      This.listcon.css("left","-"+this.playw*this.playlen+"px");
    }
  this.listcon.stop().animate({"left":this.nowid*this.playw+"px"},this.setting.sped,function(){
    This.playing=true;
    if(This.nowid==0){
      This.listcon.css("left","-"+this.playw*this.playlen+"px");
    }
  });
}
window.Playimgone=Playimgone;
/***************一进无缝滚动组件 e***************/

/***************透明度切换组件 s***************/
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
    this.nava.on("click","span",function(){
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
/***************透明度切换组件 e***************/

/***************首页透明度切换组件 s***************/
function Playimgindex(imgidz,options){
    Playimg.call(this,imgidz,options);
}
inheritPrototype(Playimgindex,Playimg);

Playimgindex.prototype.initfn=function(){
    var len=this.playimga.length;
    var str="";
    for(var i=0;i<len;i++){//根据要切换的内容块来自动生成导航
      i===0?str+="<span class="+this.setting.hclass+"></span>":str+="<span></span>";
    }
    this.nava.html(str);
    this.playimga.eq(this.nowid).css({/*"display":"block",*/"opacity":1,"position":"relative","z-index":3,"float":"left"}).siblings().css({"opacity":0,"position":"absolute",/*"float":"none",*/"z-index":1});
  }
 //图片切换功能实现
Playimgindex.prototype.playfn=function(idz){//根据是否传入了idz来判断是用户点击的，还是自动切换的
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
  this.playimga.eq(this.nowid).css({/*"display":"block",*/"position":"relative","float":"left","z-index":2,"opacity":1});
  this.playimga.eq(dqz).css({"float":"none","position":"absolute"}).animate({"opacity":0},Number(this.setting.sped),function(){
    This.playimga.eq(This.nowid).css({"z-index":3});
    This.playimga.eq(dqz).css({/*"display":"none",*/"z-index":1});
    This.setting.backfn && This.setting.backfn({
    imgcon:This.playimga,
    navcon:This.nava
    },This.nowid);
    //导航切换
    This.nava.children().eq(This.nowid).addClass(This.setting.hclass).siblings().removeClass(This.setting.hclass);
  }); 
}
window.Playimgindex=Playimgindex;
/***************首页透明度切换组件 e***************/

/***************滚播列表组件 s***************/
  function Listmove(listidz,options){
    var This=this;
    this.playcon=$("#"+listidz);//总轮播的总父级
    this.playlist=this.playcon.find(".listmodcon");//需要用来切换
    this.listhtml=this.playlist.html();//获取一个播放块的内容块
    this.maxmovz=this.playlist.height();//取得应该复位的点
    this.playlen=this.playlist.children().length;//需要切换的元素内容块数量
    this.timer=null;
    //默认参数
    this.setting={
      time:2000,//自动切换的时间间隙,如果设为0就是持续滚动无停顿
      sped:500//切换速度,如果当time为0时此速度可以改变滚动的速度
    }
    this.setting=$.extend(this.setting,options);
    if(this.setting.time>0){
      this.stepz=this.setting.height?this.setting.height:this.playlist.children().outerHeight();
    }else{
      this.stepz=1;
    }
    if(this.playcon.height()<this.playlist.height()){
      this.initfn();//组件初始化
    }
  }
  //组件初始化
  Listmove.prototype.initfn=function() {
    this.playlist.html(this.listhtml+this.listhtml);
    this.adevent();//事件绑定
    this.autoplay();//自动轮播
  }
  //事件绑定
  Listmove.prototype.adevent=function(){
    var This=this;
    this.playcon.on("mouseenter",function(){
      clearInterval(This.timer);
    });
    this.playcon.on("mouseleave",function(){
      This.autoplay();//自动轮播
    });
  }
  //播放逻辑处理
  Listmove.prototype.movefn=function(){
    var This=this;
    this.playlist.animate({"top":"-="+this.stepz+"px"},this.setting.time==0?0:this.setting.sped,function(){
      var mowtz=Math.abs(parseInt(This.playlist.css("top")));
      if(mowtz>=This.maxmovz){
        This.playlist.css("top",0);
      }
    });
  }
  //自动播放方法
  Listmove.prototype.autoplay=function(){
    var This=this;
    clearInterval(this.timer);
    this.timer=setInterval(function(){
      if(This.playcon.is(":visible")){
        This.movefn();
      }
    },this.setting.time==0?this.setting.sped:this.setting.time);
  }
window.Listmove=Listmove;
/***************滚播列表组件 e***************/

/***************选项卡切换组件 s***************/
function Tab(navid,conid,option){
        this.nava=$("#"+navid).children();//选项卡的导航
        this.tabcona=$("#"+conid).children();//选项卡切换主内容
        this.maxindex=this.tabcona.length;
        this.nowindex=0;//存储当前索引值
        this.timer=null;
        this.timerautoplay=null;
        this.tabpo=$("#"+conid);
        this.obj={
            nava:this.nava,
            tabcona:this.tabcona
        }
        /*默认配置参数*/
        this.seting={
            event:"click",//默认是以点击事件调发切换
            time:0,//默认不自动切换,如果有传入大于0数就会自动切换，且当前时间为自动切换的时间间隔
            navactive:"active",//导航高亮样式
            tabconactive:"active",//内容块高亮样式
            backfn:null,//初始回调参数为空
            stopo:null
        }
        $.extend(this.seting,option);
        if(this.seting.stopo!=null){
          this.tabpo=this.seting.stopo;
        }
        this.initfn();
    }
    //初始化方法
    Tab.prototype.initfn=function(){
        var This=this;
        var bz=this.seting.event==="mouseover" ? true : false;//判断当前是不是鼠标经过事件，如果是得做一个缓冲时间，防止误滑过
        if(bz){
            this.nava.on("mouseout",function(){
                clearTimeout(This.timer);
            });
        }
        //绑定事件，触发选项卡效果
        this.nava.on(this.seting.event,function(){
            var That=this;
            clearTimeout(This.timer);
            This.timer=setTimeout(function(){
                This.nowindex=$(That).index();
                This.tapPlay();//执行切换
                clearTimeout(This.timer);
            },bz?200:0)
        });
        //如果传入的time参数大于0就会执行自动切换
        if(this.seting.time>0){
            this.autoPlay();
            this.tabpo.on("mouseenter",function(){
                clearInterval(This.timerautoplay);
            })
            this.tabpo.on("mouseleave",function(){
                This.autoPlay();
            })
        }
    }
    //播放方法
    Tab.prototype.tapPlay=function(){
        this.nava.removeClass(this.seting.navactive).eq(this.nowindex).addClass(this.seting.navactive);
        this.tabcona.removeClass(this.seting.tabconactive).eq(this.nowindex).addClass(this.seting.tabconactive);
        this.seting.backfn && this.seting.backfn(this.obj,this.nowindex);
    }
    //自动播放方法
    Tab.prototype.autoPlay=function(){
        var This=this;
        clearInterval(this.timerautoplay);
        this.timerautoplay=setInterval(function(){
            This.nowindex++;
            if(This.nowindex==This.maxindex){
                This.nowindex=0;
            }
            This.tapPlay();//执行切换
        },this.seting.time);
    }
window.Tab=Tab;
/***************选项卡切换组件 e***************/
function inheritPrototype(obj1,obj2){  //obj2--父类 obj1--子类
   var prototypeo = objectfn(obj2.prototype);
   prototypeo.constructor = obj1;
   obj1.prototype = prototypeo;
}

function objectfn(o){
  var F = function(){}
  F.prototype = o;
  return new F();
}
})(window,$)