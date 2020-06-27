<?php

namespace App\Http\Controllers;

use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function paginaInicial(){

        $listaSocios = Socio::all();

        return view('inicio', compact('listaSocios'));

    }
     public function presencas(){

        $socios = Registro::all()
            ->where('n_cr', '<>','0')
            ->whereNotNull('n_cr');

        return view('presencas', compact('socios'));

     }

}
