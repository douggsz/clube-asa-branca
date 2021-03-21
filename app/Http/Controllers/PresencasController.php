<?php

namespace App\Http\Controllers;

use App\Copa;
use App\Insumo;
use App\Pagamento;
use App\Presenca;
use App\Socio;
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


    public function getPresenca($data, $id)
    {
        $getPresencas = Socio::all()->find($id)->presenca()->get();
        foreach ($getPresencas as $presenca) {
            if ($presenca->data == $data) {
                return $presenca->id;
            }
        }
        return null;
    }

    public function store(Request $request)
    {

        if ($this->getPresenca($request->data, $request->idsocio) != null) {
            $novaPresenca = Presenca::all()->find($this->getPresenca($request->data, $request->idsocio));
            $novaPresenca->copa()->delete();
            $novaPresenca->copa()->delete();
            Pagamento::where('data', $request->data)
                ->where('socio_id', $request->idsocio)
                ->delete();
        } else {
            $novaPresenca = new Presenca();
        }
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

        return redirect('/controle/socios/' . $request->idsocio . '?o=presenca');

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

    public function pagamento_id($id)
    {
        $presenca = Presenca::all()->find($id);
        $pagamento = Pagamento::where('socio_id', $presenca->socio_id)
            ->where('data', $presenca->data)
            ->first();
        $idd = $pagamento->id;
        if (isset($idd)) {
            return $idd;
        } else {
            return false;
        }
    }

    public function destroy($idSocio, $id)
    {
        if ($this->pagamento_id($id)){
        Pagamento::all()->find($this->pagamento_id($id))
            ->delete();
        }
        Presenca::all()->find($id)->delete();
        Insumo::where('presenca_id', $id)->delete();
        Copa::where('presenca_id', $id)->delete();
        return redirect('/controle/socios/' . $idSocio . '?o=presenca');
    }
}
