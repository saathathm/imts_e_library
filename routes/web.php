<?php

use App\Http\Controllers\AdminAuthorsController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCommentsController;
use App\Http\Controllers\AdminHome;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminRequestsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\User\UserBooksController;
use App\Http\Controllers\User\UserCategoriesController;
use App\Http\Controllers\User\UserCommentsController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;
use App\Http\Controllers\User\UserRequestsController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'index');

// --- grouping same common url ---
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHome::class, 'index'])->middleware('admin.auth');
    Route::resource('register', AdminRegisterController::class);
    Route::resource('login', AdminLoginController::class);
    Route::resource('home', AdminHome::class)->middleware('admin.auth');
    Route::resource('users', AdminUsersController::class)->middleware('admin.auth');
    Route::resource('categories', AdminCategoriesController::class)->middleware('admin.auth');
    Route::resource('authors', AdminAuthorsController::class)->middleware('admin.auth');
    Route::resource('books', AdminBookController::class)->middleware('admin.auth');
    Route::resource('requests', AdminRequestsController::class)->middleware('admin.auth');
    Route::resource('comments', AdminCommentsController::class)->middleware('admin.auth');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserHomeController::class, 'index'])->middleware('user.auth');
    Route::resource('home', UserHomeController::class)->middleware('user.auth');
    Route::resource('register', UserRegisterController::class);
    Route::resource('login', UserLoginController::class);
    Route::resource('categories', UserCategoriesController::class)->middleware('user.auth');
    Route::resource('comments', UserCommentsController::class)->middleware('user.auth');
    Route::resource('requests', UserRequestsController::class)->middleware('user.auth');
    Route::resource('books', UserBooksController::class)->middleware('user.auth');
});
