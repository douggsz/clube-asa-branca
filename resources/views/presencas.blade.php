@extends('layout.app')
@section('titulo', 'Presenças')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    @auth()
        <div>
            <div class="container-fluid" id="corpo">
                <div class="shadow card">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title">Lista de presenças</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        @isset($presencaUnica)
                            @foreach($presencaUnica as $comparecimento)
                                <tr>
                                    <div class="card mb-1">
                                        <button type="button" class="btn border-0 py-3" data-toggle="collapse"
                                                href="#usuario{{$comparecimento->socio_id}}" aria-expanded="true"
                                                aria-controls="collapseExample"
                                                data-target="#usuario{{$comparecimento->socio_id}}">
                                            <h6 class="text font-weight-bold m-0">{{$comparecimento->socio->nome}}</h6>
                                        </button>
                                    </div>
                                    <div class="card-body collapse" id="usuario{{$comparecimento->socio_id}}">
                                        <div class="form-group">
                                            <div class="card-body">
                                                <table class="table my-0" id="table_presencas">
                                                    <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Calibre</th>
                                                        <th>Disparos</th>
                                                        <th>Copa</th>
                                                        <th>Insumos</th>
                                                        <th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($presencas as $dia)
                                                        <tr>
                                                            @if($dia->socio_id == $comparecimento->socio_id)

                                                                <td>{{$dia->data}}</td>
                                                                @if($dia->tiros != null)
                                                                    <td>{{$dia->calibre}}</td>
                                                                    <td>{{$dia->tiros}}</td>
                                                                @else
                                                                    <td>Somente assinatura</td>
                                                                    <td></td>
                                                                @endif

                                                                <td>
                                                                    @foreach($copas  as $c)
                                                                        @if($c->presenca_id == $dia->id)
                                                                            @isset($c->valor)
                                                                                {{$c->valor}}
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </td>

                                                                <td>
                                                                    @foreach($insumos  as $i)
                                                                        @if($i->presenca_id == $dia->id)
                                                                            @isset($i->valor)
                                                                                {{$i->valor}}
                                                                            @else

                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    <a class="close"
                                                                       href="/socios/presencas/excluir/{{$dia->id}}/{{$dia->socio->id}}">
                                                                        <span aria-hidden="true">x</span>
                                                                    </a>
                                                                </td>

                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Calibre</th>
                                                        <th>Disparos</th>
                                                        <th>Insumos</th>
                                                        <th>Copa</th>
                                                        <th></th>
                                                    </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        @endif
                    </div>
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
    @endguest
@endsection
