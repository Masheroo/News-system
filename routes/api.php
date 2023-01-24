<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostController::class, 'getAllPosts']);

Route::get('/post/{id}', [PostController::class, 'getOnePost'])
    ->whereNumber('id');

Route::get('/category/{category_id}/page/{page?}', [PostController::class, 'getAllPostsFromCategory'])
    ->whereNumber('category_id')
    ->whereNumber('page');

Route::get('/category/{category_id}', [PostController::class, 'getAllPostsFromCategory'])
    ->whereNumber('category_id');

Route::post('/create/post', [PostController::class, 'createPost']);

Route::delete('/delete/post/{id}', [PostController::class, 'deletePost'])
    ->whereNumber('id');

Route::post('/update/post/{id}', [PostController::class, 'updatePost'])
    ->whereNumber('id');