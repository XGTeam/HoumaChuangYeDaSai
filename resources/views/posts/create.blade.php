@extends('layouts.default')

@section('title')
发布新闻
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="box box-padding-bottom">
          <div class="box-body">
            <div class="page-header">
              <h1>发布新闻</h1>
            </div>
          </div>

          <?php
          $form = ['url' => URL::route('blog.posts.store'),
              'method' => 'POST',
              'button' => '发布新闻',
              'defaults' => [
                  'title' => '',
                  'summary' => '',
                  'body' => '',
          ], ];
          ?>
          @include('posts.form')
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap-markdown.min.css">
@stop

@section('js')
<script type="text/javascript" src="/assets/scripts/bootstrap-markdown.js"></script>
@stop
