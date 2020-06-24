<?php

namespace App\Http\Controllers;


use App\Endereco;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {

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
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $atualizarEndereco = Endereco::all()->find($id);
        $atualizarEndereco->rua = $request->rua;
        $atualizarEndereco->numero = $request->numero;
        $atualizarEndereco->bairro = $request->bairro;
        $atualizarEndereco->cidade = $request->cidade;
        $atualizarEndereco->uf = $request->uf;
        $atualizarEndereco->cep = $request->cep;
        $atualizarEndereco->mail = $request->mail;
        $atualizarEndereco->save();
        return redirect('/socios/'. $atualizarEndereco->socio_id);
    }
    public function destroy($id)
    {
        //
    }
}
