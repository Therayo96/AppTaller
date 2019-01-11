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

Route::group(['prefix' => 'werehouse','middleware' => ['auth']], function (){
    \App\Clases\Configuration::routes('werehouse', 1);
});

Route::group(['prefix' => 'sale','middleware' => ['auth']], function (){
    \App\Clases\Configuration::routes('sale', 1);
});
