<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    private function Rules()
    {
        return [
            'n_cr' => 'required|unique:registros',
            'data_expedicao' => 'required',
            'data_validade' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'data_expedicao.required' => 'Data de expedição é obrigatória',
            'data_validade.required' => 'Data de validade é obrigatória',
            'n_cr.required' => 'Informar CR',
            'n_cr.unique' => 'CR já cadastrado',
        ];
    }

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

        $request->validate($this->Rules(), $this->Messages());

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
