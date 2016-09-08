@extends('admin.common.layout')
@section('style')
    {!!HTML::style('admin/css/showrooms.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('task') !!}">公司列表</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">公司列表</a></p>
                    <p><a href="javascript:void(0)"></a></p>
                    <a href="{!!url('/shop/add')!!}" class="buttonA">创建公司</a>
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
                                    <a href="{!! url('corp/edit/'.$store['id']) !!}">编辑</a>
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
