<?php

use App\Passada;
use Illuminate\Support\Facades\Route;

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


Route::get('/controle/socios', 'PagesController@paginaInicial')->name('inicio');
Route::get('/controle/socios/presencas', 'PagesController@presencas')->name('presenca');
Route::get('/controle/investimentos', 'PagesController@investimentos')->name('investimentos');
Route::get('/controle/recebidos', 'PagesController@recebidos')->name('recebidos');
Route::get('/controle/acesso', 'PagesController@login')->name('login');
Route::get('/socios/{id}', 'PagesController@profile')->name('usuario.login');
Route::get('/socios/presencas/excluir/{id}/{idS}', 'PresencasController@destroy');
Route::get('/investimentos/apagar/{id}', 'InvestimentoController@destroy');
Route::post('/fotos/edit/{id}', 'PhotoController@update');
