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



//Aquí se le pasa el prefijo y si está activa la ruta, esto se puede hacer de otra manera para no estar agregando el grupo manualmente


//Solo con esas dos cosas, las rutas ya se estan creando desde base de datos, ya para generar el menú de la derecha, esdesde appserviceprovider