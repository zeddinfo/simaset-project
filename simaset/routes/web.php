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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/category','CategoryController');

Route::get('/', 'Auth\LoginController@index');
Route::post('/auth', 'Auth\LoginController@auth');
Route::get('auth/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['authLogin']], function () {
    Route::get('/md/kategori', 'Md\KategoriController@index');
    Route::get('/dashboard', 'Home\DashboardController@index');
    Route::group(['prefix' => 'md/asset'], function () {
        Route::get('/index', 'Md\AssetController@index');
        Route::get('/create', 'Md\AssetController@create');
        Route::post('/create', 'Md\AssetController@create');
        Route::get('/update/{id}', 'Md\AssetController@update');
        Route::post('/update/{id}', 'Md\AssetController@update');
        Route::post('/delete/{id}', 'Md\AssetController@delete');
    });
});