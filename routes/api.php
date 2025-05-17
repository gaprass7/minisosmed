<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostsController::class, 'index']);
        Route::post('/', [PostsController::class, 'store']);
    });
});