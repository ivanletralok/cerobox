<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' =>['auth.jwt'], 'prefix' => ''], function () {
    Route::get('/clientes', 'ClienteController@index');
    Route::post('/cliente/guardar', 'ClienteController@store');
    Route::put('/cliente/{id}', 'ClienteController@update');
    Route::delete('/cliente/{id}','ClienteController@destroy');
    Route::get('/cliente/{id}', 'ClienteController@show');
    Route::post('/servicio/guardar', 'ServicioController@store');

});

Route::get('/servicios/{id}', 'ServicioController@show');


Route::post('/usuario/registrar','AuthController@register');
Route::post('/login', 'AuthController@login');

Route::group(['middleware' =>['auth.jwt'], 'prefix' => ''], function () {

    Route::get('/logout', 'AuthController@logout');


});






