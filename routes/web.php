<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);
Route::resource('category', CategoryController::class);


Route::resource('account', AccountController::class);

Route::resource('advertisement', AdvertisementController::class);

Route::get("admin", [AuthController::class, 'index'])->name('auth.admin')->middleware(LoginMiddleware::class); // Thêm middleware 'guest' để chỉ cho phép người dùng chưa đăng nhập truy cập trang này.
Route::post("login", [AuthController::class, 'login'])->name('auth.login');

Route::resource('post', PostController::class);

Route::post('upload_image', [PostController::class, 'uploadImage'])->name('upload');

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

