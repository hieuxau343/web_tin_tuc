<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;



Route::get("admin", [AuthController::class, 'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::post("login", [AuthController::class, 'login'])->name('auth.login');



Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::prefix('admin')->middleware(AuthenticateMiddleware::class)->group(function () {
    // Trang dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route của category
    Route::resource('category', CategoryController::class);

    // Route của account
    Route::resource('user', UserController::class);

    // Route của advertisement
    Route::resource('advertisement', AdvertisementController::class);

    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');


    // Route của post
    Route::resource('post', PostController::class);
});
