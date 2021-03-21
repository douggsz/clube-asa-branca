@extends('layout.app')
@section('titulo', 'Debitos')
@component('components.barraLateral')
@endcomponent
@section('body')
    <header style="padding: 2rem;text-align: center;">
        <h1>debitos</h1>
        <h4>{{$total}}</h4>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table hover" id="table_recibos">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($insumos as $insumo)
                        @isset($insumo)
                            <tr>
                                <td>{{$insumo->presenca->socio->nome}}</td>
                                <td>{{$insumo->descricao}}</td>
                                <td>{{$insumo->presenca->data}}</td>
                                <td>{{$insumo->valor}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @foreach($copas as $insumo)
                        @isset($insumo)
                            <tr>
                                <td>{{$insumo->presenca->socio->nome}}</td>
                                <td>{{$insumo->descricao}}</td>
                                <td>{{$insumo->presenca->data}}</td>
                                <td>{{$insumo->valor}}</td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
