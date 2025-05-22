<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\JWTAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::post('/register', [JWTAuthController::class, 'register']);
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostsController::class, 'index']);
        Route::post('/', [PostsController::class, 'store']);
        Route::get('{id}', [PostsController::class, 'show']);
        Route::put('{id}', [PostsController::class, 'update']);
        Route::delete('{id}', [PostsController::class, 'destroy']);
    });
    Route::prefix('comments')->group(function () {
        Route::post('/', [CommentsController::class, 'store']);
        Route::delete('{id}', [CommentsController::class, 'destroy']);
    });
    Route::prefix('likes')->group(function () {
        Route::post('/', [likesController::class, 'store']);
        Route::delete('{id}', [likesController::class, 'destroy']);
    });
    Route::prefix('messages')->group(function () {
        Route::post('/', [MessagesController::class, 'store']);
        Route::get('{id}', [MessagesController::class, 'show']); //lihat detail message berdasartan id
        Route::get('getMessages/{user_id}', [MessagesController::class, 'getMessages']); // lihat pesan masuk berdasarkan user id
        Route::delete('{id}', [MessagesController::class, 'destroy']);
    });
});