<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TaxController;
use Illuminate\Support\Facades\Route;


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard.index');
    Route::get('/delete/{id?}/{table?}', 'delete')->name('admin.delete');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
Route::post('/save-profile', [ProfileController::class, 'storeUser'])->name('admin.profile.store');

Route::prefix('home-banners')->controller(HomeBannerController::class)->group(function () {
    Route::get('/', 'index')->name('admin.home-banners.index');
    Route::post('/store', 'store')->name('admin.home-banners.store');
});

Route::prefix('sizes')->controller(SizeController::class)->group(function () {
    Route::get('/', 'index')->name('admin.sizes.index');
    Route::post('/store', 'store')->name('admin.sizes.store');
});

Route::prefix('colors')->controller(ColorController::class)->group(function () {
    Route::get('/', 'index')->name('admin.colors.index');
    Route::post('/store', 'store')->name('admin.colors.store');
});

Route::controller(AttributeController::class)->group(function () {
    Route::get('/attribute_names', 'indexAttribute')->name('admin.attribute.index');
    Route::post('/attribute/store', 'storeAttribute')->name('admin.attribute.store');

    Route::get('/attribute_values', 'indexAttributeValue')->name('admin.attribute_value.index');
    Route::post('/attribute_value/store', 'storeAttributeValue')->name('admin.attribute_value.store');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('admin.category.index');
    Route::post('/category/store', 'store')->name('admin.category.store');

    Route::get('/category_attribute', 'indexCategoryAttribute')->name('admin.category_attribute.index');
    Route::post('/category_attribute/store', 'storeCategoryAttribute')->name('admin.category_attribute.store');
});

Route::prefix('brands')->controller(BrandController::class)->group(function () {
    Route::get('/', 'index')->name('admin.brands.index');
    Route::post('/store', 'store')->name('admin.brands.store');
});

Route::prefix('taxes')->controller(TaxController::class)->group(function () {
    Route::get('/', 'index')->name('admin.taxes.index');
    Route::post('/store', 'store')->name('admin.taxes.store');
});

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('admin.products.index');
    Route::post('/store', 'store')->name('admin.products.store');
    Route::get('/show/{id?}', 'show')->name('admin.products.show');
    Route::post('/get_attributes', 'getAttributes')->name('admin.products.get_attributes');
    Route::post('/remove_attr', 'removeAttribute')->name('admin.products.remove_attr');
});