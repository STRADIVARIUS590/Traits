<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

 

Route::view('viewcreatepost', 'posts.create');
Route::view('viewupdatepost', 'posts.update');

Route::get('posts', [PostController::class, 'index']);
Route::post('post/create', [PostController::class, 'create'])->name('post.add');
Route::get('posts/delete/{model_id}', [PostController::class, 'destroy']);
Route::put('posts/update', [PostController::class, 'update'])->name('post.update');
Route::get('posts/{model_id}', [PostController::class, 'show']);