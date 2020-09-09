<?php

namespace App\Http\Controllers;

use App\Pagamento;
use Illuminate\Http\Request;

class PayController extends Controller
{

    public function index()
    {
        $lista = Pagamento::all();
        return json_encode($lista);
    }

    public function create()
    {
        //
    }

    public function novaAnuidade($socio)
    {

    }

    public function pagamento($id)
    {
        $pagamentoDivida = Pagamento::all()->find($id);
        $pagamentoDivida->pago = true;
        $pagamentoDivida->save();

        return redirect('/socios/' . $pagamentoDivida->socio_id);
    }

    public function exclusao($id)
    {
        $exDivida = Pagamento::all()->find($id);
        $exDivida->delete();

        return redirect('/socios/' . $exDivida->socio_id);
    }



    public function store(Request $request)
    {

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
