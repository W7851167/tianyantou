@extends('admin.common.layout')
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('censu') !!}">数据统计&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript">项目列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">注册统计</a></p>
                    <p><a href="javascript:void(0)" class="at">任务统计</a></p>
                </div>
                @if(!empty($stores))
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th width='65'>门店ID</th>
                            <th width="220">门店名称</th>
                            <th width="400">门店地址</th>
                            <th width="160">服务电话</th>
                            <th>操作</th>
                        </tr>
                        @foreach($stores as $store)
                            <tr>
                                <td>{!! $store['id'] !!}</td>
                                <td>{!! $store['name'] !!}</td>
                                <td>{!! $store['location'] !!}</td>
                                <td>{!! $store['tel'] !!}</td>
                                <td>
                                    <a href="{!! url('/shop/edit/'.$store['id']) !!}">编辑</a>
                                    <a href="{!! url('shop/manage/'.$store['id']) !!}">管理</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@stop
