<?php

namespace App\Http\Controllers;

use App\Passada;
use App\Presenca;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function paginaInicial()
    {

        $listaSocios = Socio::all();

        return view('inicio', compact('listaSocios'));

    }

    public function presencas()
    {

        $presencas = Presenca::all();

        $socios = Registro::all()
            ->whereNotNull('n_cr');

        return view('presencas', compact('socios', 'presencas'));

    }

    public function passadas()
    {
        $passadas = Passada::all();

        $socios = Registro::all()
            ->whereNotNull('n_cr');

        return view('passadas', compact('socios', 'passadas'));
    }

}
