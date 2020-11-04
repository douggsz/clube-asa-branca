<?php

namespace App\Http\Controllers;


use App\Endereco;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $lista = Endereco::all();
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

    public function show($idSocio)
    {
        $endereco = Endereco::all()->where('socio_id', $idSocio);
        return json_encode($endereco);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $atualizarEndereco = Endereco::all()->find($id);
        $atualizarEndereco->rua = strtoupper($request->rua);
        $atualizarEndereco->numero = strtoupper($request->numero);
        $atualizarEndereco->bairro = strtoupper($request->bairro);
        $atualizarEndereco->cidade = strtoupper($request->cidade);
        $atualizarEndereco->uf = strtoupper($request->uf);
        $atualizarEndereco->cep = strtoupper($request->cep);
        $atualizarEndereco->mail = strtoupper($request->mail);
        $atualizarEndereco->save();
        return redirect('/socios/' . $atualizarEndereco->socio_id);
    }

    public function destroy($id)
    {
        //
    }
}
