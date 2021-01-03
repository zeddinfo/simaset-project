<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home2', function () {
    return view('home2');
});

Auth::routes();

Route::get('api/chart', 'Api\Md\ApiAssetController@chart');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/category','CategoryController');

Route::get('/', 'Auth\LoginController@index');
Route::post('/auth', 'Auth\LoginController@auth');
Route::get('auth/logout', 'Auth\LoginController@logout');


Route::group(['middleware' => ['authLogin']], function () {
    Route::get('/view/attachment/{url}', 'AttachmentController@index');
    Route::get('/md/kategori', 'Md\KategoriController@index');
    Route::get('/dashboard', 'Home\DashboardController@index');
    Route::group(['prefix' => 'md/asset'], function () {
        Route::get('/index', 'Md\AssetController@index');
        Route::get('/create', 'Md\AssetController@create');
        Route::get('/laravel_google_chart', 'Md\AssetController@chart');
        Route::post('/create', 'Md\AssetController@create');
        Route::get('/update/{id}', 'Md\AssetController@update');
        Route::post('/update/{id}', 'Md\AssetController@update');
        Route::post('/delete/{id}', 'Md\AssetController@delete');
        Route::get('/detail/{id}', 'Md\AssetController@detail');
        Route::post('/detail/{id}', 'Md\AssetController@detail');
        Route::post('/simpanKeterangan/{id}', 'Md\AssetController@simpan');
        Route::get('/export-pdf/{id}', 'Md\AssetController@export');
    });

    Route::group(['prefix' => 'setting/role'], function () {
        Route::get('/index', 'Setting\RoleController@index');
        Route::get('/create', 'Setting\RoleController@create');
        Route::post('/create', 'Setting\RoleController@create');
        Route::get('/view/{id}', 'Setting\RoleController@view');
        Route::get('/listRole', 'Setting\RoleController@listRole');
        Route::get('/update/{id}', 'Setting\RoleController@update');
        Route::post('/update/{id}', 'Setting\RoleController@update');
    });

    Route::group(['prefix' => 'setting/user'], function () {
        Route::get('/index', 'Setting\UserController@index');
        Route::post('/create', 'Setting\UserController@create');
        Route::post('/update/{id}', 'Setting\UserController@update');
    });
});