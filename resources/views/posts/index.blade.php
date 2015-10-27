@extends('layouts.default')

@section('title')
大赛新闻
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 col-xs-12">
      <div class="box">
        <div class="box-body">
          <div class="clearfix">
            <h2 class="page-header">
              大赛新闻
              @auth('blog')
                <div class="pull-right">
                  <a class="btn btn-primary"
                     data-toggle="tooltip"
                     data-placement="left"
                     title="发布新闻"
                     href="{!!  URL::route('blog.posts.create') !!}">
                    <i class="fa fa-rocket fa-fw"></i>
                    发布新闻
                  </a>
                </div>
              @endauth
            </h2>
          </div>
          @foreach($posts as $post)
            <div class="post">
              <div class="post-header">
                <h2 class="post-title">
                  <a href="{!! URL::route('blog.posts.show', array('posts' => $post->id)) !!}">
                    {!! $post->title !!}
                  </a>
                </h2>
              </div>
              <p class="post-summary">
                  {!! $post->summary !!}
              </p>
              <p class="text-muted post-clock">
                <i class="fa fa-clock-o"></i>
                {!! html_ago($post->created_at) !!}
              </p>
              @auth('blog')
                <div class="post-tools clearfix">
                  <a class="text-muted"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="编辑新闻"
                    href="{!! URL::route('blog.posts.edit', array('posts' => $post->id)) !!}">
                    <i class="fa fa-pencil fa-fw"></i>
                  </a>
                  <a class="text-muted"
                    data-toggle="modal"
                    data-target="#delete_post_{!! $post->id !!}"
                    title="删除新闻"
                    href="#delete_post_{!! $post->id !!}">
                    <i class="fa fa-trash fa-fw"></i>
                  </a>
                </div>
              @endauth
            </div>
          @endforeach
          {!! $links !!}
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('bottom')
@auth('blog')
    @include('posts.deletes')
@endauth
@stop
