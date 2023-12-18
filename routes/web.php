<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Position;
use Illuminate\Database\Connectors\PostgresConnector;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('layoute/welcom', function () {
    return view('welcome');
});


Route::get('/test', TestController::class);

Route::get('/', function(){
    return view('layouts/mainpage');
}) -> name('mainpage');

Route::get('registration/create', [RegistrationController::class, 'create']) -> name('reg.create');
Route::post('registration', [RegistrationController::class, 'store']) -> name('reg.store');
Route::get('registration/records', [RegistrationController::class, 'index']) -> name('reg.index');
Route::get('registration/{record}', [RegistrationController::class, 'show']) -> name('reg.show');
Route::get('registration/{record}/edit', [RegistrationController::class, 'edit']) -> name('reg.edit');
Route::delete('registration/{record}', [RegistrationController::class, 'delete']) -> name('reg.delete');

Route::get('/bd_menu', function(){
    return view('layouts/bd_menu');
}) -> name('bd_menu');


Route::get('blog', [PostController::class, 'show']) -> name('blog');

Route::get('blog_post/{id}', [PostController::class, 'show_post']) -> name('blog_post');

Route::get('/get_user_form', function(){
    return view('layouts/users/get_user_form');
}) -> name('get_user_form');

Route::get('/get_user_form_json', function(){
    return view('layouts/users/get_user_form_json');
}) -> name('get_user_form.json');


Route::get('/get_position_form', function(){
    return view('layouts/positions/get_position_form');
}) -> name('get_position_form');

Route::get('/get_position_form_json', function(){
    return view('layouts/positions/get_position_form_json');
}) -> name('get_position_form.json');


Route::get('/get_post_form', function(){
    return view('layouts/posts/get_post_form');
}) -> name('get_post_form');

Route::get('/get_post_form_json', function(){
    return view('layouts/posts/get_post_form_json');
}) -> name('get_post_form.json');


Route::get('/get_comment_form', function(){
    return view('layouts/comments/get_comment_form');
}) -> name('get_comment_form');

Route::get('/get_comment_form_json', function(){
    return view('layouts/comments/get_comment_form_json');
}) -> name('get_comment_form.json');


Route::get('user/create', [UserController::class, 'create']) -> name('user.create');
Route::post('user', [UserController::class, 'store'])->name('user.store');
Route::get('user/users', [UserController::class, 'index']) -> name('users.index');

Route::post('user/get_user', [UserController::class, 'get_user_by_id'])->name('user.get');

Route::get('user/{id}', [UserController::class, 'get_user']) -> name('user.id');
Route::get('user/{id}/edit', [UserController::class, 'edit']) ->name('user.id.edit');
Route::post('user/{id}/update', [UserController::class, 'update']) -> name('user.id.update');
Route::get('user/{id}/delete', [UserController::class, 'delete']) -> name('user.id.delete');


Route::get('user/{id}/position/create', [PositionController::class, 'create']) -> name('position.create');
Route::post('user/{id}/position/create', [PositionController::class, 'store']) -> name('position.store');
Route::get('positions', [PositionController::class, 'index']) -> name('position.index');

Route::post('position/get_post', [PositionController::class, 'get_position_by_id'])->name('position.get');
Route::get('position/{id}', [PositionController::class, 'get_position']) -> name('position.id');
Route::get('position/{id}/edit', [PositionController::class, 'edit']) -> name('position.edit');
Route::post('position/{id}/update', [PositionController::class, 'update']) -> name('position.update');
Route::get('position/{id}/delete', [PositionController::class, 'delete']) -> name('position.delete');


//Route::get('post/create', [PostController::class, 'create']) -> name('post.create');
Route::get('user/{id}/post/create', [PostController::class, 'create']) -> name('post.create');
Route::post('user/{id}/post/create', [PostController::class, 'store']) -> name('post.store');
Route::get('posts', [PostController::class, 'index']) -> name('post.index');
Route::get('post/{id}', [PostController::class, 'get_post']) -> name('post.id');

Route::post('post/get_post', [PostController::class, 'get_post_by_id'])->name('post.get');
Route::get('post/{id}/edit', [PostController::class, 'edit']) -> name('post.edit');
Route::post('post/{id}/update', [PostController::class, 'update']) -> name('post.update');
Route::get('post/{id}/publish', [PostController::class, 'publish']) -> name('post.publish');
Route::get('post/{id}/delete', [PostController::class, 'delete']) -> name('post.delete');


// Route::get('comment/create', [CommentController::class, 'create']) -> name('comment.create');
// Route::post('comment/create', [CommentController::class, 'store']) -> name('comment.store');
Route::get('user/{id}/commentable/{idc}/comment/create', [CommentController::class, 'create']) -> name('comment.create');
Route::post('user/{id}/commentable/{idc}/comment/create', [CommentController::class, 'store']) -> name('comment.store');

Route::get('comments', [CommentController::class, 'index']) -> name('comment.index');
Route::post('comment/get_comment', [CommentController::class, 'get_comment_by_id']) -> name('comment.get');
Route::get('comment/{id}', [CommentController::class, 'get_comment']) -> name('comment.id');
Route::get('comment/{id}/edit', [CommentController::class, 'edit']) -> name('comment.edit');
Route::post('comment/{id}/update', [CommentController::class, 'update']) -> name('comment.update');
Route::get('comment/{id}/approve', [CommentController::class, 'approve']) -> name('comment.approve');
Route::get('comment/{id}/delete', [CommentController::class, 'delete']) -> name('comment.delete');


Route::get('json/user/{id}', [UserController::class, 'json_id']) -> name('user.json.id');
Route::get('json/users', [UserController::class, 'jsons']) -> name('users.json');
Route::post('json/user/get_json', [UserController::class, 'get_json']) -> name('user.get_json');

Route::get('json/position/{id}', [PositionController::class, 'json_id']) -> name('position.json.id');
Route::get('json/positions', [PositionController::class, 'jsons']) -> name('positions.json');
Route::post('json/position/get_json', [PositionController::class, 'get_json']) -> name('position.get_json');

Route::get('json/post/{id}', [PostController::class, 'json_id']) -> name('post.json.id');
Route::get('json/posts', [PostController::class, 'jsons']) -> name('posts.json');
Route::post('json/post/get_json', [PostController::class, 'get_json']) -> name('post.get_json');

Route::get('json/comment/{id}', [CommentController::class, 'json_id']) -> name('comment.json.id');
Route::get('json/comments', [CommentController::class, 'jsons']) -> name('comments.json');
Route::post('json/comment/get_json', [CommentController::class, 'get_json']) -> name('comment.get_json');
