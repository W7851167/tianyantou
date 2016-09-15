@extends('layout.main')
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
<div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 876px;">
                <div class="main-inner">
                    <h1 class="section-title">平台绑定</h1>

                    <div class="tab click-tab">
                        <ul class="tab-nav">
                            <li class="active"><a href="javascript:void(0);">已绑定平台</a></li>
                            <li><a href="javascript:void(0);">未绑定平台</a></li>
                        </ul>
                        <div class="tab-main">
                            <div class="active">
                                <div class="tab-content tab-content-table">
                                    <table class="table table-bordered ucenter-table">
                                        <thead>
                                        <tr>
                                            <th>平台名称</th>
                                            <th>绑定用户名</th>
                                            <th>账号类型</th>
                                            <th>绑定时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="norecord">
                                            <td colspan="5">
                                                您还没有绑定平台
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <div class="tab-content tab-content-table">
                                    <table class="table table-bordered ucenter-table">
                                        <thead>
                                        <tr>
                                            <th>平台名称</th>
                                            <th>绑定用户名</th>
                                            <th>账号类型</th>
                                            <th>绑定时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_duanrongwang.html"
                                                   target="_blank">
                                                    短融网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_lianhao.html"
                                                   target="_blank">
                                                    联豪创投 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_shanyidai.html"
                                                   target="_blank">
                                                    杉易贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_gzed.html"
                                                   target="_blank">
                                                    广州e贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_yesvion.html"
                                                   target="_blank">
                                                    粤商贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_chujinsuo.html"
                                                   target="_blank">
                                                    楚金所 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_baobidai.html"
                                                   target="_blank">
                                                    生菜金融 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_xinrong.html"
                                                   target="_blank">
                                                    信融财富 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_365ibank.html"
                                                   target="_blank">
                                                    天天财富 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_wyjr.html"
                                                   target="_blank">
                                                    万盈金融 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_51rzy.html"
                                                   target="_blank">
                                                    融资易 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_chenengdai.html"
                                                   target="_blank">
                                                    车能贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_edai.html"
                                                   target="_blank">
                                                    易贷网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_stjr.html"
                                                   target="_blank">
                                                    石投金融 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_91wangcai.html"
                                                   target="_blank">
                                                    91旺财 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_jujinziben.html"
                                                   target="_blank">
                                                    聚金资本 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_elutongxin.html"
                                                   target="_blank">
                                                    e路同心 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_hepandai.html"
                                                   target="_blank">
                                                    合盘贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_darendai.html"
                                                   target="_blank">
                                                    达人贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_liyedai.html"
                                                   target="_blank">
                                                    立业贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_jintoushou.html"
                                                   target="_blank">
                                                    金投手 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_kaixindai.html"
                                                   target="_blank">
                                                    开鑫贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_huiyingdai.html"
                                                   target="_blank">
                                                    汇盈金服 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_zhubaodai.html"
                                                   target="_blank">
                                                    珠宝贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_bojd.html"
                                                   target="_blank">
                                                    博金贷 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_rxdai.html"
                                                   target="_blank">
                                                    投哪网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_xinyongbao.html"
                                                   target="_blank">
                                                    信用宝 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_huitouwang.html"
                                                   target="_blank">
                                                    汇投网 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="https://www.touzhijia.com/platform/detail_erongsuo.html"
                                                   target="_blank">
                                                    e融所 </a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop