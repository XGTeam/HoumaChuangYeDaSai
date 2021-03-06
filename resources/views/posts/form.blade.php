<form class="form-horizontal agency-form" action="{{ $form['url'] }}" method="{{ $form['method'] }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ isset($form['_method'])? $form['_method'] : $form['method'] }}">

    <div class="form-group{!! ($errors->has('title')) ? ' has-error' : '' !!}">
        <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="title">标题</label>
        <div class="col-lg-8 col-md-10 col-sm-9 col-xs-12">
            <input name="title" value="{!! Request::old('title', $form['defaults']['title']) !!}" type="text" class="form-control without-radius" placeholder="标题">
            {!! ($errors->has('title') ? $errors->first('title') : '') !!}
        </div>
    </div>

    <div class="form-group{!! ($errors->has('summary')) ? ' has-error' : '' !!}">
        <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="summary">摘要</label>
        <div class="col-lg-8 col-md-10 col-sm-9 col-xs-12">
            <input name="summary" value="{!! Request::old('summary', $form['defaults']['summary']) !!}" type="text" class="form-control without-radius" placeholder="摘要">
            {!! ($errors->has('summary') ? $errors->first('summary') : '') !!}
        </div>
    </div>

    <div class="form-group{!! ($errors->has('body')) ? ' has-error' : '' !!}">
        <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="body">正文</label>
        <div class="col-lg-8 col-md-10 col-sm-9 col-xs-12">
            <textarea name="body"
                      type="text"
                      class="form-control"
                      data-provide="markdown"
                      data-language="zh"
                      data-resize="vertical"
                      data-iconlibrary="fa"
                      placeholder="正文..."
                      rows="10">{!! Request::old('body', $form['defaults']['body']) !!}</textarea>
            {!! ($errors->has('body') ? $errors->first('body') : '') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-sm-offset-3 col-sm-10 col-xs-12">
            <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-rocket"></i> {!! $form['button'] !!}</button>
        </div>
    </div>

</form>
