<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;

use App\Http\Controllers\Client\ClientPostController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ImageController;

use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\SearchController;

// Route để hiển thị form đăng nhập
Route::get('login', [AuthController::class, 'index'])->name('auth.login');

// Route để xử lý đăng nhập
Route::post('login', [AuthController::class, 'login'])->name('auth.login.submit');

// Route để hiển thị form đăng ký
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');

// Route để xử lý đăng ký
Route::post('register', [AuthController::class, 'register'])->name('auth.register.submit');

Route::get('post/{slug}.html', [ClientPostController::class, 'show'])->name('client-post.show');

Route::get('category/{slug}.html', [ClientCategoryController::class, 'show'])->name('client-category.show');


Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Route Admin
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

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Route::get('/search', [SearchController::class, 'index'])->name('search');
