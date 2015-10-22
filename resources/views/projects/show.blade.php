@extends('layouts.default')

@section('title')
{{ is_null($project) ? '没有项目资料' : $project->title }}
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    @if (is_null($project))
      <div class="alert alert-warning" role="alert">
        <p>
          您还没填写参赛资料。<a href="{{ url('projects/create') }}" class="alert-link">请点击这里，填写参赛资料。</a>
        </p>
        <p>
          填写参赛资料后，您将使用填写的资料参加比赛初选。初选结果产生后，我们将通知您初选结果。
        </p>
      </div>
    @endif
  </div>
</section>
@stop

