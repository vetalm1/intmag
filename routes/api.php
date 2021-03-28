<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;


Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware(['auth:sanctum', 'cookie'])
    ->group(function () {
        Route::apiResource('carts', CartController::class);

        Route::apiResource('products', ProductController::class);

        Route::apiResource('categories', CategoryController::class);

        Route::get('products/slug/{slug}', [ProductController::class, 'slugShow'])->name('products-slug-get');

        Route::get('tree', [CategoryController::class, 'tree'])->name('category-tree');
    });

Route::name('api.')
    ->middleware(['cookie'])
    ->group(function () {

        Route::post('products/search', [ProductController::class, 'search'])->name('products-search');

    });
