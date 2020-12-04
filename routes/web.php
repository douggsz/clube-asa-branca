<?php

use App\Passada;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@site')->name('site');
Route::get('/controle/logout', 'PagesController@logout')->name('usuario.logout');
Route::get('/controle/socios', 'PagesController@paginaInicial')->name('inicio');
Route::get('/controle/socios/presencas', 'PagesController@presencas')->name('presenca');
Route::get('/controle/investimentos', 'PagesController@investimentos')->name('investimentos');
Route::get('/controle/recebidos', 'PagesController@recebidos')->name('recebidos');
Route::get('/controle/socios/{id}', 'PagesController@profile')->name('socio.profile');
Route::get('/controle/socios/presencas/excluir/{id}/{idS}', 'PresencasController@destroy');
Route::get('/controle/investimentos/apagar/{id}', 'InvestimentoController@destroy');
Route::get('/controle/acesso', 'UserController@index')->name('usuario.login');
Route::post('/controle/fotos/edit/{id}', 'PhotoController@update');
Route::post('/controle/acesso', 'UserController@verificacaoLogin')->name('usuario.login.submit');

Auth::routes();
