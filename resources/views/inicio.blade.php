@extends('layout.app')
@section('titulo', 'Lista de socios')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    @auth()
        <div class="container-fluid" id="corpo" >
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Socios</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                         aria-describedby="dataTable_info">
                        <table class="table my-0 table-hover" id="table_socios">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nº Associado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaSocios as $socio)
                                <tr>
                                    <td><img class='rounded-circle mr-2' width='30' height='30'
                                             src='/storage/{{$socio->foto->img}}'/>
                                        <a href='/controle/socios/{{$socio->id}}'> {{$socio->nome}} </a></td>
                                    <td>{{$socio->n_associado}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td><strong>Nome</strong></td>
                                <td><strong>Nº Associado</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm shadow" id="mostraNovoUsuario">Novo</button>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="novoUsuario">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title">Novo Socio</h5>
                        </div>
                        <button type="button" class="close" id="fechaNovoUsuario" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="form-group">
                                <a>Informações</a>
                                <div id="socioInfo">
                                    <form class="form-inline" id="form_novo_socio" action="{{route('socios.store')}}"
                                          method="POST" enctype="multipart/form-data">

                                    @csrf

                                    @component('components.inputFt',[
                                        'nome' => 'foto',
                                        'conteudo' => 'Foto',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx',[
                                        'nome'=>'nome',
                                        'conteudo' => 'Nome',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=>'100',
                                        'req' => 'required',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx',[
                                        'nome'=>'n_associado',
                                        'conteudo' => 'Nº Associado',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=>'10',
                                        'req' => 'required',
                                ])
                                    @endcomponent
                                    @component('components.inputTx',[
                                        'nome'=>'nascimento',
                                        'conteudo' => 'Nascimento',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=>'10',
                                        'obs'=>'data-mask=00/00/0000',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx', [
                                        'nome' => 'rg',
                                        'conteudo'=> 'RG',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=> '10',
                                        'obs'=>'data-mask=0000000000 number-only',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx', [
                                        'nome' => 'cpf',
                                        'conteudo'=> 'CPF',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=> '11',
                                        'obs'=>'data-mask=000.000.000-00',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx', [
                                        'nome' => 'n_celular',
                                        'conteudo'=> 'Numero',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=> '11',
                                        ])
                                    @endcomponent
                                    @component('components.seletorSexo')
                                    @endcomponent
                                    @component('components.inputTx', [
                                        'nome' => 'n_cr',
                                        'conteudo'=> 'Nº CR',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=> '10',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx',[
                                        'nome'=>'data_expedicao',
                                        'conteudo' => 'Emissao CR',
                                        'class' => 'form-group',
                                        'tipo' => 'text',
                                        'tamanho'=>'10',
                                        'obs'=>'data-mask=00/00/0000',
                                        ])
                                    @endcomponent
                                    @component('components.inputTx',[
                                            'nome'=>'data_validade',
                                            'conteudo' => 'Validade CR',
                                            'class' => 'form-group',
                                            'tipo' => 'text',
                                            'tamanho'=>'10',
                                            'obs'=>'data-mask=00/00/0000',
                                            ])
                                    @endcomponent
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    @endauth
    @guest()
        <div style="text-align: center;">
                <a href="/controle/acesso">
                    <button class="btn btn-lg btn-primary">Login</button>
                </a>
            </div>
        </div>
    @endguest
@endsection
