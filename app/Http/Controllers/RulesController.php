<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function getMessages()
    {
        return [
            'n_passadas.required' => 'Informar numero de passadas',
            'modalidade.required' => 'Deve ser informada a modalidade',
            'n_cr.required' => 'Informar CR',
            'calibre.required' => 'Informar calibre utilizado',
            'tiros.required' => 'Informar numero de disparos',
            'data.required' => 'Informar a data',
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

    public function getRules()
    {
        return [

            'n_passadas' => 'required',
            'modalidade' => 'required',
            'data' => 'required',
            'calibre' => 'required',
            'tiros' => 'required',
            'n_cr' => 'required|unique:registros',
            'data_expedicao' => 'required',
            'data_validade' => 'required',
            'nome' => 'required|min:2|max:100',
            'n_associado' => 'required|unique:socios',
            'nascimento' => 'nullable|date',
            'rg' => 'nullable',
            'cpf' => 'nullable',
            'n_celular' => 'nullable',
            'foto' => 'required'
        ];
    }
}
