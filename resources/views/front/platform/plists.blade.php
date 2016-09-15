@if(!empty($lists))
    @foreach($lists as $tv)
<tr>
    <td width="180" class="bond-number" title="{!! $tv->title or '' !!}">{!! $tv->title or '' !!}</td>
    <td width="160"><span>  ￥{!! money_format($tv->total) !!}   </span></td>
    <td width="180">
        <span class="rate"><em>{!! $tv->ratio or 0.00 !!}</em>%</span>
    </td>
    <td width="160">
        {!! $tv->term or 0 !!}
    </td>
    <td width="180" class="text-ellipsis" title="{!! $tv->repay or '' !!}">{!! $tv->repay or '' !!}</td>
    <td width="160">
        <div class="bond-progress">
            <span><em>0</em>%</span>
            <i class="progressbar" style="background-position: 0px 0px;"></i>
        </div>
    </td>
    <td width="110"><a rel="invest_layer" class="btn btn-blue" flag="0" data-isskip="0" data-inversurl="http://www.wyjr168.com/Creditor/CreditorDetail?id=16977" data-bid="16977" href="javascript:void(0);" data-en-name="wyjr" data-invest-id="16977">去投资</a></td>
</tr>
@endforeach
@endif