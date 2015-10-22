@extends('layouts.default')

@section('title')
{{ is_null($project) ? '没有项目资料' : $project->title }}
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
  </div>
</section>
@stop

