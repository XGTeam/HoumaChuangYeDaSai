@extends('layouts.default')

@section('title')
{{ $post->title }}
@stop

@section('content')
<section class="bg-light-gray">
  <div class="container">
    <div class="col-sm-10 col-sm-offset-1 col-xs-12">
      <div class="box box-padding-bottom">
        <div class="box-body post">
          <div class="page-header text-center">
            <h1>
              {{ $post->title }}
            </h1>
            <p class="post-clock text-muted">
              <i class="fa fa-clock-o"></i>
              {!! html_ago($post->created_at) !!}
            </p>
          </div>

          <blockquote class="blockquote-primary">
            <p>{{ $post->summary }}</p>
          </blockquote>

          <br>

          <div class="post-body">
            {!! $post->content !!}
          </div>
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
                data-target="#delete_post"
                title="删除新闻"
                href="#delete_post">
                <i class="fa fa-trash fa-fw"></i>
              </a>
            </div>
          @endauth

          <br><hr>

          <h3>评论</h3>
          @auth('user')
            <br>
            <div class="clearfix">
                <form id="commentform" class="form-vertical agency-form" action="{{ URL::route('blog.posts.comments.store', array('posts' => $post->id)) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea id="body" name="body" class="form-control comment-box" placeholder="发送一条评论..." rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 comment-button">
                            <button id="contact-submit" type="submit"
                            class="btn btn-primary"><i class="fa fa-comment"></i> 评论</button> <label id="commentstatus"></label>
                        </div>
                    </div>
                </form>
            </div>
          @else
          <p>
            <strong>若要发布评论，请先<a href="{!! URL::route('account.login') !!}">登录</a>。</strong>
          </p>
          @endauth
          <br>

          <?php $post_id = $post->id; ?>
          <div id="comments" data-url="{!!  URL::route('blog.posts.comments.index', array('posts' => $post_id)) !!}" class="clearfix comments">
            @if (count($comments) == 0)
            <p id="nocomments">暂无评论。</p>
            @else
              @foreach ($comments as $comment)
                @include('posts.comment')
              @endforeach
            @endif
          </div>
          @stop

          @section('bottom')
          @auth('blog')
          @include('posts.delete')
          @endauth
          @auth('mod')
          <div id="edit_comment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">编辑评论</h4>
                </div>
                <div class="modal-body">
                  <form id="edit_commentform" class="form-vertical" action="{{ URL::route('blog.posts.comments.store', array('posts' => $post->id)) }}" method="PATCH" data-pk="0">
                    {{ csrf_field() }}
                    <input id="verion" name="version" value="1" type="hidden">
                    <div class="form-group">
                      <textarea id="edit_body" name="edit_body" class="form-control comment-box" placeholder="发布一条评论..." rows="3"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button id="edit_comment_cancel" type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button id="edit_comment_ok" type="button" class="btn btn-primary">确认</button>
                </div>
              </div>
            </div>
          </div>
          @endauth
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('js')
<script>
var cmsCommentInterval = {!! Config::get('cms.commentfetch') !!};
var cmsCommentTime = {!! Config::get('cms.commenttrans') !!};
</script>
<script type="text/javascript" src="{{ asset('assets/scripts/cms-comment.js') }}"></script>
@stop
