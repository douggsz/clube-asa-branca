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

Route::get('/', 'PagesController@index');
Route::get('/socios', function (){
    return view('inicio'); })->name('inicio');
Route::get('/socio/{id}', function ($id){
    $id; //usar com modelo
});
Route::view('/teste','profile')->name('teste');
