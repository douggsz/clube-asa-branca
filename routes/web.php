<?php

use App\Passada;
use Illuminate\Support\Facades\Route;

Route::get('/controle/logout', 'PagesController@logout')->name('usuario.logout');
Route::get('/', 'PagesController@site')->name('site');
Route::get('/controle/socios', 'PagesController@paginaInicial')->name('inicio');
Route::get('/controle/socios/presencas', 'PagesController@presencas')->name('presenca');
Route::get('/controle/investimentos', 'PagesController@investimentos')->name('investimentos');
Route::get('/controle/recebidos', 'PagesController@recebidos')->name('recebidos');
Route::get('/socios/{id}', 'PagesController@profile');
Route::get('/socios/presencas/excluir/{id}/{idS}', 'PresencasController@destroy');
Route::get('/investimentos/apagar/{id}', 'InvestimentoController@destroy');
Route::get('/controle/acesso', 'UserController@index')->name('usuario.login');
Route::post('/fotos/edit/{id}', 'PhotoController@update');
Route::post('/controle/acesso', 'UserController@verificacaoLogin')->name('usuario.login.submit');
Auth::routes();
