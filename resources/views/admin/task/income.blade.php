@extends('admin.common.layout')
@section('title') 收益计算 @stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::style('vendor/datepicker/skin/WdatePicker.css')!!}
    {!!HTML::script('vendor/datepicker/WdatePicker.js')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right ">
                <div class="content-right-header clearfix">
                    <img src="{!!url('admin/images/u5.png')!!}"/>
                    <a href="{!! url('task') !!}">项目管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                    <a href="#">创建/编辑项目收益</a>
                </div>
                <form  method="post" class="base_form">
                    @if(!empty($task->id))
                        <input type="hidden" name="data[id]" value="{!! $task->id !!}">
                        <input type="hidden" name="data[corp_id]" value="{!! $task->corp_id !!}">
                        <input type="hidden" name="data[status]" value="{!! $task->status !!}">
                        <input type="hidden" name="data[ratio]" value="{!! $task->ratio !!}">
                        <input type="hidden" name="data[mratio]" value="{!! $task->mratio !!}">
                    @endif
                    {!! csrf_field() !!}
                    <div>
                        <div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>天眼投加息：</div>
                            <div><input type="text" name="data[raise]" value="{!! $task->raise or '' !!}"></div>
                        </div>
						<div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>红包：</div>
                            <div><input type="text" name= "data[packet]" placeholder="单位元" value="{!! $task->packet or 0 !!}" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')">元</div>
                        </div>
						<div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>体验金：</div>
                            <div><input type="text" name= "data[bbin]" placeholder="单位元" value="{!! $task->bbin or 0 !!}" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')">元</div>
                        </div>
						<div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>平台奖励：</div>
                            <div><input type="text" name="data[plat_reward]" value="{!! $task->plat_reward or '' !!}"></div>
                        </div>
						<div class="infospaceAddContent clearfix">
                            <div class="infospaceAddLeft"><span>*</span>投资必看：</div>
                            <div>
								<script name="data[must_see]" id="must_see" type="text/plain" style="margin-left:200px;">
                                    {!! $task->must_see or '' !!}
                                </script>
							</div>
                        </div>
                    </div>
                    <div class="w928">
                        <div class="button">
                            <input class="submit" type="submit"  value="提交">
                            <input class="return" type="reset" value="重置">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--添加相关推荐--->
    <!--选点-->
@stop
@section('script')
    {!! HTML::script('vendor/ueditor/ueditor.topic.config.js') !!}
    {!! HTML::script('vendor/ueditor/ueditor.all.min.js') !!}
    <script language="javascript">
        $(function(){
            var editor = UE.getEditor('must_see');
            editor.ready(function() {
                editor.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });
        });
    </script>
    @stop