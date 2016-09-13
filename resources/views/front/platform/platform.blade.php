@extends('layout.main')

@section('content')
<div id="platform" class="wrap">
    <!--<div class="top-banner"></div>-->
    <div class="container">
        <ul class="main-nav">
            <span>当前位置：</span>
            <li><a href="/">首页</a></li>
            <li class="nav-location">选平台</li>
        </ul>
        <div class="main">
            <div class="plat-guide">
                <h3>新手引导</h3>
                <a href="/about/help.html#process" target="_blank">流程类说明</a>
                <a href="/about/help.html#touzhijia" target="_blank">天眼投说明</a>
                <a href="/about/help.html#accounts" target="_blank">账户类说明</a>
            </div>      <div class="filter-box" style="width: 960px; border-right: 1px solid #F2F2F2;">
                <dl class="filter plat-filter">
                    <dt>安全评级：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>AAA</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>AA以上</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>A以上</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>BBB以上</a></dd>
                    <dd><a href="javascript:void(0);" data='5'>BB以上</a></dd>
                    <dd><a href="javascript:void(0);" data='6'>B以上</a></dd>
                </dl>
                <dl class="filter plat-filter">
                    <dt>年化收益：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>20%~16%</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>16%~12%</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>12%~8%</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>8%以下</a></dd>
                </dl>
                <dl class="filter plat-filter">
                    <dt>投资期限：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>30天以内</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>1~3个月</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>3~6个月</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>6~12个月</a></dd>
                    <dd><a href="javascript:void(0);" data='5'>12个月以上</a></dd>
                </dl>
                <dl class="filter plat-filter noborder">
                    <dt>所在区域：</dt>
                    <dd class="active"><a href="javascript:void(0);" data='0'>不限</a></dd>
                    <dd><a href="javascript:void(0);" data='1'>北京</a></dd>
                    <dd><a href="javascript:void(0);" data='2'>上海</a></dd>
                    <dd><a href="javascript:void(0);" data='3'>广州</a></dd>
                    <dd><a href="javascript:void(0);" data='4'>深圳</a></dd>
                    <dd><a href="javascript:void(0);" data='-1'>其他</a></dd>
                </dl>
            </div>
        </div>
        <div class="content">
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_erongsuo.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016080810123766531.png?ver=20160431006" alt="e融所">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>7</em>%<em>-</em><em>15</em>%</span>
                        </h4>
                        <span>项目期限：<em>10天-360天</em></span>
                        <span>可投标数：<em>2个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_erongsuo.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_huitouwang.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016071813583280943.jpg?ver=20160431006" alt="汇投网">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>5.2</em>%<em>-</em><em>13.5</em>%</span>
                        </h4>
                        <span>项目期限：<em>3天-180天</em></span>
                        <span>可投标数：<em>4个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_huitouwang.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_xinyongbao.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016042614212699586.jpg?ver=20160431006" alt="信用宝">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>6</em>%<em>-</em><em>12</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-36月</em></span>
                        <span>可投标数：<em>6个</em></span>
                        <span>安全评级：<em>BB</em></span>
                        <a href="/platform/detail_xinyongbao.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_rxdai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/201411262133482121.jpg?ver=20160431006" alt="投哪网">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>7</em>%<em>-</em><em>12</em>%</span>
                        </h4>
                        <span>项目期限：<em>7日-36月</em></span>
                        <span>可投标数：<em>5个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_rxdai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_duanrongwang.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016080213010228018.jpg?ver=20160431006" alt="短融网">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8</em>%<em>-</em><em>14</em>%</span>
                        </h4>
                        <span>项目期限：<em>5天-180天</em></span>
                        <span>可投标数：<em>11个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_duanrongwang.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_zhubaodai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015041617455545546.jpg?ver=20160431006" alt="珠宝贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>10</em>%<em>-</em><em>14</em>%</span>
                        </h4>
                        <span>项目期限：<em>30天-12月</em></span>
                        <span>可投标数：<em>7个</em></span>
                        <span>安全评级：<em>AA</em></span>
                        <a href="/platform/detail_zhubaodai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_huiyingdai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015080414060923178.jpg?ver=20160431006" alt="汇盈金服">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8</em>%<em>-</em><em>14</em>%</span>
                        </h4>
                        <span>项目期限：<em>1月-12月</em></span>
                        <span>可投标数：<em>7个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_huiyingdai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <i class="hot-plat"></i>      <div class="plat-mask" style="display:none;"><a href="/platform/detail_kaixindai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/201605031509119460.png?ver=20160431006" alt="开鑫贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>5.5</em>%<em>-</em><em>12</em>%</span>
                        </h4>
                        <span>项目期限：<em>15天-1200天</em></span>
                        <span>可投标数：<em>9个</em></span>
                        <span>安全评级：<em>AAA</em></span>
                        <a href="/platform/detail_kaixindai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_jintoushou.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016072612013917699.jpg?ver=20160431006" alt="金投手">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>4</em>%<em>-</em><em>11</em>%</span>
                        </h4>
                        <span>项目期限：<em>30天-180天</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_jintoushou.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_liyedai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016042514215357154.jpg?ver=20160431006" alt="立业贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>12</em>%<em>-</em><em>17.5</em>%</span>
                        </h4>
                        <span>项目期限：<em>15天-12月</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_liyedai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_darendai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016041416230228610.png?ver=20160431006" alt="达人贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8.5</em>%<em>-</em><em>15</em>%</span>
                        </h4>
                        <span>项目期限：<em>15天-36月</em></span>
                        <span>可投标数：<em>7个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_darendai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_hepandai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015040216291964108.jpg?ver=20160431006" alt="合盘贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>12</em>%<em>-</em><em>18</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-24月</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_hepandai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_elutongxin.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016041917010713055.jpg?ver=20160431006" alt="e路同心">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>6.88</em>%<em>-</em><em>14</em>%</span>
                        </h4>
                        <span>项目期限：<em>10天-18月</em></span>
                        <span>可投标数：<em>9个</em></span>
                        <span>安全评级：<em>AA</em></span>
                        <a href="/platform/detail_elutongxin.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_jujinziben.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015092810324639258.jpg?ver=20160431006" alt="聚金资本">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>11</em>%<em>-</em><em>16.8</em>%</span>
                        </h4>
                        <span>项目期限：<em>30天-6月</em></span>
                        <span>可投标数：<em>1个</em></span>
                        <span>安全评级：<em>BB</em></span>
                        <a href="/platform/detail_jujinziben.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_stjr.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016031116120750268.jpg?ver=20160431006" alt="石投金融">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>6</em>%<em>-</em><em>13</em>%</span>
                        </h4>
                        <span>项目期限：<em>2天-12月</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_stjr.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_91wangcai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2014112411074456854.jpg?ver=20160431006" alt="91旺财">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>7</em>%<em>-</em><em>12</em>%</span>
                        </h4>
                        <span>项目期限：<em>1月-6月</em></span>
                        <span>可投标数：<em>待发布</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_91wangcai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_edai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015043019440172101.jpg?ver=20160431006" alt="易贷网">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>10</em>%<em>-</em><em>18</em>%</span>
                        </h4>
                        <span>项目期限：<em>1天-60月</em></span>
                        <span>可投标数：<em>1个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_edai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_chenengdai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016051016490399818.jpg?ver=20160431006" alt="车能贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>10</em>%<em>-</em><em>15</em>%</span>
                        </h4>
                        <span>项目期限：<em>1月-12月</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_chenengdai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_51rzy.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2014122314312929936.jpg?ver=20160431006" alt="融资易">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>12</em>%<em>-</em><em>16.5</em>%</span>
                        </h4>
                        <span>项目期限：<em>30日-6月</em></span>
                        <span>可投标数：<em>1个</em></span>
                        <span>安全评级：<em>BB</em></span>
                        <a href="/platform/detail_51rzy.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_wyjr.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015122416104392090.jpg?ver=20160431006" alt="万盈金融">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>9</em>%<em>-</em><em>14</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-12月</em></span>
                        <span>可投标数：<em>6个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_wyjr.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_365ibank.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015060815330841940.jpg?ver=20160431006" alt="天天财富">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8</em>%<em>-</em><em>12</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-36月</em></span>
                        <span>可投标数：<em>待发布</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_365ibank.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_xinrong.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2014112411514815981.jpg?ver=20160431006" alt="信融财富">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>11.1</em>%<em>-</em><em>13.8</em>%</span>
                        </h4>
                        <span>项目期限：<em>1月-12月</em></span>
                        <span>可投标数：<em>50个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_xinrong.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_baobidai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015081409594557565.jpg?ver=20160431006" alt="生菜金融">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8</em>%<em>-</em><em>15.8</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-12月</em></span>
                        <span>可投标数：<em>2个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_baobidai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_chujinsuo.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2014112414002812896.jpg?ver=20160431006" alt="楚金所">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8</em>%<em>-</em><em>10</em>%</span>
                        </h4>
                        <span>项目期限：<em>1月-12月</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>AA</em></span>
                        <a href="/platform/detail_chujinsuo.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_yesvion.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2014121116172774628.png?ver=20160431006" alt="粤商贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>10</em>%<em>-</em><em>15</em>%</span>
                        </h4>
                        <span>项目期限：<em>15日-12月</em></span>
                        <span>可投标数：<em>3个</em></span>
                        <span>安全评级：<em>BB</em></span>
                        <a href="/platform/detail_yesvion.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_gzed.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015091609402229872.jpg?ver=20160431006" alt="广州e贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>7</em>%<em>-</em><em>13</em>%</span>
                        </h4>
                        <span>项目期限：<em>15天-36月</em></span>
                        <span>可投标数：<em>2个</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_gzed.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_shanyidai.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016062219585229453.jpg?ver=20160431006" alt="杉易贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8</em>%<em>-</em><em>13.5</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-24月</em></span>
                        <span>可投标数：<em>待发布</em></span>
                        <span>安全评级：<em>A</em></span>
                        <a href="/platform/detail_shanyidai.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_lianhao.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/201507291625105260.png?ver=20160431006" alt="联豪创投">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>12</em>%<em>-</em><em>15</em>%</span>
                        </h4>
                        <span>项目期限：<em>5天-12月</em></span>
                        <span>可投标数：<em>待发布</em></span>
                        <span>安全评级：<em>BB</em></span>
                        <a href="/platform/detail_lianhao.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="plat-box">
                <div class="plat-mask" style="display:none;"><a href="/platform/detail_bojd.html" target="_blank"></a></div>
                <div class="plat-main">
                    <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016011114100069847.jpg?ver=20160431006" alt="博金贷">
                    <div class="plat-info">
                        <h4>年化收益率
                            <span class="rate"><em>8.5</em>%<em>-</em><em>13.8</em>%</span>
                        </h4>
                        <span>项目期限：<em>7天-12月</em></span>
                        <span>可投标数：<em>待发布</em></span>
                        <span>安全评级：<em>BBB</em></span>
                        <a href="/platform/detail_bojd.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="platform_pagination" data-pagesize = '1'></div>
    </div>
</div>
<!--内容结束-->
@stop