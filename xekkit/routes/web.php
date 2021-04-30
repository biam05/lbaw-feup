<?php

use App\Http\Controllers\Content\CommentController;
use App\Http\Controllers\Content\NewsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Authentication
Route::get('/login/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/', [LoginController::class, 'login']);
Route::get('/logout/', [LoginController::class, 'logout'])->name('logout');
Route::get('/register/', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/', [RegisterController::class, 'register']);



// Content
Route::get('/news/{id}/', [NewsController::class, 'show']);
Route::post('/news/create/', [NewsController::class, 'create']);
Route::patch('/news/{id}/', [NewsController::class, 'edit']);
Route::delete('/news/{id}/', [NewsController::class, 'delete']);

Route::post('/comment/create/', [CommentController::class, 'create']);
Route::patch('/comment/', [CommentController::class, 'edit']);
Route::delete('/comment/', [CommentController::class, 'delete']);


// Home
Route::get('/', [HomepageController::class, 'show'])->name('home');

// Search
Route::get('/search/', [SearchController::class, 'show']);


Route::get('/clear-all-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    echo "Cleared all caches successfully.";
});
