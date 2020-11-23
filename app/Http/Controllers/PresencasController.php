<?php

namespace App\Http\Controllers;

use App\Copa;
use App\Insumo;
use App\Pagamento;
use App\Presenca;
use Illuminate\Http\Request;

class PresencasController extends Controller
{

    public function index()
    {
        $lista = Presenca::with('copa', 'insumo')->get()->all();
        return json_encode($lista);
    }

    public function listaJSON()
    {
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $novaPresenca = new Presenca();
        $novaPresenca->socio_id = $request->idsocio;
        $novaPresenca->calibre = strtoupper($request->calibre);
        $novaPresenca->tiros = $request->tiros;
        $novaPresenca->data = $request->data;
        $novaPresenca->save();

        if (isset($request->copa)) {
            $novoGastoCopa = new Copa();
            $novoGastoCopa->valor = $request->copa;

            if ($request->pagamentoCopa) {
                $novoGastoCopa->pagamento = true;
                $pagamento = new Pagamento();
                $pagamento->socio_id = $request->idsocio;
                $pagamento->descricao = "Copa";
                $pagamento->data = $request->data;
                $pagamento->valor = $request->copa;
                $pagamento->save();
            }

            $novoGastoCopa->descricao = $request->descricaoCopa;
            $novaPresenca->copa()->save($novoGastoCopa);
        }

        if (isset($request->insumo)) {

            $novoGastoInsumo = new Insumo();
            $novoGastoInsumo->valor = $request->insumo;

            if ($request->pagamentoInsumo) {

                $novoGastoInsumo->pagamento = true;

                $pagamento = new Pagamento();
                $pagamento->socio_id = $request->idsocio;
                $pagamento->descricao = "Insumo";
                $pagamento->data = $request->data;
                $pagamento->valor = $request->insumo;
                $pagamento->save();

            }

            $novoGastoInsumo->descricao = $request->descricaoInsumos;
            $novaPresenca->insumo()->save($novoGastoInsumo);
        }

    }

    public function show($idSocio)
    {
        $presencas = Presenca::with('copa', 'insumo')
            ->where('socio_id', $idSocio)
            ->get();
        return json_encode($presencas);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
       //
    }

    public function destroy($id, $idSocio)
    {
        Presenca::all()->find($id)->delete();
        Insumo::where('presenca_id', $id)->delete();
        Copa::where('presenca_id', $id)->delete();
        return redirect('/socios/' . $idSocio);
    }
}
