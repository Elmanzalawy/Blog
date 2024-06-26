<?php

use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\ProfileController;


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

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [PostController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('posts', [PostController::class, 'index'])->name('posts.index');



    Route::delete('posts/{posts}', [PostController::class, 'destroy'])->name('posts.destroy');


    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'guest'])->name('guest');
Route::get('/posts/{posts}', [PostController::class, 'show'])->name('posts.show');




require __DIR__.'/auth.php';
























