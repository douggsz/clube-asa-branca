@extends('layout.app')
@section('titulo', 'Recebidos')
@section('barraLateral')
    @component('components.barraLateral')
    @endcomponent
@endsection
@section('body')
    @auth()
    <header style="padding: 2rem;text-align: center;">
        <h1>recebidos</h1>
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
                    @foreach($recebidos as $pagamento)
                        <tr>
                            <td>{{$pagamento->socio->nome}}</td>
                            <td>{{$pagamento->descricao}}</td>
                            <td>{{$pagamento->data}}</td>
                            <td>{{$pagamento->valor}}</td>
                        </tr>
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
    @endauth
    @guest()
        <div style="text-align: center;">
            <a href="/controle/acesso">
                <button class="btn btn-lg btn-primary">Login</button>
            </a>
        </div>
    @endguest
@endsection
