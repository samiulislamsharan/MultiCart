<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return redirect()->route('admin.dashboard.index');
});

Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/create-admin', 'createAdmin');
    Route::get('/create-user', 'createUser');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/sign-in', 'index')->name('login.index');
    Route::post('/login', 'loginUser')->name('loginPost');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/api_docs', function () {
    return view('api-docs');
});