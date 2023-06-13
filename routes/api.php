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

Route::get('/games', 'App\Http\Controllers\GameController@index');
Route::get('/games/search', 'App\Http\Controllers\GameController@search');
Route::get('/games/{game}', 'App\Http\Controllers\GameController@show');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index');
Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show');

Route::get('/platforms', 'App\Http\Controllers\PlatformController@index');
Route::get('/platforms/{platform}', 'App\Http\Controllers\PlatformController@show');

Route::get('/twitch/top', 'App\Http\Controllers\GameController@twitchTopGames');

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/me', 'App\Http\Controllers\CollectionController@index');

    Route::post('/games', 'App\Http\Controllers\GameController@store');
    Route::put('/games/{game}', 'App\Http\Controllers\GameController@update');
    Route::delete('/games/{game}', 'App\Http\Controllers\GameController@destroy');

    Route::get('/collections', 'App\Http\Controllers\CollectionController@index');
    Route::post('/collections', 'App\Http\Controllers\CollectionController@store');
    Route::post('/collections/{collection}/add', 'App\Http\Controllers\CollectionController@addGame');
    Route::delete('/collections/{collection}', 'App\Http\Controllers\CollectionController@destroy');
    Route::delete('/collections/{collection}/games/{game}', 'App\Http\Controllers\CollectionController@removeGame');

});
