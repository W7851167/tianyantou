<!DOCTYPE HTML>
<html lang="zh">
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv=”X-UA-Compatible” content=”IE=edge,chrome=1″ />
    <title>后台管理-@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('css/admin/base.css') }}">
    <script src="{!!URL('admin/js/jquery.min.js')!!}"></script>
    <script src="{!!URL('admin/js/base.js')!!}"></script>
    <script src="{!!URL('admin/js/layer/layer.js')!!}"></script>
    <script src="{!!URL('cw100_b2b/js/layer/minelayer.js')!!}"></script>