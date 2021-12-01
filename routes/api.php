<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Route::prefix('user')->group(function (){
//    Route::post('login',[\App\Http\Controllers\Api\Auth\LoginController::class,'login']);
//    Route::get('all',[\App\Http\Controllers\Api\UserController::class,'all']);

//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('authors',\App\Http\Controllers\Api\AuthorsController::class);
Route::apiResource('publishers',\App\Http\Controllers\Api\PublishersController::class);
Route::apiResource('books',\App\Http\Controllers\Api\BooksController::class);
