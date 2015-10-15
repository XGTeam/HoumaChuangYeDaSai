<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>{{ Config::get('app.name') }} - @section('title')
@show</title>
@include('partials.header')
</head>
<body class="index" id="page-top">
@navigation
@section('top')
@show
@include('partials.notifications')
@section('content')
@show
@include('partials.footer')
@section('bottom')
@show
</body>
</html>
