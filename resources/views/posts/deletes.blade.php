@foreach ($posts as $post)
    <div id="delete_post_{!! $post->id !!}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">确认要删除吗?</h4>
                </div>
                <div class="modal-body">
                    <p>您正在删除这篇新闻，这个操作无法撤销。</p>
                    <p>您还要继续删除吗?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="{!!  URL::route('blog.posts.destroy', array('posts' => $post->id)) !!}" data-token="{!! Session::getToken() !!}" data-method="DELETE">确认</a>
                    <button class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
