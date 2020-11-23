<?php

namespace App\Http\Controllers;

use App\Copa;
use App\Insumo;
use App\Investimento;
use App\Passada;
use App\Presenca;
use App\Registro;
use App\Sede;
use App\Socio;
use App\Stand;
use App\Trap;

class PagesController extends Controller
{
    public function paginaInicial()
    {

        $listaSocios = Socio::all();

        return view('inicio', compact('listaSocios'));

    }

    public function profile($idSocio){

        $socio = Socio::all()->find($idSocio);

        return view('profile', compact('socio'));

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

    public function investimentos(){

        $investimentos = Investimento::all();

        $investimentos = Investimento::with('trap','stand','sede')->get();
        $traps = Trap::all();
        $stands = Stand::all();
        $sedes = Sede::all();

        return view('investinentos', compact('investimentos','traps', 'sedes', 'stands'));

    }

}
