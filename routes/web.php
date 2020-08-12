<?php

use App\Pagamento;
use App\Passada;
use App\Presenca;
use App\Socio;
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
Route::get('/socios/passadas', 'PagesController@passadas')->name('passadas');
Route::get('/socios/{id}', function ($id) {
    $listaSocio = Socio::all();
    $socio = $listaSocio->find($id);
    $listaPassada = Passada::all();
    $passadas = $listaPassada->where('socio_id', $id);
    $listaPresenca = Presenca::all();
    $presenca = $listaPresenca->where('socio_id', $id);
    $listaPagamento = Pagamento::all()->where('socio_id',$id);
    $pagamentos = $listaPagamento->where('pago', false);
    $quitados = $listaPagamento->where('pago', true);
    if (isset($socio)) {
        return view('profile', compact('socio', 'passadas', 'presenca', 'pagamentos', 'quitados'));
    } else {
        return view('inicio');
    }
});
Route::get('/socios/presencas/excluir/{id}', 'PresencasController@destroy');
Route::get('/socios/apagar/{id}', 'SocioController@destroy');
Route::get('/socios/pagamento/{id}/pago','PayController@pagamento');
Route::post('/socio/novo', 'SocioController@store');
Route::post('/presencas', 'PresencasController@store');
Route::post('/passadas', 'PassadasController@store');
Route::post('/socios/{id}', 'SocioController@update');
Route::post('/contatos/{id}', 'ContactController@update');
Route::post('/enderecos/{id}', 'AddressController@update');
Route::post('/fotos/{id}', 'PhotoController@update');
Route::post('/registros/{id}', 'RegistroController@update');
