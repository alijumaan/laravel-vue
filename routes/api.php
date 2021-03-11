<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});


Route::group(['middleware' => ['auth:sanctum']], function () {

});

Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class);
Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class)
    ->only('index', 'store');

Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
