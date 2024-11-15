<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('category', CategoryController::class);

Route::resource('dashboard', DashboardController::class);

Route::resource('account', AccountController::class);

Route::resource('advertisement', AdvertisementController::class);