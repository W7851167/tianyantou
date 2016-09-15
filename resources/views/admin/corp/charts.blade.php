@extends('admin.common.layout')
@section('title') 雷达图数据 @stop
@section('style')
    {!!HTML::style('admin/css/lists.css')!!}
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
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
                        <a href="{!! url('corp') !!}">公司管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="javascript:void(0);">{!! $corp->name or '管理' !!}</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="{!! url('corp/manage',['id'=>$corp->id]) !!}">公司介绍</a></p>
                    <p><a href="{!! url('corp/term',['id'=>$corp->id]) !!}">团队管理</a></p>
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}" >安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                    <p><a href="{!! url('corp/charts',['id'=>$corp->id]) !!}"  class="at">雷达图</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>资本充足率：</div>
                        <div><input type="text" name="data[capital_adequacy]" placeholder="资本充足率" value="{!! $metas['capital_adequacy'] or '' !!}">%</div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>运营能力比率：</div>
                        <div><input type="text" name="data[operating_capacity]" placeholder="运营能力比率" value="{!! $metas['operating_capacity'] or '' !!}">%</div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>流动性：</div>
                        <div><input type="text" name="data[flowability]" placeholder="流动性" value="{!! $metas['flowability'] or '' !!}">%</div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>分散率：</div>
                        <div><input type="text" name="data[dissemination]" placeholder="分散率" value="{!! $metas['dissemination'] or '' !!}">%</div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>透明率：</div>
                        <div><input type="text" name="data[transparency]" placeholder="透明率" value="{!! $metas['transparency'] or '' !!}">%</div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>违约率：</div>
                        <div><input type="text" name="data[contract_rate]" placeholder="违约率" value="{!! $metas['contract_rate'] or '' !!}">%</div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="保存">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
