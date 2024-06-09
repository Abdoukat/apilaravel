<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//User
Route::post('/users', [UserController::class, 'createUser']);

//Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    //Category
    Route::controller(CategoryController::class)->prefix('/categories')->group(function () {
        Route::post('', 'createCategory');
        Route::get('','index');
        Route::get('/{id}/products', 'getProductsByCategory');
        Route::delete('/{id}', 'destroy');
    });

    //Product
    Route::controller(ProductController::class)->prefix('/products')->group(function () {
        Route::post('', 'createProduct');
        Route::get('','index')->middleware('role:SUPER_ADMIN;ADMIN;USER');
        Route::get('/{id}','show');
        Route::delete('/{id}', 'destroy');
    });
});
