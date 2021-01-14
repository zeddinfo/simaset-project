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



Route::get('/kategori/list', 'Api\Md\KategoriController@list');

Route::get('/asset/list', 'Api\Md\ApiAssetController@list');
Route::get('/asset/logg', 'Api\Md\ApiAssetController@logg');
Route::get('/logHistory', 'Api\History\LogHistoryController@list');
Route::get('/user/list', 'Api\Md\ApiUserController@list');
Route::get('/user/delete', 'Api\Md\ApiUserController@delete');
Route::get('/get-user/{id}', 'Api\Md\ApiuserController@view');
Route::post('/mobile/register', 'Api\Mobile\ScafoldController@register');
Route::post('/mobile/login', 'Api\Mobile\ScafoldController@login');
Route::post('/mobile/logout', 'Api\Mobile\ScafoldController@logout');
Route::get('/mobile/assets/', 'Api\Mobile\AssetController@getAll');
Route::get('/mobile/asset/{id}', 'Api\Mobile\AssetController@getById');
Route::get('/listLog/list', 'Api\Md\ApiAssetController@listLog');

