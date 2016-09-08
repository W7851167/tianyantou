<!-- 头信息 -->
@include('admin.common.header')
<!-- 头信息结束 -->

<!-- body部分 -->
@include('admin.common.menu')
@yield('content')
<!-- body 部分结束 -->

<!-- footer部分 -->
@include('admin.common.footer')
<!-- footer部分结束 -->
