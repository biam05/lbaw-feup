<?php

use Illuminate\Http\Request;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Content\CommentController;
use App\Http\Controllers\Content\ContentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationsController;

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



Route::post('/vote', [ContentController::class, 'toggleVote']);
Route::post('/follow', [UserController::class, 'follow']);
Route::post('/unfollow', [UserController::class, 'unfollow']);
Route::post('/deleteNotification', [NotificationsController::class, 'delete']);
