<?php

namespace App\Http\Controllers;

use App\Pagamento;
use App\Passada;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class PassadasController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $socios = Registro::all();

        foreach ($socios as $socio) {
            if ($socio->n_cr === $request->n_cr) {
                $socioID = $socio->socio_id;
            }
        }

        $socioNome = Socio::all()->find($socioID);

        $novaPassada = new Passada();
        $novaPassada->socio_id = $socioID;
        $novaPassada->nome = $socioNome->nome;
        $novaPassada->n_passadas = $request->n_passadas;
        $novaPassada->data = $request->data;
        $novaPassada->modalidade = strtoupper($request->modalidade);
        if ($request->pagamento == 'true') {
            $novoPagamento = new Pagamento();
            $novoPagamento->pago = true;
            $novoPagamento->descricao = strtoupper($request->modalidade);
            $novoPagamento->data = $request->data;
            $novoPagamento->socio_id = $socioID;
            $novoPagamento->valor = 25 * $request->n_passadas;
        } else {
            $novoPagamento = new Pagamento();
            $novoPagamento->descricao = strtoupper($request->modalidade);
            $novoPagamento->data = $request->data;
            $novoPagamento->socio_id = $socioID;
            $novoPagamento->valor = 25 * $request->n_passadas;
        }

        $novaPassada->save();
        $novaPassada->pagamento()->save($novoPagamento);

        return redirect()->route('passadas');

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
        //
    }

    public function destroy($id)
    {
        //
    }
}