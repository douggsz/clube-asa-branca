<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{

    public function index()
    {
        //
    }
    public function lista(){
        $lista = Socio::all();
        return compact('lista');
    }
    public function listaJSON(){
        $lista = Socio::all();
        return json_encode($lista);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
