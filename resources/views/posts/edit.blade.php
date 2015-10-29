@extends('layouts.default')

@section('title')
编辑{{ $post->title }}
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="box box-padding-bottom">
          <div class="box-body">
            <div class="page-header">
              <h1>
                编辑{{ $post->title }}
                <div class="pull-right">
                  <a class="btn btn-danger btn-flat" href="#delete_post" data-toggle="modal" data-target="#delete_post">
                    删除新闻
                  </a>
                </div>
              </h1>
            </div>
          </div>

          <?php
          $form = ['url' => URL::route('blog.posts.update', ['posts' => $post->id]),
              '_method' => 'PATCH',
              'method' => 'POST',
              'button' => '保存',
              'defaults' => [
                  'title' => $post->title,
                  'summary' => $post->summary,
                  'body' => $post->body,
          ], ];
          ?>
          @include('posts.form')
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('bottom')
@auth('blog')
    @include('posts.delete')
@endauth
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap-markdown.min.css">
@stop

@section('js')
<script type="text/javascript" src="/assets/scripts/bootstrap-markdown.js"></script>
@stop
