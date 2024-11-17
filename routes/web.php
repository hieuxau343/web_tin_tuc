<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('category', CategoryController::class);

Route::resource('dashboard', DashboardController::class);

Route::resource('account', AccountController::class);

Route::resource('advertisement', AdvertisementController::class);

Route::get("admin", [AuthController::class, 'index'])->name('auth.admin');
Route::post("login", [AuthController::class, 'login'])->name('auth.login');


