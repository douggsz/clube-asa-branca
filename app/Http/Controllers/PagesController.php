<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){ return view('profile')->with('titulo', 'Asa Branca'); }
    public function carregaPerfil($id){

    }
}
