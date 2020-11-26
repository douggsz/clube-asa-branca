<?php

namespace App\Http\Controllers;

use App\Copa;
use App\Insumo;
use App\Investimento;
use App\Pagamento;
use App\Passada;
use App\Presenca;
use App\Registro;
use App\Sede;
use App\Socio;
use App\Stand;
use App\Trap;
use Illuminate\Support\Facades\DB;

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

        return view('presencas', compact('socios', 'presencas', 'copas', 'insumos', 'presencaUnica'));

    }

    public function investimentos()
    {
        $investimentos = Investimento::all();

        $traps = Trap::all();
        $stands = Stand::all();
        $sedes = Sede::all();

        //$totalSede = 0;
        //$totalStand = 0;
        //$totalTrap = 0;

        //foreach ($traps as $investimento){$totalTrap += $investimento->valor;}
        //foreach ($sedes as $investimento){$totalSede += $investimento->valor;}
        //foreach ($stands as $investimento){$totalStand += $investimento->valor;}

        return view('investinentos', compact('investimentos', 'traps', 'sedes', 'stands'));

    }

    public function recebidos(){
        $recebidos = Pagamento::all();
        $total = 0;

        foreach ($recebidos as $recebido){
            $total += $recebido->valor;
        }

        return view('recebidos', compact('recebidos', 'total'));
    }

    public function login(){
        return view('login');
    }
}
