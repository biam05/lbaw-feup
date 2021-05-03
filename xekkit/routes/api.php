<?php

use Illuminate\Http\Request;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Content\CommentController;
use App\Http\Controllers\Content\ContentController;

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

Route::middleware('auth:api')->get('/user', [LoginController::class, 'getUser']);

Route::get('load-posts-search', [SearchController::class, 'loadPostsSearch']);

Route::get('load-users-search', [SearchController::class, 'loadUsersSearch']);

// Route::get('load-posts', [SearchController::class, 'loadPosts']);

// Route::get('load-users', [SearchController::class, 'loadUsers']);

// Route::get('load-comments', [CommentController::class, 'loadComments']);

Route::post('vote', [ContentController::class, 'makeVote']);
