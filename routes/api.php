<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// Работа с постами

Route::get('/posts', [PostController::class, 'getAllPosts']); //Получить все посты

Route::get('/posts/{id}', [PostController::class, 'getOnePost']) //Получить один пост по id
    ->whereNumber('id');

Route::get('/posts/find/{title}', [PostController::class, 'findPosts']); // Найти пост по названию

Route::get('/posts/category/{category_id}/page/{page?}', [PostController::class, 'getPostsFromCategory']) //Получить страницу постов определенной категории
    ->whereNumber('category_id')
    ->whereNumber('page');

Route::get('/posts/category/{category_id}', [PostController::class, 'getPostsFromCategory'])//Получить все посты определенной категории
    ->whereNumber('category_id');

Route::post('/posts/create', [PostController::class, 'createPost']);//Создать пост

Route::delete('/posts/delete/{id}', [PostController::class, 'deletePost'])//Удалить пост
    ->whereNumber('id');

Route::post('/posts/update/{id}', [PostController::class, 'updatePost'])//Изменить пост
    ->whereNumber('id');

//Работа с категориями

Route::get('/categories', [CategoryController::class, 'getAllCategories']); //Получить все категории

Route::post('/categories/create', [CategoryController::class, 'createCategory']); //Создать категорию

Route::delete('/categories/delete', [CategoryController::class, 'deleteCategory']); //Создать категорию

Route::post('/categories/update', [CategoryController::class, 'updateCategory']); //Обновить категорию

//Работа с комментариями

Route::get('/comments/post/{id}', [CommentController::class, 'getCommentOfPost'])
    ->whereNumber('id');

Route::post('/comments/create', [CommentController::class, 'createComment']);

Route::delete('/comments/delete', [CommentController::class, 'deleteComment']);

//Работа с пользователем

Route::post('/user/register', [UserController::class, 'register']);

Route::post('/user/authorize', [UserController::class, 'authorization']);

Route::post('/user/update', [UserController::class, 'updateUser']);