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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mobile/assets/', 'Api\Md\ApiAssetController@asset');

Route::get('/kategori/list', 'Api\Md\KategoriController@list');

Route::get('/asset/list', 'Api\Md\ApiAssetController@list');

Route::get('/logHistory', 'Api\History\LogHistoryController@list');