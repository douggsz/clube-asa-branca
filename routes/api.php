<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/socios', 'SocioController@index');
Route::get('/endereços', 'AddressController@index');
Route::get('/passadas', 'PassadasController@index');
Route::get('/presencas', 'PresencasController@index');
Route::get('/registros', 'RegistroController@index');
Route::get('/pagamentos', 'PayController@index');
Route::resource('socio', 'SocioController');
