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
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($passadas)
                            @foreach($passadas as $passada)
                                <tr>
                                    <td><a href="/socios/{{$passada->socio_id}}">
                                            {{$passada->socio->nome}}</a></td>
                                    <td>{{$passada->data}}</td>
                                    <td>{{$passada->n_passadas}}</td>
                                    <td>{{$passada->modalidade}}</td>
                                    <td>
                                        @if($passada->pagamento->pago == 0)
                                            Não foi pago
                                        @else
                                            Pago
                                        @endif
                                    </td>
                                    <td>
                                        <div style="text-align: center;">
                                            <a href="/socios/passada/excluir/{{$passada->id}}">x</a>
                                        </div>
                                    </td>
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
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
