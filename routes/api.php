<?php

use Illuminate\Support\Facades\Route;

Route::resource('socios', 'SocioController');
Route::resource('enderecos','AddressController');
Route::resource('registros', 'RegistroController');
Route::resource('anuidade2020','Anuidade2020Controller');
Route::resource('anuidade2021','Anuidade2021Controller');
Route::resource('presencas', 'PresencasController');
Route::resource('investimentos', 'InvestimentoController');
