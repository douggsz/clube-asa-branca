<?php

namespace App\Http\Controllers;

use App\Investimento;
use App\Sede;
use App\Stand;
use App\Trap;
use Illuminate\Http\Request;

class InvestimentoController extends Controller
{
    public function index()
    {
        $investimentos = Investimento::with('trap', 'stand', 'sede')->get();
        return json_encode(compact('investimentos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $investimento = new Investimento();
        $investimento->data = $request->data;
        $investimento->tipo = $request->tipo;
        $investimento->descricao = $request->descricao;
        $investimento->save();

        switch ($request->tipo) {
            case "TRAP":
                $trap = new Trap();
                $trap->valor = $request->valor;
                $investimento->trap()->save($trap);
                break;
            case "SEDE":
                $sede = new Sede();
                $sede->valor = $request->valor;
                $investimento->sede()->save($sede);
                break;
            case "STAND":
                $stand = new Stand();
                $stand->valor = $request->valor;
                $investimento->stand()->save($stand);
        }

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
        Trap::where('investimento_id', $id)->delete();
        Sede::where('investimento_id', $id)->delete();
        Stand::where('investimento_id', $id)->delete();
        Investimento::all()->find($id)->delete();
        return redirect()->route('investimentos');
    }
}
