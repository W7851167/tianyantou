@if(!empty($lists))
    @foreach($lists as $cv)
<div class="plat-box">
    <div class="plat-mask" style="opacity: 1; display: none;">
        <a href="{!! config('app.url') !!}/platform/{!! $cv->ename !!}.html" target="_blank"></a>
    </div>
    <div class="plat-main">
        <img src="{!! config('app.static_url') !!}{!! $cv->logo or '' !!}" alt="{!! $cv->platform or '' !!}">
        <div class="plat-info" style="position: relative;">
            <h4>年化收益率
                @if($cv->min_yield == $cv->max_yield)
                    <span class="rate"><em>{!! $cv->max_yield or 0.00 !!}</em>%</span>
                    @else
                <span class="rate"><em>{!! $cv->min_yield or 0.00 !!}</em>%<em>-</em><em>{!! $cv->max_yield or 0.00 !!}</em>%</span>
                    @endif
            </h4>
            <span style="width: 300px;margin-left: -15px;">天眼加化率：<em>@if($cv->min_myield == $cv->max_myield){!! $cv->max_myield or 0.00 !!}%@else{!! $cv->min_myield or 0.00 !!}%-{!! $cv->max_myield or 0.00 !!}%@endif</em></span>
            <span>可投标数：<em>{!! $cv->tasks->where('status',1)->count() !!}个</em></span>
            <span>安全评级：<em>{!! $cv->level or 'B' !!}</em></span>
            <a href="platform/{!! $cv->ename !!}.html" target="_blank" class="btn btn-blue-o btn-allwidth">查看详情</a>
        </div>
    </div>
</div>
    @endforeach
@endif