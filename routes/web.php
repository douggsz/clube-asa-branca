<?php

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

Route::get('/', 'PagesController@paginainicial');
Route::get('/socios', 'PagesController@paginaInicial')->name('inicio');
Route::get('/socios/presencas', 'PagesController@presencas')->name('presenca');
Route::get('/socios/registros', 'PagesController@registros')->name('registro');
Route::get('/socios/{id}', function ($id){
    $socios = new App\Socio();
    $listasocios = $socios::all();
    $socio = $listasocios->find($id);
    if (isset($socio)) {
        return view('profile', compact('socio'));
    } else{
        return view('inicio');
    }
});
Route::post('/socios/{id}', 'SocioController@update');
Route::post('/contatos/{id}','ContactController@update');
Route::post('/enderecos/{id}','AddressController@update');
Route::post('/fotos/{id}','PhotoController@update');
