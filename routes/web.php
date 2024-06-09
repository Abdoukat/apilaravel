<?php

use App\Http\Controllers\ApiResourceController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/message', [ApiResourceController::class, 'getMessage']);
Route::get('/message/{id?}', [ApiResourceController::class, 'getMessage']);

// Route::apiResource()

// Route::get('/hello', function () {
//     return response()->json(['value 1'=>'Hello world']);
// });
