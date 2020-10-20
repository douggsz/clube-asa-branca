<?php

use App\Http\Middleware\PassadaMiddleware;
use App\Http\Middleware\PresencaMiddleware;
use App\Pagamento;
use App\Passada;
use App\Presenca;
use App\Socio;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PayMiddleware;

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

Route::get('/', 'PagesController@paginainicial');
Route::get('/socios', 'PagesController@paginaInicial')
    ->name('inicio');
Route::get('/socios/presencas', 'PagesController@presencas')
    ->name('presenca');
Route::get('/socios/{id}', 'SocioController@show');
Route::get('/socios/presencas/excluir/{id}/{idS}', 'PresencasController@destroy');
Route::get('/socios/apagar/{id}', 'SocioController@destroy');
Route::get('/anuidade/{id}/new', 'AnuidadeController@create');
Route::post('/anuidade/{id}/edit', 'AnuidadeController@update');
Route::get('/socios/pagamento/{id}/pago','PayController@pagamento');
Route::get('/socios/pagamento/{id}/excluir','PayController@exclusao');
Route::post('/socios/new', 'SocioController@store');
Route::post('/presencas/new', 'PresencasController@store');
Route::post('/socios/edit/{id}', 'SocioController@update');
Route::post('/contatos/edit/{id}', 'ContactController@update');
Route::post('/enderecos/edit/{id}', 'AddressController@update');
Route::post('/fotos/edit/{id}', 'PhotoController@update');
Route::post('/registros/edit/{id}', 'RegistroController@update');
