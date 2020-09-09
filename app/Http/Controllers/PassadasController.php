<?php

namespace App\Http\Controllers;

use App\Messages;
use App\Pagamento;
use App\Passada;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PassadasController extends Controller
{
    private function Rules()
    {
        return [
            'n_passadas' => 'required',
            'modalidade' => 'required',
            'data' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'n_passadas.required' => 'Informar numero de passadas',
            'modalidade.required' => 'Deve ser informada a modalidade',
            'data.required' => 'Informar a data',
        ];
    }

    public function index()
    {
        $lista = Passada::all();
        return json_encode($lista);
    }

    public function create()
    {

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

        $socioNome = Socio::all()->find($socioID);

        $novaPassada = new Passada();
        $novaPassada->socio_id = $socioID;
        $novaPassada->nome = $socioNome->nome;
        $novaPassada->n_passadas = $request->n_passadas;
        $novaPassada->data = $request->data;
        $novaPassada->modalidade = strtoupper($request->modalidade . " (passada)");

        if ($request->pagamento == 'true') {

            $novoPagamento = new Pagamento();
            $novoPagamento->pago = true;
            $novoPagamento->descricao = strtoupper($request->modalidade . " (passada)");
            $novoPagamento->data = $request->data;
            $novoPagamento->socio_id = $socioID;
            $novoPagamento->valor = 25 * $request->n_passadas;

        } else {

            $novoPagamento = new Pagamento();
            $novoPagamento->descricao = strtoupper($request->modalidade . " (passada)");
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
        Passada::all()->find($id)->delete();
        Pagamento::where('passada_id', $id)->delete();
        return redirect()->route('passadas');
    }
}
