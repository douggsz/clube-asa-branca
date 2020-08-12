@extends('layout.app')
@section('titulo', 'Presenças')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    <div>
        <div class="container-fluid" id="corpo">
            <div class="shadow card">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Lista de presenças</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <table class="table my-0" id="tpresencas">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nº CR</th>
                            <th>Calibre</th>
                            <th>Tiros</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($presencas)
                            @foreach($presencas as $comparecimento)
                                <tr>
                                    <td><a href="/socios/{{$comparecimento->socio_id}}">
                                            {{$comparecimento->socio->nome}}</a></td>
                                    <td>{{$comparecimento->ncr}}</td>
                                    <td>{{$comparecimento->calibre}}</td>
                                    <td>{{$comparecimento->tiros}}</td>
                                    <td>{{$comparecimento->data}}</td>
                                    <td>
                                        <a class="close"
                                           href="/socios/presencas/excluir/{{$comparecimento->id}}">
                                            <span aria-hidden="true">x</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Nº CR</th>
                            <th>Calibre</th>
                            <th>Tiros</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm shadow" id="mostraNovaPresenca"><a>Novo</a></button>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="novoUsuario">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Nova presença</h5>
                    </div>
                    <button class="close" id="fechaNovaPresença" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="form-group">
                            <form action="/presencas" method="POST">
                                @csrf
                                <a>Informações</a>
                                <div id="presencaInfo">
                                    <div>
                                        <p>
                                            <select class="form-control" name="nome" id="sociosRegistro">
                                                @isset($socios)
                                                    @foreach($socios as $registro)
                                                        <option
                                                            value="{{$registro->n_cr}}">{{$registro->socio->nome}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </p>
                                        <p><input class="form-control" type="text" name="registro" id="crSelecionado"
                                                  value="Registro: {{ $socios[0]->n_cr }}" disabled required>
                                            <input type="hidden" value=" {{ $socios[0]->n_cr }}" name="ncr"
                                                   id="idSelecionado"></p>
                                        <p><input class="form-control" type="text" name="data" id="data"
                                                  placeholder="Data presença" data-mask="00/00/0000"></p>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input class="form-control" type="text" name="tiros" id="tiros"
                                                       placeholder="Nº Tiros"></div>
                                            <div class="form-group col">
                                                <input class="form-control" type="text" name="calibre" id="calibre"
                                                       placeholder="Calibre"></div>
                                        </div>
                                        <p><input class="form-control" type="text" name="modalidade" id="modalidade"
                                                  placeholder="Modalidade"></p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
    </div>
@endsection
