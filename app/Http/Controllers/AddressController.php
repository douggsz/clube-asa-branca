<?php

namespace App\Http\Controllers;


use App\Endereco;
use App\Socio;
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
        Socio::all()->find($id)->endereco()
            ->update([
                'rua' => strtoupper($request->rua),
                'numero' => strtoupper($request->numero),
                'bairro' => strtoupper($request->bairro),
                'cidade' => strtoupper($request->cidade),
                'uf' => strtoupper($request->uf),
                'cep' => strtoupper($request->cep),
                'mail' => strtoupper($request->mail),]);
    }

    public function destroy($id)
    {
        //
    }
}
