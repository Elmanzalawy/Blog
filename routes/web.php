<?php
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\ReviewRatingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('guest');
// });









Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::get('/posts/{posts}/edit', [PostController::class,'edit'])->name('posts.edit');


    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::put('/posts/{posts}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{posts}', [PostController::class, 'destroy'])->name('posts.destroy');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'guest'])->name('guest');
Route::get('/posts/{posts}', [PostController::class, 'show'])->name('posts.show');


Route::post('review-store', [ReviewRatingController::class, 'reviewstore' ])->name('review.store');


Route::post('/posts/{post}/comments', [CommentController::class, 'storeComment'])->name('posts.comment.store');
require __DIR__.'/auth.php';

