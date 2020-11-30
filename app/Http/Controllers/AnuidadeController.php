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

    }

    public function store(Request $request)
    {
        $novaAnuidade = new Anuidade();
        $novaAnuidade->socio_id = $request->socio_id;
        $novaAnuidade->save();
    }

    public function show($idSocio)
    {
        $anuidade = Anuidade::all()->find('socio_id', $idSocio);
        return json_encode($anuidade);
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
    }

    public function destroy($id)
    {
        //
    }
}
