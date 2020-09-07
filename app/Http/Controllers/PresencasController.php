<?php

namespace App\Http\Controllers;

use App\Presenca;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class PresencasController extends Controller
{

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


        $rules = new RulesController();
        $message = $rules->getMessages();
        $rule = $rules ->getRules();

        $request->validate($rule, $message);

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
