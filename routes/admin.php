<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
Route::post('/save-profile', [ProfileController::class, 'storeUser'])->name('admin.profile.store');