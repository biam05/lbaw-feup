<?php

use app\Http\Controllers\NewsController;
use app\Http\Controllers\HomepageController;
use app\Http\Controllers\ItemController;
use app\Http\Controllers\UserController;
use app\Http\Controllers\Auth\LoginController;
use app\Http\Controllers\Auth\RegisterController;

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


// Home
Route::get('/', [HomepageController::class, 'show']);

// Users
Route::get('/users/{username}/', [UserController::class, 'show']);

//News
Route::get('/news/', [NewsController::class, 'show']);
