<?php

namespace App\Http\Controllers;

use App\Anuidade2021;
use App\Anuidade2020;
use App\Pagamento;
use Illuminate\Http\Request;

class Anuidade2020Controller extends Controller
{

    public function index()
    {
        $lista = Anuidade2020::all();
        return json_encode($lista);
    }

    public function create($socioID)
    {

    }

    public function store(Request $request)
    {
        $novaAnuidade = new Anuidade2020();
        $novaAnuidade->socio_id = $request->socio_id;
        $novaAnuidade->save();
        return redirect('/controle/socios/' . $request->socio_id);
    }

    public function show($id)
    {
        $anuidade = Anuidade2020::all()->find($id);
        return json_encode($anuidade);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $anuidade = Anuidade2020::all()->find($id);
        $anuidade->pago = $anuidade->pago + $request->valor_pago_2020;
        $anuidade->save();
        $pagamento = new Pagamento();
        $pagamento->descricao = "Anuidade 2020";
        $pagamento->socio_id = $anuidade->socio_id;
        $pagamento->data = date('d/m/Y');
        $pagamento->valor = $request->valor_pago_2020;
        $pagamento->save();
    }

    public function destroy($id)
    {
        //
    }
}
