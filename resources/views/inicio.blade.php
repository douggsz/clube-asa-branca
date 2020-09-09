@extends('layout.app')
@section('titulo', 'Lista de socios')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div class="container-fluid" id="corpo">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Socios</p>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0 table-hover" id="sociosTable">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nº Associado</th>

                        </tr>
                        </thead>
                        <tbody>
                        @isset($listaSocios)
                            @foreach($listaSocios as $socio)
                                <tr>
                                    <td>
                                        <img class="rounded-circle mr-2" width="30" height="30"
                                             src="{{ asset('/storage/'. $socio->foto->img) }}"/>
                                        <a href="{{'/socios/'.$socio->id}}">{{$socio->nome}}</a></td>
                                    <td>{{$socio->n_associado}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <h3> Não há socios</h3>
                            </tr>
                        @endif

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
                                <div>
                                    <div>
                                        <p>
                                        <form id="formNovoSocio" method="post" action="/socios/new"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                          id="inputGroupFileAddon01">Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file"
                                                           class="custom-file-input @if ($errors->has('foto')) is-invalid @endif"
                                                           name="foto" id="foto"
                                                           accept=".jpg,.jpeg,.png"
                                                           aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="customFile">Selecionar
                                                        foto</label>
                                                </div>
                                                @if($errors->has('foto'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('foto')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </p>
                                        <p>
                                        <div>
                                            <input
                                                class="form-control @if ($errors->has('nome')) is-invalid @endif"
                                                type="text" placeholder="Nome" name="nome"
                                                id="nome"/>
                                            @if($errors->has('nome'))
                                                <div class="invalid-feedback">
                                                    {{$errors->first('nome')}}
                                                </div>
                                            @endif
                                        </div>
                                        </p>
                                        <p>
                                        <div>
                                            <input
                                                class="form-control @if ($errors->has('n_associado')) is-invalid @endif"
                                                type="text" placeholder="Nº Associado"
                                                name="n_associado" id="n_associado"/>
                                            @if($errors->has('n_associado'))
                                                <div class="invalid-feedback">
                                                    {{$errors->first('n_associado')}}
                                                </div>
                                            @endif
                                        </div>
                                        </p>
                                        <p>
                                            @component('components.seletorSexo')
                                            @endcomponent
                                        </p>
                                        <p>
                                        <div>
                                            <input class="form-control"
                                                   type="text" maxlength="10"
                                                   data-mask="00/00/0000"
                                                   placeholder="Nascimento" name="nascimento" id="nascimento">
                                        </div>
                                        </p>
                                        <p>
                                        <div>
                                            <input class="form-control" type="text" maxlength="10" placeholder="RG"
                                                   name="rg" id="rg"></div>
                                        </p>
                                        <p>
                                        <div>
                                            <input class="form-control" type="text" maxlength="14" placeholder="CPF"
                                                   name="cpf" id="cpf" data-mask="000.000.000-00">
                                        </p></div>
                                    <p>
                                    <div>
                                        <input class="form-control " type="text" maxlength="11"
                                               data-mask="00000-0000" placeholder="Numero celular"
                                               name="n_celular" id="n_celular"></div>
                                    </p>

                                    <p>
                                    <div>
                                        <input class="form-control @if ($errors->has('n_cr')) is-invalid @endif" type="text"
                                               placeholder="Nº CR" name="n_cr"
                                               id="n_cr">
                                        @if($errors->has('n_cr'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('n_cr')}}
                                            </div>
                                        @endif</div>
                                    </p>
                                    <p>
                                    <div>
                                        <input class="form-control @if ($errors->has('data_expedicao')) is-invalid @endif" type="text"
                                               maxlength="10" data-mask="00/00/0000"
                                               placeholder="Data Expedição" name="data_expedicao"
                                               id="data_expedicao">
                                        @if($errors->has('data_expedicao'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('data_expedicao')}}
                                            </div>
                                        @endif</div>
                                    </p>
                                    <p>
                                    <div>
                                        <input class="form-control @if ($errors->has('data_validade')) is-invalid @endif" type="text"
                                               maxlength="10" data-mask="00/00/0000"
                                               placeholder="Validade" name="data_validade" id="data_validade">
                                        @if($errors->has('data_validade'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('data_validade')}}
                                            </div>
                                        @endif</div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
    </form>
    </div>
@endsection
