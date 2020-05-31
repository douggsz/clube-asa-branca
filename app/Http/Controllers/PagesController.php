<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function paginaInicial(){
        $socios = Socio::all();
        return view('inicio', compact('socios'));
    }
    public function novoSocio(){
        $socio = new Socio();
        $socio->nome = 'Novo socio';
        return view('profile', compact('socio'));
    }
}
