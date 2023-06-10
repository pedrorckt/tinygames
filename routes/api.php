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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/games', 'App\Http\Controllers\GameController@index');
Route::get('/games/{game}', 'App\Http\Controllers\GameController@show');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index');
Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show');

Route::get('/platforms', 'App\Http\Controllers\PlatformController@index');
Route::get('/platforms/{platform}', 'App\Http\Controllers\PlatformController@show');