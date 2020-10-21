<?php

namespace App\Http\Controllers;

use App\Copa;
use App\Insumo;
use App\Pagamento;
use App\Presenca;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;
use App\Http\Middleware\PresencaMiddleware;
use Illuminate\Support\Facades\App;

class PresencasController extends Controller
{

    private function Rules()
    {
        return [
            'data' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'data.required' => 'Informar a data'
        ];
    }

    public function index()
    {
        $lista = Presenca::all();
        return json_encode($lista);
    }

    public function listaJSON()
    {
    }

    public function create()
        //
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate($this->Rules(), $this->Messages());

        $novaPresenca = new Presenca();
        $novaPresenca->socio_id = $request->idsocio;
        $novaPresenca->calibre = strtoupper($request->calibre);
        $novaPresenca->tiros = $request->tiros;
        $novaPresenca->data = $request->data;
        $novaPresenca->save();

        if (isset($request->copa)) {
            $novoGastoCopa = new Copa();
            $novoGastoCopa->valor = $request->copa;

            if ($request->pagamentoCopa == true) {

                $novoGastoCopa->pagamento = true;

                $pagamento = new Pagamento();
                $pagamento->socio_id = $request->idsocio;
                $pagamento->descricao = "Copa";
                $pagamento->data = date('d/m/Y');
                $pagamento->valor = $request->copa;
                $pagamento->save();

            }
            $novoGastoCopa->descricao = $request->descricaoCopa;
            $novaPresenca->copa()->save($novoGastoCopa);
        }

        if (isset($request->insumo)) {
            $novoGastoInsumo = new Insumo();
            $novoGastoInsumo->valor = $request->insumo;

            if ($request->pagamentoInsumo == true) {

                $novoGastoInsumo->pagamento = true;

                $pagamento = new Pagamento();
                $pagamento->socio_id = $request->idsocio;
                $pagamento->descricao = "Insumo";
                $pagamento->data = date('d/m/Y');
                $pagamento->valor = $request->insumo;
                $pagamento->save();

            }

            $novoGastoInsumo->descricao = $request->descricaoInsumos;
            $novaPresenca->insumo()->save($novoGastoInsumo);
        }
        return redirect('/socios/' . $request->idsocio);

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id, $idS)
    {

        Presenca::all()->find($id)->delete();
        Insumo::where('presenca_id', $id)->delete();
        Copa::where('presenca_id', $id)->delete();
        return redirect('/socios/' . $idS);

    }
}
