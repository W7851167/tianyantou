@extends('layout.main')
@section('title')积分明细@stop
@section('style')
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/css/account.css" />
    <link rel="stylesheet" href="{!! config('app.static_url') !!}/js/lib/fullcalendar/fullcalendar.min.css" />
@stop

@section('content')
    <div class="wrap user-center">
        <div class="container clearfix">
            @include('account.common.menu')
            <div class="main tworow" style="height: 917px;">
                <div class="main-inner">
                    <h1 class="section-title">积分明细</h1>
                    <div class="cont-box-wrap">
                        <div class="content-unit ">
                            <div class="unit-bd unit-3 ">
                                <dl>
                                    <dt>总积分</dt>
                                    <dd>{!! $census['total'] or 0 !!}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="autoreserve_records">
                        <table class="table table-blue table-bordered ucenter-table" style="font-size:13px;">
                            <thead>
                            <tr>
                                <th>时间</th>
                                <th>积分</th>
                                <th>剩余积分</th>
                                <th>备注</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($lists) > 0)
                                @foreach($lists as $sv)
                                    <tr>
                                        <td>{!! $sv->created_at or '--' !!}</td>
                                        <td>{!! $sv->score or 0 !!}</td>
                                        <td>{!! $census['total'] or 0 !!}</td>
                                        <td>{!! $sv->intro or '' !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="norecord">
                                    <td colspan="4">
                                        您还没有任何积分
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="pagination" >{!! $pageHtml !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/ucenter.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/pagination.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/actions.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/form.js"></script>
    <script type="text/javascript" src="{!! config('app.static_url') !!}/js/plugins/tab.js"></script>
@stop
