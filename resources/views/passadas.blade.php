@extends('layout.app')
@section('titulo','Passadas')
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
                        <h5 class="modal-title">Passadas</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <table class="table my-0" id="tPassadas">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Nº passadas</th>
                            <th>Modalidade</th>
                            <th>Pagamento</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($passadas)
                            @foreach($passadas as $pratos)
                                <tr>
                                    <td>{{$pratos->socio->nome}}</td>
                                    <td>{{$pratos->ncr}}</td>
                                    <td>{{$pratos->calibre}}</td>
                                    <td>{{$pratos->tiros}}</td>
                                    <td>{{$pratos->data}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Nº passadas</th>
                            <th>Modalidade</th>
                            <th>Pagamento</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm shadow" id="mostraNovaPassada"><a>Novo</a></button>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="novaPassada">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Nova presença</h5>
                    </div>
                    <button class="close" id="fechaNovaPassada" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="form-group">
                            <form action="/passada" method="POST">
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
                                                  placeholder="Data Passada" data-mask="00/00/0000"></p>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input class="form-control" type="text" name="n_passadas"
                                                       id="n_passadas"
                                                       placeholder="Nº Passadas"></div>
                                            <div class="form-group col">
                                                <input class="form-control" type="text" name="modalidade"
                                                       id="modalidade"
                                                       placeholder="Modalidade"></div>
                                        </div>
                                        <p>
                                            <select class="form-control" name="pagamento" id="pagamento">
                                                <option value="true">Sim</option>
                                                <option value="false" selected>Não</option>
                                            </select>
                                        </p>
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
