<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        //
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
        $atualizarContato = Contato::all()->find($id);
        $atualizarContato->n_celular = $request->n_celular;
        $atualizarContato->n_fixo = $request->n_fixo;
        $atualizarContato->save();
        return redirect('/socios/'. $atualizarContato->socio_id);
    }
    public function destroy($id)
    {
        //
    }
}
