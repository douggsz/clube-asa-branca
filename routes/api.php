<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('socios','SocioController');
Route::resource('pagamentos','PayController');
Route::resource('presencas','PresencasController');
Route::resource('contatos', 'ContactController');
Route::resource('enderecos','AddressController');
