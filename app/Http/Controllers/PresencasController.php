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
            'calibre' => 'required',
            'tiros' => 'required',
            'modalidade' => 'required',
            'data' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'calibre.required' => 'Informar calibre utilizado',
            'tiros.required' => 'Informar numero de disparos',
            'modalidade.required' => 'Deve ser informada a modalidade',
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

        $socios = Registro::all();

        foreach ($socios as $socio) {
            if ($socio->n_cr === $request->n_cr) {
                $socioID = $socio->socio_id;
            }
        }

        $novaPresenca = new Presenca();

        $novaPresenca->socio_id = $socioID;
        $novaPresenca->ncr = $request->n_cr;
        $novaPresenca->calibre = strtoupper($request->calibre);
        $novaPresenca->tiros = $request->tiros;
        $novaPresenca->data = $request->data;
        $novaPresenca->modalidade = strtoupper($request->modalidade);

        $novaPresenca->save();

        return redirect()->action('PagesController@presencas');

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

        Presenca::all()->find($id)->delete();
        return redirect()->action('PagesController@presencas');

    }
}
