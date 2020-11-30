<?php

namespace App\Http\Controllers;

use App\Anuidade;
use App\Endereco;
use App\Foto;
use App\Pagamento;
use App\Presenca;
use App\Registro;
use App\Socio;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class SocioController extends Controller
{
    public function index()
    {
        $lista = Socio::with('foto')->get()->all();
        return json_encode($lista);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $novoSocio = new Socio();

        $novoSocio->nome = strtoupper($request->nome);
        $novoSocio->n_associado = strtoupper($request->n_associado);
        $novoSocio->nascimento = $request->nascimento;
        $novoSocio->sexo = strtoupper($request->sexo);
        $novoSocio->rg = $request->rg;
        $novoSocio->cpf = $request->cpf;
        $novoSocio->n_celular = $request->n_celular;
        $novoSocio->save();

        $novoSocioRegistro = new Registro();
        $novoSocioRegistro->n_cr = $request->n_cr;
        $novoSocioRegistro->data_expedicao = $request->data_expedicao;
        $novoSocioRegistro->data_validade = $request->data_validade;
        $novoSocio->registro()->save($novoSocioRegistro);

        $novoSocioEndereco = new Endereco();
        $novoSocio->endereco()->save($novoSocioEndereco);

        $novoSocioFoto = new Foto();

        if (null !== ($request->file('foto'))) {
            $foto = $request->file('foto')->store('img', 'public');
        } else {
            $foto = 'img/sem-foto.jpg';
        }

        $novoSocioFoto->img = $foto;
        $novoSocio->foto()->save($novoSocioFoto);

        return redirect()->route('inicio');

    }

    public function show($id)
    {
        $lista = Socio::with('foto', 'endereco', 'registro', 'anuidade')->find($id);
        return json_encode($lista);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $atualizaSocio = Socio::all()->find($id);

        $atualizaSocio->nome = strtoupper($request->nome);
        $atualizaSocio->n_associado = $request->n_associado;
        $atualizaSocio->nascimento = strtoupper($request->nascimento);
        $atualizaSocio->rg = $request->rg;
        $atualizaSocio->cpf = $request->cpf;
        $atualizaSocio->sexo = strtoupper($request->sexo);
        $atualizaSocio->n_celular = $request->n_celular;
        $atualizaSocio->save();


    }

    public function destroy($id)
    {

        Endereco::where('socio_id', $id)->delete();
        Foto::where('socio_id', $id)->delete();
        Pagamento::where('socio_id', $id)->delete();
        Presenca::where('socio_id', $id)->delete();
        Registro::where('socio_id', $id)->delete();
        Anuidade::where('socio_id', $id)->delete();
        Socio::all()->find($id)->delete();

    }
}
