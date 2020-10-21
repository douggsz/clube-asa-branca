<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Copa;
use App\Endereco;
use App\Foto;
use App\Insumo;
use App\Pagamento;
use App\Passada;
use App\Presenca;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    private function Rules()
    {
        return [
            'nome' => 'required|min:2|max:100',
            'n_associado' => 'required|unique:socios',
            'foto' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Nome deve conter 2 caracteres',
            'nome.max' => 'Nome não pode ter mais de 100 caracteres',
            'n_associado.required' => 'Numero do associado é obrigatório',
            'n_associado.unique' => 'Numero de associado já cadastrado',
            'foto.required' => 'Foto não escolhida'
        ];
    }

    public function index()
    {
        $lista = Socio::all();
        return json_encode($lista);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate($this->Rules(), $this->Messages());

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
        $foto = $request->file('foto')->store('img', 'public');
        $novoSocioFoto->img = $foto;
        $novoSocio->foto()->save($novoSocioFoto);

        return redirect()->route('inicio');
    }

    public function show($id)
    {
        $registros = Registro::all()->where('n_cr', '<>', '');
        $socios = Socio::all();
        $socio = $socios->find($id);
        $listaPresenca = Presenca::all();
        $presenca = $listaPresenca->where('socio_id', $id);
        $copas = Copa::all();
        $insumos = Insumo::all();

        if (isset($socio)) {
            return view('profile', compact('socio', 'socios', 'registros', 'presenca', 'insumos', 'copas'));
        } else {
            return view('inicio');
        }

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

        return redirect('/socios/' . $id);
    }

    public function destroy($id)
    {

        Endereco::where('socio_id', $id)->delete();
        Foto::where('socio_id', $id)->delete();
        Pagamento::where('socio_id', $id)->delete();
        Presenca::where('socio_id', $id)->delete();
        Registro::where('socio_id', $id)->delete();
        Socio::all()->find($id)->delete();

        return redirect()->action('PagesController@paginainicial');

    }
}
