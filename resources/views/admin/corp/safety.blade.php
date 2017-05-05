@extends('admin.common.layout')
@section('title') 安全保障 @stop
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
                    <p><a href="{!! url('corp/safety',['id'=>$corp->id]) !!}"  class="at">安全保障</a></p>
                    <p><a href="{!! url('corp/photos',['id'=>$corp->id]) !!}">图片资料</a></p>
                    <p><a href="{!! url('corp/news',['id'=>$corp->id]) !!}">最新动态</a></p>
                    <p><a href="{!! url('corp/charts',['id'=>$corp->id]) !!}" >雷达图</a></p>
                    <p><a href="{!! url('corp/honour',['id'=>$corp->id]) !!}">企业荣誉</a></p>
                    <p><a href="{!! url('corp/archives',['id'=>$corp->id]) !!}">档案</a></p>
                </div>
                <form  method="post" class="base_form">
                    {!! csrf_field() !!}
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>备案域名：</div>
                        <div><input type="text" name="data[icp_domain]" placeholder="备案域名" value="{!! $metas['icp_domain'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>单位性质：</div>
                        <div><input type="text" name="data[icp_corp_type]" placeholder="企业" value="{!! $metas['icp_corp_type'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>备案时间：</div>
                        <div><input type="text" class="Wdate" name="data[icp_time]" placeholder="备案时间" value="{!! $metas['icp_time'] or '' !!}" onfocus="WdatePicker({dateFmt: 'yyyy-M-d'})"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>公司名称：</div>
                        <div><input type="text" name="data[icp_corp_name]" placeholder="公司名称" value="{!! $metas['icp_corp_name'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>ICP备案号：</div>
                        <div><input type="text" name="data[icp_no]" placeholder="京ICP备14019436号" value="{!! $metas['icp_no'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>担保方式：</div>
                        <div><input type="text" name="data[pattern]" placeholder="风险准备金，双乾支付托管" value="{!! $metas['pattern'] or '' !!}"></div>
                    </div>
                    <div class="infospaceAddContent clearfix">
                        <div class="infospaceAddLeft"><span>*</span>担保机构：</div>
                        <div><input type="text" name="data[assure]" placeholder="网贷之家" value="{!! $metas['assure'] or '' !!}"></div>
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
