<?php

use App\Http\Controllers\Api\PostController;
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
/* 

Route::post('posts/create', [PostController::class, 'index']);
 */

 Route::get('posts', [PostController::class, 'overriden_index']);
 Route::post('posts', [PostController::class, 'create']);
 Route::delete('posts/delete/{model_id}', [PostController::class, 'destroy']);
 Route::put('posts/update', [PostController::class, 'update']);
 Route::get('posts/{model_id}', [PostController::class, 'show']);
