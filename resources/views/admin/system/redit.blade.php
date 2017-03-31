@extends('admin.common.layout')
@section('title')系统管理@stop
@section('style')
    {!!HTML::style('admin/css/dialog.css')!!}
    {!!HTML::style('admin/css/form.css')!!}
    {!!HTML::style('admin/css/administrator_create.css')!!}
@stop
@section('content')
    <div class="content-all">
        <div class="content clearfix">
            @include('admin.common.sidebar')
            <div class="content-right">
                <div class="content-right-header clearfix">
                    <div class="content-right-header clearfix">
                        <img src="{!!url('admin/images/u5.png')!!}"/>
                        <a href="{!! url('system') !!}">系统管理&nbsp;&nbsp;>&nbsp;&nbsp;</a>
                        <a href="{!! url('system/role') !!}">角色管理</a>
                    </div>
                </div>

                <div class="content-right-tit clearfix">
                    <p><a href="javascript:void(0)" class="at">角色设置</a></p>
                </div>
                <form  method="POST" class="base_form">
                    {!! csrf_field() !!}
                    @if(!empty($roleModel))
                    <input type="hidden" name="data[id]" value="{!! $roleModel->id !!}">
                    @endif
                    <ul class="navigation-message role_create clearfix">
                        <li>
                            <p class="message-tit">
                                <span>*</span>
                                角色名称：
                            </p>
                            <div class="navigation-ct">
                                <input type="text" name="data[name]" value="{!! $roleModel->name or '' !!}">
                                <p>设定权限组名称,方便区分权限类型.</p>
                            </div>
                        </li>
                        <li>
                            <p class="message-tit">
                                描述：
                            </p>
                            <div class="navigation-ct">
                               <textarea class="addText" name="data[intro]" style="height:100px;width: 500px;">{!! $roleModel->intro or '' !!}</textarea>
                            </div>
                        </li>
                        <li>
                            <p class="message-tit">
                                <span>*</span>
                                基本权限：
                            </p>
                            <div class="navigation-ct">
                                <ul class="power-page clearfix">
                                    <li>
                                        <div class="power-page-all-check">
                                            <label>权限列表</label>
                                        </div>
                                        <ul class="power-page-ct ">
                                        </ul>
                                    </li>
                                   @foreach($roles as $rv)
                                    <li>
                                        <div class="power-page-all-check">
                                            <label>
                                                <input type="checkbox" class="check" @if(!empty($roleModel->roles) && in_array($rv['url'],$roleModel->roles)) checked @endif name="data[roles][]" value="{!! $rv['tag'] !!}">
                                                {!! $rv['name'] !!}
                                            </label>
                                        </div>
                                        <ul class="power-page-ct ">
                                            @if(!empty($rv['child']))
                                                @foreach($rv['child'] as $rc)
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="data[roles][]" value="{!! $rc['tag'] !!}" @if(!empty($roleModel->roles) && in_array($rc['url'],$roleModel->roles)) checked @endif>
                                                    {!! $rc['name'] !!}
                                                </label>
                                            </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <div class="navigation-ct-btn">
                        <button>提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script language="javascript">
        $(function(){
            $(document).on("click", ".check", function(){
                $(this).parents("div").next("ul").find("input").prop("checked", this.checked);
            });
            $(document).on("click", "[name='privi_ids[]']:checkbox", function(){
                var $tmp=$("[name='privi_ids[]']:checkbox");
                $("#basicCheckAll").prop("checked", $tmp.length==$tmp.filter(":checked").length);
            })
        });

    </script>
    @stop
