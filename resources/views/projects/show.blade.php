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
          <div class="clearfix">
            <h3 class="page-header">
              {{ $project->name }}
              @if (Credentials::check() && Credentials::getUser()->id == $project->user_id)
                <div class="pull-right">
                  <a class="text-muted"
                    href="/account/project/edit"
                    data-toggle="tooltip"
                    data-placement="left"
                    title="修改资料">
                    <i class="fa fa-edit"></i>
                  </a>
                </div>
              @endif
            </h3>
          </div>
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
              <p class="lead">核心团队</p>
              <div class="row members">
                @foreach($project->members as $member)
                  <div class="col-md-4 col-sm-6 col-xs-12 member">
                    <div class="box box-muted">
                      <h4 class="box-header with-border">
                        {{ $member->name }}
                        <p><small class="text-muted">{{ $member->title }}</small></p>
                      </h4>
                      <div class="box-body">
                        <address>
                        {{ $member->age }}&nbsp;,&nbsp;&nbsp;{{ $member->sex == 0 ? '男' : '女' }}
                        <br>
                        {{ $member->academy }}&nbsp;,&nbsp;&nbsp;{{ $member->diploma }}
                        <br>
                        <br>
                        {{ $member->description }}
                        </address>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <p class="lead">项目附件</p>
              <div class="row">
                @foreach($project->attachments as $attachment)
                  <div class="col-md-3 col-sm-6 col-xs-12 attachment-preview text-center">
                    <i class="fa fa-file-o fa-4x text-muted"></i>
                    <h5 class="text-muted">
                      {{ $attachment->avatar_file_name }}
                    </h5>
                    <div>
                      <a class="btn btn-default btn-primary"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="下载文件"
                         href="{{ route('attachments.download', ['id' => $attachment->id]) }}">
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-download"></i>&nbsp;&nbsp;&nbsp;
                      </a>
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
