<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('socios', 'SocioController');
Route::resource('enderecos','AddressController');
Route::resource('registros', 'RegistroController');
Route::resource('anuidades','AnuidadeController');
