<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    private function Regras(){
        return [
          'nome' => 'required|min:2|max:100',
          'n_associado' => 'required|unique:socios'
        ];
    }
    public function index()
    {
        $lista = Socio::all();
        return json_encode($lista);
    }
    public function lista(){
        $lista = Socio::all();
        return compact('lista');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate(
            $this->Regras()
        );

        $novoSocio = new Socio();
        $novoSocio->nome = $request->nome;
        $novoSocio->n_associado = $request->n_associado;
        $novoSocio->save();
        return redirect()->action('PagesController@paginainicial');
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
