@extends('layouts.default')

@section('title')
添加参赛资料
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="box">
          <div class="box-body">
            <h2 class="section-heading text-center">添加参赛资料</h2>
            <form action="{{ route('projects.store') }}" method="POST" novalidate class="agency-form">
              {{ csrf_field() }}
              <legend>项目基本信息</legend>
              <div class="form-group control-group">
                <div class="controls">
                  <label>项目名称</label>
                  <input type="text"
                          class="form-control"
                          name="name"
                          required
                          data-validation-required-message="请填写项目名称">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop


