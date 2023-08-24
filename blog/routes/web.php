<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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
Route::get('/',[HomeController::class, 'index']);
Route::get('/more-post',[HomeController::class, 'loadMore']);
Route::prefix('/blogs')->group(function(){
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{titleName}', [PostController::class, 'show']);
    Route::get('/category/{categoryName}', [PostController::class, 'getPostByCategory']);
    Route::get('/tag/{tagName}', [PostController::class, 'getPostByTag']);
    Route::post('/{titleName}', [PostController::class, 'postComment'])->name('post.comment');
    Route::post('/comment/reply', [PostController::class, 'postReply'])->name('post.reply');
    Route::post('/post/like', [PostController::class, 'postLike'])->name('post.like');
});

