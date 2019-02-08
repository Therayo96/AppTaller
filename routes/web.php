<?php

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'system','middleware' => ['auth']], function (){
    \App\Clases\Configuration::routes('system', 1);
    
});

Route::group(['prefix' => 'Admin','middleware' => ['auth']], function (){
    \App\Clases\Configuration::routes('Admin', 1);
});

Route::group(['prefix' => 'Roles','middleware' => ['auth']], function (){
    \App\Clases\Configuration::routes('roles', 1);
});

Route::group(['prefix' => 'Permisos','middleware' => ['auth']], function (){
    \App\Clases\Configuration::routes('permisos', 1);
});


