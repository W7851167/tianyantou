/*滚动轮播插件*/
(function($){
function Playmoveimg(imgidz,options){
  var This=this;
  this.playcon=$("#"+imgidz);//总轮播的总父级
  this.playimg=this.playcon.find(".imglistcon");//包含切换元素的dom
  this.playimga=this.playimg.children();//需要用来切换的元素集合
  this.playlen=this.playimga.length;//需要切换的元素内容块数量
  this.showcon=[];
  this.nava=this.playcon.find(".imgnav");//导航
  this.nowid=0;//存储当前索引号
  this.timer=null;
  //默认参数
  this.setting={
    time:3000,//自动切换的时间间隙,如果设为0就是不支持自动切换
    sped:500,//切换速度
    direction:1,//默认是左右滚动,如查传入0即是上下滚动
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
    this.everstep=this.playimga.eq(0).width();//每次走的步长值
  }else{
    this.everstep=this.playimga.eq(0).height();//每次走的步长值
  }
  this.initfn();//组件初始化
  this.adevent();//事件绑定
  this.autoplay();//自动轮播
}
//组件初始化
Playmoveimg.prototype.initfn=function() {
  var navstr = "",
      playstr = "";
  for (var i = 0; i < this.playlen; i++) {//根据要切换的内容块来自动生成导航
    i === 0 ? navstr += "<span class=" + this.setting.hclass + "></span>" : navstr += "<span></span>";
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
})($)
