<?php

namespace App\Http\Controllers;

use App\Presenca;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;
use App\Http\Middleware\PresencaMiddleware;
use Illuminate\Support\Facades\App;

class PresencasController extends Controller
{

    private function Rules()
    {
        return [
            'data' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'data.required' => 'Informar a data'
        ];
    }

    public function index()
    {
        $lista = Presenca::all();
        return json_encode($lista);
    }

    public function listaJSON()
    {
    }

    public function create()
        //
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate($this->Rules(), $this->Messages());

        $novaPresenca = new Presenca();

        $novaPresenca->socio_id = $request->idsocio;
        $novaPresenca->calibre = strtoupper($request->calibre);
        $novaPresenca->tiros = $request->tiros;
        $novaPresenca->data = $request->data;
        $novaPresenca->copa = strtoupper($request->copa);
        $novaPresenca->insumos = strtoupper($request->insumos);

        $novaPresenca->save();

        return redirect('/socios/' . $request->idsocio);

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

    public function destroy($id , $idS)
    {

        Presenca::all()->find($id)->delete();
        return redirect('/socios/' . $idS);

    }
}
