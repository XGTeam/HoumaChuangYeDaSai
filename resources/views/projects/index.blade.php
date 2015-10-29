@extends('layouts.default')

@section('title')
所有项目
@stop

@section('content')
<section id="portfolio" class="bg-light-gray projects">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">所有项目</h2>
                <h3 class="section-subheading text-muted">鼓励优秀项目、团队</h3>
            </div>
        </div>
        @if ($projects->count() == 0)
          <div class="alert alert-warning">
            <p>暂无参赛项目。</p>
          </div>
        @else
        <div class="row">
          @foreach($projects as $project)
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="{{ route('projects.show', ['id' => $project->id]) }}"
                class="portfolio-link">
                  <img src="{{ $project->avatar->url() }}" class="img-responsive" alt="">
                  <div class="portfolio-caption">
                      <h4>{{ $project->name }}</h4>
                      <p class="text-muted">{{ $project->brief }}</p>
                  </div>
                </a>
            </div>
          @endforeach
          <div class="col-xs-12">
            {!! $projects->render() !!}
          </div>
        </div>
        @endif
    </div>
</section>
@stop
