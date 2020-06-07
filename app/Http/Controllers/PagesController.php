<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function paginaInicial(){

        $socios = Socio::all();

        return view('inicio');//, compact('socios'))

    }
     public function presencas(){

        return view('presencas');

     }
     public function registros(){

        return view('registros');

     }

}
