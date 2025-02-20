<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\HomePageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/register', [AuthController::class, 'registerUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/show', function (Request $request) {
        return $request->user();
    });
    Route::post('/user/update', [AuthController::class, 'updateUser']);
    Route::post('/auth/logout', [AuthController::class, 'logoutUser']);
});

// Frontend data
Route::controller(HomePageController::class)->group(function () {
    Route::get('/home', 'index');
    Route::get('/header_categories', 'categories');
    Route::post('/category', 'categoryIndex');
    Route::post('/get_user_data', 'getUserData');
    Route::post('/get_cart_data', 'getCartData');
    Route::post('/add_to_cart', 'addToCart');
    Route::post('/remove_from_cart', 'removeFromCart');
});