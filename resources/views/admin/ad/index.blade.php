@extends('admin.common.layout')
@section('title')首页轮播图@stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('censu') !!}">数据统计&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript">广告信息</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">轮播图</a></p>
                    <a href="{!!url('ad/create')!!}" class="buttonA">创建轮播</a>
                </div>
                    <table class="all_shopping" cellspacing="0">
                        <tr>
                            <th>图片信息</th>
                            <th>操作</th>
                        </tr>
                        @foreach($lists as $av)
                            <tr>
                                <td style="width: 800px;">
                                    <a href="{!! $av->url !!}" target="_blank" title="{!! $av->title or '' !!}">
                                    @if(!empty($av->p_img))
                                        <img style="width: 800px;height: 130px;padding-top: 12px;" src="{!! config('app.admin_url') . $av->p_img !!}">
                                    @else
                                        未设置图片
                                    @endif
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! url('ad/create',['id'=>$av->id]) !!}">编辑</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@stop
