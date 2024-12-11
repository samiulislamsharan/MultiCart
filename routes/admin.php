<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SizeController;
use Illuminate\Support\Facades\Route;


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard.index');
    Route::get('/delete/{id?}/{table?}', 'delete')->name('admin.delete');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
Route::post('/save-profile', [ProfileController::class, 'storeUser'])->name('admin.profile.store');

Route::controller(HomeBannerController::class)->group(function () {
    Route::get('/home-banners', 'index')->name('admin.home-banners.index');
    Route::post('/home-banners/store', 'store')->name('admin.home-banners.store');
});

Route::controller(SizeController::class)->group(function () {
    Route::get('/sizes', 'index')->name('admin.sizes.index');
    Route::post('/sizes/store', 'store')->name('admin.sizes.store');
});

Route::controller(ColorController::class)->group(function () {
    Route::get('/colors', 'index')->name('admin.colors.index');
    Route::post('/colors/store', 'store')->name('admin.colors.store');
});