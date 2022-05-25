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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\File', 'prefix' => 'file'], function () {
    Route::get('/', 'IndexController')->name('api.file.index');
    Route::post('/store', 'StoreController')->name('api.file.store');
    Route::get('/{filename}', 'ShowController')->name('api.file.show');
});
