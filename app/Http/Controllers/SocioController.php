<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Endereco;
use App\Foto;
use App\Registro;
use App\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    private function Regras(){
        return [
          'nome' => 'required|min:2|max:100',
          'n_associado' => 'required|unique:socios'
        ];
    }
    public function index()
    {
        $lista = Socio::all();
        return json_encode($lista);
    }
    public function lista(){
        $lista = Socio::all();
        return compact('lista');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate(
            $this->Regras()
        );

        $novoSocio = new Socio();

        $novoSocio->nome        = $request->nome;
        $novoSocio->apelido     = $request->apelido;
        $novoSocio->n_associado = $request->n_associado;
        $novoSocio->nascimento  = $request->nascimento;
        $novoSocio->sexo        = $request->sexo;
        $novoSocio->rg          = $request->rg;
        $novoSocio->cpf         = $request->cpf;
        $novoSocio->save();

        $novoSocioContato = new Contato();
        $novoSocioContato->n_celular  = $request->n_celular;
        $novoSocio->contato()->save($novoSocioContato);

        $novoSocioRegistro = new Registro();
        $novoSocioRegistro->n_cr = $request->n_cr;
        $novoSocio->registro()->save($novoSocioRegistro);

        $novoSocioEndereco = new Endereco();
        $novoSocio->endereco()->save($novoSocioEndereco);

        $novoSocioFoto = new Foto();
        $foto = $request->file('foto')->store('img', 'public');
        $novoSocioFoto->img = $foto;
        $novoSocio->foto()->save($novoSocioFoto);

        return redirect()->action('PagesController@paginainicial');
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

        $atualizaSocio = Socio::all()->find($id);

        $atualizaSocio->nome = $request->nome;
        $atualizaSocio->apelido = $request->apelido;
        $atualizaSocio->n_associado = $request->n_associado;
        $atualizaSocio->nascimento = $request->nascimento;
        $atualizaSocio->rg = $request->rg;
        $atualizaSocio->cpf = $request->cpf;
        $atualizaSocio->sexo = $request->sexo;
        $atualizaSocio->save();

        return redirect('/socios/'. $id);
    }
    public function destroy($id)
    {
        //
    }
}
