<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function paginaInicial(){

        $listaSocios = Socio::all();

        return view('inicio', compact('listaSocios'));

    }
     public function presencas(){

        return view('presencas');

     }
     public function registros(){

        return view('registros');

     }

}
