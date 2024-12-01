<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
Route::post('/save-profile', [ProfileController::class, 'storeUser'])->name('admin.profile.store');

Route::controller(HomeBannerController::class)->group(function () {
    Route::get('/home-banners', 'index')->name('admin.home-banners.index');
    Route::get('/home-banners/create', 'create')->name('admin.home-banners.create');
    Route::post('/home-banners/store', 'store')->name('admin.home-banners.store');
    Route::get('/home-banners/show/{id}', 'show')->name('admin.home-banners.show');
    Route::get('/home-banners/edit/{id}', 'edit')->name('admin.home-banners.edit');
    Route::post('/home-banners/update/{id}', 'update')->name('admin.home-banners.update');
    Route::get('/home-banners/delete/{id}', 'destroy')->name('admin.home-banners.delete');
});