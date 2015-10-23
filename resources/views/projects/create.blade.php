@extends('layouts.default')

@section('title')
添加参赛资料
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">
        <div class="box">
          <div class="box-header">
            <h1 class="text-center">添加参赛项目</h1>
          </div>
          <div class="box-body">
            <form action="{{ route('projects.store') }}" method="POST" novalidate class="agency-form">
              {{ csrf_field() }}
              <legend>项目基本信息</legend>
              <div class="form-group control-group">
                <div class="controls">
                  <label>项目名称</label>
                  <input type="text"
                         class="form-control"
                         name="project[name]"
                         required
                         data-validation-required-message="请填写项目名称">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>展示图 <small class="text-danger">请上传360 x 260大小方形图片</small></label>
                  <input type="file"
                         class="form-control"
                         name="project[avatar]"
                         required
                         data-validation-required-message="请添加展示图">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>项目主页 <small class="text-muted">选填</small></label>
                  <input type="text"
                         class="form-control"
                         name="project[home_page]">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>项目阶段</label>
                  <select class="form-control"
                          name="project[step]"
                          required
                          data-validation-required-message="请选择项目所处阶段">
                     <option value="创意">创意</option>
                     <option value="开发">开发</option>
                     <option value="试运营">试运营</option>
                     <option value="上线">上线</option>
                  </select>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>负责人名称</label>
                  <input type="text"
                         class="form-control"
                         name="project[leader_name]"
                         required
                         data-validation-required-message="请填写负责人名称">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>负责人手机号</label>
                  <input type="text"
                         class="form-control"
                         name="project[leader_phone]"
                         data-validation-regex-regex="\d{11}"
                         data-validation-regex-message="请输入正确的手机号，目前只支持中国地区"
                         required
                         data-validation-required-message="请填写负责人手机号">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>项目概要</label>
                  <textarea name="project[brief]"
                            rows="10"
                            class="form-control"
                            required
                            data-validation-required-message="请填写项目概要"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group control-group">
                <div class="controls">
                  <label>附件 <small class="text-danger">请上传PPT或者其他说明项目的文件</small></label>
                  <input type="file" name="project[attachments][]" class="form-control">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <legend>
                核心团队信息
              </legend>
              <div class="form-group">
                <button class="btn btn-default btn-lg"
                        data-toggle="tooltip"
                        data-placement="right"
                        id="new-member"
                        title="添加核心团队成员">
                  <i class="fa fa-user-plus"></i>
                </button>
              </div>
              <div class="row members">
                <div class="col-md-4 col-sm-6 col-xs-12 member" id="member0">
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">成员信息</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="remove">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="form-group control-group">
                        <div class="controls">
                          <label>姓名</label>
                          <input type="text"
                                 class="form-control"
                                 name="project[members][0][name]"
                                 required
                                 data-validation-required-message="请填写成员姓名">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="controls">
                          <label>年龄</label>
                          <input type="text"
                                 class="form-control"
                                 name="project[members][0][age]"
                                 min="1"
                                 data-validation-min-message="成员年龄不能小于1岁"
                                 pattern="\d"
                                 data-validation-pattern-message="请填写正确的年龄"
                                 required
                                 data-validation-required-message="请填写成员年龄">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <label>性别</label>
                        <div class="controls">
                          <label class="radio-inline">
                            <input type="radio" name="project[members][0][sex]" value="0" checked> 男
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="project[members][0][sex]" value="1"> 女
                          </label>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="controls">
                          <label>职位</label>
                          <input type="text"
                                 class="form-control"
                                 name="project[members][0][title]"
                                 required
                                 data-validation-required-message="请填写成员职位">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="controls">
                          <label>学历</label>
                          <select class="form-control"
                                  name="project[members][0][diploma]"
                                  required
                                  data-validation-required-message="请选择成员最高学历">
                            <option value="">请选择最高学历</option>
                            <option value="专科">专科</option>
                            <option value="本科">本科</option>
                            <option value="硕士">硕士</option>
                            <option value="博士">博士</option>
                            <option value="其他">其他</option>
                          </select>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="controls">
                          <label>毕业院校</label>
                          <input type="text"
                                 class="form-control"
                                 name="project[members][0][academy]"
                                 required
                                 data-validation-required-message="请填写成员毕业院校">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="form-group control-group">
                        <div class="controls">
                          <label>简介</label>
                          <textarea class="form-control"
                                 name="project[members][0][description]"
                                 required
                                 rows="10"
                                 data-validation-required-message="请填写成员简介"></textarea>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">保存</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop


