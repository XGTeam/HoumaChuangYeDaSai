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
    @else
      <div class="box">
        <div class="box-body">
          <h3 class="page-header">{{ $project->name }}</h2>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <p class="lead">项目信息</p>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width: 50%">名称</th>
                      <td>{{ $project->name }}</td>
                    </tr>
                    <tr>
                      <th style="width: 50%">主页</th>
                      <td>{{ $project->home_page }}</td>
                    </tr>
                    <tr>
                      <th style="width: 50%">阶段</th>
                      <td>{{ $project->step }}</td>
                    </tr>
                    <tr>
                      <th style="width: 50%">负责人</th>
                      <td>{{ $project->leader_name }}</td>
                    </tr>
                    <tr>
                      <th style="width: 50%">手机号码</th>
                      <td>{{ $project->leader_phone }}</td>
                    </tr>
                    <tr>
                      <th style="width: 50%">简介</th>
                      <td>{{ $project->brief }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <img src="{{ $project->avatar->url() }}"
                   class="img-responsive"
                   alt="{{ $project->title . '项目封面 - 临汾创新创业大赛' }}">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <p class="lead">核心团队成员</p>
              <div class="row">
                @foreach($project->members as $member)
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-muted">
                      <h4 class="box-header with-border">
                        {{ $member->name }}
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</section>
@stop

