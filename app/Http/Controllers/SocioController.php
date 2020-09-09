<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Endereco;
use App\Foto;
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
            'n_cr' => 'required|unique:registros',
            'data_expedicao' => 'required',
            'data_validade' => 'required',
            'nome' => 'required|min:2|max:100',
            'n_associado' => 'required|unique:socios',
            'foto' => 'required'
        ];
    }

    private function Messages()
    {
        return [
            'n_cr.required' => 'Informar CR',
            'n_cr.unique' => 'CR já cadastrado',
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Nome deve conter 2 caracteres',
            'nome.max' => 'Nome não pode ter mais de 100 caracteres',
            'n_associado.required' => 'Numero do associado é obrigatório',
            'n_associado.unique' => 'Numero de associado já cadastrado',
            'data_expedicao.required' => 'Data de expedição é obrigatória',
            'data_validade.required' => 'Data de validade é obrigatória',
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

        $request->validate($this->Rules(),$this->Messages());

        $novoSocio = new Socio();

        $novoSocio->nome = strtoupper($request->nome);
        $novoSocio->apelido = strtoupper($request->apelido);
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

        $novoPagamento = new Pagamento();
        $novoPagamento->descricao = "Anuidade";
        $novoPagamento->valor = "300";
        $novoSocio->pagamento()->save($novoPagamento);

        return redirect()->route('inicio');
    }

    public function show($id)
    {

        $listaSocio = Socio::all();
        $socio = $listaSocio->find($id);
        $listaPassada = Passada::all();
        $passadas = $listaPassada->where('socio_id', $id);
        $listaPresenca = Presenca::all();
        $presenca = $listaPresenca->where('socio_id', $id);
        $listaPagamento = Pagamento::all()->where('socio_id', $id);
        $pagamentos = $listaPagamento->where('pago', false);
        $quitados = $listaPagamento->where('pago', true);
        if (isset($socio)) {
            return view('profile', compact('socio', 'passadas', 'presenca', 'pagamentos', 'quitados'));
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
        $atualizaSocio->apelido = strtoupper($request->apelido);
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
        Passada::where('socio_id', $id)->delete();
        Socio::all()->find($id)->delete();

        return redirect()->action('PagesController@paginainicial');

    }
}
