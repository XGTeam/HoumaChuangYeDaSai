<!DOCTYPE html>
<html lang="en-GB">
<head>
<meta charset="utf-8">
</head>
<body>
<h2>{{ $subject }}</h2>
@section('content')
@show
<br>
<p>
谢谢, <br>
{{ Config::get('app.name') }} - 支持团队
</p>
</body>
</html>
