<?php

namespace App\Http\Controllers;

use App\Anuidade;
use App\Pagamento;
use Illuminate\Http\Request;

class AnuidadeController extends Controller
{
    public function index()
    {
        //
    }

    public function create($socioID)
    {

        $novaAnuidade = new Anuidade();

        $novaAnuidade->socio_id = $socioID;

        $novaAnuidade->save();

        return redirect('/socios/' . $socioID);

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
        $anuidade = Anuidade::all()->find($id);

        $anuidade->pago = $anuidade->pago + $request->valorPago;

        $anuidade->save();

        $pagamento = new Pagamento();

        $pagamento->descricao = "Anuidade";

        $pagamento->socio_id = $anuidade->socio_id;

        $pagamento->data = date('d/m/Y');

        $pagamento->valor = $request->valorPago;

        $pagamento->save();

        return redirect('/socios/' . $anuidade->socio_id);

    }

    public function destroy($id)
    {
        //
    }
}
