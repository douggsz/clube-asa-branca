<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
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
        $atualizaRegistro = Registro::all()->find($id);

        $atualizaRegistro->n_cr = $request->n_cr;
        $atualizaRegistro->data_expedicao = $request->data_expedicao;
        $atualizaRegistro->data_validade = $request->data_validade;

        $atualizaRegistro->save();

        return redirect('/socios/' . $atualizaRegistro->socio_id);

    }

    public function destroy($id)
    {
        //
    }
}
