<div class="jpform-foot">
    <ul>
        <?php $current = Route::currentRouteName();?>
        <li class="jump_url">
            <a href="{!! config('app.m_url') !!}">
                @if($current == 'mindex')
                    <img src="//static.tianyantou.com/images/mobile/h1-1.png"/>
                @else
                    <img src="//static.tianyantou.com/images/mobile/h1.png"/>
                @endif
            </a>
            <p>首页</p>

        </li>
        <li class="jump_url">
            <a href="{!! config('app.m_url') !!}/platform">
                @if($current == 'mplatform')
                    <img src="//static.tianyantou.com/images/mobile/h2-2.png"/>
                @else
                    <img src="//static.tianyantou.com/images/mobile/h2.png"/>
                @endif
            </a>
            <p>精选</p>

        </li>
        <li class="jump_url">
            <a href="">
                @if($current == 'muser')
                    <img src="//static.tianyantou.com/images/mobile/h3-3.png"/>
                @else
                    <img src="//static.tianyantou.com/images/mobile/h3.png"/>
                @endif
            </a>
            <p>我的</p>

        </li>
    </ul>
</div>