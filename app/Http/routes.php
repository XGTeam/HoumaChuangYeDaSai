<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// send users to the home page
$router->get('/', ['as' => 'base', function () {
    Session::flash('', ''); // work around laravel bug if there is no session yet
    Session::reflash();

    return Redirect::to('pages/home');
}]);

// send users to the posts page
if (Config::get('cms.blogging')) {
    $router->get('blog', ['as' => 'blog', function () {
        Session::flash('', ''); // work around laravel bug if there is no session yet
        Session::reflash();

        return Redirect::route('blog.posts.index');
    }]);
}

// page routes
$router->resource('pages', 'PageController');

// blog routes
if (Config::get('cms.blogging')) {
    $router->resource('blog/posts', 'PostController');
    $router->resource('blog/posts.comments', 'CommentController');
}

// event routes
if (Config::get('cms.events')) {
    $router->resource('events', 'EventController');
}

// 用户参赛资料
$router->get('account/project', ['as' => 'account.project', 'uses' => 'ProjectController@getLoginUserProject']);
$router->resource('projects', 'ProjectController');
$router->get('account/project/edit', ['as' => 'account.project.edit', 'uses' => 'ProjectController@editLoginUserProject']);
$router->put('account/project', 'ProjectController@updateLoginUserProject');
$router->patch('account/project', 'ProjectController@updateLoginUserProject');
$router->get('account/project/initialPreview', 'ProjectController@initialPreview');

// 文件上传
Route::post('attachments/upload', 'AttachmentController@store');
Route::post('attachments/delete', 'AttachmentController@destroy');
Route::delete('attachments/delete', 'AttachmentController@destroy');
Route::get('attachments/download/{id}', ['as' => 'attachments.download', 'uses' => 'AttachmentController@download']);
