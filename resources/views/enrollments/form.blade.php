<form class="form-horizontal" action="{{ URL::route('enrollments.store') }}" method="POST">
  {{ csrf_field() }}

  <legend>负责人资料</legend>
  <div class="form-group{!! ($errors->has('leader_name')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="leader_name">姓名</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <input name="leader_name" id="leader_name" value="{!!  Request::old('leader_name') !!}" type="text" class="form-control" placeholder="姓名">
      {!! ($errors->has('leader_name') ? $errors->first('leader_name') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('leader_position')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="leader_position">职位</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <input name="leader_position" id="leader_position" value="{!!  Request::old('leader_position') !!}" type="text" class="form-control" placeholder="职位">
      {!! ($errors->has('leader_position') ? $errors->first('leader_position') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('leader_id_type')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="leader_id_type">证件类型</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <select class="form-control" name="leader_id_type" id="leader_id_type">
        <option value="0">身份证</option>
        <option value="1">军官证</option>
        <option value="2">护照</option>
      </select>
      {!! ($errors->has('leader_id_type') ? $errors->first('leader_id_type') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('leader_id_number')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="leader_id_number">证件号码</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <input name="leader_id_number" id="leader_id_number" value="{!!  Request::old('leader_id_number') !!}" type="text" class="form-control" placeholder="证件号码">
      {!! ($errors->has('leader_id_number') ? $errors->first('leader_id_number') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('leader_contact')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="leader_contact">手机号码</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <input name="leader_contact" id="leader_contact" value="{!!  Request::old('leader_contact') !!}" type="text" class="form-control" placeholder="手机号码">
      {!! ($errors->has('leader_contact') ? $errors->first('leader_contact') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('leader_email')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="leader_email">邮箱</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <input name="leader_email" id="leader_email" value="{!!  Request::old('leader_email') !!}" type="text" class="form-control" placeholder="邮箱">
      {!! ($errors->has('leader_email') ? $errors->first('leader_email') : '') !!}
    </div>
  </div>
  <legend>项目基本资料</legend>
  <div class="form-group{!! ($errors->has('project_name')) ? ' has-error' : '' !!}">
    <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="project_name">名称</label>
    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
      <input name="project_name" id="project_name" value="{!!  Request::old('project_name') !!}" type="text" class="form-control" placeholder="名称">
      {!! ($errors->has('project_name') ? $errors->first('project_name') : '') !!}
    </div>
  </div>
  <div class="form-group{!! ($errors->has('project_brief')) ? ' has-error' : '' !!}">
      <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="project_brief">概要</label>
      <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
          <textarea name="project_brief" id="project_brief" class="form-control" placeholder="概要" rows="8">{!! Request::old('project_brief') !!}</textarea>
          {!! ($errors->has('project_brief') ? $errors->first('project_brief') : '') !!}
      </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-sm-offset-3 col-sm-10 col-xs-12">
      <button class="btn btn-primary" type="submit"><i class="fa fa-rocket"></i> 提交</button>
    </div>
  </div>
</form>
