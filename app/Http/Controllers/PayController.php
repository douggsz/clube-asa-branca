<?php

namespace App\Http\Controllers;

use App\Pagamento;
use Illuminate\Http\Request;

class PayController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function novaAnuidade($socio){
        $anuidade = new Pagamento();
        $anuidade->vencimento = '10';
        $anuidade->socio_id = $socio;
        $anuidade->save();
        return redirect()->action('PagesController@paginainicial');
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
