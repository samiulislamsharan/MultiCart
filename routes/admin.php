<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
Route::get('/delete/{id?}/{table?}', [DashboardController::class, 'delete'])->name('admin.delete');

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
