<?php

namespace App\Http\Controllers;

use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    public function index()
    {
        $lista = Registro::all();
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
        $registro = Registro::all()->where('socio_id', $idSocio);
        return json_encode($registro);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Socio::all()->find($id)->registro()
            ->update([
                'n_cr' => $request->n_cr,
                'data_expedicao' => $request->data_expedicao,
                'data_validade' => $request->data_validade,]);
    }

    public function destroy($id)
    {
        //
    }
}
