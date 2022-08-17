<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('todo', [TodoController::class,'index']);
Route::get('image', [TodoController::class,'index']);
Route::middleware('auth:sanctum')->post('todo/store', [TodoController::class,'store']);
Route::middleware('auth:sanctum')->post('image/store', [ImageController::class,'store'])->name('imageUpload');