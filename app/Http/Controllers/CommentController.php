<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use GrahamCampbell\Binput\Facades\Binput;
use GrahamCampbell\BootstrapCMS\Facades\CommentRepository;
use GrahamCampbell\BootstrapCMS\Facades\PostRepository;
use GrahamCampbell\Credentials\Facades\Credentials;
use GrahamCampbell\Throttle\Throttlers\ThrottlerInterface;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * This is the comment controller class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class CommentController extends AbstractController
{
    /**
     * The throttler instance.
     *
     * @var \GrahamCampbell\Throttle\Throttlers\ThrottlerInterface
     */
    protected $throttler;

    /**
     * Create a new instance.
     *
     * @param \GrahamCampbell\Throttle\Throttlers\ThrottlerInterface $throttler
     *
     * @return void
     */
    public function __construct(ThrottlerInterface $throttler)
    {
        $this->throttler = $throttler;

        $this->setPermissions([
            'store'   => 'user',
            'update'  => 'mod',
            'destroy' => 'mod',
        ]);

        $this->beforeFilter('throttle.comment', ['only' => ['store']]);

        parent::__construct();
    }

    /**
     * Display a listing of the comments.
     *
     * @param int $postId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($postId)
    {
        $post = PostRepository::find($postId, ['id']);
        if (!$post) {
            Session::flash('error', '您查看的新闻已经被删除。');

            return Response::json([
                'success' => false,
                'code'    => 404,
                'msg'     => '您查看的新闻已经被删除。',
                'url'     => URL::route('blog.posts.index'),
            ], 404);
        }

        $comments = $post->comments()->get(['id', 'version']);

        $data = [];

        foreach ($comments as $comment) {
            $data[] = ['comment_id' => $comment->id, 'comment_ver' => $comment->version];
        }

        return Response::json(array_reverse($data));
    }

    /**
     * Store a new comment.
     *
     * @param int $postId
     *
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($postId)
    {
        $input = array_merge(Binput::only('body'), [
            'user_id' => Credentials::getuser()->id,
            'post_id' => $postId,
            'version' => 1,
        ]);

        if (CommentRepository::validate($input, array_keys($input))->fails()) {
            throw new BadRequestHttpException('您的评论是空的。');
        }

        $this->throttler->hit();

        $comment = CommentRepository::create($input);

        $contents = View::make('posts.comment', [
            'comment' => $comment,
            'post_id' => $postId,
        ]);

        return Response::json([
            'success'    => true,
            'msg'        => '评论创建成功。',
            'contents'   => $contents->render(),
            'comment_id' => $comment->id,
        ], 201);
    }

    /**
     * Show the specified comment.
     *
     * @param int $postId
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($postId, $id)
    {
        $comment = CommentRepository::find($id);
        $this->checkComment($comment);

        $contents = View::make('posts.comment', [
            'comment' => $comment,
            'post_id' => $postId,
        ]);

        return Response::json([
            'contents'     => $contents->render(),
            'comment_text' => nl2br(e($comment->body)),
            'comment_id'   => $id,
            'comment_ver'  => $comment->version,
        ]);
    }

    /**
     * Update an existing comment.
     *
     * @param int $postId
     * @param int $id
     *
     * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     * @throws \Symfony\Component\HttpKernel\Exception\ConflictHttpException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($postId, $id)
    {
        $input = Binput::map(['edit_body' => 'body']);

        if (CommentRepository::validate($input, array_keys($input))->fails()) {
            throw new BadRequestHttpException('您的评论是空的。');
        }

        $comment = CommentRepository::find($id);
        $this->checkComment($comment);

        $version = Binput::get('version');

        if (empty($version)) {
            throw new BadRequestHttpException('没有提供版本信息。');
        }

        if ($version != $comment->version && $version) {
            throw new ConflictHttpException('这个评论已经被人修改了。');
        }

        $version++;

        $comment->update(array_merge($input, ['version' => $version]));

        return Response::json([
            'success'      => true,
            'msg'          => '评论修改成功。',
            'comment_text' => nl2br(e($comment->body)),
            'comment_id'   => $id,
            'comment_ver'  => $version,
        ]);
    }

    /**
     * Delete an existing comment.
     *
     * @param int $postId
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($postId, $id)
    {
        $comment = CommentRepository::find($id);
        $this->checkComment($comment);

        $comment->delete();

        return Response::json([
            'success'    => true,
            'msg'        => '评论删除成功。',
            'comment_id' => $id,
        ]);
    }

    /**
     * Check the comment model.
     *
     * @param mixed $comment
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return void
     */
    protected function checkComment($comment)
    {
        if (!$comment) {
            throw new NotFoundHttpException('没有发现该评论。');
        }
    }
}
