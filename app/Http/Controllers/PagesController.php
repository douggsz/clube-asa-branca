<?php

namespace App\Http\Controllers;

use App\Copa;
use App\Insumo;
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

        $presencaUnica = $presencas->unique('socio_id');

        $socios = Registro::all()
            ->whereNotNull('n_cr');

        $copas = Copa::all();
        $insumos = Insumo::all();

        return view('presencas', compact('socios', 'presencas', 'copas' ,'insumos','presencaUnica'));

    }

}
