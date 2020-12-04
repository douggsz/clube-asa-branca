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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function paginaInicial()
    {
        if (Auth::user()) {
            $listaSocios = Socio::all();
            return view('inicio', compact('listaSocios'));
        } else {
            return redirect()->route('usuario.login');
        }
    }

    public function profile($idSocio)
    {
        if (Auth::user()) {
            $socio = Socio::all()->find($idSocio);
            if (isset($socio)){
                return view('profile', compact('socio'));
            } else {
                return redirect()->route('inicio');
            }
        } else {
            return redirect()->route('usuario.login');
        }
    }

    public function presencas()
    {
        if (Auth::user()) {
            $presencas = Presenca::all();
            $presencaUnica = $presencas->unique('socio_id');
            $socios = Registro::all()
                ->whereNotNull('n_cr');
            $copas = Copa::all();
            $insumos = Insumo::all();
            return view('presencas', compact('socios', 'presencas', 'copas', 'insumos', 'presencaUnica'));
        } else {
            return redirect()->route('usuario.login');
        }
    }

    public function investimentos()
    {
        if (Auth::user()) {
            $investimentos = Investimento::all();
            $traps = Trap::all();
            $stands = Stand::all();
            $sedes = Sede::all();
            return view('investinentos', compact('investimentos', 'traps', 'sedes', 'stands'));
        } else {
            return redirect()->route('usuario.login');
        }
    }

    public function recebidos()
    {
        if (Auth::user()) {
            $recebidos = Pagamento::all();
            $total = 0;
            foreach ($recebidos as $recebido) {
                $total += $recebido->valor;
            }
            return view('recebidos', compact('recebidos', 'total'));
        } else {
            return redirect()->route('usuario.login');
        }

    }

    public function login()
    {
        if (Auth::user()) {
            return redirect()->route('inicio');
        } else {
           return redirect()->route('usuario.login');
        }

    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('usuario.login');
    }

    public function site()
    {
        return view('principal');

    }
}
