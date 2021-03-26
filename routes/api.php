<?php

use App\Http\Controllers\Api\ChannelController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\VideosController;
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
Route::group(['prefix' => 'channel'], function () {
    Route::get('/{id}', [ChannelController::class, 'index']);
});
Route::group(['prefix' => 'video'], function () {
    Route::post('',[VideosController::class, 'create']);
    Route::get('/comment/{id}', [VideosController::class, 'comment']);
    Route::get('/{id}', [VideosController::class, 'index']);
});
Route::group(['prefix' => 'comment'], function () {
    Route::get('/export', [CommentController::class, 'exportComment']);
    
    Route::get('/test', [CommentController::class, 'test']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
