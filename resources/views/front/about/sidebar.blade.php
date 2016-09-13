<ul class="main-nav">
    <span>当前位置：</span>
    <li><a href="{!! config('app.url') !!}">首页</a></li>
    <li><a href="{!! config('app.url') !!}/about/">关于我们</a></li>
    <li class="nav-location">活动展示</li>
</ul>
<div class="r-side-menu nav-follow">
    <h2>关于我们</h2>
    <ul class="first-menu">
        @foreach($categorys as $cv)
            <li @if($cv->page == $category->page)class="active"@endif><a href="{!! config('app.url') !!}/about/{!! $cv->page !!}.html"><i class="iconfont" >{!! $cv->iconfont !!}</i>{!! $cv->title !!}</a></li>
        @endforeach
    </ul>
</div>