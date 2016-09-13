@extends('layout.main')

@section('content')
<div id="project" class="wrap">
    <div class="container">
        <ul class="main-nav">
            <span>当前位置：</span>
            <li><a href="/">首页</a></li>
            <li class="nav-location">选标中心</li>
        </ul>
        <div class="main">
            <!--<div class="plat-guide">
          <h3>新手引导</h3>
          <a href="/about/help.html#process" target="_blank">流程类说明</a>
          <a href="/about/help.html#touzhijia" target="_blank">天眼投说明</a>
          <a href="/about/help.html#accounts" target="_blank">账户类说明</a>
      </div>-->
            <div class="filter-box">
                <dl class="filter plat-filter" style="padding-top: 10px;">
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
                <dl class="filter project-origin noborder">
                    <dt>标的来源：</dt>
                    <dd><span class="is-check" data-platform-name='erongsuo'><i class="iconcheck" ></i>e融所</span></dd>
                    <dd><span class="is-check" data-platform-name='huitouwang'><i class="iconcheck" ></i>汇投网</span></dd>
                    <dd><span class="is-check" data-platform-name='xinyongbao'><i class="iconcheck" ></i>信用宝</span></dd>
                    <dd><span class="is-check" data-platform-name='rxdai'><i class="iconcheck" ></i>投哪网</span></dd>
                    <dd><span class="is-check" data-platform-name='duanrongwang'><i class="iconcheck" ></i>短融网</span></dd>
                    <dd><span class="is-check" data-platform-name='zhubaodai'><i class="iconcheck" ></i>珠宝贷</span></dd>
                    <dd><span class="is-check" data-platform-name='huiyingdai'><i class="iconcheck" ></i>汇盈金服</span></dd>
                    <dd><span class="is-check" data-platform-name='kaixindai'><i class="iconcheck" ></i>开鑫贷</span></dd>
                    <dd><span class="is-check" data-platform-name='jintoushou'><i class="iconcheck" ></i>金投手</span></dd>
                    <dd><span class="is-check" data-platform-name='liyedai'><i class="iconcheck" ></i>立业贷</span></dd>
                    <dd><span class="is-check" data-platform-name='darendai'><i class="iconcheck" ></i>达人贷</span></dd>
                    <dd><span class="is-check" data-platform-name='hepandai'><i class="iconcheck" ></i>合盘贷</span></dd>
                    <dd><span class="is-check" data-platform-name='elutongxin'><i class="iconcheck" ></i>e路同心</span></dd>
                    <dd><span class="is-check" data-platform-name='jujinziben'><i class="iconcheck" ></i>聚金资本</span></dd>
                    <dd><span class="is-check" data-platform-name='stjr'><i class="iconcheck" ></i>石投金融</span></dd>
                    <dd><span class="is-check" data-platform-name='91wangcai'><i class="iconcheck" ></i>91旺财</span></dd>
                    <dd><span class="is-check" data-platform-name='edai'><i class="iconcheck" ></i>易贷网</span></dd>
                    <dd><span class="is-check" data-platform-name='chenengdai'><i class="iconcheck" ></i>车能贷</span></dd>
                    <dd><span class="is-check" data-platform-name='51rzy'><i class="iconcheck" ></i>融资易</span></dd>
                    <dd><span class="is-check" data-platform-name='wyjr'><i class="iconcheck" ></i>万盈金融</span></dd>
                    <dd><span class="is-check" data-platform-name='365ibank'><i class="iconcheck" ></i>天天财富</span></dd>
                    <dd><span class="is-check" data-platform-name='xinrong'><i class="iconcheck" ></i>信融财富</span></dd>
                    <dd><span class="is-check" data-platform-name='baobidai'><i class="iconcheck" ></i>生菜金融</span></dd>
                    <dd><span class="is-check" data-platform-name='chujinsuo'><i class="iconcheck" ></i>楚金所</span></dd>
                    <dd><span class="is-check" data-platform-name='yesvion'><i class="iconcheck" ></i>粤商贷</span></dd>
                    <dd><span class="is-check" data-platform-name='gzed'><i class="iconcheck" ></i>广州e贷</span></dd>
                    <dd><span class="is-check" data-platform-name='shanyidai'><i class="iconcheck" ></i>杉易贷</span></dd>
                    <dd><span class="is-check" data-platform-name='lianhao'><i class="iconcheck" ></i>联豪创投</span></dd>
                    <dd><span class="is-check" data-platform-name='bojd'><i class="iconcheck" ></i>博金贷</span></dd>
                </dl>
            </div>
        </div>
        <div class="main">
            <h2 class="filter-title filter-item" name="bid_filter_top">
                <a href="javascript:void(0)" class="btn btn-m btn-blue" sorttype="0" sortorder="desc">默认排序</a>
                <a href="javascript:void(0)" class="btn btn-m btn-white" sorttype="1" sortorder="desc">收益率<i class="iconfont">&#xe674;</i></a>
                <a href="javascript:void(0)" class="btn btn-m btn-white" sorttype="2" sortorder="desc">项目期限<i class="iconfont">&#xe674;</i></a>
                <a href="javascript:void(0)" class="btn btn-m btn-white" sorttype="3" sortorder="desc">投标进度<i class="iconfont">&#xe674;</i></a>
                <a href="https://www.touzhijia.com/shop/" id="vouchertips" >先兑换平台加息券再投资，可享加息奖励>></a>
            </h2>
            <ul class="first-menu bid-lists">
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016042514215357154.jpg?ver=20160431006" style="width:147px;" alt="立业贷" title="立业贷">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="盈车贷NO.DGCD6434">盈车贷NO.DGCD6434</span>项目金额：<em>￥67,600</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>15.00</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          18个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>95</em>%</span>
                                        <i class="progressbar" style="background-position: -5130px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='http://www.liyedai.cn/front/invest/invest?bidId=7851' data-bid="7851" href="javascript:void(0);" data-en-name="liyedai" data-invest-id="7851">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>等额本息</em>标的类型：<em>普通标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016080810123766531.png?ver=20160431006" style="width:147px;" alt="e融所" title="e融所">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="新手福利标160909X">新手福利标160909X</span>项目金额：<em>￥200,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>15.00</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          10天                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>95</em>%</span>
                                        <i class="progressbar" style="background-position: -5130px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='https://www.myerong.com/financing/sbtz/bdxq/1216.html' data-bid="1216" href="javascript:void(0);" data-en-name="erongsuo" data-invest-id="1216">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>本息到期一次付清</em>标的类型：<em>新手标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015092810324639258.jpg?ver=20160431006" style="width:147px;" alt="聚金资本" title="聚金资本">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="【三板贷】160909DL02">【三板贷】160909DL02</span>项目金额：<em>￥250,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>14.40</em>%</span></td></td>
                                <td>安全级别<span>BB</span></td>
                                <td>项目期限<span>
                          3个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>62</em>%</span>
                                        <i class="progressbar" style="background-position: -3348px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='https://www.jujinziben.com/borrowinfo.page?borrow_id=20160909000' data-bid="2016090900000000000000003059" href="javascript:void(0);" data-en-name="jujinziben" data-invest-id="2016090900000000000000003059">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>按月还息，到期还本</em>标的类型：<em>普通标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015122416104392090.jpg?ver=20160431006" style="width:147px;" alt="万盈金融" title="万盈金融">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="Z20160910011326342">Z20160910011326342</span>项目金额：<em>￥61,744</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>14.20</em>%</span></td></td>
                                <td>安全级别<span>A</span></td>
                                <td>项目期限<span>
                          11个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>0</em>%</span>
                                        <i class="progressbar" style="background-position: 0px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='http://www.wyjr168.com/Creditor/CreditorDetail?id=16395' data-bid="16395" href="javascript:void(0);" data-en-name="wyjr" data-invest-id="16395">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>先息后本</em>标的类型：<em>债权转让标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016041416230228610.png?ver=20160431006" style="width:147px;" alt="达人贷" title="达人贷">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="装修">装修</span>项目金额：<em>￥687</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>14.13</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          36个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>0</em>%</span>
                                        <i class="progressbar" style="background-position: 0px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='http://www.darenloan.com/invest/1707956' data-bid="1707956" href="javascript:void(0);" data-en-name="darendai" data-invest-id="1707956">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>每月等额本息</em>标的类型：<em>债权转让标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016080213010228018.jpg?ver=20160431006" style="width:147px;" alt="短融网" title="短融网">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="车押宝C201605103">车押宝C201605103</span>项目金额：<em>￥160,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>14.00</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          5天                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>53</em>%</span>
                                        <i class="progressbar" style="background-position: -2862px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='http://www.duanrong.com/loanDetail/160907140735969074' data-bid="160907140735969074" href="javascript:void(0);" data-en-name="duanrongwang" data-invest-id="160907140735969074">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>一次性到期还本付息</em>标的类型：<em>新手标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015040216291964108.jpg?ver=20160431006" style="width:147px;" alt="合盘贷" title="合盘贷">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="定期通X_1609091">定期通X_1609091</span>项目金额：<em>￥300,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>13.50</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          15天                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>44</em>%</span>
                                        <i class="progressbar" style="background-position: -2376px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='http://www.hepandai.com/Product/Detail/9e9bdc3a-13b8-4e08-9b22-3' data-bid="9e9bdc3a-13b8-4e08-9b22-3d4109eb61a3" href="javascript:void(0);" data-en-name="hepandai" data-invest-id="9e9bdc3a-13b8-4e08-9b22-3d4109eb61a3">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>债权转让，自动退出（预计1-3日到账）</em>标的类型：<em>新手标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2016051016490399818.jpg?ver=20160431006" style="width:147px;" alt="车能贷" title="车能贷">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="ZT201609080003">ZT201609080003</span>项目金额：<em>￥10,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>13.50</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          1个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>72</em>%</span>
                                        <i class="progressbar" style="background-position: -3888px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='https://www.chenengdai.com/project/tender/14733032116365468.html' data-bid="14733032116365468" href="javascript:void(0);" data-en-name="chenengdai" data-invest-id="14733032116365468">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>到期还本按月付息</em>标的类型：<em>普通标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015041617455545546.jpg?ver=20160431006" style="width:147px;" alt="珠宝贷" title="珠宝贷">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="珠宝贷201609090035">珠宝贷201609090035</span>项目金额：<em>￥5,000,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>13.00</em>%</span></td></td>
                                <td>安全级别<span>AA</span></td>
                                <td>项目期限<span>
                          6个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>22</em>%</span>
                                        <i class="progressbar" style="background-position: -1188px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='https://secure.zhubaodai.com/investmentDetail/investmentDetails/' data-bid="JK16090919377881" href="javascript:void(0);" data-en-name="zhubaodai" data-invest-id="JK16090919377881">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>按月付息到期还本</em>标的类型：<em>普通标</em></span></p>
                </li>
                <li>
                    <h3>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="plat-img">
                                    <!--
                                      <i class="event-icon"></i>
                                    -->            <img src="http://static.tianyantou.com/upload/image/bidimg/logo_recommend_img/2015080414060923178.jpg?ver=20160431006" style="width:147px;" alt="汇盈金服" title="汇盈金服">
                                </td>
                                <td class="bond-number">
                                    <span class="text-ellipsis" title="潍坊市徐先生个人房产抵押借款第一期【共四期】">潍坊市徐先生个人房产抵押借款第一期【共四期】</span>项目金额：<em>￥500,000</em></td>
                                <td class="rate-box">年化收益率<span class="rate"><em>13.00</em>%</span></td></td>
                                <td>安全级别<span>BBB</span></td>
                                <td>项目期限<span>
                          6个月                       </span>
                                </td>
                                <td class="noborder">
                                    <div class="bond-progress">
                                        <span><em>20</em>%</span>
                                        <i class="progressbar" style="background-position: -1080px 0px;"></i>
                                    </div>
                                    <a rel="invest_layer" class="btn btn-blue btn-s" flag = "0"  data-inversurl='http://www.hyjf.comproject/getProjectDetail.do?borrowNid=ZXH160904801.html' data-bid="ZXH160904801" href="javascript:void(0);" data-en-name="huiyingdai" data-invest-id="ZXH160904801">投资</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </h3>
                    <p class="second-menu"><span>还款方式：<em>按月计息，到期还本还息</em>标的类型：<em>普通标</em></span></p>
                </li>
            </ul>
            <div id="bidding_pagination" data-pagesize = '16'></div>

        </div>
    </div>
</div>

@stop