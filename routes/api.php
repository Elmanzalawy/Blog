<?php

use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CommentController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'V1', 'namespace' => 'Api\V1'], function () {
//     Route::apiResource('posts', PostController::class);
//     Route::apiResource('comment', CommentController::class);
// });




Route::get('dashboard', [PostController::class, 'dashboard'])->middleware(['auth', 'verified']);
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/{posts}/edit', [PostController::class, 'edit']);
Route::get('posts', [PostController::class, 'store']);
Route::get('posts/{posts}', [PostController::class, 'update']);
Route::get('posts/{posts}', [PostController::class,'destroy']);
Route::get('guest', [PostController::class,'guest']);
Route::get('posts/{post}/comments', [CommentController::class,'storeComment']);



