<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{ Config::get('cms.description') }}">
<meta name="author" content="{{ Config::get('cms.author') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/vendor.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/cms-main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/bootstrap.'.Config::get('theme.name', 'default').'.min.css') }}">

@section('css')
@show

<!--[if lt IE 9]>
  <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
  <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">
